$(document).ready(function () {
    var table = $('#quotations_table').DataTable({
        "processing": true,
        "serverSide": true,
        // "order": [[2, "desc"]],
        "ajax": {
            "url": "/quotations/quotationsIndex",
            "dataType": "json",
            "type": "GET",
            "data": { "_token": "{{ csrf_token() }}" }
        },
        columns: [
            { data: "empresa" },
            { data: "estado" },
            { data: "fecha" },
            { data: "usuario" },
            {
                data: "action",
                render: function (data, type, full) {
                    return `
                    <div class='btn-group'>
                    <a href="/quotations/${full.crypt_id}" target="_blank" class="btn btn-dark" data-id="${full.crypt_id}" title="Ver Detalle">
                    <i class="fa fa-file-pdf-o"></i>
                    </a>
                    ` +
                        ((full.permisoAprobar == true) ?
                            `<a href="javascript:void(0)" class="btnAprobar btn btn-success" 
                    data-crypt_id="${full.crypt_id}" data-proveedores='${JSON.stringify(full.proveedores)}' data-tipo="aprobar"
                    title="Aprobar"><i class="icons cui-circle-check"></i>
                    </a>
                    <a href="javascript:void(0)" class="btnAprobar btn btn-danger" 
                    data-crypt_id="${full.crypt_id}" data-proveedores='' data-tipo="rechazar"
                    title="Rechazar"><i class="icons cui-circle-x"></i>
                    </a>`
                            : ''
                        ) +
                        ((data.estado == 'Aprobada') ?
                            `<a href="/quotations/ordencompra/${full.crypt_id}" target="_blank" class="btn btn-primary" title="PDF Orden Compra"><i class="fa fa-file-pdf-o"></i>
                    </a>`
                            : ''
                        ) +
                    ((full.permisoPago == true) ?
                    `<a href="javascript:void(0)" class="btnPagar btn btn-warning" data-full='${JSON.stringify(full)}' title="Registrar Pago"><i class="fa fa-dollar"></i>
                    </a>`
                            : ''
                        ) +
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

    $('#payment_date').datepicker({
        format: "dd-mm-yyyy",
        startDate: '-20d',
        endDate: '+0d',
        language: 'es',
        autoclose: true,
        todayHighlight: !0
    });

    $(document).on('click', '.btnArchivo', function () {
        $(this).next().trigger('click');
    });

    $('#archivo').change(function () {
        let val = $(this).val();
            if (val.length > 0) {
            val = val.replace(/C:\\fakepath\\/i, '');
            var ext = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
            if (val.length > 15) {
            $('.lblArchivo').html(val.substr(0, 13) + '....' + ext).attr('title', val).css('cursor', 'pointer');
            } else {
            $('.lblArchivo').html(val).attr('title', val).css('cursor', 'pointer');
            }
        } else {
            $(this).val(null);
            $('.lblArchivo').html('Seleccione...').attr('title', '');
        }
    });

    $(document).on('click', '.btnPagar', function () {
        var full = $(this).data('full');

        if(full.action.payment_date){
            $("#formPagar :input").attr("disabled", true);
            $('#crearPago,#btnCerrar').hide();
        }else{
            $("#formPagar :input").attr("disabled", false);
            $('#crearPago,#btnCerrar').show();
        }

        $('#id').val(full.crypt_id);
        $('#payment_date').val(full.action.payment_date);
        $('#invoice_number').val(full.action.invoice_number);
        $('#observation').val(full.action.observation);
        $('#modal_pagar').modal('show');
        // llenar botón
        var archivo = full.action.attachments;
        if (archivo) {
            if (archivo.length > 15) {
                archivo = archivo.replace(/C:\\fakepath\\/i, '');
                var ext = archivo.substring(archivo.lastIndexOf('.') + 1).toLowerCase();
                $('.lblArchivo').html(archivo.substr(0, 13) + '....' + ext).attr('title', archivo).css('cursor', 'pointer');
            } else {
                $('.lblArchivo').html(archivo).attr('title', archivo).css('cursor', 'pointer');
            }
            let ruta = '/Adjuntos/Pagos/' + archivo;
            $('.btnDownload').attr('href',ruta).attr('readonly',false).attr('disabled',false).attr('download','');
        }else{
            $('.lblArchivo').html('Seleccione...').attr('title', '');
            $('.btnDownload').attr('readonly',true).attr('disabled',true).removeAttr('download').attr('href','javascript:void(0)');
            $(this).val(null);
        }
    });

    $(document).on('submit', '#formPagar', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $('#archivo')[0].files[0];
        jQuery.ajax({
            url: baseUrl + "/quotations/registrarPago",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            type: 'POST',
            beforeSend: function () {
                showPreload();
            },
            success: function (res) {
                hiddenPreload();
                swal.fire(res.title ?? '¡Error!', res.message ?? 'Ha ocurrido un error desconocido', res.icon ?? 'error');
                table.ajax.reload();
            },
            error: function (res) {
                hiddenPreload();
                swal.fire(res.responseJSON.title ?? '¡Error!', res.responseJSON.message ?? 'Ha ocurrido un error desconocido', res.responseJSON.icon ?? 'error');
            }
        });        
    });

    $(document).on('click', '.btnAprobar', function (e) {
        e.preventDefault();
        var id = $(this).data('crypt_id');
        var tipo = $(this).data('tipo');
        var proveedores = $(this).data('proveedores');
        prov = proveedores[0];
        let radio = '';
        let label = '';
        if (proveedores != '') {
            if (prov.provider_id_1 != null) {
                label = `<label>Seleccione un proveedor </label>`;
                radio += `
                    <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="${prov.rel_proveedor1.id}" name="provider" class="custom-control-input"
                    value="${prov.rel_proveedor1.id}" required>
                    <label class="custom-control-label" for="${prov.rel_proveedor1.id}">${prov.rel_proveedor1.name}</label>
                    </div>
                    `
            }
            if (prov.provider_id_2 != null) {
                label = `<label>Seleccione un proveedor </label>`;
                radio += `
                    <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="${prov.rel_proveedor2.id}" name="provider" class="custom-control-input"
                    value="${prov.rel_proveedor2.id}" required>
                    <label class="custom-control-label" for="${prov.rel_proveedor2.id}">${prov.rel_proveedor2.name}</label>
                    </div>
                    `
            }
            if (prov.provider_id_3 != null) {
                label = `<label>Seleccione un proveedor </label>`;
                radio += `
                    <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="${prov.rel_proveedor3.id}" name="provider" class="custom-control-input"
                    value="${prov.rel_proveedor3.id}" required>
                    <label class="custom-control-label" for="${prov.rel_proveedor3.id}">${prov.rel_proveedor3.name}</label>
                    </div>
                    `
            }
        }
        swal.fire({
            title: `¿Está seguro de ${tipo} esta Cotización?`,
            html: `
                <div class="row">
                        <div class="col-md">
                        ${label}
                        <div class="form-group">${radio}</div>
                    </div>
                </div>
                `,
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: tipo[0].toUpperCase() + tipo.substring(1),
            cancelButtonText: 'Cancelar',
            preConfirm: () => {
                if (tipo == 'aprobar') {
                    var Prov = $('[name=provider]:checked').val();
                    var contadorProv = 0;
                    if (Prov == '' || Prov == null)
                        contadorProv++;

                    if (contadorProv < 3 && contadorProv > 0) {
                        toastr.error('Por favor, seleccione un proveedor', 'Información Incompleta', { timeOut: 1000 })
                        return false;
                    }
                }
            }
        }).then(function (e) {
            if (e.value) {
                var urlA = baseUrl + "/quotations/aprobarCotizacion/" + id;
                jQuery.ajax({
                    url: urlA,
                    data: { '_token': $('input[name=_token]').val(), 'tipo': tipo, 'prov':$('[name=provider]:checked').val() },
                    method: 'POST',
                    beforeSend: function () {
                        showPreload();
                    },
                    success: function (result) {
                        hiddenPreload();
                        if (result.status == 200) {
                            swal.fire('', result.msg, result.icon)
                            table.ajax.reload();
                        } else if (result.status == 403) {
                            swal.fire('', result.msg, result.icon)
                        } else {
                            swal.fire('Error al Guardar', 'Ocurrió un error al guardar, por favor intente nuevamente', 'error')
                        }
                    },
                    error: function (result) {
                        hiddenPreload();
                        swal.fire('Error al Guardar', 'Ocurrió un error al guardar, por favor intente nuevamente', 'error')
                    }
                });
            }
        });
    });
});