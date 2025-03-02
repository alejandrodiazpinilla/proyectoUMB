$(document).ready(function () {

    $('#modal_editar').on('shown.bs.modal', function () {
        $("#nombre_ciudad_edit").focus();
    });

    $('#modal_crear').on('shown.bs.modal', function () {
        $("#nombre_ciudad").focus();
    });

    $('#form_crear').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var urlA = baseUrl + "/ciudades";
            jQuery.ajax({
                url: urlA,
                method: 'post',
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
                            html: 'Error. No se permiten ingresar valores vacíos, por favor no manipular el HTML.',
                            confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                        });
                    } else if (result == 1) {
                        swal.fire({
                            title: '<strong>Error de Duplicidad</strong>',
                            type: 'error',
                            html: 'Ya existe una ciudad con el mismo departamento asociado. Por favor validar las ciudades existentes.',
                            confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                        });
                    } else if (result == 2){
                        swal.fire({
                            title: '<strong>Exitoso!</strong>',
                            type: 'success',
                            html: 'La ciudad ha sido creada exitosamente.',
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
                            '<i class="fa fa-check"></i> Aceptar!',
                    });
                }
            });
        }
    });

    $('#form_actualizar').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var urlA = baseUrl + "/ciudades/" + $('#id_ciudad').val();
            jQuery.ajax({
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
                            html: 'Error. No se permiten ingresar valores vacíos, por favor no manipular el HTML.',
                            confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                        });
                    } else if (result == 1) {
                        swal.fire({
                            title: '<strong>Error de Duplicidad</strong>',
                            type: 'error',
                            html: 'Ya existe una ciudad con el mismo departamento asociado. Por favor validar las ciudades existentes.',
                            confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                        });
                    } else if (result == 2){
                        swal.fire({
                            title: '<strong>Exitoso!</strong>',
                            type: 'success',
                            html: 'La ciudad ha sido actualizada exitosamente.',
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

    $(document).on('click', '.edit-modal', function () {
        $('#id_ciudad').val($(this).data('id'));
        $('#nombre_ciudad_edit').val($(this).data('nombreciudad'));
        $('#nombre_departamento_edit').val($(this).data('nombredepartamento'));
        $('#modal_editar').modal('show');
    });

    $(document).on('click', '.delete-modal', function () {
        var id = $(this).data('id');
        $('#btnAccion').removeClass('btn-danger');
        $('#btnAccion').removeClass('btn-warning');
        $('#btnAccion').addClass('btn-danger');
        swal.fire({
            title: "¿Esta seguro de eliminar esta Ciudad? ",
            text: " Recuerde antes, verificar que no esté vinculada con alguna empresa, proveedor, etc.",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: 'Eliminar'
        }).then(function (e) {
            if (e.value) {
                showPreload();
                var urlA = baseUrl + "/ciudades/" + id;
                jQuery.ajax({
                    url: urlA,
                    type: 'DELETE',
                    data: {
                        '_token': $('input[name=_token]').val(),
                    },
                    success: function (result) {
                    hiddenPreload();
                    if (result == 0) {
                            swal.fire({
                                type: 'error',
                                title: 'Error',
                                text: 'Ocurrio un problema al eliminar',
                                footer: '',
                                confirmButtonText:
                                    '<i class="fa fa-check"></i> OK!',
                            });
                        } else {
                            swal.fire({
                                title: '<strong>La ciudad ha sido eliminado</strong>',
                                type: 'success',
                                html: 'Gracias.',
                                showCloseButton: true,
                                focusConfirm: false,
                                confirmButtonText:
                                    '<i class="fa fa-check"></i> OK!',
                            });
                        }
                        location.reload();
                    },
                    error: function (result) {
                    hiddenPreload();
                    swal.fire({
                            type: 'error',
                            title: 'Error',
                            text: 'Ocurrio un problema al eliminar',
                            footer: '',
                            confirmButtonText:
                                '<i class="fa fa-check"></i> Aceptar!',
                        });
                    }
                });
            }
        });
    });
});