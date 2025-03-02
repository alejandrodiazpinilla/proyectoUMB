<div class="modal fade" id="modal_crear" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_crear" data-toggle="validator" role ="form" enctype="multipart/form-data">
                <div style="background: #303c54;" class="modal-header">
                    <h5 class="modal-title text-white">Agregar Empresa</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none">
                        <ul class="list-errores"></ul>
                    </div>
                    {{ csrf_field() }}
                    <div class="row upload_image col-md-12">
                        <div class="custom-file col-md-9">
                            <input type="file" class="custom-file-input form-control" id="logoEmpresa1" name="logoEmpresa1" lang="es" accept="image/*" onchange="previewImage(1);" style="cursor: pointer;" required>
                            <label class="custom-file-label" for="logoEmpresa1" data-browse="Seleccionar">
                                Seleccione un imagen
                            </label>
                        </div>
                        <div class="col-md-3 margin-top">
                            <img id="uploadPreview1" class="img-responsive" width="150" height="150" src="{!! asset('image/logos/empresas/logo_aqui.png') !!}"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre_empresa">Nombre</label>
                                <input type="text" name="nombre_empresa" id="nombre_empresa" class="form-control blockText" placeholder="Nombre" pattern="[a-zA-ZñÑáéíóúüÁÉÍÓÚÜ 0-9]{4,100}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nit_empresa">NIT</label>
                                <input type="number" name="nit_empresa" id="nit_empresa" class="form-control blockNums" placeholder="NIT" required maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="direccion_empresa">Dirección</label>
                                <input type="text" name="direccion_empresa" id="direccion_empresa" class="form-control" placeholder="Dirección" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telefono_empresa">Telefono</label>
                                <input type="number" name="telefono_empresa" id="telefono_empresa" class="form-control" placeholder="Telefono" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sede_empresa">Sede</label>
                                <input type="text" name="sede_empresa" id="sede_empresa" class="form-control" placeholder="Sede" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ciudad_empresa">Ciudad</label>
                                {{ Form::select('ciudad_empresa', $ciudades, null, ['class'=> 'form-control m-select2', 'id'=>'ciudad_empresa', 'required' => 'true', 'style'=>'width:100%;','placeholder'=>'seleccione...']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="observaciones_empresa">Observaciones</label>
                                <textarea name="observaciones_empresa" id="observaciones_empresa" class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Registrar', array('class' => 'btn btn-success','id'=>'crearEmpresa')) }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_editar" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_actualizar" data-toggle="validator" role ="form" enctype="multipart/form-data">
                <div style="background: #303c54;" class="modal-header">
                    <h5 class="modal-title text-white">Actualizar Empresa</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none">
                        <ul class="list-errores"></ul>
                    </div>
                    {{ csrf_field() }}
                    <input type="hidden" name="id_empresa" id="id_empresa">
                    
                    <div class="row upload_image col-md-12">
                        <div class="custom-file col-md-9">
                            <input type="file" class="custom-file-input form-control" id="logoEmpresa2" name="logoEmpresa2" lang="es" accept="image/*" onchange="previewImage(2);" style="cursor: pointer;">
                            <label class="custom-file-label" for="logoEmpresa2" data-browse="Seleccionar">
                                Seleccione un imagen
                            </label>
                        </div>
                        <div class="col-md-3 margin-top">
                            <img id="uploadPreview2" class="img-responsive" width="150" height="150" src="{!! asset('image/logos/empresas/logo_aqui.png') !!}"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre_empresa_edit">Nombre</label>
                                <input type="text" name="nombre_empresa_edit" id="nombre_empresa_edit" class="form-control" placeholder="Nombre" pattern="[a-zA-ZñÑáéíóúüÁÉÍÓÚÜ 0-9]{4,200}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nit_empresa_edit">NIT</label>
                                <input type="number" name="nit_empresa_edit" id="nit_empresa_edit" class="form-control blockNums" placeholder="NIT" required maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="direccion_empresa_edit">Dirección</label>
                                <input type="text" name="direccion_empresa_edit" id="direccion_empresa_edit" class="form-control" placeholder="Dirección" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telefono_empresa_edit">Telefono</label>
                                <input type="text" name="telefono_empresa_edit" id="telefono_empresa_edit" class="form-control" placeholder="Telefono" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sede_empresa_edit">Sede</label>
                                <input type="text" name="sede_empresa_edit" id="sede_empresa_edit" class="form-control" placeholder="Sede" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ciudad_empresa_edit">Ciudad</label>
                                {{ Form::select('ciudad_empresa_edit', $ciudades, null, ['class'=> 'form-control m-select2', 'id'=>'ciudad_empresa_edit', 'required' => 'true', 'style'=>'width:100%;','placeholder'=>'seleccione...']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="observaciones_empresa_edit">Observaciones</label>
                                <textarea name="observaciones_empresa_edit" id="observaciones_empresa_edit" class="form-control" rows="5"></textarea>
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
