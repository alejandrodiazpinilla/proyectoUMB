<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\DocumentCategory;
use Illuminate\Http\Request;
use App\Models\DocumentType;
use Response;
use Flash;
use Auth;
class DocumentTypeController extends Controller{

	public function __construct(){
        $this->middleware('auth');
		$this->middleware('role_or_permission:root|mostrar_tipos_de_documentos|crear_tipo_de_documento|actualizar_tipo_de_documento', ['only' => ['index','store','update']]);
	}

	public function index(){
		$categorias = DocumentCategory::all()->pluck('name','id');
		return view('documenttypes.index',compact('categorias'));
	}

	public function documentTypesIndex(Request $request){
		ini_set('max_execution_time', 0);
		ini_set('memory_limit', '-1');
		$columns = array(
			0 => 'id',
			1 => 'name',
			2 => 'abbreviation',
			3 => 'action'
		);

		$totalData = DocumentType::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');

		if(empty($request->input('search.value'))){
			$posts = DocumentType::offset($start)
			->limit($limit)
			->orderBy($order,$dir)
			->get();
			$totalFiltered = DocumentType::count();
		}else{
			$search = $request->input('search.value');
			$posts = DocumentType::where('id', 'like', "%{$search}%")
			->orWhere('name','like',"%{$search}%")
			->orWhere('abbreviation','like',"%{$search}%")
			->orWhere('created_at','like',"%{$search}%")
			->offset($start)
			->limit($limit)
			->orderBy($order, $dir)
			->get();                                
			$totalFiltered = DocumentType::where('id', 'like', "%{$search}%")
			->orWhere('name','like',"%{$search}%")
			->orWhere('abbreviation','like',"%{$search}%")
			->orWhere('created_at','like',"%{$search}%")
			->count();
		}       

		$data = array();

		if($posts){
			foreach($posts as $r){
				$nestedData['id'] = $r->id;
				$nestedData['name'] = $r->name;
				$nestedData['abbreviation'] = $r->abbreviation;
				$nestedData['document_category_id'] = $r->document_category_id;
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
		if ($request->nombre == null || $request->abreviacion == null || $request->categoria == null) {
			return 0;
		}

//Validador Duplicidad
		$unique_key = DocumentType::where('name', $request->nombre)->where('document_category_id', $request->categoria)->count();
		if ($unique_key >= 1) {
			return 1;
		}

		DB::beginTransaction();
		try{
			$t_doc = new DocumentType;
			$t_doc->name = $request->nombre;
			$t_doc->abbreviation = $request->abreviacion;
			$t_doc->document_category_id = $request->categoria;
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
		if ($request->nombre_edit == null || $request->abreviacion_edit == null || $request->categoria_edit == null) {
            return 0;
		}

//Validador Duplicidad
$unique_key = DocumentType::where('name', $request->nombre_edit)
->where('id', '<>', $id)
->count();


		if ($unique_key >= 1) {
			return 1;
		}

		DB::beginTransaction();
		try{
			$t_doc = DocumentType::find($id);
			$t_doc->name = $request->nombre_edit;
			$t_doc->abbreviation = $request->abreviacion_edit;
			$t_doc->document_category_id = $request->categoria_edit;
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
