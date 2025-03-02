<!DOCTYPE html>
<html lang="es">

<head>
  <title>Orden de Compra | {{ $cotizacion->purchase_order }}</title>
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

    .center {
      text-align: center;
    }

    .left {
      text-align: left;
    }

    .right {
      text-align: right;
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
      background-color: #646464;
      color: white;
      font-size: 13px;
      border-color: black 1px solid;
      padding-top: 5px;
      padding-bottom: 5px;

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

    .border-bottom {
      border-bottom: 1px solid #000000 !important;
    }

    .firma {
      width: 200px;
      margin-top: 10px;
    }

    .sin-borde {
      /* border-left: 0ch !important; */
      border-bottom: 0ch !important;
      /* border-right: 0ch !important; */
      border-top: 0ch !important;
    }
    .sin-borde-t {
      border-top: 0ch !important;
    }

    .bg-withe {
      background-color: #ffffff !important;
    }

    .p-5 {
      padding: 5px;
    }

    .bold {
      font-weight: bold;
    }

    .ml-11 {
      margin-left: 11px;
    }

    .w-50 {
      width: 50%;
    }
  </style>
</head>

<body>
  <br>
  <table width="97%" class="b-1" style="border-collapse: collapse;margin-left:11px">
    <tbody>
      <tr>
        <td width="19%" class="center b-1"><img src="{{ asset('img/logo.png') }}" style="display:block" width="85"></td>
        <td width="59%" class="center b-1">
          <h3>ORDEN DE COMPRA</h3>
        </td>
        <td width="19%" class="b-1" style="text-align:right;">
          <table width="100%">
            <tbody>
              <tr>
                <td class="center">SV-F- 177</td>
              </tr>
              <hr>
              <tr>
                <td class="center">REV 1 – ENE/21</td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
  <br>
  <table width="100%" class="ml-11">
    <tbody>
      <tr>
        <td width="50%">
          <span class="bold">Dirección:</span> {{ infoEmpresa()->direccion }}<br>
          <span class="bold">Ciudad:</span> {{ infoEmpresa()->ciudad->nombre }}<br>
          <span class="bold">Teléfono:</span> {{ infoEmpresa()->telefono }}<br>
        </td>

        <td width="50%">
          <table width="65%" class="b-1" style="border-collapse: collapse;margin-left:115px;margin-bottom:10px">
            <tbody>
              <tr>
                <td class="left p-5 bold">Fecha: </td>
                <td class="right p-5">{{ date('d-m-Y h:i:s a',strtotime($cotizacion->updated_at)) }} </td>
              </tr>
            </tbody>
          </table>
          <table width="65%" class="b-1" style="border-collapse: collapse;margin-left:115px;">
            <tbody>
              <tr>
                <td class="left p-5 bold">Número de Orden: </td>
                <td class="right p-5">{{ $cotizacion->purchase_order }}</td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
  <br>
  <P class="ml-11">
    El número de orden debe figurar en toda la correspondencia, papeles de envió y facturas relacionadas.
  </P>

  <table class="quotation-table">
    <thead>
      <tr>
        <th>VENDEDOR:</th>
        <th>ENVIA A:</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="w-50 bg-withe sin-borde">{{ $cotizacion->rel_proveedor?->name }}</td>
        <td class="w-50 bg-withe sin-borde">{{ infoEmpresa()->nombre }}</td>
      </tr>
      <tr>
        <td class="w-50 bg-withe sin-borde">{{ $cotizacion->rel_proveedor?->contact_name }}</td>
        <td class="w-50 bg-withe sin-borde">{{ $cotizacion->rel_usuario?->name }}</td>
      </tr>
      <tr>
        <td class="w-50 bg-withe sin-borde">{{ $cotizacion->rel_proveedor?->address }}</td>
        <td class="w-50 bg-withe sin-borde">{{ infoEmpresa()->direccion }}</td>
      </tr>
      <tr>
        <td class="w-50 bg-withe sin-borde">{{ $cotizacion->rel_proveedor?->telephone }}</td>
        <td class="w-50 bg-withe sin-borde">{{ infoEmpresa()->telefono }}</td>
      </tr>
      <tr class="border-bottom">
        <td class="w-50 bg-withe sin-borde">{{ $cotizacion->rel_proveedor?->email }}</td>
        <td class="w-50 bg-withe sin-borde">{{ infoEmpresa()->email }}</td>
      </tr>
    </tbody>
  </table>
    <p>
    <table class="quotation-table">
      <tbody>
        <tr>
          <td class="center">Enviado Mediante</td>
          <td class="center">F.O.B.</td>
          <td class="center">Condiciones de Envío</td>
        </tr>
        <tr>
          <td style="height: 40px"></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </p>
  <section>
    <p align="justify">
    <table class="quotation-table">
      <thead>
        <tr>
          <th width="1px">Artículo #</th>
          <th width="150px">Producto</th>
          <th width="1px">Cantidad</th>
          <th width="20px">Valor U</th>
          <th width="20px">Total</th>
        </tr>
      </thead>
      <tbody>
        @php
        $total = 0;
        foreach ($cotizacion?->rel_detalle as $val){
          $total += ($val->cost_1??($val->cost_2??$val->cost_3)) * $val->quantity;
        }
        @endphp
        @foreach ($cotizacion?->rel_detalle as $key => $val)
        <tr>
          <td class="center">{{ ($key+1) }}</td>
          <td>{{ $val->product }}</td>
          <td class="center">{{ $val->quantity }}</td>
          <td class="center">$ {{ number_format($val->cost_1??($val->cost_2??$val->cost_3)) }}</td>
          <td class="center">$ {{ number_format(($val->cost_1??($val->cost_2??$val->cost_3)) * $val->quantity) }}</td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
          <tr>
          <td colspan="2" class="center">Condiciones o instrucciones especiales</td>
          <td colspan="2" class="center">Subtotal</td>
          <td colspan="1" class="center"></td>
          </tr>
          <tr>
            <td class="sin-borde" colspan="2"></td>
            <td colspan="2" class="center">%IVA</td>
            <td colspan="1" class="center"></td>
          </tr>
          <tr>
            <td class="sin-borde" colspan="2"></td>
            <td colspan="2" class="center">Envío</td>
            <td colspan="1" class="center"></td>
          </tr>
          <tr>
            <td class="sin-borde" colspan="2"></td>
            <td colspan="2" class="center">Otro</td>
            <td colspan="1" class="center"></td>
          </tr>
          <tr>
            <td class="sin-borde-t" colspan="2"></td>
            <td colspan="2" class="center">TOTAL</td>
            <td colspan="1" class="center">$ {{ number_format($total) }}</td>
          </tr>
        </tfoot>
    </table>
    </p>
    <br><br>
    @if($cotizacion?->rel_proveedor)
    <p class="center">Con lo anterior se procede por dar aceptada la cotización del proveedor {{ $cotizacion?->rel_proveedor?->name }}.</p>
    @endif
    <p width="25%">
      <center>
        <img class="firma"
          src="{{!empty($cotizacion?->rel_proveedor)?asset('/image/users/firmas/'.$cotizacion->rel_aprobado_por?->signature):asset('/image/users/firmas/tu_firma_aqui.jpg')}}">

      </center>
      <center>{{ $cotizacion->rel_aprobado_por?->name }}</center>
      <center>{{ $cotizacion->rel_aprobado_por?->cargo }}</center>
    </p>
  </section>
</body>

</html>