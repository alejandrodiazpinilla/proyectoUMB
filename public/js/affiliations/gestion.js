$(document).ready(function() {

    var table = $('#afiliaciones_table').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [[1, "asc"]],
        "ajax": {
            "url": "/affiliations/affiliationsIndex",
            "dataType": "json",
            "type": "GET",
            "data": {"_token": "{{ csrf_token() }}"}
        },
        columns: [{data: "id"},
            {data: "name"},
            {data: "action",
        render: function(data, type, full, meta) {
        return `
        <div class='btn-group'>
        <a href="javascript:void(0)" class="edit-modal btn btn-info" data-id="${data.id}" data-nombreafiliacion="${data.name}" title="Editar">
        <i class="fa fa-edit"></i>
        </a>
        ` +
        ((data.state == 0) ?
        `<a href="javascript:void(0)" class="me-2 delete-modal btn btn-success" title="Activar" data-id="${data.id}" data-estado="${data.state}">
            <i class="icons cui-circle-check"></i> 
            </a>` :
        `<a href="javascript:void(0)" class="me-2 delete-modal btn btn-danger" title="Bloquear" data-id="${data.id}" data-estado="${data.state}">
            <i class="icons cui-circle-x"></i> 
            </a>`) +
        `</div>`;
        },
        orderable: false
        }
        ],
        "oLanguage": {
            "sUrl": baseUrl + "/plugins/datatables/es_es.json"
        },
        responsive: true,
        pagingType: "full_numbers"
    });

    $('#modal_editar').on('shown.bs.modal', function () {
        $("#nombre_afiliacion_edit").focus();
    }); 
    $('#modal_crear').on('shown.bs.modal', function () {
        $("#nombre_afiliacion").focus();
    });
    
    $('#form_crear').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        }else{
            e.preventDefault();
            var urlA = baseUrl + "/affiliations";
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
                    }
                    swal.fire({
                        title: '<strong>Registro creado correctamente</strong>',
                        type: 'success',
                        html: 'Gracias.',
                        showCloseButton: true,
                        focusConfirm: false,
                        confirmButtonText:
                        '<i class="fa fa-check"></i> Aceptar!',
                    });
                    table.ajax.reload();
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
            var urlA = baseUrl + "/affiliations/" + $('#id_afiliacion').val();
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
                    }
                    swal.fire({
                        title: '<strong>Registro actualizado correctamente</strong>',
                        type: 'success',
                        html: 'Gracias.',
                        showCloseButton: true,
                        focusConfirm: false,
                        confirmButtonText:
                        '<i class="fa fa-check"></i> OK',
                    });
                    table.ajax.reload();
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
        $('#id_afiliacion').val($(this).data('id'));
        $('#nombre_afiliacion_edit').val($(this).data('nombreafiliacion'));
        $('#modal_editar').modal('show');
    });

    $(document).on('click', '.delete-modal', function() {
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
                var urlA = baseUrl + "/affiliations/activarRegistro/" + id;
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
                        table.ajax.reload();
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