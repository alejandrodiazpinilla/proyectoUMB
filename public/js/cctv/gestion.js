$(document).ready(function () {

    $('#next_visit_date,#next_visit_date_edit').daterangepicker({
        opens: 'right',
        drops: 'down',
        singleDatePicker: true,
        showDropdowns: true,
        minDate: moment().add(3, 'days'),
        maxDate: moment().add(5, 'years'),
        locale: {
            format: 'YYYY-MM-DD',
            firstDay: 1
        }
    }).val('');

    var table = $('#cctv_table').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [[1, "asc"]],
        "ajax": {
            "url": baseUrl + "/cctv/cctvIndex",
            "dataType": "json",
            "type": "GET",
            "data": { "_token": "{{ csrf_token() }}" }
        },
        columns: [
            { data: "id" },
            { data: "user" },
            { data: "customer" },
            { data: "current_damage" },
            { data: "next_visit_date" },
            { data: "created_at" },
            {
                data: "action",
                render: function (data, type, full, meta) {
                    return `<div class='btn-group'>
                        <a href="javascript:void(0)" class="btnGestionar btn btn-info" 
                            data-id="${data.id}"
                            data-user="${data.user}"
                            data-customer_id="${data.customer_id}"
                            data-customer="${data.customer}"
                            data-current_damage="${data.current_damage}"
                            data-next_visit_date="${data.next_visit_date}"
                            data-created_at="${data.created_at}"
                            data-previous_novelty="${data.previous_novelty}"
                            data-current_circuit="${data.current_circuit}"
                            data-number_cameras="${data.number_cameras}"
                            data-description="${data.description}"
                            data-quotation="${data.quotation}"
                            title="Editar"><i class="fa fa-edit"></i>
                        </a>`
                        ;
                },
                orderable: false
            }],
            "oLanguage": {
                "sUrl": baseUrl + "/plugins/datatables/es_es.json"
            },
        responsive: true,
        pagingType: "full_numbers"
    });

    $('#modal_crear').on('shown.bs.modal', function () {
        $("#customer_id").val(null).trigger('change').focus();
        $('#form_crear').trigger("reset");
        $("#next_visit_date_edit").focus();
    });

    $('#form_actualizar').on('shown.bs.modal', function () {
        $('#form_crear').trigger("reset");
        $("#customer_id").focus();
    });

    $("#customer_id").select2({
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
            var urlA = baseUrl + "/cctv";
            var formData = new FormData(this);
            //ajuntar cotizacion
            $('#quotationFile')[0].files[0];
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
                            title: '<strong>Exitoso!</strong>',
                            type: 'success',
                            html: 'Registro creado exitosamente.',
                            showCloseButton: true,
                            focusConfirm: false,
                            confirmButtonText:
                                '<i class="fa fa-check"></i> Aceptar!',
                        });
                        table.ajax.reload();
                        $('#modal_crear').modal('hide');
                    } else {
                        swal.fire({
                            title: '<strong>Error al Guardar</strong>',
                            type: 'error',
                            text: 'Ocurrió un error al guardar, por favor intente nuevamente.',
                            html: result,
                            confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                        });
                    }
                },
                error: function (result) {
                    hiddenPreload();
                    swal.fire({
                        title: '<strong>Error al Guardar</strong>',
                        type: 'error',
                        html: result.responseJSON['message'],
                        text: 'Ocurrió un error al guardar, por favor intente nuevamente.',
                        confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                    });
                }
            });
        }
    });

    $('#form_gestionar').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var urlA = baseUrl + "/cctv/update/" + $('#id').val();
            var formData = new FormData(this);
            //ajuntar cotizacion
            $('#quotationFile2')[0].files[0];
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
                            title: '<strong>Exitoso!</strong>',
                            type: 'success',
                            html: 'El registro de la actividad ha sido guardado.',
                            showCloseButton: true,
                            focusConfirm: false,
                            confirmButtonText:
                                '<i class="fa fa-check"></i> Aceptar!',
                        });
                        table.ajax.reload();
                        $('#modalGestionar').modal('hide');
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
                        html: result.responseJSON['message'],
                        text: 'Ocurrió un error al guardar, por favor intente nuevamente.',
                        confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                    });
                }
            });
        }
    });

    $(document).on('click', '.btnGestionar', function () {
        $('#id').val($(this).data('id'));
        $('#customer_id_edit').val($(this).data('customer_id'));
        $('#lblCliente').html($(this).data('customer'));
        $('#lblNovedadAnterior').html($(this).data('previous_novelty'));
        $('#lblCircuito').html($(this).data('current_circuit'));
        $('#lblCamaras').html($(this).data('number_cameras'));
        $('#lblDano').html($(this).data('current_damage'));
        $('#lblObs').html($(this).data('description'));
        $('#next_visit_date_edit').val($(this).data('next_visit_date'));

        var pdf = $(this).data('quotation');
        // si aun no se ha cargado la cotizacion...
        if(pdf == null){
            // muestra input file
            $('.conCotizacion').attr('hidden',true);
            $('.sinCotizacion').attr('hidden',false);
            $('#quotationFile2').attr('required',true);
            $('.btnDescargarPDF').attr('data-quotation','')
            $('.btnEliminarPDF').attr('data-id','')
        }else{
            // muestra el archivo para descarga
            $('.conCotizacion').attr('hidden',false);
            $('.sinCotizacion').attr('hidden',true);
            $('#quotationFile2').attr('required',false);
            $('#lblQuotation').html($(this).data('quotation'));
            $('.btnDescargarPDF').attr('data-quotation',$(this).data('quotation'))
            $('.btnEliminarPDF').attr('data-id',$(this).data('id'))
        }
        $('#modalGestionar').modal('show');
    });
    $(document).on('click', '.btnDescargarPDF', function () {
        var url = 'Adjuntos/InformeCCTV/' + $(this).data('quotation')
        window.open(url, '_blank');
      });
    
      $(document).on('click', '.btnEliminarPDF', function() {
        var id = $(this).data('id');
        swal.fire({
            title: "¿Está seguro de eliminar este archivo? ",
            text: "",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: 'Eliminar!'
        }).then(function(e) {
            if(e.value){
                showPreload();
                var urlA = baseUrl + "/cctv/eliminarPdfCotizacion/" + id;
                jQuery.ajax({
                    url: urlA,
                    type: 'POST',
                    data: {
                        '_token': $('input[name=_token]').val(),
                    },
                    success: function(result){
                        if(result == 0){
                            swal.fire({
                                type: 'error',
                                title: 'Error',
                                text: 'Ocurrio un problema al eliminar el archivo',
                                html: result,
                                confirmButtonText:
                                '<i class="fa fa-check"></i> OK!',
                            });
                        }else{
                            swal.fire({
                                title: '<strong>Archivo eliminado correctamente</strong>',
                                type: 'success',
                                html: '',
                                showCloseButton: true,
                                focusConfirm: false,
                                confirmButtonText:
                                '<i class="fa fa-check"></i> OK!',
                            });
                            $('.conCotizacion').attr('hidden',true);
                            $('.sinCotizacion').attr('hidden',false);
                            $('#quotationFile2').attr('required',true).val(null);
                            $('.btnDescargarPDF').attr('data-quotation','')
                            $('.btnEliminarPDF').attr('data-id','')
                            $('#modalGestionar').modal('hide');
                            $('.custom-file-label').html('Seleccione un archivo')
                            table.ajax.reload();

                        }
                    },
                    error: function(result){
                        swal.fire({
                            type: 'error',
                            title: 'Error',
                            text: 'Ocurrio un problema al eliminar el archivo',
                            html:result.responseJSON['message'],
                            confirmButtonText:
                            '<i class="fa fa-check"></i> OK!',
                        });
                    }
                });
            }
        });
    });
});