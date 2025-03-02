<?php

namespace App\Http\Controllers;

use Auth;
use Flash;
use Response;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Employe;
use App\Models\Empresa;
use App\Models\Customer;
use App\Models\EmpresaUser;
use Illuminate\Http\Request;
use App\Models\BankOfResumes;
use App\Models\RetirementType;
use App\Models\StateTermination;
use App\Models\TerminationStaff;
use App\Models\TracingTermination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Crypt;
use App\Exports\TerminationStaffExport;
use App\Models\TerminationNotification;
use Illuminate\Support\Facades\Storage;
// desvinculacion de personal
class TerminationStaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:root|mostrar_desvinculaciones', ['only' => ['index', 'terminationStaffIndex', 'masivo']]);
        $this->middleware('role_or_permission:root|crear_desvinculacion', ['only' => ['store']]);
        $this->middleware('role_or_permission:root|aprobar_desvinculacion', ['only' => ['aprobarDesvinculacion']]);
        $this->middleware('role_or_permission:root|exportar_desvinculacion', ['only' => ['generarReporte']]);
    }

    public function index()
    {
        $tipoRetiro = RetirementType::orderBy('name', 'asc')->pluck('name', 'id');
        $clientes = Customer::where('state', 1)->orderBy('name', 'asc')->pluck('name', 'id');
        $empresas =  Empresa::all()->pluck('nombre', 'id');
        if (!Auth::user()->hasRole('root')) {
            $empresas_user = EmpresaUser::where('user_id', Auth::user()->id)->pluck('empresa_id');
            $clientes = Customer::where('state', 1)->whereIn('company_id', $empresas_user)->orderBy('name', 'asc')->pluck('name', 'id');
            $empresas =  Empresa::whereIn('id', $empresas_user)->pluck('nombre', 'id');
        }
        return view('terminationstaff.index', compact('clientes', 'tipoRetiro', 'empresas'));
    }

    public function terminationStaffIndex(Request $request)
    {
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');
        $columns = array(
            0 => 'id',
            1 => 'empleado',
            2 => 'cliente',
            3 => 'state_id',
            4 => 'tipo_retiro',
            5 => 'retirement_date',
            6 => 'action'
        );

        $consulta = DB::table('termination_staff')
            ->join('employees', 'employees.id', 'termination_staff.employe_id')
            ->leftjoin('customers', 'customers.id', 'termination_staff.customer_id')
            ->join('empresas', 'empresas.id', 'termination_staff.company_id')
            ->join('retirement_types', 'retirement_types.id', 'termination_staff.retirement_type_id')
            ->select(
                'termination_staff.*',
                'termination_staff.id AS id',
                'termination_staff.state_id AS state_id',
                'employees.name AS empleado',
                'employees.user_rel_id AS usuario',
                'customers.name AS cliente',
                'empresas.nombre AS empresa',
                'retirement_types.name AS tipo_retiro',
                DB::raw('DATE_FORMAT(termination_staff.retirement_date, "%d-%m-%Y") AS retirement_date'),
            );
        if (!Auth::user()->hasRole('root')) {
            $empresas_user = EmpresaUser::where('user_id', Auth::user()->id)->pluck('empresa_id');
            $consulta = $consulta->whereIn('termination_staff.company_id', $empresas_user);
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
            if (Auth::user()->hasRole('root') || Auth::user()->hasRole('admin')) {
                $clausulas = $consulta
                    ->where('employees.name', 'like', "%{$search}%");
                $clausulas = $consulta
                    ->orWhere('customers.name', 'like', "%{$search}%");
                $clausulas = $consulta
                    ->orWhere('retirement_types.name', 'like', "%{$search}%");
                $clausulas = $consulta
                    ->orWhere(DB::raw('DATE_FORMAT(termination_staff.retirement_date, "%d-%m-%Y")'), 'like', "%{$search}%");
            } else {
                $clausulas = $consulta
                    ->where('employees.name', 'like', "%{$search}%")
                    ->whereIn('termination_staff.company_id', $empresas_user);
                $clausulas = $consulta
                    ->orWhere('customers.name', 'like', "%{$search}%")
                    ->whereIn('termination_staff.company_id', $empresas_user);
                $clausulas = $consulta
                    ->orWhere('retirement_types.name', 'like', "%{$search}%")
                    ->whereIn('termination_staff.company_id', $empresas_user);
                $clausulas = $consulta
                    ->orWhere(DB::raw('DATE_FORMAT(termination_staff.retirement_date, "%d-%m-%Y")'), 'like', "%{$search}%")
                    ->whereIn('termination_staff.company_id', $empresas_user);

                $inp_search = strtolower($search);
                $busqueda = '';
                if (stristr('Por Gestionar', $inp_search)) {
                    $busqueda = '%15%';
                } else if (stristr('Aprobado por Operaciones', $inp_search)) {
                    $busqueda = '%1%';
                } else if (stristr('Rechazado por Operaciones', $inp_search)) {
                    $busqueda = '%2%';
                } else if (stristr('Aprobado por Contabilidad', $inp_search)) {
                    $busqueda = '%3%';
                } else if (stristr('Rechazado por Contabilidad', $inp_search)) {
                    $busqueda = '%4%';
                } else if (stristr('Aprobado por RRHH', $inp_search)) {
                    $busqueda = '%5%';
                } else if (stristr('Rechazado por RRHH', $inp_search)) {
                    $busqueda = '%6%';
                } else if (stristr('Aprobado por Comercial', $inp_search)) {
                    $busqueda = '%7%';
                } else if (stristr('Rechazado por Comercial', $inp_search)) {
                    $busqueda = '%8%';
                } else if (stristr('Aprobado por Gestión Documental', $inp_search)) {
                    $busqueda = '%9%';
                } else if (stristr('Rechazado por Gestión Documental', $inp_search)) {
                    $busqueda = '%10%';
                } else if (stristr('Aprobado por Calidad', $inp_search)) {
                    $busqueda = '%11%';
                } else if (stristr('Rechazado por Calidad', $inp_search)) {
                    $busqueda = '%12%';
                } else if (stristr('Aprobado por Subgerencia', $inp_search)) {
                    $busqueda = '%13%';
                } else if (stristr('Rechazado por Subgerencia', $inp_search)) {
                    $busqueda = '%14%';
                }
                $clausulas = $consulta
                    ->orWhere('termination_staff.state_id', 'like', $busqueda)
                    ->whereIn('termination_staff.company_id', $empresas_user);
            }
            $totalFiltered = $totalData;
            $posts = $clausulas->offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }

        $data = array();

        $administrativos = User::whereHas('roles', function ($q) {
            $q->where('name', 'auxiliar_comercial')
                ->orWhere('name', 'director_comercial')
                ->orWhere('name', 'director_administrativo')
                ->orWhere('name', 'director_calidad')
                ->orWhere('name', 'director_rrhh')
                ->orWhere('name', 'jefe_rrhh')
                ->orWhere('name', 'asistente_rrhh')
                ->orWhere('name', 'analista_sgi')
                ->orWhere('name', 'auxiliar_administrativo')
                ->orWhere('name', 'auxiliar_tesoreria')
                ->orWhere('name', 'contador')
                ->orWhere('name', 'auxiliar_operaciones')
                ->orWhere('name', 'jefe_operaciones')
                ->orWhere('name', 'lider_gestion_documental')
                ->orWhere('name', 'recepcionista');
        })->get()->pluck('id')->toArray();

        $operaciones = User::whereHas('roles', function ($q) {
            $q->where('name', 'coordinador')
                ->orWhere('name', 'guarda')
                ->orWhere('name', 'supervisor');
        })->get()->pluck('id')->toArray();

        if ($posts) {
            foreach ($posts as $r) {
                $seg = TracingTermination::with([
                    'rel_seguimiento',
                    'rel_seguimiento.rel_empleado:id,name',
                    'rel_seguimiento.rel_tipo_retiro:id,name',
                    'rel_estado'
                ])
                    ->where('termination_id', $r->id)
                    ->orderBy('created_at')
                    ->get();

                $nestedData['id'] = $r->id;
                $nestedData['crypt_id'] = Crypt::encryptString($r->id);
                $nestedData['empleado'] = $r->empleado;
                $nestedData['employe_id'] = $r->employe_id;
                $nestedData['cliente'] = $r->cliente;
                $nestedData['empresa'] = $r->empresa;
                $nestedData['seg'] = json_encode($seg);
                if ($r->state_id == 15) {
                    $state = '<span class="badge bg-primary rounded-pill text-light p-2">Por Gestionar</span>';
                } elseif ($r->state_id == 1) {
                    $state = '<span class="badge bg-warning rounded-pill text-light p-2">Aprobado por Operaciones</span>';
                } elseif ($r->state_id == 2) {
                    $state = '<span class="badge bg-danger rounded-pill text-light p-2">Rechazado por Operaciones</span>';
                } elseif ($r->state_id == 3) {
                    $state = '<span class="badge bg-warning rounded-pill text-light p-2">Aprobado por Contabilidad</span>';
                } elseif ($r->state_id == 4) {
                    $state = '<span class="badge bg-danger rounded-pill text-light p-2">Rechazado por Contabilidad</span>';
                } elseif ($r->state_id == 5) {
                    $state = '<span class="badge bg-success rounded-pill text-light p-2">Aprobado por RRHH</span>';
                } elseif ($r->state_id == 6) {
                    $state = '<span class="badge bg-danger rounded-pill text-light p-2">Rechazado por RRHH</span>';
                } elseif ($r->state_id == 7) {
                    $state = '<span class="badge bg-warning rounded-pill text-light p-2">Aprobado por Comercial</span>';
                } elseif ($r->state_id == 8) {
                    $state = '<span class="badge bg-danger rounded-pill text-light p-2">Rechazado por Comercial</span>';
                } elseif ($r->state_id == 9) {
                    $state = '<span class="badge bg-warning rounded-pill text-light p-2">Aprobado por Gestión Documental</span>';
                } elseif ($r->state_id == 10) {
                    $state = '<span class="badge bg-danger rounded-pill text-light p-2">Rechazado por Gestión Documental</span>';
                } elseif ($r->state_id == 11) {
                    $state = '<span class="badge bg-warning rounded-pill text-light p-2">Aprobado por Calidad</span>';
                } elseif ($r->state_id == 12) {
                    $state = '<span class="badge bg-danger rounded-pill text-light p-2">Rechazado por Calidad</span>';
                } elseif ($r->state_id == 13) {
                    $state = '<span class="badge bg-warning rounded-pill text-light p-2">Aprobado por Subgerencia</span>';
                } elseif ($r->state_id == 14) {
                    $state = '<span class="badge bg-danger rounded-pill text-light p-2">Rechazado por Subgerencia</span>';
                } elseif ($r->state_id == 16) {
                    $state = '<span class="badge bg-purple rounded-pill text-light p-2">Corregido</span>';
                }

                $nestedData['current_state'] = StateTermination::find($r->state_id)->name;
                $nestedData['state_id'] = $state;
                $nestedData['adjunto'] = $r->attached;
                $nestedData['tipo_retiro'] = $r->tipo_retiro;
                $nestedData['retirement_date'] = $r->retirement_date;
                $nestedData['permisoAprobar'] =
                    (Auth::user()->hasRole('root') && $r->state_id !== 5) ||
                    (Auth::user()->can('aprobar_desvinculacion')
                        &&
                        (
                            /* *******************inicio aprobación de personal operativo************************** */
                            (
                                // operaciones
                                (
                                    (
                                        ($r->state_id == 15 || $r->state_id == 2)
                                        && Auth::user()->hasRole('jefe_operaciones') //jefe_operaciones
                                    ) ||
                                    //contable (definir que rol debe aprobar el retiro del trabajador)
                                    (
                                        ($r->state_id == 1 || $r->state_id == 4)
                                        && Auth::user()->hasRole('auxiliar_tesoreria') //auxiliar_tesoreria
                                    ) ||
                                    // rrhh (definir que rol debe aprobar el retiro del trabajador)
                                    (
                                        ($r->state_id == 3 || $r->state_id == 6)
                                        && Auth::user()->hasRole('asistente_rrhh') //asistente_rrhh cambiar por jefe de rrhh o director
                                    )
                                )
                                && array_search($r->usuario, $operaciones) !== false
                            )
                            /* *******************fin aprobación de personal operativo************************** */
                            ||
                            /* *******************inicio aprobación de personal administrativo************************** */
                            (
                                // comercial (definir que rol debe aprobar el retiro del trabajador)
                                (
                                    (
                                        ($r->state_id == 15 || $r->state_id == 8)
                                        && Auth::user()->hasRole('director_comercial') //director_comercial
                                    ) ||
                                    //operaciones
                                    (
                                        ($r->state_id == 7 || $r->state_id == 2)
                                        && Auth::user()->hasRole('jefe_operaciones')
                                    ) ||
                                    // contable (definir que rol debe aprobar el retiro del trabajador)
                                    (
                                        ($r->state_id == 1 || $r->state_id == 4)
                                        && Auth::user()->hasRole('auxiliar_tesoreria') //auxiliar_tesoreria
                                    ) ||
                                    // Gestion Documental (definir que rol debe aprobar el retiro del trabajador)
                                    (
                                        ($r->state_id == 3 || $r->state_id == 10)
                                        && Auth::user()->hasRole('lider_gestion_documental') //lider_gestion_documental
                                    ) ||
                                    // Calidad (definir que rol debe aprobar el retiro del trabajador)
                                    (
                                        ($r->state_id == 9 || $r->state_id == 12)
                                        && Auth::user()->hasRole('director_calidad') //director_calidad
                                    ) ||
                                    // Subgerencia
                                    (
                                        ($r->state_id == 11 || $r->state_id == 14)
                                        && Auth::user()->hasRole('subgerencia') //subgerencia
                                    ) ||
                                    // rrhh (definir que rol debe aprobar el retiro del trabajador)
                                    (
                                        ($r->state_id == 6 || $r->state_id == 13)
                                        && Auth::user()->hasRole('asistente_rrhh') //asistente_rrhh cambiar por jefe de rrhh o director
                                    )
                                )
                                && array_search($r->usuario, $administrativos) !== false
                            )
                            /* *******************fin aprobación de personal administrativo************************** */

                        )
                    );
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

    public function store(Request $request)
    {
        $trabajador = Employe::where('identification', $request->identification)->first();
        if (empty($trabajador))
            return 0;
        DB::beginTransaction();
        try {
            $retiro = new TerminationStaff;
            $retiro->employe_id = $trabajador->id;
            $retiro->customer_id = $request->customer_id;
            $retiro->company_id = $request->company_id;
            $retiro->retirement_date = $request->retirement_date;
            $retiro->retirement_type_id = $request->retirement_type_id;
            $retiro->description = $request->description;
            $retiro->user_id = Auth::user()->id;

            $nombre = '';
            $file = $request->file('attached');
            if (!empty($file)) {
                ini_set('post_max_size', 100);
                $path = public_path('Adjuntos/Retiros');
                // comprobar existencia de la carpeta. Si no existe, se crea con permisos.
                if (!file_exists($path))
                    mkdir($path, 0777, true);
                $extension = $request->file('attached')->getClientOriginalExtension();
                $nombre = $request->identification . '_' . date('d-m-Y') . '.' . $extension;
                $file->move($path, $nombre);
            }
            $retiro->attached = $nombre;
            $retiro->save();

            //se notifica a lo auxiliares de rrhh que se desvincula un trabajador
            $rrhh = User::whereHas('roles', function ($q) {
                $q->where('name', 'asistente_rrhh'); // definir si solo se notifica a asistente de rrhh
            })->where('estado', 1)->get()->pluck('id');
            if (!empty($rrhh)) {
                foreach ($rrhh as $val) {
                    TerminationNotification::insert([
                        'type_id' => 5,
                        'employe_id' => $trabajador->id,
                        'obs' => 'Se ha registrado una nueva desvinculación por ' . RetirementType::find($request->retirement_type_id)->name,
                        'created_at' => date('Y-m-d G:i:s'),
                        'updated_at' => date('Y-m-d G:i:s'),
                        'retirement_date' => $request->retirement_date,
                        'user_id' => $val
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

    public function edit($id)
    {
        //
    }

    public function update($id, Request $request)
    {
        DB::beginTransaction();
        try {
            //
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }

    public function consultarTrabajador($cedula)
    {
        try{
            $cedula = Crypt::decryptstring($cedula);
        } catch (\Throwable $th) {
            $cedula = $cedula;
        }
        $trabajador = Employe::with('rel_contratos','rel_ult_contrato')->activos()->where('identification', $cedula)->first();

        if (empty($trabajador)){
            $trabajador = BankOfResumes::where('identification', $cedula)->first();
            return response()->json(['status' => 0,'trabajador' => $trabajador]);
        }
        return response()->json(['status' => 1,'trabajador' => $trabajador]);
    }

    public function generarReporte(Request $request)
    {
        try {
            $fechaActual = date('d_m_Y h_i_s');
            ob_end_clean();
            ob_start();
            return Excel::download(new TerminationStaffExport($request), 'Retiros_' . $fechaActual . '.xlsx');
        } catch (\Throwable $th) {
            return back()->withInput()->with('mensajeError', $th->getMessage());
        }
    }
    public function aprobarDesvinculacion(Request $request, $id)
    {
        $id = Crypt::decryptString($id);
        DB::beginTransaction();
        try {
            $operaciones = User::whereHas('roles', function ($q) {
                $q->where('name', 'coordinador')
                    ->orWhere('name', 'guarda')
                    ->orWhere('name', 'supervisor');
            })->get()->pluck('id')->toArray();

            $t = TerminationStaff::with(['rel_empleado:id,name,user_rel_id'])->find($id);
            $rol = '';
             if ($request->tipo == 'aprobar' && ($t->state_id == 15 || $t->state_id == 2 || $t->state_id == 7) && Auth::user()->hasRole('jefe_operaciones')) {
                $t->update(['state_id' => 1]);
                $rol = 'asistente_rrhh';
            } else if ($request->tipo == 'rechazar' && ($t->state_id == 15 || $t->state_id == 2 || $t->state_id == 7) && Auth::user()->hasRole('jefe_operaciones')) {
                $t->update(['state_id' => 2]);
            } else if ($request->tipo == 'aprobar' && ($t->state_id == 1 || $t->state_id == 4) && Auth::user()->hasRole('auxiliar_tesoreria')) {
                $t->update(['state_id' => 3]);
                $rol = array_search($t->rel_empleado->user_rel_id, $operaciones) !== false ? 'asistente_rrhh':'lider_gestion_documental';
                $rol = 'lider_gestion_documental';
            } else if ($request->tipo == 'rechazar' && ($t->state_id == 1 || $t->state_id == 4) && Auth::user()->hasRole('auxiliar_tesoreria')) {
                $t->update(['state_id' => 4]);
            } else if ($request->tipo == 'aprobar' && ($t->state_id == 3 || $t->state_id == 6 || $t->state_id == 13) && Auth::user()->hasRole('asistente_rrhh')) {
                $t->update(['state_id' => 5]);
            } else if ($request->tipo == 'rechazar' && ($t->state_id == 3 || $t->state_id == 6 || $t->state_id == 13) && Auth::user()->hasRole('asistente_rrhh')) {
                $t->update(['state_id' => 6]);
            } else if ($request->tipo == 'aprobar' && ($t->state_id == 15 || $t->state_id == 8) && Auth::user()->hasRole('director_comercial')) {
                $t->update(['state_id' => 7]);
                $rol = 'jefe_operaciones';
            } else if ($request->tipo == 'rechazar' && ($t->state_id == 15 || $t->state_id == 8) && Auth::user()->hasRole('director_comercial')) {
                $t->update(['state_id' => 8]);
            } else if ($request->tipo == 'aprobar' && ($t->state_id == 3 || $t->state_id == 10) && Auth::user()->hasRole('lider_gestion_documental')) {
                $t->update(['state_id' => 9]);
                $rol = 'director_calidad';
            } else if ($request->tipo == 'rechazar' && ($t->state_id == 3 || $t->state_id == 10) && Auth::user()->hasRole('lider_gestion_documental')) {
                $t->update(['state_id' => 10]);
            } else if ($request->tipo == 'aprobar' && ($t->state_id == 9 || $t->state_id == 12) && Auth::user()->hasRole('director_calidad')) {
                $t->update(['state_id' => 11]);
                $rol = 'subgerencia';
            } else if ($request->tipo == 'rechazar' && ($t->state_id == 9 || $t->state_id == 12) && Auth::user()->hasRole('director_calidad')) {
                $t->update(['state_id' => 12]);
            } else if ($request->tipo == 'aprobar' && ($t->state_id == 11 || $t->state_id == 14) && Auth::user()->hasRole('subgerencia')) {
                $t->update(['state_id' => 13]);
                $rol = 'asistente_rrhh';
            } else if ($request->tipo == 'rechazar' && ($t->state_id == 11 || $t->state_id == 14) && Auth::user()->hasRole('subgerencia')) {
                $t->update(['state_id' => 14]);
            } else {
                return 0;
            }

            TracingTermination::insert([
                'termination_id' => $t->id,
                'user_id' => Auth::user()->id,
                'description' => $request->obs,
                'state_id' => $t->state_id,
                'created_at' => date('Y-m-d G:i:s')
            ]);

            if ($request->tipo == 'aprobar') {
                //se notifica a la persona siguiente en el workflow
                $usrsNoti = User::whereHas('roles', function ($q) use($rol) {
                    $q->where('name', $rol);
                })->where('estado', 1)->get()->pluck('id');
                if (!empty($usrsNoti)) {
                    foreach ($usrsNoti as $val) {
                        TerminationNotification::insert([
                            'type_id' => 6,
                            'employe_id' => $t->employe_id,
                            'obs' => 'Se ha aprobado la desvinculación del empleado ' . $t->rel_empleado->name . ' por parte de ' . Auth::user()->name,
                            'created_at' => date('Y-m-d G:i:s'),
                            'updated_at' => date('Y-m-d G:i:s'),
                            'retirement_date' => $t->retirement_date,
                            'user_id' => $val
                        ]);
                    }
                }
            }

            DB::commit();
            return 1;
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json($th->getMessage());
        }
    }
}
