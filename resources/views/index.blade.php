@extends('layouts.web.app')
@section('titulo')Bienvenidos @endsection
@section('content')

<!-- bienvenida -->
<div class="hero">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>Personal Calificado y Certificado</h2>
                <h2><span>Alejandro ltda</span> Ltda</h2>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('/img/hero.png') }}" alt="Image">
            </div>
        </div>
    </div>
</div>
<!-- bienvenida -->

<!-- JavaScript -->
{{-- <script src={{ asset("js/jquery-3.4.1.min.js")}}></script> --}}
{{-- <script src={{ asset("js/bootstrap.bundle.min.js")}}></script> --}}

@endsection
