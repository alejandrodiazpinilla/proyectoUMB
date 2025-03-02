<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\DelegateNovelty;
use Auth;

class DelegateNoveltyController extends Controller{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role_or_permission:root|mostrar_encargado_novedades|crear_encargado_novedad|actualizar_encargado_novedad', ['only' => ['index','update','store']]);
    }

    public function index(){
        return view('delegatesnovelties.index');
    }

    public function delegatesNoveltiesIndex(Request $request){
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'action'
        );

        $totalData = DelegateNovelty::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value'))){
            $posts = DelegateNovelty::offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
            $totalFiltered = DelegateNovelty::count();
        }else{
            $search = $request->input('search.value');
            $posts = DelegateNovelty::where('id', 'like', "%{$search}%")
            ->orWhere('name','like',"%{$search}%")
            ->orWhere('created_at','like',"%{$search}%")
            ->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();                                
            $totalFiltered = DelegateNovelty::where('id', 'like', "%{$search}%")
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
        DB::beginTransaction();
        try{
        $encargado = new DelegateNovelty;
        $encargado->name = $request->nombre_encargado;
        $encargado->user_id = Auth::user()->id;
        $encargado->save();
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
            $encargado = DelegateNovelty::find($id);
            $encargado->name = $request->nombre_encargado_edit;
            $encargado->user_id = Auth::user()->id;
            $encargado->save();
            DB::commit();
            return 1;
        }catch (\Throwable $th) {
            $error = $th->getMessage();
            DB::rollback();
            return $error;
        }
    }
}
