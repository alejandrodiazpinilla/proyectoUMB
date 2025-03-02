@extends('layouts.app.app')
@section('titulo')Inspección de Ruta @endsection
@section('content')
<div id="accordion" role="tablist">
  <div class="card mb-0">
    <div class="card-header" id="headingOne" role="tab">
      <h5 class="mb-0">
        <a id="tab1" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fa fa-picture-o"></i> Foto Inicial</a>
      </h5>
    </div>
    <div class="collapse show" id="collapseOne" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <form id="form_crear" role="form" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-6 mx-auto">
              <div class="form-group">
                <label for="customer_id">Cliente</label>
                {{ Form::select('customer_id', $clientes, null, ['class'=> 'form-control select2-single',
                'id'=>'customer_id', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;'])}}
              </div>
            </div>
          </div>
          <div class="form-group row mx-auto">
            <div class="col-md-3 mx-auto pt-1">
              <input type="button" id="btnIniciar" class="btn btn-primary " value="Tomar Foto">
              <input type="button" id="btnTomarFoto" class="btn btn-primary " value="Tomar Foto" hidden>
            </div>
          </div>
          <div class="form-group row mx-auto">
            <div class="col-md-12 mx-auto pt-1">
              <video autoplay id="videoUs" style="max-width: 100%" hidden class="col-md-6 mx-auto"></video>
              <img src="" id="FotoUs">
              <input type="hidden" name="foto_usuario" id="foto_usuario" required>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <form id="formActualizar" role="form" enctype="multipart/form-data">
    @csrf
    
    <input type="hidden" name="id" id="id">
    <div class="card mb-0">
      <div class="card-header" id="headingTwo" role="tab">
        <h5 class="mb-0">
          <a class="collapsed" id="tab2" style="pointer-events: none;" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa fa-drivers-license-o"></i> Presentacion Personal Guarda</a>
        </h5>
      </div>
      <div class="collapse" id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">

          <div class="form-group row">
            <label class="col-md col-form-label" for="watchman_id">Guarda</label>
            <div class="col-md-8">
              {{ Form::select('watchman_id', $guardas, null, ['class'=> 'form-control select2-single',
              'id'=>'watchman_id', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;'])}}
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md col-form-label" for="checkCarnet">Carnet</label>
            <div class="col-md">
              <label class="switch switch-label switch-pill switch-outline-success">
                <input class="switch-input" type="checkbox" id="checkCarnet">
                <span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
              </label>
            </div>
            <div class="col-md-8">
              <textarea name="identity_card" id="identity_card" rows="1" class="form-control"></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md col-form-label" for="checkEscarapela">Escarapela</label>
            <div class="col-md">
              <label class="switch switch-label switch-pill switch-outline-success">
                <input class="switch-input" type="checkbox" id="checkEscarapela">
                <span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
              </label>
            </div>
            <div class="col-md-8">
              <textarea name="cockade" id="cockade" rows="1" class="form-control"></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md col-form-label" for="checkGorra">Gorra o Quepis</label>
            <div class="col-md">
              <label class="switch switch-label switch-pill switch-outline-success">
                <input class="switch-input" type="checkbox" id="checkGorra">
                <span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
              </label>
            </div>
            <div class="col-md-8">
              <textarea name="cap" id="cap" rows="1" class="form-control"></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md col-form-label" for="checkPpersonal">Presentación General</label>
            <div class="col-md">
              <label class="switch switch-label switch-pill switch-outline-success">
                <input class="switch-input" type="checkbox" id="checkPpersonal">
                <span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
              </label>
            </div>
            <div class="col-md-8">
              <textarea name="personal_presentation" id="personal_presentation" rows="1"
                class="form-control"></textarea>
            </div>
          </div>

          <div class="form-group row mx-auto">
            <div class="col-md-3 mx-auto">
              <input type="button" id="agregarGuarda" class="btn btn-success" value='Agregar'>
            </div>
          </div>
          <input type="hidden" name="jsonTableGuarda" id="jsonTableGuarda">

          <div class="row modal-footer" style="border-top: 0px solid !important;">
            <div class="col-md">
              <div class="table-responsive" style="max-height:300px;">
                <table id="personal_presentation_table" class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline mb-0" cellspacing="0" style="white-space: inherit !important;">
                  <thead>
                    <tr>
                      <th class="thWhite">id</th>
                      <th class="thWhite">Guarda</th>
                      <th class="thWhite">Carnet</th>
                      <th class="thWhite">Escarapela</th>
                      <th class="thWhite">Gorra o Quepis</th>
                      <th class="thWhite">Presentación Personal</th>
                      <th class="thWhite">Gestión</th>
                    </tr>
                  </thead>
                  <tbody id="body_guardas"></tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="card mb-0">
      <div class="card-header" id="headingThree" role="tab">
        <h5 class="mb-0">
          <a class="collapsed" id="tab3" style="pointer-events: none;" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><i class="fa fa-book"></i> Validación Minuta</a>
        </h5>
      </div>
      <div class="collapse" id="collapseThree" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
        <div class="card-body">

          <div class="form-group row">
            <label class="col-md col-form-label" for="checkVisitantes">Visitantes</label>
            <div class="col-md">
              <label class="switch switch-label switch-pill switch-outline-success">
                <input class="switch-input" type="checkbox" id="checkVisitantes">
                <span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
              </label>
            </div>
            <div class="col-md-8">
              <textarea name="visitors" id="visitors" rows="1" class="form-control"></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md col-form-label" for="checkCorrespondencia">Correspondencia</label>
            <div class="col-md">
              <label class="switch switch-label switch-pill switch-outline-success">
                <input class="switch-input" type="checkbox" id="checkCorrespondencia">
                <span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
              </label>
            </div>
            <div class="col-md-8">
              <textarea name="correspondence" id="correspondence" rows="1" class="form-control"></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md col-form-label" for="checkPuesto">Puesto</label>
            <div class="col-md">
              <label class="switch switch-label switch-pill switch-outline-success">
                <input class="switch-input" type="checkbox" id="checkPuesto">
                <span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
              </label>
            </div>
            <div class="col-md-8">
              <textarea name="workplace" id="workplace" rows="1" class="form-control"></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md col-form-label" for="checkParqueadero">Parqueadero</label>
            <div class="col-md">
              <label class="switch switch-label switch-pill switch-outline-success">
                <input class="switch-input" type="checkbox" id="checkParqueadero">
                <span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
              </label>
            </div>
            <div class="col-md-8">
              <textarea name="parking" id="parking" rows="1" class="form-control"></textarea>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="card mb-0">
      <div class="card-header" id="headingFour" role="tab">
        <h5 class="mb-0">
          <a class="collapsed" id="tab4" style="pointer-events: none;" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour"><i class="fa fa-exclamation-triangle"></i> Informe de Recomendaciones al Cliente (REVI)</a>
        </h5>
      </div>
      <div class="collapse" id="collapseFour" role="tabpanel" aria-labelledby="headingFour" data-parent="#accordion">
        <div class="card-body">
          <div class="row">
            <div class="col-md">
              <div class="form-group">
                <label for="nombre_revi">Tema a Evaluar</label>
                <input type="text" name="nombre_revi" id="nombre_revi" class="form-control">
              </div>
            </div>
            <div class="col-md">
              <div class="form-group">
                <label for="imagen_revi">Imagen(es)</label>
                <div class="custom-file">
                  <input type="file" multiple="multiple" class="custom-file-input form-control" id="imagen_revi" name="imagen_revi[]" accept="image/*" style="cursor: pointer;" required="" lang="es">
                  <label class="custom-file-label" for="imagen_revi" data-browse="Seleccionar">
                    Seleccione una o más imagenes
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md">
              <div class="form-group">
                <label for="descripcion_revi">Descripción</label>
                <textarea name="descripcion_revi" id="descripcion_revi" class="form-control" rows="5"></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 mx-auto">
              <input type="hidden" name="jsonTableRevi" id="jsonTableRevi">
              <input class="btn btn-success" id="agregarRevi" type="button" value="Agregar">
            </div>
          </div>
          <hr style="margin-bottom: 33px; border: 1px solid; margin-top: 3%;" class="mb-3 mt-3">
          <div
            class="table-responsive table table-striped theadcolor table-bordered table-hover table-checkable dataTable no-footer dtr-inline">
            <table id="tableRevi" style="width: 100%;">
              <thead>
                <tr>
                  <th>Imagen</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody id="bodyRevi">
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="card mb-0">
      <div class="card-header" id="headingFive" role="tab">
        <h5 class="mb-0">
          <a class="collapsed" id="tab5" style="pointer-events: none;" data-toggle="collapse" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive"><i class="fa fa-picture-o"></i> Foto Final</a>
        </h5>
      </div>
      <div class="collapse" id="collapseFive" role="tabpanel" aria-labelledby="headingFive" data-parent="#accordion">
        <div class="card-body">
          <div class="form-group row mx-auto">
            <div class="col-md-3 mx-auto pt-1">
              <input type="button" id="btnIniciar2" class="btn btn-primary " value="Tomar Foto">
              <input type="button" id="btnTomarFoto2" class="btn btn-primary " value="Tomar Foto" hidden>
            </div>
          </div>
          <div class="form-group row mx-auto">
            <div class="col-md-12 mx-auto pt-1">
              <video autoplay id="videoUs2" style="max-width: 100%" hidden class="col-md-6 mx-auto"></video>
              <img src="" id="FotoUs2" style="max-width: 100%" class="col-md-12 mx-auto">
              <input type="hidden" name="foto_usuario2" id="foto_usuario2" required>
            </div>
          </div>
          <div class="form-group row mx-auto">
            <div class="col-md-3 mx-auto">
              <input type="button" id="agregarInforme" class="btn btn-success" value='Finalizar' hidden>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/routeinspection/gestion.js')}}"></script>
@endsection