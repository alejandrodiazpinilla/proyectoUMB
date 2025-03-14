@extends('layouts.app.app')
@section('titulo')Editar Cliente @endsection
@section('content')
<style type="text/css">
    @media (min-width:100px) {
        .margin-top {
            width: 150px;
            margin: 0px auto;
            padding-top: 2px;
        }
    }

    .upload_image img {
        border: 1px solid #dadada;
    }

    .img-responsive {
        display: block;
        max-width: 100%;
        height: auto;
    }

    .margin-top {
        top: 25%;
        right: 0;
        left: 0;
        margin: 0 auto;
    }
</style>
<script>
    function previewImage(nb) {        
        var reader = new FileReader();         
        reader.readAsDataURL(document.getElementById('logo').files[0]);         
        reader.onload = function (e) {             
            document.getElementById('uploadPreview').src = e.target.result;         
        };     
    }  
</script>
<form id="form_actualizar" data-toggle="validator" role="form" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="id" id="id" value="{{ Crypt::encryptString($cliente->id) }}">
    <div>
        <h5>Actualizar Cliente</h5>
        <hr>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="row upload_image">
                    <div class="custom-file ">
                        <input type="file" class="custom-file-input form-control" id="logo" name="logo" lang="es"
                            accept="image/*" onchange="previewImage(1);" style="cursor: pointer;">
                        <label class="custom-file-label" for="logo" data-browse="Seleccionar">
                            Seleccione una imagen
                        </label>
                    </div>
                    <div class="col-md-3 margin-top">
                        <img id="uploadPreview" class="img-responsive" width="150" height="150"
                            src="{!! asset($cliente->logo?'image/logos/clientes/'.$cliente->logo:'image/logos/empresas/logo_aqui.png') !!}" />
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md">
                <div class="form-group">
                    <label for="company_id">Empresa</label>
                    {{ Form::select('company_id', $empresas, $cliente->company_id, ['class'=> 'form-control
                    select2-single', 'id'=>'company_id', 'required' => 'true', 'placeholder' => 'Seleccione...',
                    'style'=>'width:100%;']) }}
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required
                        value="{{ $cliente->name }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                    <label for="admin_name">Nombre Administrador</label>
                    <input type="text" name="admin_name" id="admin_name" class="form-control blockText"
                        placeholder="Nombre Administrador" value="{{ $cliente->admin_name }}">
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="telephone">Teléfono</label>                    
                    <input type="number" name="telephone" id="telephone" class="form-control blockNums" placeholder="Teléfono" min="2000000" minlength="7" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="{{ $cliente->telephone }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                        value="{{ $cliente->email }}">
                </div>
            </div>
            @if (empty($cliente->contract_init_date))
            <div class="col-md-6">
                <div class="form-group">
                    <fieldset class="form-group">
                        <label>Finalización de Contrato</label>
                        <div class="" data-toggle="tooltip" data-placement="left"
                            title="Fecha Final del Contrato actual">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </span>
                                <input type="text" autocomplete="off" class="form-control"
                                    name="current_contract_end_date" id="current_contract_end_date"
                                    placeholder="aaaa-mm-dd" value="{{ $cliente->current_contract_end_date }}">
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                    <label for="residential_units">Descripción de Necesidades</label>
                    <textarea name="residential_units" id="residential_units" class="form-control"
                        placeholder="Describa las necesidades actuales del cliente">{{ $cliente->residential_units }}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <h5 class="card-header text-info">Información Ubicación</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="address">Dirección</label>
                                    <input type="text" name="address" id="address" class="form-control"
                                        placeholder="Dirección" required value="{{ $cliente->address }}">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="city_id">Municipio</label>
                                    {{ Form::select('city_id', $ciudades, $cliente->city_id, ['class'=> 'form-control
                                    select2-single', 'id'=>'city_id', 'required' => 'true', 'placeholder' =>
                                    'Seleccione...', 'style'=>'width:100%;']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="locality_id">Localidad</label>
                                    {{ Form::select('locality_id', $localidades, $cliente->locality_id, ['class'=>
                                    'form-control select2-single', 'id'=>'locality_id', 'required' => 'true',
                                    'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="neighborhood_id">Barrio</label>
                                    {{ Form::select('neighborhood_id', $barrios, $cliente->neighborhood_id, ['class'=>
                                    'form-control select2-single', 'id'=>'neighborhood_id', 'required' => 'true',
                                    'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
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
                    <h5 class="card-header text-info">Adjuntos</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="economic_proposition">Propuesta Económica</label>
                                    <div class="custom-file ">
                                        <input type="file" class="custom-file-input form-control"
                                            id="economic_proposition" name="economic_proposition" lang="es"
                                            accept="application/pdf" style="cursor: pointer;">
                                        <label class="custom-file-label" for="logo" data-browse="PDF">
                                            Seleccione un archivo
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="check_economic_proposition">Enviar Por Email</label>
                                    <div class="" data-toggle="tooltip" data-placement="left"
                                        title="Se enviará email al cliente con la propuesta económica">
                                        <label class="switch switch-label switch-pill switch-outline-success-alt">
                                            <input class="switch-input" type="checkbox" id="check_economic_proposition"
                                                name="check_economic_proposition">
                                            <span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bidding">Licitación</label>
                                    <div class="custom-file ">
                                        <input type="file" class="custom-file-input form-control" id="bidding"
                                            name="bidding" lang="es" accept="application/pdf" style="cursor: pointer;">
                                        <label class="custom-file-label" for="logo" data-browse="PDF">
                                            Seleccione un archivo
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="check_bidding">Enviar Por Email</label>
                                    <div class="" data-toggle="tooltip" data-placement="left"
                                        title="Se enviará email al cliente con la licitación">
                                        <label class="switch switch-label switch-pill switch-outline-success-alt">
                                            <input class="switch-input" type="checkbox" id="check_bidding"
                                                name="check_bidding">
                                            <span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="risk_analysis">Análisis de Riesgos</label>
                                    <div class="custom-file ">
                                        <input type="file" class="custom-file-input form-control" id="risk_analysis"
                                            name="risk_analysis" lang="es" accept="application/pdf"
                                            style="cursor: pointer;">
                                        <label class="custom-file-label" for="logo" data-browse="PDF">
                                            Seleccione un archivo
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="year_of_execution">Año de Ejecución</label>
                                    <input type="number" min="2022" max="2050" minlength="4" maxlength="4" name="year_of_execution" id="year_of_execution" class="form-control blockNums" placeholder="Ejemplo:2022" title="4 caracteres" required oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="check_risk">Enviar Por Email</label>
                                    <div class="" data-toggle="tooltip" data-placement="left"
                                        title="Se enviará email al cliente con el análisis de riesgos">
                                        <label class="switch switch-label switch-pill switch-outline-success-alt">
                                            <input class="switch-input" type="checkbox" id="check_risk"
                                                name="check_risk">
                                            <span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header text-info">Contrato Comercial</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="file_contract">Archivo del Contrato Firmado</label>
                                    <div class="custom-file ">
                                        <input type="file" class="custom-file-input form-control"
                                            id="file_contract" name="file_contract" lang="es"
                                            accept="application/pdf" style="cursor: pointer;">
                                        <label class="custom-file-label" for="logo" data-browse="PDF">
                                            Seleccione un archivo
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="check_file_contract">Enviar Por Email</label>
                                    <div class="" data-toggle="tooltip" data-placement="left"
                                        title="Se enviará email al cliente con el contrato firmado">
                                        <label class="switch switch-label switch-pill switch-outline-success-alt">
                                            <input class="switch-input" type="checkbox" id="check_file_contract"
                                                name="check_file_contract">
                                            <span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <fieldset class="form-group">
                                        <label>Inicio de Contrato</label>
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </span>
                                            <input type="text" autocomplete="off" class="form-control" name="contract_init_date"
                                                id="contract_init_date" placeholder="aaaa-mm-dd" value="{{ $cliente->contract_init_date }}">
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <fieldset class="form-group">
                                        <label>Fin de Contrato</label>
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </span>
                                            <input type="text" autocomplete="off" class="form-control" name="contract_end_date"
                                                id="contract_end_date" placeholder="aaaa-mm-dd" value="{{ $cliente->contract_end_date }}">
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            {{ Form::submit('Actualizar', array('class' => 'btn btn-success')) }}
            <a href="{{route('customers.index')}}" type="button" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
</form>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/customers/gestion.js') }}"></script>
<script>
    $(document).ready(function () {
    $('#current_contract_end_date').daterangepicker({
    opens: 'right',
    drops: 'down',
    singleDatePicker: true,
    showDropdowns: true,
    minDate: moment().subtract(0, 'days'),
    maxDate: moment().add(5, 'years'),
    locale: {
        format: 'YYYY-MM-DD',
        firstDay: 1
    }
    }).val('{{ $cliente->current_contract_end_date??"" }}');

    $('#contract_init_date').daterangepicker({
    opens: 'right',
    drops: 'down',
    singleDatePicker: true,
    showDropdowns: true,
    minDate: moment().subtract(0, 'days'),
    maxDate: moment().add(5, 'years'),
    locale: {
        format: 'YYYY-MM-DD',
        firstDay: 1
    }
    }).val('{{ $cliente->contract_init_date??"" }}');

    $('#contract_end_date').daterangepicker({
    opens: 'right',
    drops: 'down',
    singleDatePicker: true,
    showDropdowns: true,
    minDate: moment().subtract(0, 'days'),
    maxDate: moment().add(5, 'years'),
    locale: {
        format: 'YYYY-MM-DD',
        firstDay: 1
    }
    }).val('{{ $cliente->contract_end_date??"" }}');
});
</script>
@endsection