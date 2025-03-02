<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Empresa;
use App\Models\Customer;
use App\Models\AreaUsers;
use App\Models\EmpresaUser;
use App\Models\NoveltyType;
use Illuminate\Http\Request;
use App\Models\NoveltiesRrhh;
use Illuminate\Support\Facades\DB;
use App\Exports\NoveltiesRrhhExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Crypt;

class NoveltyRrhhController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
		$this->middleware('role_or_permission:root|mostrar_novedades_rrhh|gestionar_novedad_rrhh|exportar_novedades_rrhh', ['only' => ['index','store','update','generarReporteRrhh']]);
    }

    public function index(){
        $tiposNovedades =  NoveltyType::orderBy('name','asc')->where('delegate_id',3)->get()->pluck('name','id');
        if (Auth::user()->hasRole('root')) {
            $empresas =  Empresa::all()->pluck('nombre', 'id');
            $clientes =  Customer::pluck('name', 'id')->toArray();
        } else {
            $empresas_user = EmpresaUser::where('user_id', Auth::user()->id)->pluck('empresa_id');
            $empresas =  Empresa::whereIn('id', $empresas_user)->pluck('nombre', 'id');
            $clientes =  Customer::whereIn('company_id', $empresas_user)->where('state',1)->pluck('name', 'id')->toArray();
        }
        return view('noveltiesrrhh.index',compact('tiposNovedades','clientes','empresas'));
    }

    public function noveltiesRrhhIndex(Request $request){

        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');
        
        $columns = array(
            0 => 'empleado',
            1 => 'cliente',
            2 => 'tipo_novedad',
            3 => 'estado',
            4 => 'fecha_creacion',
            5 => 'action'
        );

        $consulta = DB::table('novelties_rrhh')
        ->join('empresas', 'empresas.id', 'novelties_rrhh.company_id')
        ->leftjoin('customers', 'customers.id', 'novelties_rrhh.customer_id')
        ->join('novelties_types', 'novelties_types.id', 'novelties_rrhh.novelty_type_id')
        ->join('areas', 'areas.id', 'novelties_rrhh.area_id')
        ->join('users', 'users.id', 'novelties_rrhh.user_id')
        ->join('employees', 'employees.id', 'novelties_rrhh.employe_id')
        ->select(
            'novelties_rrhh.*', 
            'novelties_rrhh.id AS id',
            'novelties_rrhh.state AS estado',
            'empresas.nombre AS empresa',
            'customers.name AS cliente',
            'novelties_types.name AS tipo_novedad',
            'areas.nombre AS area',
            'users.name AS nombre_usuario',
            'employees.identification AS cedula_empleado',
            'employees.name AS nombre_empleado',
            'employees.surname AS apellido_empleado'
        );
        if(!Auth::user()->hasRole('root') && !Auth::user()->hasRole('jefe_rrhh') && !Auth::user()->hasRole('director_rrhh') && !Auth::user()->hasRole('auxiliar_rrhh')  && !Auth::user()->hasRole('gerencia')  && !Auth::user()->hasRole('subgerencia')){
            $empresas_user = EmpresaUser::where('user_id',Auth::user()->id)->pluck('empresa_id');
            $areasUser = AreaUsers::where('user_id', Auth::user()->id)->pluck('area_id');
            $consulta = $consulta->whereIn('novelties_rrhh.company_id',$empresas_user)->whereIn('novelties_rrhh.area_id',$areasUser);
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
        }else{
            $search = $request->input('search.value');
            if(Auth::user()->hasRole('root')){
                $clausulas = $consulta
                ->where('employees.name', 'like', "%{$search}%");
                $clausulas = $consulta
                ->orWhere('employees.surname','like',"%{$search}%");
                $clausulas = $consulta
                ->orWhere('customer.name','like',"%{$search}%");
                $clausulas = $consulta
                ->orWhere('novelties_types.name','like',"%{$search}%");
                $inp_search = strtolower($search);
                $busqueda = '';
                if (stristr('Pago Pendiente', $inp_search)) {
                    $busqueda = '%0%';
                } else if (stristr('Pago Recibido', $inp_search)) {
                    $busqueda = '%1%';
                }
                $clausulas = $consulta
                ->orWhere('novelties_rrhh.state', 'like', $busqueda);
            } else {
                $clausulas = $consulta
                ->where('employees.name', 'like', "%{$search}%")
                ->whereIn('novelties_rrhh.company_id',$empresas_user);
                $clausulas = $consulta
                ->orWhere('employees.surname','like',"%{$search}%")
                ->whereIn('novelties_rrhh.company_id',$empresas_user);
                $clausulas = $consulta
                ->orWhere('customer.name','like',"%{$search}%")
                ->whereIn('novelties_rrhh.company_id',$empresas_user); 
                $clausulas = $consulta
                ->orWhere('novelties_types.name','like',"%{$search}%")
                ->whereIn('novelties_rrhh.company_id',$empresas_user);  
                $inp_search = strtolower($search);
                $busqueda = '';
                if (stristr('Pago Pendiente', $inp_search)) {
                    $busqueda = '%0%';
                } else if (stristr('Pago Recibido', $inp_search)) {
                    $busqueda = '%1%';
                }
                $clausulas = $consulta
                ->orWhere('novelties_rrhh.state', 'like', $busqueda) 
                ->whereIn('novelties_rrhh.company_id',$empresas_user);  
            }
            
            $totalFiltered = $clausulas->count();
            $posts = $clausulas->offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }

        $data = array();
        if($posts){
            foreach($posts as $r){
                $nestedData['id'] = $r->id;
                $nestedData['crypt_id'] = Crypt::encryptString($r->id);
                $nestedData['empleado'] = $r->nombre_empleado.' '.$r->apellido_empleado;
                $nestedData['cliente'] = $r->cliente??null;
                $nestedData['cedula'] = $r->cedula_empleado;
                $nestedData['tipo_novedad'] = $r->tipo_novedad;
                $nestedData['description'] = $r->description;
                $nestedData['sancion'] = $r->penalty;
                $nestedData['fecha_creacion'] = date('d-m-Y g:i:s a',strtotime($r->created_at));
                $nestedData['permisoGestionar'] = Auth::user()->hasrole('root') || Auth::user()->can('gestionar_novedad_rrhh');
                $nestedData['action'] = $r;
                if ($r->state == 0) {
                    $nestedData['estado'] = '<div class="badge bg-danger rounded-pill text-light p-2"><span>Pago Pendiente</span></div>';
                }else {
                    $nestedData['estado'] = '<div class="badge bg-success rounded-pill text-light p-2"><span>Pago Recibido</span></div>';
                }
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


    public function store(Request $request)
    {
        $employe = Employe::where('identification',$request->cedula)->first();
        if(empty($employe))
            return response()->json(['status' => 0, 'msg' => 'El número de cédula registrado no corresponde a un empleado activo.']);
            $areaUser = AreaUsers::where('user_id', Auth::user()->id)->first()->area_id;
            try{
            DB::beginTransaction();
            $novedad = new NoveltiesRrhh;
            $novedad->employe_id = $employe->id;
            $novedad->company_id = $request->company_id;
            $novedad->area_id = $areaUser;
            $novedad->customer_id = $request->customer_id??null;
            $novedad->novelty_type_id = $request->novelty_type_id;
            $novedad->description = $request->description;
            $novedad->user_id = Auth::user()->id;
            $novedad->save();

            DB::commit();
            return response()->json(['status' => 1, 'msg' => 'creado']);
        }catch (\Throwable $th) {
            DB::rollback();
            return response()->json($th->getMessage());
        }
    }

    public function update(Request $request)
    {
        try{
            DB::beginTransaction();
            $novedad = NoveltiesRrhh::find($request->id);
            $novedad->payment_date = date('Y-m-d',strtotime($request->fecha));
            $novedad->penalty = $request->penalty;
            $novedad->state = $request->state;
            $novedad->user_id = Auth::user()->id;
            $novedad->save();

            DB::commit();
            return response()->json(['status' => 1, 'msg' => 'actualizado']);
        }catch (\Throwable $th) {
            DB::rollback();
            return response()->json($th->getMessage());
        }
    }

    public function generarReporteRrhh(Request $request)
    {
        $fechaI = date('Y-m-d',strtotime($request->fecha_inicio_reporte)).' 00:00:00';
        $fechaF = date('Y-m-d',strtotime($request->fecha_fin_reporte)).' 23:59:59';
        $consulta = NoveltiesRrhh::with('rel_empleado:id,name,surname,identification');
        if(!Auth::user()->hasRole('root') && !Auth::user()->hasRole('jefe_rrhh') && !Auth::user()->hasRole('director_rrhh') && !Auth::user()->hasRole('auxiliar_rrhh')  && !Auth::user()->hasRole('gerencia')  && !Auth::user()->hasRole('subgerencia')){
            $empresas_user = EmpresaUser::where('user_id',Auth::user()->id)->pluck('empresa_id');
            $areasUser = AreaUsers::where('user_id', Auth::user()->id)->pluck('area_id');
            $consulta = $consulta->whereIn('company_id',$empresas_user)->whereIn('novelties_rrhh.area_id',$areasUser);
        }
          $consulta = $consulta->whereBetween('novelties_rrhh.created_at', [$fechaI, $fechaF])->count();
          if ($consulta == 0)
            return back()->withInput()->with('mensajeError', 'No se han encontrado resultados con los criterios de búsqueda seleccionados');
        try {
            $fechaActual = date('d_m_Y h_i_s');
            ob_end_clean();
            ob_start();
            return Excel::download(new NoveltiesRrhhExport($request), 'NovedadesRRHH_' . $fechaActual . '.xlsx');
        } catch (\Throwable $th) {
            return back()->withInput()->with('mensajeError', $th->getMessage());
        }
    }
}
