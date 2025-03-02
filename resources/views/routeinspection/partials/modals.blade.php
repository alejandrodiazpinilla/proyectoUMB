<!--begin:Modal -->
<div class="modal fade" id="modalVerInspeccion" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form id="formVerInspeccion" data-toggle="validator" role="form">
                <div style="background: #303c54;" class="modal-header">
                    <h5 class="modal-title text-white">Ver Inspección de Ruta</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" id="id_cliente" name="id_cliente">
                    <input type="hidden" id="id" name="id">
                    <div class="row modal-footer">
                        <div class="col-md">
                            <label>Foto Inicial:</label>
                        </div>
                        <div class="col-md text-center">
                            <img id="lblImage1" style="width: 50%">
                        </div>
                        <div class="col-md">
                            <label>Foto Final:</label>
                        </div>
                        <div class="col-md text-center">
                            <img id="lblImage2" style="width: 50%">
                        </div>
                    </div>
                    <div class="row modal-footer">
                        <div class="col-md">
                            <label>Fecha de Creación:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblFechaI"> </strong>
                        </div>
                        <div class="col-md">
                            <label>Fecha de Finalización:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblFechaF"> </strong>
                        </div>
                    </div>
                    <div class="row modal-footer">
                        <div class="col-md">
                            <label>Cliente:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblCliente"> </strong>
                        </div>
                        <div class="col-md">
                            <label>Realizado por:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblUsuario"></strong>
                        </div>
                    </div>
                    <div class="row modal-footer" style="border-top: 0px solid !important;">
                        <div class="col-md">
                            <div class="table-responsive" style="max-height:300px;">
                                <table id="tablePresGuarda" class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline mb-0" cellspacing="0" style="white-space: inherit!important;">
                                    <thead>
                                        <tr>
                                            <th class="thWhite">Guarda</th>
                                            <th class="thWhite">Carnet</th>
                                            <th class="thWhite">Escarapela</th>
                                            <th class="thWhite">Gorra o Quepis</th>
                                            <th class="thWhite">Presentación Personal</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row modal-footer" style="border-top: 0px solid !important;">
                        <div class="col-md">
                            <div class="table-responsive" style="max-height:300px;">
                                <table id="tableMinuta" class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline mb-0" cellspacing="0" style="white-space: inherit!important;">
                                    <thead>
                                        <tr>
                                            <th class="thWhite">Visitantes</th>
                                            <th class="thWhite">Correspondencia</th>
                                            <th class="thWhite">Puesto</th>
                                            <th class="thWhite">Parqueadero</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id="lblVisitantes"></td>
                                            <td id="lblCorrespondencia"></td>
                                            <td id="lblPuesto"></td>
                                            <td id="lblParqueadero"></td>
                                        </tr>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row modal-footer divRevi">
                        <div class="col-md">
                            <label>Tema (Informe REVI):</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblTema"> </strong>
                        </div>
                        <div class="col-md">
                            <label>Descripción:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblDescripcion"></strong>
                        </div>
                    </div>
                    <div class="row divImagenes divRevi"></div>
                    @if (Auth::user()->hasrole('root') || Auth::user()->can('cargar_pdf_inspeccion_ruta'))
                    <div class="row modal-footer divRevi cagarPDF" hidden>
                        <div class="col-md divImgRevi">
                            <div class="form-group">
                                <label for="pdf_report_revi">Cargar Informe PDF</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input form-control" id="pdf_report_revi" name="pdf_report_revi" lang="es" accept="application/pdf" style="cursor: pointer;">
                                    <label class="custom-file-label" for="logo" data-browse="PDF">
                                        Seleccione un archivo
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md divImgRevi">
                            <div class="form-group">
                                <label for="check_risk">Enviar Por Email</label>
                                <div>
                                    <label class="switch switch-label switch-pill switch-outline-success-alt">
                                        <input class="switch-input" type="checkbox" id="check_risk" name="check_risk">
                                        <span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="row modal-footer descagarPDF" hidden>
                        <div class="col-md-12">
                            <i class="fa fa-file-pdf-o text-dark fa-2x m-2 btnDescargarPDF" style="cursor:pointer" title="Descargar PDF"></i>
                            @if (Auth::user()->hasrole('root') || Auth::user()->can('cargar_pdf_inspeccion_ruta'))
                            <i class="fa fa-trash-o text-danger fa-2x m-2 btnEliminarPDF" style="cursor:pointer" title="Eliminar PDF"></i>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        @if (Auth::user()->hasrole('root') || Auth::user()->can('cargar_pdf_inspeccion_ruta'))
                        <input type="submit" class="btn btn-success" value="Registrar" id="registrar"/>
                        @endif
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end:Modal -->