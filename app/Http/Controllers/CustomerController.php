<?php

namespace App\Http\Controllers;


use App\Models\Ciudad;
use App\Models\Empresa;
use App\Models\Customer;
use App\Models\Locality;
use App\Models\EmpresaUser;
use App\Models\Neighborhood;
use Illuminate\Http\Request;
use App\Models\CustomerTracing;
use App\Models\CustomerAttachment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;

class CustomerController extends Controller{

    /* ************************************************************
        Constructor para definir accesos segun roles y permisos
     ************************************************************ */
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role_or_permission:root|mostrar_clientes|', ['only' => ['index']]);
        $this->middleware('role_or_permission:root|crear_cliente', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:root|actualizar_cliente', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:root|mostrar_seguimiento_cliente', ['only' => ['detalleSeguimiento']]);
        $this->middleware('role_or_permission:root|crear_seguimiento_cliente', ['only' => ['saveTracing']]);
        $this->middleware('role_or_permission:root|bloquear_cliente', ['only' => ['destroy']]);
    }

    /* ************************************************************
                    Vista inicial de clientes
     ************************************************************ */
    public function index(){
        return view('customers.index');
    }

    /* ************************************************************
                Metodo para pitar datatable con serverSide
     ************************************************************ */
    public function customersIndex(Request $request){

        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');

        $columns = array(
            0 => 'name',
            1 => 'admin_name',
            2 => 'telephone',
            3 => 'email',
            4 => 'localidad',
            5 => 'current_contract_end_date',
            6 => 'state',
            7 => 'action'
        );

        $consulta = DB::table('customers')
        ->join('localities', 'localities.id', 'customers.locality_id')
        ->join('empresas', 'empresas.id', 'customers.company_id')
        ->join('ciudades', 'ciudades.id', 'customers.city_id')
        ->join('neighborhoods', 'neighborhoods.id', 'customers.neighborhood_id')
        ->select(
            'customers.*',
            'customers.id AS id',
            'customers.name AS name',
            'localities.name AS localidad',
            'customers.company_id AS empresa_id',
            'empresas.nombre as company_name',
            'ciudades.nombre as city_name',
            'neighborhoods.name as neighborhood_name',
            'customers.state AS state'
        );
        if(!Auth::user()->hasRole('root')){
            $empresas_user = EmpresaUser::where('user_id',Auth::user()->id)->pluck('empresa_id');
            $consulta = $consulta->whereIn('customers.company_id',$empresas_user);
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
                ->where('customers.name', 'like', "%{$search}%");
                $clausulas = $consulta
                ->orWhere('customers.address','like',"%{$search}%");
                $clausulas = $consulta
                ->orWhere('customers.admin_name','like',"%{$search}%");
                $clausulas = $consulta
                ->orWhere('customers.telephone','like',"%{$search}%");
                $clausulas = $consulta
                ->orWhere('customers.email','like',"%{$search}%");
                $clausulas = $consulta
                ->orWhere('localities.name','like',"%{$search}%");
                $clausulas = $consulta
                ->orWhere('customers.current_contract_end_date','like',"%{$search}%");
                $inp_search = strtolower($search);
                $busqueda = '';
                if (stristr('Activo', $inp_search)) {
                    $busqueda = '%1%';
                } else if (stristr('Inactivo', $inp_search)) {
                    $busqueda = '%0%';
                } else if (stristr('En Gestión', $inp_search)) {
                    $busqueda = '%0%';
                }
                $clausulas = $consulta
                ->orWhere('state', 'like', $busqueda);
            } else {
                $clausulas = $consulta
                ->where('customers.name', 'like', "%{$search}%")
                ->whereIn('company_id',$empresas_user);
                $clausulas = $consulta
                ->orWhere('customers.address','like',"%{$search}%")
                ->whereIn('company_id',$empresas_user);
                $clausulas = $consulta
                ->orWhere('customers.admin_name','like',"%{$search}%")
                ->whereIn('company_id',$empresas_user);
                $clausulas = $consulta
                ->orWhere('customers.telephone','like',"%{$search}%")
                ->whereIn('company_id',$empresas_user);
                $clausulas = $consulta
                ->orWhere('customers.email','like',"%{$search}%")
                ->whereIn('company_id',$empresas_user);
                $clausulas = $consulta
                ->orWhere('customers.telephone','like',"%{$search}%")
                ->whereIn('company_id',$empresas_user);
                $clausulas = $consulta
                ->orWhere('localities.name','like',"%{$search}%")
                ->whereIn('company_id',$empresas_user);
                $clausulas = $consulta
                ->orWhere('customers.current_contract_end_date','like',"%{$search}%")
                ->whereIn('company_id',$empresas_user);

                $inp_search = strtolower($search);
                $busqueda = '';
                if (stristr('Activo', $inp_search)) {
                    $busqueda = '%1%';
                } else if (stristr('Inactivo', $inp_search)) {
                    $busqueda = '%0%';
                } else if (stristr('En Gestión', $inp_search)) {
                    $busqueda = '%0%';
                }
                $clausulas = $consulta
                ->orWhere('state', 'like', $busqueda)
                ->whereIn('company_id',$empresas_user);
            }
            $totalFiltered = $clausulas->count();
            $posts = $clausulas->offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }

        $data = array();
        if($posts){
            foreach($posts as $r){
                $nestedData['id'] = $r->id;
                $nestedData['crypt_id'] = Crypt::encryptString($r->id);
                $nestedData['name'] = $r->name;
                $nestedData['address'] = $r->address;
                $nestedData['admin_name'] = $r->admin_name;
                $nestedData['telephone'] = $r->telephone;
                $nestedData['email'] = $r->email;
                $nestedData['localidad'] = $r->localidad;
                $nestedData['city_name'] = $r->city_name;
                $nestedData['neighborhood_name'] = $r->neighborhood_name;
                $nestedData['residential_units'] = $r->residential_units;
                $nestedData['current_contract_end_date'] = $r->current_contract_end_date?date('d-m-Y',strtotime($r->current_contract_end_date)):'';
                $nestedData['contract_init_date'] = $r->contract_init_date?date('d-m-Y',strtotime($r->contract_init_date)):'';
                $nestedData['contract_end_date'] = $r->contract_end_date?date('d-m-Y',strtotime($r->contract_end_date)):'';
                if ($r->state == 1) {
                    $nestedData['state'] = '<div class="badge bg-success rounded-pill text-light p-2"><span>Activo</span></div>';
                } else  if ($r->state == 0){
                    $nestedData['state'] = '<div class="badge bg-danger rounded-pill text-light p-2"><span>Inactivo</span></div>';
                }else {
                    $nestedData['state'] = '<div class="badge bg-warning rounded-pill text-light p-2"><span>En Gestión</span></div>';
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

    /* ************************************************************
                mostrar vista para crear el cliente
     ************************************************************ */
    public function create(){
        if(Auth::user()->hasRole('root')){
            $empresas =  Empresa::all()->pluck('nombre','id');
        } else {
            $empresas_user = EmpresaUser::where('user_id',Auth::user()->id)->pluck('empresa_id');
            $empresas =  Empresa::whereIn('id',$empresas_user)->pluck('nombre','id');
        }
        $ciudades = Ciudad::select(DB::raw("CONCAT(nombre,' - ',departamento) as display_name"), "id")->pluck('display_name','id');
        $localidades =  ['Seleccione...' => ''];
        $barrios =  ['Seleccione...' => ''];
        return view('customers.create',compact('ciudades','localidades','barrios','empresas'));
    }

    /* ************************************************************
                    crear cliente nuevo
     ************************************************************ */
    public function store(Request $request){

        //Tratamiento de Variables.
        $nombre = trim($request->name);

        $fecha = date('d_m_Y_H.i.s');
        $nombre_file = HelpersClass::utf8_remplace(strtolower($nombre));

        DB::beginTransaction();
        try{
            $customer = Customer::create($request->all());
            $customerEdit = Customer::find($customer->id);

            $logo = '';
            $img = $request->file('logo');
            if (!empty($img)) {
                ini_set('post_max_size', 100);
                $path = public_path('image/logos/clientes');
            // comprobar existencia de la carpeta. Si no existe, se crea con permisos.
            if (!file_exists($path))
                mkdir($path, 0777, true);
                $extension = $request->file('logo')->getClientOriginalExtension();
                $logo = $nombre_file.'.'.$extension;
                $img->move($path, $logo);
            }


            $file_propuesta = $request->file('economic_proposition');
            if (!empty($file_propuesta)) {
                ini_set('post_max_size', 100);
                $path = public_path('Adjuntos/Propuesta Economica');
            // comprobar existencia de la carpeta. Si no existe, se crea con permisos.
            if (!file_exists($path))
                mkdir($path, 0777, true);
                $extension_propuesta = $request->file('economic_proposition')->getClientOriginalExtension();
                $nombre_propuesta = $fecha."_pro_economica_".$nombre_file . '.' . $extension_propuesta;
                $file_propuesta->move($path, $nombre_propuesta);
                $nuevoArchivo = new CustomerAttachment;
                $nuevoArchivo->name = $nombre_propuesta;
                if ($request->check_economic_proposition == 'on' && $request->email != null)
                    $nuevoArchivo->date_send = date('Y-m-d H:i:s');
                $nuevoArchivo->customer_id = $customer->id;
                $nuevoArchivo->user_id = Auth::user()->id;
                $nuevoArchivo->type = 'Propuesta Económica';
                $nuevoArchivo->save();

                if ($request->check_economic_proposition == 'on' && $request->email != null){
                    $email = $request->email;
                    Mail::send('emails.envioPropuesta',['email' =>$email], function($message) use ($email,$nombre_propuesta){
                        $message->from('notificaciones@correo.com','Alejandro Ltda');
                        $message->to($email);
                        $message->subject('Envío Propuesta Económica');
                        $message->attach(public_path('Adjuntos/Propuesta Economica/').$nombre_propuesta);
                    });
                }
            }
            $file_licitacion = $request->file('bidding');
            if (!empty($file_licitacion)) {
                ini_set('post_max_size', 100);
                $path = public_path('Adjuntos/Licitaciones');
            // comprobar existencia de la carpeta. Si no existe, se crea con permisos.
            if (!file_exists($path))
                mkdir($path, 0777, true);
                $extension_licitacion = $request->file('bidding')->getClientOriginalExtension();
                $nombre_licitacion = $fecha."_licitacion_".$nombre_file.'.'.$extension_licitacion;
                $file_licitacion->move($path, $nombre_licitacion);
                $nuevoArchivo = new CustomerAttachment;
                $nuevoArchivo->name = $nombre_licitacion;
                if ($request->check_bidding == 'on' && $request->email != null)
                    $nuevoArchivo->date_send = date('Y-m-d H:i:s');
                $nuevoArchivo->customer_id = $customer->id;
                $nuevoArchivo->user_id = Auth::user()->id;
                $nuevoArchivo->type = 'Licitación';
                $nuevoArchivo->save();

                if ($request->check_bidding == 'on' && $request->email != null){
                    $email = $request->email;
                    Mail::send('emails.envioLicitacion',['email' =>$email], function($message) use ($email,$nombre_licitacion){
                        $message->from('notificaciones@correo.com','Alejandro Ltda');
                        $message->to($email);
                        $message->subject('Envío Licitación');
                        $message->attach(public_path('Adjuntos/Licitaciones/').$nombre_licitacion);
                    });
                }
            }

            $file_riesgos = $request->file('risk_analysis');
            if (!empty($file_riesgos)) {
                ini_set('post_max_size', 100);
                $path = public_path('Adjuntos/Analisis Riesgos');
            // comprobar existencia de la carpeta. Si no existe, se crea con permisos.
            if (!file_exists($path))
                mkdir($path, 0777, true);
                $extension_riesgos = $request->file('risk_analysis')->getClientOriginalExtension();
                $nombre_riesgos = $fecha.'_riesgos_'.$nombre_file.'.'.$extension_riesgos;
                $file_riesgos->move($path, $nombre_riesgos);
                $nuevoArchivo = new CustomerAttachment;
                $nuevoArchivo->name = $nombre_riesgos;
                if ($request->check_risk == 'on' && $request->email != null)
                    $nuevoArchivo->date_send = date('Y-m-d H:i:s');
                $nuevoArchivo->customer_id = $customer->id;
                $nuevoArchivo->user_id = Auth::user()->id;
                $nuevoArchivo->year = $request->year_of_execution;
                $nuevoArchivo->type = 'Análisis de Riesgos';
                $nuevoArchivo->save();

                if ($request->check_risk == 'on' && $request->email != null){
                    $email = $request->email;
                    Mail::send('emails.envioRiesgos',['email' =>$email], function($message) use ($email,$nombre_riesgos){
                        $message->from('notificaciones@correo.com','Alejandro Ltda');
                        $message->to($email);
                        $message->subject('Envío Análisis de Riesgos');
                        $message->attach(public_path('Adjuntos/Analisis Riesgos/').$nombre_riesgos);
                    });
                }
            }

            $customerEdit->update([
                'logo' => $logo,
                'user_id' => Auth::user()->id,
            ]);
            DB::commit();
            return 2;
        }catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }

    /* ************************************************************
                mostrar vista para editar el cliente
     ************************************************************ */
    public function edit($id){
        $id = Crypt::decryptString($id);
        $cliente = Customer::with([
            'rel_ciudad:id,nombre',
            'rel_localidad:id,name',
            'rel_barrio:id,name',
            'rel_empresa:id,nombre',
            'rel_usuario:id,name'
            ])
        ->find($id);
        if(Auth::user()->hasRole('root')){
            $empresas =  Empresa::all()->pluck('nombre','id');
        } else {
            $empresas_user = EmpresaUser::where('user_id',Auth::user()->id)->pluck('empresa_id');
            $empresas =  Empresa::whereIn('id',$empresas_user)->pluck('nombre','id');
        }
        $ciudades = Ciudad::select(DB::raw("CONCAT(nombre,' - ',departamento) as display_name"), "id")->pluck('display_name','id');
        $localidades =  Locality::all()->pluck('name','id');
        $barrios =  Neighborhood::all()->pluck('name','id');
        return view('customers.edit',compact('cliente','empresas','ciudades','localidades','barrios'));
    }

    /* ************************************************************
                        actualizar cliente
     ************************************************************ */
    public function update($id, Request $request){
        $fecha = date('d_m_Y_H.i.s');
        $id = Crypt::decryptString($id);
        $customerEdit = Customer::find($id);

        //Tratamiento de Variables.
        $nombre = trim($request->name);
        $nombre_file = HelpersClass::utf8_remplace(strtolower($nombre));

        DB::beginTransaction();
        try{

            // actualizar el cliente tal como viene en el request
            $customerEdit->fill($request->all())->save();
            // agregar o actualizar logo
            $logo = $customerEdit->logo;
            $file = $request->file('logo');
            if (!empty($file)) {
                ini_set('post_max_size', 100);
                $path = public_path('image/logos/clientes');
            // comprobar existencia de la carpeta. Si no existe, se crea con permisos.
            if (!file_exists($path))
                mkdir($path, 0777, true);
                $extension = $file->getClientOriginalExtension();
                $file->move($path, ($nombre_file . '.' . $extension));
                $logo = $nombre_file.'.'.$extension;
            }

            $file_propuesta = $request->file('economic_proposition');
            if (!empty($file_propuesta)) {
                ini_set('post_max_size', 100);
                $path = public_path('Adjuntos/Propuesta Economica');
            // comprobar existencia de la carpeta. Si no existe, se crea con permisos.
            if (!file_exists($path))
                mkdir($path, 0777, true);
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $extension_propuesta = $request->file('economic_proposition')->getClientOriginalExtension();
                $nombre_propuesta = $fecha."_pro_economica_".$nombre_file . '.' . $extension_propuesta;
                $file_propuesta->move($path, $nombre_propuesta);
                $nuevoArchivo = new CustomerAttachment;
                $nuevoArchivo->name = $nombre_propuesta;
                if ($request->check_economic_proposition == 'on' && $request->email != null)
                    $nuevoArchivo->date_send = date('Y-m-d H:i:s');
                $nuevoArchivo->customer_id = $customerEdit->id;
                $nuevoArchivo->user_id = Auth::user()->id;
                $nuevoArchivo->type = 'Propuesta Económica';
                $nuevoArchivo->save();

                if ($request->check_economic_proposition == 'on' && $request->email != null){
                    $email = $request->email;
                    Mail::send('emails.envioPropuesta',['email' =>$email], function($message) use ($email,$nombre_propuesta){
                        $message->from('notificaciones@correo.com','Alejandro Ltda');
                        $message->to($email);
                        $message->subject('Envío Propuesta Económica');
                        $message->attach(public_path('Adjuntos/Propuesta Economica/').$nombre_propuesta);
                    });
                }
            }

            $file_licitacion = $request->file('bidding');
            if (!empty($file_licitacion)) {
                ini_set('post_max_size', 100);
                $path = public_path('Adjuntos/Licitaciones');
                // comprobar existencia de la carpeta. Si no existe, se crea con permisos.
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $extension_licitacion = $request->file('bidding')->getClientOriginalExtension();
                $nombre_licitacion = $fecha."_licitacion_".$nombre_file.'.'.$extension_licitacion;
                $file_licitacion->move($path, $nombre_licitacion);
                $nuevoArchivo = new CustomerAttachment;
                $nuevoArchivo->name = $nombre_licitacion;
                if ($request->check_bidding == 'on' && $request->email != null)
                    $nuevoArchivo->date_send = date('Y-m-d H:i:s');
                $nuevoArchivo->customer_id = $customerEdit->id;
                $nuevoArchivo->user_id = Auth::user()->id;
                $nuevoArchivo->type = 'Licitación';
                $nuevoArchivo->save();

                if ($request->check_bidding == 'on' && $request->email != null){
                    $email = $request->email;
                    Mail::send('emails.envioLicitacion',['email' =>$email], function($message) use ($email,$nombre_licitacion){
                        $message->from('notificaciones@correo.com','Alejandro Ltda');
                        $message->to($email);
                        $message->subject('Envío Licitación');
                        $message->attach(public_path('Adjuntos/Licitaciones/').$nombre_licitacion);
                    });
                }
            }

            $file_riesgos = $request->file('risk_analysis');
            if (!empty($file_riesgos)) {
                ini_set('post_max_size', 100);
                $path = public_path('Adjuntos/Analisis Riesgos');
                // comprobar existencia de la carpeta. Si no existe, se crea con permisos.
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $extension_riesgos = $request->file('risk_analysis')->getClientOriginalExtension();
                $nombre_riesgos = $fecha.'_riesgos_'.$nombre_file.'.'.$extension_riesgos;
                $file_riesgos->move($path, $nombre_riesgos);
                $nuevoArchivo = new CustomerAttachment;
                $nuevoArchivo->name = $nombre_riesgos;
                if ($request->check_risk == 'on' && $request->email != null)
                    $nuevoArchivo->date_send = date('Y-m-d H:i:s');
                $nuevoArchivo->customer_id = $customerEdit->id;
                $nuevoArchivo->user_id = Auth::user()->id;
                $nuevoArchivo->year = $request->year_of_execution;
                $nuevoArchivo->type = 'Análisis de Riesgos';
                $nuevoArchivo->save();

                if ($request->check_risk == 'on' && $request->email != null){
                    $email = $request->email;
                    Mail::send('emails.envioRiesgos',['email' =>$email], function($message) use ($email,$nombre_riesgos){
                        $message->from('notificaciones@correo.com','Alejandro Ltda');
                        $message->to($email);
                        $message->subject('Envío Análisis de Riesgos');
                        $message->attach(public_path('Adjuntos/Analisis Riesgos/').$nombre_riesgos);
                    });
                }
            }

            $file_contrato = $request->file('file_contract');
            if (!empty($file_contrato)) {
                ini_set('post_max_size', 100);
                $path = public_path('Adjuntos/Contrato Comercial');
                // comprobar existencia de la carpeta. Si no existe, se crea con permisos.
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $extension_contrato = $request->file('file_contract')->getClientOriginalExtension();
                $nombre_contrato = $fecha.'_contrato_'.$nombre_file.'.'.$extension_contrato;
                $file_contrato->move($path, $nombre_contrato);
                $nuevoArchivo = new CustomerAttachment;
                $nuevoArchivo->name = $nombre_contrato;
                if ($request->check_file_contract == 'on' && $request->email != null)
                    $nuevoArchivo->date_send = date('Y-m-d H:i:s');
                $nuevoArchivo->contract_init_date = $request->contract_init_date;
                $nuevoArchivo->contract_end_date = $request->contract_end_date;
                $nuevoArchivo->customer_id = $customerEdit->id;
                $nuevoArchivo->user_id = Auth::user()->id;
                $nuevoArchivo->year = $request->year_of_execution;
                $nuevoArchivo->type = 'Contrato Comercial';
                $nuevoArchivo->save();

                if ($request->check_file_contract == 'on' && $request->email != null){
                    $email = $request->email;
                    Mail::send('emails.envioContrato',['email' =>$email], function($message) use ($email,$nombre_contrato){
                        $message->from('notificaciones@correo.com','Alejandro Ltda');
                        $message->to($email);
                        $message->subject('Envío Contrato Comercial');
                        $message->attach(public_path('Adjuntos/Contrato Comercial/').$nombre_contrato);
                    });
                }
            }

            $customerEdit->update([
                'logo' => $logo,
                'user_id' => Auth::user()->id,
            ]);
            DB::commit();
            return 2;
        }catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }

    /* ************************************************************
                        guardar seguimiento
     ************************************************************ */

    public function saveTracing($id, Request $request){

        $id = Crypt::decryptString($id);

        //Validador Null.
        if (($request->check_brochure == 'on' && $request->email == null) ||
        ($request->check_visita == 'on' && $request->date_of_visit == null) ||
        $request->obs == null) {
            return 0;
        }
        DB::beginTransaction();
        try{
            $seguimiento = CustomerTracing::create($request->all());
            $seguimientoEdit = CustomerTracing::find($seguimiento->id);
            $seguimientoEdit->update([
                'user_id' => Auth::user()->id,
                'customer_id' => $id
            ]);
            if ($request->check_brochure == 'on' && $request->email != null) {
                $seguimientoEdit->update(['send_brochure' => 'Si']);
                $email = $request->email;
                Mail::send('emails.envioBrochure',['email' =>$email], function($message) use ($email){
                    $message->from('notificaciones@correo.com','Alejandro Ltda');
                    $message->to($email);
                    $message->subject('Envío Brochure');
                    $message->attach(public_path('files/Brochure.pdf'));
                });
            }
            if ($request->check_venta == 'on') {
                $cliente = Customer::find($id)->update([
                    'state' => 1,
                    'user_id' => Auth::user()->id
                ]);
            }
            DB::commit();
            return 1;
        }catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }

    /* ************************************************************
                Mostrar detalle seguimiento en modal
     ************************************************************ */
    public function detalleSeguimiento($id){
        $id = Crypt::decryptString($id);
        $seguimientos = CustomerTracing::where('customer_id',$id)->get();
        return json_encode($seguimientos);
    }

    /* ************************************************************
                Mostrar adjuntos en datatable
     ************************************************************ */
    public function verAdjuntos($id){
        $id = Crypt::decryptString($id);
        $adjuntos = CustomerAttachment::where('customer_id',$id)->get();

        $adjuntoArr = [];
        foreach ($adjuntos as $val) {
            $arr = [
                'name' => $val->name,
                'date_send' => $val->date_send?date('d-m-Y',strtotime($val->date_send)):'',
                'year' => $val->year?$val->year:'',
                'type' => $val->type,
                'created_at' => $val->created_at?date('d-m-Y h:i:s a',strtotime($val->created_at)):'',
                'action' => $val,
            ];
            array_push($adjuntoArr,$arr);
        }
        return json_encode($adjuntoArr);
    }

    /* ************************************************************
                Descargar adjuntos
     ************************************************************ */
    public function descargarArchivo(Request $request, $nombre){

        if ($request->tipo == "Propuesta Económica")
            $path = url("/Adjuntos/Propuesta Economica/");

        if ($request->tipo == "Análisis de Riesgos")
            $path = url("/Adjuntos/Analisis Riesgos/");

        if ($request->tipo == "Licitación")
            $path = url("/Adjuntos/Licitaciones/");

        if ($request->tipo == "Contrato Comercial")
            $path = url("/Adjuntos/Contrato Comercial/");

            $contents = $path."/".$nombre;
        return response()->json($contents);
    }

    /* ************************************************************
                Bloquear o activar un Cliente
     ************************************************************ */
    public function destroy($id){
        $id = Crypt::decryptString($id);
        $customers = Customer::find($id);
        if(!empty($customers)){
            if ($customers->state == 0) {
                $customers->state = 1;
            }else{
                $customers->state = 0;
            }
            $customers->save();
            return 1;
        }else{
            return 0;
        }
    }
}
