@extends('layouts.app.app')
@section('titulo')
    Crear Empresa
@endsection
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
            /* display: block; */
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
            reader.readAsDataURL(document.getElementById('logoEmpresa' + nb).files[0]);
            reader.onload = function(e) {
                document.getElementById('uploadPreview' + nb).src = e.target.result;
                document.getElementById('dataImg').value = e.target.result;
            };
        }
    </script>
    <form id="form_crear" data-toggle="validator" role="form" enctype="multipart/form-data">
        <div>
            <h5>Agregar Empresa</h5>
            <hr>
        </div>
        <div class="modal-body">
            @csrf
            <div class="row upload_image col-md-12">
                <div class="col-md margin-top text-center mb-3">
                    <img id="uploadPreview1" class="img-responsive" width="150" height="150" src="{!! asset('image/logos/empresas/logo_aqui.png') !!}" style="cursor: pointer;"/>
                </div>
                <input type="file" class="custom-file-input form-control" id="logoEmpresa1" name="logoEmpresa1" accept="image/*" onchange="previewImage(1);" required hidden>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre_empresa">Nombre</label>
                        <input type="text" name="nombre_empresa" id="nombre_empresa" class="form-control blockText" placeholder="Nombre" pattern="[a-zA-ZñÑáéíóúüÁÉÍÓÚÜ 0-9]{4,100}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nit_empresa">NIT</label>
                        <input type="number" name="nit_empresa" id="nit_empresa" class="form-control blockNums" placeholder="NIT"
                            required maxlength="10"
                            oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="telefono_empresa">Telefono</label>
                        <input type="number" name="telefono_empresa" id="telefono_empresa" class="form-control blockNums"
                            placeholder="Telefono" maxlength="10"
                            oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="celular_empresa">Celular</label>
                        <input type="number" name="celular_empresa" id="celular_empresa" class="form-control blockNums"
                            placeholder="Celular" maxlength="10"
                            oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="direccion_empresa">Dirección</label>
                        <input type="text" name="direccion_empresa" id="direccion_empresa" class="form-control"
                            placeholder="Dirección" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ciudad_empresa">Ciudad</label>
                        {{ Form::select('ciudad_empresa', $ciudades, null, ['class' => 'form-control m-select2', 'id' => 'ciudad_empresa', 'required' => 'true', 'style' => 'width:100%;', 'placeholder' => 'seleccione...']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email_empresa">Email</label>
                        <input type="text" name="email_empresa" id="email_empresa" class="form-control"
                            placeholder="Email" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <h5 class="card-header text-info">Información Pagina Web</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="sobre_nosotros">Sobre Nosotros</label>
                                        <textarea name="sobre_nosotros" id="sobre_nosotros" class="form-control" rows="5" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="mision">Misión</label>
                                        <textarea name="mision" id="mision" class="form-control" rows="5" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="vision">Visión</label>
                                        <textarea name="vision" id="vision" class="form-control" rows="5" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="video_institucional">Video Institucional</label>
                                        <textarea name="video_institucional" id="video_institucional" class="form-control" rows="5"
                                            placeholder='Ejemplo: https://www.youtube.com' required></textarea>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="ubicacion_maps">Ubicación Epresa</label>
                                        <textarea name="ubicacion_maps" id="ubicacion_maps" class="form-control" rows="5"
                                            placeholder='Ejemplo: https://www.google.com' required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <textarea id="dataImg" hidden></textarea>
                                <img id="uploadPreview2" hidden />
                                <div class="col-12">
                                    <div class="card mb-4">
                                        <h5 class="card-header text-info">Servicios</h5>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="nombre_servicio">Nombre</label>
                                                        <input type="text" name="nombre_servicio" id="nombre_servicio"
                                                            class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="imagen_servicio">Imagen</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input form-control"
                                                                id="logoEmpresa2" name="logoEmpresa2" lang="es"
                                                                accept="image/*" onchange="previewImage(2);"
                                                                style="cursor: pointer;" required>
                                                            <label class="custom-file-label" for="logoEmpresa2"
                                                                data-browse="Seleccionar">
                                                                Seleccione una imagen
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="descripcion_servicio">Descripción</label>
                                                        <textarea name="descripcion_servicio" id="descripcion_servicio" class="form-control" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="jsonTableServicios" id="jsonTableServicios">
                                            <input class="btn btn-success" id="agregarServicio" type="button"
                                                value="Agregar" style="width: 100%;">
                                            <br>
                                            <br>
                                            <hr style="margin-bottom: 33px; border: 1px solid; margin-top: 3%;">
                                            <br>
                                            <div
                                                class="table-responsive table table-striped theadcolor table-bordered table-hover table-checkable dataTable no-footer dtr-inline">
                                                <table id="tableServicios" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>Nombre</th>
                                                            <th>Descripción</th>
                                                            <th>Imágen</th>
                                                            <th>Acción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="bodyServicios">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mb-4">
                                        <h5 class="card-header text-info">Redes Sociales</h5>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="facebook">Facebook</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-facebook"></i>
                                                                </span>
                                                            </div>
                                                            <input type="url" name="facebook" id="facebook"
                                                                class="form-control" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="instagram">Instagram</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-instagram"></i>
                                                                </span>
                                                            </div>
                                                            <input type="url" name="instagram" id="instagram"
                                                                class="form-control" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="linkedin">LinkedIn</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-linkedin"></i>
                                                                </span>
                                                            </div>
                                                            <input type="url" name="linkedin" id="linkedin"
                                                                class="form-control" required />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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
                    <div class="form-group">
                        <label for="observaciones_empresa">Observaciones</label>
                        <textarea name="observaciones_empresa" id="observaciones_empresa" class="form-control" rows="5"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="registrar">
                    Registrar
                </button>
                <a href="{{ route('empresas.index') }}" type="button" class="btn btn-secondary">Regresar</a>
            </div>
        </div>
    </form>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/empresas/gestion.js') }}"></script>
    <script>
    $(document).on('click', '#uploadPreview1', function () {
        $('#logoEmpresa1').trigger('click');
    });
    </script>
@endsection
