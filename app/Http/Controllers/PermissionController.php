<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HelpersClass;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
		$this->middleware('role_or_permission:root|mostrar_permisos', ['only' => ['index','store','update']]);
    }

    public function index(){
        $permissions = Permission::all();
        return view('permissions.index',compact('permissions'));
    }

    public function permissionsIndex(Request $request){
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');
        $columns = array(
            0 => 'display_name',
            1 => 'action'
        );
        $totalData = Permission::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        
        if(empty($request->input('search.value'))){
            $posts = Permission::with(['roles'])
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
            $totalFiltered = Permission::count();
        }else{
            $search = $request->input('search.value');
            $posts = Permission::with(['roles'])
            ->where('display_name', 'like', "%{$search}%")
            ->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();                                
            $totalFiltered = Permission::where('display_name', 'like', "%{$search}%")
            ->count();
        }
        $data = array();
        if($posts){
            foreach($posts as $r){
                $nestedData['display_name'] = $r->display_name;
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
        if ($request->display_name == null) {
            return 0;
        }

        //Tratamiento de Variables.
        $display_name = trim(strtolower(HelpersClass::utf8_remplace($request->display_name)));

        //Validador Duplicidad
        $unique_key = Permission::where('name',$display_name)->count();
        if ($unique_key >= 1) {
            return 1;
        }

        // Cargar a la base de datos
        DB::beginTransaction();
        try{
            $permission = new Permission;
            $permission->name = $display_name;
            $permission->display_name = str_replace('_',' ',$display_name);
            $permission->save();
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
        if ($request->display_name_act == null) {
            return 0;
        }

        //Tratamiento de Variables.
        $display_name_act = trim(strtolower(HelpersClass::utf8_remplace($request->display_name_act)));

        //Validador Duplicidad
        $unique_key = Permission::where('name',$display_name_act)->where('id','<>',$id)->count();
        if ($unique_key >= 1) {
            return 1;
        }

        DB::beginTransaction();
        try{
            $permission = Permission::find($id);
            $permission->name = $display_name_act;
            $permission->display_name = str_replace('_',' ',$display_name_act);
            $permission->save();
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
