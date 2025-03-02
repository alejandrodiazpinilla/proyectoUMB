<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Customer;
use App\Models\EmpresaUser;
use Illuminate\Http\Request;
use App\Models\RouteInspection;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\RouteInspectionImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\RouteInspectionWatchmen;

class RouteInspectionController extends Controller{

	public function __construct(){
        $this->middleware('auth');
        $this->middleware('role_or_permission:root|mostrar_inspeccion_ruta', ['only' => ['index']]);
        $this->middleware('role_or_permission:root|crear_inspeccion_ruta', ['only' => ['create','store','update']]);
        $this->middleware('role_or_permission:root|cargar_pdf_inspeccion_ruta', ['only' => ['guardarPdfRevi','eliminarPdfRevi']]);
	}

    public function index(){
    	return view('routeinspection.index');
    }

    public function routeInspectionIndex(Request $request){

        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');

        $columns = array(
            0 => 'id',
            1 => 'cliente',
            2 => 'revi',
            3 => 'usuario',
            4 => 'hora_inicio',
            5 => 'hora_fin',
            6 => 'action'
        );

        $consulta = DB::table('route_inspections')
        ->join('customers', 'customers.id', 'route_inspections.customer_id')
        ->join('users', 'users.id', 'route_inspections.user_id')
        ->select(
            'route_inspections.*',
            'route_inspections.id AS id',
            'route_inspections.file_revi AS file_revi',
            'route_inspections.customer_id AS customer_id',
            'customers.name AS cliente',
            'route_inspections.topic_revi AS revi',
            'users.name AS usuario',
            'route_inspections.created_at AS hora_inicio',
            'route_inspections.updated_at AS hora_fin'
        );
        if(!Auth::user()->hasRole('root')){
            $empresas_user = EmpresaUser::where('user_id',Auth::user()->id)->pluck('empresa_id');
            $consulta = $consulta->whereIn('route_inspections.company_id',$empresas_user);
        }
        if(Auth::user()->hasRole('coordinador') || Auth::user()->hasRole('supervisor')){
            $consulta = $consulta->where('route_inspections.user_id',Auth::user()->id);
        }
        // Valores para datatable
        $totalData= $consulta->count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value'))){
            $posts = $consulta->offset($start)->limit($limit)->orderBy($order,$dir)->get();
            $totalFiltered = $totalData;
        }else{
            $search = $request->input('search.value');
            if(Auth::user()->hasRole('root')){
                $clausulas = $consulta
                ->where('route_inspections.id', 'like', "%{$search}%");
                $clausulas = $consulta
                ->orWhere('customers.name','like',"%{$search}%");
                $clausulas = $consulta
                ->orWhere('route_inspections.topic_revi','like',"%{$search}%");
                $clausulas = $consulta
                ->orWhere('users.name','like',"%{$search}%");
                $clausulas = $consulta
                ->orWhere('route_inspections.created_at','like',"%{$search}%");
                $clausulas = $consulta
                ->orWhere('route_inspections.updated_at','like',"%{$search}%");
            } else {
                $clausulas = $consulta
                ->where('route_inspections.id', 'like', "%{$search}%")
                ->whereIn('route_inspections.empresa_id',$empresas_user);
                $clausulas = $consulta
                ->orWhere('customers.name','like',"%{$search}%")
                ->whereIn('route_inspections.empresa_id',$empresas_user);
                $clausulas = $consulta
                ->orWhere('route_inspections.topic_revi','like',"%{$search}%")
                ->whereIn('route_inspections.empresa_id',$empresas_user);
                $clausulas = $consulta
                ->orWhere('users.name','like',"%{$search}%")
                ->whereIn('route_inspections.empresa_id',$empresas_user);
                $clausulas = $consulta
                ->orWhere('route_inspections.created_at','like',"%{$search}%")
                ->whereIn('route_inspections.empresa_id',$empresas_user);
                $clausulas = $consulta
                ->orWhere('route_inspections.updated_at','like',"%{$search}%")
                ->whereIn('route_inspections.empresa_id',$empresas_user);
            }
            $totalFiltered = $clausulas->count();
            $posts = $clausulas->offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }

        $data = array();
        if($posts){
            foreach($posts as $r){
                $nestedData['id'] = $r->id;
                $nestedData['cliente'] = $r->cliente;
                $nestedData['revi'] = $r->revi;
                $nestedData['usuario'] = $r->usuario;
                $nestedData['hora_inicio'] = $r->hora_inicio;
                $nestedData['archivo_revi'] = url("/Adjuntos/Analisis Riesgos/".$r->file_revi);
                $nestedData['hora_fin'] = $r->hora_fin??'<span class="text-danger">No registra</span>';
                $nestedData['action'] = $r;
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );
        return json_encode($json_data);
    }

    public function create(){

        //usuarios cuando tienen el rol de guarda
        $guardas =  User::whereHas('roles', function($q){
            $q->where('name', 'guarda');
        })->get()->pluck('name','id');

        if (Auth::user()->hasRole('root')) {
            $clientes =  Customer::pluck('name', 'id')->toArray();
        } else {
            $empresas_user = EmpresaUser::where('user_id', Auth::user()->id)->pluck('empresa_id');
            $clientes =  Customer::whereIn('company_id', $empresas_user)->pluck('name', 'id')->toArray();
        }
        return view('routeinspection.create',compact('clientes','guardas'));
    }


    public function store(Request $request){

        DB::beginTransaction();
        try{
            $fecha = date('d_m_Y_H.i.s');
            $nombre = $fecha.'_'.$request->customer_id.'.png';
            // convertir la imagen obtenida en base64 y almacenarla en JPG
            $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->foto_usuario));
            $path = public_path('/image/inspeccionRuta');
            // comprobar existencia de la carpeta. Si no existe, se crea con permisos.
            if (!file_exists($path))
                mkdir($path, 0777, true);
            $path = public_path().'/image/inspeccionRuta/'.$nombre;
            file_put_contents($path,$image);

            $r = new RouteInspection;
            $r->initial_image = $nombre;
            $r->customer_id = $request->customer_id;
            $r->user_id = Auth::user()->user_id;
            $company_id = Customer::find($request->customer_id)->company_id;
            $r->company_id = $company_id;
            $r->updated_at = null;
            $r->save();
            DB::commit();
            return  response()->json($r->id);
        }catch (\Throwable $th) {
            $errors = $th->getMessage();
            DB::rollback();
            return response()->json($errors);
        }
    }
    public function update(Request $request){

        DB::beginTransaction();
        try{
            $r = RouteInspection::find($request->id);
            $fecha = date('d_m_Y_H.i.s');
            $nombreImg2 = $fecha.'_'.$r->customer_id.'.png';
            // convertir la imagen obtenida en base64 y almacenarla en JPG
            $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->foto_usuario2));
            $path = public_path().'/image/inspeccionRuta/'.$nombreImg2;
            file_put_contents($path,$image);

            $r->visitors = $request->visitors == null ? 'Sin Novedad' : $request->visitors;
            $r->correspondence = $request->correspondence == null ? 'Sin Novedad' : $request->correspondence;
            $r->workplace = $request->workplace == null ? 'Sin Novedad' : $request->workplace;
            $r->parking = $request->parking == null ? 'Sin Novedad' : $request->parking;
            $r->topic_revi = $request->nombre_revi == null ? 'Sin Novedad' : $request->nombre_revi;
            $r->description_revi = $request->descripcion_revi == null ? 'Sin Novedad' : $request->descripcion_revi;
            $r->end_image = $nombreImg2;
            $r->end_date = date('Y-m-d');
            $r->user_id = Auth::user()->id;
            $r->save();

            $infoTablaGuarda = json_decode($request->jsonTableGuarda);
            foreach($infoTablaGuarda as $val){
                $rw = new RouteInspectionWatchmen;
                $rw->route_inspections_id = $request->id;
                $rw->watchman_id = $val->guarda_id;
                $rw->identity_card = $val->carnet;
                $rw->cockade = $val->escarapela;
                $rw->cap = $val->gorra;
                $rw->personal_presentation = $val->presentacion;
                $rw->save();
            }

            $infoTablaRevi = json_decode($request->jsonTableRevi);
            if(!empty($infoTablaRevi)){
                foreach($infoTablaRevi as $key => $val){
                    $fecha = date('d_m_Y_H.i.s');
                    $nombreImg = $fecha.'_'.$r->customer_id.'_'.$key.'.png';
                    // convertir la imagen obtenida en base64 y almacenarla en JPG
                    $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $val->imagen));
                    $path = public_path('/image/inspeccionRuta/revi');
                    // comprobar existencia de la carpeta. Si no existe, se crea con permisos.
                    if (!file_exists($path))
                        mkdir($path, 0777, true);
                    $path = public_path().'/image/inspeccionRuta/revi/'.$nombreImg;
                    file_put_contents($path,$image);
                    $rw = new RouteInspectionImage;
                    $rw->route_inspections_id = $request->id;
                    $rw->image = $nombreImg;
                    $rw->save();
                }
            }
            DB::commit();
            return 1;
        }catch (\Throwable $th) {
            $errors = $th->getMessage();
            DB::rollback();
            return response()->json($errors);
        }
    }
    // obtener listado de tabla de presentacion personal de guardas
    public function getPersPreWatchmen($id){
        $tabla_ppw = RouteInspectionWatchmen::with(['rel_guarda:id,name'])->where('route_inspections_id',$id)->get();
        $img_revi = RouteInspectionImage::where('route_inspections_id',$id)->get();
        return response()->json([
            'tabla_ppw' => $tabla_ppw,
            'img_revi' => $img_revi
        ]);
    }
    public function guardarPdfRevi(Request $request){
        DB::beginTransaction();
        try{
        ini_set('post_max_size', 100);
        $nombre = Customer::find($request->id_cliente)->name;
        $nombre_file = HelpersClass::utf8_remplace(strtolower($nombre));
        $fecha = date('d_m_Y_H_i_s');
        $nombre_riesgos = $fecha.'_riesgos_'.$nombre_file.'.pdf';

        $r = RouteInspection::find($request->id);
        $r->file_revi = $nombre_riesgos;
        $r->save();

        $file_riesgos = $request->file('pdf_report_revi');
        $path = public_path('Adjuntos/Analisis Riesgos');
    // comprobar existencia de la carpeta. Si no existe, se crea con permisos.
    if (!file_exists($path))
        mkdir($path, 0777, true);
        $file_riesgos->move($path, $nombre_riesgos);

        if($request->check_risk == 'on'){
            $email = Customer::find($request->id_cliente)->email;
            if(!empty($email)){
                Mail::send('emails.envioRiesgos',['email' =>$email], function($message) use ($email,$nombre_riesgos){
                    $message->from('notificaciones@correo.com','Alejandro Ltda');
                    $message->to($email);
                    $message->subject('Envío Análisis de Riesgos');
                    $message->attach(public_path('Adjuntos/Analisis Riesgos/').$nombre_riesgos);
                });
            }
        }
        DB::commit();
        return 1;
        }catch (\Throwable $th) {
            DB::rollback();
            return response()->json($th->getMessage());
        }
    }
    public function eliminarPdfRevi(Request $request, $id){
        $r = RouteInspection::find($id);
        if(!empty($r->file_revi)){
            unlink(public_path('Adjuntos/Analisis Riesgos/').$r->file_revi);
            $r->update(['file_revi' => null]);
            return 1;
        }else{
            return 0;
        }
    }
}
