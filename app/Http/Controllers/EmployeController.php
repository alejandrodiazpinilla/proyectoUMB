<?php

namespace App\Http\Controllers;

use Auth;
use ZipArchive;
use App\Models\Exam;
use App\Models\User;
use App\Models\Ciudad;
use App\Models\Employe;
use App\Models\Empresa;
use App\Models\Customer;
use App\Models\Locality;
use App\Models\BloodType;
use App\Models\Schooling;
use App\Models\VisitType;
use App\Models\Affiliation;
use App\Models\EmpresaUser;
use App\Models\DocumentType;
use App\Models\EmployeStudy;
use App\Models\Neighborhood;
use App\Models\StaffRequest;
use Illuminate\Http\Request;
use App\Models\MaritalStatus;
use App\Models\EducationLevel;
use App\Models\EmployeContract;
use App\Models\EmployeReference;
use App\Models\EmployeExperience;
use App\Models\EmployeAffiliation;
use Illuminate\Support\Facades\DB;
use App\Models\OtherEmployeDocument;
use App\Models\StaffRequestCandidate;
use Illuminate\Support\Facades\Crypt;
use App\Models\TypesDisciplinaryRecord;
use App\Http\Controllers\UserController;
use App\Models\EmployeDisciplinaryRecord;


class EmployeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:root|mostrar_empleados', ['only' => ['index']]);
        $this->middleware('role_or_permission:root|crear_empleado', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:root|actualizar_empleado', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:root|crear_contrato', ['only' => ['crearContrato']]);
        $this->middleware('role_or_permission:root|actualizar_archivo', ['only' => ['actualizarArchivo']]);
        $this->middleware('role_or_permission:root|agregar_examen', ['only' => ['cargarExamenes']]);
    }

    public function index()
    {
        $solicitudes = [];
        $tipos_documentos = DocumentType::where('document_category_id', 1)->get()->pluck('name', 'id');
        $estado_civil =  MaritalStatus::all()->pluck('name', 'id');
        $formaciones =  EducationLevel::all()->pluck('name', 'id');
        $localidades =  ['Seleccione...' => ''];
        $barrios =  ['Seleccione...' => ''];
        $ciudades = Ciudad::select(DB::raw("CONCAT(nombre,' - ',departamento) as display_name"), "id")->pluck('display_name', 'id');
        $tipo_visitas =  VisitType::where('module','Visita Domiciliaria')->get()->pluck('name', 'id');
        return view('employees.index',compact('solicitudes','tipos_documentos','estado_civil','formaciones','localidades','barrios','ciudades','tipo_visitas'));
    }

    public function employeesIndex(Request $request)
    {

        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');

        $columns = array(
            0 => 'identification',
            1 => 'name',
            2 => 'email',
            3 => 'gender',
            4 => 'state',
            5 => 'action'
        );

        if (Auth::user()->hasRole('root')) {
            $consulta = Employe::where('id', '>', 0);
        } else {
            $empresas_user = EmpresaUser::where('user_id', Auth::user()->id)->pluck('empresa_id');
            $consulta = Employe::whereIn('company_id', $empresas_user);
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
                    ->where('identification', 'like', "%{$search}%");
                $clausulas = $consulta
                    ->orWhere('name', 'like', "%{$search}%");
                    $clausulas = $consulta
                    ->orWhere('surname', 'like', "%{$search}%");
                $clausulas = $consulta
                    ->orWhere('email', 'like', "%{$search}%");
                $clausulas = $consulta
                    ->orWhere('gender', 'like', "%{$search}%");
                $inp_search = strtolower($search);
                $busqueda = '';
                if (stristr('Activo', $inp_search)) {
                    $busqueda = '%1%';
                } else if (stristr('Inactivo', $inp_search)) {
                    $busqueda = '%0%';
                }
                $clausulas = $consulta
                    ->orWhere('state', 'like', $busqueda);
            } else {
                $clausulas = $consulta
                    ->where('identification', 'like', "%{$search}%")
                    ->whereIn('company_id', $empresas_user);
                $clausulas = $consulta
                    ->orWhere('name', 'like', "%{$search}%")
                    ->whereIn('company_id', $empresas_user);
                $clausulas = $consulta
                    ->orWhere('surname', 'like', "%{$search}%")
                    ->whereIn('company_id', $empresas_user);
                $clausulas = $consulta
                    ->orWhere('email', 'like', "%{$search}%")
                    ->whereIn('company_id', $empresas_user);
                $clausulas = $consulta
                    ->orWhere('gender', 'like', "%{$search}%")
                    ->whereIn('company_id', $empresas_user);

                $inp_search = strtolower($search);
                $busqueda = '';
                if (stristr('Activo', $inp_search)) {
                    $busqueda = '%1%';
                } else if (stristr('Inactivo', $inp_search)) {
                    $busqueda = '%0%';
                }
                $clausulas = $consulta
                    ->orWhere('state', 'like', $busqueda)
                    ->whereIn('company_id', $empresas_user);
            }
            $totalFiltered = $clausulas->count();
            $posts = $clausulas->offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }

        $data = array();
        if ($posts) {
            foreach ($posts as $r) {
                $nestedData['id'] = Crypt::encryptString($r->id);
                $nestedData['identification'] = $r->identification;
                $nestedData['name'] = $r->name.' '.$r->surname;
                $nestedData['email'] = $r->email;
                $nestedData['gender'] = $r->gender;
                if ($r->state == 1) {
                    $nestedData['state'] = '<div class="badge bg-success rounded-pill text-light p-2"><span>Activo</span></div>';
                } else {
                    $nestedData['state'] = '<div class="badge bg-danger rounded-pill text-light p-2"><span>Inactivo</span></div>';
                }
                $nestedData['permisoActualizar'] = Auth::user()->hasrole('root') || Auth::user()->can('actualizar_empleado');
                $nestedData['permisoBloquear'] = Auth::user()->hasrole('root') || Auth::user()->can('bloquear_empleado');
                $nestedData['permisoCrearContrato'] = Auth::user()->hasrole('root') || Auth::user()->can('crear_contrato');
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

    //mostrar vista para crear el empleado
    public function create()
    {
        if (Auth::user()->hasRole('root')) {
            $empresas =  Empresa::all()->pluck('nombre', 'id');
            $clientes = Customer::with(['rel_empresa:id,nombre'])
                ->orderBy('name')
                ->select('id', 'name', 'company_id')->get();
        } else {
            $empresas_user = EmpresaUser::where('user_id', Auth::user()->id)->pluck('empresa_id');
            $empresas =  Empresa::whereIn('id', $empresas_user)->pluck('nombre', 'id');
            $clientes = Customer::with(['rel_empresa:id,nombre'])
                ->orderBy('name')
                ->select('id', 'name', 'company_id')
                ->whereIn('company_id', $empresas_user)
                ->get();
        }
        $estado_civil =  MaritalStatus::all()->pluck('name', 'id');
        $roles =  ['Seleccione...' => ''];
        $areas =  ['Seleccione...' => ''];
        $localidades =  ['Seleccione...' => ''];
        $barrios =  ['Seleccione...' => ''];
        $grupo_sanguineo =  BloodType::all()->pluck('name', 'id');
        $ciudades = Ciudad::select(DB::raw("CONCAT(nombre,' - ',departamento) as display_name"), "id")->pluck('display_name', 'id');
        $tipos_documentos = DocumentType::where('document_category_id', 1)->get()->pluck('name', 'id');
        return view('employees.create', compact('empresas', 'tipos_documentos', 'ciudades', 'grupo_sanguineo', 'estado_civil', 'localidades', 'barrios', 'areas', 'roles', 'clientes'));
    }
    // buscar localidades segun ciudad/municipio
    public function search_locality($ciudad_id = null)
    {
        if ($ciudad_id != null)
            return response()->json(['localidades' => Locality::where('ciudad_id', $ciudad_id)->orderBy('name')->get()]);
    }
    // buscar barrios segun localidad
    public function search_neighborhoods($locality_id = null)
    {
        if ($locality_id != null)
            return response()->json(['barrios' => Neighborhood::where('locality_id', $locality_id)->orderBy('name')->get()]);
    }
    // crear empleado nuevo
    public function store(Request $request)
    {
        $unique_key = Employe::where('identification', $request->tipo_doc)
            ->orWhere('email', $request->email)
            ->count();
        if ($unique_key > 0) {
            return 1;
        }
        DB::beginTransaction();
        try {
            $employe = new Employe;
            $employe->document_type_id = $request->tipo_doc;
            $employe->identification = $request->cedula;
            $employe->expedition_date = date('y-m-d', strtotime($request->fecha_expedicion));
            $employe->expedition_city_id = $request->lugar_expedicion;
            $employe->name = $request->nombre;
            $employe->surname = $request->apellido;
            $employe->company_id = $request->empresa_id;
            $employe->email = $request->email;
            $employe->telephone = $request->telefono;
            $employe->date_of_birth = date('y-m-d', strtotime($request->fecha_nacimiento));
            $employe->blood_type_id = $request->rh;
            $employe->gender = $request->sexo;
            $employe->marital_status_id = $request->estado_civil;
            $employe->address = $request->direccion_residencia;
            $employe->home_city_id = $request->municipo_residencia;
            $employe->locality_id = $request->localidad_residencia;
            $employe->neighborhood_id = $request->barrio_residencia;
            $employe->user_id = Auth::user()->id;

            if ($employe->save()) {

                $user = User::where('identification', $request->cedula)
                    ->orWhere('email', $request->email)
                    ->orWhere('username', $request->cedula)
                    ->first();

                // ......para crear o actualizar el usuario segun corresponda
                if (empty($user)) {
                    //se crea nuevo request para enviarlo al controlador de usuario...
                    $requestStore = new Request([
                        "name" => $request->nombre.' '.$request->apellido,
                        "username" => $request->cedula,
                        "email" => $request->email,
                        "empresaTbl" => [
                            0 => $request->empresa_id
                        ],
                        "areaTbl" => [
                            0 => $request->area
                        ],
                        "rolesTbl" => [
                            0 => $request->rol
                        ],
                        "checkCliente" => $request->checkCliente,
                        "customer_id" => $request->customer_id,
                        "cargo" => $request->cargo,
                        "identification" => $request->cedula,
                        'employe_id' => $employe->id
                    ]);
                    UserController::store($requestStore);
                } else {
                    $requestUpdate = new Request([
                        "id_act" => $user->id,
                        "name_act" => $request->nombre.' '.$request->apellido,
                        "username_act" => $request->cedula,
                        "email_act" => $request->email,
                        "empresaTbl_edit" => [
                            0 => $request->empresa_id
                        ],
                        "areaTbl_edit" => [
                            0 => $request->area
                        ],
                        "rolesTbl_edit" => [
                            0 => $request->rol
                        ],
                        "checkClienteEdit" => $request->checkCliente,
                        "customer_id_edit" => $request->customer_id,
                        "cargo_act" => $request->cargo,
                        "identification" => $request->cedula,
                        'employe_id' => $employe->id
                    ]);
                    UserController::update($user->id, $requestUpdate);
                }
            }
            DB::commit();
            return 2;
        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }

    //mostrar vista para editar el empleado
    public function edit($id)
    {
        $id = Crypt::decryptString($id);
        $empleado = Employe::with([
            'rel_tipo_documento:id,name',
            'rel_ciudad_expedicion:id,nombre',
            'rel_empresa:id,nombre',
            'rel_tipo_sangre:id,name',
            'rel_estado_civil:id,name',
            'rel_municipio_residencia:id,nombre',
            'rel_localidad:id,name',
            'rel_barrio:id,name',
            'rel_usuario:id,name'
        ])
            ->find($id);
        if (Auth::user()->hasRole('root')) {
            $empresas =  Empresa::all()->pluck('nombre', 'id');
        } else {
            $empresas_user = EmpresaUser::where('user_id', Auth::user()->id)->pluck('empresa_id');
            $empresas =  Empresa::whereIn('id', $empresas_user)->pluck('nombre', 'id');
        }
        $estado_civil =  MaritalStatus::all()->pluck('name', 'id');
        $localidades =  Locality::all()->pluck('name', 'id');
        $barrios =  Neighborhood::all()->pluck('name', 'id');
        $grupo_sanguineo =  BloodType::all()->pluck('name', 'id');
        $ciudades = Ciudad::select(DB::raw("CONCAT(nombre,' - ',departamento) as display_name"), "id")->pluck('display_name', 'id');
        $tipos_documentos = DocumentType::where('document_category_id', 1)->get()->pluck('name', 'id');
        return view('employees.edit', compact('empleado', 'empresas', 'tipos_documentos', 'ciudades', 'grupo_sanguineo', 'estado_civil', 'localidades', 'barrios'));
    }
    // actualizar empleado
    public function update($id, Request $request)
    {
        DB::beginTransaction();
        try {
            // $id = Crypt::decryptString($id);
            $employe = Employe::find($id);
            $employe->document_type_id = $request->tipo_doc;
            $employe->identification = $request->cedula;
            $employe->expedition_date = date('y-m-d', strtotime($request->fecha_expedicion));
            $employe->expedition_city_id = $request->lugar_expedicion;
            $employe->name = $request->nombre;
            $employe->surname = $request->apellido;
            $employe->company_id = $request->empresa_id;
            $employe->email = $request->email;
            $employe->telephone = $request->telefono;
            $employe->date_of_birth = date('y-m-d', strtotime($request->fecha_nacimiento));
            $employe->blood_type_id = $request->rh;
            $employe->gender = $request->sexo;
            $employe->marital_status_id = $request->estado_civil;
            $employe->address = $request->direccion_residencia;
            $employe->home_city_id = $request->municipo_residencia;
            $employe->locality_id = $request->localidad_residencia;
            $employe->neighborhood_id = $request->barrio_residencia;
            $employe->user_id = Auth::user()->id;
            $employe->save();
            DB::commit();
            return 1;
        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }

    public static function destroy($id, $usuario = null)
    {
        $id = Crypt::decryptString($id);
        $emp = Employe::find($id);
        if (empty($emp))
            $emp = Employe::where('user_rel_id', $id)->first();

        if (!empty($emp)) {
            if ($usuario == null) {
                $requestDestroy = new Request([
                    "id" => $emp->user_rel_id,
                    "empleado" => 1
                ]);
                UserController::destroy($requestDestroy);
            }
            if ($emp->state == 0)
                $emp->state = 1;
            else
                $emp->state = 0;

            $emp->save();
            return 1;
        } else {
            return 0;
        }
    }
    // registrar contrato y anexos
    public static function crearContrato(Request $request)
    {
        $id = Crypt::decryptString($request->employe_id);

        //Validador Duplicidad
        $unique_key = EmployeContract::where('employe_id', $id)
            ->where('position', $request->position)
            ->where('start_date', $request->start_date)
            ->where('end_date', $request->end_date)
            ->count();
        if ($unique_key >= 1) {
            return 0;
        }
        ini_set('post_max_size', 100);
        ini_set('max_file_uploads', '100');

        DB::beginTransaction();
        try {
            $empleado = Employe::find($id);
            $nombreContrato = 0;
            $zip_file = 0;
            $path = public_path('Adjuntos/Contratos');
            if (!file_exists($path))
                mkdir($path, 0777, true);
            // guardar contrato
            $fileContrato = $request->file('archivo');
            if (!empty($fileContrato)) {
                $extension = $fileContrato->getClientOriginalExtension();
                $nombreContrato = $empleado->identification . '_' . date('d-m-Y h_i_s') . '.' . $extension;
                $fileContrato->move($path, $nombreContrato);
            }
            // guardar anexos
            $fileAnexos = $request->file('anexos');
            if (!empty($fileAnexos)) {
                $zip_file = $empleado->identification . '_' . date('d-m-Y h_i_s') . '.zip';
                $zip = new ZipArchive;
                $zip->open($path . '/' . $zip_file, \ZipArchive::CREATE);
                foreach ($fileAnexos as $value) {
                    $zip->addFile($value, $value->getClientOriginalName());
                }
                $zip->close();
            }
            $solicitud = StaffRequest::find($request->staff_request_id);
            $request['file'] = $nombreContrato;
            $request['contract_type_id'] = $solicitud?$solicitud->contract_type_id:1;
            $request['attached'] = $zip_file;
            $request['employe_id'] = $id;
            $request['user_id'] = Auth::user()->id;
            EmployeContract::where('employe_id', $id)->update(['state' => 0]);
            EmployeContract::create($request->except(['archivo', 'anexos', 'anexo']));
            StaffRequestCandidate::where('identification', $empleado->identification)
            ->where('staff_request_id',$request->staff_request_id)
            ->update(['state' => 0]);
            DB::commit();
            return 1;
        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }
    // consultar contratos y mostrarlos en tabla y mostrar las solicitudes de personal de hasta 3 meses atrás
    public function detalleContratos(Request $request)
    {
        $id = Crypt::decryptString($request->id);
        $contratos = EmployeContract::where('employe_id', $id)->get();
        $permisoAgregarExamen = Auth::user()->hasrole('root') || Auth::user()->can('agregar_examen');
        $permisoCrearContrato = Auth::user()->hasrole('root') || Auth::user()->can('crear_contrato');
        $e = Employe::where('id', $id)->first();
        $sol = StaffRequestCandidate::where('identification', $e->identification)->where('state',1)->pluck('staff_request_id');
        $fecha = date('Y-m-d G:i:s', strtotime(date('Y-m-d G:i:s') . '- 60 days'));
        $solicitudes = StaffRequest::whereIn('id',$sol)->where('created_at','>=',$fecha)->pluck('id');
        return response()->json(['contratos' => $contratos, 'permisoAgregarExamen' => $permisoAgregarExamen, 'permisoCrearContrato' => $permisoCrearContrato, 'solicitudes' => $solicitudes]);
    }

    // Actualizar zip de otros anexos del contrato
    public function agregarAnexos(Request $request, $id)
    {
        ini_set('post_max_size', 100);
        ini_set('max_file_uploads', '100');
        DB::beginTransaction();
        try {
            $fileAnexos = $request->file('anexos');
            if (!empty($fileAnexos)) {
                $contratos = EmployeContract::find($id);
                $zip_file = $contratos->attached;
                $path = public_path('Adjuntos/Contratos');
                $zip = new ZipArchive;
                if ($zip->open($path . '/' . $zip_file) === TRUE) {
                    foreach ($fileAnexos as $value) {
                        $zip->addFile($value, $value->getClientOriginalName());
                    }
                    $zip->close();
                }
            }
            return 1;
        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }

    // actualizar/cambiar contrato o anexos
    public function actualizarArchivo(Request $request, $id)
    {
        ini_set('post_max_size', 100);
        ini_set('max_file_uploads', '100');

        DB::beginTransaction();
        try {
            $contrato = EmployeContract::find($id);
            $empleado = Employe::where('id', $contrato->employe_id)->first();
            $nombreContrato = 0;
            $zip_file = 0;
            $path = public_path('Adjuntos/Contratos');
            $nuevoArchivo = $request->file('anexos');
            // guardar contrato
            if (!empty($nuevoArchivo)) {
                if ($request->tipo == 'contrato') {
                    $extension = $nuevoArchivo[0]->getClientOriginalExtension();
                    $nombreContrato = $empleado->identification . '_' . date('d-m-Y h_i_s') . '.' . $extension;
                    if (!empty($contrato->file) && file_exists($contrato->file)) {
                        unlink(getcwd() . '/Adjuntos/Contratos/' . $contrato->file);
                    }
                    $contrato->update(['file' => $nombreContrato]);
                    $nuevoArchivo[0]->move($path, $nombreContrato);
                } else {
                    // guardar anexos
                    $zip_file = $empleado->identification . '_' . date('d-m-Y h_i_s') . '.zip';
                    $zip = new ZipArchive;
                    $zip->open($path . '/' . $zip_file, \ZipArchive::CREATE);
                    foreach ($nuevoArchivo as $value) {
                        $zip->addFile($value, $value->getClientOriginalName());
                    }
                    $zip->close();
                    if (!empty($contrato->attached) && file_exists($contrato->attached)) {
                        unlink(getcwd() . '/Adjuntos/Contratos/' . $contrato->attached);
                    }
                    $contrato->update(['attached' => $zip_file]);
                }
            }
            $request['user_id'] = Auth::user()->id;
            DB::commit();
            return 1;
        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }

    public function mostrarCurriculum($id)
    {
        $id = Crypt::decryptString($id);
        $empleado = Employe::with([
            'rel_afiliaciones:id,employe_id,affiliation_id,file,description',
            'rel_afiliaciones.rel_afiliacion',
            'rel_estudios:id,employe_id,file,description,study_id',
            'rel_estudios.rel_estudio',
            'rel_antecedentes',
            'rel_antecedentes.rel_antecedente',
            'rel_otros',
            'rel_otros.rel_otro',
            'rel_experiencia',
            'rel_referencias'
        ])->find($id);
        $afiliaciones = Affiliation::where('state', 1)->get()->pluck('name', 'id');
        $estudios = Schooling::get()->pluck('name', 'id');
        $antecedentes = TypesDisciplinaryRecord::orderBy('name','asc')->get();
        $otros = DocumentType::orderBy('id','asc')->where('document_category_id',2)->get();
        return view('employees.curriculum', compact('afiliaciones', 'estudios', 'empleado','antecedentes','otros'));
    }

    public function cargarArchivoEstudio(Request $request)
    {
        DB::beginTransaction();
        try {
            $id = Crypt::decryptString($request->id);
            ini_set('post_max_size', 100);
            $path = public_path('Adjuntos/Estudios');
            if (!file_exists($path))
                mkdir($path, 0777, true);
            $file = $request->file('file');
            if (!empty($file)) {
                $file->move($path, $request->nombre_adjunto_estudio);
                $files = new EmployeStudy;
                $files->employe_id = $id;
                $files->study_id = $request->estudio;
                $files->file = $request->nombre_adjunto_estudio;
                $files->description = $request->obs_adjunto_estudio;
                $files->user_id = Auth::user()->id;
                $files->save();
            }
            DB::commit();
            return 1;
        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }

    public function eliminarArchivoEstudio($nombre)
    {
        DB::beginTransaction();
        try {
            $documento = EmployeStudy::where('file', $nombre);
            if ($documento->delete()) {
                unlink(public_path('Adjuntos/Estudios/' . $nombre));
            }
            DB::commit();
            return 1;
        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }

    public function cargarArchivoAntecedente(Request $request)
    {
        DB::beginTransaction();
        try {
            $id = Crypt::decryptString($request->id);
            ini_set('post_max_size', 100);
            $path = public_path('Adjuntos/Antecedentes');
            if (!file_exists($path))
                mkdir($path, 0777, true);
            $file = $request->file('file');
            if (!empty($file)) {
                $file->move($path, $request->nombre_adjunto_antecedente);
                $files = new EmployeDisciplinaryRecord;
                $files->employe_id = $id;
                $files->disciplinary_record_id = $request->antecedente_id;
                $files->file = $request->nombre_adjunto_antecedente;
                $files->description = $request->obs_adjunto_antecedente;
                $files->user_id = Auth::user()->id;
                $files->save();
            }
            DB::commit();
            return 1;
        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }

    public function eliminarArchivoAntecedente($nombre)
    {
        DB::beginTransaction();
        try {
            $documento = EmployeDisciplinaryRecord::where('file', $nombre);
            if ($documento->delete()) {
                unlink(public_path('Adjuntos/Antecedentes/' . $nombre));
            }
            DB::commit();
            return 1;
        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }

    public function cargarArchivoAfiliacion(Request $request)
    {
        DB::beginTransaction();
        try {
            $id = Crypt::decryptString($request->id);
            ini_set('post_max_size', 100);
            $path = public_path('Adjuntos/Afiliaciones');
            if (!file_exists($path))
                mkdir($path, 0777, true);
            $file = $request->file('file');
            if (!empty($file)) {
                $file->move($path, $request->nombre_adjunto_afiliacion);
                $files = new EmployeAffiliation;
                $files->employe_id = $id;
                $files->affiliation_id = $request->affiliation_id;
                $files->file = $request->nombre_adjunto_afiliacion;
                $files->description = $request->obs_adjunto_afiliacion;
                $files->user_id = Auth::user()->id;
                $files->save();
            }
            DB::commit();
            return 1;
        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }

    public function eliminarArchivoAfiliacion($nombre)
    {
        DB::beginTransaction();
        try {
            $documento = EmployeAffiliation::where('file', $nombre);
            if ($documento->delete()) {
                unlink(public_path('Adjuntos/Afiliaciones/' . $nombre));
            }
            DB::commit();
            return 1;
        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }

    public function cargarArchivoOtros(Request $request)
    {
        DB::beginTransaction();
        try {
            $id = Crypt::decryptString($request->id);
            ini_set('post_max_size', 100);
            $path = public_path('Adjuntos/OtrosDocumentosCurriculum');
            if (!file_exists($path))
                mkdir($path, 0777, true);
            $file = $request->file('file');
            if (!empty($file)) {
                $file->move($path, $request->nombre_adjunto_otros);
                $files = new OtherEmployeDocument;
                $files->employe_id = $id;
                $files->other_document_id = $request->otros_id;
                $files->file = $request->nombre_adjunto_otros;
                $files->description = $request->obs_adjunto_otros;
                $files->user_id = Auth::user()->id;
                $files->save();
            }
            DB::commit();
            return 1;
        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }

    public function eliminarArchivoOtros($nombre)
    {
        DB::beginTransaction();
        try {
            $documento = OtherEmployeDocument::where('file', $nombre);
            if ($documento->delete()) {
                unlink(public_path('Adjuntos/OtrosDocumentosCurriculum/' . $nombre));
            }
            DB::commit();
            return 1;
        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }

    public function actualizarCurriculum(Request $request)
    {
        $employe_id = Crypt::decryptString($request->id);
        $empleado = Employe::find($employe_id);
        if (empty($empleado))
            return 0;

        //experiencia laboral
        if ($request->jsonTableExp) {
            EmployeExperience::where('employe_id', $employe_id)->update(['state' => 0]);
            $infoTablaExp = json_decode($request->jsonTableExp);
            foreach ($infoTablaExp as $exp) {
                $repetido = EmployeExperience::where('employe_id', $employe_id)
                    ->where('start_date', $exp->fechaini)
                    ->where('end_date', $exp->fechafin)
                    ->first();
                if (!empty($repetido)) {
                    $repetido->update(['state' => 1]);
                } else {
                    $experiencia = new EmployeExperience;
                    $experiencia->employe_id = $employe_id;
                    $experiencia->company_name = $exp->compania;
                    $experiencia->position = $exp->cargo;
                    $experiencia->start_date = $exp->fechaini;
                    $experiencia->end_date = $exp->fechafin;
                    $experiencia->immediate_boss = $exp->jefe;
                    $experiencia->telephone = $exp->telefono;
                    $experiencia->functions = $exp->funciones;
                    $experiencia->user_id = Auth::user()->id;
                    $experiencia->save();
                }
            }
            EmployeExperience::where('employe_id', $employe_id)->where('state', 0)->delete();
        }

        //referencias personales
        if ($request->jsonTableRef) {
            EmployeReference::where('employe_id', $employe_id)->update(['state' => 0]);
            $infoTablaRef = json_decode($request->jsonTableRef);
            foreach ($infoTablaRef as $ref) {
                $repetido = EmployeReference::where('employe_id', $employe_id)
                    ->where('name', $ref->nombre)
                    ->where('relationship', $ref->parentezco)
                    ->first();
                if (!empty($repetido)) {
                    $repetido->update(['state' => 1]);
                } else {
                    $referencia = new EmployeReference;
                    $referencia->employe_id = $employe_id;
                    $referencia->name = $ref->nombre;
                    $referencia->position = $ref->cargo;
                    $referencia->telephone = $ref->telefono;
                    $referencia->relationship = $ref->parentezco;
                    $referencia->user_id = Auth::user()->id;
                    $referencia->save();
                }
            }
            EmployeReference::where('employe_id', $employe_id)->where('state', 0)->delete();
        }
        return 1;
    }

    public function cargarExamenes(Request $request)
    {
        ini_set('post_max_size', 100);
        ini_set('max_file_uploads', '100');
        DB::beginTransaction();
        try {
            $contrato = EmployeContract::with('rel_empleado:id,identification')->find($request->contract_id);
            $nombreMedico = 0;
            $nombrePsico = 0;
            $path = public_path('Adjuntos/Examenes');
            if (!file_exists($path))
                mkdir($path, 0777, true);
            // guardar Exámen Médico
            $fileMedico = $request->file('file_medico');

            if (!empty($fileMedico)) {
                $extension = $fileMedico->getClientOriginalExtension();
                $nombreMedico = 'Médico'.$contrato?->rel_empleado?->identification . '_' . date('d-m-Y h_i_s') . '.' . $extension;
                $fileMedico->move($path, $nombreMedico);
            }
            // guardar Exámen Psicométrico
            $filePsico = $request->file('file_psico');
            if (!empty($filePsico)) {
                $extension = $filePsico->getClientOriginalExtension();
                $nombrePsico = 'Psicométrico'.$contrato?->rel_empleado?->identification . '_' . date('d-m-Y h_i_s') . '.' . $extension;
                $filePsico->move($path, $nombrePsico);
            }

            if (!empty($fileMedico)) {
                $med = new Exam();
                $med->contract_id = $request->contract_id;
                $med->date = $request->date_medico;
                $med->type = $request->tipo_examen_medico;
                $med->file = $nombreMedico;
                $med->save();
            }

            if (!empty($filePsico)) {
                $med = new Exam();
                $med->contract_id = $request->contract_id;
                $med->date = $request->date_psico;
                $med->type = 'Psicométrico';
                $med->concept = $request->concepto_psico;
                $med->file = $nombrePsico;
                $med->save();
            }
            DB::commit();
            return 1;
        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }

    // consultar examenes y mostrarlos en sweetAlert
    public function detalleExamenes(Request $request)
    {
        $examenes = Exam::where('contract_id', $request->id)->get();
        return response()->json($examenes);
    }
}