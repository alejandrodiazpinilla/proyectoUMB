<?php

namespace App\Http\Controllers;

use Auth;
use Flash;
use Response;
use App\Models\Area;
use App\Models\NoveltyType;
use Illuminate\Http\Request;
use App\Models\DelegateNovelty;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class NoveltyTypeController extends Controller{

    public function __construct(){
        $this->middleware('auth');
		$this->middleware('role_or_permission:root|mostrar_tipo_novedades|crear_tipo_novedad|actualizar_tipo_novedad', ['only' => ['index','store','update']]);
    }

    public function index(){
        $areas = Area::whereNotIn('id',[1])->orderBy('nombre')->pluck('nombre','id');
        $encargados = DelegateNovelty::orderBy('name')->pluck('name','id');

        return view('noveltiestypes.index',compact('areas','encargados'));
    }

    public function noveltyTypesIndex(Request $request){
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'area_id',
            3 => 'delegate_id',
            4 => 'action'
        );

        $consulta = DB::table('novelties_types')
            ->join('areas', 'areas.id', '=', 'novelties_types.area_id')
            ->join('delegate_novelties', 'delegate_novelties.id', '=', 'novelties_types.delegate_id')
            ->select('novelties_types.*','areas.nombre AS area','delegate_novelties.name AS delegate');
        
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
            ->where('novelties_types.id', 'like', "%{$search}%");
            $clausulas = $consulta
            ->orWhere('novelties_types.name', 'like', "%{$search}%");
            $clausulas = $consulta
            ->orWhere('areas.nombre','like',"%{$search}%");
            $clausulas = $consulta
            ->orWhere('delegate_novelties.name','like',"%{$search}%");
            
            $totalFiltered = $clausulas->count();
            $posts = $clausulas->offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }       

        $data = array();

        if($posts){
            foreach($posts as $r){
                $nestedData['id'] = $r->id;
                $nestedData['name'] = $r->name;
                $nestedData['area_id'] = $r->area_id;
                $nestedData['area'] = $r->area;
                $nestedData['delegate_id'] = $r->delegate_id;
                $nestedData['delegate'] = $r->delegate;
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
        $noveltyT = new NoveltyType;
        $noveltyT->name = $request->nombre;
        $noveltyT->area_id = $request->area;
        $noveltyT->delegate_id = $request->encargado;
        $noveltyT->user_id = Auth::user()->id;
        $noveltyT->save();
            DB::commit();
            return 1;
        }catch (\Throwable $th) {
            $error = $th->getMessage();
            DB::rollback();
            return $error;
        }
    }

    public function update($id, Request $request){
        DB::beginTransaction();
        try{
            $noveltyT = NoveltyType::find($id);
            $noveltyT->name = $request->nombre_edit;
            $noveltyT->area_id = $request->area_edit;
            $noveltyT->delegate_id = $request->encargado_edit;
            $noveltyT->user_id = Auth::user()->id;
            $noveltyT->save();
            DB::commit();
            return 1;
        }catch (\Throwable $th) {
            $error = $th->getMessage();
            DB::rollback();
            return $error;
        }
    }
}
