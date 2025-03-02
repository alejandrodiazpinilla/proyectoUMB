<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\PaymentCondition;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;


class PaymentConditionController extends Controller{
    
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role_or_permission:root|mostrar_condiciones_pago', ['only' => ['index']]);
        $this->middleware('role_or_permission:root|crear_condicion_pago', ['only' => ['index','store']]);
        $this->middleware('role_or_permission:root|actualizar_condicion_pago', ['only' => ['index','update']]);
        $this->middleware('role_or_permission:root|bloquear_condicion_pago', ['only' => ['index','destroy']]);
      }

    public function index(){
   	    return view('paymentconditions.index');
    }

    public function PaymentConditionsIndex(Request $request){

        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');

        $columns = array(
            0 => 'nombre',
            1 => 'action'
        );

        $consulta = DB::table('payment_conditions')
        ->join('users', 'users.id', 'payment_conditions.user_id')
        ->select(
            'payment_conditions.id AS id', 
            'payment_conditions.user_id AS user_id',
            'payment_conditions.name AS nombre', 
            'payment_conditions.state AS state', 
            'users.name AS usuario'
        );

        $totalData= $consulta->count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value'))){
            $posts = $consulta->offset($start)->limit($limit)->orderBy($order, $dir)->get();
            $totalFiltered = $totalData;
        }else{
            $search = $request->input('search.value');

            $clausulas = $consulta
            ->where('payment_conditions.id', 'like', "%{$search}%");
            $clausulas = $consulta
            ->orWhere('payment_conditions.name','like',"%{$search}%");
            $clausulas = $consulta
            ->orWhere('users.name','like',"%{$search}%");
            $inp_search = strtolower($search);
            $busqueda = '';
            if (stristr('Inactivo', $inp_search)) {
                $busqueda = '%0%';
            } else if (stristr('Activo', $inp_search)) {
                $busqueda = '%1%';
            }
            $clausulas = $consulta
                ->orWhere('payment_conditions.state', 'like', $busqueda);

            $totalFiltered = $clausulas->count();
            $posts = $clausulas->offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }       

    $data = array();

        if($posts){
            foreach($posts as $r){
                $nestedData['id'] = Crypt::encryptstring($r->id);
                $nestedData['nombre'] = $r->nombre;
                $nestedData['usuario'] = $r->usuario;
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

        if ($request->nombre == null) {
            return response()->json(['status' => 500, 'msg' => 'El campo nombre es obligatorio']);
        }

        $unique_key = PaymentCondition::where('name',$request->nombre)->count();
        if ($unique_key >= 1) {
            return response()->json(['status' => 500, 'msg' => 'Condición de pago duplicada']);
        }

    	try{
            DB::beginTransaction();

    		$condicion_pago = new PaymentCondition;
    		$condicion_pago->name = $request->nombre;
            $condicion_pago->user_id = Auth::user()->id;
    		$condicion_pago->save();
    		DB::commit();
            return response()->json(['status' => 200, 'msg' => 'Registro actualizado correctamente']);
    	}catch (\Throwable $th) {
    		DB::rollback();
            return response()->json($th->getMessage());
    	}
    }

    public function update($id, Request $request){

        $id = Crypt::decryptstring($id);
        if ($request->nombre == null) {
            return response()->json(['status' => 500, 'msg' => 'El campo nombre es obligatorio']);
        }

        $unique_key = PaymentCondition::where('name',$request->nombre)
        ->where('id','<>',$id)->count();
        if ($unique_key >= 1) {
            return response()->json(['status' => 500, 'msg' => 'Condición de pago duplicada']);

        }
        
    	try{
            DB::beginTransaction();
            
    		$condicion_pago = PaymentCondition::find($id);
    		$condicion_pago->name = $request->nombre;
            $condicion_pago->user_id = Auth::user()->id;
    		$condicion_pago->save();

    		DB::commit();
            return response()->json(['status' => 200, 'msg' => 'Registro actualizado correctamente']);
    	}catch (\Throwable $th) {
    		DB::rollback();
            return response()->json($th->getMessage());
    	}
        
    }

    public function destroy($id){
        $id = Crypt::decryptstring($id);
        $condicion_pago = PaymentCondition::find($id);
        $condicion_pago->state = $condicion_pago->state == 1 ? 0 : 1;
        $condicion_pago->save();
        return response()->json(['status' => 200, 'msg' => 'Estado actualizado correctamente']);
    }

}
