<?php

namespace App\Exports;

use App\Models\EmpresaUser;
use App\Models\TerminationStaff;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TerminationStaffExport implements FromCollection, WithHeadings, WithMapping, WithTitle, ShouldAutoSize, WithStyles, WithEvents
{
  public $datos;
  public function __construct($datos)
  {
    $this->datos = $datos;
  }

  // REGISTRO DE EVENTO PARA LA HOJA DE CALCULO

  public function registerEvents(): array
  {
    return [
      AfterSheet::class => function (AfterSheet $event) {
        $event->sheet->getDelegate()->setAutoFilter('A1:' . $event->sheet->getDelegate()->getHighestColumn() . '1');
      }
    ];
  }

  // ESTILIZADO DE LA HOJA DE CALCULO

  public function styles(Worksheet $sheet){
    //Autoajustar columnas
    foreach ($sheet->getColumnIterator() as $column) {
      $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
      $event->sheet->getStyle('A1:' . $event->sheet->getDelegate()->getHighestColumn() . '1')->getAlignment()->setHorizontal('center')->setVertical('center');
        $event->sheet->getDelegate()
        //autofiltro
        ->setAutoFilter('A1:' . $event->sheet->getDelegate()->getHighestColumn() . '1')
        // definir alto de fila
        ->getRowDimension('1')->setRowHeight(40);
        // Color Rojo al fondo de los encabezados
        $event->sheet->getDelegate()->getStyle('A1:L1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFE6E3');
        // Situarse en la celda A1 (esta instrucción debe ir al final de los eventos "$event->sheet->getDelegate" para que funcione)
        $event->sheet->getDelegate()->getStyle('A1');
    }

    $ultFila = $sheet->getHighestColumn() . $sheet->getHighestRow();
    $rango = 'A1:' . $ultFila;
    return [
      // Style the first row as bold text.
      1    => [
        'font' => ['bold' => true],
      ],

      $rango => [
        'borders' => [
          'allBorders' => [
            'borderStyle' => 'thin',
            'color' => ['rgb' => '808080'],
          ],
        ],
      ],
    ];
  }

  public function headings(): array
  {
    return [
      'id',
      'Empleado',
      'Cliente',
      'Empresa',
      'Fecha de Retiro',
      'Tipo de Retiro',
      'Adjunto',
      'Observación',
      'Estado Actual',
      'Usuario',
      'Fecha de Creación',
      'Fecha de Actualización'

    ];
  }

  public function map($row): array
  {
    return [
      $row->id,
      $row->empleado,
      $row->cliente?$row->cliente:'',
      $row->empresa,
      $row->retirement_date,
      $row->tipo_retiro,
      $row->attached?$row->attached:'',
      $row->description?$row->description:'',
      $row->estado,
      $row->usuario,
      date('d-m-Y h:m:s a',strtotime($row->created_at)),
      date('d-m-Y h:m:s a',strtotime($row->updated_at))
    ];
  }

  public function title(): string
  {
    return 'Desvinculación de Personal';
  }

  public function collection()
  {
     $request = $this->datos;
     $consulta = DB::table('termination_staff')
     ->join('employees', 'employees.id', 'termination_staff.employe_id')
     ->join('users', 'users.id', 'termination_staff.user_id')
     ->join('state_terminations', 'state_terminations.id', 'termination_staff.state_id')
     ->leftjoin('customers', 'customers.id', 'termination_staff.customer_id')
     ->join('empresas', 'empresas.id', 'termination_staff.company_id')
     ->join('retirement_types', 'retirement_types.id', 'termination_staff.retirement_type_id')
     ->select(
         'termination_staff.*',
         'termination_staff.id AS id',
         'termination_staff.state_id AS state_id',
         'employees.name AS empleado',
         'employees.user_rel_id AS usuario',
         'customers.name AS cliente',
         'empresas.nombre AS empresa',
         'users.name AS usuario',
         'retirement_types.name AS tipo_retiro',
         'state_terminations.name AS estado' ,
         'termination_staff.created_at AS created_at',
         'termination_staff.updated_at AS updated_at',
         DB::raw('DATE_FORMAT(termination_staff.retirement_date, "%d-%m-%Y") AS retirement_date')
     );
     if (!Auth::user()->hasRole('root')) {
      $empresas_user = EmpresaUser::where('user_id', Auth::user()->id)->pluck('empresa_id');
      $consulta = $consulta->whereIn('termination_staff.company_id', $empresas_user);
    }
    $fechaI = date('Y-m-d',strtotime($request->fecha_inicio_reporte)).' 00:00:00';
    $fechaF = date('Y-m-d',strtotime($request->fecha_fin_reporte)).' 23:59:59';
    $consulta = $consulta->whereBetween('termination_staff.created_at', [$fechaI, $fechaF])->get();
     return $consulta;
  }
}
