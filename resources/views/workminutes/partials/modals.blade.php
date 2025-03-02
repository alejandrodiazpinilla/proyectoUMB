<!--begin:Modal -->
<div class="modal fade" id="modal_crear" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form id="form_crear" data-toggle="validator" role ="form" enctype="multipart/form-data">

                <div style="background: #303c54;" class="modal-header">
                    <h5 class="modal-title text-white">Agregar Reunión</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="consecutivo">Consecutivo:</label>
                                <input type="number" name="consecutivo" id="consecutivo" class="form-control" placeholder="Consecutivo ácta" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="Fecha">Fecha Ejecución:</label>
                                <input type="date" name="fecha" id="fecha" class="form-control" placeholder="Fecha De Acta" max="{{ $maxDate }}" required/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="area">Área:</label>
                                <select name="area" id="area" class="form-control m-select2" required>
                                    <option value="{{ null }}" selected hidden disabled>Seleccione</option>
                                    @foreach ($areas as $id => $area)
                                    <option value="{{ $id }}">{{ $area }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tema">Tema</label>
                                <input type="text" name="tema" id="tema" class="form-control" placeholder="Tema" required/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lugar">Lugar</label>
                                <input type="text" name="lugar" id="lugar" class="form-control" placeholder="Lugar" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lider">Liderada por:</label>
                                <select name="lider" id="lider" class="form-control m-select2" required>
                                    <option value="{{ null }}" selected hidden disabled>Seleccione</option>
                                    {{-- <option value="{{ $usuario->id }}">{{ $usuario->name }}</option> --}}
                                    @foreach ($usuarios as $id => $usuario)
                                    <option value="{{ $id }}">{{ $usuario }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inicio">Hora Inicio:</label>
                                <input type="time" name="inicio" id="inicio" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cierre">Hora Finalización:</label>
                                <input type="time" name="cierre" id="cierre" class="form-control" required/>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 mb-3">
                        <span style="text-transform: uppercase; font-weight: 900; font-size: 110%">Orden Del Día</span>
                    </div>

                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <input placeholder="Punto Orden Del Día" type="text" name="item" id="item" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <button type="button" id="addOrder" class="btn btn-block btn-success">Agregar</button>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="orden_table" class="table table-striped theadcolor table-hover">
                            <thead>
                                <tr>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="items">
                            </tbody>
                        </table>
                    </div>






                    <div class="col-md-12 shadow p-3 mb-5 bg-white rounded">
                        <div class="row">
                            <h5 class="modal-title">Agregar Participantes</h5>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cedula">Cédula</label>
                                    <input type="number" min="3000000" minlength="7" maxlength="10" name="cedula" pattern="" id="cedula" class="form-control blockNums" placeholder="Cedula" title="7 a 10 caracteres" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control" readonly disabled>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="jsonTableParti" id="jsonTableParti">
                        <input class="btn btn-success" id="agregarParticipante" type="button" value="Agregar" style="width: 100%;">
                        <br>
                        <br>
                        <hr style="margin-bottom: 33px; border: 1px solid; margin-top: 3%;">
                        <br>
                        <div class="kt-section">
                            <div class="kt-section__content">
                                <div class="table-responsive table table-striped table-bordered table-hover table-checkable dataTable no-footer dtr-inline">
                                    <table id="tableParticipantes" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Cédula</th>
                                                <th>Nombre</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="bodyParticipantes">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        {{ Form::submit('Registrar', array('class' => 'btn btn-success','id'=>'crearCapacitacion')) }}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end:Modal -->


<!--begin:Modal -->
<div class="modal fade" id="modal_editar" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_actualizar" data-toggle="validator" role ="form" enctype="multipart/form-data">
                <div style="background: #303c54;" class="modal-header">
                    <h5 class="modal-title text-white">Actualizar Afiliacion</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_capacitacion" id="id_capacitacion">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha_edit">Fecha</label>
                                <input type="date" name="fecha_edit" id="fecha_edit" class="form-control" placeholder="Fecha Programada" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="participantes_edit"># de Participantes</label>
                                <input type="number" min="2" minlength="1" maxlength="3" name="participantes_edit" pattern="" id="participantes_edit" class="form-control" placeholder="# de Participantes" required oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tema_edit">Tema</label>
                                <input name="tema_edit" id="tema_edit" class="form-control" placeholder="Tema" required/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="descripcion_edit">Descripción</label>
                                <textarea name="descripcion_edit" id="descripcion_edit" class="form-control" placeholder="Descripción" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 shadow p-3 mb-5 bg-white rounded">
                        <div class="row">
                            <h5 class="modal-title">Agregar Participantes</h5>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cedula_edit">Cédula</label>
                                    <input type="number" min="3000000" minlength="7" maxlength="10" name="cedula_edit" pattern="" id="cedula_edit" class="form-control blockNums" placeholder="Cedula" title="7 a 10 caracteres" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre_edit">Nombre</label>
                                    <input type="text" name="nombre_edit" id="nombre_edit" class="form-control" readonly disabled>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="jsonTablePartEdit" id="jsonTablePartEdit">
                        <input class="btn btn-success" id="agregarParticipanteEdit" type="button" value="Agregar" style="width: 100%;">
                        <br>
                        <br>
                        <hr style="margin-bottom: 33px; border: 1px solid; margin-top: 3%;">
                        <br>
                        <div class="kt-section">
                            <div class="kt-section__content">
                                <div class="table-responsive table table-striped table-bordered table-hover table-checkable dataTable no-footer dtr-inline">
                                    <table id="tableParticipantesEdit" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Cédula</th>
                                                <th>Nombre</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="bodyParticipantesEdit">
                                        </tbody>
                                    </table>
                                </div>
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
