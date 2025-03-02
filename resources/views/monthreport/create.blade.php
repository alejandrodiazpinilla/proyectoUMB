@extends('layouts.app.app')
@section('titulo') Crear Informe Mensual @endsection
@section('content')
    <form id="form_crear" data-toggle="validator" role="form" enctype="multipart/form-data">
        <div>
            <h5>Agregar Informe Mensual</h5>
            <hr>
        </div>
        <div class="modal-body">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <div class="form-group">
                        <fieldset class="form-group">
                            <label>Mes y Año</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </span>
                                <input type="text" class="form-control m-input" name="month_year"
                                    id="datepickerMonthYear" required autocomplete="off" placeholder="mes-año" />
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="col-md-4 mx-auto">
                    <div class="form-group">
                        <label for="company_id">Empresa</label>
                        {{ Form::select('company_id', $empresas, null, ['class' => 'form-control select2-single', 'id' => 'company_id', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style' => 'width:100%;']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label for="reason_report">1. Objeto del Informe: </label>
                        <textarea id="reason_report" class="form-control" name="reason_report" rows="3" required></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label for="report_scope">2. Alcance del Informe: </label>
                        <textarea id="report_scope" class="form-control" name="report_scope" rows="3" required></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label for="developed_activities">3. Documentos, Procesos y Actividades Desarrolladas:
                        </label>
                        <textarea id="developed_activities" class="form-control" name="developed_activities" rows="3" required></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label for="weaknesses">4. Debilidades: </label>
                        <textarea id="weaknesses" class="form-control" name="weaknesses" rows="3" required></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label for="strengths">5. Fortalezas: </label>
                        <textarea id="strengths" class="form-control" name="strengths" rows="3" required></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="indicator">6. Indicador: </label>
                        <textarea id="indicator" class="form-control" name="indicator" rows="3" required></textarea>
                    </div>
                </div>
                <div class="col-md">
                    <label for="check_indicator">Cumple: </label>
                    <div class="form-group">
                        <label class="switch switch-label switch-pill switch-outline-success-alt">
                            <input class="switch-input" type="checkbox" id="check_indicator" name="check_indicator" checked>
                            <span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label for="conclusions">7. Conclusiones: </label>
                        <textarea id="conclusions" class="form-control" name="conclusions" rows="3" required></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="form-group">
                        <label for="images_evidence">8. Evidencia Fotográfica: </label>
                        <div class="custom-file">
                            <input type="file" multiple="multiple" class="custom-file-input form-control"
                                id="images_evidence" name="images_evidence[]" accept="image/*" style="cursor: pointer;"
                                lang="es">
                            <label class="custom-file-label" for="images_evidence" data-browse="Seleccionar">
                                Seleccione una o más imagenes
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mx-auto">
                    <div class="form-group">
                        <label for="btn_images" style="color:#fff;">_</label>
                        <div class="text-center">
                            <input type="button" class="btn btn-primary" id="btn_images" name="btn_images"
                                value="Agregar">
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="jsonImages" id="jsonImages">
            <div class="row col-md-8 mx-auto">
                <div class="table-responsive dataTable">
                    <table id="tableImages" class="theadcolor table  table-bordered">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="bodyImages">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                {{ Form::submit('Registrar', ['class' => 'btn btn-success']) }}
                <a href="{{ route('monthreport.index') }}" type="button" class="btn btn-secondary">Regresar</a>
            </div>
    </form>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/monthreport/gestion.js') }}"></script>
@endsection
