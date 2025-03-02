<!--begin:Modal -->
<div class="modal fade" id="modal_crear" role="dialog" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <form id="form_crear" data-toggle="validator" role="form" enctype="multipart/form-data">
        <div style="background: #303c54;" class="modal-header">
                    <h5 class="modal-title text-white">Agregar Usuario</h5>
          <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="name">Nombre</label>
                <div class="input-group mb-3">
                  <input type="text" name="name" id="name" class="form-control blockText" placeholder="Nombre Completo" required>
                </div>
              </div>

              <div class="form-group">
                <label for="username">Nombre de usuario</label>
                <div class="input-group mb-3">
                  <input autofocus type="number" minlength="6" maxlength="10" min="50000" name="username" pattern="" id="username" class="form-control blockNums" placeholder="Número de Documento" title="6 a 10 caracteres" required pattern="[0-9]" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)" onkeypress="if (this.value == 'e') return false"/>
                </div>
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <div class="input-group mb-3">
                  <input type="email" name="email" id="email" class="form-control m-input" placeholder="Correo electronico" required>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="empresa">Empresa</label>
                <div class="input-group mb-3">
                {{ Form::select('empresa', $empresas, null,['class'=> 'form-control select2-single', 'style' => 'width:100% !important;', 'id'=>'empresa', 'placeholder' => 'Seleccione...']) }}
                </div>
              </div>

              <div class="form-group">
                <label for="rol">Rol</label>
                <div class="input-group mb-3">
                  {!!Form::select('rol[]', $roles, null,['class'=> 'form-control select2-multiple', 'id'=>'rol', 'style' => 'width:100%','multiple'=>'multiple','placeholder' => 'Seleccione...']) !!}
                </div>
              </div>

              <div class="form-group">
                <label for="area">Área</label>
                <div class="input-group mb-3">
                  {{Form::select('area', $areas, null,['class'=> 'form-control select2-multiple', 'style' => 'width:100% !important;', 'id'=>'area', 'placeholder' => 'Seleccione...']) }}
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-12 d-flex justify-content-center">
              <button type="button" id="rolesTabla" class="btn btn-success">Agregar</button>
            </div>
          </div>
          <div class="row table-responsive mx-auto">
            <div class="col-md-12">
              <table id="tablaRoles" class="table theadcolor table-striped table-hover" style="width:100%;">
                <tr>
                  <thead>
                    <th>EMPRESA</th>
                    <th>AREA</th>
                    <th>ROLES</th>
                    <th>ACCIÓN</th>
                  </thead>
                </tr>
              </table>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-2">
                <div class="" data-toggle="tooltip" data-placement="right" title="" data-original-title="Seleccione si este usuario está destinado para un cliente">
                <div style="display: flex; align-items: center; justify-content: right;">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="checkCliente" name="checkCliente" onclick="clienteActivo('checkCliente')">
                    <label class="custom-control-label" for="checkCliente">¿Asignar Cliente?</label>
                  </div>
                </div>
              </div>
              </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="customer_id">Cliente</label>
                <div class="input-group mb-3">
                  <select name="customer_id" id="customer_id" class="form-control select2-multiple" style="width:100% !important;" disabled>
                    <option value="" disabled selected>Seleccione...</option>
                    @foreach ($clientes as $val)
                    <option value="{{ $val->id }}">{{ $val->name }} - {{ $val->rel_empresa->nombre }} </option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="cargo">Cargo</label>
                <div class="input-group mb-3">
                  <input type="text" name="cargo" id="cargo" class="form-control m-input" placeholder="Cargo" required>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mx-auto">
              <div class="form-group">
                <label for="area">Firma</label>
                <div class="custom-file col-md-12">
                  <input type="file" class="custom-file-input form-control" id="firmaUsuario1" name="firmaUsuario1" lang="es" accept="image/*" onchange="previewImage(1);" style="cursor: pointer;">
                  <label class="custom-file-label" for="firmaUsuario1" data-browse="Seleccionar">
                    firma...
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="upload_image col-md-12">
            <div class="margin-top">
              <img draggable="false" id="uploadPreview1" class="img-responsive" width="288" height="108" src="{!! asset('image/users/firmas/tu_firma_aqui.jpg') !!}" />
            </div>
          </div>
        </div>
        <div class="modal-footer">
          {{ Form::submit('Registrar', array('class' => 'btn btn-success')) }}
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--end:Modal -->

<!--begin:Modal -->
<div class="modal fade" id="modal_editar" role="dialog" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <form id="form_actualizar" data-toggle="validator" role="form" enctype="multipart/form-data">
        <div style="background: #303c54;" class="modal-header">
                    <h5 class="modal-title text-white">Actualizar Usuario</h5>
          <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          @csrf
          <input type="hidden" name="id_act" id="id_act">

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="name">Nombre</label>
                <div class="input-group mb-3">
                  <input type="text" name="name_act" id="name_act" class="form-control blockText" placeholder="Nombre" required>
                </div>
              </div>

              <div class="form-group">
                <label for="username_act">Nombre de usuario</label>
                <div class="input-group mb-3">
                  <input autofocus type="number" minlength="6" maxlength="10" min="50000" name="username_act" pattern="" id="username_act" class="form-control blockNums" placeholder="Número de Documento" title="6 a 10 caracteres" required pattern="[0-9]" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)" onkeypress="if (this.value == 'e') return false"/>
                </div>
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <div class="input-group mb-3">
                  <input type="email" name="email_act" id="email_act" class="form-control m-input" placeholder="Email" required>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="empresa_act">Empresa</label>
                <div class="input-group mb-3">
                  {!!Form::select('empresa_act', $empresas, null,['class'=> 'form-control select2-single', 'id'=>'empresa_act', 'style' => 'width:100%!important;','placeholder' => 'Seleccione...']) !!}
                </div>
              </div>

              <div class="form-group">
                <label for="rol">Rol</label>
                <div class="input-group mb-3">
                  {!!Form::select('rol_act[]', $roles, null,['class'=> 'form-control select2-multiple', 'id'=>'rol_act', 'style' => 'width:100%!important;','multiple'=>'multiple','placeholder' => 'Seleccione...']) !!}
                </div>
              </div>

              <div class="form-group">
                <label for="area">Área</label>
                <div class="input-group mb-3">
                  {!!Form::select('area_act', $areas, null,['class'=> 'form-control select2-multiple', 'style' => 'width:100%!important;', 'id'=>'area_act','placeholder' => 'Seleccione...']) !!}
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-12 d-flex justify-content-center">
              <button type="button" id="rolesTabla_edit" class="btn btn-success">Agregar</button>
            </div>
          </div>
          <div class="row table-responsive mx-auto">
            <div class="col-md-12">
              <table id="tablaRoles_edit" class="table theadcolor table-striped table-hover" style="width:100%;">
                <tr>
                  <thead>
                    <th>EMPRESA</th>
                    <th>AREA</th>
                    <th>ROLES</th>
                    <th>ACCIÓN</th>
                  </thead>
                </tr>
              </table>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-2">
              <div class="" data-toggle="tooltip" data-placement="right" title="" data-original-title="Seleccione si este usuario está destinado para un cliente">
              <div style="display: flex; align-items: center; justify-content: right;">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="checkClienteEdit" name="checkClienteEdit" onclick="clienteActivo('checkClienteEdit')">
                  <label class="custom-control-label" for="checkClienteEdit">¿Asignar Cliente?</label>
                </div>
              </div>
            </div>
            </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="customer_id_edit">Cliente</label>
              <div class="input-group mb-3">
                <select name="customer_id_edit" id="customer_id_edit" class="form-control select2-multiple" style="width:100% !important;">
                  <option value="" disabled selected>Seleccione...</option>
                  @foreach ($clientes as $val)
                  <option value="{{ $val->id }}">{{ $val->name }} - {{ $val->rel_empresa->nombre }} </option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="cargo">Cargo</label>
                <div class="input-group mb-3">
                  <input type="text" name="cargo_act" id="cargo_act" class="form-control" placeholder="cargo" required>
                </div>
              </div>
            </div>
          </div>

          <div class="row modal-footer" style="border-top: 0px solid !important;">
            <div class="col-md-10 mx-auto">
                <div class="table-responsive">
                    <table id="customers_table"
                        class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline mb-0 "
                        cellspacing="0" style="white-space: inherit!important;">
                        <thead>
                            <tr>
                              <th class="thWhite">CLIENTE</th>
                              <th class="thWhite">FECHA INICIO</th>
                              <th class="thWhite">FECHA FIN</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>

          <div class="row">
            <div class="col-md-6 mx-auto">
              <div class="form-group">
                <label for="area">Firma</label>
                <div class="custom-file col-md-12">
                  <input type="file" class="custom-file-input form-control" id="firmaUsuario2" name="firmaUsuario2" lang="es" accept="image/*" onchange="previewImage(2);" style="cursor: pointer;">
                  <label class="custom-file-label" for="firmaUsuario1" data-browse="Seleccionar">
                    firma...
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="upload_image col-md-12">
            <div class="margin-top">
              <img draggable="false" id="uploadPreview2" class="img-responsive" width="288" height="108" src="{!! asset('image/users/firmas/tu_firma_aqui.jpg') !!}" />
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