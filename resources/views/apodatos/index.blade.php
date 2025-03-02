@extends('layouts.app.app')
@section('titulo')Apodatos @endsection
@section('content')
<div>
    @if (Auth::user()->hasrole('root') || Auth::user()->can('crear_apodatos'))
    <a href="{{route('apodatos.create')}}" class="btn btn-dark btn-pill" title="Crear">
        <span><i class="la la-plus"></i><span>Nuevo Registro</span></span>
    </a>
    <hr>
    @endif
    <div class="table-responsive">
        <table id="apodatos_table" class="theadcolor table table-striped table-hover table-checkable dataTable no-footer dtr-inline">
            <thead>
                <tr>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Código de Curso</th>
                    <th>Nro</th>
                    <th>Fecha de Vencimiento</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
        @include('apodatos.partials.modals')
    </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/apodatos/gestion.js') }}"></script>
@endsection