<!--begin:Modal -->
<div class="modal fade" id="modal_crear" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form id="form_crear" data-toggle="validator" role ="form">
                <div style="background: #303c54;" class="modal-header">
                    <h5 class="modal-title text-white">Agregar Informe de Actividad CCTV</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="customer_id">Cliente</label>
                                {{ Form::select('customer_id', $clientes, null, ['class'=> 'form-control m-select2', 'id'=>'customer_id', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="previous_novelty">Novedad Anterior</label>
                                <input type="text" name="previous_novelty" id="previous_novelty" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="current_circuit">Circuito Actual</label>
                                <input type="text" name="current_circuit" id="current_circuit" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="number_cameras">Cantidad de Cámaras</label>
                                <input type="number" minlength="1" maxlength="10" name="number_cameras" pattern="" id="number_cameras" class="form-control" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="current_damage">Daño Actual</label>
                                <textarea name="current_damage" id="current_damage" class="form-control" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="quotationFile">Cotización</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input form-control" id="quotationFile" name="quotationFile" lang="es" accept="application/pdf" style="cursor: pointer;" required>
                                    <label class="custom-file-label" for="logo" data-browse="PDF">
                                        Seleccione un archivo
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <fieldset class="form-group">
                                    <label for="next_visit_date">Fecha Próxima Visita</label>
                                    <div class="input-group">
                                      <span class="input-group-prepend">
                                        <span class="input-group-text">
                                          <i class="fa fa-calendar"></i>
                                        </span>
                                      </span>
                                      <input type="text" autocomplete="off" class="form-control" alt="next_visit_date" name="next_visit_date" id="next_visit_date" placeholder="aaaa-mm-dd">
                                    </div>
                                  </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="description">Observaciones Generales</label>
                                <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Registrar', array('class' => 'btn btn-success')) }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end:Modal -->

<!--begin:Modal -->
<div class="modal fade" id="modalGestionar" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form id="form_gestionar" data-toggle="validator" role ="form" enctype="multipart/form-data">
                <div style="background: #303c54;" class="modal-header">
                    <h5 style="color: #FFF" class="modal-title">Gestionar Informe</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="customer_id_edit" id="customer_id_edit">
                    <div class="row modal-footer">
                        <div class="col-md">
                            <label>Cliente:</label>
                        </div>
                        <div class="col-md text-center">
                            <strong id="lblCliente"></strong>
                        </div>
                        <div class="col-md">
                            <label>Novedad Anterior:</label>
                        </div>
                        <div class="col-md text-center">
                            <strong id="lblNovedadAnterior"></strong>
                        </div>
                    </div>
                    <div class="row modal-footer">
                        <div class="col-md">
                            <label>Circuito Actual:</label>
                        </div>
                        <div class="col-md text-center">
                            <strong id="lblCircuito"></strong>
                        </div>
                        <div class="col-md">
                            <label>Cantidad de Cámaras:</label>
                        </div>
                        <div class="col-md text-center">
                            <strong id="lblCamaras"></strong>
                        </div>
                    </div>
                    <div class="row modal-footer">
                        <div class="col-md">
                            <label>Daño Actual:</label>
                            <strong id="lblDano"></strong>
                        </div>
                    </div>
                    <div class="row modal-footer">
                        <div class="col-md">
                            <label>Observación General:</label>
                            <strong id="lblObs"></strong>
                        </div>
                    </div>
                    <div class="row  modal-footer">
                        @if(Auth::user()->hasrole('root') || Auth::user()->can('actualizar_cctv'))
                        <div class="col-md sinCotizacion">
                            <div class="form-group">
                                <label for=">quotationFile2">Cotización</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input form-control" id="quotationFile2" name="quotationFile2" lang="es" accept="application/pdf" style="cursor: pointer;">
                                    <label class="custom-file-label" for="logo" data-browse="PDF">
                                        Seleccione un archivo
                                    </label>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="col-md conCotizacion">
                            <div class="form-group">
                                <label>Cotización: </label>
                                <strong id="lblQuotation"></strong>
                                <i class="fa fa-file-pdf-o text-primary p-2 pointer btnDescargarPDF" title="Descargar"></i>
                                @if(Auth::user()->hasrole('root') || Auth::user()->can('actualizar_cctv'))
                                <i class="icons cui-trash text-danger p-2 pointer btnEliminarPDF" title="Eliminar"></i>
                                @endif
                            </div>
                        </div>
                        @if(Auth::user()->hasrole('root') || Auth::user()->can('actualizar_cctv'))
                        <div class="col-md-6 hiddenFecha">
                                <div class="form-group">
                                    <fieldset class="form-group">
                                        <label for="next_visit_date_edit">Programar Fecha de Visita</label>
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </span>
                                            <input type="text" autocomplete="off" class="form-control" name="next_visit_date_edit" id="next_visit_date_edit" placeholder="aaaa-mm-dd" required>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    @if(Auth::user()->hasrole('root') || Auth::user()->can('actualizar_cctv'))
                    {{ Form::submit('Actualizar', array('class' => 'btn btn-success')) }}
                    @endif
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end:Modal -->