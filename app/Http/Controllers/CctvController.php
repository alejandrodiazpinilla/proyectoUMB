<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Cctv;
use App\Models\User;
use App\Models\Customer;
use App\Models\EmpresaUser;
use App\Models\UserCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CctvController extends Controller{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role_or_permission:root|mostrar_cctv|crear_cctv|actualizar_cctv', ['only' => ['index','store','update']]);
    }

    public function index(){
        if (Auth::user()->hasRole('root')) {
            $clientes =  Customer::pluck('name', 'id')->toArray();
        } else {
            $empresas_user = EmpresaUser::where('user_id', Auth::user()->id)->pluck('empresa_id');
            $clientes =  Customer::whereIn('company_id', $empresas_user)->pluck('name', 'id')->toArray();
        }
        return view('cctv.index',compact('clientes'));
    }

    public function cctvIndex(Request $request){
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');
        $columns = array(
            0 => 'id',
            1 => 'user',
            2 => 'customer',
            3 => 'current_damage',
            4 => 'next_visit_date',
            5 => 'created_at',
            6 => 'action'
        );

        $consulta = DB::table('cctv_activities')
        ->join('customers', 'customers.id', 'cctv_activities.customer_id')
        ->join('users', 'users.id', 'cctv_activities.user_id')
        ->select(
            'cctv_activities.*', 
            'cctv_activities.id AS id', 
            'customers.name AS customer',
            'users.name AS user',
            DB::raw('DATE_FORMAT(cctv_activities.created_at, "%d-%m-%Y %H:%m:%s") AS created_at'),
        );
        if(!Auth::user()->hasRole('root')){
            $empresas_user = EmpresaUser::where('user_id',Auth::user()->id)->pluck('empresa_id');
            $consulta = $consulta->whereIn('company_id',$empresas_user);
        }

        // identificar si el usuario es un cliente
        $usuarioCliente =  User::
        whereHas('roles', function($q){
            $q->where('name', 'cliente');
        })
        ->where('id',Auth::user()->id)
        ->first();

        // mostrar solo los registros asociados al mismo
        if($usuarioCliente != null){
            $clientes = UserCustomer::where('user_id',Auth::user()->id)->pluck('customer_id');
            $consulta = $consulta->whereIn('customer_id',$clientes);
        }
        
        // Valores para datatable
        $totalData= $consulta->count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value'))){
            $posts = $consulta->offset($start)->limit($limit)->orderBy($order,$dir)->get();
            $totalFiltered = $totalData;
        } else{
        $search = $request->input('search.value');
        if(Auth::user()->hasRole('root')){
            $clausulas = $consulta
            ->where('cctv_activities.id', 'like', "%{$search}%");
            $clausulas = $consulta
            ->orWhere('users.name','like',"%{$search}%");
            $clausulas = $consulta
            ->orWhere('customers.name','like',"%{$search}%");
            $clausulas = $consulta
            ->orWhere('cctv_activities.current_damage','like',"%{$search}%");
            $clausulas = $consulta
            ->orWhere('cctv_activities.next_visit_date','like',"%{$search}%");
            $clausulas = $consulta
            ->orWhere(DB::raw('DATE_FORMAT(cctv_activities.created_at, "%d-%m-%Y %H:%m:%s")'),'like',"%{$search}%");
        } else {
            $clausulas = $consulta
            ->where('cctv_activities.id', 'like', "%{$search}%")
            ->whereIn('company_id',$empresas_user);
            $clausulas = $consulta
            ->orWhere('users.name','like',"%{$search}%")
            ->whereIn('company_id',$empresas_user);
            $clausulas = $consulta
            ->orWhere('customers.name','like',"%{$search}%")
            ->whereIn('company_id',$empresas_user); 
            $clausulas = $consulta
            ->orWhere('cctv_activities.current_damage','like',"%{$search}%")
            ->whereIn('company_id',$empresas_user);
            $clausulas = $consulta
            ->orWhere('cctv_activities.next_visit_date','like',"%{$search}%")
            ->whereIn('company_id',$empresas_user);
            $clausulas = $consulta
            ->orWhere(DB::raw('DATE_FORMAT(cctv_activities.created_at, "%d-%m-%Y %H:%m:%s")'),'like',"%{$search}%")
            ->whereIn('company_id',$empresas_user);
        }
        
        $totalFiltered =$totalData;
        $posts = $clausulas->offset($start)->limit($limit)->orderBy($order, $dir)->get();
    }   

        $data = array();

        if($posts){
            foreach($posts as $r){
                $nestedData['permiso_editar'] = (Auth::user()->hasrole('root') || Auth::user()->can('actualizar_cctv'));
                $nestedData['id'] = $r->id;
                $nestedData['user'] = $r->user;
                $nestedData['customer'] = $r->customer;
                $nestedData['current_damage'] = $r->current_damage;
                $nestedData['next_visit_date'] = $r->next_visit_date;
                $nestedData['created_at'] = $r->created_at;
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
            $file = $request->file('quotationFile');
            ini_set('post_max_size', 100);
            $fecha = date('d_m_Y_H.i.s');
            $path = public_path('Adjuntos/InformeCCTV');
            // comprobar existencia de la carpeta. Si no existe, se crea con permisos.
            if (!file_exists($path)) 
                mkdir($path, 0777, true);
            $extension = $file->getClientOriginalExtension();
            $customer = Customer::find($request->customer_id)->name;
            $nombre = $fecha.'_'.str_replace(' ','_',$customer) . '.' . $extension;
            $file->move($path, $nombre);
            $request['user_id'] = Auth::user()->id;
            $request['quotation'] = $nombre;
            // Crear registro con lo que viene del request exceptuando el archivo
            Cctv::create($request->except('quotationFile'));
            DB::commit();
            return 1;
        }catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }
    public function update(Request $request){
        ini_set('post_max_size', 100);  
        DB::beginTransaction();
        try{
            $cctv = Cctv::find($request->id);
            $file = $request->file('quotationFile2');
            $fecha = date('d_m_Y_H.i.s');
            $path = public_path('Adjuntos/InformeCCTV');
            // comprobar existencia de la carpeta. Si no existe, se crea con permisos.
            if (!file_exists($path)) 
                mkdir($path, 0777, true);
            $extension = $file->getClientOriginalExtension();
            $customer = Customer::find($request->customer_id_edit)->name;
            $nombre = $fecha.'_'.str_replace(' ','_',$customer) . '.' . $extension;
            $file->move($path, $nombre);
            $cctv->update(['next_visit_date' => $request->next_visit_date_edit,'quotation' => $nombre]);
            DB::commit();
            return 1;
        }catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }

    public function eliminarPdfCotizacion(Request $request, $id){
        $cctv = Cctv::find($id);
        DB::beginTransaction();
        try{
            if(unlink(getcwd() . '\Adjuntos\InformeCCTV\\'.$cctv->quotation)){
                $cctv->update(['quotation' => null]);
                DB::commit();
                return 1;
            }else{
                return 0;
            }
        }catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }
}
