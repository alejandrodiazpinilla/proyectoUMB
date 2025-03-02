<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Empresa;
use App\Models\Provider;
use App\Models\Quotation;
use Rmunate\Php2Js\Render;
use App\Models\EmpresaUser;
use Illuminate\Http\Request;
use App\Models\PaymentCondition;
use App\Models\QuotationProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;

class QuotationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:root|mostrar_cotizaciones', ['only' => ['index']]);
        $this->middleware('role_or_permission:root|crear_cotizacion', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:root|aprobar_cotizacion', ['only' => ['aprobarCotizacion']]);
        $this->middleware('role_or_permission:root|registrar_pago_orden_compra', ['only' => ['registrarPago']]);
    }

    public function index()
    {
        return view('quotations.index');
    }

    public function quotationsIndex(Request $request)
    {
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');
        $columns = array(
            0 => 'empresa',
            1 => 'estado',
            2 => 'fecha',
            3 => 'usuario',
            4 => 'action',
        );

        $consulta = DB::table('quotations')
            ->join('users', 'users.id', 'quotations.user_id')
            ->join('empresas', 'empresas.id', 'quotations.company_id')
            ->select(
                'quotations.*',
                'quotations.id AS id',
                'empresas.nombre AS empresa',
                DB::raw("IF(quotations.state = 0,'En Gestión',IF(quotations.state = 1,'Aprobada','Rechazada')) AS estado"),
                DB::raw('DATE_FORMAT(quotations.created_at, "%d-%m-%Y %H:%i:%s") AS fecha'),
                'users.name AS usuario'
            );
        if (!Auth::user()->hasRole('root')) {
            $empresas_user = EmpresaUser::where('user_id', Auth::user()->id)->pluck('empresa_id');
            $consulta = $consulta->whereIn('company_id', $empresas_user);
        }

        // Valores para datatable
        $totalData = $consulta->count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = $consulta->offset($start)->limit($limit)->orderBy('id', 'desc')->get();
            $totalFiltered = $totalData;
        } else {
            $search = $request->input('search.value');
            if (Auth::user()->hasRole('root')) {
                $inp_search = strtolower($search);
                $busqueda = '';
                if (stristr('En Gestión', $inp_search)) {
                    $busqueda = 0;
                } else if (stristr('Aprobada', $inp_search)) {
                    $busqueda = 1;
                } else if (stristr('Rechazada', $inp_search)) {
                    $busqueda = 2;
                }
                $clausulas = $consulta->where('quotations.id', 'like', "%{$search}%");
                $clausulas = $consulta->orWhere('empresas.nombre', 'like', "%{$search}%");
                $clausulas = $consulta->orWhere('quotations.state', $busqueda);
                $clausulas = $consulta->orWhere(DB::raw('DATE_FORMAT(quotations.created_at, "%d-%m-%Y %H:%i:%s")'), 'like', "%{$search}%");
                $clausulas = $consulta->orWhere('users.name', 'like', "%{$search}%");
            } else {

                $inp_search = strtolower($search);
                $busqueda = '';
                if (stristr('En Gestión', $inp_search)) {
                    $busqueda = 0;
                } else if (stristr('Aprobada', $inp_search)) {
                    $busqueda = 1;
                } else if (stristr('Rechazada', $inp_search)) {
                    $busqueda = 2;
                }
                $clausulas = $consulta->where('quotations.id', 'like', "%{$search}%")
                    ->whereIn('company_id', $empresas_user);
                $clausulas = $consulta->orWhere('empresas.nombre', 'like', "%{$search}%")
                    ->whereIn('company_id', $empresas_user);
                $clausulas = $consulta->orWhere('quotations.state', $busqueda)
                    ->whereIn('company_id', $empresas_user);
                $clausulas = $consulta->orWhere(DB::raw('DATE_FORMAT(quotations.created_at, "%d-%m-%Y %H:%i:%s")'), 'like', "%{$search}%")
                    ->whereIn('company_id', $empresas_user);
                $clausulas = $consulta->orWhere('users.name', 'like', "%{$search}%")
                    ->whereIn('company_id', $empresas_user);
            }

            $totalFiltered = $totalData;
            $posts = $clausulas->offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }

        $data = array();
        if ($posts) {
            foreach ($posts as $r) {
                $nestedData['id'] = $r->id;
                $nestedData['crypt_id'] = Crypt::encryptString($r->id);
                $nestedData['empresa'] = $r->empresa;
                $nestedData['estado'] = '<div class="badge bg-' . ($r->estado == 'En Gestión' ? 'warning' : ($r->estado == 'Aprobada' ? 'success' : 'danger')) . ' rounded-pill text-light p-2"><span>' . $r->estado . '</span></div>';
                $nestedData['fecha'] = date('d-m-Y H:i:s', strtotime($r->fecha));
                $nestedData['usuario'] = $r->usuario;
                $nestedData['permisoAprobar'] = (Auth::user()->hasRole('subgerencia') || Auth::user()->hasRole('gerencia')) && ($r->estado == 'En Gestión');
                $nestedData['permisoPago'] = (Auth::user()->can('registrar_pago_orden_compra') || Auth::user()->hasRole('root')) && ($r->estado == 'Aprobada');
                $nestedData['proveedores'] = QuotationProvider::with('rel_proveedor1:id,name', 'rel_proveedor2:id,name', 'rel_proveedor3:id,name')->where('quotation_id', $r->id)->get();
                $nestedData['action'] = $r;
                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );
        return json_encode($json_data);
    }

    public function create()
    {
        if (Auth::user()->hasRole('root')) {
            $empresas = Empresa::all()->pluck('nombre', 'id');
            $proveedores = Provider::where('state', 1)->pluck('name', 'id');
        } else {
            $empresas_user = EmpresaUser::where('user_id', Auth::user()->id)->pluck('empresa_id');
            $empresas = Empresa::whereIn('id', $empresas_user)->pluck('nombre', 'id');
            $proveedores = Provider::where('state', 1)->whereIn('company_id', $empresas_user)->pluck('name', 'id');
        }
        $condiciones = PaymentCondition::all()->pluck('name', 'id');

        return view('quotations.create', compact('empresas', 'proveedores', 'condiciones'));
    }

    public function store(Request $request)
    {

        $cot = new Quotation;
        $cot->user_id = Auth::user()->id;
        $cot->company_id = $request->company_id;
        $cot->save();

        // Guardar info de la tabla
        if ($request->jsonTable) {
            foreach (json_decode($request->jsonTable) as $val) {

                $proveedor1 = Provider::where('name', $val->proveedor1)->first();
                $cond1 = PaymentCondition::where('name', $val->condicion_pago1)->first();

                $proveedor2 = Provider::where('name', $val->proveedor2)->first();
                $cond2 = PaymentCondition::where('name', $val->condicion_pago2)->first();

                $proveedor3 = Provider::where('name', $val->proveedor3)->first();
                $cond3 = PaymentCondition::where('name', $val->condicion_pago3)->first();

                QuotationProvider::updateOrCreate(
                    [
                        'product' => $val->producto,
                        'quantity' => $val->cantidad,
                        'quotation_id' => $cot->id,
                        'provider_id_1' => $proveedor1 ? $proveedor1->id : null,
                        'cost_1' => $val->costo1 != '' ? str_replace(',', '', str_replace('$', '', $val->costo1)) : null,
                        'payment_condition_id_1' => $cond1 ? $cond1->id : null,
                        'provider_id_2' => $proveedor2 ? $proveedor2->id : null,
                        'cost_2' => $val->costo2 != '' ? str_replace(',', '', str_replace('$', '', $val->costo2)) : null,
                        'payment_condition_id_2' => $cond2 ? $cond2->id : null,
                        'provider_id_3' => $proveedor3 ? $proveedor3->id : null,
                        'cost_3' => $val->costo3 != '' ? str_replace(',', '', str_replace('$', '', $val->costo3)) : null,
                        'payment_condition_id_3' => $cond3 ? $cond3->id : null,
                    ]
                );
            }
        }

        return response()->json(['status' => '200', 'msg' => 'Rergistro almacenado correctamente', 'success']);
    }

    // mostrar PDF
    public function show($id)
    {
        $id = Crypt::decryptString($id);

        $cotizacion = Quotation::with([
            'rel_usuario:id,name,signature,cargo',
            'rel_empresa:id,nombre',
            'rel_proveedor:id,name',
            'rel_detalle',
            'rel_detalle.rel_proveedor1:id,name',
            'rel_detalle.rel_proveedor2:id,name',
            'rel_detalle.rel_proveedor3:id,name',
            'rel_detalle.rel_tipo_pago1:id,name',
            'rel_detalle.rel_tipo_pago2:id,name',
            'rel_detalle.rel_tipo_pago3:id,name',
        ])->find($id);
        $pdf = PDF::loadView('quotations.show', compact('cotizacion'))->setPaper("A4", "landscape");
        return $pdf->stream('Cotizacion_' . date('d-m-Y_His') . '.pdf');
    }

    // mostrar PDF de la orden de compra
    public function OrdenCompra($id)
    {
        $id = Crypt::decryptString($id);

        $cotizacion = Quotation::with([
            'rel_usuario:id,name,cargo',
            'rel_aprobado_por:id,name,signature,cargo',
            'rel_empresa:id,nombre',
            'rel_proveedor:id,name,contact_name,address,telephone,email',
            'rel_detalle',
            'rel_detalle.rel_proveedor1:id,name',
            'rel_detalle.rel_proveedor2:id,name',
            'rel_detalle.rel_proveedor3:id,name',
            'rel_detalle.rel_tipo_pago1:id,name',
            'rel_detalle.rel_tipo_pago2:id,name',
            'rel_detalle.rel_tipo_pago3:id,name',
        ])->find($id);
        $pdf = PDF::loadView('quotations.ordencompra', compact('cotizacion'));
        return $pdf->stream('Orden_de_Compra_' . $cotizacion->purchase_order . '.pdf');
    }

    public function aprobarCotizacion(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $id = Crypt::decryptString($id);
            $cotizacion = Quotation::find($id);

            if ((Auth::user()->hasRole('subgerencia') || Auth::user()->hasRole('gerencia')) && $request->tipo == 'aprobar') {

                switch (strlen($id)) {
                    case 1:$cero = "00000";
                        break;
                    case 2:$cero = "0000";
                        break;
                    case 3:$cero = "000";
                        break;
                    case 4:$cero = "00";
                        break;
                    case 5:$cero = "0";
                        break;
                }
                $cotizacion->update([
                    'state' => 1,
                    'approved_by' => Auth::user()->id,
                    'provider_id' => $request->prov,
                    'purchase_order' => 'OC' . $cero . $id,
                ]);

            } else if ((Auth::user()->hasRole('subgerencia') || Auth::user()->hasRole('gerencia')) && $request->tipo == 'rechazar') {
                $cotizacion->update(['state' => 2, 'user_id' => Auth::user()->id]);
            } else {
                return response()->json(['status' => '403', 'msg' => 'No tiene permisos para realizar ésta acción', 'icon' => 'error']);
            }
            DB::commit();
            if ((Auth::user()->hasRole('subgerencia') || Auth::user()->hasRole('gerencia')) && $request->tipo == 'aprobar') {

                $path = public_path('Adjuntos/Ordenes de Compra');
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $cotizacion = Quotation::with([
                    'rel_usuario:id,name,cargo',
                    'rel_aprobado_por:id,name,signature,cargo',
                    'rel_empresa:id,nombre',
                    'rel_proveedor:id,name,contact_name,address,telephone,email',
                    'rel_detalle',
                    'rel_detalle.rel_proveedor1:id,name',
                    'rel_detalle.rel_proveedor2:id,name',
                    'rel_detalle.rel_proveedor3:id,name',
                    'rel_detalle.rel_tipo_pago1:id,name',
                    'rel_detalle.rel_tipo_pago2:id,name',
                    'rel_detalle.rel_tipo_pago3:id,name',
                ])->find($id);
                $purchase_order = $cotizacion->purchase_order;
                $view =  \View::make('quotations.ordencompra',compact('cotizacion'))->render();
                $pdf = \App::make('dompdf.wrapper')->loadHTML($view)->setPaper("letter");
                $file = $pdf->output();
                $nombre = $purchase_order.".pdf";
                $nombrePDF = 'Adjuntos\\Ordenes de Compra\\'.$nombre;
                file_put_contents($nombrePDF, $file);

                $email = $cotizacion?->rel_proveedor?->email;
               $envio = Mail::send('emails.ordenConpraEnvio',['purchase_order' => $purchase_order, 'email' => $email, 'nombrePDF' => $nombrePDF], function($message) use ($purchase_order, $email,$nombrePDF){
                    $message->from('notificaciones@correo.com','Alejandro Ltda');
                    $message->to($email);
                    $message->subject('Orden de compra N° '.$purchase_order);
                    $message->attach(public_path($nombrePDF));
                    });
                    unlink(public_path($nombrePDF));

                if($envio){
                    return response()->json(['status' => '200', 'msg' => 'Estado actualizado exitosamente', 'icon' => 'success']);
                }
            }
            return response()->json(['status' => '200', 'msg' => 'Estado actualizado exitosamente', 'icon' => 'success']);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json($th->getMessage());
        }
    }

    public function registrarPago(Request $request){
        DB::beginTransaction();
        try {
            $id = Crypt::decryptString($request->id);
            $cotizacion = Quotation::find($id);
            $nombre = null;
            ini_set('post_max_size', 100);
            $file = $request->file('archivo');
            if (!empty($file)) {
                $fecha = date('d_m_Y_H.i.s');
                $path = public_path('Adjuntos/Pagos');
                if (!file_exists($path))
                    mkdir($path, 0777, true);
                $extension = $file->getClientOriginalExtension();
                $nombre = $fecha . '_' . $cotizacion->purchase_order . '.' . $extension;
                $file->move($path, $nombre);

                if (!empty($cotizacion->attachments)){
                    unlink(public_path('Adjuntos/Pagos/' . $cotizacion->attachments));
                }
            }else{
                if (!empty($cotizacion->attachments)){
                    $nombre = $cotizacion->attachments;
                }
            }

            $request['payment_date'] = date('Y-m-d',strtotime($request->payment_date));
            $request['id'] = $id;
            $request['user_id'] = Auth::user()->id;
            $request['attachments'] = $nombre;

            // actualizar el cliente tal como viene en el request excepto archivo
            $cotizacion->fill($request->except('archivo'))->save();
            DB::commit();
            return response()->json([
                'status' => '200',
                'title' => 'Pago Registrado',
                'message' => 'Pago Registrado exitosamente',
                'icon' => 'success',
            ], 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'status' => '500',
                'title' => 'Error',
                'message' => $th->getMessage(),
                'icon' => 'error',
            ], 500);
        }
    }
}
