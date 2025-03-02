@extends('layouts.web.app')
@section('titulo')Contáctenos @endsection
@section('content')

<!-- Contact Start -->
<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="section-title">Visítanos</h2>
                <div class="contact-info">
                    <iframe src="{{infoEmpresa()->ubicacion_maps}}" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
            <form class="col-md-6" id="formContactUs">
            @csrf
                <div class="editor-info">
                    <h2 class="section-title">Contáctanos</h2>
                    <div class="m-portlet__body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label >Nombre</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span></div>
                                    <input type="text" class="form-control" placeholder="Nombre" id="name" name="name" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fa fa-phone-alt"></i></span></div>
                                    <input type="number" min="2000000" minlength="7" maxlength="10" name="telephone" pattern="" id="telephone" class="form-control blockNums" placeholder="Teléfono" title="7 a 10 caracteres" required oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend kt-font-brand"><span class="input-group-text"><strong>@</strong></span></div>
                                    <input type="email" class="form-control m-input" placeholder="Correo Electrónico" id="email" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Observación</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-10">
                                <button type="submit" class="btn btn-danger">
                                    Enviar
                                </button>
                                <button type="reset" class="btn btn-secondary">
                                    Cancelar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Contact End -->

<script src="js/jquery-3.4.1.min.js"></script>
{{-- <script src="js/bootstrap.bundle.min.js"></script> --}}
<script>
var getUrl = window.location;
var baseUrl = getUrl .protocol + "//" + getUrl.host;
$('#formContactUs').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            jQuery.ajax({
                url: baseUrl + "/contactUs/saveContactUs",
                method: 'POST',
                data: $('#formContactUs').serialize(),
                beforeSend: function () {
                    showPreload();
                },
                success: function (result) {
                    hiddenPreload();
                    Swal.fire('', result, 'success');
                    $('.btn-secondary').trigger('click');
                },
                error: function (result) {
                    hiddenPreload();
                    Swal.fire('Error al guardar', result, 'error');
                }
            });
        }
    });
</script>
@endsection