@extends('layouts.web.auth')

@section('content')

    <form class="login-form" action="#" method="post">
        {{ csrf_field() }}
        <h3 class="font-green">Activar Cuenta</h3>
        <p class="hint">Ingrese su documento de identidad a continuación: </p>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Documento de Identidad</label>
            <input class="form-control placeholder-no-fix" type="text" placeholder="Documento de Identidad" name="fullname" />
        </div>

        <div class="form-group margin-top-20 margin-bottom-20">
            <label class="mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="tnc" /> I agree to the
                <a href="javascript:;">Terms of Service </a> &
                <a href="javascript:;">Privacy Policy </a>
                <span></span>
            </label>
            <div id="register_tnc_error"> </div>
        </div>
        <div class="form-actions">
            <a href="{{route('login')}}" id="register-back-btn" class="btn green btn-outline">Regresar</a>
            <button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Validar Información</button>
        </div>
    </form>

@endsection
