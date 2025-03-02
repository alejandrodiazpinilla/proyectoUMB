<div class="modal fade" id="modal_crear" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div style="background: #303c54;" class="modal-header">
                <h5 class="modal-title text-white lblTitulo">Agregar Capacitación</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="form_crear" data-toggle="validator" role ="form" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <fieldset class="form-group">
                                    <label for="fecha">Fecha</label>
                                    <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                        </span>
                                    </span>
                                    <input type="text" autocomplete="off" class="form-control" alt="fecha"name="fecha" id="fecha" required placeholder="Fecha Programada">
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="hora">Hora </label>
                                <input type="time" name="hora" id="hora" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="nro_participants"># de Participantes</label>
                                <input type="number" min="2" minlength="1" maxlength="3" name="nro_participants" pattern="" id="nro_participants" class="form-control blockNums" placeholder="# de Participantes" required oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="entity_id">Entidad de Formación</label>
                                {{ Form::select('entity_id', $entidades, null, ['class'=> 'form-control select2-single', 'id'=>'entity_id', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
                            </div>
                        </div>
                        <div class="col-md">
                            <label for="type">Tipo</label>
                            <div class="form-group">
                              <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="radioLink" name="type" class="custom-control-input radioLinkDir" value="Link" required>
                                <label class="custom-control-label" for="radioLink">Link</label>
                              </div>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="radioDir" name="type" class="custom-control-input radioLinkDir" value="Dirección" required>
                                <label class="custom-control-label" for="radioDir">Dirección</label>
                              </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="linkDir">Link / Dirección</label>
                                <input type="text" name="linkDir" id="linkDir" class="form-control" placeholder="Link o dirección según el caso" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="topic">Tema</label>
                                <input type="text" name="topic" id="topic" class="form-control" placeholder="Tema" required/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <textarea name="description" id="description" class="form-control" placeholder="Descripción" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 shadow p-3 mb-5 bg-white rounded">
                        <div class="divParticipantes">
                        <div class="row">
                            <h5 class="ml-3">Agregar Participantes</h5>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="cedula">Cédula</label>
                                    <input type="number" min="1000000" minlength="7" maxlength="10" name="cedula" pattern="" id="cedula" class="form-control blockNums" placeholder="Cedula" title="7 a 10 caracteres" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" id="nombre" class="form-control blockText" readonly disabled>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" class="form-control" readonly disabled>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="jsonTableParti" id="jsonTableParti">
                        <div class="text-center">
                            <input class="btn btn-success" id="agregarParticipante" type="button" value="Agregar">
                        </div>
                        <hr style="margin-bottom: 33px; border: 1px solid; margin-top: 3%;">
                        <br>
                        </div>
                        <div class="kt-section">
                            <div class="kt-section__content">
                                <div class="table-responsive">
                                    <table id="tableParticipantes" class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline">
                                        <thead>
                                            <tr>
                                                <th>Cédula</th>
                                                <th>Nombre</th>
                                                <th>Email</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="bodyParticipantes"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        {{ Form::submit('Registrar', array('class' => 'btn btn-success','id'=>'btnRegistrar')) }}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>