<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Ciudad;
use Auth;

class CiudadController extends Controller{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role_or_permission:root|mostrar_ciudades|crear_ciudad|actualizar_ciudad', ['only' => ['index','update','store']]);
    }

    public function index(){
         return view('ciudades.index');
    }

    public function ciudadesIndex(Request $request){

        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');

        $columns = array(
            0 => 'id',
            1 => 'nombre',
            2 => 'departamento',
            3 => 'action'
        );

        $consulta = DB::table('ciudades')
        ->select('id','nombre','departamento','user_id');

        $totalData= $consulta->count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value'))){
            $posts = $consulta->offset($start)->limit($limit)->orderBy($order, $dir)->get();
            $totalFiltered = $totalData;
        }else{
            $search = $request->input('search.value'); 
            $clausulas = $consulta->where('id','like',"%{$search}%");
            $clausulas = $consulta->orWhere('nombre','like',"%{$search}%");
            $clausulas = $consulta->orWhere('departamento','like',"%{$search}%");

            $totalFiltered = $clausulas->count();
            $posts = $clausulas->offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }       

        $data = array();

        if($posts){
            foreach($posts as $r){
                $nestedData['id'] = $r->id;
                $nestedData['nombre'] = $r->nombre;
                $nestedData['departamento'] = $r->departamento;
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
        if ($request->nombre_ciudad == null || $request->nombre_departamento == null) {
            return 0;
        }

        //Tratamiento de Variables.
        $nombre_ciudad = trim(strtoupper($request->nombre_ciudad));
        $nombre_departamento = trim(strtoupper($request->nombre_departamento));

        //Validador Duplicidad
        $unique_key = Ciudad::where('nombre',$nombre_ciudad)
        ->where('departamento',$nombre_departamento)->count();
        if ($unique_key >= 1) {
            return 1;
        }

        //Insercion de datos a la base de datos.
        DB::beginTransaction();
        try{
            $ciudad = new Ciudad;
            $ciudad->nombre = $nombre_ciudad;
            $ciudad->departamento = $nombre_departamento;
            $ciudad->user_id = Auth::user()->id;
            $ciudad->save();
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
        if ($request->nombre_ciudad_edit == null || $request->nombre_departamento_edit == null) {
            return 0;
        }

        //Tratamiento de Variables.
        $nombre_ciudad_edit = trim(strtoupper($request->nombre_ciudad_edit));
        $nombre_departamento_edit = trim(strtoupper($request->nombre_departamento_edit));

        //Validador Duplicidad
        $unique_key = Ciudad::where('nombre',$nombre_ciudad_edit)
        ->where('departamento',$nombre_departamento_edit)->where('id','<>',$id)->count();
        if ($unique_key >= 1) {
            return 1;
        }
        
        //Insercion de datos a la base de datos.
        DB::beginTransaction();
        try{
            $ciudad = Ciudad::find($id); 
            $ciudad->nombre = $nombre_ciudad_edit;
            $ciudad->departamento = $nombre_departamento_edit;
            $ciudad->user_id = Auth::user()->id;
            $ciudad->save();
            DB::commit();
            return 2;
        }catch (\Throwable $th) {
            $success = false;
            $errors = $th->getMessage();
            DB::rollback();
            return response()->json($errors);
        }
    }
}
