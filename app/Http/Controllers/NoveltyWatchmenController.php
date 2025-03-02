<?php

namespace App\Http\Controllers;

use Auth;
use Response;
use App\Models\User;
use App\Models\Ciudad;
use App\Models\EmpresaUser;
use App\Models\NoveltyType;
use Illuminate\Http\Request;
use App\Models\NoveltyWatchmen;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class NoveltyWatchmenController extends Controller{

    public function __construct(){
        $this->middleware('auth');
		$this->middleware('role_or_permission:root|mostrar_novedades_guardas', ['only' => ['index']]);
		$this->middleware('role_or_permission:root|crear_novedad_guarda', ['only' => ['create','store']]);
		$this->middleware('role_or_permission:root|gestionar_novedad_guarda', ['only' => ['update']]);
    }

    public function index(){

        // ***************Pedir actualización de perfil solo a guardas cada 3 meses**********************
        //usuarios cuando tienen el rol de guarda
        $fecha90d = date('Y-m-d G:i:s');
        $fecha90d = date('Y-m-d G:i:s', strtotime($fecha90d.'- 90 days'));

        $user =  User::
        whereHas('roles', function($q){
        $q->where('name', 'guarda');
        })
        ->where('id',Auth::user()->id)
        ->first();
        $guarda = $user;
        $ciudades = Ciudad::select(DB::raw("CONCAT(nombre,' - ',departamento) as display_name"), "id")->pluck('display_name','id');

    if($user != null && ($fecha90d > $user->last_date_update || $user->last_date_update == null))
        return view('users.edit', compact('user','ciudades','guarda'));
    else
        return view('noveltieswatchmen.index');
    }

    public function NoveltyWatchmenIndex(Request $request){

        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');
        
        $columns = array(
            0 => 'id',
            1 => 'tipo_novedad',
            2 => 'description',
            3 => 'created_at',
            4 => 'state',
            5 => 'action'
        );

        $consulta = DB::table('novelties_watchmen')
        ->join('novelties_types', 'novelties_types.id', 'novelties_watchmen.novelty_type_id')
        ->join('users', 'users.id', 'novelties_watchmen.user_id')
        ->select(
            'novelties_watchmen.*', 
            'users.name AS guarda',
            'novelties_types.name AS tipo_novedad'
        );

        if(!Auth::user()->hasRole('root')){
            $empresas_user = EmpresaUser::where('user_id',Auth::user()->id)->pluck('empresa_id');
            $consulta = $consulta->whereIn('company_id',$empresas_user);
        }

        if(Auth::user()->hasRole('guarda')){
            $consulta = $consulta->where('novelties_watchmen.user_id',Auth::user()->id);
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
            if(Auth::user()->hasRole('root') || (Auth::user()->hasRole('guarda') && Auth::user()->hasRole('cliente'))){
                $clausulas = $consulta
                ->where('novelties_watchmen.id', 'like', "%{$search}%");
                $clausulas = $consulta
                ->orWhere('novelties_watchmen.description','like',"%{$search}%");
                $clausulas = $consulta
                ->orWhere('novelties_types.name','like',"%{$search}%");
                $clausulas = $consulta
                ->orWhere('users.name','like',"%{$search}%");
                $clausulas = $consulta
                ->orWhere('novelties_watchmen.created_at','like',"%{$search}%");
                $inp_search = strtolower($search);
                $busqueda = '';
                if (stristr('Por Gestionar', $inp_search)) {
                    $busqueda = '%0%';
                } else if (stristr('Novedad Gestionada', $inp_search)) {
                    $busqueda = '%1%';
                }
                $clausulas = $consulta
                ->orWhere('novelties_watchmen.state', 'like', $busqueda);
            } else if (Auth::user()->hasRole('guarda')) {
                $clausulas = $consulta
                ->where('novelties_watchmen.id', 'like', "%{$search}%")
                ->where('novelties_watchmen.user_id',Auth::user()->id);
                $clausulas = $consulta
                ->orWhere('novelties_watchmen.description','like',"%{$search}%")
                ->where('novelties_watchmen.user_id',Auth::user()->id);
                $clausulas = $consulta
                ->orWhere('novelties_types.name','like',"%{$search}%")
                ->where('novelties_watchmen.user_id',Auth::user()->id); 
                $clausulas = $consulta
                ->orWhere('users.name','like',"%{$search}%")
                ->where('novelties_watchmen.user_id',Auth::user()->id); 
                $clausulas = $consulta
                ->orWhere('novelties_watchmen.created_at','like',"%{$search}%")
                ->where('novelties_watchmen.user_id',Auth::user()->id);  
                
                $inp_search = strtolower($search);
                $busqueda = '';
                if (stristr('Por Gestionar', $inp_search)) {
                    $busqueda = '%0%';
                } else if (stristr('Novedad Gestionada', $inp_search)) {
                    $busqueda = '%1%';
                }
                $clausulas = $consulta
                ->orWhere('novelties_watchmen.state', 'like', $busqueda)
                ->where('novelties_watchmen.user_id',Auth::user()->id); 
            } else {
                $clausulas = $consulta
                ->where('novelties_watchmen.id', 'like', "%{$search}%")
                ->whereIn('company_id',$empresas_user);
                $clausulas = $consulta
                ->orWhere('novelties_watchmen.description','like',"%{$search}%")
                ->whereIn('company_id',$empresas_user);
                $clausulas = $consulta
                ->orWhere('novelties_types.name','like',"%{$search}%")
                ->whereIn('company_id',$empresas_user); 
                $clausulas = $consulta
                ->orWhere('users.name','like',"%{$search}%")
                ->whereIn('company_id',$empresas_user); 
                $clausulas = $consulta
                ->orWhere('novelties_watchmen.created_at','like',"%{$search}%")
                ->whereIn('company_id',$empresas_user);  
                
                $inp_search = strtolower($search);
                $busqueda = '';
                if (stristr('Por Gestionar', $inp_search)) {
                    $busqueda = '%0%';
                } else if (stristr('Novedad Gestionada', $inp_search)) {
                    $busqueda = '%1%';
                }
                $clausulas = $consulta
                ->orWhere('novelties_watchmen.state', 'like', $busqueda)
                ->whereIn('company_id',$empresas_user); 
            }
            $totalFiltered = $clausulas->count();
            $posts = $clausulas->offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }

        $data = array();
        if($posts){
            foreach($posts as $r){
                $guardaIn = User::where('id',$r->incoming_name_id)->get()->pluck('name');
                $nestedData['incoming_name'] = !empty($guardaIn[0])?$guardaIn[0]:'';
                $guardaOut = User::where('id',$r->outgoing_name_id)->get()->pluck('name');
                $nestedData['outgoing_name'] = !empty($guardaOut[0])?$guardaOut[0]:'';
                $nestedData['id'] = $r->id;
                $nestedData['crypt_id'] = Crypt::encryptString($r->id);
                $nestedData['tipo_novedad'] = $r->tipo_novedad;
                $nestedData['description'] = $r->description;
                $nestedData['created_at'] = date('d-m-Y g:i:s a',strtotime($r->created_at));
                $nestedData['guarda'] = $r->guarda;
                $nestedData['supervisor'] = User::find($r->managed_by)->name??'';
                $nestedData['image'] = $r->image;
                $nestedData['action'] = $r;

                if ($r->state == 1) 
                    $nestedData['state'] = '<div class="badge bg-success rounded-pill text-light p-2"><span>Novedad Gestionada</span></div>';
                else
                    $nestedData['state'] = '<div class="badge bg-danger rounded-pill text-light p-2"><span>Por Gestionar</span></div>';
               
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

        $tipos_novedades =  NoveltyType::where('delegate_id',1)->get()->pluck('name','id');
        //usuarios cuando tienen el rol de guarda
        $usuarios =  User::whereHas('roles', function($q){
            $q->where('name', 'guarda');
        })->get()->pluck('name','id');

                // ***************Pedir actualización de perfil solo a guardas cada 3 meses**********************

        $fecha90d = date('Y-m-d G:i:s');
        $fecha90d = date('Y-m-d G:i:s', strtotime($fecha90d.'- 90 days'));

        $user =  User::
        whereHas('roles', function($q){
        $q->where('name', 'guarda');
        })
        ->where('id',Auth::user()->id)
        ->first();
        $guarda = $user;
        $ciudades = Ciudad::select(DB::raw("CONCAT(nombre,' - ',departamento) as display_name"), "id")->pluck('display_name','id');

        if($user != null && ($fecha90d > $user->last_date_update || $user->last_date_update == null))
        return view('users.edit', compact('user','ciudades','guarda'));
    else
        return view('noveltieswatchmen.create',compact('tipos_novedades','usuarios'));
    }

    public function store(Request $request){
        DB::beginTransaction();
        try{
        ini_set('post_max_size', 100);

        // Directorio Destino
        $path = public_path('image/novedadesGuardas');
            // comprobar existencia de la carpeta. Si no existe, se crea con permisos.
            if (!file_exists($path)) 
                mkdir($path, 0777, true);
        // Archivo
        $file = $request->file('img_novedad1');
        //Extension
        if (!empty($file)) {
        //Nuevo Nombre
        $nombre_file = HelpersClass::utf8_remplace(strtolower($file->getClientOriginalName()));
        //Si no esta vacio el input.
            $file->move($path, (date('d_m_Y G_i_s') . '.' . $nombre_file));
        }

        $noveltyT = new NoveltyWatchmen;
        $noveltyT->novelty_type_id = $request->tipo_novedad_id;
        $noveltyT->incoming_name_id = $request->nombre_entrante;
        $noveltyT->outgoing_name_id = $request->nombre_saliente;
        $noveltyT->type = $request->jornada;
        $noveltyT->novelty_type_name = $request->tipo_novedad;
        if (!empty($file))
            $noveltyT->image = date('d_m_Y G_i_s') . '.' . $nombre_file;
        $noveltyT->name_involved = $request->nombre_afectado;
        $noveltyT->data_involved = $request->datos_afectado;
        $noveltyT->description = $request->descripcion;
        $empresa_usuario = EmpresaUser::where('user_id',Auth::user()->id)->pluck('empresa_id');
        $noveltyT->company_id = $empresa_usuario[0];
        $noveltyT->user_id = Auth::user()->id;
        $noveltyT->save();
        DB::commit();
            return 1;
        }catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }
    public function update(Request $request)
    {
        // validar campos vacíos
        if($request->observation == null)
        return 0;
        
        //validar si tiene los permisos
        if (!Auth::user()->hasrole('root') && !Auth::user()->can('gestionar_novedad_guarda'))
        return 1;

        DB::beginTransaction();
        try{
           $nw = NoveltyWatchmen::find($request->id);
           $nw->observation = $request->observation;
           $nw->managed_by = Auth::user()->id;
           $nw->state = 1; // pasa a estado "Novedad Gestionada"
           $nw->save();
        DB::commit();
            return 2;
        }catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }
}
