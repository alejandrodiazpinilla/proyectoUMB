<!DOCTYPE html>
<html lang="es">

<head>
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/favicon.ico')}}">
    <title>Desprendible Nómina |
        {{ $desprendible->identification.'|'.numeroAmes($desprendible->month).'|'.$desprendible->year }}
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        @page {
            /* Arriba | Derecha | Abajo | Izquierda */
            margin: 0px 0px 0px 0px !important;
        }
        ||
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        header {
            background-color: #f6f6f6;
            padding: 10px;
            color: #cccccc;
            font-size: 12px;
        }

        footer {
            background-color: #f6f6f6;
            padding: 9px;
            color: #cccccc;
            font-size: 12px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .center {
            text-align: center;
        }

        .b-1 {
            border: 1px solid;
        }

        .br{
            border-right: 1px solid;
        }

        .bl{
            border-left: 1px solid;
        }

        .bt{
            border-top: 1px solid;
        }

        .bb{
            border-bottom: 1px solid;
        }

        .firma {
            display: inline-block;
            width: 200px;
        }

        .bold {
            font-weight: bold;
            font-size: 13px;
        }

        .collapse{
            border-collapse: collapse;
        }
    </style>
</head>

<body>

    <header>
        <span>Alejandro Ltda</span>
        <span style="float: right;">Nit 900.696.826-8</span>
    </header>
    <br>
    <table width="97%" class="b-1 collapse" style="margin-left:11px">
        <tbody>
            <tr>
                <td width="20%" class="center b-1">
                    <img src="{{ asset('img/logo.png') }}" style="display:block" width="85">
                </td>
                <td width="80%" class="center b-1">
                    <h3>DESPRENDIBLE DE PAGO</h3>
                </td>
            </tr>
        </tbody>
    </table>
    <section style="margin-left:25px;margin-right:25px;">
        <h4 class="center">Nómina {{ numeroAmes($desprendible->month).' de '.$desprendible->year }}</h4>
        <table width="100%" class="collapse">
            <tbody>
                <tr>
                    <td width="20%" class="center bold bt bl br bb">
                        EMPLEADO
                    </td>
                    <td width="80%" class="center bold bt br bb">
                        {{ $desprendible?->rel_empleado?->name.' '.$desprendible?->rel_empleado?->surname }}
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="100%" class="collapse">
            <tbody>
                <tr>
                    <td width="20%" class="center bold bl bb br">
                        IDENTIFICACIÓN
                    </td>
                    <td width="20%" class="center bb">
                        {{ $desprendible->identification }}
                    </td>
                    <td width="60%" class="center bold bb bl br">
                        PUESTO
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="100%" class="collapse">
            <tbody>
                <tr>
                    <td width="20%" class="center bold bl bb br">
                        BÁSICO
                    </td>
                    <td width="20%" class="center bb br">
                        $ {{ number_format($desprendible->basic_salary) }}
                    </td>
                    <td width="60%" class="center bb br">
                        {{ $desprendible?->rel_empleado?->rel_ult_contrato?->position }}
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="100%" class="collapse">
            <tbody>
                <tr>
                    <td width="20%" class="center bold bl bb br">
                        DÍAS TRABAJADOS
                    </td>
                    <td width="20%" class="center br bb">
                        {{ $desprendible->worked_days }}
                    </td>
                    <td width="40%" class="center bold br bb">
                        CANT. DIAS INCAP.
                    </td>
                    <td width="20%" class="center br bb">
                        {{ $desprendible?->days_disability === 0 ? '-' : $desprendible?->days_disability}}
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="100%" class="collapse">
            <tbody>
                <tr>
                    <td width="50%" class="center bold bl bb">
                        DEVENGADOS
                    </td>
                    <td width="50%" class="center bold bl br bb">
                        DESCUENTOS
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="100%" class="collapse">
            <tbody>
                <tr>
                    <td width="20%" class="center bold bl bb br">
                        SUELDO
                    </td>
                    <td width="20%" class="center bb br">
                        $ {{ number_format($desprendible->salary) }}
                    </td>
                    <td width="40%" class="center bold bb br">
                        DESCUENTOS
                    </td>
                    <td width="20%" class="center bb br">
                        {{ $desprendible?->discounts === 0 ? '-' : '$ '.number_format($desprendible?->discounts)}}
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="100%" class="collapse">
            <tbody>
                <tr>
                    <td width="20%" class="center bold bl bb br">
                        AUX. TRANSPORTE
                    </td>
                    <td width="20%" class="center bb br">
                        {{ $desprendible->transport_assistance === 0 ? '-' : '$ '.number_format($desprendible->transport_assistance) }}
                    </td>
                    <td width="40%" class="center bold bb br">
                        DIPLOMA / CURSO
                    </td>
                    <td width="20%" class="center bb br">
                        {{ $desprendible->course === 0 ? '-' : '$ '.number_format($desprendible?->course) }}
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="100%" class="collapse">
            <tbody>
                <tr>
                    <td width="20%" class="center bold bl br bb">
                        COMISIONES
                    </td>
                    <td width="20%" class="center bb br">
                        {{ $desprendible->commissions === 0 ? '-' : '$ '.number_format($desprendible->commissions) }}
                    </td>
                    <td width="40%" class="center bold bb br">
                        PENSIÓN
                    </td>
                    <td width="20%" class="center bb br">
                        {{ $desprendible->pension === 0 ? '-' : '$ '.number_format($desprendible?->pension) }}
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="100%" class="collapse">
            <tbody>
                <tr>
                    <td width="20%" class="center bold bl br bb">
                        BONO MERA LIBERALIDAD
                    </td>
                    <td width="20%" class="center bb br">
                        {{ $desprendible->bonus === 0 ? '-' : '$ '.number_format($desprendible->bonus) }}
                    </td>
                    <td width="40%" class="center bold bb br">
                        SALUD
                    </td>
                    <td width="20%" class="center bb br">
                        {{ $desprendible->health === 0 ? '-' : '$ '.number_format($desprendible?->health) }}
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="100%" class="collapse">
            <tbody>
                <tr>
                    <td width="20%" class="center bold bl bb br">
                        INCAPACIDAD
                    </td>
                    <td width="20%" class="center bb br">
                        {{ $desprendible->inhability === 0 ? '-' : '$ '.number_format($desprendible->inhability) }}
                    </td>
                    <td width="60%" class="center bb br"></td>
                </tr>
            </tbody>
        </table>
        <table width="100%" class="collapse">
            <tbody>
                <tr>
                    <td width="20%" class="center bold bl br">
                        TOTAL DEVENGADO
                    </td>
                    <td width="20%" class="center br">
                        {{ $desprendible->total_accrued === 0 ? '-' : '$ '.number_format($desprendible->total_accrued) }}
                    </td>
                    <td width="40%" class="center bold br">
                        TOTAL DESCUENTOS
                    </td>
                    <td width="20%" class="center br">
                        {{ $desprendible->total_discounts === 0 ? '-' : '$ '.number_format($desprendible?->total_discounts) }}
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="100%" class="collapse">
            <tbody>
                <tr>
                    <td width="100%" class="center bold b-1">
                        <table width="100%" style="padding-top:50px;padding-bottom:50px" class="collapse">
                            <tbody>
                                <tr>
                                    <td width="20%" class="center bold bl bt bb br">
                                       VALOR A PAGAR
                                    </td>
                                    <td width="20%" class="center bb bt br">
                                        {{ $desprendible->amount_be_pay === 0 ? '-' : '$ '.number_format($desprendible->amount_be_pay) }}
                                    </td>
                                    <td width="60%" class="center"></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="100%" class="center bb bl br bold">
                        SON {{ $desprendible->amount_be_pay === 0 ? '-' : numEmLetras($desprendible?->amount_be_pay) }} M/CTE
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
    <footer>
        <span>Alejandro Ltda</span>
        <span style="float: right;margin-right:20px;">Nit 900.696.826-8</span>
    </footer>
</body>

</html>
