<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Payroll;
use Illuminate\Http\Request;
use App\Models\EmployeContract;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Exports\CertificatesExport;
use App\Imports\CertificatesImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Crypt;

class CertificatesController extends Controller{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role_or_permission:root|mostrar_certificados', ['only' => ['index']]);
    }

    public function index(){
        return view('certificates.index');
    }

    public function descCertLab($id)
    {
        if(Auth::user()->hasRole('root') || Auth::user()->can('mostrar_certificados'))
            $contrato = EmployeContract::with('rel_empleado:id,user_rel_id')->where('id', $id)->first();
        else
            $contrato = EmployeContract::with('rel_empleado:id,user_rel_id')->where('id', $id)->whereRelation('rel_empleado','employees.user_rel_id',Auth::user()->id)->first();

        if (empty($contrato))
            return response()->json(['status' => 0]);
        else
        return response()->json(['status' => 1,'contrato' => Crypt::encryptstring($id)]);
    }

    public function descDespNom($id)
    {
        $id = Crypt::decryptstring($id);
        $desprendible = Payroll::find($id);

        if (empty($desprendible))
            return response()->json(['status' => 0]);
        else
        return response()->json(['status' => 1,'desprendible' => Crypt::encryptstring($id)]);
    }

    // mostrar certificado en PDF 
    public function show($id){
        $id = Crypt::decryptString($id);
        $firmaDirRrhh = User::whereHas('roles', function ($q) {
            $q->where('name', 'director_rrhh');
        })->where('estado', 1)->first();
        
        $contrato = EmployeContract::with([
            'rel_empleado:id,user_rel_id,name,surname,identification,state,gender',
            'rel_tipo_contrato:id,name'
        ])->find($id);
        $pdf = PDF::loadView('certificates.show',compact('contrato','firmaDirRrhh'));
        return $pdf->stream('Certificado Laboral '.$contrato?->rel_empleado?->identification.'.pdf');
    }

    // descargar plantilla para cargue masivo de nomina
    public function plantillaMasivo(){
        $fechaActual = date("d-m-Y G.i.s");
    return Excel::download(new CertificatesExport(), 'PlantillaCargueMasivoNomina_'.$fechaActual.'.xlsx');
    }

    public function cargarNomina(Request $request){
        DB::beginTransaction();
        try {
            $file = $request->file('csv');
            $import =  new CertificatesImport($request);
            $import->import($file);
            if ($import->failures()->isNotEmpty()) {
                DB::rollback();
                return response()->json([
                    'code' => 422,
                    'message' => $import->failures()
                ]);
            }
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'Registros cargados: ' . $import->cantidadExitosos . '<br>' . ' Previamente cargados en el sistema: ' . $import->cantidadNoExitosos . '  ' 
            ]);
            } catch (\Throwable $th) {
                DB::rollback();
                return response()->json($th->getMessage());
            }
    }

    public function consultarDesprendibles($id, Request $request){
        try{
            $id = Crypt::decryptstring($id);
        } catch (\Throwable $th) {
            $id = $id;
        }
        $mesAnio = [1,2023];
        $desprendibles = Payroll::where('identification',$id);
        
        if(!empty($request->mesAnio)){
            $mesAnio = explode('-',$request->mesAnio);
            $desprendibles = $desprendibles->where('month',mesAnumero($mesAnio[0]))->where('year',intval($mesAnio[1]));    
        }

        $desprendibles = $desprendibles->get();
        
        if(!empty($desprendibles)){
            $arrdatos = [];
            foreach ($desprendibles as $val) {
                $data = [
                    'id' => Crypt::encryptstring($val->id),
                    'month' => $val->month,
                    'year' => $val->year
                ];
                array_push($arrdatos,$data);
            }
            return response()->json([
                'code' => 200,
                'desprendibles' => $arrdatos
            ]);
        }else{
            return response()->json([
                'code' => 422,
                'message' => 'Sin resultados con los criterios de búsqueda ingresados'
            ]);
        }
    }

    // Descargar desprendible de pago de nómina
    public function payroll($id){
        try{
            $id = Crypt::decryptstring($id);
        } catch (\Throwable $th) {
            $id = $id;
        }
        $desprendible = Payroll::with(
            'rel_empleado:id,identification,name,surname',
            'rel_empleado.rel_ult_contrato:id,employe_id,position'
            )->find($id);

        $pdf = PDF::loadView('certificates.payroll',compact('desprendible'))->setPaper("A4","landscape");
        return $pdf->stream($desprendible->identification.'_'.numeroAmes($desprendible->month).'_'.$desprendible->year.'.pdf');
    }
}