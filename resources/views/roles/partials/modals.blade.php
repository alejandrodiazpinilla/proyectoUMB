<!--begin:Modal -->
<div class="modal fade" id="modal_crear" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form id="form_crear" data-toggle="validator" role ="form" enctype="multipart/form-data">
                    <div style="background: #014568;" class="modal-header">
                        <h5 style="color: #FFFFFF" class="modal-title">Agregar Rol</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div style="margin-left:20px; margin-right:20px" class="modal-body">
                        <div class="alert alert-danger" style="display:none">
                            <ul class="list-errores"></ul>
                        </div>
                        {{ csrf_field() }}
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="display_name">Nombre</label>
                                    <input type="text" name="display_name" id="display_name" class="form-control" placeholder="Nombre" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="permisos">Permisos</label>
                                    {{ Form::select('permisos[]', $permissions, null, ['class'=> 'form-control m-select2', 'id'=>'permisos', 'required' => 'true', 'multiple' =>'multiple', 'style'=>'width:100%;']) }}
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        {{ Form::submit('Registrar', array('class' => 'btn btn-primary', 'id' => 'finish')) }}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end:Modal -->
<!--begin:Modal -->
<div class="modal fade" id="modal_editar" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form id="form_actualizar" data-toggle="validator" role ="form" enctype="multipart/form-data">
                <div style="background: #014568;" class="modal-header">
                    <h5 style="color: #FFFFFF" class="modal-title">Actualizar Rol</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div style="margin-left:20px; margin-right:20px" class="modal-body">
                    <div class="alert alert-danger" style="display:none">
                        <ul class="list-errores"></ul>
                    </div>
                    {{ csrf_field() }}
                    <input type="hidden" name="id_act" id="id_act">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="display_name_act">Nombre</label>
                                <input type="text" name="display_name_act" id="display_name_act" class="form-control" placeholder="Nombre" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Permisos</label>
                                {{ Form::select('permisos_act[]', $permissions, null, ['class'=> 'form-control m-select2', 'id'=>'permisos_act', 'required' => 'true', 'multiple' =>'multiple', 'style'=>'width:100%;']) }}
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Actualizar', array('class' => 'btn btn-primary' , 'id' => 'finish')) }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end:Modal -->