@extends('layouts.app.app')
@section('titulo') Nuevo Apodatos @endsection
@section('content')

<form id="form_crear" data-toggle="validator" role="form" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="cargoRec" name="cargoRec">
    <div>
        <h5>Agregar Reporte Apodatos</h5>
        <hr>
    </div>
    <div class="row">
        <div class="col-sm-offset-1 col-sm-12">
            <div class="card card-accent-warning">
                <div class="card-header font-weight-bold">Datos Personales</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cedula">N° Documento</label>
                                <input autofocus type="number" minlength="6" maxlength="10" min="50000" name="cedula"
                                    id="cedula" class="form-control blockNums" pattern="[0-9]"
                                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)"
                                    onkeypress="if (this.value == 'e') return false" />
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="nombre1">Primer Nombre</label>
                                <input type="text" name="nombre1" id="nombre1" class="form-control blockText">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="nombre2">Segundo Nombre</label>
                                <input type="text" name="nombre2" id="nombre2" class="form-control blockText">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="apellido1">Primer Apellido</label>
                                <input type="text" name="apellido1" id="apellido1" class="form-control blockText">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="apellido2">Segundo Apellido</label>
                                <input type="text" name="apellido2" id="apellido2" class="form-control blockText">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha de nacimiento</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="fecha_nacimiento"
                                        id="fecha_nacimiento" autocomplete="off" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="genero">Género</label>
                                <select name="genero" id="genero" class="form-control select2-single"
                                    style="width: 100%">
                                    <option value="" disabled selected>Seleccione...</option>
                                    <option value="2">Femenino</option>
                                    <option value="1">Masculino</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="cargo">Cargo</label>
                                <input type="text" name="cargo" id="cargo" class="form-control">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="fecha_vinculacion">Fecha de Vinculación</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="fecha_vinculacion"
                                        id="fecha_vinculacion" autocomplete="off" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-offset-1 col-sm-12">
            <div class="card card-accent-warning">
                <div class="card-header font-weight-bold">Datos de la Academia</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nit">NIT</label>
                                <input type="number" minlength="6" maxlength="10" min="50000" name="nit" id="nit"
                                    class="form-control blockNums" pattern="[0-9]"
                                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)"
                                    onkeypress="if (this.value == 'e') return false" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="nombre_academia">Nombre</label>
                                <input type="text" name="nombre_academia" id="nombre_academia" class="form-control blockText">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="tel_academia">Teléfono</label>
                                <input type="number" min="2000000" minlength="7" maxlength="10" name="tel_academia"
                                    pattern="" id="tel_academia" class="form-control blockNums"
                                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="direccion_academia">Dirección</label>
                                <input type="text" name="direccion_academia" id="direccion_academia"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-offset-1 col-sm-12">
            <div class="card card-accent-warning">
                <div class="card-header font-weight-bold">Datos del Curso</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="codigo_curso">Código del Curso</label>
                                <input type="number" minlength="4" maxlength="5" min="0001" name="codigo_curso"
                                    id="codigo_curso" class="form-control blockNums" pattern="[0-9]"
                                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)"
                                    onkeypress="if (this.value == 'e') return false" />
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="fecha_curso">Fecha del Curso</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="fecha_curso" id="fecha_curso"
                                        autocomplete="off" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="numero">Número</label>
                                <input type="text" name="numero" id="numero" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <button class="pointer btn bg-cyan text-white btn-elevate btn-pill" title="Agregar" id="agregarApodatos">
            <span><i class="fa fa-plus"></i><span> Agregar</span></span>
        </button>
    </div>
    <input type="hidden" name="jsonTable" id="jsonTable">
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="tableApodatos"
                    class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline mb-0"
                    cellspacing="0" style="white-space: inherit!important;">
                    <thead>
                        <tr>
                            <th>
                                <div class="custom-control custom-checkbox ml-3">
                                    <input type="checkbox" class="custom-control-input" id="checkAll">
                                    <label class="custom-control-label" for="checkAll" title="Acreditar todos"></label>
                                </div>
                            </th>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Cargo</th>
                            <th>Fecha Vinculación</th>
                            <th>NIT Academia</th>
                            <th>Nombre Academia</th>
                            <th>Teléfono Academia</th>
                            <th>Dirección Academia</th>
                            <th>Código Curso</th>
                            <th>Fecha Curso</th>
                            <th>Nro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="bodyApodatos">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="text-center mt-3">
        <div class="pointer btn bg-cyan text-white btn-elevate btn-pill" title="Descargar Plantilla" id="descargarPlantilla">
            <span><i class="fa fa-file-excel-o"></i><span> Descargar Plantilla</span></span>
        </div>
    </div>
    <div class="mt-4">
        {{ Form::submit('Registrar', array('class' => 'btn btn-success')) }}
        <a href="{{route('apodatos.index')}}" type="button" class="btn btn-secondary">Regresar</a>
    </div>
</form>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/apodatos/gestion.js') }}"></script>
@endsection