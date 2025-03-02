@extends('layouts.app.app')
@section('titulo')Actualizar Empleado @endsection
@section('content')

<form id="form_actualizar" data-toggle="validator" role ="form" enctype="multipart/form-data">
    <div>
        <h5>Actualizar Empleado</h5>
        <hr>
    </div>
    <div class="modal-body">
        {{ csrf_field() }}
        <input type="hidden" name="employe_id" id="employe_id" value="{{ $empleado->id }}">
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                    <label for="tipo_doc">Tipo de Documento</label>
                    {{ Form::select('tipo_doc', $tipos_documentos, $empleado?->rel_tipo_documento?->id, ['class'=> 'form-control select2-single', 'id'=>'tipo_doc', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="cedula">Número de Documento</label>
                    <input autofocus type="number" minlength="6" maxlength="10" min="50000" name="cedula" pattern="" id="cedula" class="form-control blockNums" placeholder="Número de Documento" title="6 a 11 caracteres" required pattern="[0-9]" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)" onkeypress="if (this.value == 'e') return false" value="{{ $empleado->identification }}"/>
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
                        <input type="text" autocomplete="off" class="form-control" alt="fecha_expedicion"name="fecha_expedicion" id="fecha_expedicion" placeholder="aaaa-mm-dd" required value="{{ date('d-m-Y',strtotime($empleado->expedition_date)) }}">
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="lugar_expedicion">Lugar de Expedición</label>
                    {{ Form::select('lugar_expedicion', $ciudades, $empleado?->rel_ciudad_expedicion?->id, ['class'=> 'form-control select2-single',
                    'id'=>'lugar_expedicion', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;'])
                    }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="nombre">Nombres</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombres Completos" required value="{{ $empleado->name }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="apellido">Apellidos</label>
                    <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellidos Completos" required value="{{ $empleado->surname }}">
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="empresa_id">Empresa</label>
                    {{ Form::select('empresa_id', $empresas, $empleado?->rel_empresa?->id, ['class'=> 'form-control select2-single', 'id'=>'empresa_id', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control m-input" placeholder="Correo electronico" required value="{{ $empleado->email }}">
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="telefono">Número de Celular</label>
                    <input type="number" min="2000000" minlength="7" maxlength="10" name="telefono" pattern="" id="telefono" class="form-control blockNums" placeholder="Número de Celular" title="7 a 10 caracteres" required oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="{{ $empleado->telephone }}"/>
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
                        <input type="text" autocomplete="off" class="form-control" alt="fecha_nacimiento"name="fecha_nacimiento" id="fecha_nacimiento" placeholder="aaaa-mm-dd" required value="{{ date('d-m-Y',strtotime($empleado->date_of_birth)) }}">
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="rh">RH</label>
                    {{ Form::select('rh', $grupo_sanguineo, $empleado?->rel_tipo_sangre?->id, ['class'=> 'form-control select2-single', 'id'=>'rh', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                    <label for="sexo">Sexo</label>
                    <select name="sexo" id="sexo" class="form-control" required style="width: 100%">
                        <option value="" disabled selected>Seleccione</option>
                        <option value="Femenino" @if($empleado->gender=='Femenino') Selected @endif>Femenino</option>
                        <option value="Masculino" @if($empleado->gender=='Masculino') Selected @endif>Masculino</option>
                        <option value="Otro" @if($empleado->gender=='Otro') Selected @endif>Otro</option>
                    </select>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="estado_civil">Estado Civil</label>
                    {{ Form::select('estado_civil', $estado_civil, $empleado?->rel_estado_civil?->id, ['class'=> 'form-control select2-single', 'id'=>'estado_civil', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
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
                                        class="form-control m-input" placeholder="Dirección de Residencia" required value="{{ $empleado->address }}">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="municipo_residencia">Municipio</label>
                                    {{ Form::select('municipo_residencia', $ciudades, $empleado?->rel_municipio_residencia?->id, ['class'=> 'form-control select2-single', 'id'=>'municipo_residencia', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="localidad_residencia">Localidad</label>
                                    {{ Form::select('localidad_residencia', $localidades, $empleado?->rel_localidad?->id, ['class'=> 'form-control select2-single', 'id'=>'localidad_residencia', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="barrio_residencia">Barrio</label>
                                    {{ Form::select('barrio_residencia', $barrios, $empleado?->rel_barrio?->id, ['class'=> 'form-control select2-single', 'id'=>'barrio_residencia', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            {{ Form::submit('Actualizar', array('class' => 'btn btn-success')) }}
            <a href="{{route('employees.index')}}" type="button" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
</form>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/employees/gestion.js') }}"></script>
@endsection