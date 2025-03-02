<!--begin:Modal -->
<div class="modal fade" id="modalVerNovedad" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="formVerNovedad" data-toggle="validator" role="form">
                <div style="background: #303c54;" class="modal-header">
                    <h5 class="modal-title text-white">Ver Novedad</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="row labelGuarda modal-footer" hidden>
                        <div class="col-md">
                            <label>Tipo Novedad:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblTipoNovedad"> </strong>
                        </div>
                        <div class="col-md">
                            <label>Novedad:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblNovedad"> </strong>
                        </div>
                    </div>
                    <div class="row labelGuarda modal-footer" hidden>
                        <div class="col-md">
                            <label>Nombres Guarda:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblGuarda"> </strong>
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
                            <strong id="lblNovedad2"> </strong>
                        </div>
                    </div>
                    <div class="row modal-footer">
                        <div class="col-md">
                            <label>Descripción de la Novedad:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblDescription"></strong>
                        </div>
                    </div>
                    <div class="row labelNovedadServicio modal-footer" hidden>
                        <div class="col-md-6 col-lg-6 col-xl-6 mx-auto">
                            <img id="lblImage" style="width: 100%">
                        </div>
                    </div>
                    <div class="row modal-footer divGestion" hidden>
                        <div class="col-md">
                            <label>Nombre de la Gestión:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblGestion"></strong>
                        </div>
                        <div class="col-md">
                            <label>Tipo:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblTipoGest"></strong>
                        </div>
                    </div>
                    <div class="row modal-footer divGestion" hidden>
                        <div class="col-md">
                            <label>Descripción de la Gestión:</label>
                        </div>
                        <div class="col-md">
                            <strong id="lblDescGest"></strong>
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
<div class="modal fade" id="modalGestionar" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div style="background: #303c54;" class="modal-header">
                <h5 class="modal-title text-white">Gestionar Novedad</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row labelGuardaG modal-footer" hidden>
                    <div class="col-md">
                        <label>Tipo Novedad:</label>
                    </div>
                    <div class="col-md">
                        <strong id="lblTipoNovedadG"> </strong>
                    </div>
                    <div class="col-md">
                        <label>Novedad:</label>
                    </div>
                    <div class="col-md">
                        <strong id="lblNovedadG"> </strong>
                    </div>
                </div>
                <div class="row labelGuardaG modal-footer" hidden>
                    <div class="col-md">
                        <label>Nombres Guarda:</label>
                    </div>
                    <div class="col-md">
                        <strong id="lblGuardaG"> </strong>
                    </div>
                </div>
                <div class="row labelNovedadServicioG modal-footer" hidden>
                    <div class="col-md">
                        <label>Tipo Novedad:</label>
                    </div>
                    <div class="col-md">
                        <strong id="lblTipoNovedad2G"> </strong>
                    </div>
                    <div class="col-md">
                        <label>Novedad:</label>
                    </div>
                    <div class="col-md">
                        <strong id="lblNovedad2G"> </strong>
                    </div>
                </div>
                <div class="row modal-footer">
                    <div class="col-md">
                        <label>Descripción de la Novedad:</label>
                    </div>
                    <div class="col-md">
                        <strong id="lblDescriptionG"></strong>
                    </div>
                </div>
                <div class="row labelNovedadServicioG modal-footer" hidden>
                    <div class="col-md-6 col-lg-6 col-xl-6 mx-auto">
                        <img id="lblImageG" style="width: 100%">
                    </div>
                </div>
                <form id="formGestionar" data-toggle="validator" role="form">
                    @csrf
                    <div class="row modal-footer">
                        <div class="col-md">
                            <div class="card">
                                <div class="card-header text-info">
                                    <h5>Gestionar</h5>
                                    <input type="hidden" id="action_type" name="action_type">
                                    <input type="hidden" id="id" name="id">
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="action_type_id">Nombre</label>
                                            {{ Form::select('action_type_id', $acciones, null, ['class'=> 'form-control
                                            m-select2', 'id'=>'action_type_id', 'required' => 'true', 'placeholder' =>
                                            'Seleccione...', 'style'=>'width:100%;']) }}
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Tipo</label>
                                            <label
                                                class="col-md-3 badge bg-warning rounded-pill p-2 text-withe action_type form-control"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description_action">Descripción</label>
                                        <textarea name="description_action" id="description_action" class="form-control"
                                            rows="2" placeholder="Descripción de la Gestión" Required></textarea>
                                    </div>
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
</div>
<!--end:Modal -->