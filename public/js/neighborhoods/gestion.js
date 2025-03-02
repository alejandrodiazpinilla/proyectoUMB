$(document).ready(function () {

    $('#modal_editar').on('shown.bs.modal', function () {
        $("#nombre_edit").focus();
    });

    $('#modal_crear').on('shown.bs.modal', function () {
        $("#nombre").focus();
    });

    $("#ciudad, #ciudad_edit,#localidad, #localidad_edit").select2({
        theme: 'bootstrap',
        language: {
            noResults: function () { return "No hay resultados"; },
            searching: function () { return "Buscando.."; }
        },
        closeOnSelect: true,
        placeholder: "Seleccione..."
    });

    $('#form_crear').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var urlA = baseUrl + "/neighborhoods";
            jQuery.ajax({
                url: urlA,
                method: 'POST',
                data: $('#form_crear').serialize(),
                beforeSend: function () {
                    showPreload();
                },
                success: function (result) {
                    hiddenPreload();
                    if (result == 0) {
                        swal.fire({
                            title: '<strong>Campos Vacios</strong>',
                            type: 'error',
                            html: 'Por favor, complete todos los campos.',
                            confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                        });
                    } else if (result == 1) {
                        swal.fire({
                            title: '<strong>Error de Duplicidad</strong>',
                            type: 'error',
                            html: 'Ya existe un barrio con la misma localidad asociada. Por favor validar los barrios existentes.',
                            confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                        });
                    } else if (result == 2){
                        swal.fire({
                            title: '<strong>Exitoso!</strong>',
                            type: 'success',
                            html: 'El barrio ha sido creado exitosamente.',
                            showCloseButton: true,
                            focusConfirm: false,
                            confirmButtonText:'<i class="fa fa-check"></i> Aceptar!',
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
                    swal.fire({
                        type: 'error',
                        title: 'Error',
                        html: result.responseJSON.message,
                        showCloseButton: true,
                        focusConfirm: false,
                        confirmButtonText:'<i class="fa fa-check"></i> Aceptar!',
                    });
                }
            });
        }
    });

    $('#form_actualizar').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var urlA = baseUrl + "/neighborhoods/" + $('#id').val();
            jQuery.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: urlA,
                type: 'PUT',
                data: $('#form_actualizar').serialize(),
                beforeSend: function () {
                    showPreload();
                },
                success: function (result) {
                    hiddenPreload();
                    if (result == 0) {
                        swal.fire({
                            title: '<strong>Campos Vacios</strong>',
                            type: 'error',
                            html: 'Por favor, complete todos los campos',
                            confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                        });
                    } else if (result == 1) {
                        swal.fire({
                            title: '<strong>Error de Duplicidad</strong>',
                            type: 'error',
                            html: 'Ya existe un barrio con la misma localidad asociada. Por favor validar los barrios existentes.',
                            confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                        });
                    } else if (result == 2){
                        swal.fire({
                            title: '<strong>Exitoso!</strong>',
                            type: 'success',
                            html: 'El barrio ha sido actualizado exitosamente.',
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
                    swal.fire({
                        type: 'error',
                        title: 'Error',
                        html: result.responseJSON.message,
                        showCloseButton: true,
                        focusConfirm: false,
                        confirmButtonText:'<i class="fa fa-check"></i> Aceptar!',
                    });
                }
            });
        }
    });

    $(document).on('click', '.edit-modal', function () {
        $('#id').val($(this).data('id'));
        $('#nombre_edit').val($(this).data('nombre'));
        $('#localidad_edit').val($(this).data('localidad')).trigger('change');
        $('#localidad_id').val($(this).data('localidad')).trigger('change');
        $('#ciudad_edit').val($(this).data('ciudad')).trigger('change');
        $('#modal_editar').modal('show');
    });

    $('#ciudad, #ciudad_edit').on('change', function (e) {
        var ciudad = $(this).attr('id');
        $.ajax({
            type: "GET",
            url: baseUrl + '/employees/search_locality/' + $(this).val(),
            dataType: 'json',
            success: function (response) {
                if (response.localidades.length != 0) {
                    var loc = '';
                    response.localidades.forEach((item, index) => {
                        loc += `<option value="${item.id}">${item.name}<option>`
                    })
                    if (ciudad == 'ciudad')
                        $('#localidad').attr('disabled', false).html('<option value="" disabled selected>Seleccione...<option>' + loc);
                    else
                        $('#localidad_edit').attr('disabled', false).html('<option value="" disabled selected>Seleccione...<option>' + loc).val($('#localidad_id').val()).trigger('change');
                } else {
                    $('#localidad').attr('disabled', true).val(null).trigger('change');
                    $('#localidad_edit').attr('disabled', true).val(null).trigger('change');
                }
            },
            error: function (response) {
            }
        });
    });
});