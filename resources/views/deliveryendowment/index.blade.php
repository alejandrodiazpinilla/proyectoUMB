@extends('layouts.app.app')
@section('titulo')Entrega Dotación @endsection
@section('content')
<div>
    @if (Auth::user()->hasrole('root') || Auth::user()->can('crear_entrega_dotacion'))
    <a href="#" data-toggle="modal" data-target="#modal_crear" class="btn btn-dark btn-pill" title="Crear">
        <span><i class="la la-plus"></i><span>Agregar</span></span>
    </a>
    <hr>
    @endif
    <div class="table-responsive">
        <table id="delivery_endowment_table" class="theadcolor table table-striped table-hover table-checkable dataTable no-footer dtr-inline">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Trabajador</th>
                    <th>Fecha Creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
        @include('deliveryendowment.partials.modals')
    </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/deliveryendowment/gestion.js') }}"></script>  
<script src="{{ asset('js/deliveryendowment/sketchpad.js') }}"></script>  
@endsection