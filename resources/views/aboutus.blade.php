@extends('layouts.web.app')
@section('titulo')Sobre Nosotros @endsection
@section('content')

<!-- About Start -->
<div class="about">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div id="video-section">
                    <div class="youtube-player" data-id="jssO8-5qmag">
                        <iframe  src="{{infoEmpresa()->video_institucional}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="section-title">Nosotros</h2>
                <p class="text-justify">
                    {!!nl2br(str_replace(" ", " &nbsp;", infoEmpresa()->sobre_nosotros))!!}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md p-5">
                <h2 class="section-title">Misión</h2>
                <p class="text-justify">
                    {!!nl2br(str_replace(" ", " &nbsp;", infoEmpresa()->mision))!!}
                </p>
            </div>
            <div class="col-md p-5">
                <h2 class="section-title">Visión</h2>
                <p class="text-justify">
                    {!!nl2br(str_replace(" ", " &nbsp;", infoEmpresa()->vision))!!}
                </p>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- JavaScript -->
{{-- <script src="js/jquery-3.4.1.min.js"></script> --}}
{{-- <script src="js/bootstrap.bundle.min.js"></script> --}}
@endsection