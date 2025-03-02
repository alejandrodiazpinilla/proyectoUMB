<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Locality;
use App\Models\Ciudad;
use Auth;

class LocalityController extends Controller{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role_or_permission:root|mostrar_localidades|crear_localidad|actualizar_localidad', ['only' => ['index','store','update']]);
    }

    public function index(){
        $ciudades = Ciudad::select(DB::raw("CONCAT(nombre,' - ',departamento) as display_name"), "id")->orderBy('display_name')->pluck('display_name', 'id');
         return view('localities.index',compact('ciudades'));
    }

    public function localitiesIndex(Request $request){

        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');

        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'ciudad',
            3 => 'action'
        );

        $consulta = DB::table('localities')
        ->join('ciudades', 'ciudades.id', '=', 'localities.ciudad_id')
        ->select('localities.*','ciudades.nombre as ciudad');

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
            $clausulas = $consulta->where('localities.id','like',"%{$search}%");
            $clausulas = $consulta->orWhere('localities.name','like',"%{$search}%");
            $clausulas = $consulta->orWhere('ciudades.nombre','like',"%{$search}%");

            $totalFiltered = $clausulas->count();
            $posts = $clausulas->offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }       

        $data = array();

        if($posts){
            foreach($posts as $r){
                $nestedData['id'] = $r->id;
                $nestedData['name'] = $r->name;
                $nestedData['ciudad'] = $r->ciudad;
                $nestedData['ciudad_id'] = $r->ciudad_id;
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
        if ($request->nombre == null || $request->ciudad == null) {
            return 0;
        }

        //Tratamiento de Variables.
        $nombre = trim($request->nombre);

        //Validador Duplicidad
        $unique_key = Locality::where('name',$nombre)
        ->where('ciudad_id',$request->ciudad)->count();
        if ($unique_key >= 1) {
            return 1;
        }

        //Insercion de datos a la base de datos.
        DB::beginTransaction();
        try{
            $localidad = new Locality;
            $localidad->name = $nombre;
            $localidad->ciudad_id = $request->ciudad;
            $localidad->user_id = Auth::user()->id;
            $localidad->save();
            DB::commit();
            return 2;
        }catch (\Throwable $th) {
            DB::rollback();
            return response()->json($th->getMessage());
        }
    }

    public function update($id, Request $request){

        //Validador Null. 
        if ($request->nombre_edit == null || $request->ciudad_edit == null) {
            return 0;
        }

        //Tratamiento de Variables.
        $nombre_edit = trim($request->nombre_edit);

        //Validador Duplicidad
        $unique_key = Locality::where('name',$nombre_edit)
        ->where('ciudad_id',$request->ciudad_edit)
        ->where('id','<>',$id)->count();
        if ($unique_key >= 1) {
            return 1;
        }
        
        //Insercion de datos a la base de datos.
        DB::beginTransaction();
        try{
            $localidad = Locality::find($id); 
            $localidad->name = $nombre_edit;
            $localidad->ciudad_id = $request->ciudad_edit;
            $localidad->user_id = Auth::user()->id;
            $localidad->save();
            DB::commit();
            return 2;
        }catch (\Throwable $th) {
            DB::rollback();
            return response()->json($th->getMessage());
        }
    }
}
