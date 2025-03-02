@extends('layouts.app.app')
@section('titulo')Capacitaciones @endsection
@section('content')
@if (Auth::user()->hasrole('root') || Auth::user()->can('crear_capacitacion'))
<a href="#" data-toggle="modal" data-target="#modal_crear" class="btn btn-dark btn-elevate btn-pill" title="Crear">
    <span><i class="la la-plus"></i><span>Agregar Capacitación</span></span>
</a>
<hr>
@endif
<div class="table-responsive">
    <table id="capacitaciones_table" class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline">
        <thead>
            <tr>
                <th>Fecha</th>
                <th># de Participantes</th>
                <th>Tema</th>
                <th>Descripción</th>
                <th>Fecha de Creación</th>
                <th>Acciones</th>
            </tr>
        </thead>
    </table>
</div>
@include('trainings.partials.modals')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/trainings/gestion.js') }}"></script>
@endsection