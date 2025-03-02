@extends('layouts.app.app')
@section('titulo')Proveedores @endsection
@section('content')
<div>
    @if (Auth::user()->hasrole('root') || Auth::user()->can('crear_proveedor'))
    <a href="{{route('providers.create')}}" class="btn btn-dark btn-pill" title="Crear">
        Agregar
    </a>
    <hr>
    @endif
    <div class="table-responsive">
        <table id="providers_table" class="theadcolor table table-striped table-hover table-checkable dataTable no-footer dtr-inline">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Ciudad</th>
                    <th>Teléfono</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/providers/index.js') }}"></script>
@endsection