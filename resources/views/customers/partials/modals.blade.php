<!--begin:Modal -->
<div class="modal fade" id="modalVerCliente" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="formVerCliente" data-toggle="validator" role="form">
                <div style="background: #303c54;" class="modal-header">
                    <h5 class="modal-title text-white">Ver Cliente</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="row modal-footer">
                        <div class="col-md text-center">
                            <img id="lblImage" style="width: 20%">
                        </div>
                    </div>
                    <div class="row modal-footer">
                        <div class="col-md">
                            <label>Fecha Inicio de Contrato:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblini_contrato"> </strong>
                        </div>
                        <div class="col-md">
                            <label>Fecha Fin de Contrato</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblfin_contrato"></strong>
                        </div>
                    </div>
                    <div class="row modal-footer">
                        <div class="col-md">
                            <label>Nombre:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblname"> </strong>
                        </div>
                        <div class="col-md">
                            <label>Nombre del Administrador:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lbladmin_name"></strong>
                        </div>
                    </div>
                    <div class="row modal-footer">
                        <div class="col-md">
                            <label>Teléfono de Contacto:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblphone"> </strong>
                        </div>
                        <div class="col-md">
                            <label>Email:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblemail"> </strong>
                        </div>
                    </div>
                    <div class="row labelClienteServicio modal-footer">
                        <div class="col-md">
                            <label>Dirección:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lbladdress"> </strong>
                        </div>
                        <div class="col-md">
                            <label> Ciudad/Municipio:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblcity_name"></strong>
                        </div>
                    </div>
                    <div class="row modal-footer">
                        <div class="col-md">
                            <label>Localidad:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lbllocalidad"></strong>
                        </div>
                        <div class="col-md">
                            <label>Barrio:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblneighborhood_name"></strong>
                        </div>
                    </div>
                    <div class="row modal-footer">
                        <div class="col-md">
                            <label>Descripción de Necesidades:</label>
                        </div>
                    </div>
                    <div class="row modal-footer" style="border-top: 0px solid !important;">
                        <div class="col-md">
                            <strong id="lblresidential_units"></strong>
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
<!--end:Modal -->

<!--begin:Modal -->
<div class="modal fade" id="modalSeguimiento" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="formSeguimiento" data-toggle="validator" role="form">
                <div style="background: #303c54;" class="modal-header">
                    <h5 class="modal-title text-white">Seguimiento</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" id="id">
                    <div class="form-row form-group">
                        <label class="col-form-label col-sm-3"> ¿Enviar Brochure? </label>
                        <div class="col-sm-3" data-toggle="tooltip" data-html="true"
                            title="Se enviará email al cliente con el Brochure de la compañía">
                            <label class="switch switch-label switch-pill switch-outline-success-alt">
                                <input class="switch-input" type="checkbox" id="check_brochure" name="check_brochure">
                                <span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
                            </label>
                        </div>
                        <label class="col-form-label col-sm-3"> ¿Programar Visita? </label>
                        <div class="col-sm-3">
                            <label class="switch switch-label switch-pill switch-outline-success-alt">
                                <input class="switch-input" type="checkbox" id="check_visita" name="check_visita">
                                <span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md hiddenEmail" hidden>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md hiddenFecha" hidden>
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
                                            name="date_of_visit" id="date_of_visit"
                                            placeholder="aaaa-mm-dd">
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="form-row form-group ventaConcretada"></div>
                    <div class="row">
                        <div class="col-md">
                            <label>Observaciones</label>
                            <textarea name="obs" id="obs" rows="3" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="row modal-footer" style="border-top: 0px solid !important;">
                        <div class="col-md">
                            <div class="table-responsive" style="max-height:300px;">
                                <table id="tracing_table"
                                    class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline mb-0 "
                                    cellspacing="0" style="white-space: inherit!important;">
                                    <thead>
                                        <tr>
                                            <th class="thWhite">Envió Brochure</th>
                                            <th class="thWhite">Fecha Ejecución</th>
                                            <th class="thWhite">Email</th>
                                            <th class="thWhite">Fecha Visita</th>
                                            <th class="thWhite">Observaciones</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        @if (Auth::user()->hasrole('root') || Auth::user()->can('crear_seguimiento_cliente'))
                        {{ Form::submit('Registrar', ['class' => 'btn btn-success']) }}
                        @endif
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end:Modal -->

<!--begin:Modal -->
<div class="modal fade" id="modalAdjuntos" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form id="formAdjuntos" data-toggle="validator" role="form">
                <div style="background: #303c54;" class="modal-header">
                    <h5 class="modal-title text-white">Adjuntos</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="modal-body col-md-12">
                        <div class="table-responsive">
                            <table id="attachments_table"
                                class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Fecha de Envío</th>
                                        <th>Año</th>
                                        <th>Tipo</th>
                                        <th>Fecha de Creación</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
<!--end:Modal -->
