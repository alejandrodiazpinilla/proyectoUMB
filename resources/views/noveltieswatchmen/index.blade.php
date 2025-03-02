@extends('layouts.app.app')
@section('titulo')Novedades / Guardas @endsection
@section('content')
@if (Auth::user()->hasrole('root') || Auth::user()->can('crear_novedad_guarda'))
<a href="{{route('noveltieswatchmen.create')}}" class="btn btn-dark btn-pill mb-4" title="Crear">
    <span><i class="la la-plus"></i><span>Agregar</span></span>
</a>
@endif
<div class="table-responsive">
    <table id="noveltieswatchmen_table" class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tipo de Novedad</th>
                <th>Descripción</th>
                <th>Fecha de Creación</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
    </table>
</div>
@include('noveltieswatchmen.partials.modals')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/noveltieswatchmen/gestion.js') }}"></script>
@endsection