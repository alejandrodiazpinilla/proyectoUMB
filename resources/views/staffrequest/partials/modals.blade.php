<!--begin:Modal -->
<div class="modal fade" id="modal_editar" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_editar" data-toggle="validator" role ="form">
                <input type="hidden" id="id" name="id">
                <div style="background: #303c54;" class="modal-header">
                    <h5 class="modal-title text-white">Agregar Candidatos</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="hiddenSection">
                        <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="identification">Número de Documento</label>
                                <input autofocus type="number" minlength="6" maxlength="10" min="50000" name="identification" id="identification" class="form-control blockNums" title="6 a 11 caracteres" pattern="[0-9]" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)" onkeypress="if (this.value == 'e') return false" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="name">Nombre Completo</label>
                                <input class="form-control blockText" name="name" id="name" autocomplete="off"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="telephone">Teléfono</label>
                                <input type="number" minlength="7" maxlength="10" min="2000000" name="telephone" id="telephone" class="form-control blockNums" title="7 a 10 caracteres" pattern="[0-9]" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)" onkeypress="if (this.value == 'e') return false" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" autocomplete="off"/>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="jsonTable" id="jsonTable">
                    <div class="row col-md-3 mx-auto">
                        <input class="btn btn-success" id="agregarcandidato" type="button" value="Agregar" style="width: 100%;">
                    </div>
                </div>
                    <div class="row" style="border-top: 0px solid !important;">
                        <div class="col-md">
                            <div class="table-responsive">
                                <table id="candidates_table"
                                    class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline mb-0 "
                                    cellspacing="0" style="white-space: inherit!important;">
                                    <thead>
                                        <tr>
                                            <th class="thWhite">Identificación</th>
                                            <th class="thWhite">Nombre</th>
                                            <th class="thWhite">Teléfono</th>
                                            <th class="thWhite">Email</th>
                                            <th class="thWhite">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id='bodycandidatos'></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        {{ Form::submit('Guardar', array('class' => 'btn btn-success btnGuardar')) }}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end:Modal -->