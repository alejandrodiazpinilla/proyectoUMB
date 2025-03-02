<?php

namespace App\Http\Controllers;

use Response;
use App\Models\User;
use App\Models\ActionType;
use App\Models\EmpresaUser;
use App\Models\NoveltyType;
use App\Models\UserCustomer;
use Illuminate\Http\Request;
use App\Models\NoveltyCustomer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class NoveltyCustomerController extends Controller{

    public function __construct(){
        $this->middleware('auth');
		$this->middleware('role_or_permission:root|mostrar_novedades_clientes', ['only' => ['index']]);
		$this->middleware('role_or_permission:root|crear_novedad_cliente', ['only' => ['create','store']]);
		$this->middleware('role_or_permission:root|gestionar_novedad_cliente', ['only' => ['update']]);
    }

    public function index(){
        $acciones = ActionType::orderBy('name')->pluck('name', 'id')->toArray();
        return view('noveltiescustomers.index',compact('acciones'));
    }

    public function NoveltyCustomerIndex(Request $request){

        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');
        
        $columns = array(
            0 => 'id',
            1 => 'tipo_novedad',
            2 => 'description',
            3 => 'state',
            4 => 'created_at',
            5 => 'action'
        );

        $consulta = DB::table('novelties_customers')
        ->join('novelties_types', 'novelties_types.id', 'novelties_customers.novelty_type_id')
        ->leftjoin('users', 'users.id', 'novelties_customers.watchman_name_id')
        ->leftjoin('actions_types', 'actions_types.id', 'novelties_customers.action_type_id')
        ->select(
            'novelties_customers.*', 
            'novelties_customers.id AS id',
            'novelties_types.name AS tipo_novedad',
            'users.name AS nombre_guarda',
            'actions_types.name AS tipo_accion'
        );
        if(!Auth::user()->hasRole('root')){
            $empresas_user = EmpresaUser::where('user_id',Auth::user()->id)->pluck('empresa_id');
            $consulta = $consulta->whereIn('company_id',$empresas_user);
        }

        // identificar si el usuario es un cliente
        $usuarioCliente =  User::
        whereHas('roles', function($q){
            $q->where('name', 'cliente');
            })
        ->where('id',Auth::user()->id)
        ->first();

        // mostrar solo los registros asociados al mismo usuario
        if($usuarioCliente != null)
            $consulta = $consulta->where('novelties_customers.user_id',Auth::user()->id);        

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
                ->where('novelties_customers.id', 'like', "%{$search}%");
                $clausulas = $consulta
                ->orWhere('novelties_customers.description','like',"%{$search}%");
                $clausulas = $consulta
                ->orWhere('novelties_types.name','like',"%{$search}%");
                $clausulas = $consulta
                ->orWhere('novelties_customers.created_at','like',"%{$search}%");
            } else {
                $clausulas = $consulta
                ->where('novelties_customers.id', 'like', "%{$search}%")
                ->whereIn('company_id',$empresas_user);
                $clausulas = $consulta
                ->orWhere('novelties_customers.description','like',"%{$search}%")
                ->whereIn('company_id',$empresas_user);
                $clausulas = $consulta
                ->orWhere('novelties_types.name','like',"%{$search}%")
                ->whereIn('company_id',$empresas_user); 
                $clausulas = $consulta
                ->orWhere('novelties_customers.created_at','like',"%{$search}%")
                ->whereIn('company_id',$empresas_user);   
            }
            
            $totalFiltered = $clausulas->count();
            $posts = $clausulas->offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }

        $data = array();
        if($posts){
            foreach($posts as $r){
                $nestedData['id'] = $r->id;
                $nestedData['crypt_id'] = Crypt::encryptString($r->id);
                $nestedData['tipo_novedad'] = $r->tipo_novedad;
                $nestedData['description'] = $r->description;
                $nestedData['created_at'] = date('d-m-Y g:i:s a',strtotime($r->created_at));
                $nestedData['action_type'] = $r->action_type;
                $nestedData['image'] = $r->image;
                $nestedData['action'] = $r;
                if ($r->action_type == 'Por Gestionar') {
                    $nestedData['state'] = '<div class="badge bg-danger rounded-pill text-light p-2"><span>Por Gestionar</span></div>';
                }else if ($r->action_type == 'Correctiva') {
                    $nestedData['state'] = '<div class="badge bg-danger rounded-pill text-light p-2"><span>'.$r->action_type.'</span></div>';
                }else {
                    $nestedData['state'] = '<div class="badge bg-warning rounded-pill text-light p-2"><span>'.$r->action_type.'</span></div>';
                }
                $data[] = $nestedData;
            // dd($nestedData);
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

    //mostrar vista para crear la novedad
    public function create(){

        $tipos_novedades =  NoveltyType::orderBy('name','asc')->where('delegate_id',2)->get()->pluck('name','id');
        //usuarios cuando tienen el rol de guarda
        $usuarios =  User::whereHas('roles', function($q){
            $q->where('name', 'guarda');
        })->get();

        if(Auth::user()->hasRole('root')){
            $usuarios = $usuarios->pluck('name','id');
        }else{
            $usuarios = $usuarios->where('customer_id',Auth::user()->customer_id)->pluck('name','id');
        }
        
        return view('noveltiescustomers.create',compact('tipos_novedades','usuarios'));
    }

    public function store(Request $request){
        DB::beginTransaction();
        try{
    
        ini_set('post_max_size', 100);

        // Archivo
        $file = $request->file('image');
        if (!empty($file)) {
            // Directorio Destino
            $path = public_path('/image/novedadesClientes');
            // comprobar existencia de la carpeta. Si no existe, se crea con permisos.
            if (!file_exists($path)) 
                mkdir($path, 0777, true);
        
        //Nuevo Nombre
        $nombre_file = HelpersClass::utf8_remplace(strtolower($file->getClientOriginalName()));
        //Si no esta vacio el input.
            $file->move($path, (date('d_m_Y G_i_s') . '.' . $nombre_file));
        }

        $noveltyC = new NoveltyCustomer;
        $noveltyC->novelty_type_id = $request->novelty_type_id;
        $noveltyC->watchman_name_id = $request->watchman_name_id;
        $noveltyC->novelty_type_name = $request->novelty_type_name;

        if (!empty($file))
            $noveltyC->image = date('d_m_Y G_i_s') . '.' . $nombre_file;

        $noveltyC->description = $request->description;
        $empresa_usuario = User::with([
            'rel_cliente:id,company_id'
        ])->where('id',Auth::user()->id)->first();
        
        $company_id = $empresa_usuario?->rel_cliente?->company_id;

        $noveltyC->company_id = $company_id == null ? 1 : $company_id;
        $noveltyC->user_id = Auth::user()->id;
        $noveltyC->save();
        DB::commit();
            return 1;
        }catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }

    public function update($id, Request $request){
        $id = Crypt::decryptString($id);
        $request['user_id'] = Auth::user()->id;
        $request['id'] = $id;
        $gestion = NoveltyCustomer::find($id);

        DB::beginTransaction();
        try{
            $gestion->fill($request->all())->save();
        DB::commit();
            return 1;
        }catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }

    public function search_action ($id){
        return response()->json(ActionType::find($id)->type);
    }
}
