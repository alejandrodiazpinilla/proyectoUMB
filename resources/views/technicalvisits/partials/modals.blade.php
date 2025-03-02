<!--begin:Modal -->
<div class="modal fade" id="modal_crear" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_crear" data-toggle="validator" role="form">
                <div style="background: #303c54;" class="modal-header">
                    <h5 class="modal-title text-white">Agregar Visita Técnica</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="visit_type_id">Tipo de Visita</label>
                                {{ Form::select('visit_type_id', $tiposVisitas, null, ['class' => 'form-control m-select2', 'id' => 'visit_type_id', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style' => 'width:100%;']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <fieldset class="form-group">
                                    <label>Fecha de Visita</label>
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </span>
                                        <input type="text" autocomplete="off" class="form-control"
                                            name="date_visit" id="date_visit"placeholder="aaaa-mm-dd" required>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Descripción</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Registrar', ['class' => 'btn btn-success', 'id' => 'crear']) }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end:Modal -->

<!--begin:Modal -->
<div class="modal fade" id="modalGestionar" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_gestionar" data-toggle="validator" role ="form" enctype="multipart/form-data">
                <div style="background: #303c54;" class="modal-header">
                    <h5 style="color: #FFF" class="modal-title">Gestionar Visita</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for=">check_acept_date">Aceptar Fecha</label>
                                    <label class="switch switch-label switch-pill switch-outline-success-alt">
                                        <input class="switch-input" type="checkbox" id="check_acept_date" name="check_acept_date">
                                        <span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
                                    </label>
                            </div>
                        </div>
                        <div class="col-md-6 hiddenFecha">
                            <div class="form-group">
                                <fieldset class="form-group">
                                    <label>Reprogramar Fecha de Visita</label>
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </span>
                                        <input type="text" autocomplete="off" class="form-control" name="new_date" id="new_date" placeholder="aaaa-mm-dd" required>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="observacion">Observación</label>
                            <textarea class="form-control" id="observacion" name="observacion" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Actualizar', array('class' => 'btn btn-success')) }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end:Modal -->