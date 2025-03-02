@extends('layouts.web.auth')
@section('titulo')
    Cambiar Contraseña
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mx-4">
                    <form method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="card-body ">
                            <div class="col-md-12" align="center">
                                <a href="{{ url('/index') }}">
                                    <img src="{!! asset('image/users/password.png') !!}" width="40%">
                                </a>
                            </div>
                            <h1 class="text-center">Cambiar Contraseña</h1>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="text" id="email" name="email"
                                    class="form-control m-input m-login__form-input--last @error('email') is-invalid @enderror" required
                                    autocomplete="current-email" value="{{ $email }}" required autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="icon-lock"></i>
                                  </span>
                                </div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" required placeholder="Nueva contraseña">
              
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="icon-lock"></i>
                                  </span>
                                </div>
                                <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password_confirmation" required placeholder="Confirmar nueva contraseña">
              
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer p-4">
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-danger btn-block">
                                        Actualizar Contraseña
                                    </button>
                                </div>
                                <div class="col-6">
                                    <a href="{{ route('login') }}" class="btn btn-secondary btn-block">Regresar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
