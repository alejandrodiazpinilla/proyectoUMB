$(document).ready(function () {
    $("#city_id,#locality_id,#neighborhood_id,#company_id").select2({
        theme: 'bootstrap',
        language: {
            noResults: function () { return "No hay resultados"; },
            searching: function () { return "Buscando.."; }
        },
        placeholder: "Seleccione..."
    });
    
    $('#date_of_visit').daterangepicker({
        opens: 'right',
        drops: 'down',
        singleDatePicker: true,
        showDropdowns: true,
        minDate: moment().subtract(0, 'days'),
        // autoApply: true,
        maxDate: moment().add(5, 'years'),
        locale: {
          format: 'YYYY-MM-DD',
          firstDay: 1
        }
      });

    $('#form_crear').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();

            if(document.getElementById("risk_analysis").files.length > 0 && $('#year').val() == ''){
                swal.fire({
                    type: 'error',
                    title: 'Error',
                    html: 'Por favor, Seleccione el año de reporte del análisis de riesgos',
                    showCloseButton: true,
                    focusConfirm: false,
                    confirmButtonText:
                        '<i class="fa fa-check"></i> Aceptar!',
                });
                return false;
            }
            var urlA = baseUrl + "/customers";
            var formData = new FormData(this);
            //ajuntar logo
            $('#logo')[0].files[0];
            //adjuntar propuesta económica
            $('#economic_proposition')[0].files[0];
            //adjuntar licitación
            $('#bidding')[0].files[0];
            //adjuntar Análisis de Riesgos
            $('#risk_analysis')[0].files[0];
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
                        window.location.assign(baseUrl + "/customers")
                    } else {
                        swal.fire({
                            title: '<strong>Error al Guardar</strong>',
                            type: 'error',
                            html: result,
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
                        html: result,
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
            if(document.getElementById("risk_analysis").files.length > 0 && $('#year').val() == ''){
                swal.fire({
                    type: 'error',
                    title: 'Error',
                    html: 'Por favor, Seleccione el año de reporte del análisis de riesgos',
                    showCloseButton: true,
                    focusConfirm: false,
                    confirmButtonText:
                        '<i class="fa fa-check"></i> Aceptar!',
                });
                return false;
            }
            
            if(document.getElementById("file_contract").files.length > 0 && ($('#contract_init_date').val() == '' || $('#contract_end_date').val() == '')){
                swal.fire({
                    type: 'error',
                    title: 'Error',
                    html: 'El período de fechas del contrato comercial no puede ir vacío.',
                    showCloseButton: true,
                    focusConfirm: false,
                    confirmButtonText:
                        '<i class="fa fa-check"></i> Aceptar!',
                });
                return false;
            }

            var urlA = baseUrl + "/customers/" + $('#id').val();
            var formData = new FormData(this);
            //ajuntar logo
            $('#logo')[0].files[0];
            //adjuntar propuesta económica
            $('#economic_proposition')[0].files[0];
            //adjuntar licitación
            $('#bidding')[0].files[0];
            //adjuntar Análisis de Riesgos
            $('#risk_analysis')[0].files[0];
            //adjuntar Análisis de Riesgos
            $('#file_contract')[0].files[0];
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
                            title: '<strong>Error de Duplicidad</strong>',
                            type: 'error',
                            html: 'Ya existe un cliente con el mismo nombre. Por favor validar los registros existentes.',
                            confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                        });
                    } else if (result == 2) {
                        swal.fire({
                            title: '<strong>Exitoso!</strong>',
                            type: 'success',
                            html: 'Registro actulizado exitosamente.',
                            showCloseButton: true,
                            focusConfirm: false,
                            confirmButtonText:
                                '<i class="fa fa-check"></i> Aceptar!',
                        });
                        window.location.assign(baseUrl + "/customers")
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
                        html: result,
                        showCloseButton: true,
                        focusConfirm: false,
                        confirmButtonText:
                            '<i class="fa fa-check"></i> OK!',
                    });
                }
            });
        }
    });

    $(document).on('click', '.activar', function() {
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
                var urlA = baseUrl + "/customers/activarRegistro/" + id;
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

    $('#formSeguimiento').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var urlA = baseUrl + "/customers/seguimiento/" + $('#id').val();
            jQuery.ajax({
                url: urlA,
                method: 'POST',
                data: $('#formSeguimiento').serialize(),
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
                    }else if (result == 1){
                        swal.fire({
                            title: '<strong>Exitoso!</strong>',
                            type: 'success',
                            html: 'Registro creado exitosamente.',
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
    
    $('#city_id').on('change', function (e) {
        $.ajax({
            type: "GET",
            url: baseUrl + '/employees/search_locality/' + $(this).val(),
            dataType: 'json',
            success: function (response) {
                $('#locality_id').attr('disabled', true).html('<option value="" disabled selected>Seleccione...<option>');
                $('#neighborhood_id').attr('disabled', true).html('<option value="" disabled selected>Seleccione...<option>');
                if (response.localidades.length != 0) {
                    var loc = '';
                    response.localidades.forEach((item, index) => {
                        loc += `<option value="${item.id}">${item.name}<option>`
                    })
                    $('#locality_id').attr('disabled', false).html('<option value="" disabled selected>Seleccione...<option>' + loc);
                }
            },
            error: function (response) {
            }
        });
    });
    $('#locality_id').on('change', function (e) {
        $.ajax({
            type: "GET",
            url: baseUrl + '/employees/search_neighborhoods/' + $(this).val(),
            dataType: 'json',
            success: function (response) {
                $('#neighborhood_id').attr('disabled', true).html('<option value="" disabled selected>Seleccione...<option>');
                if (response.barrios.length != 0) {
                    var brr = '';
                    response.barrios.forEach((item, index) => {
                        brr += `<option value="${item.id}">${item.name}<option>`
                    })
                    $('#neighborhood_id').attr('disabled', false).html('<option value="" disabled selected>Seleccione...<option>' + brr);
                }
            },
            error: function (response) {
            }
        });
    });

    $(document).on('click', '.btnVerCliente', function () {
        $('#lblname').html($(this).data('name'))
        $('#lbladmin_name').html($(this).data('admin_name'))
        $('#lblphone').html($(this).data('telephone'))
        $('#lblemail').html($(this).data('email'))
        $('#lblini_contrato').html($(this).data('contract_init_date'))
        if ($(this).data('contract_init_date') == null)
        $('#lblfin_contrato').html($(this).data('contract_end_date'))
        else
        $('#lblfin_contrato').html($(this).data('current_contract_end_date'))
        $('#lblresidential_units').html($(this).data('residential_units'))
        $('#lbladdress').html($(this).data('address'))
        $('#lblcity_name').html($(this).data('city_name'))
        $('#lbllocalidad').html($(this).data('localidad'))
        $('#lblneighborhood_name').html($(this).data('neighborhood_name'))
        var nombreArchivo = $(this).data('logo');
        if (nombreArchivo != ''){
            var ruta = baseUrl+'/image/logos/clientes/'+nombreArchivo;
        }else{
            var ruta = baseUrl+'/image/logos/clientes/sin_imagen.jpg';
        }
        $("#lblImage").attr('src',ruta);
        $('#modalVerCliente').modal('show');
    });


    //mostrar modal seguimiento
    $(document).on('click', '.btnSeguimiento', function () {    
        $('#id').val($(this).data('id'))
        $('#formSeguimiento').trigger("reset");    
        $('.hiddenEmail').attr('hidden',true);
        $('.hiddenFecha').attr('hidden',true);
        $('#email').attr('required',false);
        $('#date_of_visit').attr('required',false);
        
        if($(this).data('estado') == 3)
            $('.ventaConcretada').html('<label class="col-form-label col-sm-3"> ¿Venta Concretada? </label><div ="col-sm-3" data-toggle="tooltip" data-html="true"><label class="switch switch-label switch-pill switch-outline-success-alt"><input class="switch-input" type="checkbox" id="check_venta" name="check_venta"><span class="switch-slider" data-checked="✓" data-unchecked="✕"></span></label></div>');
        else
            $('.ventaConcretada').html('');

        $.ajax({
            type: "GET",
            url: baseUrl + '/customers/detalleSeguimiento/' + $(this).data('id'),
            dataType: 'json',
            data: $(this).data('id'),
            success: function (data) {
                var tabla = '';
                data.forEach((item) => {
                    var d = new Date(item.created_at);
                    var created_at = d.getDate()  + "-" + (d.getMonth()+1) + "-" + d.getFullYear() + " " +
                    d.getHours() + ":" + d.getMinutes();
                    var f = new Date(item.date_of_visit);
                    var date_of_visit = f.getDate()  + "-" + (f.getMonth()+1) + "-" + f.getFullYear();
                    tabla += `
                    <tr>
                    <td>${item.send_brochure}</td>
                    <td>${created_at}</td>
                    <td>${item.email?item.email:''}</td>
                    <td>${item.date_of_visit?date_of_visit:''}</td>
                    <td style="word-wrap: break-word;max-width: 400px;">${item.obs}</td>
                    </tr>
                    `
                });
                $('#tracing_table tbody').html(tabla);
            },
            error: function (data) {
            }
        });

        $('#modalSeguimiento').modal('show');
    });

    //mostrar modal adjuntos
    $(document).on('click', '.btnAdjuntos', function () {
        $.ajax({
            type: "GET",
            url: baseUrl + '/customers/verAdjuntos/' + $(this).data('id'),
            dataType: 'json',
            data: $(this).data('id'),
            success: function (response) {
                var table = $('#attachments_table').DataTable({
                    stateSave: false,
                    "oLanguage": {
                        "sUrl": baseUrl + "/plugins/datatables/es_es.json"
                    },
                    order: [[ 0, "asc" ]],
                    destroy: true,
                    searching: true,
                    data: response, 
                    responsive: true,
                    paging: true,
                    columns: [
                    {data: "name"},
                    {data: "date_send"},
                    {data: "year"},
                    {data: "type"},
                    {data: "created_at"},
                    {data: "action",
                    render: function (data,type,full,meta) {
                        return `
                        <a title="Descargar"
                        href="javascript:void(0)" data-nombre="${full.name}" data-tipo="${full.type}"
                        class='btn btn-danger btn-xs descargarArchivo'>   
                        <i class="fa fa-file-pdf-o"></i>
                         </a>
                        `;
                    },
                    orderable: false
                }
                ],
              pagingType: "full_numbers"
        });

            },
            error: function (data) {
            }
        });

        $('#modalAdjuntos').modal('show');
    });

    $(document).on('click', '.descargarArchivo', function(e){
        if (e.isDefaultPrevented()) {
        }else{
            e.preventDefault();
            jQuery.ajax({
                type: 'GET',
                url: baseUrl + "/customers/descargarArchivo/" + $(this).data('nombre'),
                dataType: 'json',
                data: {'tipo':$(this).data('tipo')},
                success: function(data){
                    window.open(data, '_blank');
                },
            });
        }
    });

    $('#check_brochure,#check_economic_proposition,#check_bidding,#check_risk').on('change', function (e) {
        if ($(this).is(':checked')) { 
            $('.hiddenEmail').attr('hidden',false);
            $('#email').attr('required',true);
        }else{
            $('.hiddenEmail').attr('hidden',true);
            $('#email').attr('required',false);
        }
    });
    $('#check_visita').on('change', function (e) {
        if ($(this).is(':checked')) {
            $('.hiddenFecha').attr('hidden',false);
            $('#date_of_visit').attr('required',true);
        }else{
            $('.hiddenFecha').attr('hidden',true);
            $('#date_of_visit').attr('required',false);
        }
    });
});