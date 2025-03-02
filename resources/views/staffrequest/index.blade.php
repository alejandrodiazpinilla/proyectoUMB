@extends('layouts.app.app')
@section('titulo')Solicitud de Personal @endsection
@section('content')
<style>
    @media (min-width: 1024px) {
  .modal-xl {
    max-width: 1000px; 
  } 
}
</style>
<div>
    @if (Auth::user()->hasrole('root') || Auth::user()->can('crear_solicitud_personal'))
    <a href="{{route('staffrequest.create')}}" class="btn btn-dark btn-pill" title="Crear">
        <span><i class="la la-plus"></i><span>Agregar</span></span>
    </a>
    <hr>
    @endif
    <div class="table-responsive">
        <table id="staff_request_table" class="theadcolor table table-striped table-hover table-checkable dataTable no-footer dtr-inline">
            <thead>
                <tr>
                    <th>Puesto</th>
                    <th>Cliente</th>
                    <th>Fecha de Solicitud</th>
                    <th>Estado</th>
                    <th>Concepto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@include('staffrequest.partials.modals')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/staffrequest/gestion.js') }}"></script>
@endsection