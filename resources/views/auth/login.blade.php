@extends('layouts.web.auth')
@section('titulo')Ingresar @endsection
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card-group">
          <div class="card p-4">
            <div class="card-body">
              <div class="col-md-12" align="center">
                <a href="{{ url('/index') }}">
                  <img src="{{asset('/img/logo.png')}}" width="40%">
                </a>
              </div>
              {{-- {{ bcrypt('53121370') }} --}}
              @if(session()->has('mensaje'))
              <div class="alert alert-danger">
                {{ session()->get('mensaje') }}
              </div>
              @endif
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1 class="text-center">Ingresar</h1>
                <p class="text-muted text-center">Ingresa con tu usuario y contraseña</p>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-user"></i>
                    </span>
                  </div>
                  <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                  @error('username')
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
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="row">
                  <div class="col">
                    <button type="submit" class="btn btn-danger px-4">
                      {{ __('Login') }}
                    </button>
                  </div>
                  <div class="col">
                    {{-- @if (Route::has('password.request'))
                    <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                      {{ __('Olvidaste tu contraseña?') }}
                    </a>
                    @endif --}}
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
