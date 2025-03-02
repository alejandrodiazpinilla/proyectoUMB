<?php

namespace App\Http\Controllers;

use App\Models\Academy;
use App\Models\Employe;
use App\Models\Apodatos;
use App\Models\EmpresaUser;
use Illuminate\Http\Request;
use App\Exports\ApodatosExport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Crypt;

class ApodatosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:root|mostrar_apodatos', ['only' => ['index']]);
        $this->middleware('role_or_permission:root|crear_apodatos', ['only' => ['create', 'store']]);
    }

    public function index()
    {
        return view('apodatos.index');
    }

    public function apodatosIndex(Request $request)
    {

        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');

        $columns = array(
            0 => 'documento',
            1 => 'nombre',
            2 => 'codigo_curso',
            3 => 'nro',
            4 => 'fecha_vencimiento',
            5 => 'state',
            6 => 'action'
        );

        $consulta = DB::table('apodatos')
            ->join('employees', 'employees.id', 'apodatos.employe_id')
            ->join('empresas', 'empresas.id', 'apodatos.company_id')
            ->join('academies', 'academies.id', 'apodatos.academy_id')
            ->join('users', 'users.id', 'employees.user_rel_id')
            ->select(
                'apodatos.*',
                'apodatos.id AS id',
                'employees.identification AS documento',
                'employees.name AS nombre',
                'employees.surname AS apellido',
                'employees.date_of_birth AS fecha_nacimiento',
                'employees.gender AS genero',
                DB::raw("(select position from employees_contracts where employe_id = employees.id order by id desc limit 1) as cargo"),
                DB::raw("(select start_date from employees_contracts where employe_id = employees.id order by id desc limit 1) as fecha_contratacion"),
                'empresas.nombre AS empresa',
                'academies.name AS academia',
                'academies.nit AS nit',
                'academies.telephone AS telefono',
                'academies.address AS direccion'
            );

        if (!Auth::user()->hasRole('root')) {
            $empresas_user = EmpresaUser::where('user_id', Auth::user()->id)->pluck('empresa_id');
            $consulta = $consulta->whereIn('apodatos.company_id', $empresas_user);
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
                    ->where('apodatos.id', 'like', "%{$search}%");
                $clausulas = $consulta
                    ->orWhere('employees.identification', 'like', "%{$search}%");
                $clausulas = $consulta
                    ->orWhere('employees.date_of_birth', 'like', "%{$search}%");
                $clausulas = $consulta
                    ->orWhere('employees.gender', 'like', "%{$search}%");
                $clausulas = $consulta
                    ->orWhere('employees_contracts.position', 'like', "%{$search}%");
                $clausulas = $consulta
                    ->orWhere('employees_contracts.start_date', 'like', "%{$search}%");
                $clausulas = $consulta
                    ->orWhere('empresas.name', 'like', "%{$search}%");
                $clausulas = $consulta
                    ->orWhere('academies.name', 'like', "%{$search}%");
                $clausulas = $consulta
                    ->orWhere('academies.nit', 'like', "%{$search}%");
                $clausulas = $consulta
                    ->orWhere('academies.telephone', 'like', "%{$search}%");
                $clausulas = $consulta
                    ->orWhere('academies.address', 'like', "%{$search}%");
                $inp_search = strtolower($search);
                $busqueda = '';
                if (stristr('Acreditado', $inp_search)) {
                    $busqueda = '%1%';
                } else if (stristr('Por Acreditar', $inp_search)) {
                    $busqueda = '%2%';
                } else if (stristr('Por Vencer', $inp_search)) {
                    $busqueda = '%3%';
                }
                $clausulas = $consulta
                    ->orWhere('apodatos.state', 'like', $busqueda);
            } else {
                $clausulas = $consulta
                    ->where('apodatos.id', 'like', "%{$search}%")
                    ->whereIn('apodatos.company_id', $empresas_user);
                $clausulas = $consulta
                    ->orWhere('employees.identification', 'like', "%{$search}%")
                    ->whereIn('apodatos.company_id', $empresas_user);
                $clausulas = $consulta
                    ->orWhere('employees.date_of_birth', 'like', "%{$search}%")
                    ->whereIn('apodatos.company_id', $empresas_user);
                $clausulas = $consulta
                    ->orWhere('employees.gender', 'like', "%{$search}%")
                    ->whereIn('apodatos.company_id', $empresas_user);
                $clausulas = $consulta
                    ->orWhere('employees_contracts.position', 'like', "%{$search}%")
                    ->whereIn('apodatos.company_id', $empresas_user);
                $clausulas = $consulta
                    ->orWhere('employees_contracts.start_date', 'like', "%{$search}%")
                    ->whereIn('apodatos.company_id', $empresas_user);
                $clausulas = $consulta
                    ->orWhere('empresas.name', 'like', "%{$search}%")
                    ->whereIn('apodatos.company_id', $empresas_user);
                $clausulas = $consulta
                    ->orWhere('academies.name', 'like', "%{$search}%")
                    ->whereIn('apodatos.company_id', $empresas_user);
                $clausulas = $consulta
                    ->orWhere('academies.nit', 'like', "%{$search}%")
                    ->whereIn('apodatos.company_id', $empresas_user);
                $clausulas = $consulta
                    ->orWhere('academies.telephone', 'like', "%{$search}%")
                    ->whereIn('apodatos.company_id', $empresas_user);
                $clausulas = $consulta
                    ->orWhere('academies.address', 'like', "%{$search}%");
                $inp_search = strtolower($search);
                $busqueda = '';
                if (stristr('Acreditado', $inp_search)) {
                    $busqueda = '%1%';
                } else if (stristr('Por Acreditar', $inp_search)) {
                    $busqueda = '%2%';
                } else if (stristr('Por Vencer', $inp_search)) {
                    $busqueda = '%3%';
                }
                $clausulas = $consulta
                    ->orWhere('apodatos.state', 'like', $busqueda)
                    ->whereIn('apodatos.company_id', $empresas_user);
            }
            $totalFiltered = $clausulas->count();
            $posts = $clausulas->offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }
        $data = array();
        if ($posts) {
            foreach ($posts as $r) {
                $nestedData['id'] = Crypt::encryptString($r->id);
                $nestedData['documento'] = $r->documento;
                $nestedData['nombre'] = $r->nombre . ' ' . $r->apellido;
                $nestedData['codigo_curso'] = $r->course_code;
                $nestedData['nro'] = $r->number;
                $nestedData['fecha_vencimiento'] = date('d-m-Y', strtotime($r->course_date . ' + 1 years'));
                if ($r->state == 1) {
                    $nestedData['state'] = '<div class="badge bg-success rounded-pill text-light p-2"><span>Acreditado</span></div>';
                } else if ($r->state == 2) {
                    $nestedData['state'] = '<div class="badge bg-danger rounded-pill text-light p-2"><span>Por Acreditar</span></div>';
                } else {
                    $nestedData['state'] = '<div class="badge bg-warning rounded-pill text-light p-2"><span>Por Vencer</span></div>';
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

    public function create()
    {
        return view('apodatos.create');
    }
    public function store(Request $request)
    {
        $infoTablaExp = json_decode($request->jsonTable);
        DB::beginTransaction();
        try {
            $fechaActual = date('Ymd');
            $consecutivo = Apodatos::where('file', 'like', "%{$fechaActual}%")->first();
            if (empty($consecutivo))
                $consecutivo = '001';
            else
                $consecutivo = '00' . number_format(substr($consecutivo->file, 21, 3)) + 1;

            foreach ($infoTablaExp as $value) {
                $empleado = Employe::with('rel_contratos:id,employe_id,position,start_date')->where('identification', $value->cedula)->first();

                if (empty($empleado)) {
                    return response()->json(['status' => 0, 'message' => 'el empleado con cédula ' . $value->cedula . ' aún no está registrado. Por favor, regístrelo antes de continuar']);
                }

                $a = Academy::where('nit', $value->nit)->first();
                if (empty($a))
                    $a = new Academy;

                $a->name = $value->nomb_academia;
                $a->nit = $value->nit;
                $a->telephone = $value->tel_academia;
                $a->address = $value->dir_academia;
                $a->user_id = Auth::user()->id;
                $a->save();

                $apodatos = Apodatos::where('employe_id', $empleado->id)->first();
                if (empty($apodatos))
                    $apodatos = new Apodatos;

                $apodatos->company_id = 1;
                $apodatos->employe_id = $empleado->id;
                $apodatos->course_code = $value->cod_curso;
                $apodatos->course_date = date('Y-m-d', strtotime($value->fecha_curso));
                $apodatos->number = $value->nro;
                $apodatos->file = 'APO9006968268' . $fechaActual . $consecutivo . '.xlsx';
                $apodatos->academy_id = $a->id;
                $apodatos->state = $value->checkValidar == true ? 1 : 2; //1:Acreditado, 2:Por Acreditar, 3:Por Vencer
                $apodatos->user_id = Auth::user()->id;
                $apodatos->save();

                ob_end_clean();
                ob_start();
                $path = public_path('Adjuntos/Apodatos');
                if (!file_exists($path))
                    mkdir($path, 0777, true);

                Excel::store(new ApodatosExport($request), 'APO9006968268' . $fechaActual . $consecutivo . '.xlsx', 'apodatos');
            }
            DB::commit();
            return response()->json(['status' => 1, 'message' => 'Archivo de APODATOS generado y guardado correctamente']);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json($th->getMessage());
        }
    }

    public function consultarAcademia($nit)
    {
        $academia = Academy::where('nit', $nit)->first();
        if (empty($academia))
            return response()->json(['status' => 0]);

        return response()->json(['status' => 1, 'academia' => $academia]);
    }

    public function descargarPlantilla(Request $request)
    {
        $fechaActual = date('Ymd');
        if ($request->jsonTable) {
            $infoTablaExp = json_decode($request->jsonTable);
            foreach ($infoTablaExp as $value) {
                $a = Academy::where('nit', $value->nit)->first();
                if (empty($a)) {
                    $a = new Academy;
                }
                $a->name = $value->nomb_academia;
                $a->nit = $value->nit;
                $a->telephone = $value->tel_academia;
                $a->address = $value->dir_academia;
                $a->user_id = Auth::user()->id;
                $a->save();

                $empleado = Employe::where('identification', $value->cedula)->first();
                if (empty($empleado)) {
                    return back()->withInput()->with('mensajeError', 'El trabajador con cédula <strong>' . $value->cedula . '</strong> aún no está registrado. Por favor, regístrelo antes de continuar');
                }
            }
            $fechaActual = date('Ymd');
            $consecutivo = Apodatos::where('file', 'like', "%{$fechaActual}%")->first();
            if (empty($consecutivo))
                $consecutivo = '001';
            else
                $consecutivo = '00' . number_format(substr($consecutivo->file, 21, 3)) + 1;
            ob_end_clean();
            ob_start();
            return Excel::download(new ApodatosExport($request), 'APO9006968268' . $fechaActual . $consecutivo . '.xlsx');
        }
    }
}
