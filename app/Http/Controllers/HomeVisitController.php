<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\Employe;
use App\Models\Empresa;
use App\Models\Locality;
use App\Models\HomeVisit;
use App\Models\VisitType;
use App\Models\EmpresaUser;
use App\Models\DocumentType;
use App\Models\Neighborhood;
use Illuminate\Http\Request;
use App\Models\MaritalStatus;
use App\Models\EducationLevel;
use App\Models\HomeVisitImages;
use App\Models\HomeVisitRelative;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class HomeVisitController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role_or_permission:root|mostrar_visitas_domiciliarias', ['only' => ['index']]);
        $this->middleware('role_or_permission:root|crear_visita_domiciliaria', ['only' => ['create','store']]);
	}
    // create,store,show

    public function index()
    {
        return view('homevisits.index');
    }

    public function homeVisitIndex(Request $request)
    {
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');

        $columns = array(
            0 => 'documento',
            1 => 'nombre',
            2 => 'resultado',
            3 => 'fecha',
            4 => 'state',
            5 => 'action'
        );

        $consulta = DB::table('home_visits')
            ->join('employees', 'employees.id', 'home_visits.employe_id')
            ->join('empresas', 'empresas.id', 'home_visits.company_id')
            ->join('education_levels', 'education_levels.id', 'home_visits.education_level_id')
            ->join('visit_types', 'visit_types.id', 'home_visits.visit_type_id')
            ->join('users', 'users.id', 'home_visits.user_id')
            ->select(
                'home_visits.*',
                'home_visits.id AS id',
                'employees.identification AS documento',
                'employees.name AS nombre',
                'employees.surname AS apellido',
                'empresas.nombre AS empresa',
                'visit_types.name AS resultado',
                DB::raw('DATE_FORMAT(home_visits.created_at, "%d-%m-%Y %H:%m:%s") AS fecha')
            );

        if (!Auth::user()->hasRole('root')) {
            $empresas_user = EmpresaUser::where('user_id', Auth::user()->id)->pluck('empresa_id');
            $consulta = $consulta->whereIn('home_visits.company_id', $empresas_user);
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
                    ->where('home_visits.id', 'like', "%{$search}%");
                $clausulas = $consulta
                    ->orWhere('employees.identification', 'like', "%{$search}%");
                $clausulas = $consulta
                    ->orWhere('employees.name', 'like', "%{$search}%");
                $clausulas = $consulta
                    ->orWhere('employees.surname', 'like', "%{$search}%");
                $clausulas = $consulta
                    ->orWhere('empresas.nombre', 'like', "%{$search}%");
                $clausulas = $consulta
                    ->orWhere('visit_types.name', 'like', "%{$search}%");
                $clausulas = $consulta
                ->orWhere(DB::raw('DATE_FORMAT(home_visits.created_at, "%d-%m-%Y %H:%m:%s")'),'like',"%{$search}%");

                $inp_search = strtolower($search);
                $busqueda = '';
                if (stristr('Activo', $inp_search)) {
                    $busqueda = '%1%';
                } else if (stristr('Inactivo', $inp_search)) {
                    $busqueda = '%2%';
                }
                $clausulas = $consulta
                    ->orWhere('home_visits.state', 'like', $busqueda);
            } else {
                $clausulas = $consulta
                    ->where('home_visits.id', 'like', "%{$search}%")
                    ->whereIn('home_visits.company_id', $empresas_user);
                $clausulas = $consulta
                    ->orWhere('employees.identification', 'like', "%{$search}%")
                    ->whereIn('home_visits.company_id', $empresas_user);
                $clausulas = $consulta
                    ->orWhere('employees.name', 'like', "%{$search}%")
                    ->whereIn('home_visits.company_id', $empresas_user);
                $clausulas = $consulta
                    ->orWhere('employees.surname', 'like', "%{$search}%")
                    ->whereIn('home_visits.company_id', $empresas_user);
                $clausulas = $consulta
                    ->orWhere('empresas.nombre', 'like', "%{$search}%")
                    ->whereIn('home_visits.company_id', $empresas_user);
                $clausulas = $consulta
                    ->orWhere('visit_types.name', 'like', "%{$search}%")
                    ->whereIn('home_visits.company_id', $empresas_user);
                $clausulas = $consulta
                ->orWhere(DB::raw('DATE_FORMAT(home_visits.created_at, "%d-%m-%Y %H:%m:%s")'),'like',"%{$search}%")
                    ->whereIn('home_visits.company_id', $empresas_user);
                    $inp_search = strtolower($search);
                    $busqueda = '';
                    if (stristr('Activo', $inp_search)) {
                        $busqueda = '%1%';
                    } else if (stristr('Inactivo', $inp_search)) {
                        $busqueda = '%2%';
                    }
                    $clausulas = $consulta
                        ->orWhere('home_visits.state', 'like', $busqueda)
                        ->whereIn('home_visits.company_id', $empresas_user);
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
                $nestedData['resultado'] = $r->resultado;
                $nestedData['fecha'] = $r->fecha;
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

    public function create()
    {
        if (Auth::user()->hasRole('root')) {
            $empresas =  Empresa::all()->pluck('nombre', 'id');
        } else {
            $empresas_user = EmpresaUser::where('user_id', Auth::user()->id)->pluck('empresa_id');
            $empresas =  Empresa::whereIn('id', $empresas_user)->pluck('nombre', 'id');
        }
        $localidades =  ['Seleccione...' => ''];
        $barrios =  ['Seleccione...' => ''];
        $ciudades = Ciudad::select(DB::raw("CONCAT(nombre,' - ',departamento) as display_name"), "id")->pluck('display_name', 'id');
        $tipos_documentos = DocumentType::where('document_category_id', 1)->get()->pluck('name', 'id');
        $estado_civil =  MaritalStatus::all()->pluck('name', 'id');
        $formaciones =  EducationLevel::all()->pluck('name', 'id');
        $tipo_visitas =  VisitType::where('module','Visita Domiciliaria')->get()->pluck('name', 'id');
        return view('homevisits.create', compact('empresas', 'ciudades', 'localidades', 'barrios','tipos_documentos','estado_civil','formaciones','tipo_visitas'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $empleado = Employe::where('identification',$request->cedula)->first();
            HomeVisit::where('employe_id',$empleado->id)->update(['state' => 0]);
            ini_set('post_max_size', 100);
            $fecha = date('d_m_Y_H.i.s');
            $firma1 = $fecha.'_'.$empleado->identification.'.png';
            // convertir la imagen obtenida en base64 y almacenarla en JPG
            $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->firmaBase64));
            $path = public_path('/Adjuntos/Visita Domiciliaria');
                // comprobar existencia de la carpeta. Si no existe, se crea con permisos.
                if (!file_exists($path))
                    mkdir($path, 0777, true);
            $path = public_path().'/Adjuntos/Visita Domiciliaria/'.$firma1;
            file_put_contents($path,$image);

            $firma2 = $fecha.'_'.Auth::user()->username.'.png';
            // convertir la imagen obtenida en base64 y almacenarla en JPG
            $image2 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->firmaBase642));
                // comprobar existencia de la carpeta. Si no existe, se crea con permisos.
                if (!file_exists($path)) 
                    mkdir($path, 0777, true);
            $path = public_path().'/Adjuntos/Visita Domiciliaria/'.$firma2;
            file_put_contents($path,$image2);

            $visita = new HomeVisit;
            $visita->employe_id = $empleado->id;
            $visita->company_id = $empleado->rel_empresa->id;
            $visita->position = $request->cargo;
            $visita->education_level_id = $request->academic_degree;
            $visita->visit_type_id = $request->resultado_visita;
            $visita->who_attends = $request->nombre_atiende;
            $visita->relationship = $request->parentesco;
            $visita->employment_situation = $request->situacion_laboral;
            $visita->ease_of_transportation = $request->facilidad_transporte;
            $visita->type_transport = $request->mendio_transporte;
            $visita->vehicle = $request->cual_transporte;
            $visita->who_live_with = $request->con_quien_vive;
            $visita->live_alone = $request->checkViveSolo == 'on'?'Si':'No';
            $visita->family_classification = $request->clasificacion_familiar;
            $visita->specify = $request->especificar_ampiada;
            $visita->housing_type = $request->tipo_vivienda;
            $visita->what_housing = $request->cual_vivienda;
            $visita->own_home = $request->propia_vivienda;
            $visita->what_other_housing = $request->cual_vivienda_otro;
            $visita->has_bathrom = $request->checkBaño == 'on'?'Si':'No';
            $visita->has_electricity = $request->checkLuz == 'on'?'Si':'No';
            $visita->has_water = $request->checkAgua == 'on'?'Si':'No';
            $visita->has_gas = $request->checkGas == 'on'?'Si':'No';
            $visita->has_thelephone = $request->checkTeléfono == 'on'?'Si':'No';
            $visita->has_internet = $request->checkInternet == 'on'?'Si':'No';
            $visita->has_tile = $request->checkBaldosa == 'on'?'Si':'No';
            $visita->has_asphalt = $request->checkCemento == 'on'?'Si':'No';
            $visita->has_ceramic = $request->checkCeramica == 'on'?'Si':'No';
            $visita->another_contribution = $request->aporte_economico;
            $visita->name_contribution = $request->nombres_fam_aporte;
            $visita->surname_contribution = $request->apellidos_fam_aporte;
            $visita->relationship_contribution = $request->parentesco_fam_aporte;
            $visita->position_contribution = $request->ocupacion_fam_aporte;
            $visita->pending_documents = $request->documentos_pendientes;
            $visita->truthful_information = $request->veracidad;
            $visita->description = $request->obs;
            $visita->applicant_signature = $firma1;
            $visita->interviewer_signature = $firma2;
            $visita->user_id = Auth::user()->id;
            $visita->save();

            if ($request->jsonTable) {
                $infoTabla = json_decode($request->jsonTable);
                foreach ($infoTabla as $val) {
                    $lvl = EducationLevel::where('name',$val->nivel_educativo)->first();
                    if(empty($lvl))
                        return response()->json(['status' => 0, 'msg' => 'El nivel de educación '.$val->nivel_educativo.' no está registrado en el sistema']);
                    $familiares = new HomeVisitRelative;
                    $familiares->home_visit_id = $visita->id;
                    $familiares->name = $val->nombres;
                    $familiares->surname = $val->apellidos;
                    $familiares->relationship = $val->parentesco_familiar;
                    $familiares->which_relative = $val->cual_parentesco;
                    $familiares->education_level_id = $lvl->id;
                    $familiares->employment_situation = $val->situacion_laboral_fam;
                    $familiares->save();
                }
            }
            $infoTabla2 = json_decode($request->jsonImages);
            if(!empty($infoTabla2)){
                foreach($infoTabla2 as $key => $val){
                    $nombreImg = $fecha.'_'.$key.'.png';
                    // convertir la imagen obtenida en base64 y almacenarla en JPG
                    $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $val->imagen));
                    $path = public_path('/Adjuntos/Visita Domiciliaria/'.$empleado->identification);
                    // comprobar existencia de la carpeta. Si no existe, se crea con permisos.
                    if (!file_exists($path))
                        mkdir($path, 0777, true);
                    $path = public_path().'/Adjuntos/Visita Domiciliaria/'.$empleado->identification.'/'.$nombreImg;
                    file_put_contents($path,$image);
                    $img = new HomeVisitImages;
                    $img->home_visit_id = $visita->id;
                    $img->image = $nombreImg;
                    $img->order = $key;
                    $img->save();
                }
            }
            DB::commit();
            return response()->json(['status' => 1, 'msg' => 'creado']);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['status' => 2, 'msg' => $th->getMessage()]);
        }
    }

    // mostrar vista para descargar PDF
    public function show($id){
        $id = Crypt::decryptString($id);
        $visita = HomeVisit::with([
            'rel_empleado:id,name,surname,identification,telephone,address,document_type_id,home_city_id,locality_id,neighborhood_id,date_of_birth,marital_status_id',
            'rel_empleado.rel_tipo_documento:id,name',
            'rel_empleado.rel_municipio_residencia:id,nombre',
            'rel_empleado.rel_barrio:id,name',
            'rel_empleado.rel_localidad:id,name',
            'rel_empleado.rel_estado_civil:id,name',
            'rel_usuario:id,name,identification',
            'rel_empresa:id,nombre',
            'rel_nivel_educacion:id,name',
            'rel_tipo_visita:id,name',
            'rel_familiares',
            'rel_imagenes',
            'rel_familiares.rel_nivel_educacion:id,name'
        ])->find($id);
        return view('homevisits.show', compact('visita'));
    }
}