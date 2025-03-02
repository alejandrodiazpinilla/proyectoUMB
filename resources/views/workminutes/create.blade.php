@extends('layouts.app.app')
@section('titulo')
    Creación Actas De Reunión
@endsection
@section('content')
<style>
    .sketchpad {
      background: #FFF;
      width: 288px;
      height: 108px;
      border-radius: 2px;

      -webkit-box-shadow: 2px 2px 5px 0px rgba(50, 50, 50, 0.75);
      -moz-box-shadow: 2px 2px 5px 0px rgba(50, 50, 50, 0.75);
      box-shadow: 2px 2px 5px 0px rgba(50, 50, 50, 0.75);
    }
  </style>
<a href="{{ route('workminutes.index') }}" class="btn btn-dark btn-elevate btn-pill" title="Regresar">
    <span>Regresar</span>
</a>
<hr>
<form id="form_crear" data-toggle="validator" role ="form" enctype="multipart/form-data">
    @csrf
    <div class="col-12 mb-3">
        <span style="text-transform: uppercase; font-weight: 900; font-size: 110%">AGREGAR REUNIÓN</span>
    </div>
    <hr>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="consecutivo">Consecutivo:</label>
                    <input autofocus type="number" minlength="1" maxlength="10" min="1" name="consecutivo"
                    id="consecutivo" class="form-control blockNums" pattern="[0-9]"
                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)"
                    onkeypress="if (this.value == 'e') return false" />
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="Fecha">Fecha Ejecución:</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" max="{{ $maxDate }}" required/>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="area">Área:</label>
                    <select name="area" id="area" class="form-control select2-single" style="width: 100%">
                        <option value="" disabled selected>Seleccione...</option>
                        @foreach ($areas as $id => $area)
                        <option value="{{ $id }}">{{ $area }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="empresa_id">Empresa</label>
                    {{ Form::select('empresa_id', $empresas, null, ['class'=> 'form-control select2-single', 'id'=>'empresa_id', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="tema">Tema</label>
                    <input type="text" name="tema" id="tema" class="form-control" placeholder="Tema" required/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="lugar">Lugar</label>
                    <input type="text" name="lugar" id="lugar" class="form-control" placeholder="Lugar" required/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="lider">Liderada por:</label>
                    <select name="lider" id="lider" class="form-control select2-single" style="width: 100%">
                        <option value="" disabled selected>Seleccione...</option>
                        @foreach ($usuarios as $id => $usuario)
                        <option value="{{ $id }}">{{ $usuario }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inicio">Hora Inicio:</label>
                    <input type="time" name="inicio" id="inicio" class="form-control" required/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cierre">Hora Finalización:</label>
                    <input type="time" name="cierre" id="cierre" class="form-control" required/>
                </div>
            </div>
        </div>
        <hr>
        <div class="col-12 mb-3">
            <span style="text-transform: uppercase; font-weight: 900; font-size: 110%">Orden Del Día</span>
        </div>
        <hr>
        <input type="hidden" id="jsonOrden" name="jsonOrden">
        <div class="row">
            <div class="col-md-10">
                <div class="form-group">
                    <input placeholder="Punto Orden Del Día" type="text" name="item" id="item" class="form-control"/>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <button type="button" id="addOrder" class="btn btn-block btn-success">Agregar</button>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="orden_table" class="table table-striped theadcolor table-hover">
                <thead>
                    <tr>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="items">
                </tbody>
            </table>
        </div>
        <hr>
        <div class="col-12 mb-3">
            <span style="text-transform: uppercase; font-weight: 900; font-size: 110%">Desarrollo Reunión</span>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <textarea class="form-control" name="desarrollo" id="desarrollo" rows="2" placeholder="Desarrollo de la sesión"></textarea>
                </div>
            </div>
        </div>
        <hr>
        <div class="col-12 mb-3">
            <span style="text-transform: uppercase; font-weight: 900; font-size: 110%">Compromisos</span>
        </div>
        <hr>
        <input type="hidden" id="jsonCompromisos" name="jsonCompromisos">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="compromiso">Compromiso:</label>
                    <textarea class="form-control" name="compromiso" id="compromiso" rows="2" placeholder="Compromiso"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="responsable">Responsable:</label>
                    <select name="responsable" id="responsable" class="form-control select2-single" style="width: 100%">
                        <option value="" disabled selected>Seleccione...</option>
                        @foreach ($usuarios as $id => $usuario)
                        <option value="{{ $id }}">{{ $usuario }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="fecha_compromiso">Fecha:</label>
                    <input type="date" name="fecha_compromiso" id="fecha_compromiso" class="form-control" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="fecha_cierre">Cierre:</label>
                    <input type="date" name="fecha_cierre" id="fecha_cierre" class="form-control" />
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label class="text-white" for="addCompromiso">_</label>
                    <button type="button" id="addCompromiso" class="btn btn-block btn-success">Agregar</button>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="compromisos_table" class="table table-striped theadcolor table-hover">
                <thead>
                    <tr>
                        <th>Compromiso</th>
                        <th>Responsable</th>
                        <th>Fecha</th>
                        <th>Cierre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="compromisos">
                </tbody>
            </table>
        </div>
        <hr>
        <div class="col-12 mb-3">
            <span style="text-transform: uppercase; font-weight: 900; font-size: 110%">Asistentes</span>
        </div>
        <hr>
        <input type="hidden" id="jsonAsistentes" name="jsonAsistentes">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="cedula">Cedula:</label>
                    <input autofocus type="number" minlength="6" maxlength="10" min="50000" name="cedula"
                    id="cedula" class="form-control blockNums" pattern="[0-9]"
                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)"
                    onkeypress="if (this.value == 'e') return false" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control blockText">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="cargo">Cargo:</label>
                    <input type="text" name="cargo" id="cargo" class="form-control"/>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label class="text-white" for="addAsistente">_</label>
                    <button type="button" id="addAsistente" class="btn btn-block btn-success">Agregar</button>
                </div>
            </div>
        </div>
        <!-- ************* Inicio Firma*************** -->
        <div id="main_content_wrap" class="outer m-portlet__foot">
            <section id="main_content" class="inner">
              <div style="text-align: center">
                <canvas class="sketchpad" id="sketchpad" width="288" height="108" style="cursor: pointer;">
                </canvas>
              </div>
            </section>
          </div>
          <div id="main_content_wrap" class="outer mt-1 mb-1">
            <section id="main_content" class="inner">
              <div style="text-align: center">
                <input type="button" class="btn btn-danger" id="clear" value="Borrar Firma" onclick="javascript:clear();return false;">
              </div>
            </section>
          </div>
          <!-- ************* Fin Firma*************** -->
        <div class="table-responsive">
            <table id="asistentes_table" class="table table-striped theadcolor table-hover">
                <thead>
                    <tr>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Cargo</th>
                        <th>Firma</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="asistentes">
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Registrar</button>
            <a href="{{ route('workminutes.index') }}" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
</form>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{asset('js/deliveryendowment/sketchpad.js')}}"></script>
<script src="{{ asset('js/workminutes/gestioncreate.js') }}"></script>
@endsection