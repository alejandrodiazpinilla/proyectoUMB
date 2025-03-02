@extends('layouts.app.app')
@section('titulo')Empleados @endsection
@section('content')
@if (Auth::user()->hasrole('root') || Auth::user()->can('crear_empleado'))
<a href="{{route('employees.create')}}" class="btn btn-dark btn-elevate btn-pill" title="Crear">
    <span><i class="la la-plus"></i><span>Agregar Empleado</span></span>
</a>
@endif
<hr>
<div class="table-responsive">
    <table id="employees_table" class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline">
        <thead>
            <tr>
                <th>Identificación</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Género</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
    </table>
    @include('employees.partials.modals')
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/employees/gestion.js') }}"></script>
@endsection