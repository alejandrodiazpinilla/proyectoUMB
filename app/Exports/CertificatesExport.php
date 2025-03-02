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
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CertificatesExport implements WithHeadings, WithTitle, ShouldAutoSize, WithStyles, WithEvents
{

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
        $event->sheet->getDelegate()->getStyle('A1:D1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFEE2'); //AMARILLO
        $event->sheet->getDelegate()->getStyle('E1:H1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('E2FFE6'); // VERDE
        $event->sheet->getDelegate()->getStyle('I1:L1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFE2E2'); // ROJO
        $event->sheet->getDelegate()->getStyle('M1:S1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFEE2'); //AMARILLO
        // Agregar comentarios de celda
        $event->sheet->getComment('Q1')->getText()->createTextRun('Meses del año en número del 1 al 12');
        $event->sheet->getComment('R1')->getText()->createTextRun('Año 2023 en adelante');
        $event->sheet->getComment('S1')->getText()->createTextRun('Se deja por defecto 1');
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
      'CEDULA',
      'BASICO',
      'DIAS_TRABAJADOS',
      'DIAS_INCAPACIDAD',
      'SUELDO',
      'AUX_TRANS',
      'COMISIONES',
      'BONO',
      'DESCUENTOS',
      'DIPLOMA_CURSO',
      'PENSION',
      'SALUD',
      'INCAPACIDAD',
      'TOTAL_DEVENGADO',
      'TOTAL_DESCUENTOS',
      'VALOR_PAGAR',
      'MES',
      'ANIO',
      'EMPRESA',
    ];
  }

  public function title(): string
  {
    return 'Nómina';
  }

}
