<div class="modal fade" id="modal_crear" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_crear" data-toggle="validator" role="form" enctype="multipart/form-data">
                <div style="background: #303c54;" class="modal-header">
                    <h5 class="modal-title text-white">Agregar Desvinculación</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="retirement_type_id">Tipo Desvinculación</label>
                                {{ Form::select('retirement_type_id', $tipoRetiro, null, ['class' => 'form-control
                                select2-single', 'id' => 'retirement_type_id', 'required' => 'true', 'placeholder' =>
                                'Seleccione...', 'style' => 'width:100%;']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="company_id">Empresa</label>
                                {{ Form::select('company_id', $empresas, null, ['class' => 'form-control
                                select2-single', 'id' => 'company_id', 'required' => 'true', 'placeholder' =>
                                'Seleccione...', 'style' => 'width:100%;']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="identification">Identificación</label>
                                <input type="number" minlength="6" maxlength="10" name="identification" pattern=""
                                    id="identification" class="form-control" placeholder="Identificación"
                                    title="6 a 10 caracteres" required
                                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre_trabajador">Nombre</label>
                                <input type="text" id="nombre_trabajador" class="form-control"
                                    pattern="[a-zA-ZñÑáéíóúüÁÉÍÓÚÜ ]{4,100}" disabled readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email_trabajador">Email</label>
                                <input type="email" id="email_trabajador" class="form-control" disabled readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telefono_trabajador">Teléfono</label>
                                <input type="number" minlength="7" maxlength="10" id="telefono_trabajador"
                                    class="form-control" disabled readonly
                                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <fieldset class="form-group">
                                    <label>Último Día de Trabajo</label>
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </span>
                                        <input type="text" autocomplete="off" class="form-control" alt="retirement_date"
                                            name="retirement_date" id="retirement_date" placeholder="aaaa-mm-dd">
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customer_id">Cliente</label>
                                {{ Form::select('customer_id', $clientes, null, ['class' => 'form-control
                                select2-single', 'id' => 'customer_id', 'placeholder' => 'Seleccione...', 'style' =>
                                'width:100%;']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="attached">Adjunto</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input form-control" id="attached"
                                        name="attached" lang="es" style="cursor: pointer;">
                                    <label class="custom-file-label" for="attached" data-browse="Seleccionar">
                                        Seleccione un archivo
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="customer_id">Observación</label>
                                <textarea id="description" class="form-control" name="description" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        {{ Form::submit('Registrar', ['class' => 'btn btn-primary']) }}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalVerSeguimiento" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div style="background: #303c54;" class="modal-header">
                <h5 class="modal-title text-white">Ver Seguimiento</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="lblTrabajador">Trabajador</h4>
                <hr>
                <div class="container mt-3 mb-3">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <ul class="timeline">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalVerDetalle" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="formDetalle" data-toggle="validator" role="form" enctype="multipart/form-data">
                <div style="background: #303c54;" class="modal-header">
                    <h5 class="modal-title text-white">Ver Detalle</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="id">
                    <div class="row modal-footer">
                        <div class="col-md">
                            <label>Empleado:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblEmpleado"> </strong>
                        </div>
                        <div class="col-md">
                            <label>Cliente:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblCliente"></strong>
                        </div>
                    </div>
                    <div class="row modal-footer">
                        <div class="col-md">
                            <label>Fecha de Retiro:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblFecha"> </strong>
                        </div>
                        <div class="col-md">
                            <label>Tipo de Retiro:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblTipo"> </strong>
                        </div>
                    </div>
                    <div class="row modal-footer">
                        <div class="col-md">
                            <label>Estado Actual:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblEstado"> </strong>
                        </div>
                    </div>
                    <div class="row modal-footer sinAdjunto" hidden>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Adjuntos: </label>
                                <strong id="lblAdjuntos"></strong>
                                <i class="fa fa-file-pdf-o text-primary p-2 pointer btnDescargarPDF" title="Descargar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>