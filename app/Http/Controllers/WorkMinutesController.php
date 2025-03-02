<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Area;
use App\Models\User;
use App\Models\Empresa;
use App\Models\EmpresaUser;
use App\Models\WorkMinutes;
use Illuminate\Http\Request;
use App\Models\WorkMinutesOrder;
use App\Models\WorkMinutesAttendees;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\WorkMinutesCommitments;

class WorkMinutesController extends Controller {

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role_or_permission:root|mostrar_actas_reunion', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:root|crear_acta_reunion', ['only' => ['create','store']]);
	}

    public function index(){
        return view('workminutes.index');
    }

    public function workMinutesIndex(Request $request){
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');
        $columns = array(
            0 => 'consecutive',
            1 => 'fecha',
            2 => 'area',
            3 => 'tema',
            4 => 'lugar',
            5 => 'lider',
            6 => 'action'
        );

        $consulta = DB::table('work_minutes')
        ->join('areas', 'areas.id', 'work_minutes.area_id')
        ->join('users', 'users.id', 'work_minutes.user_id')
        ->join('users as lideres', 'lideres.id', 'work_minutes.leader_id')
        ->select(
            'work_minutes.*', 
            'work_minutes.id AS id',
            'work_minutes.topic AS tema',
            'work_minutes.place AS lugar',
            'areas.nombre AS area',
            'lideres.name AS lider',
            'users.name AS usuario',
            DB::raw('DATE_FORMAT(work_minutes.created_at, "%d-%m-%Y %H:%m:%s") AS created_at'),
            DB::raw('DATE_FORMAT(work_minutes.date, "%d-%m-%Y %H:%m:%s") AS fecha'),
        );
        if(!Auth::user()->hasRole('root')){
            $empresas_user = EmpresaUser::where('user_id',Auth::user()->id)->pluck('empresa_id');
            $consulta = $consulta->whereIn('company_id',$empresas_user);
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
        } else{
        $search = $request->input('search.value');
        if(Auth::user()->hasRole('root')){
            $clausulas = $consulta
            ->where('work_minutes.consecutive', 'like', "%{$search}%");
            $clausulas = $consulta
            ->orWhere(DB::raw('DATE_FORMAT(work_minutes.date, "%d-%m-%Y")'),'like',"%{$search}%");
            $clausulas = $consulta
            ->orWhere('areas.nombre','like',"%{$search}%");
            $clausulas = $consulta
            ->orWhere('work_minutes.topic','like',"%{$search}%");
            $clausulas = $consulta
            ->orWhere('work_minutes.place','like',"%{$search}%");
            $clausulas = $consulta
            ->orWhere('lideres.name','like',"%{$search}%");
        } else {
            $clausulas = $consulta
            ->where('work_minutes.consecutive', 'like', "%{$search}%")
            ->whereIn('company_id',$empresas_user);
            $clausulas = $consulta
            ->orWhere(DB::raw('DATE_FORMAT(work_minutes.date, "%d-%m-%Y")'),'like',"%{$search}%")
            ->whereIn('company_id',$empresas_user);
            $clausulas = $consulta
            ->orWhere('areas.nombre','like',"%{$search}%")
            ->whereIn('company_id',$empresas_user);
            $clausulas = $consulta
            ->orWhere('work_minutes.topic','like',"%{$search}%")
            ->whereIn('company_id',$empresas_user);
            $clausulas = $consulta
            ->orWhere('work_minutes.place','like',"%{$search}%")
            ->whereIn('company_id',$empresas_user);
            $clausulas = $consulta
            ->orWhere('lideres.name','like',"%{$search}%")
            ->whereIn('company_id',$empresas_user);
        }

        $totalFiltered =$totalData;
        $posts = $clausulas->offset($start)->limit($limit)->orderBy($order, $dir)->get();
    }   

        $data = array();
        if($posts){
            foreach($posts as $r){
                $nestedData['id'] = $r->id;
                $nestedData['crypt_id'] = Crypt::encryptString($r->id);
                $nestedData['consecutive'] = $r->consecutive;
                $nestedData['fecha'] = date('d-m-Y',strtotime($r->date));
                $nestedData['area'] = $r->area;
                $nestedData['tema'] = $r->topic;
                $nestedData['lugar'] = $r->place;
                $nestedData['lider'] = $r->lider;
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
        if (Auth::user()->hasRole('root')) {
            $empresas =  Empresa::all()->pluck('nombre', 'id');
        } else {
            $empresas_user = EmpresaUser::where('user_id', Auth::user()->id)->pluck('empresa_id');
            $empresas =  Empresa::whereIn('id', $empresas_user)->pluck('nombre', 'id');
        }
        $areas = Area::pluck('nombre','id');
        $usuario = Auth::user();
        $usuarios = User::pluck('name','id');
        $maxDate = date('Y-m-d');
        return view('workminutes.create',compact('maxDate', 'areas', 'usuario','usuarios','empresas'));
    }


    public function store(Request $request){
        DB::beginTransaction();
        try{
            // GUARDAR ACTA DE REUNION
            $acta = new WorkMinutes();
            $acta->consecutive = $request->consecutivo;
            $acta->date = $request->fecha;
            $acta->area_id = $request->area;
            $acta->company_id = $request->empresa_id;
            $acta->topic = $request->tema;
            $acta->place = $request->lugar;
            $acta->leader_id = $request->lider;
            $acta->start = $request->inicio;
            $acta->end = $request->cierre;
            $acta->description = $request->desarrollo;
            $acta->user_id = Auth::user()->id;
            $acta->save();

            // GUARDAR ORDEN DEL DÍA
            if ($request->jsonOrden) {
                $infoOrden = json_decode($request->jsonOrden);
                foreach ($infoOrden as $val) {
                    $orden = new WorkMinutesOrder();
                    $orden->work_minutes_id = $acta->id;
                    $orden->item = $val->ordenDia;
                    $orden->user_id = Auth::user()->id;
                    $orden->save();
                }
            }

            // GUARDAR COMPROMISOS
            if ($request->jsonCompromisos) {
                $infoCompromisos = json_decode($request->jsonCompromisos);
                foreach ($infoCompromisos as $val) {
                    $compr = new WorkMinutesCommitments();
                    $compr->work_minutes_id = $acta->id;
                    $compr->commitment = $val->compromiso;
                    $compr->responsible = $val->responsable;
                    $compr->date_start = $val->fecha;
                    $compr->date_end = $val->cierre;
                    $compr->user_id = Auth::user()->id;
                    $compr->save();
                }
            }

            // GUARDAR ASISTENTES
            if ($request->jsonAsistentes) {
                $infoAsistentes = json_decode($request->jsonAsistentes);
                foreach ($infoAsistentes as $val) {
                    ini_set('post_max_size', 100);
                    ini_set('max_execution_time', 0);
                    ini_set('memory_limit', '-1');
                    $firma = date('d_m_Y_H.i.s').'_'.$val->cedula.'.png';
                    // convertir la imagen obtenida en base64 y almacenarla en JPG
                    $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $val->firma));
                    $path = public_path('Adjuntos/Actas de Visitas/').date('d_m_Y');
                    // comprobar existencia de la carpeta. Si no existe, se crea con permisos.
                    if (!file_exists($path)) 
                        mkdir($path, 0777, true);
                    $path = $path.'/'.$firma;
                    file_put_contents($path,$image);

                    $asist = new WorkMinutesAttendees();
                    $asist->work_minutes_id = $acta->id;
                    $asist->attendee = $val->nombre;
                    $asist->signature = $firma;
                    $asist->user_id = Auth::user()->id;
                    $asist->save();
                }
            }
        DB::commit();
        return 1;
        }catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }

    // mostrar vista para descargar PDF
    public function show($id){
        $id = Crypt::decryptString($id);
        $acta = WorkMinutes::with([
            'rel_usuario:id,name',
            'rel_lider:id,name',
            'rel_area:id,nombre',
            'rel_empresa:id,nombre',
            'rel_orden_dia',
            'rel_compromisos',
            'rel_asistentes'
        ])->find($id);
        return view('workminutes.show', compact('acta'));
    }
}
