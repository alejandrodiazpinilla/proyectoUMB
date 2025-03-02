<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Area;
use App\Models\Empresa;
use App\Models\AreaUsers;
use App\Models\MonthReport;
use App\Models\EmpresaUser;
use Illuminate\Http\Request;
use App\Models\MonthReportImages;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class MonthReportController extends Controller{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role_or_permission:root|mostrar_informe_mensual|crear_informe_mensual|aprobar_informe_mensual|actualizar_informe_mensual', ['only' => ['index','store','update','aprobarInforme']]);
    }

    public function index(){
        $empresas = EmpresaUser::where('user_id',Auth::user()->id)->pluck('empresa_id');
        $empresas = Empresa::whereIn('id',$empresas)->pluck('nombre','id');
        return view('monthreport.index',compact('empresas'));
    }

    public function monthReportIndex(Request $request){
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');
        $columns = array(
            0 => 'user',
            1 => 'state',
            2 => 'month_year',
            3 => 'area',
            4 => 'created_at',
            5 => 'action'
        );

        $consulta = DB::table('monthly_report')
        ->join('users', 'users.id', 'monthly_report.user_id')
        ->join('areas_users', 'areas_users.user_id', 'users.id')
        ->join('areas', 'areas.id', 'areas_users.area_id')
        ->select(
            'monthly_report.*',
            'monthly_report.id AS id',
            'users.name AS user',
            'areas.nombre AS area',
            DB::raw('DATE_FORMAT(monthly_report.created_at, "%d-%m-%Y %H:%m:%s") AS created_at'),
        );
        if(!Auth::user()->hasRole('root')){
            $empresas_user = EmpresaUser::where('user_id',Auth::user()->id)->pluck('empresa_id');
            $consulta = $consulta->whereIn('company_id',$empresas_user);
        }
        if(!Auth::user()->hasRole('root') && !Auth::user()->hasRole('admin') && !Auth::user()->hasRole('gerencia') && !Auth::user()->hasRole('subgerencia')){
                $areasUser = AreaUsers::where('user_id', Auth::user()->id)->pluck('area_id');
                $consulta = $consulta->whereIn('monthly_report.area_id',$areasUser);
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
        if(Auth::user()->hasRole('root') || Auth::user()->hasRole('admin') || Auth::user()->hasRole('gerencia') || Auth::user()->hasRole('subgerencia')){
            $clausulas = $consulta
            ->where('month_year', 'like', "%{$search}%");
            $clausulas = $consulta
            ->orWhere('users.name','like',"%{$search}%");
            $clausulas = $consulta
            ->orWhere('areas.nombre','like',"%{$search}%");
            $clausulas = $consulta
            ->orWhere(DB::raw('DATE_FORMAT(monthly_report.created_at, "%d-%m-%Y %H:%m:%s")'),'like',"%{$search}%");
        } else {
            $clausulas = $consulta
            ->where('month_year', 'like', "%{$search}%")
            ->whereIn('company_id',$empresas_user);
            $clausulas = $consulta
            ->orWhere('users.name','like',"%{$search}%")
            ->whereIn('company_id',$empresas_user);
            $clausulas = $consulta
            ->orWhere('areas.nombre','like',"%{$search}%")
            ->whereIn('company_id',$empresas_user);
            $clausulas = $consulta
            ->orWhere(DB::raw('DATE_FORMAT(monthly_report.created_at, "%d-%m-%Y %H:%m:%s")'),'like',"%{$search}%")
            ->whereIn('company_id',$empresas_user);

            $inp_search = strtolower($search);
                $busqueda = '';
                if (stristr('Pendiente por Aprobación', $inp_search)) {
                    $busqueda = '%0%';
                }else if (stristr('Aprobado por Subgerencia', $inp_search)) {
                    $busqueda = '%1%';
                }else if (stristr('Rechazado por Subgerencia', $inp_search)) {
                    $busqueda = '%2%';
                } else if (stristr('Aprobado por Gerencia', $inp_search)) {
                    $busqueda = '%3%';
                } else if (stristr('Rechazado por Gerencia', $inp_search)) {
                    $busqueda = '%4%';
                }
                $clausulas = $consulta
                ->orWhere('monthly_report.state', 'like', $busqueda)
                ->whereIn('company_id',$empresas_user);
        }

        $totalFiltered =$totalData;
        $posts = $clausulas->offset($start)->limit($limit)->orderBy($order, $dir)->get();
    }

        $data = array();

        if($posts){
            foreach($posts as $r){
                $area = Area::where('id',$r->area_id)->first()->nombre;
                $nestedData['id'] = $r->id;
                $nestedData['crypt_id'] = Crypt::encryptString($r->id);
                $nestedData['user'] = $r->user;
                $nestedData['area'] = $area;
                $nestedData['images'] = MonthReportImages::where('monthly_report_id',$r->id)->get();
                $nestedData['month_year'] = $r->month_year;
                $nestedData['created_at'] = $r->created_at;
                $nestedData['permisoAprobar'] = (Auth::user()->hasRole('subgerencia') && ($r->state == 0 || $r->state == 2)) || (Auth::user()->hasRole('gerencia') && ($r->state == 1 || $r->state == 4));
                $nestedData['permisoEditar'] = Auth::user()->hasRole('root') || Auth::user()->hasRole('admin') || Auth::user()->can('actualizar_informe_mensual');
                $nestedData['action'] = $r;

                if ($r->state == 0)
                    $nestedData['state'] = '<div class="badge bg-primary rounded-pill text-light p-2"><span>Pendiente por Aprobación</span></div>';
                else if ($r->state == 1)
                    $nestedData['state'] = '<div class="badge bg-warning rounded-pill text-light p-2"><span>Aprobado por Subgerencia</span></div>';
                else if ($r->state == 2)
                    $nestedData['state'] = '<div class="badge bg-danger rounded-pill text-light p-2"><span>Rechazado por Subgerencia</span></div>';
                else if ($r->state == 3)
                    $nestedData['state'] = '<div class="badge bg-success rounded-pill text-light p-2"><span>Aprobado por Gerencia</span></div>';
                else
                    $nestedData['state'] = '<div class="badge bg-danger rounded-pill text-light p-2"><span>Rechazado por Gerencia</span></div>';

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

    public function create(){
        $empresas = EmpresaUser::where('user_id',Auth::user()->id)->pluck('empresa_id');
        $empresas = Empresa::whereIn('id',$empresas)->pluck('nombre','id');
        return view('monthreport.create',compact('empresas'));
    }

    public function store(Request $request){

        $empresas_user = EmpresaUser::where('user_id', Auth::user()->id)->pluck('empresa_id');
        $areasUser = AreaUsers::where('user_id', Auth::user()->id)->pluck('area_id');
        $area = Area::whereIn('id',$areasUser)->where('empresa_id',$request->company_id)->first();
        $informe = MonthReport::where('area_id',$area->id)
        ->where('company_id',$request->company_id)
        ->where('month_year',$request->month_year)
        ->count();
        if($informe > 0)
            return 0;

        DB::beginTransaction();
        try{
            ini_set('post_max_size', 100);
            $mr = new MonthReport();
            $mr->area_id = $area->id;
            $mr->user_id = Auth::user()->id;
            $mr->company_id = $request->company_id;
            $mr->month_year = $request->month_year;
            $mr->audit_date = date('Y-m-d');
            $mr->reason_report = $request->reason_report;
            $mr->report_scope = $request->report_scope;
            $mr->developed_activities = $request->developed_activities;
            $mr->weaknesses = $request->weaknesses;
            $mr->strengths = $request->strengths;
            $mr->indicator = $request->indicator;
            $mr->check_indicator = $request->check_indicator==null?0:1;
            $mr->conclusions = $request->conclusions;
            $mr->save();

            $infoTabla = json_decode($request->jsonImages);
            if(!empty($infoTabla)){
                foreach($infoTabla as $key => $val){
                    $nombreImg = $request->month_year.'_'.$area->nombre.'_'.$key.'.png';
                    // convertir la imagen obtenida en base64 y almacenarla en JPG
                    $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $val->imagen));
                    $path = public_path('/image/informeMensual/'.$area->nombre);
                    // comprobar existencia de la carpeta. Si no existe, se crea con permisos.
                    if (!file_exists($path))
                        mkdir($path, 0777, true);
                    $path = public_path().'/image/informeMensual/'.$area->nombre.'/'.$nombreImg;
                    file_put_contents($path,$image);
                    $mri = new MonthReportImages;
                    $mri->monthly_report_id = $mr->id;
                    $mri->image = $nombreImg;
                    $mri->order = $key;
                    $mri->save();
                }
            }
            DB::commit();
            return 1;
        }catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }


    public function edit($id){
        $id = Crypt::decryptString($id);
        $empresas = EmpresaUser::where('user_id',Auth::user()->id)->pluck('empresa_id');
        $empresas = Empresa::whereIn('id',$empresas)->pluck('nombre','id');
        $reporte = MonthReport::with([
            'rel_area:id,nombre',
            'rel_usuario:id,name,signature',
            'rel_company:id,nombre',
            'rel_imagenes'
        ])->find($id);
        return view('monthreport.edit',compact('empresas','reporte'));
    }

    // mostrar PDF
    public function show($id){
        $id = Crypt::decryptString($id);
        $reporte = MonthReport::with([
            'rel_area:id,nombre',
            'rel_usuario:id,name,signature',
            'rel_company:id,nombre',
            'rel_imagenes'
        ])->find($id);
        $gerencia =  User::whereHas('roles', function($q){
            $q->where('name', 'gerencia');
        })->first()->signature;

        $subgerencia =  User::whereHas('roles', function($q){
            $q->where('name', 'subgerencia');
        })->first()->signature;

        return view('monthreport.show', compact('reporte','subgerencia','gerencia'));
    }

    public function update(Request $request){
        DB::beginTransaction();
        try{
            $id = Crypt::decryptString($request->id);
            $empresas_user = EmpresaUser::where('user_id', Auth::user()->id)->pluck('empresa_id');
            $areasUser = AreaUsers::where('user_id', Auth::user()->id)->pluck('area_id');
            $area = Area::whereIn('id',$areasUser)->where('empresa_id',$request->company_id)->first();
            $mr = MonthReport::find($id);
            ini_set('post_max_size', 100);
            $mr->area_id = $area->id;
            $mr->user_id = Auth::user()->id;
            $mr->company_id = $request->company_id;
            $mr->month_year = $request->month_year;
            $mr->audit_date = date('Y-m-d');
            $mr->reason_report = $request->reason_report;
            $mr->report_scope = $request->report_scope;
            $mr->developed_activities = $request->developed_activities;
            $mr->weaknesses = $request->weaknesses;
            $mr->strengths = $request->strengths;
            $mr->indicator = $request->indicator;
            $mr->check_indicator = $request->check_indicator==null?0:1;
            $mr->conclusions = $request->conclusions;
            $mr->save();

            $infoTabla = json_decode($request->jsonImages);
            if(!empty($infoTabla)){
                $path = public_path('/image/informeMensual/'.$area->nombre);
                    // comprobar existencia de la carpeta. Si no existe, se crea con permisos.
                    if (!file_exists($path))
                        mkdir($path, 0777, true);

            //busca cuales de las que estaban guardados ya no vienen en la tabla, y lo elimina en BD

            // obtener los nombres de las imagenes en la base de datos
            $serv_bd = MonthReportImages::where('monthly_report_id',$mr->id)->get()->pluck('image')->toArray();
            // obtener los nombres de las imagenes que vienen por el request
            $serv_app = [];
            $urlElim = url('/').'/image/informeMensual/'.$area->nombre.'/';
            foreach ($infoTabla as $val) {
            array_push($serv_app,str_replace($urlElim,'',$val->imagen));
            }
            //comprobar las imagenes diferentes entre las imagenes en base de datos y las que llegan por el request
            $serv_eliminar = array_diff($serv_bd, $serv_app);

            // eliminar las imagenes de base de datos que no se reciben en la tabla html
            $srvcs = MonthReportImages::where('monthly_report_id',$mr->id)->whereIn('image',$serv_eliminar)->delete();
            if($srvcs == true){
                // eliminar cada una de las imagenes del servidor
                foreach($serv_eliminar as $key => $elim){
                    $nombreImg = $request->month_year.'_'.$area->nombre.'_'.$key.'.png';
                    unlink(public_path().'/image/informeMensual/'.$area->nombre.'/'.str_replace(' ','_',$elim));
                }
            }
            $conteo = MonthReportImages::where('monthly_report_id',$mr->id)->orderBy('order', 'desc')->first()->order;
            foreach ($infoTabla as $key => $val) {
                $conteo = intval($conteo) + 1;
                $url = url('/');
                $nombreImg = $request->month_year.'_'.$area->nombre.'_'. $conteo .'.png';
                //si en la tabla viene una imagen que no esta registrada, la guarda
                if(strpos($val->imagen, $url) === false){
                // almacenar los datos en la tabla
                $serv = new MonthReportImages;
                $serv->monthly_report_id = $mr->id;
                $serv->image = $nombreImg;
                $serv->order = $conteo;
                $serv->save();

                // convertir la imagen obtenida en base64 y almacenarla en JPG
                $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $val->imagen));
                $filepath = public_path().'/image/informeMensual/'.$area->nombre.'/'.$nombreImg;
                file_put_contents($filepath,$image);
            }
            }
            }
            DB::commit();
            return 1;
        }catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }

    public function aprobarInforme($id, Request $request){
        DB::beginTransaction();
        try{
        $id = Crypt::decryptString($id);
        $informe = MonthReport::find($id);
        if(Auth::user()->hasRole('subgerencia') && $request->tipo == 'aprobar')//subgerencia
            $informe->update(['state' => 1]);
        else if(Auth::user()->hasRole('subgerencia') && $request->tipo == 'rechazar')//subgerencia
        $informe->update(['state' => 2]);
        else if(Auth::user()->hasRole('gerencia') && $request->tipo == 'aprobar')//gerencia
            $informe->update(['state' => 3]);
        else if(Auth::user()->hasRole('gerencia') && $request->tipo == 'rechazar')//gerencia
            $informe->update(['state' => 4]);
        else
            return 0;
        DB::commit();
        return 1;
        }catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }
}
