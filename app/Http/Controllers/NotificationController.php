<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\ApodatosNotification;
use App\Models\ComercialNotification;
use App\Models\AffiliationNotification;
use App\Models\TerminationNotification;
use App\Models\StaffRequestNotification;

class NotificationController extends Controller
{

    public function conteo()
    {
        $nuevoConteoComercial = ComercialNotification::where('user_id', Auth()->user()->id)->where('read', 'no')->count();
        $nuevoConteoRetiros = TerminationNotification::where('user_id', Auth()->user()->id)->where('read', 'no')->count();
        $nuevoConteoSolicitud = StaffRequestNotification::where('user_id', Auth()->user()->id)->where('read', 'no')->count();
        $nuevoConteoApodatos = ApodatosNotification::where('user_id', Auth()->user()->id)->where('read', 'no')->count();
        $nuevoConteoAfiliaciones = AffiliationNotification::where('user_id', Auth()->user()->id)->where('read', 'no')->count();
        return array(
            'nuevoConteoComercial' => $nuevoConteoComercial,
            'nuevoConteoRetiros' => $nuevoConteoRetiros,
            'nuevoConteoSolicitud' => $nuevoConteoSolicitud,
            'nuevoConteoApodatos' => $nuevoConteoApodatos,
            'nuevoConteoAfiliaciones' => $nuevoConteoAfiliaciones
        );
    }

    public function notificacionClienteLeida(Request $request)
    {
        $id = $request->id;
        $estado = ComercialNotification::find($id);
        $nuevoEstado = ComercialNotification::where('id', $id);
        if ($estado->read == 'si') {
            $nuevoEstado->update(['read' => 'no', 'updated_at' => date('Y-m-d h:i:s')]);
        } else if ($estado->read == 'no') {
            $nuevoEstado->update(['read' => 'si', 'updated_at' => date('Y-m-d h:i:s')]);
        }
        $nuevoConteo = $this->conteo();
        return ['nuevoConteo' => $nuevoConteo, 'nuevoEstado' => $nuevoEstado->get()];
    }

    public function notificacionClienteEliminada(Request $request)
    {
        $id = $request->id;
        ComercialNotification::where('id', $id)->delete();
        $nuevoConteo = $this->conteo();
        return ['nuevoConteo' => $nuevoConteo];
    }

    public function notificacionDesvinculacionLeida(Request $request)
    {
        $id = $request->id;
        $estado = TerminationNotification::find($id);
        $nuevoEstado = TerminationNotification::where('id', $id);
        if ($estado->read == 'si') {
            $nuevoEstado->update(['read' => 'no', 'updated_at' => date('Y-m-d h:i:s')]);
        } else if ($estado->read == 'no') {
            $nuevoEstado->update(['read' => 'si', 'updated_at' => date('Y-m-d h:i:s')]);
        }
        $nuevoConteo = $this->conteo();
        return ['nuevoConteo' => $nuevoConteo, 'nuevoEstado' => $nuevoEstado->get()];
    }

    public function notificacionDesvinculacionEliminada(Request $request)
    {
        $id = $request->id;
        TerminationNotification::where('id', $id)->delete();
        $nuevoConteo = $this->conteo();
        return ['nuevoConteo' => $nuevoConteo];
    }

    public function notificacionSolicitudPersonalLeida(Request $request)
    {
        $id = $request->id;
        $estado = StaffRequestNotification::find($id);
        $nuevoEstado = StaffRequestNotification::where('id', $id);
        if ($estado->read == 'si') {
            $nuevoEstado->update(['read' => 'no', 'updated_at' => date('Y-m-d h:i:s')]);
        } else if ($estado->read == 'no') {
            $nuevoEstado->update(['read' => 'si', 'updated_at' => date('Y-m-d h:i:s')]);
        }
        $nuevoConteo = $this->conteo();
        return ['nuevoConteo' => $nuevoConteo, 'nuevoEstado' => $nuevoEstado->get()];
    }

    public function notificacionSolicitudPersonalEliminada(Request $request)
    {
        $id = $request->id;
        StaffRequestNotification::where('id', $id)->delete();
        $nuevoConteo = $this->conteo();
        return ['nuevoConteo' => $nuevoConteo];
    }

    public function notificacionApodatosLeida(Request $request)
    {
        $id = $request->id;
        $estado = ApodatosNotification::find($id);
        $nuevoEstado = ApodatosNotification::where('id', $id);
        if ($estado->read == 'si') {
            $nuevoEstado->update(['read' => 'no', 'updated_at' => date('Y-m-d h:i:s')]);
        } else if ($estado->read == 'no') {
            $nuevoEstado->update(['read' => 'si', 'updated_at' => date('Y-m-d h:i:s')]);
        }
        $nuevoConteo = $this->conteo();
        return ['nuevoConteo' => $nuevoConteo, 'nuevoEstado' => $nuevoEstado->get()];
    }

    public function notificacionApodatosEliminada(Request $request)
    {
        $id = $request->id;
        ApodatosNotification::where('id', $id)->delete();
        $nuevoConteo = $this->conteo();
        return ['nuevoConteo' => $nuevoConteo];
    }

    public function notificacionAfiliacionesLeida(Request $request)
    {
        $id = $request->id;
        $estado = AffiliationNotification::find($id);
        $nuevoEstado = AffiliationNotification::where('id', $id);
        if ($estado->read == 'si') {
            $nuevoEstado->update(['read' => 'no', 'updated_at' => date('Y-m-d h:i:s')]);
        } else if ($estado->read == 'no') {
            $nuevoEstado->update(['read' => 'si', 'updated_at' => date('Y-m-d h:i:s')]);
        }
        $nuevoConteo = $this->conteo();
        return ['nuevoConteo' => $nuevoConteo, 'nuevoEstado' => $nuevoEstado->get()];
    }

    public function notificacionAfiliacionesEliminada(Request $request)
    {
        $id = $request->id;
        AffiliationNotification::where('id', $id)->delete();
        $nuevoConteo = $this->conteo();
        return ['nuevoConteo' => $nuevoConteo];
    }
}
