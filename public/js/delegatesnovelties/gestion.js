$(document).ready(function() {
    $('#modal_editar').on('shown.bs.modal', function () {
        $("#nombre_encargado_edit").focus();
    }); 
    $('#modal_crear').on('shown.bs.modal', function () {
        $("#nombre_encargado").focus();
    });
    
    $('#form_crear').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        }else{
            e.preventDefault();
            var urlA = baseUrl + "/delegatesnovelties";
            jQuery.ajax({
                url: urlA,
                method: 'POST',
                data: $('#form_crear').serialize(),
                beforeSend: function() {
                    showPreload();
                },
                success: function(result){
                    hiddenPreload();
                    if(result == 0){
                        swal.fire({
                            type: 'error',
                            title: 'Error',
                            text: 'Ocurrio un problema al guardar',
                            footer: '',
                            confirmButtonText:
                            '<i class="fa fa-check"></i> Aceptar!',
                        });
                    }else{
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
                error: function(result){
                    hiddenPreload();
                    var lista = "<ul>";
                    jQuery.each(result.responseJSON.errors, function(key, value){
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
        }else{
            e.preventDefault();
            var urlA = baseUrl + "/delegatesnovelties/" + $('#id_encargado').val();
            jQuery.ajax({
                url: urlA,
                type: 'PUT',
                data: $('#form_actualizar').serialize(),
                beforeSend: function() {
                    showPreload();
                },
                success: function(result){
                    hiddenPreload();
                    if(result == 0){
                        swal.fire({
                            type: 'error',
                            title: 'Error',
                            text: 'Ocurrio un problema al guardar',
                            footer: '',
                            confirmButtonText:
                            '<i class="fa fa-check"></i> Aceptar!',
                        });
                    }else{
                        swal.fire({
                            title: '<strong>Registro actualizado correctamente</strong>',
                            type: 'success',
                        html: 'Gracias.',
                        showCloseButton: true,
                        focusConfirm: false,
                        confirmButtonText:
                        '<i class="fa fa-check"></i> OK',
                    });
                    location.reload();
                }
                },
                error: function(result){
                    hiddenPreload();
                    var lista = "<ul>";
                    jQuery.each(result.responseJSON.errors, function(key, value){
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

    $(document).on('click', '.edit-modal', function() {
        $('#id_encargado').val($(this).data('id'));
        $('#nombre_encargado_edit').val($(this).data('nombreencargado'));
        $('#modal_editar').modal('show');
    });

});