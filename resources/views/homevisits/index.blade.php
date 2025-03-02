@extends('layouts.app.app')
@section('titulo')Visitas Domiciliarias @endsection
@section('content')
<div>
    @if (Auth::user()->hasrole('root') || Auth::user()->can('crear_visita_domiciliaria'))
    <a href="{{route('homevisits.create')}}" class="btn btn-dark btn-pill" title="Crear">
        <span><i class="la la-plus"></i><span>Agregar Visita Domiciliaria</span></span>
    </a>
    <hr>
    @endif
    <div class="table-responsive">
        <table id="home_visits_table" class="theadcolor table table-striped table-hover table-checkable dataTable no-footer dtr-inline">
            <thead>
                <tr>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Resultado</th>
                    <th>Fecha de Realización</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/homevisits/gestion_index.js') }}"></script>
@endsection