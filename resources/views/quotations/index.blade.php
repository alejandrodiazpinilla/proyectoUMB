@extends('layouts.app.app')
@section('titulo')Cotizaciones @endsection
@section('content')
<div>
    @if (Auth::user()->hasrole('root') || Auth::user()->can('crear_cotizacion'))
    <a href="{{route('quotations.create')}}" class="btn btn-dark btn-pill" title="Crear">Agregar</a>
    <hr>
    @endif
    <div class="table-responsive">
        <table id="quotations_table" class="theadcolor table table-striped table-hover table-checkable dataTable no-footer dtr-inline">
            <thead>
                <tr>
                    <th>Empresa</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                    <th>Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
    @include('quotations.partials.modals')
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/quotations/index.js') }}"></script>
@endsection