@extends('layouts.app.app')
@section('titulo')Crear Proveedor @endsection
@section('content')
<form id="form_crear" data-toggle="validator" role="form" enctype="multipart/form-data">
    <div>
        <h5>Agregar Proveedor</h5>
        <hr>
    </div>
    <div class="modal-body">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="company_id">Empresa</label>
                    {{ Form::select('company_id', $empresas, null, ['class'=> 'form-control select2-single',
                    'id'=>'company_id', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;'])
                    }}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="city_id">Ciudad</label>
                    {{ Form::select('city_id', $ciudades, null, ['class'=> 'form-control select2-single',
                    'id'=>'city_id', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;'])
                    }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col md">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
            </div>
            <div class="col md">
                <div class="form-group">
                    <label for="nit">Nit</label>
                    <input type="number" min="2000000" minlength="7" maxlength="10" name="nit" id="nit" class="form-control blockNums" title="7 a 10 caracteres" required oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>
                </div>
            </div>
            <div class="col md">
                <div class="form-group">
                    <label for="telephone">Teléfono</label>
                    <input type="number" min="2000000" minlength="7" maxlength="10" name="telephone" id="telephone" class="form-control blockNums" title="7 a 10 caracteres" required oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col md">
                <div class="form-group">
                    <label for="address">Dirección</label>
                    <input type="text" name="address" id="address" class="form-control" required>
                </div>
            </div>
            <div class="col md">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
            </div>
            <div class="col md">
                <div class="form-group">
                    <label for="economic_activity">Actividad Económica</label>
                    <select class='form-control select2-single' name="economic_activity" id="economic_activity">
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col md">
                <div class="form-group">
                    <label >RUT</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input form-control pointer"
                            id="doc_rut" name="doc_rut" lang="es"
                            accept="application/pdf" required>
                        <label class="custom-file-label" for="doc_rut" data-browse="PDF">
                            Seleccione un archivo
                        </label>
                    </div>
                </div>
            </div>
            <div class="col md">
                <div class="form-group">
                    <label>Cámara de Comercio</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input form-control pointer"
                            id="camara_comercio" name="camara_comercio" lang="es"
                            accept="application/pdf" required>
                        <label class="custom-file-label" for="camara_comercio" data-browse="PDF">
                            Seleccione un archivo
                        </label>
                    </div>
                </div>
            </div>
            <div class="col md">
                <div class="form-group">
                    <label>Certificación Bancaria</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input form-control pointer"
                            id="cert_bancaria" name="cert_bancaria" lang="es"
                            accept="application/pdf" required>
                        <label class="custom-file-label" for="cert_bancaria" data-browse="PDF">
                            Seleccione un archivo
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col md">
                <div class="form-group">
                    <label for="opening_hours">Horario de Atención</label>
                    <input type="text" class="form-control" id="opening_hours" name="opening_hours">
                </div>
            </div>
            <div class="col md">
                <div class="form-group">
                    <label for="webpage">Página Web</label>
                    <input type="url" class="form-control" id="webpage" name="webpage"/>
                </div>
            </div>
            <div class="col md">
                <div class="form-group">
                    <label for="payment_condition_id">Condición de Pago</label>
                    {{ Form::select('payment_condition_id', $condiciones, null, ['class'=> 'form-control select2-single',
                    'id'=>'payment_condition_id', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;'])}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col md">
                <div class="form-group">
                    <label for="contact_name">Nombre Persona de Contacto</label>
                    <input type="text" name="contact_name" id="contact_name" class="form-control blockText" required>
                </div>
            </div>
            <div class="col md">
                <div class="form-group">
                    <label for="contact_telephone">Teléfono Persona de Contacto</label>
                    <input type="number" min="2000000" minlength="7" maxlength="10" name="contact_telephone" id="contact_telephone" class="form-control blockNums" title="7 a 10 caracteres" required oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>
                </div>
            </div>
            <div class="col md">
                <div class="form-group">
                    <label for="contact_email">Email Persona de Contacto</label>
                    <input type="email" name="contact_email" id="contact_email" class="form-control" required>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        {{ Form::submit('Registrar', array('class' => 'btn btn-success')) }}
        <a href="{{route('providers.index')}}" type="button" class="btn btn-secondary">Regresar</a>
    </div>
</form>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/providers/create.js') }}"></script>
@endsection