<?php

namespace App\Imports;

use DB;
use App\Models\Employe;
use App\Models\Empresa;
use App\Models\Payroll;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class CertificatesImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation, SkipsOnFailure, WithBatchInserts, WithChunkReading
{
    use Importable, SkipsErrors, SkipsFailures;

    public $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public $cantidadExitosos = 0;
    public $cantidadNoExitosos = 0;
    public $mes = '';

    #---------------------
    public function model(array $row)
    {
        if(!empty($row['cedula'])){
            $r = Payroll::where([
                ['identification', $row['cedula']],
                ['month', $row['mes']],
                ['year', $row['anio']],
                ['company_id', $row['empresa']],
                ])->first();

            if (empty($r)) {
                $r = new Payroll;
                $r->identification = $row['cedula'];
                $r->basic_salary = $row['basico'];
                $r->worked_days = $row['dias_trabajados'];
                $r->days_disability = $row['dias_incapacidad'];
                $r->salary = $row['sueldo'];
                $r->transport_assistance = $row['aux_trans'];
                $r->commissions = $row['comisiones'];
                $r->bonus = $row['bono'];
                $r->discounts = $row['descuentos'];
                $r->course = $row['diploma_curso'];
                $r->health = $row['salud'];
                $r->pension = $row['pension'];
                $r->inhability = $row['incapacidad'];
                $r->total_accrued = $row['total_devengado'];
                $r->total_discounts = $row['total_descuentos'];
                $r->amount_be_pay = $row['valor_pagar'];
                $r->month = $row['mes'];
                $r->year = $row['anio'];
                $r->company_id = $row['empresa'];
                $r->user_id = Auth::user()->id;
                $r->save();

                $this->cantidadExitosos++;
            }else{
                $this->cantidadNoExitosos++;
            }
        }
    }

    # ---------------------------------------------------------

    public function rules(): array
    {
        return [
            'cedula' => [
                function ($attribute, $value, $onFailure) {
                    if (empty($value)) {
                        $onFailure('El campo CEDULA es obligatorio.');
                    } else {
                        $empleado = Employe::where('identification', $value)->first();
                        if (empty($empleado)) {
                            $onFailure('El empleado con cédula <strong>' . $value . '</strong> no se encuentra registrado en el sistema');
                        }
                    }
                },
            ],
            'basico' => [
                function ($attribute, $value, $onFailure) {
                    if ($value !== 0 && empty($value)) {
                        $onFailure('El campo BASICO es obligatorio');
                    }else if (!is_numeric(str_replace('.','',$value))){
                        $onFailure('El valor <strong>' . $value . '</strong> no es admitido');
                    }
                },
            ],
            'dias_trabajados' => [
                function ($attribute, $value, $onFailure) {
                    if ($value !== 0 && empty($value)) {
                        $onFailure('El campo DÍAS TRABAJADOS es obligatorio');
                    }else if (!is_numeric(str_replace('.','',$value))){
                        $onFailure('El valor <strong>' . $value . '</strong> no es admitido');
                    }
                }
            ],
            'dias_incapacidad' => [
                function ($attribute, $value, $onFailure) {
                    if ($value !== 0 && empty($value)) {
                        $onFailure('El campo DÍAS DE INCAPACIDAD es obligatorio');
                    }else if (!is_numeric(str_replace('.','',$value))){
                        $onFailure('El valor <strong>' . $value . '</strong> no es admitido');
                    }
                }
            ],
            'sueldo' => [
                function ($attribute, $value, $onFailure) {
                    if ($value !== 0 && empty($value)) {
                        $onFailure('El campo SUELDO es obligatorio');
                    }else if (!is_numeric(str_replace('.','',$value))){
                        $onFailure('El valor <strong>' . $value . '</strong> no es admitido');
                    }
                }
            ],
            'aux_trans' => [
                function ($attribute, $value, $onFailure) {
                    if ($value !== 0 && empty($value)) {
                        $onFailure('El campo AUXILIO DE TRANSPORTE es obligatorio');
                    }else if (!is_numeric(str_replace('.','',$value))){
                        $onFailure('El valor <strong>' . $value . '</strong> no es admitido');
                    }
                }
            ],
            'comisiones' => [
                function ($attribute, $value, $onFailure) {
                    if ($value !== 0 && empty($value)) {
                        $onFailure('El campo COMISIONES es obligatorio');
                    }else if (!is_numeric(str_replace('.','',$value))){
                        $onFailure('El valor <strong>' . $value . '</strong> no es admitido');
                    }
                }
            ],
            'bono' => [
                function ($attribute, $value, $onFailure) {
                    if ($value !== 0 && empty($value)) {
                        $onFailure('El campo BONO es obligatorio');
                    }else if (!is_numeric(str_replace('.','',$value))){
                        $onFailure('El valor <strong>' . $value . '</strong> no es admitido');
                    }
                }
            ],
            'descuentos' => [
                function ($attribute, $value, $onFailure) {
                    if ($value !== 0 && empty($value)) {
                        $onFailure('El campo DESCUENTOS es obligatorio');
                    }else if (!is_numeric(str_replace('.','',$value))){
                        $onFailure('El valor <strong>' . $value . '</strong> no es admitido');
                    }
                }
            ],
            'diploma_curso' => [
                function ($attribute, $value, $onFailure) {
                    if ($value !== 0 && empty($value)) {
                        $onFailure('El campo DIPLOMA / CURSO es obligatorio');
                    }else if (!is_numeric(str_replace('.','',$value))){
                        $onFailure('El valor <strong>' . $value . '</strong> no es admitido');
                    }
                }
            ],
            'pension' => [
                function ($attribute, $value, $onFailure) {
                    if ($value !== 0 && empty($value)) {
                        $onFailure('El campo PENSIÓN es obligatorio');
                    }else if (!is_numeric(str_replace('.','',$value))){
                        $onFailure('El valor <strong>' . $value . '</strong> no es admitido');
                    }
                }
            ],
            'salud' => [
                function ($attribute, $value, $onFailure) {
                    if ($value !== 0 && empty($value)) {
                        $onFailure('El campo SALUD es obligatorio');
                    }else if (!is_numeric(str_replace('.','',$value))){
                        $onFailure('El valor <strong>' . $value . '</strong> no es admitido');
                    }
                }
            ],
            'incapacidad' => [
                function ($attribute, $value, $onFailure) {
                    if ($value !== 0 && empty($value)) {
                        $onFailure('El campo INCAPACIDAD es obligatorio');
                    }else if (!is_numeric(str_replace('.','',$value))){
                        $onFailure('El valor <strong>' . $value . '</strong> no es admitido');
                    }
                }
            ],
            'total_devengado' => [
                function ($attribute, $value, $onFailure) {
                    if ($value !== 0 && empty($value)) {
                        $onFailure('El campo TOTAL DEVENGADO es obligatorio');
                    }else if (!is_numeric(str_replace('.','',$value))){
                        $onFailure('El valor <strong>' . $value . '</strong> no es admitido');
                    }
                }
            ],
            'total_descuentos' => [
                function ($attribute, $value, $onFailure) {
                    if ($value !== 0 && empty($value)) {
                        $onFailure('El campo TOTAL DESCUENTOS es obligatorio');
                    }else if (!is_numeric(str_replace('.','',$value))){
                        $onFailure('El valor <strong>' . $value . '</strong> no es admitido');
                    }
                }
            ],
            'valor_pagar' => [
                function ($attribute, $value, $onFailure) {
                    if ($value !== 0 && empty($value)) {
                        $onFailure('El campo VALOR A PAGAR es obligatorio');
                    }else if (!is_numeric(str_replace('.','',$value))){
                        $onFailure('El valor <strong>' . $value . '</strong> no es admitido');
                    }
                }
            ],
            'mes' => [
                function ($attribute, $value, $onFailure) {
                    if ($value !== 0 && empty($value)) {
                        $onFailure('El campo MES es obligatorio');
                    }else if (!is_numeric(str_replace('.','',$value))){
                        $onFailure('El valor <strong>' . $value . '</strong> no es admitido');
                    }else if($value < 1 || $value > 12){
                        $onFailure('El número <strong>' . $value . '</strong> no corresponde a un mes');
                    }
                    $this->mes = $value;
                }
            ],
            'anio' => [
                function ($attribute, $value, $onFailure) {
                    if ($value !== 0 && empty($value)) {
                        $onFailure('El campo año es obligatorio');
                    }else if (!is_numeric(str_replace('.','',$value))){
                        $onFailure('El valor <strong>' . $value . '</strong> no es admitido');
                    }else if($value < 2023 || $value > date('Y')){
                        $onFailure('El número <strong>' . $value . '</strong> no corresponde a un año válido');
                    }else if ($this->mes >= date('m') && $value == date('Y')){
                        $onFailure('El mes y/o el año no pueden ser posteriores al mes y año actual');
                    }
                }
            ],
            'empresa' => [
                function ($attribute, $value, $onFailure) {
                    if ($value !== 0 && empty($value)) {
                        $onFailure('El campo empresa es obligatorio');
                    }else if (!is_numeric(str_replace('.','',$value))){
                        $onFailure('El valor <strong>' . $value . '</strong> no es admitido');
                    } else {
                        $empresa = Empresa::find($value);
                        if (empty($empresa)) {
                            $onFailure('La empresa con id <strong>' . $value . '</strong> no se encuentra registrada en el sistema');
                        }
                    }
                }
            ]
        ];
    }

    public function customValidationMessages(): array
    {
        return [];
    }

    // limitar la cantidad de consultas de inserción, es decir cuántos registros se pueden guardar en la base datos a la vez
    public function batchSize(): int
    {
        return 1000;
    }

    // procesar el archivo dividiéndolo en partes más pequeñas para mejorar el impacto de uso de la memoria
    public function chunkSize(): int
    {
        return 50;
    }
    // empieza a leer desde la fila 2
    public function startRow(): int
    {
        return 2;
    }
}
