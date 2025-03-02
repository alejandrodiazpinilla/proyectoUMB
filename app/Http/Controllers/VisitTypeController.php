<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\VisitType;
use Auth;

class VisitTypeController extends Controller{

	public function __construct(){
        $this->middleware('auth');
		$this->middleware('role_or_permission:root|mostrar_tipo_visitas|crear_tipo_visita|actualizar_tipo_visita', ['only' => ['index','store','update']]);
		$this->middleware('role_or_permission:root|bloquear_tipo_visita', ['only' => ['destroy']]);
	}

	public function index(){
		return view('visittypes.index');
	}

	public function VisitTypeIndex(Request $request){

        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');
        
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'module',
            3 => 'state',
            4 => 'action'
        );

		$consulta = DB::table('visit_types');

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
			$clausulas = $consulta
			->where('visit_types.id', 'like', "%{$search}%");
			$clausulas = $consulta
			->orWhere('visit_types.name','like',"%{$search}%");
			$clausulas = $consulta
			->orWhere('visit_types.module','like',"%{$search}%");
			$inp_search = strtolower($search);
			$busqueda = '';
			if (stristr('Activo', $inp_search)) {
				$busqueda = '%1%';
			} else if (stristr('Inactivo', $inp_search)) {
				$busqueda = '%0%';
			}
			$clausulas = $consulta
			->orWhere('visit_types.state', 'like', $busqueda);
            $totalFiltered = $clausulas->count();
            $posts = $clausulas->offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }

        $data = array();
        if($posts){
            foreach($posts as $r){
                $nestedData['id'] = $r->id;
                $nestedData['name'] = $r->name;
                $nestedData['module'] = $r->module;
                if ($r->state == 1) {
                    $nestedData['state'] = '<div class="badge bg-success rounded-pill text-light p-2"><span>Activo</span></div>';
                } else {
                    $nestedData['state'] = '<div class="badge bg-danger rounded-pill text-light p-2"><span>Inactivo</span></div>';
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
		if ($request->nombre == null) {
			return 0;
		}

//Validador Duplicidad
		$unique_key = VisitType::where('name', $request->nombre)->where('module',$request->module)->count();
		if ($unique_key >= 1) {
			return 1;
		}

		DB::beginTransaction();
		try{
			$t_doc = new VisitType;
			$t_doc->name = $request->nombre;
			$t_doc->module = $request->module;
			$t_doc->save();
			DB::commit();
			return 2;
		}catch (\Throwable $th) {
			DB::rollback();
			return $th->getMessage();
		}
	}

	public function update($id, Request $request){
		
        //Validador Null. 
		if ($request->nombre_edit == null) {
			return 0;
		}

//Validador Duplicidad
		$unique_key = VisitType::where('name', $request->nombre_edit)
		->where('module',$request->module)
		->where('id', '<>', $id)
		->count();


		if ($unique_key >= 1) {
			return 1;
		}

		DB::beginTransaction();
		try{
			$t_doc = VisitType::find($id);
			$t_doc->name = $request->nombre_edit;
			$t_doc->module = $request->module_edit;
			$t_doc->save();
			DB::commit();
			return 2;
		}catch (\Throwable $th) {
			DB::rollback();
			return $th->getMessage();
		}
	}

	public function destroy(Request $request){
        $v = VisitType::find($request->id);
        if(!empty($v)){
            if($v->state==1){
                $v->state = 0;
            }else{
                $v->state = 1;
            }
            $v->save();
            return 1;
        }else{
            return 0;
        }
    }
}
