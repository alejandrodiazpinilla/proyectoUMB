<!--begin:Modal -->
<div class="modal fade" id="modal_crear" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_crear" data-toggle="validator" role ="form">
                <div style="background: #303c54;" class="modal-header">
                    <h5 class="modal-title text-white">Agregar Apodatos</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre_apodatos">Nombre</label>
                                <input type="text" name="nombre_apodatos" id="nombre_apodatos" class="form-control" placeholder="Nombre" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre_apodatos">Empresa</label>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Registrar', array('class' => 'btn btn-success','id'=>'crearApodatos')) }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
                    <h5 style="color: #FFF" class="modal-title">Actualizar Apodatos</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_apodatos" id="id_apodatos">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre_apodatos_edit">Nombre</label>
                                <input type="text" name="nombre_apodatos_edit" id="nombre_apodatos_edit" class="form-control" placeholder="Nombre" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre_apodatos">Empresa</label>
                                
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