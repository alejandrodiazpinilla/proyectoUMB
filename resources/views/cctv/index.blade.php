@extends('layouts.app.app')
@section('titulo')Actividades CCTV @endsection
@section('content')
<div>
    @if (Auth::user()->hasrole('root') || Auth::user()->can('crear_cctv'))
    <a href="#" data-toggle="modal" data-target="#modal_crear" class="btn btn-dark btn-pill" title="Crear">
        <span><i class="la la-plus"></i><span>Agregar Informe</span></span>
    </a>
    <hr>
    @endif
    <div class="table-responsive">
        <table id="cctv_table" class="theadcolor table table-striped table-hover table-checkable dataTable no-footer dtr-inline">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Técnico</th>
                    <th>Cliente</th>
                    <th>Daño Actual</th>
                    <th>Proxima Visita</th>
                    <th>Fecha Creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
        @include('cctv.partials.modals')
    </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/cctv/gestion.js') }}"></script>
@endsection