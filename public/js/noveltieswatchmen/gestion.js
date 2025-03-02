$(document).ready(function () {

    var table = $('#noveltieswatchmen_table').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [[0, "desc"]],
        "ajax": {   
            "url": baseUrl + '/noveltieswatchmen/NoveltyWatchmenIndex',
            "dataType": "json",
            "type": "GET",
            "data": { "_token": "{{ csrf_token() }}" }
        },
        columns: [
            { data: "id" },
            { data: "tipo_novedad" },
            { data: "description" },
            { data: "created_at" },
            { data: "state" },
            { data: "action",
                render: function (data, type, full, meta) {
                    return `
            <div class="btn-group">
            <a href="javascript:void(0)" class="btnVerNovedad btn btn-info" data-id="${data.id}" data-guarda="${data.guarda}" data-supervisor="${full.supervisor}" data-observation="${data.observation}" data-state="${data.state}" data-novelty_type_id="${data.novelty_type_id}" data-tipo_novedad="${data.tipo_novedad}" data-type="${data.type}" data-incoming_name="${full.incoming_name}" data-outgoing_name="${full.outgoing_name}" data-novelty_type_name="${data.novelty_type_name}" data-name_involved="${data.name_involved}" data-data_involved="${data.data_involved}" data-description="${data.description}" data-image="${data.image}" title="Editar">
            <i class="fa fa-eye"></i>
            </a>
            </div>
            `;
                },
                orderable: false
            }],
            "oLanguage": {
                "sUrl": baseUrl + "/plugins/datatables/es_es.json"
            },
        responsive: true,
        pagingType: "full_numbers"
    });

    $('#modalVerNovedad').on('shown.bs.modal', function () {
        $('#observation').val("");
    });

    $("#tipo_novedad_id, #jornada, #nombre_entrante, #nombre_saliente").select2({
        theme: 'bootstrap',
        language: {
            noResults: function () { return "No hay resultados"; },
            searching: function () { return "Buscando.."; }
        },
        placeholder: "Seleccione..."
    });

    $(document).on('change', '#tipo_novedad_id', function (e) {
        //cambio de turno
        if ($(this).val() == 1) {
            $('.cambioTurno').attr('hidden', false)
            $('#jornada').attr('required', true)
            $('#nombre_entrante').attr('required', true)
            $('#nombre_saliente').attr('required', true)
            $('#img_novedad1').attr('required', false)
        } else {
            $('.cambioTurno').attr('hidden', true)
            $('#jornada').attr('required', false).val('').trigger('change')
            $('#nombre_entrante').attr('required', false).val('').trigger('change')
            $('#nombre_saliente').attr('required', false).val('').trigger('change')
        }
        // novedad en el servicio
        if ($(this).val() == 2) {
            $('#img_novedad1').attr('required', true)
            $('.NovedadServicio').attr('hidden', false)
            $('#tipo_novedad').attr('required', true)
            $('#nombre_afectado').attr('required', true)
            $('#datos_afectado').attr('required', true)
            $('#img_novedad').attr('required', true)
        } else {
            $('.NovedadServicio').attr('hidden', true)
            $('#tipo_novedad').attr('required', false).val('').trigger('change')
            $('#nombre_afectado').attr('required', false).val('').trigger('change')
            $('#datos_afectado').attr('required', false).val('').trigger('change')
            $('#img_novedad').attr('required', false).val(null)
            $('.custom-file-label').html('Seleccione un imagen')
            $('#img_novedad1').attr('required', false)
        }

    });

    $(document).on('click', '.btnVerNovedad', function () {
        $('#id').val($(this).data('id'));
        $('#lblGuarda').html($(this).data('guarda'))
        $('#lblDescription').html($(this).data('description'))
        //cambio de turno
        if ($(this).data('novelty_type_id') == 1) {
            $('#lblTipoNovedad').html($(this).data('tipo_novedad'))
            $('#lblJornada').html($(this).data('type'))
            $('#lblEntrante').html($(this).data('incoming_name'))
            $('#lblSaliente').html($(this).data('outgoing_name'))
            $('.labelCambioTurno').attr('hidden', false)
        } else {
            $('#lblTipoNovedad').html('')
            $('#lblJornada').html('')
            $('#lblEntrante').html('')
            $('#lblSaliente').html('')
            $('.labelCambioTurno').attr('hidden', true)
        }
        
        // novedad en el servicio
        if ($(this).data('novelty_type_id') == 2) {
            $('#lblTipoNovedad2').html($(this).data('tipo_novedad'))
            $('#lblNovedad').html($(this).data('novelty_type_name'))
            $('#lblAfectado').html($(this).data('name_involved'))
            $('#lblVivienda').html($(this).data('data_involved'))
            var nombreArchivo = $(this).data('image');
            if (nombreArchivo != null) {
                var ruta = baseUrl + '/image/novedadesGuardas/' + nombreArchivo;
            } else {
                var ruta = '';
            }
            $("#lblImage").attr('src', ruta);
            $('.labelNovedadServicio').attr('hidden', false)
        }
        else {
            $('#lblTipoNovedad2').html('')
            $('#lblNovedad').html('')
            $('#lblAfectado').html('')
            $('#lblVivienda').html('')
            $('.labelNovedadServicio').attr('hidden', true)
        }

        if($(this).data('state') == 0){
            //muestra textarea y btn
            $('.divGestionar').attr('hidden',false)
            $('.divGestionado').attr('hidden',true)
        }else{
            //muestra lbt de obs
            $('.divGestionar').attr('hidden',true)
            $('.divGestionado').attr('hidden',false)
            $('#lblGestionado').html($(this).data('supervisor'))
            $('#lblObservacion').html($(this).data('observation'))
        }
        $('#modalVerNovedad').modal('show');
    });

    $('#formGestionar').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var urlA = baseUrl + "/noveltieswatchmen/" + $('#id').val();
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
                            title: '<strong>Permisos denegados</strong>',
                            type: 'error',
                            html: 'Error. No tiene los permisos para realizar esta acción. Por favor comuníquese con el administrador.',
                            confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                        });
                    } else if (result == 2) {
                        swal.fire({
                            title: '<strong>Exitoso!</strong>',
                            type: 'success',
                            html: 'El registro de la gestión ha sido guardado.',
                            showCloseButton: true,
                            focusConfirm: false,
                            confirmButtonText:
                                '<i class="fa fa-check"></i> Aceptar!',
                        });
                        table.ajax.reload();
                        $('#modalVerNovedad').modal('hide');
                    } else {
                        swal.fire({
                            title: '<strong>Error al Guardar</strong>',
                            type: 'error',
                            html: result,
                            text: 'Ocurrió un error al guardar, por favor intente nuevamente.',
                            confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                        });
                    }
                },
                error: function (response) {
                    hiddenPreload();
                    swal.fire({
                        title: '<strong>Error al Guardar</strong>',
                        type: 'error',
                        html: response.statusText,
                        text: 'Ocurrió un error al guardar, por favor intente nuevamente.',
                        confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                    });
                }
            });
        }
    });

});

$('#form_crear').on('submit', function (e) {
    if (e.isDefaultPrevented()) {
    } else {
        e.preventDefault();
        var urlA = baseUrl + "/noveltieswatchmen";
        var formData = new FormData(this);
        $('#img_novedad1')[0].files[0];
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
                        title: '<strong>Campos Vacios</strong>',
                        type: 'error',
                        html: 'Error. No se permiten ingresar valores vacíos, por favor no manipular el HTML.',
                        confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                    });
                } else if (result == 1) {
                    swal.fire({
                        title: '<strong>Éxito!</strong>',
                        type: 'success',
                        html: 'Registro creado correctamente.',
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
                        html: result,
                        text: 'Ocurrió un error al guardar, por favor intente nuevamente.',
                        confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                    });
                }
            },
            error: function (result) {
                hiddenPreload();
                swal.fire({
                    title: '<strong>Error al Guardar</strong>',
                    type: 'error',
                    html: result,
                    text: 'Ocurrió un error al guardar, por favor intente nuevamente.',
                    confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                });
            }
        });
    }
});