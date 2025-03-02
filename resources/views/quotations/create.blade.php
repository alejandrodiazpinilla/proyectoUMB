@extends('layouts.app.app')
@section('titulo')Crear Cotización @endsection
@section('content')
<form id="form_crear" data-toggle="validator" role="form" enctype="multipart/form-data">
  @csrf
  <div>
    <h5>Agregar Cotización</h5>
    <hr>
  </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="company_id">Empresa</label>
          {{ Form::select('company_id', $empresas, null, ['class'=> 'form-control select2-single',
          'id'=>'company_id', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;'])
          }}
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="producto">Producto</label>
          <input autofocus type="text" name="producto" id="producto" class="form-control">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="producto">Cantidad</label>
          <input type="number" minlength="1" maxlength="4" min="1" name="cantidad" id="cantidad" class="form-control blockNums" pattern="[0-9]" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)" onkeypress="if (this.value == 'e') return false"/>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <div class="col-md">
              <div class="form-group">
                <label for="prov1">Proveedor1</label>
                {{ Form::select('prov1', $proveedores, null, ['class'=> 'form-control select2-single',
                'id'=>'prov1', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;'])
                }}
              </div>
            </div>
            <div class="col-md">
              <div class="form-group">
                <label for="cond_pago1">Condición de Pago</label>
                {{ Form::select('cond_pago1', $condiciones, null, ['class'=> 'form-control select2-single',
                'id'=>'cond_pago1', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;'])
                }}
              </div>
            </div>
            <div class="col-md row mx-auto">
              <div class="form-group col-md">
                <label for="costo1">Costo</label>
                <input type="text" name="costo1" id="costo1" class="form-control" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" autocomplete="off">
              </div>
            </div>
            <div class="col-md text-center">
              <div class="custom-control custom-checkbox ml-3">
                <input type="checkbox" class="custom-control-input" id="check1">
                <label class="custom-control-label" for="check1">No Aplica</label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <div class="col-md">
              <div class="form-group">
                <label for="prov2">Proveedor2</label>
                {{ Form::select('prov2', $proveedores, null, ['class'=> 'form-control select2-single',
                'id'=>'prov2', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;'])
                }}
              </div>
            </div>
            <div class="col-md">
              <div class="form-group">
                <label for="cond_pago2">Condición de Pago</label>
                {{ Form::select('cond_pago2', $condiciones, null, ['class'=> 'form-control select2-single',
                'id'=>'cond_pago2', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;'])
                }}
              </div>
            </div>
            <div class="col-md row mx-auto">
              <div class="form-group col-md">
                <label for="costo2">Costo</label>
                <input type="text" name="costo2" id="costo2" class="form-control" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" autocomplete="off">
              </div>
            </div>
            <div class="col-md text-center">
              <div class="custom-control custom-checkbox ml-3">
                <input type="checkbox" class="custom-control-input" id="check2">
                <label class="custom-control-label" for="check2">No Aplica</label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <div class="col-md">
              <div class="form-group">
                <label for="prov3">Proveedor3</label>
                {{ Form::select('prov3', $proveedores, null, ['class'=> 'form-control select2-single',
                'id'=>'prov3', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;'])
                }}
              </div>
            </div>
            <div class="col-md">
              <div class="form-group">
                <label for="cond_pago3">Condición de Pago</label>
                {{ Form::select('cond_pago3', $condiciones, null, ['class'=> 'form-control select2-single',
                'id'=>'cond_pago3', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;'])
                }}
              </div>
            </div>
            <div class="col-md row mx-auto">
              <div class="form-group col-md">
                <label for="costo3">Costo</label>
                <input type="text" name="costo3" id="costo3" class="form-control" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" autocomplete="off">
              </div>
            </div>
            <div class="col-md text-center">
              <div class="custom-control custom-checkbox ml-3">
                <input type="checkbox" class="custom-control-input" id="check3">
                <label class="custom-control-label" for="check3">No Aplica</label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="text-center">
      <input type="button" class="btn bg-cyan text-white btnAgregar" value="Agregar"/>
    </div>

    <div class="row mt-4">
      <div class="table-responsive">
        <table id="quotations_table"
          class="theadcolor table table-striped table-hover table-checkable dataTable no-footer dtr-inline"
          cellspacing="0" style="white-space: inherit!important;">
          <thead>
            <tr>
              <th colspan="1" class="bg-white border-0 rounded-0"></th>
              <th colspan="1" class="bg-white border-0 rounded-0"></th>
              <th colspan="2" id="spanP1" style="border-top-left-radius: 10px !important;">Proveedor1</th>
              <th colspan="2" id="spanP2">Proveedor2</th>
              <th colspan="2" id="spanP3" style="border-top-right-radius: 10px !important;">Proveedor3</th>
              <th colspan="1" class="bg-white border-0 rounded-0"></th>
            </tr>
            <tr>
              <th class="border-right">Producto</th>
              <th>Cantidad</th>
              <th class="border-left">Costo</th>
              <th>Condición de Pago</th>
              <th class="border-left">Costo</th>
              <th>Condición de Pago</th>
              <th class="border-left">Costo</th>
              <th>Condición de Pago</th>
              <th class="border-left">Acciones</th>
            </tr>
          </thead>
          <tbody id="tbQuotation">
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    {{ Form::submit('Registrar', array('class' => 'btn btn-success')) }}
    <a href="{{route('quotations.index')}}" type="button" class="btn btn-secondary">Regresar</a>
  </div>
</form>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/quotations/create.js') }}"></script>
@endsection