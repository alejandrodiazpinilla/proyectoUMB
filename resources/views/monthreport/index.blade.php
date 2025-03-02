@extends('layouts.app.app')
@section('titulo')Informe Mensual @endsection
@section('content')
<style>
    .datepicker tbody tr>td span.year.focused {
        background: #ffffff;
        color: #6c7293;
    }
</style>
    @if (Auth::user()->hasrole('root') || Auth::user()->can('crear_informe_mensual'))
    <a href="{{route('monthreport.create')}}" class="btn btn-dark btn-pill" title="Crear">
        <span><i class="la la-plus"></i><span>Agregar</span></span>
    </a>
    <hr>
    @endif
    <div class="table-responsive">
        <table id="month_report_table" class="theadcolor table table-striped table-hover table-checkable dataTable no-footer dtr-inline">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Estado</th>
                    <th>Mes y Año</th>
                    <th>Area</th>
                    <th>Fecha de presentación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/monthreport/gestion.js') }}"></script>  
@endsection