<?php

namespace App\Exports;

use App\Models\AreaUsers;
use App\Models\EmpresaUser;
use App\Models\NoveltiesRrhh;
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

class NoveltiesRrhhExport implements FromCollection, WithHeadings, WithMapping, WithTitle, ShouldAutoSize, WithStyles, WithEvents
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
        // alinear al centro
        $event->sheet->getStyle('A1:' . $event->sheet->getDelegate()->getHighestColumn() . '1')->getAlignment()->setHorizontal('center')->setVertical('center');
        $event->sheet->getDelegate()
        //autofiltro
        ->setAutoFilter('A1:' . $event->sheet->getDelegate()->getHighestColumn() . '1')
        // definir alto de fila
        ->getRowDimension('1')->setRowHeight(40);
        // Color Rojo al fondo de los encabezados
        $event->sheet->getDelegate()->getStyle('A1:O1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFE6E3');
        // Situarse en la celda A1 (esta instrucción debe ir al final de los eventos "$event->sheet->getDelegate" para que funcione)
        $event->sheet->getDelegate()->getStyle('A1');
      }
    ];
  }

  // ESTILIZADO DE LA HOJA DE CALCULO

  public function styles(Worksheet $sheet){
    //Autoajustar columnas
    foreach ($sheet->getColumnIterator() as $column) {
      $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
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
      'Cédula',
      'Empleado',
      'Cargo',
      'Empresa',
      'Cliente',
      'Tipo de Novedad',
      'Descripción',
      'Fecha de Posible Pago',
      'Estado',
      'Sanción',
      'Usuario',
      'Area',
      'Fecha de Creación',
      'Fecha de Actualización'
    ];
  }

  public function map($row): array
  {
    return [
      $row->id,
      $row->rel_empleado?->identification,
      $row->rel_empleado?->name.' '.$row?->rel_empleado?->surname,
      $row->rel_empleado?->rel_ult_contrato?->position,
      $row->rel_empresa?->nombre,
      $row->rel_cliente?->name,
      $row->rel_tipo_novedad?->name,
      $row->description,
      $row->payment_date?date('d-m-Y',strtotime($row->payment_date)):'',
      ($row->state == 0)?'Pago Pendiente':'Pago Recibido',
      $row->penalty??'',
      $row->rel_usuario?->name,
      $row->rel_area?->nombre,
      date('d-m-Y h:m:s a',strtotime($row->created_at)),
      date('d-m-Y h:m:s a',strtotime($row->updated_at))
    ];
  }

  public function title(): string
  {
    return 'Novedades RRHH';
  }

  public function collection()
  {
     $request = $this->datos;
     $fechaI = date('Y-m-d',strtotime($request->fecha_inicio_reporte)).' 00:00:00';
     $fechaF = date('Y-m-d',strtotime($request->fecha_fin_reporte)).' 23:59:59';
     $consulta = NoveltiesRrhh::with(
      'rel_empleado:id,name,surname,identification',
      'rel_empleado.rel_ult_contrato:id,employe_id,position',
      'rel_empresa:id,nombre',
      'rel_cliente:id,name',
      'rel_area:id,nombre',
      'rel_tipo_novedad:id,name',
      'rel_usuario:id,name'
    );
    if(!Auth::user()->hasRole('root') && !Auth::user()->hasRole('jefe_rrhh') && !Auth::user()->hasRole('director_rrhh') && !Auth::user()->hasRole('auxiliar_rrhh')  && !Auth::user()->hasRole('gerencia')  && !Auth::user()->hasRole('subgerencia')){
      $empresas_user = EmpresaUser::where('user_id',Auth::user()->id)->pluck('empresa_id');
      $areasUser = AreaUsers::where('user_id', Auth::user()->id)->pluck('area_id');
      $consulta = $consulta->whereIn('company_id',$empresas_user)->whereIn('novelties_rrhh.area_id',$areasUser);
  }
    $consulta = $consulta->whereBetween('novelties_rrhh.created_at', [$fechaI, $fechaF])->get();
     return $consulta;
  }
}
