@extends('layouts.app.app')
@section('titulo') Entidades de Formación @endsection
@section('content')
    @if (Auth::user()->hasrole('root') || Auth::user()->can('crear_entidad_formacion'))
    <a href="#" data-toggle="modal" data-target="#modal_crear" class="btn btn-dark btn-elevate btn-pill" title="Crear">
        <span>Agregar Entidad</span>
    </a>
    <hr>
    @endif
    <div class="table-responsive">
        <table id="entidades_table" class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
    @include('trainingentities.partials.modals')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/trainingentities/gestion.js') }}"></script>
@endsection
