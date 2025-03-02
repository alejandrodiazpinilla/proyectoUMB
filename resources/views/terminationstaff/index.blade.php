@extends('layouts.app.app')
@section('titulo')
Desvinculación de Personal
@endsection
@section('content')
@if (Auth::user()->hasrole('root') || Auth::user()->can('crear_desvinculacion'))
<a href="#" data-toggle="modal" data-target="#modal_crear" class="btn btn-dark btn-elevate btn-pill" title="Crear">
    <span>Agregar Desvinculación</span>
</a>
<hr>
@endif
@if(session()->has('mensajeError'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Ha ocurrido un error!: </strong> {{ session()->get('mensajeError') }}.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="table-responsive">
    <table id="terminationstaff_table"
        class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Cliente</th>
                <th>Estado</th>
                <th>Tipo Retiro</th>
                <th>Fecha Retiro</th>
                <th>Acciones</th>
            </tr>
        </thead>
    </table>
</div>
@if (Auth::user()->hasrole('root') || Auth::user()->can('exportar_desvinculacion'))
<hr>
<div id="accordion" role="tablist">
    <div class="card mb-0">
        <div class="card-header" id="headingOne" role="tab">
            <h5 class="mb-0">
                <a data-toggle="collapse" href="#reporteXLS" aria-expanded="false" aria-controls="reporteXLS"
                    class="collapsed arrows"> Reporte 
                    <i class="fa fa-file-excel-o"></i>
                    <i class="pull-right fa fa-chevron-circle-down"></i>
                </a>
            </h5>
        </div>
        <div class="collapse mx-auto" id="reporteXLS" role="tabpanel" aria-labelledby="headingOne"
            data-parent="#accordion" style="">
            <div class="card-body">
                <form class="m-form m-form--fit m-form--label-align-right" method="POST"
                    action="{{ route('generarReporte') }}" id="formReporte">
                    {{ csrf_field() }}
                    <div class="row mx-auto">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Fecha Inicial</label>
                                <div class="input-group m-input-group m-input-group--square">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control m-input" name="fecha_inicio_reporte"
                                        id="fecha_inicio_reporte" placeholder="Fecha de inicio de reporte"
                                        autocomplete="off" required value="{{old('fecha_inicio_reporte')}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Fecha Final</label>
                                <div class="input-group m-input-group m-input-group--square">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control m-input" name="fecha_fin_reporte"
                                        id="fecha_fin_reporte" placeholder="Fecha final de reporte" autocomplete="off"
                                        required value="{{old('fecha_fin_reporte')}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label style="opacity:0;">_</label>
                                <div>
                                    <button class="btn btn-success btn-elevate btn-pill" title="Exportar">
                                        <span><i class="fas fa-file-excel xs"></i><span> Exportar</span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
@include('terminationstaff.partials.modals')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/terminationstaff/gestion.js') }}"></script>
@endsection