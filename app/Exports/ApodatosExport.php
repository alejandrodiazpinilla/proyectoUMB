<?php

namespace App\Exports;

use App\Models\Employe;
use App\Models\Empresa;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ApodatosExport implements FromCollection, WithHeadings, WithMapping, WithTitle, ShouldAutoSize, WithStyles, WithEvents
{
  public $datos;
  public function __construct($datos)
  {
    $this->datos = $datos;
  }

  public function registerEvents(): array
  {
    return [
      AfterSheet::class => function(AfterSheet $event) {
        $event->sheet->getDelegate()->setAutoFilter('A1:' . $event->sheet->getDelegate()->getHighestColumn() . '1');
        // alinear al centro
        $event->sheet->getStyle('A1:' . $event->sheet->getDelegate()->getHighestColumn() . '1')->getAlignment()->setHorizontal('center')->setVertical('center');
        $event->sheet->getDelegate()
        //autofiltro
        ->setAutoFilter('A1:' . $event->sheet->getDelegate()->getHighestColumn() . '1')
        // definir alto de fila
        ->getRowDimension('1')->setRowHeight(40);
        // Color Rojo al fondo de los encabezados
        $event->sheet->getDelegate()->getStyle('A1:X1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFE6E3');
        // Situarse en la celda A1 (esta instrucción debe ir al final de los eventos "$event->sheet->getDelegate" para que funcione)
        $event->sheet->getDelegate()->getStyle('A1');
    }
    ];
  }


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

  public function title(): string
  {
    return 'Apodatos';
  }

  public function headings(): array
  {
    return [
      'Nit',
      'RazonSocial',
      'TipoDocumento',
      'NoDocumento',
      'Nombre1',
      'Nombre2',
      'Apellido1',
      'Apellido2',
      'FechaNacimiento',
      'Genero',
      'Cargo',
      'Fechavinculacion',
      'CodigoCurso',
      'NitEscuela',
      'Nro',
      'TipoEstablecimiento',
      'TelefonoR',
      'DireccionR',
      'DireccionP',
      'Departamento',
      'Ciudad',
      'EducacionBM',
      'EducacionS',
      'Discapacidad'
    ];
  }

  public function map($row): array
  {
    return [
      $row['nit'],
      $row['razonSocial'],
      $row['tipoDocumento'],
      $row['noDocumento'],
      $row['nombre1'],
      $row['nombre2'],
      $row['apellido1'],
      $row['apellido2'],
      $row['fechaNacimiento'],
      $row['genero'],
      $row['cargo'],
      $row['fechavinculacion'],
      $row['codigoCurso'],
      $row['nitEscuela'],
      $row['nro'],
      $row['tipoEstablecimiento'],
      $row['telefonoR'],
      $row['direccionR'],
      $row['direccionP'],
      $row['departamento'],
      $row['ciudad'],
      $row['educacionBM'],
      $row['educacionS'],
      $row['discapacidad']
    ];
  }

  public function collection()
  {
     $request = $this->datos;
    $infoTablaExp = json_decode($request->jsonTable);
    $consulta = [];
    foreach ($infoTablaExp as $value) {
      $empleado = Employe::with('rel_contratos:id,employe_id,position,start_date')->where('identification', $value->cedula)->first();
      $nombres = explode(' ',$empleado->name);
      $apellidos = explode(' ',$empleado->surname);
      $arr = [
        'nit' => 9006968268,
        'razonSocial' => 'Alejandro Ltda',
        'tipoDocumento' => '1',
        'noDocumento' => $value->cedula,
        'nombre1' => $nombres[0]??'',
        'nombre2' => $nombres[1]?substr($empleado->name,strlen($nombres[0])+1,50):'',
        'apellido1' => $apellidos[0]??'',
        'apellido2' => !empty($apellidos[1])?substr($empleado->surname,strlen($apellidos[0])+1,50):'',
        'fechaNacimiento' => date('d-m-Y',strtotime($empleado->date_of_birth)),
        'genero' => $empleado->gender == 'Masculino'?1:2,
        'cargo' => (str_contains(strtolower($empleado?->rel_contratos[0]?->position), 'guarda'))?1:4,
        'fechavinculacion' => date('d-m-Y',strtotime($empleado?->rel_contratos[0]?->start_date)),
        'codigoCurso' => $value->cod_curso,
        'nitEscuela' => $value->nit,
        'nro' => $value->nro,
        'tipoEstablecimiento' => 'Principal',
        'telefonoR' => $value->tel_academia,
        'direccionR' => $value->dir_academia,
        'direccionP' => Empresa::get()->first()->direccion,
        'departamento' => 'Bogotá DC',
        'ciudad' => 'Bogotá DC',
        'educacionBM' => '11',
        'educacionS' => 'Ninguna',
        'discapacidad' => 'Ninguna'
      ];
      array_push($consulta,$arr);
    }
     return collect($consulta);
  }
}
