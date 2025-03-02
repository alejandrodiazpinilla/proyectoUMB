@extends('layouts.app.app')

@section('titulo')
    Actas De Visitas
@endsection

@section('content')
@if (Auth::user()->hasrole('root') || Auth::user()->can('crear_acta_reunion'))
<a href="{{ route('workminutes.create') }}" class="btn btn-dark btn-elevate btn-pill" title="Crear">
    <span><i class="la la-plus"></i><span>Agregar Acta</span></span>
</a>
<hr>
@endif
<div class="table-responsive">
    <table id="reuniones_table" class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline">
        <thead>
            <tr>
                <th>Consecutivo</th>
                <th>Fecha</th>
                <th>Area</th>
                <th>Tema</th>
                <th>Lugar</th>
                <th>Lider</th>
                <th>Acciones</th>
            </tr>
        </thead>
    </table>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/workminutes/gestionindex.js') }}"></script>
@endsection
