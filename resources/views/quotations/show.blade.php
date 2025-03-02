<!DOCTYPE html>
<html lang="es">

<head>
  <title>Cotización | {{ $cotizacion->id }}</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <style>
    @page {
      /* Arriba | Derecha | Abajo | Izquierda */
      margin: 0px 0px 0px 0px !important;
    }

    * {
      box-sizing: border-box;
    }

    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    /* Style the header */
    header {
      background-color: #f6f6f6;
      padding: 10px;
      margin: 0px -10px 0px 0px;
      text-align: left;
      color: #cccccc;
      font-size: 12px;
    }

    /* Style the footer */
    footer {
      background-color: #f6f6f6;
      padding: 9px;
      text-align: left;
      color: #cccccc;
      font-size: 12px;
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
    }

    .center {
      text-align: center;
    }

    .b-1 {
      border: 1px solid;
    }

    .quotation-table {
      width: 100%;
      border-collapse: collapse;
      padding: 0px 20px 0px 20px;
    }

    .quotation-table td {
      padding: 8px;
      border: 1px solid black;
    }

    .quotation-table th {
      background-color: rgb(100, 100, 100);
      color: white;
      font-size: 13px;
      border-color: #ffffff 1px solid;

    }

    .quotation-table tbody tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .bg-white {
      background-color: #ffffff !important;
    }

    .border-left {
      border-left: 1px solid #ffffff !important;
    }

    .border-right {
      border-right: 1px solid #ffffff !important;
    }

    .border-top {
      border-top: 1px solid #ffffff !important;
    }

    .firma {
      width: 200px;
      margin-top: 10px;
    }

    .sin-borde {
      border-left: 0ch !important;
      border-bottom: 0ch !important;
      border-right: 0ch !important;
    }

    .bg-withe {
      background-color: #ffffff !important;
    }
  </style>
</head>

<body>
  <header>Alejandro Ltda</header>
  <br>
  <table width="97%" class="b-1" style="border-collapse: collapse;margin-left:11px">
    <tbody>
      <tr>
        <td width="19%" class="center b-1"><img src="{{ asset('img/logo.png') }}" style="display:block" width="85"></td>
        <td width="59%" class="center b-1">
          <h3>COTIZACIÓN {{ $cotizacion->id }}</h3>
        </td>
        <td width="19%" class="b-1" style="text-align:right;">
          <table width="100%">
            <tbody>
              <tr>
                <td class="center">SV-F- 199</td>
              </tr>
              <hr>
              <tr>
                <td class="center">REV 0 – JUN/21</td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
  <br>
  <section>
    <p align="justify">
    <table class="quotation-table">
      <thead>
        <tr>
          <th colspan="1" class="bg-white"></th>
          <th colspan="1" class="bg-white"></th>
          @if($cotizacion?->rel_detalle[0]?->rel_proveedor1)
          <th colspan="2" style="border-top-left-radius: 10px !important;">{{
            $cotizacion?->rel_detalle[0]?->rel_proveedor1?->name }}</th>
          @endif

          @if($cotizacion?->rel_detalle[0]?->rel_proveedor2)
          <th colspan="2">{{ $cotizacion?->rel_detalle[0]?->rel_proveedor2?->name }}</th>
          @endif

          @if($cotizacion?->rel_detalle[0]?->rel_proveedor3)
          <th colspan="2" style="border-top-right-radius: 10px !important;">{{
            $cotizacion?->rel_detalle[0]?->rel_proveedor3?->name }}</th>
          @endif
        </tr>
        <tr>
          <th class="border-right">Producto</th>
          <th>Cantidad</th>
          @if($cotizacion?->rel_detalle[0]?->rel_proveedor1)
          <th class="border-left border-top">Costo</th>
          <th class="border-top">Condición de Pago</th>
          @endif
          @if($cotizacion?->rel_detalle[0]?->rel_proveedor2)
          <th class="border-left border-top">Costo</th>
          <th class="border-top">Condición de Pago</th>
          @endif
          @if($cotizacion?->rel_detalle[0]?->rel_proveedor3)
          <th class="border-left border-top">Costo</th>
          <th class="border-top">Condición de Pago</th>
          @endif
        </tr>
      </thead>
      <tbody>
        @php
        $sum1=0;
        $sum2=0;
        $sum3=0;
        @endphp
        @foreach ($cotizacion->rel_detalle as $val)
        <tr>
          <td>{{ $val->product }}</td>
          <td>{{ $val->quantity }}</td>
          @if($cotizacion?->rel_detalle[0]?->rel_proveedor1)
          <td>{{ $val->cost_1?'$'.number_format($val->cost_1):'' }}</td>
          <td>{{ $val->rel_tipo_pago1?->name }}</td>
          @endif
          @if($cotizacion?->rel_detalle[0]?->rel_proveedor2)
          <td>{{ $val->cost_2?'$'.number_format($val->cost_2):'' }}</td>
          <td>{{ $val->rel_tipo_pago2?->name }}</td>
          @endif
          @if($cotizacion?->rel_detalle[0]?->rel_proveedor3)
          <td>{{ $val->cost_3?'$'.number_format($val->cost_3):'' }}</td>
          <td>{{ $val->rel_tipo_pago3?->name }}</td>
          @endif
        </tr>
        @php
        $sum1 += $val->cost_1;
        $sum2 += $val->cost_2;
        $sum3 += $val->cost_3;
        @endphp
        @endforeach

      </tbody>
      <tfoot>
        <tr>
          <td class="sin-borde bg-withe"></td>
          <td class="sin-borde bg-withe"></td>
          @if($cotizacion?->rel_detalle[0]?->rel_proveedor1)
          <td class="sin-borde">{{ $sum1>0?'$'.number_format($sum1):'' }}</td>
          <td class="sin-borde bg-withe"></td>
          @endif
          @if($cotizacion?->rel_detalle[0]?->rel_proveedor2)
          <td class="sin-borde">{{ $sum2>0?'$'.number_format($sum2):'' }}</td>
          <td class="sin-borde bg-withe"></td>
          @endif
          @if($cotizacion?->rel_detalle[0]?->rel_proveedor3)
          <td class="sin-borde">{{ $sum3>0?'$'.number_format($sum3):'' }}</td>
          <td class="sin-borde bg-withe"></td>
          @endif
        </tr>
      </tfoot>

    </table>
    </p>
    <br><br>
    @if($cotizacion?->rel_proveedor)
    <p class="center">Con lo anterior se procede por dar aceptada la cotización del proveedor {{
      $cotizacion?->rel_proveedor?->name }}.</p>
    @endif
    <p width="25%">
      <center>
        <img class="firma"
          src="{{!empty($cotizacion?->rel_proveedor)?asset('/image/users/firmas/'.$cotizacion->rel_usuario?->signature):asset('/image/users/firmas/tu_firma_aqui.jpg')}}">

      </center>
      <center>{{ $cotizacion->rel_usuario?->name }}</center>
      <center>{{ $cotizacion->rel_usuario?->cargo }}</center>
    </p>
  </section>
  <footer>Alejandro Ltda</footer>
</body>

</html>
