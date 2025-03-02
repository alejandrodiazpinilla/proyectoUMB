@extends('layouts.web.app')
@section('titulo')Servicios @endsection
@section('content')

<!-- Servicio -->
@foreach (infoEmpresa()->servicios as $key => $val)
    <div class="service-row">
        <div class="container">
            <div class="row align-items-center">
                {{-- si la $key es par, se agrega la clase d-md-none d-block --}}
                <div class="col-md-6 {{(($key % 2) == 0)?'d-md-none d-block':''}}"> 
                    <div class="service-row-img">
                        <img src='{{ asset("/image/servicios/$val->imagen") }}' alt="Service">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-row-text">
                        <h2 class="section-title">{{$val->nombre}}</h2>
                        <p>
                            {{ $val->descripcion }}
                        </p>
                    </div>
                </div>
                {{-- si la $key es par, se agrega esta seccion --}}
                @if(($key % 2) == 0)
                <div class="col-md-6 d-md-block d-none">
                    <div class="service-row-img">
                        <img src='{{ asset("/image/servicios/$val->imagen") }}' alt="Service">
                    </div>
                </div>
                @endif
                {{-- fin seccion si es par --}}
            </div>
        </div>
    </div>
@endforeach
<!-- Servicio -->

<!-- JavaScript -->
{{-- <script src="js/jquery-3.4.1.min.js"></script> --}}
{{-- <script src="js/bootstrap.bundle.min.js"></script> --}}

@endsection