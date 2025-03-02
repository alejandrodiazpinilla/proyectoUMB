$(document).ready(function () {
    var table = $('#terminationstaff_table').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [[0, "asc"]],
        "ajax": {
            "url": baseUrl + "/terminationstaff/terminationStaffIndex",
            "dataType": "json",
            "type": "GET",
            "data": { "_token": "{{ csrf_token() }}" }
        },
        columns: [
            { data: "id" },
            { data: "empleado" },
            { data: "cliente" },
            { data: "state_id" },
            { data: "tipo_retiro" },
            { data: "retirement_date" },
            { data: "action",
                render: function (data, type, full, meta) {
                    return `<div class='btn-group'>
                    `+
                    ((full.permisoAprobar === true)?
                    `<a href="javascript:void(0)" class="btnAprobar btn btn-success" 
                    data-crypt_id="${full.crypt_id}"
                    data-tipo="aprobar"
                    title="Aprobar"><i class="icons cui-circle-check"></i>
                    </a>
                    <a href="javascript:void(0)" class="btnAprobar btn btn-danger" 
                    data-crypt_id="${full.crypt_id}"
                    data-tipo="rechazar"
                    title="Rechazar"><i class="icons cui-circle-x"></i>
                    </a>`
                    :''
                    )+
                    `<a href="javascript:void(0)" class="btnDetalle btn btn-warning" 
                    data-full='${JSON.stringify(full)}'
                    title="Ver Detalle"><i class="fa fa-eye"></i>
                    </a>`+
                    ((full.current_state !== "Por Gestionar")?
                    `<a href="javascript:void(0)" class="btnSeguimiento btn btn-dark" 
                    data-seg='${full.seg}'
                    title="Ver Seguimiento"><i class="fa fa-history"></i>
                    </a>`
                    :''
                    )+
                    `</div>`;
                },
                orderable: false
            }],
        "oLanguage": {
            "sUrl": baseUrl + "/plugins/datatables/es_es.json"
        },
        responsive: true,
        pagingType: "full_numbers"
    });

    // precargar los datos del trabajador al digitar cedula
    $("#identification").blur(function () {
        var value = $(this).val();
        if (value.length == 0) {
        } else {
            $.ajax({
                url: baseUrl + "/terminationstaff/consultarTrabajador/" + $(this).val(),
                method: "GET",
                dataType: "json",
                cache: false,
            }).done(function (data) {
                if (data.status !== 0) {
                    $("#nombre_trabajador").val(data.trabajador.name);
                    $("#email_trabajador").val(data.trabajador.email);
                    $("#telefono_trabajador").val(data.trabajador.telephone);
                } else {
                    $("#identification").val('')
                    $("#nombre_trabajador").val('');
                    $("#email_trabajador").val('');
                    $("#telefono_trabajador").val('');
                }
            });
        }
    });

    $('#retirement_date').datepicker({
        format: "yyyy-mm-dd",
        startDate: '-5d',
        endDate: '+15d',
        language: 'es',
        autoclose: true,
        todayHighlight: !0
    });

    $('#fecha_inicio_reporte').datepicker({
        format: "dd-mm-yyyy",
        startDate: '01-01-2021',
        endDate: '+0d',
        language: 'es',
        autoclose: true,
        todayHighlight: !0
    }).on('changeDate',
        function (selected) {
            $('#fecha_fin_reporte').datepicker('clearDates');
            $('#fecha_fin_reporte').datepicker('setStartDate', $(this).val());
        });
    $('#fecha_fin_reporte').datepicker({
        format: "dd-mm-yyyy",
        startDate: '+0d',
        endDate: '+0d',
        language: 'es',
        autoclose: true,
        todayHighlight: !0
    });

    $('#modal_crear').on('shown.bs.modal', function () {
        $("#retirement_type_id").val(null).trigger('change').focus();
        $("#company_id").val(null).trigger('change');
        $("#customer_id").val(null).trigger('change');
        $('#form_crear').trigger("reset");
        $('.custom-file-label').html('Seleccione un archivo')
    });
    $("#retirement_type_id, #company_id, #customer_id").select2({
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
            var urlA = baseUrl + "/terminationstaff";
            var formData = new FormData(this);
            //ajunto
            $('#attached')[0].files[0];
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
                            type: 'error',
                            title: 'Error',
                            text: 'Empleado no Registra en el Sistema',
                            footer: '',
                            confirmButtonText:
                                '<i class="fa fa-check"></i> Aceptar!',
                        });
                    } else if (result == 1) {
                        swal.fire({
                            title: '<strong>Registro creado exitosamente</strong>',
                            type: 'success',
                            html: 'Gracias.',
                            showCloseButton: true,
                            focusConfirm: false,
                            confirmButtonText:
                                '<i class="fa fa-check"></i> Aceptar!',
                        });
                        $('#modal_crear').modal('hide');
                        table.ajax.reload();
                    } else {
                        swal.fire({
                            type: 'error',
                            title: 'Error',
                            text: 'Ocurrio un problema al guardar',
                            footer: '',
                            confirmButtonText:
                                '<i class="fa fa-check"></i> Aceptar!',
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

    $(document).on('click', '.btnAprobar', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var id = $(this).data('crypt_id');
            var tipo = $(this).data('tipo');
            Swal.fire({
                title: "¿Está seguro de "+tipo+" este retiro? ",
                text: 'Observación',
                input: 'textarea',
                inputAttributes: {autocapitalize: 'on'},
                showCancelButton: true,
                confirmButtonText: tipo[0].toUpperCase() + tipo.substring(1),
                cancelButtonText:'Cancelar',
                showLoaderOnConfirm: true,
                preConfirm: (obs) => {
                var urlA = baseUrl + "/terminationstaff/aprobarDesvinculacion/" + id;
                jQuery.ajax({
                            url: urlA,
                            data:{'_token': $('input[name=_token]').val(),'tipo': tipo, 'obs':obs},
                            method: 'POST'
                })
                .then(response => {
                    if (response == 0) {
                        Swal.fire('Ud no tiene permisos para realizar ésta acción','','error')
                      }else if (response == 1) {
                        Swal.fire('Estado actualizado exitosamente','','success')
                        table.ajax.reload();
                      }
                })
                .catch(error => {
                    Swal.fire('Ha ocurrido un error. Por favor intentelo nuevamente','','error')
                })
                }
              })
        }
    });
    $(document).on('click', '.btnSeguimiento', function () {
        let seg = $(this).data('seg');
        $('.lblTrabajador').html(seg[0].rel_seguimiento.rel_empleado.name)
        let body = ''
        seg.forEach((item) => {
        var color = '#6f42c1 !important'; //purple
            if (item.rel_estado.name.match(/Aprobado por RRHH.*/))  
                color = '#36c6d3 !important'; //success  
            else if (item.rel_estado.name.match(/Gestionar.*/))  
                color = '#20a8d8 !important'; //primary 
            else if (item.rel_estado.name.match(/Aprobado.*/))  
                color = '#ffc107 !important'; //warning 
            else if (item.rel_estado.name.match(/Rechazado.*/))  
                color = '#f86c6b !important'; //danger

            var d = new Date(item.created_at);
            var created_at = d.getDate()  + "-" + (d.getMonth()+1) + "-" + d.getFullYear() + " " + d.getHours() + ":" + (d.getMinutes()<10?'0':'') + d.getMinutes();
            body += `
            <li>
            <a style="color: ${color}">${item.rel_estado.name}</a>
            <a class="float-right">${created_at}</a>
            <p>${item.description}</p>
            </li>
            <hr>
            `
        });
        $('.timeline').html(body)
        // $('ul.timeline').children().css('--myVar', color);
        $('#modalVerSeguimiento').modal('show');
    });

    $(document).on('click', '.btnDetalle', function () {
        let full = $(this).data('full');

        $('#lblEmpleado').html(full.empleado);
        $('#lblCliente').html(full.cliente?full.cliente:'');
        $('#lblFecha').html(full.retirement_date);
        $('#lblTipo').html(full.tipo_retiro);
        $('#lblEstado').html(full.current_state);

    
        var pdf = full.adjunto?full.adjunto:null;
        // si no se cargo adjunto...
        if(pdf == null){
            $('.sinAdjunto').attr('hidden',true);
            $('.btnDescargarPDF').attr('data-adjunto','')
            $('#lblAdjuntos').html('');
    }else{
            // muestra el archivo para descarga
            $('.sinAdjunto').attr('hidden',false);
            $('.btnDescargarPDF').attr('data-adjunto',pdf)
            $('#lblAdjuntos').html(full.adjunto);
        }
        $('#modalVerDetalle').modal('show');
    });

    $(document).on('click', '.btnDescargarPDF', function () {
        var url = 'Adjuntos/Retiros/' + $(this).data('adjunto')
        window.open(url, '_blank');
      });


});

