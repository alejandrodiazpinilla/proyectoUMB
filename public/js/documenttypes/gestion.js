$(document).ready(function () {
    $('#modal_editar').on('shown.bs.modal', function () {
        $("#nombre_edit").focus();
    });
    $('#modal_crear').on('shown.bs.modal', function () {
        $("#nombre").focus();
    });

    $("#categoria,#categoria_edit").select2({
        theme: 'bootstrap',
        language: {
            noResults: function () { return "No hay resultados"; },
            searching: function () { return "Buscando.."; }
        },
        placeholder: "Seleccione..."
    });

    $('#form_crear').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var urlA = baseUrl + "/documenttypes";
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
                            html: 'Error. No se permiten ingresar valores vacíos, por favor no manipular el HTML.',
                            confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                        });
                    } else if (result == 1) {
                        swal.fire({
                            title: '<strong>Error de Duplicidad</strong>',
                            type: 'error',
                            html: 'Ya existe un tipo de documento con el mismo nombre asociado a la misma categoría. Por favor validar los registros existentes.',
                            confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                        });
                    } else if (result == 2) {
                        swal.fire({
                            title: '<strong>Exitoso!</strong>',
                            type: 'success',
                            html: 'Registro creado exitosamente.',
                            showCloseButton: true,
                            focusConfirm: false,
                            confirmButtonText:
                                '<i class="fa fa-check"></i> Aceptar!',
                        });
                        window.location.assign(baseUrl + "/documenttypes")
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
            var urlA = baseUrl + "/documenttypes/" + $('#id').val();
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
                            html: 'Ya existe un tipo de documento con el mismo nombre asociado a la misma categoría. Por favor validar los registros existentes.',
                            confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                        });
                    } else if (result == 2) {
                        swal.fire({
                            title: '<strong>Exitoso!</strong>',
                            type: 'success',
                            html: 'Registro creado exitosamente.',
                            showCloseButton: true,
                            focusConfirm: false,
                            confirmButtonText:
                                '<i class="fa fa-check"></i> Aceptar!',
                        });
                        window.location.assign(baseUrl + "/documenttypes")
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
        $('#id').val($(this).data('id'));
        $('#nombre_edit').val($(this).data('nombre'));
        $('#abreviacion_edit').val($(this).data('abreviacion'));
        $('#categoria_edit').val($(this).data('categoria'));
        $('#modal_editar').modal('show');
    });
});