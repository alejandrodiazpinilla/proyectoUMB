<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\MaritalStatus;
use Illuminate\Http\Request;
use Response;
use Flash;
use Auth;
class MaritalStatusController extends Controller{

	public function __construct(){
        $this->middleware('auth');
		$this->middleware('role_or_permission:root|mostrar_estado_civil|crear_estado_civil|actualizar_estado_civil', ['only' => ['index','store','update']]);
	}

	public function index(){
		return view('maritalstatus.index');
	}

	public function maritalStatusIndex(Request $request){
		ini_set('max_execution_time', 0);
		ini_set('memory_limit', '-1');
		$columns = array(
			0 => 'id',
			1 => 'name',
			2 => 'action'
		);

		$totalData = MaritalStatus::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');

		if(empty($request->input('search.value'))){
			$posts = MaritalStatus::offset($start)
			->limit($limit)
			->orderBy($order,$dir)
			->get();
			$totalFiltered = MaritalStatus::count();
		}else{
			$search = $request->input('search.value');
			$posts = MaritalStatus::where('id', 'like', "%{$search}%")
			->orWhere('name','like',"%{$search}%")
			->orWhere('created_at','like',"%{$search}%")
			->offset($start)
			->limit($limit)
			->orderBy($order, $dir)
			->get();                                
			$totalFiltered = MaritalStatus::where('id', 'like', "%{$search}%")
			->orWhere('name','like',"%{$search}%")
			->orWhere('created_at','like',"%{$search}%")
			->count();
		}       

		$data = array();

		if($posts){
			foreach($posts as $r){
				$nestedData['id'] = $r->id;
				$nestedData['name'] = $r->name;
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
		$unique_key = MaritalStatus::where('name', $request->nombre)->count();
		if ($unique_key >= 1) {
			return 1;
		}

		DB::beginTransaction();
		try{
			$t_doc = new MaritalStatus;
			$t_doc->name = $request->nombre;
			$t_doc->user_id = Auth::user()->id;
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
		$unique_key = MaritalStatus::where('name', $request->nombre_edit)
		->where('id', '<>', $id)
		->count();


		if ($unique_key >= 1) {
			return 1;
		}

		DB::beginTransaction();
		try{
			$t_doc = MaritalStatus::find($id);
			$t_doc->name = $request->nombre_edit;
			$t_doc->user_id = Auth::user()->id;
			$t_doc->save();
			DB::commit();
			return 2;
		}catch (\Throwable $th) {
			DB::rollback();
			return $th->getMessage();
		}
	}
}
