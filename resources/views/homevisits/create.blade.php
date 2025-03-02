@extends('layouts.app.app')
@section('titulo')Crear Visita Domiciliaria @endsection
@section('content')

<form id="form_crear" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="modal-header">
    <h5 class="modal-title">Agregar Nueva Visita</h5>
  </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-md">
        <div class="form-group">
          <label class="font-weight-bold">Fecha de Solicitud:</label>
          {{date('d-m-Y')}}
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-offset-1 col-sm-12">
        <div class="card card-accent-warning">
          <div class="card-header font-weight-bold">DATOS DEL ASPIRANTE</div>
          <div class="card-body">
            <div class="row">
              <div class="col-md">
                <div class="form-group">
                  <label for="tipo_doc">Tipo de Documento</label>
                  {{ Form::select('tipo_doc', $tipos_documentos, null, ['class'=> 'form-control
                  select2-single', 'id'=>'tipo_doc', 'required' => 'true', 'placeholder' => 'Seleccione...',
                  'style'=>'width:100%;']) }}
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label for="cedula">Número de Documento</label>
                  <input autofocus type="number" minlength="6" maxlength="10" min="50000" name="cedula" id="cedula"
                    class="form-control blockNums" placeholder="Número de Documento" title="6 a 10 caracteres" required
                    pattern="[0-9]"
                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)"
                    onkeypress="if (this.value == 'e') return false" />
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label for="nombre">Nombres</label>
                  <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombres Completos"
                    required>
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label for="apellido">Apellidos</label>
                  <input type="text" name="apellido" id="apellido" class="form-control"
                    placeholder="Apellidos Completos" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md">
                <div class="form-group">
                  <label for="fecha_nacimiento">Fecha de nacimiento</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">
                        <i class="fa fa-calendar"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento"
                      autocomplete="off" placeholder="DD-MM-AAAA" />
                  </div>
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label for="edad">Edad</label>
                  <input type="text" name="edad" id="edad" class="form-control" disabled readonly>
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label for="estado_civil">Estado Civil</label>
                  {{ Form::select('estado_civil', $estado_civil, null, ['class'=> 'form-control
                  select2-single', 'id'=>'estado_civil', 'required' => 'true', 'placeholder' =>
                  'Seleccione...', 'style'=>'width:100%;']) }}
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label for="cargo">Cargo</label>
                  <div class="input-group mb-3">
                    <input type="text" name="cargo" id="cargo" class="form-control" placeholder="Cargo" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md">
                <div class="form-group">
                  <label for="telefono">Número de Celular</label>
                  <input type="number" min="2000000" minlength="7" maxlength="10" name="telefono" pattern=""
                    id="telefono" class="form-control blockNums" placeholder="Número de Celular"
                    title="7 a 10 caracteres" required
                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label for="academic_degree">Formación Académica</label>
                  {{ Form::select('academic_degree', $formaciones, null, ['class'=> 'form-control
                  select2-single', 'id'=>'academic_degree', 'required' => 'true', 'placeholder' =>
                  'Seleccione...', 'style'=>'width:100%;']) }}
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md">
                <div class="form-group">
                  <label for="direccion_residencia">Dirección</label>
                  <input type="text" name="direccion_residencia" id="direccion_residencia" class="form-control"
                    placeholder="Dirección de Residencia" required>
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label for="municipo_residencia">Municipio</label>
                  {{ Form::select('municipo_residencia', $ciudades, null, ['class'=> 'form-control
                  select2-single', 'id'=>'municipo_residencia', 'required' => 'true', 'placeholder' =>
                  'Seleccione...', 'style'=>'width:100%;']) }}
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md">
                <div class="form-group">
                  <label for="localidad_residencia">Localidad</label>
                  {{ Form::select('localidad_residencia', $localidades, null, ['class'=> 'form-control
                  select2-single', 'id'=>'localidad_residencia', 'required' => 'true', 'placeholder' =>
                  'Seleccione...', 'style'=>'width:100%;', 'disabled' => 'true']) }}
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label for="barrio_residencia">Barrio</label>
                  {{ Form::select('barrio_residencia', $barrios, null, ['class'=> 'form-control
                  select2-single', 'id'=>'barrio_residencia', 'required' => 'true', 'placeholder' =>
                  'Seleccione...', 'style'=>'width:100%;', 'disabled' => 'true']) }}
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md">
                <div class="form-group">
                  <label for="resultado_visita">Resultado de la Visita </label>
                  {{ Form::select('resultado_visita', $tipo_visitas, null, ['class'=> 'form-control
                  select2-single', 'id'=>'resultado_visita', 'required' => 'true', 'placeholder' =>
                  'Seleccione...', 'style'=>'width:100%;']) }}
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
          <div class="card-header font-weight-bold">ASPIRANTE NO ATIENDE LA VISITA</div>
          <div class="card-body">
            <div class="row">
              <div class="col-md">
                <div class="form-group">
                  <label for="nombre_atiende">Quien Atiende la Visita</label>
                  <input type="text" name="nombre_atiende" id="nombre_atiende" class="form-control"
                    placeholder="Quien atiende la visita">
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label for="parentesco">Parentesco</label>
                  <input type="text" name="parentesco" id="parentesco" class="form-control" placeholder="Parentesco">
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
          <div class="card-header font-weight-bold">HALLAZGOS DE LA VISITA</div>
          <div class="card-body">
            <div class="row">
              <div class="col-md">
                <div class="form-group">
                  <label for="situacion_laboral">Situación Laboral</label>
                  <input type="text" name="situacion_laboral" id="situacion_laboral" class="form-control"
                    placeholder="Situación Laboral" required>
                </div>
              </div>
              <div class="col-md">
                <label for="facilidad_transporte">Facilidad para Transportarse </label>
                <div class="form-group">
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radioTransSi" name="facilidad_transporte" class="custom-control-input"
                      value="Si" required>
                    <label class="custom-control-label" for="radioTransSi">Si</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radioTransNo" name="facilidad_transporte" class="custom-control-input"
                      value="No" required>
                    <label class="custom-control-label" for="radioTransNo">No</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md">
                <label for="mendio_transporte">¿Cómo se transporta? </label>
                <div class="form-group">
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radioTransServPub" name="mendio_transporte" class="custom-control-input"
                      value="Servicio Público" required>
                    <label class="custom-control-label" for="radioTransServPub">Servicio Público</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radioTransServPart" name="mendio_transporte" class="custom-control-input"
                      value="Vehículo Particular" required>
                    <label class="custom-control-label" for="radioTransServPart">Vehículo Particular</label>
                  </div>
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label for="cual_transporte">¿Cuál?</label>
                  <input type="text" name="cual_transporte" id="cual_transporte" class="form-control"
                    placeholder="¿Cuál?" required>
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
          <div class="card-header font-weight-bold">INFORMACIÓN FAMILIAR</div>
          <div class="card-body">
            <div class="row">
              <div class="col-md">
                <div class="form-group">
                  <label for="con_quien_vive">¿Con quién vive en el mismo domicilio?</label>
                  <textarea name="con_quien_vive" id="con_quien_vive" class="form-control" rows="2" required></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col md-2">
                <div class="form-group">
                  <label class="col-md col-form-label" for="checkViveSolo">¿Vive solo?</label>
                  <div class="col-md">
                    <label class="switch switch-label switch-pill switch-outline-success">
                      <input class="switch-input" name="checkViveSolo" type="checkbox" id="checkViveSolo">
                      <span class="switch-slider" data-checked="Si" data-unchecked="No"></span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="hiddenFam">
              <div class="row">
                <div class="col-md">
                  <div class="form-group">
                    <label for="nombres">Nombres</label>
                    <input type="text" name="nombres" id="nombres" class="form-control blockText">
                  </div>
                </div>
                <div class="col-md">
                  <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos" class="form-control blockText">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md">
                  <label for="parentesco_familiar">Parentesco</label>
                  <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="radioParHijo" name="parentesco_familiar" class="custom-control-input"
                        value="Hijo">
                      <label class="custom-control-label" for="radioParHijo">Hijo</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="radioParEsposo" name="parentesco_familiar" class="custom-control-input"
                        value="Esposo(a)">
                      <label class="custom-control-label" for="radioParEsposo">Esposo(a)</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="radioParMama" name="parentesco_familiar" class="custom-control-input"
                        value="Mamá">
                      <label class="custom-control-label" for="radioParMama">Mamá</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="radioParPapa" name="parentesco_familiar" class="custom-control-input"
                        value="Papá">
                      <label class="custom-control-label" for="radioParPapa">Papá</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="radioParOtro" name="parentesco_familiar" class="custom-control-input"
                        value="Otro">
                      <label class="custom-control-label" for="radioParOtro">Otro</label>
                    </div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="form-group">
                    <label for="cual_parentesco">¿Cuál?</label>
                    <input type="text" name="cual_parentesco" id="cual_parentesco" class="form-control"
                      placeholder="¿Cuál?">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md">
                  <div class="form-group">
                    <label for="nivel_educativo">Nivel Educativo</label>
                    {{ Form::select('nivel_educativo', $formaciones, null, ['class'=>
                    'form-control
                    select2-single', 'id'=>'nivel_educativo', 'placeholder' =>
                    'Seleccione...', 'style'=>'width:100%;']) }}
                  </div>
                </div>
                <div class="col-md">
                  <div class="form-group">
                    <label for="situacion_laboral_fam">Situación Laboral</label>
                    <input type="text" name="situacion_laboral_fam" id="situacion_laboral_fam" class="form-control"
                      placeholder="Situación Laboral">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center hiddenFam">
      <a class="pointer btn bg-cyan text-white btn-elevate btn-pill" title="Agregar" id="agregarInfoFamiliar">
        <span><i class="fa fa-plus"></i><span> Agregar</span></span>
      </a>
    </div>
    <input type="hidden" name="jsonTable" id="jsonTable">
    <div class="row mt-2 hiddenFam">
      <div class="col-md-12">
        <div class="table-responsive">
          <table id="tableInfoFamiliar"
            class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline mb-0"
            cellspacing="0" style="white-space: inherit!important;">
            <thead>
              <tr>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Parentezco</th>
                <th>¿Cual?</th>
                <th>Nivel Educativo</th>
                <th>Situación Laboral</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody id="bodyInfoFamiliar">
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-sm-offset-1 col-sm-12">
        <div class="card card-accent-warning">
          <div class="card-header font-weight-bold">ASPECTOS DE FAMILIA Y VIVIENDA ACTUAL</div>
          <div class="card-body">
            <div class="row">
              <div class="col-md">
                <label for="clasificacion_familiar">Clasificación del grupo familiar</label>
                <div class="form-group">
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radioNuclear" name="clasificacion_familiar" class="custom-control-input"
                      value="Nuclear">
                    <label class="custom-control-label" for="radioNuclear">A. Nuclear
                      (Esposo, solos o con hijos)</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radioMonoparental" name="clasificacion_familiar"
                      class="custom-control-input" value="Monoparental">
                    <label class="custom-control-label" for="radioMonoparental">B.
                      Monoparental (un solo padre con hijos)</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radioExtensa" name="clasificacion_familiar" class="custom-control-input"
                      value="Extensa">
                    <label class="custom-control-label" for="radioExtensa">C. Extensa
                      (familia nuclear o monoparental que vivan con abuelos, tíos,
                      sobrinos, nietos u otros)</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radioAmpliada" name="clasificacion_familiar" class="custom-control-input"
                      value="Ampliada">
                    <label class="custom-control-label" for="radioAmpliada">D. Ampliada
                      (grupos de hermanos, primos u otras uniones diferentes)</label>
                  </div>
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label for="especificar_ampiada">Especifique en caso de ser necesario</label>
                  <textarea name="especificar_ampiada" id="especificar_ampiada" class="form-control"
                    rows="5"></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md">
                <label for="tipo_vivienda">Tipo de vivienda</label>
                <div class="form-group">
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radioViveCasa" name="tipo_vivienda" class="custom-control-input"
                      value="Casa" required>
                    <label class="custom-control-label" for="radioViveCasa">Casa</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radioViveApto" name="tipo_vivienda" class="custom-control-input"
                      value="Apartamento" required>
                    <label class="custom-control-label" for="radioViveApto">Apartamento</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radioViveHab" name="tipo_vivienda" class="custom-control-input"
                      value="Habitación" required>
                    <label class="custom-control-label" for="radioViveHab">Habitación</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radioViveOtro" name="tipo_vivienda" class="custom-control-input"
                      value="Otro" required>
                    <label class="custom-control-label" for="radioViveOtro">Otro</label>
                  </div>
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label for="cual_vivienda">¿Cuál?</label>
                  <input type="text" name="cual_vivienda" id="cual_vivienda" class="form-control" placeholder="¿Cuál?">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md">
                <label for="propia_vivienda">La vivienda es</label>
                <div class="form-group">
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radioarriendo" name="propia_vivienda" class="custom-control-input"
                      value="Arriendo" required>
                    <label class="custom-control-label" for="radioarriendo">Arriendo</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radioFimiliar" name="propia_vivienda" class="custom-control-input"
                      value="Familiar" required>
                    <label class="custom-control-label" for="radioFimiliar">Familiar</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radioPropia" name="propia_vivienda" class="custom-control-input"
                      value="Propia" required>
                    <label class="custom-control-label" for="radioPropia">Propia</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radioViviendaOtro" name="propia_vivienda" class="custom-control-input"
                      value="Otro" required>
                    <label class="custom-control-label" for="radioViviendaOtro">Otro</label>
                  </div>
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label for="cual_vivienda_otro">¿Cuál?</label>
                  <input type="text" name="cual_vivienda_otro" id="cual_vivienda_otro" class="form-control"
                    placeholder="¿Cuál?">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col md">
                <div class="form-group">
                  <label>La vivienda cuenta con</label>
                  <div class="form-group row">
                    <label class="col-md col-form-label" for="checkBaño">Baño</label>
                    <div class="col-md">
                      <label class="switch switch-label switch-pill switch-outline-success">
                        <input class="switch-input" name="checkBaño" type="checkbox" id="checkBaño">
                        <span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
                      </label>
                    </div>
                    <label class="col-md col-form-label" for="checkLuz">Luz</label>
                    <div class="col-md">
                      <label class="switch switch-label switch-pill switch-outline-success">
                        <input class="switch-input" name="checkLuz" type="checkbox" id="checkLuz">
                        <span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
                      </label>
                    </div>
                    <label class="col-md col-form-label" for="checkAgua">Agua</label>
                    <div class="col-md">
                      <label class="switch switch-label switch-pill switch-outline-success">
                        <input class="switch-input" name="checkAgua" type="checkbox" id="checkAgua">
                        <span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
                      </label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md col-form-label" for="checkGas">Gas</label>
                    <div class="col-md">
                      <label class="switch switch-label switch-pill switch-outline-success">
                        <input class="switch-input" name="checkGas" type="checkbox" id="checkGas">
                        <span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
                      </label>
                    </div>
                    <label class="col-md col-form-label" for="checkTeléfono">Teléfono</label>
                    <div class="col-md">
                      <label class="switch switch-label switch-pill switch-outline-success">
                        <input class="switch-input" name="checkTeléfono" type="checkbox" id="checkTeléfono">
                        <span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
                      </label>
                    </div>
                    <label class="col-md col-form-label" for="checkInternet">Internet</label>
                    <div class="col-md">
                      <label class="switch switch-label switch-pill switch-outline-success">
                        <input class="switch-input" name="checkInternet" type="checkbox" id="checkInternet">
                        <span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col md">
                <div class="form-group">
                  <label>Pisos</label>
                  <div class="form-group row">
                    <label class="col-md col-form-label" for="checkBaldosa">Baldosa</label>
                    <div class="col-md">
                      <label class="switch switch-label switch-pill switch-outline-success">
                        <input class="switch-input" name="checkBaldosa" type="checkbox" id="checkBaldosa">
                        <span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
                      </label>
                    </div>
                    <label class="col-md col-form-label" for="checkCemento">Cemento</label>
                    <div class="col-md">
                      <label class="switch switch-label switch-pill switch-outline-success">
                        <input class="switch-input" name="checkCemento" type="checkbox" id="checkCemento">
                        <span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
                      </label>
                    </div>
                    <label class="col-md col-form-label" for="checkCeramica">Cerámica</label>
                    <div class="col-md">
                      <label class="switch switch-label switch-pill switch-outline-success">
                        <input class="switch-input" name="checkCeramica" type="checkbox" id="checkCeramica">
                        <span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <label class="font-weight-bold">Aspectos socioeconómicos</label>
            <div class="row">
              <div class="col-md">
                <label for="aporte_economico">¿Alguien más aporta económicamente para satisfacer las necesidades
                  básicas?</label>
                <div class="form-group">
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radioAporteSi" name="aporte_economico" class="custom-control-input"
                      value="Si" required>
                    <label class="custom-control-label" for="radioAporteSi">Si</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radioAporteNo" name="aporte_economico" class="custom-control-input"
                      value="No" required>
                    <label class="custom-control-label" for="radioAporteNo">No</label>
                  </div>
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label for="nombres_fam_aporte">Nombres</label>
                  <input type="text" name="nombres_fam_aporte" id="nombres_fam_aporte" class="form-control"
                    placeholder="Nombres Completos">
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label for="apellidos_fam_aporte">Apellidos</label>
                  <input type="text" name="apellidos_fam_aporte" id="apellidos_fam_aporte" class="form-control"
                    placeholder="Apellidos Completos">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md">
                <div class="form-group">
                  <label for="parentesco_fam_aporte">Parentesco</label>
                  <input type="text" name="parentesco_fam_aporte" id="parentesco_fam_aporte" class="form-control"
                    placeholder="Parentesco">
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label for="ocupacion_fam_aporte">Ocupación</label>
                  <input type="text" name="ocupacion_fam_aporte" id="ocupacion_fam_aporte" class="form-control"
                    placeholder="Ocupación">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-sm-offset-1 col-sm-12">
        <div class="card card-accent-warning">
          <div class="card-header font-weight-bold">ANOTACIONES DEL ENCUESTADOR </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md">
                <label for="documentos_pendientes">¿Ha quedado pendiente algún documento por
                  entregar?</label>
                <div class="form-group">
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radioDocsPendSi" name="documentos_pendientes" class="custom-control-input"
                      value="Si" required>
                    <label class="custom-control-label" for="radioDocsPendSi">Si</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radioDocsPendNo" name="documentos_pendientes" class="custom-control-input"
                      value="No" required>
                    <label class="custom-control-label" for="radioDocsPendNo">No</label>
                  </div>
                </div>
              </div>
              <div class="col-md">
                <label for="veracidad">¿En la visita se logró constatar la veracidad de la
                  información registrada en la hoja de vida?</label>
                <div class="form-group">
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radioVeracidadSi" name="veracidad" class="custom-control-input" value="Si"
                      required>
                    <label class="custom-control-label" for="radioVeracidadSi">Si</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radioVeracidadNo" name="veracidad" class="custom-control-input" value="No"
                      required>
                    <label class="custom-control-label" for="radioVeracidadNo">No</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md">
                <div class="form-group">
                  <label for="obs">Observaciones</label>
                  <textarea name="obs" id="obs" class="form-control" rows="2" required></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-md-8 mx-auto">
        <div class="form-group">
          <label for="images_evidence">Evidencia Fotográfica </label>
          <div class="custom-file">
            <input type="file" multiple="multiple" class="custom-file-input form-control" id="images_evidence"
              name="images_evidence[]" accept="image/*" style="cursor: pointer;" lang="es">
            <label class="custom-file-label" for="images_evidence" data-browse="Seleccionar">
              Seleccione una o más imagenes
            </label>
          </div>
        </div>
      </div>
      <div class="col-md-8 mx-auto">
        <div class="form-group">
          <label for="btn_images" style="color:#fff;">_</label>
          <div class="text-center">
            <input type="button" class="btn btn-primary" id="btn_images" name="btn_images" value="Agregar">
          </div>
        </div>
      </div>
    </div>
    <input type="hidden" name="jsonImages" id="jsonImages">
    <div class="row col-md-8 mx-auto">
      <div class="table-responsive dataTable">
        <table id="tableImages" class="theadcolor table  table-bordered">
          <thead>
            <tr>
              <th>Imagen</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="bodyImages">
          </tbody>
        </table>
      </div>
    </div>
    <hr>
    <div class="row">
      <div id="main_content_wrap" class="outer m-portlet__foot mx-auto mb-3 mt-3">
        <section id="main_content" class="inner">
          <div style="text-align: center">
            <h6>Aspirante</h6>
            <canvas class="sketchpad" id="sketchpad" height="108" style="cursor: pointer;">
            </canvas>
            <input type="hidden" name="firmaBase64" id="firmaBase64">
            <h6 id="lblNombreAsp">Nombre</h6>
            <h6 id="lblDocAsp">Documento</h6>
          </div>
          <div style="text-align: center">
            <input type="button" class="btn btn-danger" id="clear" value="Borrar Firma"
              onclick="clear(); return false;">
          </div>
        </section>
      </div>
      <div id="main_content_wrap" class="outer m-portlet__foot mx-auto mb-3 mt-3">
        <section id="main_content" class="inner">
          <div style="text-align: center">
            <h6>Entrevistador</h6>
            <canvas class="sketchpad2" id="sketchpad2" height="108" style="cursor: pointer;">
            </canvas>
            <input type="hidden" name="firmaBase642" id="firmaBase642">
            <h6>{{ Auth::user()->name }}</h6>
            <h6>{{ Auth::user()->identification }}</h6>
          </div>
          <div style="text-align: center">
            <input type="button" class="btn btn-danger" id="clear2" value="Borrar Firma"
              onclick="clear2(); return false;">
          </div>
        </section>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    {{ Form::submit('Registrar', array('class' => 'btn btn-success')) }}
    <a href="{{route('homevisits.index')}}" class="btn btn-secondary">Regresar</a>
  </div>
</form>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/homevisits/gestion_create.js') }}"></script>
<script src="{{ asset('js/deliveryendowment/sketchpad.js') }}"></script>
@endsection