@extends('layouts.app.app')
@section('titulo')
    Afiliaciones
@endsection
@section('content')
    <a href="#" data-toggle="modal" data-target="#modal_crear" class="btn btn-dark btn-elevate btn-pill" title="Crear">
        <span><i class="la la-plus"></i><span>Agregar Afiliación</span></span>
    </a>
    <hr>
    <div class="table-responsive">
        <table id="afiliaciones_table"
            class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
    @include('affiliations.partials.modals')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/affiliations/gestion.js') }}"></script>
@endsection
