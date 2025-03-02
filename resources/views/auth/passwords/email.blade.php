@extends('layouts.web.auth')
@section('titulo')
    Recuperar Contraseña
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mx-4">
                    <form method="POST" action="{{ route('password.email') }}">
                        <div class="card-body ">
                            <div class="col-md-12" align="center">
                                <a href="{{ url('/index') }}">
                                    <img src="{!! asset('image/users/password.png') !!}" width="40%">
                                </a>
                            </div>
                            @csrf
                            <h1 class="text-center">Recuperar Contraseña</h1>
                            <p class="text-center">Ingrese su dirección de correo electrónico a continuación <br> para
                                restablecer su
                                contraseña</p>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="text" id="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" required
                                    autocomplete="current-email">
                                @error('email')
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
                                        Enviar Email
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
