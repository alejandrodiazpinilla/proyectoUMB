<?php

namespace App\Http\Controllers;


use App\Models\Area;
use App\Models\Empresa;
use App\Models\EmpresaUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AreaController extends Controller{

	public function __construct(){
        $this->middleware('auth');
        $this->middleware('role_or_permission:root|mostrar_areas|crear_area|actualizar_area|bloquear_area', ['only' => ['index','store','update','destroy']]);
	}

    public function index(){
        if(Auth::user()->hasRole('root')){
            $empresas =  Empresa::all()->pluck('nombre','id');
        } else {
            $empresas_user = EmpresaUser::where('user_id',Auth::user()->id)->pluck('empresa_id');
            $empresas =  Empresa::whereIn('id',$empresas_user)->pluck('nombre','id');
        }
    	return view('areas.index',['empresas' => $empresas]);
    }

    public function areasIndex(Request $request){

        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');
        
        $columns = array(
            0 => 'id',
            1 => 'nombre',
            2 => 'empresa',
            3 => 'estado',
            4 => 'action'
        );

        $consulta = DB::table('areas')
        ->join('empresas', 'empresas.id', '=', 'areas.empresa_id')
        ->select('areas.id AS id', 'areas.nombre AS nombre', 'areas.empresa_id AS empresa_id','empresas.nombre AS empresa','areas.estado AS estado');

        if(!Auth::user()->hasRole('root')){
            $empresas_user = EmpresaUser::where('user_id',Auth::user()->id)->pluck('empresa_id');
            $consulta = $consulta->whereIn('areas.empresa_id',$empresas_user);
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
                ->where('areas.id', 'like', "%{$search}%");
                $clausulas = $consulta
                ->orWhere('areas.nombre','like',"%{$search}%");
                $clausulas = $consulta
                ->orWhere('empresas.nombre','like',"%{$search}%");
                $inp_search = strtolower($search);
                $busqueda = '';
                if (stristr('Activo', $inp_search)) {
                    $busqueda = '%1%';
                } else if (stristr('Inactivo', $inp_search)) {
                    $busqueda = '%0%';
                }
                $clausulas = $consulta
                ->orWhere('areas.estado', 'like', $busqueda);
            } else {
                $clausulas = $consulta
                ->where('areas.id', 'like', "%{$search}%")
                ->whereIn('areas.empresa_id',$empresas_user);
                $clausulas = $consulta
                ->orWhere('areas.nombre','like',"%{$search}%")
                ->whereIn('areas.empresa_id',$empresas_user);
                $clausulas = $consulta
                ->orWhere('empresas.nombre','like',"%{$search}%")
                ->whereIn('areas.empresa_id',$empresas_user);

                $inp_search = strtolower($search);
                $busqueda = '';
                if (stristr('Activo', $inp_search)) {
                    $busqueda = '%1%';
                } else if (stristr('Inactivo', $inp_search)) {
                    $busqueda = '%0%';
                }
                $clausulas = $consulta
                ->orWhere('areas.estado', 'like', $busqueda)
                ->whereIn('areas.empresa_id',$empresas_user);
            }
            $totalFiltered = $clausulas->count();
            $posts = $clausulas->offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }

        $data = array();
        if($posts){
            foreach($posts as $r){
                $nestedData['id'] = $r->id;
                $nestedData['nombre'] = $r->nombre;
                $nestedData['empresa'] = $r->empresa;
                if ($r->estado == 1) {
                    $nestedData['estado'] = '<div class="badge bg-success rounded-pill text-light p-2"><span>Activo</span></div>';
                } else {
                    $nestedData['estado'] = '<div class="badge bg-danger rounded-pill text-light p-2"><span>Inactivo</span></div>';
                }
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

        //Validador Null. 
        if ($request->nombre_area == null || $request->empresa_id == null) {
            // Campos Nulos
            return 0;
        }

        //Tratamiento de Variables.
        $nombre_area = trim(ucwords(strtolower($request->nombre_area)));

        //Validador Duplicidad
        $unique_key = Area::where('nombre',$nombre_area)
        ->where('empresa_id',$request->empresa_id)->count();
        if ($unique_key >= 1) {
            return 1;
        }

        //Insercion de datos a la base de datos.
        DB::beginTransaction();
        try{
            $area = new Area;
            $area->nombre = $nombre_area;
            $area->user_id = Auth::user()->id;
            $area->empresa_id = $request->empresa_id;
            $area->save();
            DB::commit();
            return 2;
        }catch (\Throwable $th) {
            $success = false;
            $errors = $th->getMessage();
            DB::rollback();
            return response()->json($errors);
        }
    }

    public function update($id, Request $request){

        //Validador Null.
        if ($request->nombre_area_edit == null || $request->empresa_id_edit == null) {
            // Campos Nulos
            return 0;
        }

        //Tratamiento de Variables.
        $nombre_area_edit = trim(ucwords(strtolower($request->nombre_area_edit)));
        $empresa_id_edit = $request->empresa_id_edit;

        //Validador Duplicidad
        $unique_key = Area::where('nombre',$request->nombre_area_edit)
        ->where('empresa_id',$request->empresa_id_edit)->where('id','<>',$id)->count();

        if ($unique_key >= 1) {
            return 1;
        }

        //Insercion de datos a la base de datos.
        DB::beginTransaction();
        try{
            $area = Area::find($id);
            $area->nombre = $nombre_area_edit;
            $area->user_id = Auth::user()->id;
            $area->empresa_id = $empresa_id_edit;
            $area->save();
            DB::commit();
            return 2;
        }catch (\Throwable $th) {
            $success = false;
            $errors = $th->getMessage();
            DB::rollback();
            return response()->json($errors);
        }
    }

    public function destroy(Request $request){
        $area = Area::find($request->id);
        if(!empty($area)){
            if($area->estado==1){
                $area->estado = 0;
            }else{
                $area->estado = 1;
            }
            $area->save();
            return 1;
        }else{
            return 0;
        }
    }
}
