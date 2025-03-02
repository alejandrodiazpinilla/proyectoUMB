<style>
    .mw-50px{
        max-width: 50px;
    }
</style>
<div class="modal fade" id="modal_pagar" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="formPagar" data-toggle="validator" role ="form">
                {{csrf_field()}}
                    <input type="hidden" name="id" id="id">
                <div style="background: #303c54;" class="modal-header">
                    <h5 class="modal-title text-white">Registrar Pago</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <fieldset class="form-group">
                                    <label for="payment_date">Fecha de Pago</label>
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </span>
                                        <input type="text" class="form-control" autocomplete="off" name="payment_date"
                                            id="payment_date" required onkeydown="return false;">
                                    </div>
                                </fieldset>
                            </div>

                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="invoice_number">N° Factura</label>
                              <input type="text" class="form-control" name="invoice_number" id="invoice_number" required>
                            </div>
                          </div>
                          <div class="col-md-6">
                              <label>Adjuntos</label>
                            <div class="form-group">
                                <div class="btn-group w-100" role="group">
                                    <div class="btn btn-secondary btnArchivo" type="button">
                                        <label class="lblArchivo pointer">Seleccione...</label>
                                    </div>
                                    <input type="file" id="archivo" name="archivo" hidden>
                                    <a class="btn btn-dark mw-50px btnDownload" download type="button">
                                        <i class="fa fa-download"></i>
                                    </a>
                                </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="observation">Observación</label>
                              <textarea class="form-control" name="observation" id="observation" rows="3"></textarea>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Registrar', array('class' => 'btn btn-success','id'=>'crearPago')) }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCerrar">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>