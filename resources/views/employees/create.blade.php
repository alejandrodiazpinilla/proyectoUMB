@extends('layouts.app.app')
@section('titulo')Crear Empleado @endsection
@section('content')
<form id="form_crear" data-toggle="validator" role ="form" enctype="multipart/form-data">
    <div>
        <h5>Agregar Empleado</h5>
        <hr>
    </div>
    <div class="modal-body">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                    <label for="tipo_doc">Tipo de Documento</label>
                    {{ Form::select('tipo_doc', $tipos_documentos, null, ['class'=> 'form-control select2-single', 'id'=>'tipo_doc', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="cedula">Número de Documento</label>
                    <input autofocus type="number" minlength="6" maxlength="10" min="50000" name="cedula" id="cedula" class="form-control blockNums" placeholder="Número de Documento" title="6 a 11 caracteres" required pattern="[0-9]" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)" onkeypress="if (this.value == 'e') return false"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                    <fieldset class="form-group">
                        <label>Fecha de Expedición</label>
                        <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text">
                            <i class="fa fa-calendar"></i>
                            </span>
                        </span>
                        <input type="text" autocomplete="off" class="form-control" alt="fecha_expedicion"name="fecha_expedicion" id="fecha_expedicion" placeholder="aaaa-mm-dd">
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="lugar_expedicion">Lugar de Expedición</label>
                    {{ Form::select('lugar_expedicion', $ciudades, null, ['class'=> 'form-control select2-single',
                    'id'=>'lugar_expedicion', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;'])
                    }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="nombre">Nombres</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombres Completos" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="apellido">Apellidos</label>
                    <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellidos Completos" required>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Correo electronico" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                    <label for="empresa_id">Empresa</label>
                    {{ Form::select('empresa_id', $empresas, null, ['class'=> 'form-control select2-single', 'id'=>'empresa_id', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="telefono">Número de Celular</label>
                    <input type="number" min="2000000" minlength="7" maxlength="10" name="telefono" id="telefono" class="form-control blockNums" placeholder="Número de Celular" title="7 a 10 caracteres" required oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                    <fieldset class="form-group">
                        <label>Fecha de Nacimiento</label>
                        <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text">
                            <i class="fa fa-calendar"></i>
                            </span>
                        </span>
                        <input type="text" autocomplete="off" class="form-control" alt="fecha_nacimiento"name="fecha_nacimiento" id="fecha_nacimiento" placeholder="aaaa-mm-dd">
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="rh">RH</label>
                    {{ Form::select('rh', $grupo_sanguineo, null, ['class'=> 'form-control select2-single', 'id'=>'rh', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                    <label for="sexo">Sexo</label>
                    <select name="sexo" id="sexo" class="form-control select2-single" required style="width: 100%">
                        <option value="" disabled selected>Seleccione</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="estado_civil">Estado Civil</label>
                    {{ Form::select('estado_civil', $estado_civil, null, ['class'=> 'form-control select2-single', 'id'=>'estado_civil', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <h5 class="card-header text-info">Dirección De Domicilio</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="direccion_residencia">Dirección</label>
                                    <input type="text" name="direccion_residencia" id="direccion_residencia"
                                        class="form-control" placeholder="Dirección de Residencia" required>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="municipo_residencia">Municipio</label>
                                    {{ Form::select('municipo_residencia', $ciudades, null, ['class'=> 'form-control select2-single', 'id'=>'municipo_residencia', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="localidad_residencia">Localidad</label>
                                    {{ Form::select('localidad_residencia', $localidades, null, ['class'=> 'form-control select2-single', 'id'=>'localidad_residencia', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;', 'disabled' => 'true']) }}
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="barrio_residencia">Barrio</label>
                                    {{ Form::select('barrio_residencia', $barrios, null, ['class'=> 'form-control select2-single', 'id'=>'barrio_residencia', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;', 'disabled' => 'true']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <h5 class="card-header text-info">Configuración de Cuenta</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                  <label for="rol">Rol</label>
                                  <div class="input-group mb-3">
                                    {!!Form::select('rol', $roles, null,['class'=> 'form-control select2-single', 'id'=>'rol', 'style' => 'width:100%','placeholder' => 'Seleccione...','required' => 'true']) !!}
                                  </div>
                                </div>
                            </div>
                  
                            <div class="col-md">
                                <div class="form-group">
                                  <label for="area">Área</label>
                                  <div class="input-group mb-3">
                                    {{Form::select('area', $areas, null,['class'=> 'form-control select2-single', 'style' => 'width:100% !important;', 'id'=>'area', 'placeholder' => 'Seleccione...','required' => 'true']) }}
                                  </div>
                                </div>
                            </div>
                        </div>
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
                                  <input type="text" name="cargo" id="cargo" class="form-control" placeholder="Cargo" required>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            {{ Form::submit('Registrar', array('class' => 'btn btn-success')) }}
            <a href="{{route('employees.index')}}" type="button" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
</form>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/employees/gestion.js') }}"></script>
<script>
    function clienteActivo(tipo) {
        if (tipo == 'checkCliente') {
            var x = $("#customer_id").attr('disabled');
            if (x == 'disabled') {
                $("#customer_id").attr('disabled', false).attr('required', true);
            } else {
                $("#customer_id").attr('disabled', true).attr('required', false);
            }
        }
    }
</script>
@endsection