<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Empresa;
use App\Models\Garment;
use App\Models\EmpresaUser;
use Illuminate\Http\Request;
use App\Models\DeliveryEndowment;
use App\Models\EndowmentGarments;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class DeliveryEndowmentController extends Controller{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role_or_permission:root|mostrar_entrega_dotacion|crear_entrega_dotacion', ['only' => ['index','store']]);
    }

    public function index(){
        //usuarios con rol de guarda y supervisores
        $empleados =  User::whereHas('roles', function($q){
            $q->where('name', 'guarda')->orWhere('name', 'coordinador');
        })->get()->pluck('name','id');
        $prendas = Garment::all()->pluck('name','id');
        return view('deliveryendowment.index',compact('empleados','prendas'));
    }

    public function deliveryEndowmentIndex(Request $request){
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');
        $columns = array(
            0 => 'id',
            1 => 'guard',
            2 => 'created_at',
            3 => 'action'
        );

        $consulta = DB::table('delivery_endowment')
        ->join('users', 'users.id', 'delivery_endowment.guard_id')
        ->join('empresas', 'empresas.id', 'delivery_endowment.company_id')
        ->select(
            'delivery_endowment.*', 
            'delivery_endowment.id AS id', 
            'users.name AS guard',
            'empresas.nombre as empresas',
            DB::raw('DATE_FORMAT(delivery_endowment.created_at, "%d-%m-%Y %H:%m:%s") AS created_at'),
        );
        if(!Auth::user()->hasRole('root')){
            $empresas_user = EmpresaUser::where('user_id',Auth::user()->id)->pluck('empresa_id');
            $consulta = $consulta->whereIn('delivery_endowment.company_id',$empresas_user);
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
            ->where('delivery_endowment.id', 'like', "%{$search}%");
            $clausulas = $consulta
            ->orWhere('users.name','like',"%{$search}%");
            $clausulas = $consulta
            ->orWhere(DB::raw('DATE_FORMAT(delivery_endowment.created_at, "%d-%m-%Y %H:%m:%s")'),'like',"%{$search}%");
        } else {
            $clausulas = $consulta
            ->where('delivery_endowment.id', 'like', "%{$search}%")
            ->whereIn('company_id',$empresas_user);
            $clausulas = $consulta
            ->orWhere('users.name','like',"%{$search}%")
            ->whereIn('company_id',$empresas_user);
            $clausulas = $consulta
            ->orWhere(DB::raw('DATE_FORMAT(delivery_endowment.created_at, "%d-%m-%Y %H:%m:%s")'),'like',"%{$search}%")
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
                $nestedData['guard'] = $r->guard;
                $nestedData['created_at'] = $r->created_at;
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

    public function store(Request $request){
        DB::beginTransaction();
        try{
            $infoTabla = json_decode($request->jsonTableDelivery);
            foreach ($infoTabla as $dot) {
                if(($dot->talla != '' && $dot->cantidad == '') || ($dot->talla == '' && $dot->cantidad != ''))
                    return 0;
            }
            ini_set('post_max_size', 100);
            $fecha = date('d_m_Y_H.i.s');
            $firma1 = $fecha.'_official_signature.png';
            // convertir la imagen obtenida en base64 y almacenarla en JPG
            $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->firmaBase64));
            $path = public_path('/image/firmasDotacion');
                // comprobar existencia de la carpeta. Si no existe, se crea con permisos.
                if (!file_exists($path)) 
                    mkdir($path, 0777, true);
            $path = public_path().'/image/firmasDotacion/'.$firma1;
            file_put_contents($path,$image);

            $firma2 = $fecha.'_guard_signature.png';
            // convertir la imagen obtenida en base64 y almacenarla en JPG
            $image2 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->firmaBase642));
            $path2 = public_path('/image/firmasDotacion');
                // comprobar existencia de la carpeta. Si no existe, se crea con permisos.
                if (!file_exists($path2)) 
                    mkdir($path2, 0777, true);
            $path2 = public_path().'/image/firmasDotacion/'.$firma2;
            file_put_contents($path2,$image2);

            $dotacion = new DeliveryEndowment();
            $dotacion->guard_id = $request->guard_id;
            $dotacion->official_signature = $firma1;
            $dotacion->guard_signature = $firma2;
            $dotacion->type = $request->radioEntregaDev;
            $dotacion->user_id = Auth::user()->id;
            $dotacion->save();

            $infoTabla = json_decode($request->jsonTableDelivery);
            foreach ($infoTabla as $dot) {
                if ($dot->talla != ''){
                    $prenda = new EndowmentGarments();
                    $prenda->delivery_endowment_id = $dotacion->id;
                    $prenda->garment_id = Garment::where('name',$dot->prenda)->first()->id;
                    $prenda->number_of = $dot->cantidad;
                    $prenda->size = $dot->talla;
                    $prenda->description = $dot->obs;
                    $prenda->save();
                }
            }
            DB::commit();
            return 1;
        }catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }

    // mostrar PDF de la dotación entregada
    public function show($id){
        $id = Crypt::decryptString($id);
        $dotacion = DeliveryEndowment::with([
            'rel_dotacion_prendas',
            'rel_guarda:id,name,email,cargo',
            'rel_funcionario:id,name,email,cargo'
        ])->find($id);
        return view('deliveryendowment.show', compact('dotacion'));
    }
}