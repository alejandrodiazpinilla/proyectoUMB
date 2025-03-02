@extends('layouts.app.app')
@section('titulo')Crear Solicitud de Personal @endsection
@section('content')
<div class="card-body">
  <form id="form_crear" role="form" enctype="multipart/form-data">
    @csrf

    <div class="card card-accent-warning">
      <div class="card-header">Información General</div>
      <div class="card-body">
        <div class="row">
          <div class="col-md">
            <div class="form-group">
              <label for="area_id" class="font-weight-bold">Área que solicita el personal:</label>
              {{App\Models\Area::find(Auth::user()->areas[0]->area_id)->nombre}} 
            </div>
          </div>
          <div class="col-md">
            <div class="form-group">
              <label for="area_id" class="font-weight-bold">Solicitado Por:</label>
              {{Auth::user()->name}}
            </div>
          </div>
          <div class="col-md">
            <div class="form-group">
              <label for="area_id" class="font-weight-bold">Fecha de Solicitud:</label>
              {{date('d-m-Y h:i:s a')}}
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md">
            <div class="form-group">
              <fieldset class="form-group">
                <label class="font-weight-bold">Fecha Inducción:</label>
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-calendar"></i>
                    </span>
                  </span>
                  <input type="text" autocomplete="off" class="form-control" name="induction_date" id="induction_date"
                    placeholder="aaaa-mm-dd" required>
                </div>
              </fieldset>
            </div>
          </div>
          <div class="col-md">
            <div class="form-group">
              <label for="company_id" class="font-weight-bold">Empresa:</label>
              {{ Form::select('company_id', $empresas, null, ['class' => 'form-control select2-single', 'id' =>
              'company_id', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style' => 'width:100%;']) }}
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card card-accent-warning">
      <div class="card-header">Especificaciones de la Vacante</div>
      <div class="card-body">
        <div class="row">
          <div class="col-md">
            <div class="form-group">
              <label for="job_title" class="font-weight-bold">Nombre del Puesto:</label>
              <input type="text" name="job_title" id="job_title" class="form-control" required>
            </div>
          </div>
          <div class="col-md">
            <div class="form-group">
              <label for="customer_id" class="font-weight-bold">Cliente:</label>
              {{ Form::select('customer_id', $clientes, null, ['class' => 'form-control select2-single', 'id' =>
              'customer_id', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style' => 'width:100%;']) }}
            </div>
          </div>
          <div class="col-md">
            <div class="form-group">
              <label for="programming" class="font-weight-bold">Programación:</label>
              <input type="text" name="programming" id="programming" class="form-control" required>
            </div>
          </div>
          <div class="col-md">
            <div class="form-group">
              <label for="number_of_units" class="font-weight-bold">Cantidad de Unidades:</label>
              <input type="number" min="1" minlength="1" maxlength="4" name="number_of_units" id="number_of_units"
                class="form-control blockNums" title="1 a 4 caracteres" required
                oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
            </div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-md">
            <div class="form-group ">
              <label for="type" class="font-weight-bold">Motivo de la Vacante:</label>
              @foreach($tipos_vacantes as $val)
              <div class="custom-control custom-radio custom-control-inline ml-3 mr-3 mt-3">
                <input type="radio" id="radiov_{{$val->id}}" name="vacant_type_id" class="custom-control-input"
                  value="{{$val->id}}" required>
                <label class="custom-control-label" for="radiov_{{$val->id}}">{{$val->name}}</label>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-md">
            <div class="form-group ">
              <label for="type" class="font-weight-bold">Tipo de Contrato:</label>
              @foreach($tipos_contratos as $val)
              <div class="custom-control custom-radio custom-control-inline ml-3 mr-3 mt-3">
                <input type="radio" id="radioc_{{$val->id}}" name="contract_type_id" class="custom-control-input"
                  value="{{$val->id}}" required>
                <label class="custom-control-label" for="radioc_{{$val->id}}">{{$val->name}}</label>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md">
            <div class="form-group">
              <label for="salary_to_quote" class="font-weight-bold">Salario (Valor por el que cotiza):</label>
              <input type="text" name="salary_to_quote" id="salary_to_quote" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"
                data-type="currency" class="form-control" autocomplete="off" required>
            </div>
          </div>
          <div class="col-md">
            <div class="form-group">
              <label for="salary_to_accrue" class="font-weight-bold">Salario a Devengar:</label>
              <input type="text" name="salary_to_accrue" id="salary_to_accrue" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"
                data-type="currency" class="form-control" autocomplete="off" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md">
            <div class="form-group">
              <label for="reasson" class="font-weight-bold">Concepto:</label>
              <textarea name="reasson" id="reasson" class="form-control" rows="4" required></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card card-accent-warning">
      <div class="card-header">Perfil del Aspirante</div>
      <div class="card-body">
        <div class="row">
          <div class="col-md">
            <div class="form-group">
              <label for="units_male" class="font-weight-bold">Cantidad de Hombres:</label>
              <input type="number" min="1" minlength="1" maxlength="4" name="units_male" id="units_male"
                class="form-control blockNums" title="1 a 4 caracteres" required
                oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
            </div>
          </div>
          <div class="col-md">
            <div class="form-group">
              <label for="units_female" class="font-weight-bold">Cantidad de Mujeres:</label>
              <input type="number" min="1" minlength="1" maxlength="4" name="units_female" id="units_female"
                class="form-control blockNums" title="1 a 4 caracteres" required
                oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
            </div>
          </div>
          <div class="col-md">
            <div class="form-group">
              <label for="academic_degree" class="font-weight-bold">Formación Académica:</label>
              <input type="text" name="academic_degree" id="academic_degree" class="form-control" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md">
            <div class="form-group">
              <label for="age_range" class="font-weight-bold">Rango de Edad:</label>
              <input id="age_range" type="text" name="age_range" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="experience" class="font-weight-bold">Experiencia (Años):</label>
              <input type="number" min="0" minlength="1" maxlength="2" name="experience" id="experience" class="form-control blockNums" required oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md">
            <div class="form-group">
              <label for="competencies" class="font-weight-bold">Competencias:</label>
              <textarea name="competencies" id="competencies" class="form-control" rows="4" required></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="form-actions">
      <button class="btn btn-success" type="submit">Enviar</button>
      <a class="btn btn-secondary" type="button" href="{{route('staffrequest.index')}}">Regresar</a>
    </div>
  </form>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/staffrequest/gestion.js')}}"></script>
@endsection