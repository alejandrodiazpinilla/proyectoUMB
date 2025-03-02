@extends('layouts.app.app')
@section('titulo')Certificados @endsection
@section('content')
<h5 class="text-muted">Certificado Laboral y Desprendibles de Pago</h5 class="text-muted">
<hr>
<div class="row">
    <div class="col-md-2">
        <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-certificate-list" data-toggle="tab"
                href="#list-certificate" role="tab" aria-controls="list-certificate" aria-selected="true">
                <i class="icon-like"></i> Certificado Laboral
            </a>
            <a class="list-group-item list-group-item-action" id="list-load-payroll-list" data-toggle="tab"
                href="#list-load-payroll" role="tab" aria-controls="list-load-payroll">
                <i class="cui-cloud-upload"></i> Cargar Nómina
            </a>
            <a class="list-group-item list-group-item-action" id="list-payment-slips-list" data-toggle="tab"
                href="#list-payment-slips" role="tab" aria-controls="list-payment-slips">
                <i class="icon-wallet"></i> Desprendibles de Pago
            </a>
        </div>
    </div>
    <div class="col-md-10">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade active show" id="list-certificate" role="tabpanel"
                aria-labelledby="list-certificate-list">
                <div class="col-md-4 mx-auto">
                    <div class="form-group">
                        <input type="number" minlength="6" maxlength="10" min="50000" name="cedula" id="cedula"
                            class="form-control blockNums" placeholder="Número de Documento" title="6 a 11 caracteres"
                            pattern="[0-9]"
                            oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)"
                            onkeypress="if (this.value == 'e') return false" />
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="table_certificates"
                        class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline">
                        <thead>
                            <tr>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Cargo</th>
                                <th>Descargar</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="list-load-payroll" role="tabpanel" aria-labelledby="list-load-payroll-list">
                <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                    <i class="fa fa-file-excel-o text-success"></i>
                    Por Favor descargue la plantilla gía dando
                    <a class="alert-link" href="{{ route('plantillaMasivo') }}" target="_blank">click aquí</a>.
                </div>
                <form class="text-center" id="form-nomina" enctype="multipart/form-data">
                    @csrf
                    <button type="button" class="btn btn-dark btnCargar mt-1">Seleccione archivo <i
                            class="fa fa-file-excel-o"></i></button>
                    <input type="file" name="csv" id="csv" accept=".xlsx" hidden>
                    <button type="reset" class="btn btn-danger btnReset mt-1">Eliminar Archivo</button>
                    <input type="submit" class="btn btn-success btnImportar mt-1" value="Importar" disabled>
                </form>
                <div class="table-responsive">
                    <table id="table_errors"
                        class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline text-center mt-4 divHidden"
                        hidden>
                        <thead>
                            <tr>
                                <th>Campo</th>
                                <th>Error(es)</th>
                                <th>Fila</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="list-payment-slips" role="tabpanel"
                aria-labelledby="list-payment-slips-list">
                <div class="row justify-content-center">
                    <div class="col-md-4 mt-2">
                        <input type="text" class="form-control datepick" name="mesAnio" id="datepickerMonthYear" autocomplete="off" placeholder="Mes y año"/>
                    </div>
                    <div class="col-md-4 mt-2">
                        <div class="form-group">
                            <input type="number" minlength="6" maxlength="10" min="50000" name="identificacion"
                                id="identificacion" class="form-control blockNums" placeholder="Número de Documento"
                                title="6 a 11 caracteres" pattern="[0-9]"
                                oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)"
                                onkeypress="if (this.value == 'e') return false" />
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="table_desprendibles"
                        class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline">
                        <thead>
                            <tr>
                                <th>Mes</th>
                                <th>Año</th>
                                <th>Descargar</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/xlsx.full.min.js')}}"></script>
<script src="{{ asset('js/certificates/index.js') }}"></script>
@endsection