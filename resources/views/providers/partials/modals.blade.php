<!--begin:Modal -->
<div class="modal fade" id="modal_crear" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_crear" data-toggle="validator" role ="form" enctype="multipart/form-data">
                <div style="background: #014568;" class="modal-header">
                    <h5 style="color: #FFFFFF" class="modal-title" id="exampleModalLabel">Agregar Proveedor</h5>
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
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nit_proveedor">NIT<span style="color: #FF0000">*</span></label>
                                <input style="color: #6c7293;" type="number" name="nit_proveedor" id="nit_proveedor" class="form-control" placeholder="NIT" required onkeypress="return validar_numeros(event)" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="nombre_proveedor">Nombre<span style="color: #FF0000">*</span></label>
                                <input style="color: #6c7293;" type="text" name="nombre_proveedor" id="nombre_proveedor" class="form-control" placeholder="Nombre" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="empresa_proveedor">Empresa<span style="color: #FF0000">*</span></label>
                                {{ Form::select('empresa_proveedor', $empresas, null, ['class'=> 'form-control m-select2', 'id'=>'empresa_proveedor', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ciudad_proveedor">Ciudad<span style="color: #FF0000">*</span></label>
                                {{ Form::select('ciudad_proveedor', $ciudades, null, ['class'=> 'form-control m-select2', 'id'=>'ciudad_proveedor', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="direccion_proveedor">Dirección<span style="color: #FF0000">*</span></label>
                                <input style="color: #6c7293;" type="text" name="direccion_proveedor" id="direccion_proveedor" class="form-control" placeholder="Dirección" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="telefono_proveedor">Teléfono<span style="color: #FF0000">*</span></label>
                                <input style="color: #6c7293;" type="number" name="telefono_proveedor" id="telefono_proveedor" class="form-control" placeholder="Teléfono" required onkeypress="return validar_numeros(event)" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="contacto_proveedor">Contacto<span style="color: #FF0000">*</span></label>
                                <input type="text" name="contacto_proveedor" id="contacto_proveedor" style="color: #6c7293;" class="form-control" placeholder="Nombre Contacto" required onkeypress="return validar_texto(event)">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="telContacto_proveedor">Teléfono contacto<span style="color: #FF0000">*</span></label>
                                <input style="color: #6c7293;" type="number" name="telContacto_proveedor" id="telContacto_proveedor" class="form-control" placeholder="Teléfono Contacto" required onkeypress="return validar_numeros(event)" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mailContacto_proveedor">Email Contacto<span style="color: #FF0000">*</span></label>
                                <input style="color: #6c7293;" type="email" name="mailContacto_proveedor" id="mailContacto_proveedor" class="form-control" placeholder="Email Real De Contacto" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="horario_proveedor">Horario de atención</label>
                                <input style="color: #6c7293;" type="text" name="horario_proveedor" id="horario_proveedor" class="form-control" placeholder="Horario De Atención" list="opcHorario">
                            </div>
                            <datalist id="opcHorario">
                                <option value="Lunes A Viernes">
                                <option value="Lunes A Sabado">
                                <option value="Domingo A Domingo">
                            </datalist>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="condPago_proveedor">Condición de pago<span style="color: #FF0000">*</span></label>
                                <select class="form-control m-select2" style="width: 100%; color: #6c7293;" id="condPago_proveedor" name="condPago_proveedor" placeholder="Seleccione..." required>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="webpage_proveedor">Página web</label>
                                <input style="color: #6c7293;" type="text" name="webpage_proveedor" id="webpage_proveedor" class="form-control" placeholder="www.paginaweb.com" pattern="www.+" title="Ingresar una página web válida www.paginaweb.com">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>¿Que Provee?:<span style="color: #FF0000">*</span></label>
                                <div class="kt-checkbox-inline required">
                                    <label class="kt-checkbox">
                                        <input type="checkbox" id="producto" name="que_provee" value="1"> Productos
                                        <span></span>
                                    </label>
                                    <label class="kt-checkbox">
                                        <input type="checkbox" id="servicio" name="que_provee" value="2" > Servicios
                                        <span></span>
                                    </label>
                                    <label class="kt-checkbox">
                                        <input type="checkbox" id="ambos" name="que_provee" value="3" > Ambos
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="observaciones">Observaciones</label>
                                <textarea name="observaciones" class="form-control" id="observaciones" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>


                    <!-- <div class="container"> -->
                        <div class="row it">
                            <!-- Id Eliminado "one" se le asigno "uno" -->
                            <div class="col-sm-12" id="uno">
                                <div class="row">
                                    <h5 class="modal-title" id="exampleModalLabel">Adjuntar Documentos Proveedor</h5>
                                </div>
                                <br>
                                <div id="uploader">
                                    <div class="row uploadDoc">
                                        <div class="col-sm-4" style="padding: 0.25rem 1rem;">
                                            <div class="docErr">Por favor, seleccione un archivo de las extensiones autorizadas</div>
                                            <div class="fileUpload btn btn-orange">
                                                <img src="{{ asset('image/files/empty.png') }}" style="height: 20px;width: 18.5px;" class="icon">
                                                    <span class="upl"> - Cargar Documento</span>
                                                        <input type="file" class="upload up" id="upload" name="adjuntar_soportes" style="width: 184px;" onchange="readURL(this);" accept=".pdf, .zip, .rar, .7zip, .xlsx, .xls, .docx, .doc, .pptx, .ppt, .rtf, .png, .jpg, .jpeg, .txt"/>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-sm-8" style="padding: 0.25rem 1rem;">
                                            <textarea name="obs_adjunto" class="form-control obs_adjunto" id="obs_adjunto" rows="1" placeholder="Observación"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right col-12">
                                    <div class="btn btn-success btn-new" title="Agregar" id="agregar_adjunto">
                                        <span><i class="fa fa-plus"></i><span>Agregar</span></span>
                                    </div>
                                </div>

                                <input type="hidden" id="nombre_adjunto" name="nombre_adjunto">
                                @php $archivos_array = []; @endphp
                                <input type="hidden" id="registro_adjuntos" name="registro_adjuntos" value="@if($archivos_array!=''){{ json_encode($archivos_array) }}@endif">
                                <div class="row">
                                    <div class="mt-5 col-12">
                                        <div class="md-form">
                                            <div class="table-responsive table table-striped table-bordered theadcolor dataTable">
                                                <table id="table_adjuntos" style="width:100%;">
                                                    <thead>
                                                        <th>Nombre</th>
                                                        <th>Observación</th>
                                                        <th>Acciones</th>
                                                    </thead>
                                                    <tbody id="body_adjunto">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    <!-- </div> -->
            </div>
            <div class="modal-footer">
                {{ Form::submit('Registrar', array('class' => 'btn btn-primary')) }}
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </form>
    </div>
</div>
</div>
<!--end:Modal -->

<!--begin:Modal -->
<div class="modal fade" id="modal_editar" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_actualizar" data-toggle="validator" role ="form" enctype="multipart/form-data">
                <div style="background: #014568;" class="modal-header">
                    <h5 style="color: #FFFFFF" class="modal-title" id="exampleModalLabel">Actualizar Proveedor</h5>
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
                    <div class="row" hidden>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="id_provee_edit">Codigo</label>
                                <input type="text" name="id_provee_edit" id="id_provee_edit" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nit_proveedor_edit">NIT<span style="color: #FF0000">*</span></label>
                                <input type="text" name="nit_proveedor_edit" id="nit_proveedor_edit" class="form-control bloquearPegar" placeholder="Nit" required onkeypress="return validar_numeros(event)" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="nombre_proveedor_edit">Nombre<span style="color: #FF0000">*</span></label>
                                <input type="text" name="nombre_proveedor_edit" id="nombre_proveedor_edit" class="form-control bloquearPegar" placeholder="Nombre" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="empresa_proveedor_edit">Empresa<span style="color: #FF0000">*</span></label>
                                {{ Form::select('empresa_proveedor_edit', $empresas, null, ['class'=> 'form-control m-select2', 'id'=>'empresa_proveedor_edit', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ciudad_proveedor_edit">Ciudad<span style="color: #FF0000">*</span></label>
                                {{ Form::select('ciudad_proveedor_edit', $ciudades, null, ['class'=> 'form-control m-select2', 'id'=>'ciudad_proveedor_edit', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="direccion_proveedor_edit">Dirección<span style="color: #FF0000">*</span></label>
                                <input type="text" name="direccion_proveedor_edit" id="direccion_proveedor_edit" class="form-control" placeholder="Dirección" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="telefono_proveedor_edit">Teléfono<span style="color: #FF0000">*</span></label>
                                <input type="text" name="telefono_proveedor_edit" id="telefono_proveedor_edit" class="form-control" placeholder="Teléfono" required onkeypress="return validar_numeros(event)" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="contacto_proveedor_edit">Contacto<span style="color: #FF0000">*</span></label>
                                <input type="text" name="contacto_proveedor_edit" id="contacto_proveedor_edit" class="form-control" placeholder="Contacto"  onkeypress="return validar_texto(event)" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="telContacto_proveedor_edit">Teléfono contacto<span style="color: #FF0000">*</span></label>
                                <input type="text" name="telContacto_proveedor_edit" id="telContacto_proveedor_edit" class="form-control" placeholder="Teléfono contacto" required onkeypress="return validar_numeros(event)" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mailContacto_proveedor_edit">Email contacto<span style="color: #FF0000">*</span></label>
                                <input type="email" name="mailContacto_proveedor_edit" id="mailContacto_proveedor_edit" class="form-control bloquearPegar" placeholder="Email contacto" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="horario_proveedor_edit">Horario de atención</label>
                                <input type="text" name="horario_proveedor_edit" id="horario_proveedor_edit" class="form-control" placeholder="Horario de Atención" list="opcHorario">
                            </div>
                            <datalist id="opcHorario">
                                <option value="Lunes A Viernes">
                                <option value="Lunes A Sabado">
                                <option value="Domingo A Domingo">
                            </datalist>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="webpage_proveedor_edit">Página web</label>
                                <input type="text" name="webpage_proveedor_edit" id="webpage_proveedor_edit" class="form-control" placeholder="www.paginaweb.com" pattern="www.+" title="Ingresar una página web válida www.">
                                
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="condPago_proveedor_edit">Condición de pago</label>
                                <select class="form-control m-select2" style="width: 100%; color: #6c7293;" id="condPago_proveedor_edit" name="condPago_proveedor_edit" placeholder="Seleccione..." required>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>¿Que Provee?:</label>
                                <div class="kt-checkbox-inline required">
                                    <label class="kt-checkbox">
                                        <input type="checkbox" id="producto_edit" name="que_provee_edit" value="1"> Productos
                                        <span></span>
                                    </label>
                                    <label class="kt-checkbox">
                                        <input type="checkbox" id="servicio_edit" name="que_provee_edit" value="2" > Servicios
                                        <span></span>
                                    </label>
                                    <label class="kt-checkbox">
                                        <input type="checkbox" id="ambos_edit" name="que_provee_edit" value="3" > Ambos
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="observaciones_edit">Observaciones</label>
                                <textarea name="observaciones_edit" class="form-control" id="observaciones_edit" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row it">
                            <div class="col-sm-offset-1 col-sm-12">
                                <div class="row">
                                    <h5 class="modal-title" id="exampleModalLabel">Adjuntar documentos</h5>
                                </div>
                                <br>
                                <div id="uploader">
                                    <div class="row uploadDoc">
                                        <div class="col-sm-4" style="padding: 0.25rem 1rem;">
                                            <div class="docErr">Por favor, seleccione un archivo válido</div>
                                            <div class="fileUpload btn btn-orange"> <img src="{{ asset('image/files/empty.png') }}" style="height: 20px;width: 18.5px;" class="icon"><span class="upl_edit">Cargar archivo</span>
                                                <input type="file" class="upload up_edit" id="upload_edit" name="adjuntar_soportes_edit" style="width: 184px;" onchange="readURL(this);" />
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-sm-8" style="padding: 0.25rem 1rem;">
                                            <textarea class="form-control obs_adjunto_edit" name="obs_adjunto_edit" id="obs_adjunto_edit" value="" placeholder="Observación" rows="1"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right col-12">
                                    <div class="btn btn-success btn-new" title="Agregar" id="agregar_adjunto_edit">
                                        <span><i class="fa fa-plus"></i><span>Agregar</span></span>
                                    </div>
                                </div>
                                <input type="hidden" id="nombre_adjunto_edit" name="nombre_adjunto_edit">
                                @php $archivos_array_edit = []; @endphp
                                <input type="hidden" id="registro_adjuntos_edit" name="registro_adjuntos_edit" style="width:100%;" value="@if($archivos_array_edit!=''){{ json_encode($archivos_array_edit) }} @endif">
                                <div class="row">
                                    <div class="mt-5 col-12">
                                        <div class="md-form">
                                         <div class="table-responsive table table-striped table-bordered theadcolor dataTable">
                                            <table  id="table_adjuntos_edit" style="width:100%;">
                                                <thead>
                                                    <th>Nombre</th>
                                                    <th>Observación</th>
                                                    <th>Acciones</th>
                                                </thead>
                                                <tbody id="body_adjunto_edit">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
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


<!--begin:Modal -->
<div class="modal fade" id="modal_ver_adjuntos" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                <form id="form_ver_adjuntos" method="GET" action="" enctype="multipart/form-data">
                    <div style="background: #014568;" class="modal-header">
                        <h5 style="color: #FFFFFF" class="modal-title" id="exampleModalLabel">Adjuntos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    {{csrf_field()}}
                    <div class="modal-body col-md-12">
                        <input type="hidden" name="id_proveedor_adjuntos" id="id_proveedor_adjuntos" type="text" class="form-control" value="">
                        <div class="table-responsive table theadcolor table-striped table-bordered table-hover table-checkable dataTable no-footer dtr-inline">
                            <table id="adjuntos_table" style="width:100%">
                                <thead>
                                    <tr>
                                        {{-- <th>id</th> --}}
                                        <th>Nombre</th>
                                        <th>Observación</th>
                                        <th>Fecha de Creación</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="archivos_table">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
        </div>
    </div>
</div>
<!--end:Modal -->
