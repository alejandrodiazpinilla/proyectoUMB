$(document).ready(function () {
    
   var table = $('#visit_types_table').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [[ 1, "asc" ]],
        "ajax": {
            "url": baseUrl + "/technicalvisits/technicalVisitIndex",
            "dataType":"json",
            "type":"GET",
            "data":{"_token":"{{ csrf_token() }}"}
        },
        columns: [
            {data: "id"},
            {data: "visit_type"},
            {data: "description"},
            {data: "date"},
            {data: "observation"},
            {data: "state"},
            {data: "action",
            render: function (data,type,full,meta) {
                return `<div class='btn-group'>`+
                ((full.permiso_editar == true)?
                `<a href="javascript:void(0)" class="btnGestionar btn btn-info" 
                data-id="${data.id}"
                title="Editar"><i class="fa fa-edit"></i>
                </a>`
                :
                ``);
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
        $("#visit_type_id").val(null).trigger('change').focus();
        $('#form_crear').trigger("reset");
    });

    $('#modalGestionar').on('shown.bs.modal', function () {
        $('.hiddenFecha').attr('hidden',false);
        $('#new_date').attr('required',true);
        $('#form_gestionar').trigger("reset");
    });

    $("#visit_type_id").select2({
        theme: 'bootstrap',
        language: {
            noResults: function () { return "No hay resultados"; },
            searching: function () { return "Buscando.."; }
        },
        closeOnSelect: true,
        placeholder: "Seleccione..."
    });

    $('#date_visit,#new_date').daterangepicker({
        opens: 'right',
        drops: 'down',
        singleDatePicker: true,
        showDropdowns: true,
        minDate: moment().add(2, 'days'),
        // autoApply: true,
        maxDate: moment().add(5, 'years'),
        locale: {
          format: 'YYYY-MM-DD',
          firstDay: 1
        }
      }).val('');

    $('#form_crear').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var urlA = baseUrl + "/technicalvisits";
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
                            html:result,
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

    $(document).on('click', '.btnGestionar', function () {
        $('#id').val($(this).data('id'));
        $('#modalGestionar').modal('show');
    });

    $('#check_acept_date').on('change', function (e) {
        if ($(this).is(':checked')) {
            $('.hiddenFecha').attr('hidden',true);
            $('#new_date').attr('required',false).val('');
        }else{
            $('.hiddenFecha').attr('hidden',false);
            $('#new_date').attr('required',true);
        }
    });

    $('#form_gestionar').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var urlA = baseUrl + "/technicalvisits/" + $('#id').val();
            jQuery.ajax({
                url: urlA,
                type: 'PUT',
                data: $('#form_gestionar').serialize(),
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
                    } else if (result == 1){
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
                        html: result,
                        text: 'Ocurrió un error al guardar, por favor intente nuevamente.',
                        confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                    });
                }
            });
        }
    });
});