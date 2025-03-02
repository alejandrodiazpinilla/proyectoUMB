@extends('layouts.app.app')
@section('titulo')Banco de Hojas de Vida @endsection
@section('content')
<div>
    @if (Auth::user()->hasrole('root') || Auth::user()->can('crear_hdv'))
    <a href="#" data-toggle="modal" data-target="#modal_crear" class="btn btn-dark btn-pill" title="Crear">
        <span>Crear</span>
    </a>
    <hr>
    @endif
    <div id="accordion" role="tablist">
        <div class="card mb-0">
            <div class="card-header" id="headingOne" role="tab">
                <h5 class="mb-0">
                    <a data-toggle="collapse" href="#cardFilter" aria-expanded="false" aria-controls="cardFilter"
                        class="collapsed arrows"> Criterios de Búsqueda 
                        <i class="pull-right fa fa-chevron-circle-down"></i>
                    </a>
                </h5>
            </div>
            <div class="collapse" id="cardFilter" role="tabpanel" aria-labelledby="headingOne"
                data-parent="#accordion" style="">
                <div class="card-body">
                    <form id="form_filter" data-toggle="validator" role="form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="company_id_filter">Empresa</label>
                                    {{ Form::select('company_id_filter', $empresas, null, ['class'=> 'form-control select2-single',
                                    'id'=>'company_id_filter', 'required' => 'true', 'placeholder' => 'Seleccione...',
                                    'style'=>'width:100%;']) }}
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="state_filter">Estado</label>
                                    <select name="state_filter" id="state_filter" class="form-control select2-single" style="width: 100%">
                                        <option value="" disabled selected>Seleccione</option>
                                        <option value="0">Disponible</option>
                                        <option value="1">Actualmente Contratado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="identification_filter">Número de Documento</label>
                                    <input type="number" minlength="6" maxlength="10" min="50000" name="identification_filter"
                                        id="identification_filter" class="form-control blockNums" title="6 a 11 caracteres"
                                        pattern="[0-9]"
                                        oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)"
                                        onkeypress="if (this.value == 'e') return false" />
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="name_filter">Nombres y Apellidos</label>
                                    <input type="text" name="name_filter" id="name_filter" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="email_filter">Email</label>
                                    <input type="email" name="email_filter" id="email_filter" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="telephone_filter">Número de Celular</label>
                                    <input type="number" min="2000000" minlength="7" maxlength="10" name="telephone_filter" pattern=""
                                        id="telephone_filter" class="form-control blockNums" title="7 a 10 caracteres"
                                        oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gender_filter">Género</label>
                                    <select name="gender_filter" id="gender_filter" class="form-control select2-single" style="width: 100%">
                                        <option value="" disabled selected>Seleccione</option>
                                        <option value="F">Femenino</option>
                                        <option value="M">Masculino</option>
                                        <option value="O">Otro</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="address_filter">Dirección</label>
                                    <input type="text" name="address_filter" id="address_filter" class="form-control">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="city_id_filter">Municipio</label>
                                    {{ Form::select('city_id_filter', $ciudades, null, ['class'=> 'form-control select2-single',
                                    'id'=>'city_id_filter', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
                                </div>
                            </div>
        
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="locality_id_filter">Localidad</label>
                                    {{ Form::select('locality_id_filter', $localidades, null, ['class'=> 'form-control select2-single',
                                    'id'=>'locality_id_filter', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;', 'disabled' =>
                                    'true']) }}
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="neighborhood_id_filter">Barrio</label>
                                    {{ Form::select('neighborhood_id_filter', $barrios, null, ['class'=> 'form-control select2-single',
                                    'id'=>'neighborhood_id_filter', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;',
                                    'disabled' => 'true']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                              <div class="form-group">
                                <label for="age_range" >Rango de Edad</label>
                                <input id="age_range" type="text" name="age_range" required>
                              </div>
                            </div>
                          </div>
                        <div class="text-center">
                            {{ Form::submit('Consultar', array('class' => 'btn btn-success btnConsultar')) }}
                            <button type="reset" class="btn btn-secondary btnReset">Restablecer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="table-responsive" hidden>
        <table id="hdv_table" class="theadcolor table table-striped table-hover table-checkable dataTable no-footer dtr-inline">
            <thead>
                <tr>
                    <th>Identificación</th>
                    <th>Nombre</th>
                    <th>Empresa</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Edad</th>
                    <th>Género</th>
                    <th>Dirección</th>
                    <th>Ciudad</th>
                    <th>Localidad</th>
                    <th>Barrio</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@include('bankofresumes.partials.modals')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/bankofresumes/gestion.js') }}"></script>
@endsection