<!--begin:Modal -->
<div class="modal fade" id="modalVerNovedad" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="formGestionar" data-toggle="validator" role ="form" enctype="multipart/form-data">
                <div style="background: #303c54;" class="modal-header">
                    <h5 class="modal-title text-white">Ver Novedad</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="id">
                    <div class="row labelCambioTurno modal-footer" hidden>
                        <div class="col-md">
                            <label>Tipo Novedad:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblTipoNovedad"> </strong>
                        </div>
                        <div class="col-md">
                            <label>Jornada:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblJornada"></strong>
                        </div>
                    </div>
                    <div class="row labelCambioTurno modal-footer" hidden>
                        <div class="col-md">
                            <label>Nombres Guarda Entrante:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblEntrante"> </strong>
                        </div>
                        <div class="col-md">
                            <label>Nombres Guarda Saliente:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblSaliente"> </strong>
                        </div>
                    </div>
                   <div class="row labelNovedadServicio modal-footer" hidden>
                        <div class="col-md">
                            <label>Tipo Novedad:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblTipoNovedad2"> </strong>
                        </div>
                        <div class="col-md">
                            <label>Novedad:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblNovedad"> </strong>
                        </div>
                    </div>
                   <div class="row labelNovedadServicio modal-footer" hidden>
                        <div class="col-md">
                            <label>Nombre Afectado:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblAfectado"> </strong>
                        </div>
                        <div class="col-md">
                            <label>Torre/Casa/Apto:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblVivienda"></strong>
                        </div>
                    </div>
                    <div class="row modal-footer">
                        <div class="col-md">
                            <label>Registrada Por:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblGuarda"> </strong>
                        </div>
                        <div class="col-md">
                            <label>Descripción de la Novedad:</label>
                        </div>
                        <div class="col-md">
                            <strong  id="lblDescription"></strong>
                        </div>
                    </div>
                    <div class="row labelNovedadServicio modal-footer" hidden>
                        <div class="col-md-6 col-lg-6 col-xl-6 mx-auto">
                            <img id="lblImage" style="width: 100%">
                        </div>
                    </div>
                    <div class="row modal-footer divGestionado">
                        <div class="col-md">
                            <label>Gestionado Por:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblGestionado"> </strong>
                        </div>
                        <div class="col-md">
                            <label>Observacion de la Gestión:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblObservacion"></strong>
                        </div>
                    </div>
                    @if (Auth::user()->hasrole('root') || Auth::user()->can('gestionar_novedad_guarda'))
                        <div class="row divGestionar modal-footer">
                            <div class="col-md">
                                <textarea name="observation" id="observation" rows="3" class="form-control" placeholder="Detalle de la gestión" required></textarea>
                            </div>
                        </div>
                    @endif
                    <div class="modal-footer">
                        @if (Auth::user()->hasrole('root') || Auth::user()->can('gestionar_novedad_guarda'))
                        {{ Form::submit('Registrar', array('class' => 'btn btn-success divGestionar')) }}
                        @endif
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end:Modal -->