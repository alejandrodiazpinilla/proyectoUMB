<?php

namespace App\Http\Controllers;

use Response;
use App\Models\User;
use App\Models\Empresa;
use App\Models\Customer;
use App\Models\VacantType;
use App\Models\ContratType;
use App\Models\EmpresaUser;
use App\Models\StaffRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\StaffRequestCandidate;
use Illuminate\Support\Facades\Crypt;
use App\Models\StaffRequestNotification;

class StaffRequestController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:root|mostrar_solicitud_personal', ['only' => ['index']]);
        $this->middleware('role_or_permission:root|crear_solicitud_personal', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:root|aprobar_solicitud_personal', ['only' => ['aprobarSolicitud']]);
    }

    public function index()
    {
        return view('staffrequest.index');
    }

    public function StaffRequestIndex(Request $request)
    {

        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');

        $columns = array(
            0 => 'job_title',
            1 => 'customer',
            2 => 'created_at',
            3 => 'state',
            4 => 'reasson',
            5 => 'action'
        );

        $consulta = DB::table('staff_request')
            ->join('customers', 'customers.id', 'staff_request.customer_id')
            ->join('vacant_types', 'vacant_types.id', 'staff_request.vacant_type_id')
            ->join('contract_types', 'contract_types.id', 'staff_request.contract_type_id')
            ->join('users', 'users.id', 'staff_request.requesting_user_id')
            ->join('users as usuarios', 'usuarios.id', 'staff_request.rrhh_user_id')
            ->select(
                'staff_request.*',
                'staff_request.id AS id',
                'customers.name AS customer',
                'vacant_types.name AS vacant',
                'contract_types.name AS contract',
                'users.name AS request_by',
                'usuarios.name AS user_rrhh',
                DB::raw('DATE_FORMAT(staff_request.created_at, "%d-%m-%Y %H:%m:%s") AS created_at')
            );
        if (!Auth::user()->hasRole('root')) {
            $empresas_user = EmpresaUser::where('user_id', Auth::user()->id)->pluck('empresa_id');
            $consulta = $consulta->whereIn('company_id', $empresas_user);
        }

        // Valores para datatable
        $totalData = $consulta->count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = $consulta->offset($start)->limit($limit)->orderBy($order, $dir)->get();
            $totalFiltered = $totalData;
        } else {
            $search = $request->input('search.value');
            if (Auth::user()->hasRole('root')) {
                $clausulas = $consulta
                    ->where('staff_request.job_title', 'like', "%{$search}%");
                $clausulas = $consulta
                    ->orWhere('customers.name', 'like', "%{$search}%");
                $clausulas = $consulta
                    ->orWhere('staff_request.created_at', 'like', "%{$search}%");
                $inp_search = strtolower($search);
                $busqueda = '';
                if (stristr('Por Gestionar', $inp_search)) {
                    $busqueda = '%0%';
                } else if (stristr('Finalizado', $inp_search)) {
                    $busqueda = '%1%';
                }
                $clausulas = $consulta
                    ->orWhere('staff_request.state', 'like', $busqueda);
            } else {
                $clausulas = $consulta
                    ->where('staff_request.id', 'like', "%{$search}%")
                    ->whereIn('company_id', $empresas_user);
                $clausulas = $consulta
                    ->orWhere('staff_request.description', 'like', "%{$search}%")
                    ->whereIn('company_id', $empresas_user);
                $clausulas = $consulta
                    ->orWhere('staff_request.name', 'like', "%{$search}%")
                    ->whereIn('company_id', $empresas_user);
                $inp_search = strtolower($search);
                $busqueda = '';
                if (stristr('Por Gestionar', $inp_search)) {
                    $busqueda = '%0%';
                } else if (stristr('Finalizado', $inp_search)) {
                    $busqueda = '%1%';
                }
                $clausulas = $consulta
                    ->orWhere('staff_request.state', 'like', $busqueda)
                    ->whereIn('company_id', $empresas_user);
            }

            $totalFiltered = $clausulas->count();
            $posts = $clausulas->offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }

        $data = array();
        if ($posts) {
            foreach ($posts as $r) {
                $candidatos = StaffRequestCandidate::where('staff_request_id',$r->id)->count();
                $nestedData['id'] = $r->id;
                $nestedData['crypt_id'] = Crypt::encryptString($r->id);
                $nestedData['job_title'] = $r->job_title;
                $nestedData['customer'] = $r->customer;
                $nestedData['vacant'] = $r->vacant;
                $nestedData['contract'] = $r->contract;
                $nestedData['request_by'] = $r->request_by;
                $nestedData['user_rrhh'] = $r->user_rrhh;
                $nestedData['reasson'] = $r->reasson;
                $nestedData['created_at'] = $r->created_at;
                $nestedData['candidatos'] = $candidatos;
                $nestedData['action'] = $r;
                if ($r->state == 0) {
                    $nestedData['state'] = '<div class="badge bg-warning rounded-pill text-light p-2"><span>Por Gestionar</span></div>';
                } else if ($r->state == 1) {
                    $nestedData['state'] = '<div class="badge bg-success rounded-pill text-light p-2"><span>Finalizado</span></div>';
                }
                $nestedData['permisoAprobar'] = (Auth::user()->hasrole('root') || Auth::user()->can('aprobar_solicitud_personal')) && $r->state == 0;
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

    //mostrar vista para crear
    public function create()
    {

        $empresas_user = EmpresaUser::where('user_id', Auth::user()->id)->pluck('empresa_id');
        $tipos_vacantes = VacantType::orderBy('name')->get();
        $tipos_contratos = ContratType::orderBy('name')->get();
        $clientes = Customer::whereIn('customers.company_id', $empresas_user)->where('state', 1)->pluck('name', 'id');
        $empresas = Empresa::whereIn('id', $empresas_user)->get()->pluck('nombre', 'id');
        if (Auth::user()->hasRole('root')) {
            $clientes = Customer::where('state', 1)->pluck('name', 'id');
            $empresas = Empresa::all()->pluck('nombre', 'id');
        }

        return view('staffrequest.create', compact('tipos_vacantes', 'tipos_contratos', 'clientes', 'empresas'));
    }

    public function store(Request $request)
    {

        $rrhh = User::whereHas('roles', function ($q) {
            $q->where('name', 'asistente_rrhh');
        })->first()->id;
        $arrayIn = ['$', ','];
        $arrayOut = ['', ''];
        $request['salary_to_quote'] = str_replace($arrayIn, $arrayOut, $request->salary_to_quote);
        $request['salary_to_accrue'] = str_replace($arrayIn, $arrayOut, $request->salary_to_accrue);
        $request['requesting_user_id'] = Auth::user()->id;
        $request['rrhh_user_id'] = $rrhh;

        DB::beginTransaction();
        try {
            $strq = StaffRequest::create($request->all());

            //se notifica a lo auxiliares de rrhh que se desvincula un trabajador
            $rrhh = User::whereHas('roles', function ($q) {
                $q->where('name', 'asistente_rrhh'); // definir si solo se notifica a asistente de rrhh
            })->where('estado', 1)->get()->pluck('id');
            if (!empty($rrhh)) {
                foreach ($rrhh as $val) {
                    StaffRequestNotification::insert([
                        'type' => 'Solicitud de Personal',
                        'read' => 'no',
                        'staff_request_id' => $strq->id,
                        'obs' => 'Se ha registrado una nueva Solicitud de Personal',
                        'user_id' => $val,
                        'created_at' => date('Y-m-d G:i:s'),
                        'updated_at' => date('Y-m-d G:i:s')
                    ]);
                }
            }

            DB::commit();
            return 1;
        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }

    public function aprobarSolicitud($id)
    {
        $id = Crypt::decryptString($id);
        DB::beginTransaction();
        try {
            StaffRequest::find($id)->update(['state' => 1]);
            DB::commit();
            return 1;
        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }
    // mostrar PDF
    public function show($id)
    {
        $id = Crypt::decryptString($id);
        $solicitud = StaffRequest::with([
            'rel_cliente:id,name,address,city_id,locality_id,neighborhood_id',
            'rel_cliente.rel_ciudad:id,nombre',
            'rel_cliente.rel_localidad:id,name',
            'rel_cliente.rel_barrio:id,name',
            'rel_tipo_vacante:id,name',
            'rel_tipo_contrato:id,name',
            'rel_usuario_creador:id,name,signature',
            'rel_usuario_creador.areas',
            'rel_usuario_creador.areas.nombreAreas:id,nombre'
        ])->find($id);
        return view('staffrequest.show', compact('solicitud'));
    }
    public function agregarCandidatos(Request $request)
    {
        DB::beginTransaction();
        try {
            if ($request->jsonTable) {
                $staff_request_id = Crypt::decryptString($request->id);
                $infoTabla = json_decode($request->jsonTable);
                $arrEmail = [];
                StaffRequestCandidate::where('staff_request_id', $staff_request_id)->update(['state' => 0]);
                foreach ($infoTabla as $key => $val) {
                    $staffActual = StaffRequestCandidate::where('staff_request_id', $staff_request_id)
                        ->where('identification', $val->identification)
                        ->where('name', $val->name)
                        ->where('telephone', $val->telephone)
                        ->where('email', $val->email)
                        ->first();

                    if (empty($staffActual)) {
                        $staff = new StaffRequestCandidate();
                        $staff->staff_request_id = $staff_request_id;
                        $staff->identification = $val->identification;
                        $staff->name = $val->name;
                        $staff->telephone = $val->telephone;
                        $staff->email = $val->email;
                        $staff->save();
                        array_push($arrEmail, $val->email);
                    } else {
                        StaffRequestCandidate::where('staff_request_id', $staff_request_id)
                        ->where('identification', $val->identification)
                        ->where('name', $val->name)
                        ->where('telephone', $val->telephone)
                        ->where('email', $val->email)
                        ->update(['state' => 1]);
                    }
                }
                StaffRequestCandidate::where('state', 0)->delete();
                DB::commit();
                if ($request->sendEmail) {
                    $email = $arrEmail;
                    Mail::send('emails.solicitudDocumentos', ['email' => $email], function ($message) use ($email) {
                        $message->from('notificaciones@correo.com', 'Alejandro Ltda');
                        $message->bcc($email);
                        $message->subject('Solicitud Documentación');
                    });
                    return 1;
                }
                return 2;
            }
        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }

    public function traerCandidatos(Request $request)
    {
        $id = Crypt::decryptString($request->id);
        $staffActual = StaffRequestCandidate::where('staff_request_id', $id)->get();
        $estado = StaffRequest::find($id);
        if ($staffActual)
            return response()->json(['status' => 1, 'data' => $staffActual, 'estado' => $estado->state]);
        else
            return response()->json(['status' => 0]);
    }

}
