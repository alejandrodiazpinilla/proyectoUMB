$(document).ready(function () {

    $("#novelty_type_id, #watchman_name_id,#action_type_id").select2({
        theme: 'bootstrap',
        language: {
            noResults: function () { return "No hay resultados"; },
            searching: function () { return "Buscando.."; }
        },
        placeholder: "Seleccione..."
    });

    $(document).on('change', '#novelty_type_id', function (e) {
        if ($(this).val() == 4) {
            $('.novedadGuarda').attr('hidden', false)
            $('#watchman_name_id').attr('required', true)
        } else {
            $('.novedadGuarda').attr('hidden', true)
            $('#watchman_name_id').attr('required', false).val('').trigger('change')
        }

        if ($(this).val() == 3) {
            $('.NovedadServicio').attr('hidden', false)
            $('#image').attr('required', true)
        } else {
            $('.NovedadServicio').attr('hidden', true)
            $('#image').attr('required', false).val(null)
            $('.custom-file-label').html('Seleccione un imagen')
        }

    });

    $('#action_type_id').on('change', function (e) {
        var validar = $(this).val();
        if (validar.length > 0) {
            $.ajax({
                type: "GET",
                url: baseUrl + '/noveltiescustomers/search_action/' + $(this).val(),
                dataType: 'json',
                success: function (response) {
                    if (response == 'Preventiva')
                        $('.action_type').removeClass('bg-danger').addClass('bg-warning').html(response);
                    else
                        $('.action_type').removeClass('bg-warning').addClass('bg-danger').html(response);

                    $('#action_type').val(response)
                }
            });
        }
    });
});

$('#form_crear').on('submit', function (e) {
    if (e.isDefaultPrevented()) {
    } else {
        e.preventDefault();
        var urlA = baseUrl + "/noveltiescustomers";
        var formData = new FormData(this);
        var files = $('#image')[0].files[0];
        formData.append('file', files);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: urlA,
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            type: 'POST',
            beforeSend: function () {
                showPreload();
            },
            success: function (result) {
                    hiddenPreload();
                    if (result == 0) {
                    swal.fire({
                        type: 'error',
                        title: 'Error',
                        text: 'Ocurrio un problema al guardar',
                        footer: '',
                        confirmButtonText:
                            '<i class="fa fa-check"></i> Aceptar!',
                    });
                } else {
                    swal.fire({
                        title: '<strong>Registro creado correctamente</strong>',
                        type: 'success',
                        html: 'Gracias.',
                        showCloseButton: true,
                        focusConfirm: false,
                        confirmButtonText:
                            '<i class="fa fa-check"></i> Aceptar!',
                    });
                    location.reload();
                }
            },
            error: function (result) {
                hiddenPreload();
                var lista = "<ul>";
                jQuery.each(result.responseJSON.errors, function (key, value) {
                    lista += "<li>" + value + "</li>";
                });
                lista += "</ul>";
                swal.fire({
                    type: 'error',
                    title: 'Error',
                    html: lista,
                    showCloseButton: true,
                    focusConfirm: false,
                    confirmButtonText:
                        '<i class="fa fa-check"></i> Aceptar!',
                });
            }
        });
    }
});

$('#formGestionar').on('submit', function (e) {
    if (e.isDefaultPrevented()) {
    } else {
        e.preventDefault();
        var urlA = baseUrl + "/noveltiescustomers/" + $('#id').val();
        jQuery.ajax({
            url: urlA,
            type: 'PUT',
            data: $('#formGestionar').serialize(),
            beforeSend: function () {
                showPreload();
            },
            success: function (result) {
                hiddenPreload();
                if (result == 0) {
                    swal.fire({
                        title: '<strong>Campos Vacios</strong>',
                        type: 'error',
                        html: 'Error. No se permiten ingresar valores vacíos, por favor no manipular el HTML.',
                        confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                    });
                } else if (result == 1) {
                    swal.fire({
                        title: '<strong>Exitoso!</strong>',
                        type: 'success',
                        html: 'Gestión realizada correctamente.',
                        showCloseButton: true,
                        focusConfirm: false,
                        confirmButtonText:
                            '<i class="fa fa-check"></i> Aceptar!',
                    });
                    location.reload();
                } else {
                    swal.fire({
                        title: '<strong>Error al Guardar</strong>',
                        type: 'error',
                        html: 'Ocurrió un error al guardar, por favor intente nuevamente.',
                        confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                    });
                }
            },
            error: function (result) {
                hiddenPreload();
                var lista = "<ul>";
                jQuery.each(result.responseJSON.errors, function (key, value) {
                    lista += "<li>" + value + "</li>";
                });
                lista += "</ul>";
                swal.fire({
                    type: 'error',
                    title: 'Error',
                    html: lista,
                    showCloseButton: true,
                    focusConfirm: false,
                    confirmButtonText:
                        '<i class="fa fa-check"></i> OK!',
                });
            }
        });
    }
});

$(document).on('click', '.btnVerNovedad', function () {

    $(this).data('action_type') == 'Por Gestionar'?$('.divGestion').attr('hidden',true):$('.divGestion').attr('hidden',false);

    $('#lblGestion').html($(this).data('tipo_accion'))
    $('#lblTipoGest').html($(this).data('action_type'))
    $('#lblDescGest').html($(this).data('description_action'))

    if ($(this).data('novelty_type_id') == 4) {
        $('#lblTipoNovedad').html($(this).data('tipo_novedad'))
        $('#lblGuarda').html($(this).data('watchman_name'))
        $('#lblNovedad').html($(this).data('novelty_type_name'))
        $('.labelGuarda').attr('hidden', false)
        $('#lblDescription').html($(this).data('description'))
    } else {
        $('#lblTipoNovedad').html('')
        $('#lblGuarda').html('')
        $('#lblNovedad').html('')
        $('.labelGuarda').attr('hidden', true)
    }

    if ($(this).data('novelty_type_id') == 3) {
        $('#lblTipoNovedad2').html($(this).data('tipo_novedad'))
        $('#lblNovedad2').html($(this).data('novelty_type_name'))
        $('#lblDescription').html($(this).data('description'))
        var nombreArchivo = $(this).data('image');
        if (nombreArchivo != null) {
            var ruta = baseUrl + '/image/novedadesClientes/' + nombreArchivo;
        } else {
            var ruta = '';
        }
        $("#lblImage").attr('src', ruta);
        $('.labelNovedadServicio').attr('hidden', false)
    } else {
        $('#lblTipoNovedad2').html('')
        $('#lblNovedad2').html('')
        $('.labelNovedadServicio').attr('hidden', true)
    }
    $('#modalVerNovedad').modal('show');
});

$(document).on('click', '.btnGestionar', function () {

    // limpiar los campos antes de mostrar modal
    $('#action_type_id').val('').trigger('change');
    $('.action_type').html('');
    $('#description_action').val('');
    $('#action_type').val('');


    if ($(this).data('novelty_type_id') == 4) {
        $('#id').val($(this).data('id'))
        $('#lblTipoNovedadG').html($(this).data('tipo_novedad'))
        $('#lblGuardaG').html($(this).data('watchman_name'))
        $('#lblNovedadG').html($(this).data('novelty_type_name'))
        $('.labelGuardaG').attr('hidden', false)
        $('#lblDescriptionG').html($(this).data('description'))
    } else {
        $('#lblTipoNovedadG').html('')
        $('#lblGuardaG').html('')
        $('#lblNovedadG').html('')
        $('.labelGuardaG').attr('hidden', true)
    }

    if ($(this).data('novelty_type_id') == 3) {
        $('#id').val($(this).data('id'))
        $('#lblTipoNovedad2G').html($(this).data('tipo_novedad'))
        $('#lblNovedad2G').html($(this).data('novelty_type_name'))
        $('#lblDescriptionG').html($(this).data('description'))
        var nombreArchivo = $(this).data('image');
        if (nombreArchivo != null) {
            var ruta = baseUrl + '/image/novedadesClientes/' + nombreArchivo;
        } else {
            var ruta = '';
        }
        $("#lblImageG").attr('src', ruta);
        $('.labelNovedadServicioG').attr('hidden', false)
    } else {
        $('#lblTipoNovedad2G').html('')
        $('#lblNovedad2G').html('')
        $('.labelNovedadServicioG').attr('hidden', true)
    }
    $('#modalGestionar').modal('show');
});