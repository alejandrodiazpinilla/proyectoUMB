@extends('layouts.app.app')
@section('titulo')Actualizar Proveedor @endsection
@section('content')
<style>
    .mw-50px{
        max-width: 50px;
    }
</style>
<form id="form_actualizar" data-toggle="validator" role="form" enctype="multipart/form-data">
    <div>
        <h5>Actualizar Proveedor</h5>
        <hr>
    </div>
    <div class="modal-body">
        {{ csrf_field() }}
        <input type="hidden" id="id" name="id" value="{{ Crypt::encryptString($proveedor->id) }}">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="company_id">Empresa</label>
                    {{ Form::select('company_id', $empresas, $proveedor->company_id, ['class'=> 'form-control
                    select2-single',
                    'id'=>'company_id', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;'])
                    }}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="city_id">Ciudad</label>
                    {{ Form::select('city_id', $ciudades, $proveedor->city_id, ['class'=> 'form-control select2-single',
                    'id'=>'city_id', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;'])
                    }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $proveedor->name }}"
                        required>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="nit">Nit</label>
                    <input type="number" min="2000000" minlength="7" maxlength="10" name="nit" id="nit"
                        class="form-control blockNums" title="7 a 10 caracteres" value="{{ $proveedor->nit }}" required
                        oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="telephone">Teléfono</label>
                    <input type="number" min="2000000" minlength="7" maxlength="10" name="telephone" id="telephone"
                        class="form-control blockNums" title="7 a 10 caracteres" value="{{ $proveedor->telephone }}"
                        required
                        oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                    <label for="address">Dirección</label>
                    <input type="text" name="address" id="address" class="form-control"
                        value="{{ $proveedor->address }}" required>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $proveedor->email }}"
                        required>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="economic_activity">Actividad Económica</label>
                    <select class='form-control select2-single' name="economic_activity" id="economic_activity"
                        required style="width:100%">
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <label for="rut">RUT</label>
                <div class="form-group">
                    <div class="btn-group w-100" role="group">
                        <div class="btn btn-secondary btnRut" type="button"><label class="lblRut pointer">Seleccione...</label></div>
                        <input type="file" id="doc_rut" name="doc_rut" accept="application/pdf" hidden>
                        <a href="/Adjuntos/Proveedores/{{ $proveedor->rut }}" class="btn btn-dark mw-50px" download type="button"><i class="fa fa-download"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <label>Cámara de Comercio</label>
                <div class="form-group">
                    <div class="btn-group w-100" role="group">
                        <div class="btn btn-secondary btnCc" type="button"><label class="lblCc pointer">Seleccione...</label></div>
                        <input type="file" id="camara_comercio" name="camara_comercio" accept="application/pdf" hidden>
                        <a href="/Adjuntos/Proveedores/{{ $proveedor->chamber_commerce }}" class="btn btn-dark mw-50px" download type="button"><i class="fa fa-download"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <label>Certificación Bancaria</label>
                <div class="form-group">
                    <div class="btn-group w-100" role="group">
                        <div class="btn btn-secondary btnCb" type="button"><label class="lblCb pointer">Seleccione...</label></div>
                        <input type="file" id="cert_bancaria" name="cert_bancaria" accept="application/pdf" hidden>
                        <a href="/Adjuntos/Proveedores/{{ $proveedor->bank_certification }}" class="btn btn-dark mw-50px" download type="button"><i class="fa fa-download"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                    <label for="opening_hours">Horario de Atención</label>
                    <input type="text" class="form-control" id="opening_hours" name="opening_hours" value="{{ $proveedor->opening_hours }}">
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="webpage">Página Web</label>
                    <input type="url" class="form-control" id="webpage" name="webpage"
                        value="{{ $proveedor->webpage }}" />
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="payment_condition_id">Condición de Pago</label>
                    {{ Form::select('payment_condition_id', $condiciones, $proveedor->payment_condition_id, ['class'=>
                    'form-control select2-single',
                    'id'=>'payment_condition_id', 'required' => 'true', 'placeholder' => 'Seleccione...',
                    'style'=>'width:100%;'])}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                    <label for="contact_name">Nombre Persona de Contacto</label>
                    <input type="text" name="contact_name" id="contact_name" class="form-control blockText"
                        value="{{ $proveedor->contact_name }}" required>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="contact_telephone">Teléfono Persona de Contacto</label>
                    <input type="number" min="2000000" minlength="7" maxlength="10" name="contact_telephone"
                        id="contact_telephone" class="form-control blockNums" title="7 a 10 caracteres"
                        value="{{ $proveedor->contact_telephone }}" required
                        oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="contact_email">Email Persona de Contacto</label>
                    <input type="email" name="contact_email" id="contact_email" class="form-control"
                        value="{{ $proveedor->contact_email }}" required>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        {{ Form::submit('Actualizar', array('class' => 'btn btn-success')) }}
        <a href="{{route('providers.index')}}" type="button" class="btn btn-secondary">Regresar</a>
    </div>
</form>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/providers/edit.js') }}"></script>
@endsection