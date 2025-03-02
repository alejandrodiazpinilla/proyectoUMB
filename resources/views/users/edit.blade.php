@extends('layouts.app.app')
@section('titulo')
    Editar Perfil
@endsection
@section('content')
    <style type="text/css">
        .upload_image img {
            border: 1px solid #dadada;
        }

        .img-responsive {
            /*display:block;*/
            width: 100%;
            height: auto;
        }
    </style>
    <script>
        function previewImage(nb) {
            var reader = new FileReader();
            reader.readAsDataURL(document.getElementById('firmaUsuario' + nb).files[0]);
            reader.onload = function(e) {
                document.getElementById('uploadPreview' + nb).src = e.target.result;
            };
        }
    </script>
    <h3 style="color: #a73434" class="">Bienvenido(a), {{ Auth::user()->name }}</h3>
    <!--begin::Form-->
    <form id="formActualizarPefil" class="" data-toggle="validator" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="id_perfil" id="id_perfil" value="{{ Auth::user()->id }}">
        <input type="hidden" name="jsontableSons" id="jsontableSons">
        <div class="">
            <div class="">
                <div class="col-md mb-4">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#personalInformation" role="tab"
                                aria-controls="personalInformation" aria-selected="true">
                                <i class="fa fa-address-card-o"></i> Información Usuario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#familyInformation" role="tab"
                                aria-controls="familyInformation" aria-selected="false">
                                <i class="fa fa-users"></i> Datos Familiares(hijos)</a>
                        </li>
                        @if($guarda != null)
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#outfit" role="tab" aria-controls="outfit"
                                aria-selected="false">
                                <i class="fa fa-shopping-bag"></i> Dotación</a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#confirm" role="tab" aria-controls="confirm"
                                aria-selected="false" id="tabConfirm">
                                <i class="fa fa-list-ol"></i> Confirmar Información</a>
                        </li>
                    </ul>
                    <div class="tab-content" style="max-heght:100px">
                        <div class="tab-pane active" id="personalInformation" role="tabpanel">
                            <h3 class=""> Información del usuario:</h3>
                            <div class="">
                                <div class="row">
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label for="name">Nombre Completo:<span style="color: red">*</span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="fa fa-user-o"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="name_act" id="name_act"
                                                    placeholder="Nombre Completo" value="{{ Auth::user()->name }}">
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label for="name">Cargo:<span style="color: red">*</span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="fa fa-mortar-board"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="cargo_act" id="cargo_act"
                                                    placeholder="Cargo" value="{{ Auth::user()->cargo }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label for="identification">Cédula:<span style="color: red">*</span></label>
                                            <input type="number" minlength="6" maxlength="10" name="identification"
                                                pattern="" id="identification" class="form-control blockNums"
                                                placeholder="Identificación" title="6 a 11 caracteres numéricos"
                                                oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                value="{{ Auth::user()->identification }}" />
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label for="address">Dirección:<span style="color: red">*</span></label>
                                            <input type="text" name="address" id="address" class="form-control"
                                                placeholder="Dirección de residencia"
                                                value="{{ Auth::user()->address }}" />
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label for="name">Correo Electrónico:<span
                                                    style="color: red">*</span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="fa fa-at"></i>
                                                    </span>
                                                </div>
                                                <input type="email" class="form-control" name="email_act"
                                                    id="email_act" placeholder="Enter email"
                                                    value="{{ Auth::user()->email }}">
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h5>Contacto en caso de emergencia</h5>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="contact_name">Nombre:<span style="color: red">*</span></label>
                                            <input type="text" name="contact_name" id="contact_name" class="form-control blockText" placeholder="Nombre Completo" value="{{ Auth::user()->contact_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="contact_phone">Teléfono:<span style="color: red">*</span></label>
                                            <input type="number" name="contact_phone" id="contact_phone"
                                                class="form-control blockNums" placeholder="Teléfono" maxlength="10"
                                                oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                value="{{ Auth::user()->contact_phone }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="relationship">Parentezco:<span style="color: red">*</span></label>
                                            <input type="text" name="relationship" id="relationship"
                                                class="form-control blockText" placeholder="Nombre Completo (en caso de emergencia)" value="{{ Auth::user()->relationship }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <div class="col-md">
                                        <table id="tablaRoles_edit" class="table theadcolor table-striped table-hover">
                                            <tr>
                                                <thead>
                                                    <th>EMPRESA</th>
                                                    <th>AREA</th>
                                                    <th>ROLES</th>
                                                </thead>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="familyInformation" role="tabpanel">
                            <h3 class=""> Datos Familiares(hijos): </h3>
                            <div class="row">
                                <div class="col-md-1">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="son_name">Nombre Completo:</label>
                                        <input class="form-control blockText" name="son_name" id="son_name" type="text" placeholder="Nombres y Apellidos"/>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <fieldset class="form-group">
                                            <label>Fecha de Nacimiento:</label>
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </span>
                                                <input type="text" autocomplete="off" class="form-control"
                                                    alt="birthdate"name="birthdate" id="birthdate"
                                                    placeholder="aaaa-mm-dd">
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="gender">Sexo:</label>
                                        <select class="form-control m-select2" id="gender" name="gender"
                                            style="width:100%!important;">
                                            <option value="" readonly disabled selected>Seleccione...
                                            </option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="city">Lugar de Residencia:</label>
                                        {{ Form::select('city', $ciudades, null, ['class' => 'form-control select2-single', 'id' => 'city', 'placeholder' => 'Seleccione...', 'style' => 'width:100%;']) }}
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                    </div>
                                </div>
                            </div>
                            <input class="btn btn-success" id="AgregarHijo" type="button" value="Agregar"
                                style="width: 100%;">
                            <hr style="margin-bottom: 33px; border: 1px solid; margin-top: 3%;">

                            <div class="table-responsive">
                                <div class="col-md">
                                    <table id="tableHijos" class="table theadcolor table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nombre Completo</th>
                                                <th>Fecha de Nacimiento</th>
                                                <th>Sexo</th>
                                                <th>Lugar de Residencia</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="body_hijos">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @if($guarda != null)
                        <div class="tab-pane" id="outfit" role="tabpanel">
                            <h3 class=""> Dotación:</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="shirt">Camisa/camiseta:<span style="color: red">*</span></label>
                                        <input type="text" pattern="[SMXLsmxl]{1,4}" name="shirt" id="shirt"
                                            class="form-control" placeholder="talla de Camisa"
                                            value="{{ Auth::user()->shirt }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pant">Pantalón:<span style="color: red">*</span></label>
                                        <input type="number" name="pant" id="pant" class="form-control"
                                            placeholder="Talla de Pantalón" step="2" min="4" max="50"
                                            minlength="1" maxlength="2"
                                            oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            value="{{ Auth::user()->pant }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="shoes">Botas:<span style="color: red">*</span></label>
                                        <input type="number" name="shoes" id="shoes" class="form-control"
                                            placeholder="Talla de Botas" step="0.5" min="30" max="50"
                                            value="{{ Auth::user()->shoes }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="tab-pane" id="confirm" role="tabpanel" style="max-height:400px;overflow: auto;">
                            <h3 class=""> Información de la cuenta:</h3>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card mb-4">
                                                    <h5 class="card-header text-info">Información del usuario</h5>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md">
                                                                <div class="form-group">
                                                                    <label for="spNombreUser">Nombre Completo: </label>
                                                                    <strong id="spNombreUser"></strong>
                                                                </div>
                                                            </div>
                                                            <div class="col-md">
                                                                <div class="form-group">
                                                                    <label>Nombre Usuario: </label>
                                                                    <strong>{{ Auth::user()->username }}</strong>
                                                                </div>
                                                            </div>
                                                            <div class="col-md">
                                                                <div class="form-group">
                                                                    <label for="spEmail">Correo Electrónico: </label>
                                                                    <strong id="spEmail"></strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md">
                                                                <div class="form-group">
                                                                    <label for="spCedula">Cédula: </label>
                                                                    <strong id="spCedula"></strong>
                                                                </div>
                                                            </div>
                                                            <div class="col-md">
                                                                <div class="form-group">
                                                                    <label for="spCargo">Cargo: </label>
                                                                    <strong id="spCargo"></strong>
                                                                </div>
                                                            </div>
                                                            <div class="col-md">
                                                                <div class="form-group">
                                                                    <label for="spDireccion">Dirección: </label>
                                                                    <strong id="spDireccion"></strong>
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
                                                    <h5 class="card-header text-info">Contacto en caso de emergencia</h5>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md">
                                                                <div class="form-group">
                                                                    <label for="spNombre">Nombre: </label>
                                                                    <strong id="spNombre"></strong>
                                                                </div>
                                                            </div>
                                                            <div class="col-md">
                                                                <div class="form-group">
                                                                    <label for="spTelefono">Teléfono: </label>
                                                                    <strong id="spTelefono"></strong>
                                                                </div>
                                                            </div>
                                                            <div class="col-md">
                                                                <div class="form-group">
                                                                    <label for="spParentezco">Parentezco: </label>
                                                                    <strong id="spParentezco"></strong>
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
                                                    <h5 class="card-header text-info">Datos Familiares(hijos)</h5>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="table-responsive">
                                                                <div class="col-md">
                                                                    <table id="tableHijos2"
                                                                        class="table theadcolor table-striped table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Nombre Completo</th>
                                                                                <th>Fecha de Nacimiento</th>
                                                                                <th>Sexo</th>
                                                                                <th>Lugar de Residencia</th>
                                                                                <th>Acciones</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if($guarda != null)
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card mb-4">
                                                    <h5 class="card-header text-info">Dotación</h5>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md">
                                                                <div class="form-group">
                                                                    <label for="spCamisa">Camisa/camiseta: </label>
                                                                    <strong id="spCamisa"></strong>
                                                                </div>
                                                            </div>
                                                            <div class="col-md">
                                                                <div class="form-group">
                                                                    <label for="spPantalon">Pantalón: </label>
                                                                    <strong id="spPantalon"></strong>
                                                                </div>
                                                            </div>
                                                            <div class="col-md">
                                                                <div class="form-group">
                                                                    <label for="spBotas">Botas: </label>
                                                                    <strong id="spBotas"></strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Contraseña:<span
                                                            style="color: red">*</span></label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                <i class="icons cui-lock-locked"></i>
                                                            </span>
                                                        </div>
                                                        <input type="password" autocomplete="offf" id="password"
                                                            name="password"
                                                            class="form-control m-input m-login__form-input--last"
                                                            placeholder="Confirme Contraseña" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <!-- Opcion para ver la contraseña -->
                                                    <div class="custom-control custom-checkbox mt-4">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="checkViewPass" onclick="viewPass()">
                                                        <label class="custom-control-label" for="checkViewPass">Ver
                                                            Contraseña</label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Firma:</label>
                                            <div class="col-lg-6">
                                                <div class="custom-file col-md-12">
                                                    <input type="file" class="custom-file-input form-control"
                                                        id="firmaUsuario2" name="firmaUsuario2" lang="es"
                                                        accept="image/*" onchange="previewImage(2);"
                                                        style="cursor: pointer;">
                                                    <label class="custom-file-label" for="firmaUsuario2"
                                                        data-browse="Seleccionar">
                                                        Seleccione un firma
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <input type="hidden" name="firma" id="firma"
                                                value="{{ Auth::user()->firma }}">
                                            <div class="col-md-4 upload_image mx-auto">
                                                <div class="col-md">
                                                    @if (!empty(Auth::user()->signature))
                                                        <center>
                                                            <img id="uploadPreview2" class="img-responsive"
                                                                src="{!! asset('image/users/firmas/' . Auth::user()->signature) !!}" />
                                                        </center>
                                                    @else
                                                        <center>
                                                            <img id="uploadPreview2" class="img-responsive"
                                                                src="{!! asset('image/users/firmas/tu_firma_aqui.jpg') !!}" />
                                                        </center>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">Actualizar</button>
                                    <button type="button" class="btn btn-secondary"
                                        onclick="window.location='{{ url('/') }}'">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--end::Form-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/users/gestion.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: `${baseUrl}/users/areaempresa`,
                cache: false,
                method: "GET",
                dataType: "JSON",
                data: {
                    id: {{ Auth::user()->id }},
                    empresas: 0,
                    accion: 'editar'
                },
                success(res) {
                    for (let index = 0; index < res.length; index++) {
                        let rolId = "",
                            rolName = "";

                        res[index].roles.forEach(element => {
                            rolId = `${element[0].id}, ${rolId}`;
                            rolName = `${element[0].display_name}</br>${rolName}`;
                        });

                        $("#tablaRoles_edit tbody").append(
                            "<tr>" +
                            "<td class='align-middle'><input type='hidden' name='empresaTbl_edit[]' value='" +
                            res[index].empresa[0].id + "'>" + res[index].empresa[0].nombre + "</td>" +
                            "<td class='align-middle'><input type='hidden' name='areaTbl_edit[]' value='" +
                            res[index].area[0].id + "'>" + res[index].area[0].nombre + "</td>" +
                            "<td class='align-middle'><input type='hidden' name='rolesTbl_edit[]s' value='" +
                            rolId + "'>" + rolName + "</td>" +
                            "</tr>"
                        )
                    }
                }
            });
            $('#birthdate').daterangepicker({
                opens: 'right',
                drops: 'down',
                singleDatePicker: true,
                showDropdowns: true,
                minDate: moment().subtract(40, 'years'),
                maxDate: moment().add(0, 'days'),
                locale: {
                    format: 'YYYY-MM-DD',
                    firstDay: 1
                }
            }).val('');

        });
    </script>
@endsection
