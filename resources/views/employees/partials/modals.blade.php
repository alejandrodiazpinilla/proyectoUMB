<div class="modal fade" id="modal_contratos" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div style="background: #303c54;" class="modal-header">
                <h5 class="modal-title text-white">Gestionar Contratos</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                @if(Auth::user()->hasrole('root') || Auth::user()->can('crear_contrato'))
                <div id="accordion" role="tablist">
                    <div class="card mb-0">
                        <div class="card-header" id="headingOne" role="tab">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#crearContrato" aria-expanded="false"
                                    aria-controls="crearContrato" class="collapsed arrows">Registrar Contrato
                                    <i class="pull-right fa fa-chevron-circle-down"></i>
                                </a>
                            </h5>
                        </div>
                        <form class="m-form m-form--fit m-form--label-align-right" id="formCrearContrato">
                            <div class="collapse" id="crearContrato" role="tabpanel" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="card-body">
                                    {{ csrf_field() }}
                                    <input type="hidden" id="employe_id" name="employe_id">
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label>Fecha Inicial</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control" name="start_date"
                                                        id="start_date" autocomplete="off" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label>Fecha Final</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control" name="end_date"
                                                        id="end_date" autocomplete="off" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label for="position">Cargo</label>
                                                <input type="text" class="form-control" id="position" name="position"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label for="schedule">Horario</label>
                                                <input type="text" class="form-control" id="schedule" name="schedule"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label for="archivo">Contrato</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input form-control"
                                                        id="archivo" name="archivo" lang="es" style="cursor: pointer;"
                                                        accept="application/pdf" required>
                                                    <label class="custom-file-label" for="archivo" data-browse="PDF">
                                                        Seleccione un archivo
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label for="anexos">Documentos Anexos</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input form-control"
                                                        id="anexos" name="anexos[]" lang="es" style="cursor: pointer;"
                                                        accept="application/pdf, image/png, image/jpg, , application/msword"
                                                        multiple required>
                                                    <label class="custom-file-label" for="anexos"
                                                        data-browse="Seleccione">
                                                        Seleccione archivos
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="staff_request_id">Solicitud de Personal</label>
                                                {{ Form::select('staff_request_id', $solicitudes, null, ['class'=>
                                                'form-control select2-single', 'id'=>'staff_request_id', 'required' =>
                                                'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    {{ Form::submit('Registrar', array('class' => 'btn btn-success','id'=>'crear')) }}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
                <div class="row modal-footer" style="border-top: 0px solid !important;">
                    <div class="col-md">
                        <div class="table-responsive">
                            <table id="contracts_table"
                                class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline mb-0 "
                                cellspacing="0" style="white-space: inherit!important;">
                                <thead>
                                    <tr>
                                        <th class="thWhite">Fecha Inicio</th>
                                        <th class="thWhite">Fecha Fin</th>
                                        <th class="thWhite">Cargo</th>
                                        <th class="thWhite">Horario</th>
                                        <th class="thWhite">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>