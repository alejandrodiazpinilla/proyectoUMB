<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Employe;
use App\Models\Training;
use Illuminate\Http\Request;
use App\Models\TrainingEntity;
use App\Models\TrainingEmploye;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class TrainingController extends Controller{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role_or_permission:root|mostrar_capacitaciones|crear_capacitacion|actualizar_capacitacion', ['only' => ['index','store','update']]);
    }

    public function index(){
        $entidades = TrainingEntity::where('state',1)->get()->pluck('name','id');
        return view('trainings.index', compact('entidades'));
    }

    public function trainingsIndex(Request $request){
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');
        $columns = array(
        0 => 'date',
        1 => 'nro_participants',
        2 => 'topic',
        3 => 'description',
        4 => 'created_at',
        5 => 'action'
     );

        $totalData = Training::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value'))){
            $posts = Training::offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
            $totalFiltered = Training::count();
        }else{
            $search = $request->input('search.value');
            $posts = Training::where('id', 'like', "%{$search}%")
            ->orWhere('date','like',"%{$search}%")
            ->orWhere('nro_participants','like',"%{$search}%")
            ->orWhere('description','like',"%{$search}%")
            ->orWhere('created_at','like',"%{$search}%")
            ->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();
            $totalFiltered = Training::where('id', 'like', "%{$search}%")
            ->orWhere('date','like',"%{$search}%")
            ->orWhere('nro_participants','like',"%{$search}%")
            ->orWhere('description','like',"%{$search}%")
            ->orWhere('created_at','like',"%{$search}%")
            ->count();
        }

        $data = array();

        if($posts){
            foreach($posts as $r){
                $nestedData['id'] = $r->id;
                $nestedData['date'] = date('d-m-Y h:i:s a',strtotime($r->date));
                $nestedData['fecha'] = date('d-m-Y',strtotime($r->date));
                $nestedData['hour'] = date('H:i:s',strtotime($r->date));
                $nestedData['nro_participants'] = $r->nro_participants;
                $nestedData['topic'] = $r->topic;
                $nestedData['description'] = $r->description;
                $nestedData['created_at'] = date('d-m-Y h:i:s a',strtotime($r->created_at));
                $nestedData['action'] = $r;
                $nestedData['fechasDiff'] = $r->date > date("Y-m-d");
                $nestedData['permisoEditar'] = Auth::user()->hasrole('root') || Auth::user()->can('actualizar_capacitacion');
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
        //Validar Duplicidad
        $unique = Training::where('date',date('Y-m-d',strtotime($request->fecha)))
        ->where('entity_id',$request->entity_id)
        ->where('topic',$request->topic)
        ->count();
        if ($unique >= 1) {
            return response()->json(['status' => 0, 'msg' => 'Ya existe una capacitación con los mismos criterios']);
        }
        try{
            DB::beginTransaction();
            $training = new Training;
            $training->date = date('Y-m-d',strtotime($request->fecha)).' '.$request->hora;
            $training->nro_participants = $request->nro_participants;
            $training->entity_id = $request->entity_id;
            $training->type = $request->type;
            $training->link_address = $request->linkDir;
            $training->topic = $request->topic;
            $training->description = $request->description;
            $training->user_id = Auth::user()->id;
            $training->save();

            if($request->jsonTableParti) {
                $infoTabla = json_decode($request->jsonTableParti);
                $emails = [];
                foreach ($infoTabla as $key => $part) {
                    $employe = Employe::where('identification',$part->cedula)->first();
                    $participante = new TrainingEmploye;
                    $participante->training_id = $training->id;
                    $participante->employe_id = $employe->id;
                    $participante->save();
                    array_push($emails,$employe->email);
                }
                if(!empty($emails)){
                    $request->request->add(['entidad' => TrainingEntity::find($request->entity_id)->name]);
                    $datos = $request;
                    Mail::send('emails.capacitaciones', ['emails' => $emails, 'datos' => $datos], function ($message) use ($emails, $datos) {
                        $message->from('notificaciones@correo.com', 'Alejandro Ltda');
                        $message->Bcc($emails);
                        $message->subject('Citación a Capacitación');
                    });
                }
            }
            DB::commit();
            return response()->json(['status' => 1, 'msg' => 'creado']);
        }catch (\Throwable $th) {
            DB::rollback();
            return response()->json($th->getMessage());
        }
    }

    public function update($id, Request $request){
        //Validador Duplicidad
        $unique_key = Training::where('date',date('Y-m-d',strtotime($request->fecha)))
        ->where('entity_id',$request->entity_id)
        ->where('topic',$request->topic)
        ->where('id','<>',$id)
        ->count();
        if ($unique_key >= 1) {
            return response()->json(['status' => 0, 'msg' => 'Ya existe una capacitación con los mismos criterios, diferente al que se encuentra editando']);
        }

        try{
            DB::beginTransaction();
            $training = Training::find($id);
            $training->date = date('Y-m-d',strtotime($request->fecha)).' '.$request->hora;
            $training->nro_participants = $request->nro_participants;
            $training->entity_id = $request->entity_id;
            $training->type = $request->type;
            $training->link_address = $request->linkDir;
            $training->topic = $request->topic;
            $training->description = $request->description;
            $training->user_id = Auth::user()->id;
            $training->save();

            if($request->jsonTableParti) {
                $infoTabla = json_decode($request->jsonTableParti);
                $emails = [];
                $employees_ids = [];
                foreach ($infoTabla as $key => $part) {
                    $employe = Employe::where('identification',$part->cedula)->first();
                    $unique = TrainingEmploye::where('training_id',$id)
                    ->where('employe_id',$employe->id)
                    ->count();
                    if ($unique == 0){
                        $participante = new TrainingEmploye;
                        $participante->training_id = $training->id;
                        $participante->employe_id = $employe->id;
                        $participante->save();
                        array_push($emails,$employe->email);
                    }
                    array_push($employees_ids,$employe->id);
                }
                TrainingEmploye::whereNotIn('employe_id',$employees_ids)->where('training_id', $training->id)->delete();
                if(!empty($emails)){
                    $request->request->add(['entidad' => TrainingEntity::find($request->entity_id)->name]);
                    $datos = $request;
                    Mail::send('emails.capacitaciones', ['emails' => $emails, 'datos' => $datos], function ($message) use ($emails, $datos) {
                        $message->from('notificaciones@correo.com', 'Alejandro Ltda');
                        $message->Bcc($emails);
                        $message->subject('Citación a Capacitación');
                    });
                }
            }
            DB::commit();
            return response()->json(['status' => 1, 'msg' => 'actualizado']);
        }catch (\Throwable $th) {
            DB::rollback();
            return response()->json($th->getMessage());
        }
    }

    public function tablaParticipantes(Request $request){
        $rta = TrainingEmploye::with('empleado')->where('training_id',$request->id)->get();
        return response()->json($rta??0);
    }
}
