@extends('layouts.app.app')
@section('titulo')Programación de Visitas @endsection
@section('content')
<div>
    @if (Auth::user()->hasrole('root') || Auth::user()->can('crear_visita_tecnica'))
    <a href="#" data-toggle="modal" data-target="#modal_crear" class="btn btn-dark btn-pill" title="Crear">
        <span>Agregar Visita</span>
    </a>
    <hr>
    @endif
    <div class="table-responsive">
        <table id="visit_types_table" class="theadcolor table table-striped table-hover table-checkable dataTable no-footer dtr-inline">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tipo de Visita</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Observación Gestión</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
        @include('technicalvisits.partials.modals')
    </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/technicalvisits/gestion.js') }}"></script>
@endsection