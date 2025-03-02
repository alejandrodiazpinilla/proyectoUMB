$(document).ready(function () {

    $('#modal_editar').on('shown.bs.modal', function () {
        $("#nombre_edit").focus();
    });

    $('#modal_crear').on('shown.bs.modal', function () {
        $("#nombre").focus();
    });

    $("#ciudad, #ciudad_edit").select2({
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
            var urlA = baseUrl + "/localities";
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
                            html: 'Ya existe una localidad con la misma ciudad asociada. Por favor validar las localidades existentes.',
                            confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                        });
                    } else if (result == 2){
                        swal.fire({
                            title: '<strong>Exitoso!</strong>',
                            type: 'success',
                            html: 'La localidad ha sido creada exitosamente.',
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
            var urlA = baseUrl + "/localities/" + $('#id').val();
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
                            html: 'Por favor, complete todos los campos',
                            confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                        });
                    } else if (result == 1) {
                        swal.fire({
                            title: '<strong>Error de Duplicidad</strong>',
                            type: 'error',
                            html: 'Ya existe una localidad con la misma ciudad asociada. Por favor validar las localidades existentes.',
                            confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                        });
                    } else if (result == 2){
                        swal.fire({
                            title: '<strong>Exitoso!</strong>',
                            type: 'success',
                            html: 'La localidad ha sido actualizada exitosamente.',
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
        $('#ciudad_edit').val($(this).data('ciudad')).trigger('change');
        $('#modal_editar').modal('show');
    });
});