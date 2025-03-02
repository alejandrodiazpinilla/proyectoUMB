@extends('layouts.app.app')
@section('titulo')
Condiciónes de Pago
@endsection
@section('content')
    <a href="#" data-toggle="modal" data-target="#modal_crear" class="btn btn-dark btn-elevate btn-pill" title="Crear">
        Agregar Condición de Pago
    </a>
    <hr>
    <div class="table-responsive">
        <table id="payments_table"
            class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
    @include('paymentconditions.partials.modals')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/paymentconditions/gestion.js') }}"></script>
@endsection
