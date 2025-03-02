<!--begin:Modal -->
<div class="modal fade" id="modal_crear" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_crear" data-toggle="validator" role ="form">
                <div style="background: #3c4b64;" class="modal-header">
                    <h5 class="modal-title text-white">Agregar Ciudad</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre_ciudad">Nombre</label>
                                <input type="text" name="nombre_ciudad" id="nombre_ciudad" class="form-control blockText" placeholder="Nombre" pattern="[a-zA-ZñÑáéíóúüÁÉÍÓÚÜ]{4,100}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre_departamento">Departamento</label>
                                <input type="text" name="nombre_departamento" id="nombre_departamento" class="form-control blockText" placeholder="Departamento" pattern="[a-zA-ZñÑáéíóúüÁÉÍÓÚÜ]{4,100}" required>
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
<!--end:Modal -->


<!--begin:Modal -->
<div class="modal fade" id="modal_editar" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_actualizar" data-toggle="validator" role ="form" enctype="multipart/form-data">
                <div style="background: #3c4b64;" class="modal-header">
                    <h5 class="modal-title text-white">Actualizar Ciudad</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_ciudad" id="id_ciudad">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre_ciudad_edit">Nombre</label>
                                <input type="text" name="nombre_ciudad_edit" id="nombre_ciudad_edit" class="form-control" placeholder="Nombre" pattern="[a-zA-ZñÑáéíóúüÁÉÍÓÚÜ]{4,200}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre_departamento_edit">Departamento</label>
                                <input type="text" name="nombre_departamento_edit" id="nombre_departamento_edit" class="form-control blockText" placeholder="Departamento" pattern="[a-zA-ZñÑáéíóúüÁÉÍÓÚÜ]{4,100}" required >
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