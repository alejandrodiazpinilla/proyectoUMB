<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Neighborhood;
use App\Models\Locality;
use App\Models\Ciudad;
use Auth;

class NeighborhoodController extends Controller{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role_or_permission:root|mostrar_barrios|crear_barrio|actualizar_barrio', ['only' => ['index','update','store']]);
    }

    public function index(){
        $ciudades = Ciudad::select(DB::raw("CONCAT(nombre,' - ',departamento) as display_name"), "id")->orderBy('display_name')->pluck('display_name', 'id');
        $localidades = [];
         return view('neighborhoods.index',compact('ciudades','localidades'));
    }

    public function neighborhoodsIndex(Request $request){

        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');

        $columns = array(
            0 => 'id',
            1 => 'city',
            2 => 'locality',
            3 => 'name',
            4 => 'action'
        );

        $consulta = DB::table('neighborhoods')
        ->join('localities', 'localities.id', '=', 'neighborhoods.locality_id')
        ->join('ciudades', 'ciudades.id', '=', 'localities.ciudad_id')
        ->select('neighborhoods.*','localities.name as locality','ciudades.nombre as city','ciudades.id as ciudad_id');

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
            $clausulas = $consulta->where('neighborhoods.id','like',"%{$search}%");
            $clausulas = $consulta->orWhere('neighborhoods.name','like',"%{$search}%");
            $clausulas = $consulta->orWhere('localities.name','like',"%{$search}%");
            $clausulas = $consulta->orWhere('ciudades.nombre','like',"%{$search}%");

            $totalFiltered = $clausulas->count();
            $posts = $clausulas->offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }       

        $data = array();

        if($posts){
            foreach($posts as $r){
                $nestedData['id'] = $r->id;
                $nestedData['ciudad_id'] = $r->ciudad_id;
                $nestedData['city'] = $r->city;
                $nestedData['name'] = $r->name;
                $nestedData['locality_id'] = $r->locality_id;
                $nestedData['locality'] = $r->locality;
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
        if ($request->nombre == null || $request->localidad == null || $request->ciudad == null) {
            return 0;
        }

        //Tratamiento de Variables.
        $nombre = trim($request->nombre);

        //Validador Duplicidad
        $unique_key = Neighborhood::where('name',$nombre)
        ->where('locality_id',$request->localidad)->count();
        if ($unique_key >= 1) {
            return 1;
        }

        //Insercion de datos a la base de datos.
        DB::beginTransaction();
        try{
            $barrio = new Neighborhood;
            $barrio->name = $nombre;
            $barrio->locality_id = $request->localidad;
            $barrio->user_id = Auth::user()->id;
            $barrio->save();
            DB::commit();
            return 2;
        }catch (\Throwable $th) {
            DB::rollback();
            return response()->json($th->getMessage());
        }
    }

    public function update($id, Request $request){

        //Validador Null. 
        if ($request->nombre_edit == null || $request->localidad_edit == null || $request->ciudad_edit == null) {
            return 0;
        }

        //Tratamiento de Variables.
        $nombre_edit = trim($request->nombre_edit);

        //Validador Duplicidad
        $unique_key = Neighborhood::where('name',$nombre_edit)
        ->where('locality_id',$request->localidad_edit)
        ->where('id','<>',$id)->count();
        if ($unique_key >= 1) {
            return 1;
        }
        
        //Insercion de datos a la base de datos.
        DB::beginTransaction();
        try{
            $barrio = Neighborhood::find($id); 
            $barrio->name = $nombre_edit;
            $barrio->locality_id = $request->localidad_edit;
            $barrio->user_id = Auth::user()->id;
            $barrio->save();
            DB::commit();
            return 2;
        }catch (\Throwable $th) {
            DB::rollback();
            return response()->json($th->getMessage());
        }
    }
}
