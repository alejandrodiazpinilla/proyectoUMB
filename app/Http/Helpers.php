<?php

use \Illuminate\Support\Facades\DB;
use App\Models\ApodatosNotification;
use Illuminate\Support\Facades\Auth;
use App\Models\ComercialNotification;
use App\Models\AffiliationNotification;
use App\Models\TerminationNotification;
use Illuminate\Support\Facades\Request;
use App\Models\StaffRequestNotification;
use App\Models\Empresa;

// function ability($role, $permissions){
//     return $this->hasAnyRole($role) && $this->hasAnyPermission($permissions);
// }

function moneyFormat($number, $fractional = false) {
    
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);

        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
}

function notificaciones_comercial(){
    $notiUnreads = ComercialNotification::with([
        'rel_tipo:id,name',
        'rel_cliente:id,name'
    ])
    ->where('user_id',Auth()->user()->id)
    ->where('read','no')
    ->get();
    $noti = ComercialNotification::with([
        'rel_tipo:id,name',
        'rel_cliente:id,name'
    ])
    ->orderBy('id','desc')
    ->where('user_id',Auth()->user()->id)
    ->get();
    // if (isset($noti) ) {
        return [$noti,$notiUnreads];
    // }else{
        // return '';
    // }
}

function notificaciones_desvinculaciones(){
    $notiUnreads = TerminationNotification::with([
        'rel_tipo:id,name',
        'rel_empleado:id,name'
    ])
    ->where('user_id',Auth()->user()->id)
    ->where('read','no')
    ->get();
    $noti = TerminationNotification::with([
        'rel_tipo:id,name',
        'rel_empleado:id,name,user_rel_id',
        'rel_empleado.rel_usuario_empleado:id,name'
    ])
    ->orderBy('id','desc')
    ->where('user_id',Auth()->user()->id)
    ->get();
        return [$noti,$notiUnreads];
}

function notificaciones_solicitud_personal(){
    $notiUnreads = StaffRequestNotification::with([
        'rel_usuario:id,name',
        'rel_solicitud:id'
    ])
    ->where('user_id',Auth()->user()->id)
    ->where('read','no')
    ->get();
    $noti = StaffRequestNotification::with([
        'rel_usuario:id,name',
        'rel_solicitud:id'
    ])
    ->orderBy('id','desc')
    ->where('user_id',Auth()->user()->id)
    ->get();
        return [$noti,$notiUnreads];
}

function notificaciones_apodatos(){
    $notiUnreads = ApodatosNotification::with([
        'rel_usuario:id,name',
        'rel_empleado:id,name,surname'
    ])
    ->where('user_id',Auth()->user()->id)
    ->where('read','no')
    ->get();
    $noti = ApodatosNotification::with([
        'rel_usuario:id,name',
        'rel_empleado:id,name,surname'
    ])
    ->orderBy('id','desc')
    ->where('user_id',Auth()->user()->id)
    ->get();
        return [$noti,$notiUnreads];
}

function notificaciones_afiliaciones(){
    $notiUnreads = AffiliationNotification::with([
        'rel_usuario:id,name',
        'rel_empleado:id,name,surname'
    ])
    ->where('user_id',Auth()->user()->id)
    ->where('read','no')
    ->get();
    $noti = AffiliationNotification::with([
        'rel_usuario:id,name',
        'rel_empleado:id,name,surname'
    ])
    ->orderBy('id','desc')
    ->where('user_id',Auth()->user()->id)
    ->get();
        return [$noti,$notiUnreads];
}

function infoEmpresa(){
    return Empresa::with('servicios')->where('id',1)->first();
}

function monthtoMes(string $mes){
    switch ($mes) {
        case "January": $mesActual = "Enero"; break;
        case "February": $mesActual = "Febrero"; break;
        case "March": $mesActual = "Marzo"; break;
        case "April": $mesActual = "Abril"; break;
        case "May": $mesActual = "Mayo"; break;
        case "June": $mesActual = "Junio"; break;
        case "July": $mesActual = "Julio"; break;
        case "August": $mesActual = "Agosto"; break;
        case "September": $mesActual = "Septiembre"; break;
        case "October": $mesActual = "Octubre"; break;
        case "November": $mesActual = "Noviembre"; break;
        case "Dicember": $mesActual = "Diciembre"; break;
    };
    return $mesActual;
}

function mesAnumero(string $mes){
    switch ($mes) {
        case "Enero": $mes = 1; break;
        case "Febrero": $mes = 2; break;
        case "Marzo": $mes = 3; break;
        case "Abril": $mes = 4; break;
        case "Mayo": $mes = 5; break;
        case "Junio": $mes = 6; break;
        case "Julio": $mes = 7; break;
        case "Agosto": $mes = 8; break;
        case "Septiembre": $mes = 9; break;
        case "Octubre": $mes = 10; break;
        case "Noviembre": $mes = 11; break;
        case "Diciembre": $mes = 12; break;
    };
    return $mes;
}

function numeroAmes(string $mes){
    switch ($mes) {
        case 1: $mes = "Enero"; break;
        case 2: $mes = "Febrero"; break;
        case 3: $mes = "Marzo"; break;
        case 4: $mes = "Abril"; break;
        case 5: $mes = "Mayo"; break;
        case 6: $mes = "Junio"; break;
        case 7: $mes = "Julio"; break;
        case 8: $mes = "Agosto"; break;
        case 9: $mes = "Septiembre"; break;
        case 10: $mes = "Octubre"; break;
        case 11: $mes = "Noviembre"; break;
        case 12: $mes = "Diciembre"; break;
    };
    return $mes;
}

function numEmLetras($numero)
{
    $xarray = array(
        0 => "Cero",
        1 => "UN", "DOS", "TRES", "CUATRO", "CINCO", "SEIS", "SIETE", "OCHO", "NUEVE", "DIEZ", "ONCE", "DOCE", "TRECE", "CATORCE", "QUINCE", "DIECISEIS", "DIECISIETE", "DIECIOCHO", "DIECINUEVE", "VEINTI",
        30 => "TREINTA",
        40 => "CUARENTA",
        50 => "CINCUENTA",
        60 => "SESENTA",
        70 => "SETENTA",
        80 => "OCHENTA",
        90 => "NOVENTA",
        100 => "CIENTO",
        200 => "DOSCIENTOS",
        300 => "TRESCIENTOS",
        400 => "CUATROCIENTOS",
        500 => "QUINIENTOS",
        600 => "SEISCIENTOS",
        700 => "SETECIENTOS",
        800 => "OCHOCIENTOS",
        900 => "NOVECIENTOS"

    );
    $numero = trim($numero);
    $xlength = strlen($numero);
    $xpos_punto = strpos($numero, ".");
    $xaux_int = $numero;
    $xdecimales = "00";
    if (!($xpos_punto === false)) {
        if ($xpos_punto == 0) {
            $numero = "0" . $numero;
            $xpos_punto = strpos($numero, ".");
        }
        $xaux_int = substr($numero, 0, $xpos_punto);
        $xdecimales = substr($numero . "00", $xpos_punto + 1, 2);
    }
    $XAUX = str_pad($xaux_int, 18, " ", STR_PAD_LEFT);
    $xcadena = "";
    for ($xz = 0; $xz < 3; $xz++) {
        $xaux = substr($XAUX, $xz * 6, 6);
        $xi = 0;
        $xlimite = 6;
        $xexit = true;
        while ($xexit) {
            if ($xi == $xlimite) {
                break;
            }
            $x3digitos = ($xlimite - $xi) * -1;
            $xaux = substr($xaux, $x3digitos, abs($x3digitos));
            for ($xy = 1; $xy < 4; $xy++) {
                switch ($xy) {
                    case 1:
                        if (substr($xaux, 0, 3) < 100) {
                        } else {
                            $key = (int) substr($xaux, 0, 3);
                            if (TRUE === array_key_exists($key, $xarray)) {
                                $xseek = $xarray[$key];
                                $xsub = subfijo($xaux); 
                                if (substr($xaux, 0, 3) == 100)
                                    $xcadena = " " . $xcadena . " CIEN " . $xsub;
                                else
                                    $xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
                                $xy = 3;
                            } else {
                                $key = (int) substr($xaux, 0, 1) * 100;
                                $xseek = $xarray[$key];
                                $xcadena = " " . $xcadena . " " . $xseek;
                            }
                        }
                        break;
                    case 2:
                        if (substr($xaux, 1, 2) < 10) {
                        } else {
                            $key = (int) substr($xaux, 1, 2);
                            if (TRUE === array_key_exists($key, $xarray)) {
                                $xseek = $xarray[$key];
                                $xsub = subfijo($xaux);
                                if (substr($xaux, 1, 2) == 20)
                                    $xcadena = " " . $xcadena . " VEINTE " . $xsub;
                                else
                                    $xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
                                $xy = 3;
                            } else {
                                $key = (int) substr($xaux, 1, 1) * 10;
                                $xseek = $xarray[$key];
                                if (20 == substr($xaux, 1, 1) * 10)
                                    $xcadena = " " . $xcadena . " " . $xseek;
                                else
                                    $xcadena = " " . $xcadena . " " . $xseek . " Y ";
                            } 
                        }
                        break;
                    case 3:
                        if (substr($xaux, 2, 1) < 1) {
                        } else {
                            $key = (int) substr($xaux, 2, 1);
                            $xseek = $xarray[$key]; 
                            $xsub = subfijo($xaux);
                            $xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
                        }
                        break;
                }
            }
            $xi = $xi + 3;
        }

        if (substr(trim($xcadena), -5, 5) == "ILLON")
            $xcadena .= " DE";
        if (substr(trim($xcadena), -7, 7) == "ILLONES")
            $xcadena .= " DE";
        if (trim($xaux) != "") {
            switch ($xz) {
                case 0:
                    if (trim(substr($XAUX, $xz * 6, 6)) == "1")
                        $xcadena .= "UN BILLON ";
                    else
                        $xcadena .= " BILLONES ";
                    break;
                case 1:
                    if (trim(substr($XAUX, $xz * 6, 6)) == "1")
                        $xcadena .= "UN MILLON ";
                    else
                        $xcadena .= " MILLONES ";
                    break;
                case 2:
                    if ($numero < 1) {
                        $xcadena = "CERO PESOS ";
                    }
                    if ($numero >= 1 && $numero < 2) {
                        $xcadena = "UN PESO  ";
                    }
                    if ($numero >= 2) {
                        $xcadena .= " PESOS ";
                    }
                    break;
            }
        }
        $xcadena = str_replace("VEINTI ", "VEINTI", $xcadena);
        $xcadena = str_replace("  ", " ", $xcadena);
        $xcadena = str_replace("UN UN", "UN", $xcadena);
        $xcadena = str_replace("  ", " ", $xcadena);
        $xcadena = str_replace("BILLON DE MILLONES", "BILLON DE", $xcadena);
        $xcadena = str_replace("BILLONES DE MILLONES", "BILLONES DE", $xcadena);
        $xcadena = str_replace("DE UN", "UN", $xcadena);
    }

    return trim($xcadena);
}

function subfijo($xx)
{   $xx = trim($xx);
    $xstrlen = strlen($xx);
    if ($xstrlen == 1 || $xstrlen == 2 || $xstrlen == 3)
        $xsub = "";
    if ($xstrlen == 4 || $xstrlen == 5 || $xstrlen == 6)
        $xsub = "MIL";
    return $xsub;
}