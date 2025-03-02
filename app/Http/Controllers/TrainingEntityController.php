<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\TrainingEntity;
use Illuminate\Support\Facades\DB;

class TrainingEntityController extends Controller{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role_or_permission:root|mostrar_entidades_formacion|crear_entidad_formacion|actualizar_entidad_formacion', ['only' => ['index','update','store']]);
    }

    public function index(){
        return view('trainingentities.index');
    }

    public function trainingEntitiesIndex(Request $request){
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'state',
            3 => 'action'
        );

        $totalData = TrainingEntity::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value'))){
            $posts = TrainingEntity::offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
            $totalFiltered = TrainingEntity::count();
        }else{
            $search = $request->input('search.value');
            $inp_search = strtolower($search);
            $busqueda = '';
            if (stristr('Activo', $inp_search)) {
                $busqueda = '%1%';
            } else if (stristr('Inactivo', $inp_search)) {
                $busqueda = '%0%';
            }
                
            $posts = TrainingEntity::where('id', 'like', "%{$search}%")
            ->orWhere('name','like',"%{$search}%")
            ->orWhere('state', 'like', $busqueda)
            ->orWhere('created_at','like',"%{$search}%")
            ->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();                                
            $totalFiltered = TrainingEntity::where('id', 'like', "%{$search}%")
            ->orWhere('name','like',"%{$search}%")
            ->orWhere('created_at','like',"%{$search}%")
            ->orWhere('state', 'like', $busqueda)
            ->count();
        }       

        $data = array();

        if($posts){
            foreach($posts as $r){
                $nestedData['id'] = $r->id;
                $nestedData['name'] = $r->name;
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
        try{
            DB::beginTransaction();
        $val = new TrainingEntity;
        $val->name = $request->name;
        $val->user_id = Auth::user()->id;
        $val->save();
            DB::commit();
            return response()->json(['status' => '200', 'msg' => 'creado']);
        }catch (\Throwable $th) {
            DB::rollback();
            return response()->json($th->getMessage());
        }
    }

    public function update($id, Request $request){
        try{
            DB::beginTransaction();
            $val = TrainingEntity::find($id);
            $val->name = $request->name;
            $val->user_id = Auth::user()->id;
            $val->save();
            DB::commit();
            return response()->json(['status' => '200', 'msg' => 'actualizado']);
        }catch (\Throwable $th) {
            DB::rollback();
            return response()->json($th->getMessage());
        }
    }
    public function destroy($id){
        $val = TrainingEntity::find($id);
        if(!empty($val)){
            if ($val->state == 0) {
                $val->state = 1;
                $msg = 'Activado';
            }else{
                $val->state = 0;
                $msg = 'Bloqueado';
            }
            $val->save();
            return response()->json(['status' => '200', 'msg' => $msg]);
        }else{
            return response()->json(['status' => '500', 'msg' => 'Error']);
        }
    }
}
