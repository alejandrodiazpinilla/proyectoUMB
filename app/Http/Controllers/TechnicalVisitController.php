<?php

namespace App\Http\Controllers;


use App\Models\VisitType;
use Illuminate\Http\Request;
use App\Models\TechnicalVisit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TechnicalVisitController extends Controller{

	public function __construct(){
        $this->middleware('auth');
		$this->middleware('role_or_permission:root|mostrar_visita_tecnica|crear_visita_tecnica|actualizar_visita_tecnica', ['only' => ['index','store','update']]);
	}

	public function index(){
		$tiposVisitas = VisitType::where('module','Visita Técnica')->get()->pluck('name','id');
		return view('technicalvisits.index',compact('tiposVisitas'));
	}

	public function technicalVisitIndex(Request $request){

        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');

        $columns = array(
            0 => 'id',
            1 => 'visit_type',
            2 => 'description',
            3 => 'date',
            4 => 'state',
            5 => 'observation',
            6 => 'action'
        );

		// FALTA VALIDAR CUANDO EL USUARIO ES CLIENTE, QUE SOLO MUESTRE LO DEL(OS) CLIENTE(S) DEL USUARIO EN SESION

		$consulta = DB::table('technical_visits')
		->join('visit_types', 'visit_types.id', 'technical_visits.visit_type_id')
		->select(
			'technical_visits.id AS id',
			'technical_visits.description AS description',
			DB::raw('DATE_FORMAT(technical_visits.date, "%d-%m-%Y") AS date'),
			DB::raw('DATE_FORMAT(technical_visits.new_date, "%d-%m-%Y") AS new_date'),
			'technical_visits.state AS state',
			'technical_visits.visit_type_id AS visit_type_id',
			'technical_visits.observation AS observation',
			'visit_types.name AS visit_type'
		);

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
			$clausulas = $consulta
			->where('technical_visits.id', 'like', "%{$search}%");
			$clausulas = $consulta
			->orWhere('technical_visits.description','like',"%{$search}%");
			$clausulas = $consulta
			->orWhere('technical_visits.observation','like',"%{$search}%");
			$clausulas = $consulta
			->orWhere('technical_visits.date','like',"%{$search}%");
			$clausulas = $consulta
			->orWhere('technical_visits.new_date','like',"%{$search}%");
			$clausulas = $consulta
			->orWhere('visit_types.name','like',"%{$search}%");
			$inp_search = strtolower($search);
			$busqueda = '';
			if (stristr('Por Gestionar', $inp_search)) {
				$busqueda = '%1%';
			} else if (stristr('Programada', $inp_search)) {
				$busqueda = '%0%';
			}
			$clausulas = $consulta
			->orWhere('technical_visits.state', 'like', $busqueda);
            $totalFiltered = $clausulas->count();
            $posts = $clausulas->offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }

        $data = array();
        if($posts){
            foreach($posts as $r){
                $nestedData['permiso_editar'] = (Auth::user()->hasrole('root') || Auth::user()->can('actualizar_visita_tecnica'));
                $nestedData['id'] = $r->id;
                $nestedData['visit_type'] = $r->visit_type;
                $nestedData['description'] = $r->description;
                $nestedData['observation'] = $r->observation;
                $nestedData['date'] = $r->new_date??$r->date;
                if ($r->state == 1) {
                    $nestedData['state'] = '<div class="badge bg-warning rounded-pill text-light p-2"><span>Por Gestionar</span></div>';
                } else {
                    $nestedData['state'] = '<div class="badge bg-success rounded-pill text-light p-2"><span>Programada</span></div>';
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

	public function store(Request $request){

		//Validador Null.
		if ($request->visit_type_id == null || $request->description == null || $request->date_visit == null) {
			return 0;
		}

		DB::beginTransaction();
		try{
			$t_visit = new TechnicalVisit;
			$t_visit->visit_type_id = $request->visit_type_id;
			$t_visit->description = $request->description;
			$t_visit->date = $request->date_visit;
			$t_visit->user_id = Auth::user()->id;
			$t_visit->save();
			$email = Auth::user()->email;
			Mail::send('emails.solicitudVisita',['email' =>$email], function($message) use ($email){
				$message->from('notificaciones@correo.com','Alejandro Ltda');
				$message->to($email);
				$message->subject('Solicitud de visita recibida');
			});

			DB::commit();
			return 1;
		}catch (\Throwable $th) {
			DB::rollback();
			return $th->getMessage();

		}
	}

	public function update(Request $request){
		//Validador Null.
		if ($request->observacion == null || ($request->check_acept_date != 'on' && $request->new_date == null)) {
			return 0;
		}

		DB::beginTransaction();
		try{
			$t_visit = TechnicalVisit::find($request->id);
			$t_visit->observation = $request->observacion;
			$t_visit->new_date = $request->new_date;
			$t_visit->managed_by = Auth::user()->id;
			$t_visit->state = 2;
			$t_visit->save();
			$email = $t_visit->rel_usuario->email;
			Mail::send('emails.programarVisitaTecnica',['email' =>$email], function($message) use ($email){
				$message->from('notificaciones@correo.com','Alejandro Ltda');
				$message->to($email);
				$message->subject('Solicitud de visita recibida');
			});

			DB::commit();
			return 1;
		}catch (\Throwable $th) {
			DB::rollback();
			return $th->getMessage();

		}
	}
}
