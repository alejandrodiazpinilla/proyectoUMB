$(document).ready(function () {

    $('#modal_editar').on('shown.bs.modal', function () {
        $("#nombre_area_edit").focus();
    });

    $('#modal_crear').on('shown.bs.modal', function () {
        $("#nombre_area").focus();
    });

    $("#empresa_id, #empresa_id_edit").select2({
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
            var urlA = baseUrl + "/areas";
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
                            html: 'Ya existe un área con el mismo nombre asociada a la misma empresa. Por favor valida las áreas existentes.',
                            confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                        });
                    } else if (result == 2){
                        swal.fire({
                            title: '<strong>Exitoso!</strong>',
                            type: 'success',
                            html: 'El área ha sido creada exitosamente.',
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
                        confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                    });
                }
            });
        }
    });

    $('#form_actualizar').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var urlA = baseUrl + "/areas/" + $('#id_area').val();
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
                            html: 'Ya existe un área con el mismo nombre asociada a la misma empresa. Por favor validar las áreas existentes.',
                            confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                        });
                    } else if (result == 2){
                        swal.fire({
                            title: '<strong>Exitoso!</strong>',
                            type: 'success',
                            html: 'El área ha sido actualizada exitosamente.',
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
        $('#id_area').val($(this).data('id'));
        $('#nombre_area_edit').val($(this).data('nombrearea'));
        $('#empresa_id_edit').val($(this).data('empresa')).trigger('change');
        $('#modal_editar').modal('show');
    });

    $(document).on('click', '.activarArea', function() {
        var id = $(this).data('id');
        var estado = $(this).data('estado');
        var boton ="";
        if (estado == 0) {
            st = 'activar'
            boton = "Activar";
            txt = "activado";
        }else{
            st = 'bloquear'
            boton = "Bloquear";
            txt = "bloqueado";
        }
        swal.fire({
            title: "¿Está seguro de "+st+" este registro? ",
            text: "",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: boton
        }).then(function(e) {
            if(e.value){
                showPreload();
                var urlA = baseUrl + "/areas/activarArea/" + id;
                jQuery.ajax({
                    url: urlA,
                    type: 'POST',
                    data: {
                        '_token': $('input[name=_token]').val(),
                    },
                    success: function(result){
                    hiddenPreload();
                    if(result == 0){
                            swal.fire({
                                type: 'error',
                                title: 'Error',
                                text: 'Ocurrio un problema al '+st,
                                footer: '',
                                confirmButtonText:
                                '<i class="fa fa-check"></i> OK!',
                            });
                        }else{
                            swal.fire({
                                title: '<strong>Registro '+txt+' correctamente</strong>',
                                type: 'success',
                                html: '',
                                showCloseButton: true,
                                focusConfirm: false,
                                confirmButtonText:
                                '<i class="fa fa-check"></i> OK!',
                            });
                        }
                        location.reload();
                    },
                    error: function(result){
                    hiddenPreload();
                    swal.fire({
                            type: 'error',
                            title: 'Error',
                            text: 'Ocurrio un problema al '+st,
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