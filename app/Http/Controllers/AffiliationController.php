<?php

namespace App\Http\Controllers;

use Auth;
use Flash;
use Response;
use App\Models\User;
use App\Models\Employe;
use App\Models\Affiliation;
use Illuminate\Http\Request;
use App\Models\EmployeAffiliation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Models\AffiliationNotification;
use Illuminate\Support\Facades\Storage;

class AffiliationController extends Controller{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role_or_permission:root|mostrar_afiliaciones|crear_afiliacion|actualizar_afiliacion', ['only' => ['index','update','store']]);
    }

    public function index(){
        return view('affiliations.index');
    }

    public function affiliationsIndex(Request $request){
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'action'
        );

        $totalData = Affiliation::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value'))){
            $posts = Affiliation::offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
            $totalFiltered = Affiliation::count();
        }else{
            $search = $request->input('search.value');
            $posts = Affiliation::where('id', 'like', "%{$search}%")
            ->orWhere('name','like',"%{$search}%")
            ->orWhere('created_at','like',"%{$search}%")
            ->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();                                
            $totalFiltered = Affiliation::where('id', 'like', "%{$search}%")
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
        $afiliacion = new Affiliation;
        $afiliacion->name = $request->nombre_afiliacion;
        $afiliacion->user_id = Auth::user()->id;
        $afiliacion->save();
            DB::commit();
            return 1;
        }catch (\Throwable $th) {
            $success = false;
            DB::rollback();
            return $th->getMessage();;
        }
    }

    public function update($id, Request $request){
        DB::beginTransaction();
        try{
            $afiliacion = Affiliation::find($id);
            $afiliacion->name = $request->nombre_afiliacion_edit;
            $afiliacion->user_id = Auth::user()->id;
            $afiliacion->save();
            DB::commit();

        }catch (\Throwable $th) {
            $success = false;
            DB::rollback();
            return $th->getMessage();;
        }
    }
    public function destroy($id){
        $afiliacion = Affiliation::find($id);
        if(!empty($afiliacion)){
            if ($afiliacion->state == 0) {
                $afiliacion->state = 1;
            }else{
                $afiliacion->state = 0;
            }
            $afiliacion->save();
            return 1;
        }else{
            return 0;
        }
    }
}
