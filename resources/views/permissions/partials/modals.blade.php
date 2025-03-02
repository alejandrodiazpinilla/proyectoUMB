<!--begin:Modal -->
    <div class="modal fade" id="modal_crear" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form id="form_crear" data-toggle="validator" role ="form" enctype="multipart/form-data">
                    <div style="background: #014568;" class="modal-header">
                        <h5 style="color: #FFFFFF" class="modal-title">Agregar Permiso</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger" style="display:none">
                            <ul class="list-errores"></ul>
                        </div>
                        {{ csrf_field() }}
                        <!-- Tipo Documento Field -->
                        <div class="form-group">
                            <label for="display_name">Nombre</label>
                            <input type="text" name="display_name" id="display_name" class="form-control" placeholder="Nombre" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        {{ Form::submit('Registrar', array('class' => 'btn btn-primary')) }}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!--end:Modal -->
<!--begin:Modal -->
<div class="modal fade" id="modal_editar" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form id="form_actualizar" data-toggle="validator" role ="form" enctype="multipart/form-data">
                <div style="background: #014568;" class="modal-header">
                    <h5 style="color: #FFFFFF" class="modal-title">Actualizar Permiso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none">
                        <ul class="list-errores"></ul>
                    </div>
                    {{ csrf_field() }}
                    <input type="hidden" name="id_act" id="id_act">
                    <div class="form-group">
                        <label for="display_name_act">Nombre</label>
                        <input type="text" name="display_name_act" id="display_name_act" class="form-control" placeholder="Nombre" required>
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Actualizar', array('class' => 'btn btn-primary')) }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end:Modal -->