<!DOCTYPE html>
<html lang="es">

<head>
    <title>Certificado Laboral | {{ $contrato?->rel_empleado?->identification }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

        .firma {
            display: inline-block;
            width: 200px;
        }
    </style>
</head>

<body>
    <header>Alejandro Ltda</header>
    <br>
    <table width="97%" class="b-1" style="border-collapse: collapse;margin-left:11px">
        <tbody>
            <tr>
                <td width="19%" class="center b-1"><img src="{{ asset('img/logo.png') }}" style="display:block"
                        width="85"></td>
                <td width="59%" class="center b-1">
                    <h3>CERTIFICACIÓN LABORAL</h3>
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
        <p class="center">EL SUSCRITO Director de Recursos Humanos de Alejandro Ltda.</p>
        <br>
        <p class="center">NIT: 900.696.826-8</p>
        <br>
        <p>
        <h4 class="center">CERTIFICA:</h4>
        </p>
        <p align="justify" style="padding: 0px 50px 0px 50px;">Que {{ $contrato?->rel_empleado?->gender ==
            'Masculino'?'el señor':'la señora' }} <strong>{{ $contrato?->rel_empleado?->name.'
                '.$contrato?->rel_empleado?->surname }}</strong>,
            {{ $contrato?->rel_empleado?->gender == 'Masculino'?'identificado':'identificada' }} con cédula de
            ciudadanía No. {{ $contrato?->rel_empleado?->identification }}, {{ $contrato?->state ==
            1?'está':'estuvo' }} {{ $contrato?->rel_empleado?->gender == 'Masculino'?'vinculado':'vinculada' }} a
            <strong>Alejandro Ltda</strong> desde el {{ date('d-m-Y',strtotime($contrato?->start_date)) }} {{
            $contrato?->state == 1?'':'hasta el ' . date('d-m-Y',strtotime($contrato?->end_date)) }},
            {{-- bajo un contrato de
            trabajo por {{ $contrato?->rel_tipo_contrato?->name }},  --}}
            desempeñando el siguiente cargo:
        </p>
        <p>
            <br>
        <ul style="margin-left: 50px;">
            <li>{{ strtoupper($contrato?->position) }}</li>
        </ul>
        <br>
        </p>
        <p align="justify" style="padding: 0px 50px 0px 50px;">
            La presente certificación se expide a solicitud del interesado a los {{ date('d') }} días del mes de {{
            monthtoMes(date('F')) }}
            de {{ date('Y') }}.
        </p>
        <br><br>
        <p width="25%">
            <center><img class="firma" src="{{!empty($firmaDirRrhh)?asset('/image/users/firmas/'.$firmaDirRrhh->signature):asset('/image/users/firmas/tu_firma_aqui.jpg')}}"></center>
            <center>Director de Recursos Humanos</center>
            <center>Tel: 601 475 3258</center>
        </p>
    </section>
    <footer>Alejandro Ltda</footer>
</body>

</html>
