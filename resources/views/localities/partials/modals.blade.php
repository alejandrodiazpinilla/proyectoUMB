<div class="modal fade" id="modal_crear" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_crear" data-toggle="validator" role ="form">
                <div style="background: #3c4b64;" class="modal-header">
                    <h5 class="modal-title text-white">Agregar Localidad</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ciudad">Ciudad</label>
                                {{ Form::select('ciudad', $ciudades, null, ['class'=> 'form-control m-select2', 'id'=>'ciudad', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        {{ Form::submit('Registrar', array('class' => 'btn btn-success','id'=>'crearCiudad')) }}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ---------------------------------------------------------------------------------------------- -->
<div class="modal fade" id="modal_editar" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_actualizar" data-toggle="validator" role ="form" enctype="multipart/form-data">
                <div style="background: #3c4b64;" class="modal-header">
                    <h5 class="modal-title text-white">Actualizar Localidad</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre_edit">Nombre</label>
                                <input type="text" name="nombre_edit" id="nombre_edit" class="form-control" placeholder="Nombre" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ciudad_edit">Ciudad</label>
                                {{ Form::select('ciudad_edit', $ciudades, null, ['class'=> 'form-control m-select2', 'id'=>'ciudad_edit', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
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