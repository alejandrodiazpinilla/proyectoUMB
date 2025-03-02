<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\Empresa;
use App\Models\Provider;
use App\Models\EmpresaUser;
use Illuminate\Http\Request;
use App\Models\PaymentCondition;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ProviderController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
    $this->middleware('role_or_permission:root|mostrar_proveedores', ['only' => ['index']]);
    $this->middleware('role_or_permission:root|crear_proveedor', ['only' => ['create','store']]);
    $this->middleware('role_or_permission:root|actualizar_proveedor', ['only' => ['edit','update']]);
    $this->middleware('role_or_permission:root|bloquear_proveedor', ['only' => ['destroy']]);
  }

  public function index()
  {
    $ciudades = Ciudad::select(DB::raw("CONCAT(nombre,' - ',departamento) as display_name"), "id")->pluck('display_name', 'id');
    if (Auth::user()->hasRole('root')) {
      $empresas =  Empresa::all()->pluck('nombre', 'id');
    } else {
      $empresas_user = EmpresaUser::where('user_id', Auth::user()->id)->pluck('empresa_id');
      $empresas =  Empresa::whereIn('id', $empresas_user)->pluck('nombre', 'id');
    }
    return view('providers.index', compact('ciudades', 'empresas'));
  }

  public function providersIndex(Request $request){
    
    ini_set('max_execution_time', 0);
    ini_set('memory_limit', '-1');
    
    $columns = array(
      0 => 'nombrep',
      1 => 'ciudad',
      2 => 'telefono',
      3 => 'estado',
      4 => 'action'
    );
    
    $consulta = DB::table('providers')
        ->leftjoin('ciudades', 'ciudades.id', 'providers.city_id')
        ->leftjoin('payment_conditions', 'payment_conditions.id', 'providers.payment_condition_id')
        ->leftjoin('empresas', 'empresas.id', 'providers.company_id')
        ->select(
            'providers.*', 
            'providers.id AS id',
            'providers.telephone AS telefono',
            'providers.name AS nombrep',
            'ciudades.nombre AS ciudad',
            'ciudades.departamento AS departamento',
            'payment_conditions.name AS condicion_pago',
            'empresas.nombre AS empresa'
        );
        if(!Auth::user()->hasRole('root')){
            $empresas_user = EmpresaUser::where('user_id',Auth::user()->id)->pluck('empresa_id');
            $consulta = $consulta->whereIn('company_id',$empresas_user);
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
                ->where('providers.name', 'like', "%{$search}%");
                $clausulas = $consulta
                ->orWhere('providers.telephone','like',"%{$search}%");
                $inp_search = strtolower($search);
                $busqueda = '';
                if (stristr('Activo', $inp_search)) {
                  $busqueda = '%1%';
                } else if (stristr('Inactivo', $inp_search)) {
                  $busqueda = '%0%';
                }
                $clausulas = $consulta
                ->orWhere('providers.state', 'like', $busqueda);
            } else {
                $clausulas = $consulta
                ->where('providers.name', 'like', "%{$search}%")
                ->whereIn('company_id',$empresas_user);
                $clausulas = $consulta
                ->orWhere('providers.telephone','like',"%{$search}%")
                ->whereIn('company_id',$empresas_user); 
                $inp_search = strtolower($search);
                $busqueda = '';
                if (stristr('Activo', $inp_search)) {
                  $busqueda = '%1%';
                } else if (stristr('Inactivo', $inp_search)) {
                  $busqueda = '%0%';
                }
                $clausulas = $consulta
                ->orWhere('providers.state', 'like', $busqueda)
                ->whereIn('company_id',$empresas_user); 
            }
            
            $totalFiltered = $clausulas->count();
            $posts = $clausulas->offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }

        $data = array();
        if($posts){
            foreach($posts as $r){
                $nestedData['id'] = Crypt::encryptString($r->id);
                $nestedData['nombrep'] = $r->nombrep;
                $nestedData['ciudad'] = $r->ciudad . ' - ' . $r->departamento;
                $nestedData['telefono'] = $r->telefono;
                $nestedData['state'] = $r->state;
                if ($r->state == 1) {
                  $nestedData['estado'] = '<div class="badge bg-success rounded-pill text-light p-2"><span>Activo</span></div>';
              } else {
                  $nestedData['estado'] = '<div class="badge bg-danger rounded-pill text-light p-2"><span>Inactivo</span></div>';
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
    $empresas_user = EmpresaUser::where('user_id',Auth::user()->id)->pluck('empresa_id');
    $empresas =  Empresa::whereIn('id', $empresas_user)->pluck('nombre', 'id');

    if (Auth::user()->hasRole('root')) {
      $empresas =  Empresa::all()->pluck('nombre', 'id');
    }
     $ciudades = Ciudad::select(DB::raw("CONCAT(nombre,' - ',departamento) as display_name"), "id")->pluck('display_name', 'id');
     $condiciones =  PaymentCondition::all()->pluck('name', 'id');

    return view('providers.create', compact('ciudades', 'empresas','condiciones'));
  }

  public function store(Request $request)
  {
    //Validador Duplicidad
    $unique_key = Provider::where('nit', $request->nit)
    ->where('company_id', $request->company_id)->count();
    if ($unique_key >= 1) {
        return response()->json(['status' => 500, 'msg' => 'Ya existe un proveedor registrado con este nit']);
    }

    try {
      DB::beginTransaction();
        ini_set('post_max_size', 100);
        $rut = $request->file('doc_rut');
        $cc = $request->file('camara_comercio');
        $cb = $request->file('cert_bancaria');
        $nombreRut = null;
        $nombreCc = null;
        $nombreCb = null;
        $fecha = date('d_m_Y_H.i.s');
        $path = public_path('Adjuntos/Proveedores');
        if (!file_exists($path))
        mkdir($path, 0777, true);

        if (!empty($rut)) {
          $extension = $rut->getClientOriginalExtension();
          $nombreRut = $fecha . '_RUT_' . $request->nit . '.' . $extension;
          $rut->move($path, $nombreRut);
        }
        if (!empty($cc)) {
          $extension = $cc->getClientOriginalExtension();
          $nombreCc = $fecha . '_Cámara_de_Comercio_' . $request->nit . '.' . $extension;
          $cc->move($path, $nombreCc);
        }
        if (!empty($cb)) {
          $extension = $cb->getClientOriginalExtension();
          $nombreCb = $fecha . '_Certificación_Bancaria_' . $request->nit . '.' . $extension;
          $cb->move($path, $nombreCb);
        }

        $request['user_id'] = Auth::user()->id;
        $request['rut'] = $nombreRut;
        $request['chamber_commerce'] = $nombreCc;
        $request['bank_certification'] = $nombreCb;

        // Crear registro con lo que viene del request exceptuando campos
        Provider::create($request->except(['_token', 'doc_rut', 'camara_comercio','cert_bancaria']));
        DB::commit();
        return response()->json(['status' => 200, 'msg' => 'Registro creado con éxito', 'icon' => 'success']);
    } catch (\Throwable $th) {
        DB::rollback();
        return response()->json(['status' => 500, 'msg' => $th->getMessage(), 'icon' => 'error']);
    }
  }

  public function edit($id)
  {
    $id = Crypt::decryptString($id);
    $proveedor = Provider::find($id);
   
    $empresas_user = EmpresaUser::where('user_id',Auth::user()->id)->pluck('empresa_id');
    $empresas =  Empresa::whereIn('id', $empresas_user)->pluck('nombre', 'id');

    if (Auth::user()->hasRole('root')) {
      $empresas =  Empresa::all()->pluck('nombre', 'id');
    }
     $ciudades = Ciudad::select(DB::raw("CONCAT(nombre,' - ',departamento) as display_name"), "id")->pluck('display_name', 'id');
     $condiciones =  PaymentCondition::all()->pluck('name', 'id');

    return view('providers.edit', compact('proveedor','empresas','ciudades','condiciones'));
  }

  public function update(Request $request)
  {
    $id = Crypt::decryptString($request->id);

    //Validador Duplicidad
    $unique_key = Provider::where('nit', $request->nit)
    ->where('company_id', $request->company_id)
    ->where('id', '<>', $id)->count();
    if ($unique_key >= 1) {
        return response()->json(['status' => 500, 'msg' => 'Ya existe un proveedor registrado con este nit','icon' => 'error']);
    }

    try {
      DB::beginTransaction();
        ini_set('post_max_size', 100);
        $rut = $request->file('doc_rut');
        $cc = $request->file('camara_comercio');
        $cb = $request->file('cert_bancaria');
        $nombreRut = null;
        $nombreCc = null;
        $nombreCb = null;
        $fecha = date('d_m_Y_H.i.s');
        $path = public_path('Adjuntos/Proveedores');
        if (!file_exists($path))
        mkdir($path, 0777, true);

        if (!empty($rut)) {
          $extension = $rut->getClientOriginalExtension();
          $nombreRut = $fecha . '_RUT_' . $request->nit . '.' . $extension;
          $rut->move($path, $nombreRut);
        }
        if (!empty($cc)) {
          $extension = $cc->getClientOriginalExtension();
          $nombreCc = $fecha . '_Cámara_de_Comercio_' . $request->nit . '.' . $extension;
          $cc->move($path, $nombreCc);
        }
        if (!empty($cb)) {
          $extension = $cb->getClientOriginalExtension();
          $nombreCb = $fecha . '_Certificación_Bancaria_' . $request->nit . '.' . $extension;
          $cb->move($path, $nombreCb);
        }

        $request['user_id'] = Auth::user()->id;
        $request['rut'] = $nombreRut;
        $request['chamber_commerce'] = $nombreCc;
        $request['bank_certification'] = $nombreCb;

        $proveedor = Provider::find($id);
        // Actualizar registro con lo que viene del request exceptuando campos
        $proveedor->fill($request->except(['_token', 'doc_rut', 'camara_comercio','cert_bancaria']));

        DB::commit();
        return response()->json(['status' => 200, 'msg' => 'Registro creado con éxito','icon' => 'success']);
    } catch (\Throwable $th) {
        DB::rollback();
        return response()->json(['status' => 500, 'msg' => $th->getMessage(),'icon' => 'error']);
    }
  }

  public function destroy($id){
    try {
      DB::beginTransaction();
      $id = Crypt::decryptstring($id);
      $proveedor = Provider::find($id);
      $proveedor->state = $proveedor->state == 1 ? 0 : 1;
      $proveedor->save();  
      DB::commit();
      return response()->json(['status' => 200, 'msg' => 'Estado actualizado correctamente']);
    } catch (\Throwable $th) {
        DB::rollback();
        return response()->json(['status' => 500, 'msg' => $th->getMessage()]);
    }
  }
}