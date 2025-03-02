
$(document).ready(function () {

    $('#start_date').datepicker({
        format: "yyyy-mm-dd",
        startDate: '+0d',
        endDate: '+30d',
        language: 'es',
        autoclose: true,
        todayHighlight: !0
    }).on('changeDate',
        function (selected) {
            $('#end_date').datepicker('clearDates');
            $('#end_date').datepicker('setStartDate', $(this).val());
        });
    $('#end_date').datepicker({
        format: "yyyy-mm-dd",
        startDate: '+0d',
        endDate: '+365d',
        language: 'es',
        autoclose: true,
        todayHighlight: !0
    });

    $('#fecha_nacimiento,#fecha_expedicion').datepicker({
        format: "dd-mm-yyyy",
        startDate: '-80y',
        endDate: '-18y',
        language: 'es',
        autoclose: true,
        todayHighlight: !0
    });

    $('#modal_contratos').on('hidden.bs.modal', function () {
        $("#start_date").focus();
        $(".custom-file-label").eq(0).html('Seleccione un archivo');
        $(".custom-file-label").eq(1).html('Seleccione archivos');
        $('#contracts_table').DataTable().destroy();
        $('#contracts_table tbody').empty();
        $('#formCrearContrato').trigger("reset");
    });

    var table = $('#employees_table').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [[1, "asc"]],
        "ajax": {
            "url": "employees/employeesIndex",
            "dataType": "json",
            "type": "GET",
            "data": { "_token": "{{ csrf_token() }}" }
        },
        columns: [
            { data: "identification" },
            { data: "name" },
            { data: "email" },
            { data: "gender" },
            { data: "state" },
            {
                data: "action",
                render: function (data, type, full, meta) {
                    return `<div class="btn-group">
                    <a href="javascript:void(0)" data-id="${full.id}" class="btn btn-warning btnContratos" title="Contratos">
                    <i class="fa fa-book"></i>
                    </a>` +
                        ((full.permisoActualizar == true) ?
                            `<a href="` + baseUrl + `/employees/` + full.id + `/edit" class="btn btn-dark" title="Editar">
                    <i class="fa fa-edit"></i>
                    </a>`
                            : ''
                        ) +
                        ((full.permisoBloquear == true) ?
                            ((data.state == 0) ?
                                `<a href="javascript:void(0)" class="me-2 delete-modal btn btn-success" title="Activar" data-id="${full.id}" data-state="${data.state}">
                        <i class="icons cui-circle-check"></i>
                        </a>`
                                :
                                `<a href="javascript:void(0)" class="me-2 delete-modal btn btn-danger" title="Bloquear" data-id="${full.id}" data-state="${data.state}">
                        <i class="icons cui-circle-x"></i>
                        </a>`)
                            : ''
                        ) +
                        `<a href="` + baseUrl + `/employees/mostrarCurriculum/` + full.id + `" data-id="${full.id}" class="btn bg-cyan text-white btnCurriculum" title="Curriculum">
                        <i class="fa fa-address-card-o"></i>
                        </a>
                        </div>`;
                },
                orderable: false
            }],
            "oLanguage": {
                "sUrl": baseUrl + "/plugins/datatables/es_es.json"
            },
        responsive: true,
        pagingType: "full_numbers"
    });

    $(".select2-single").select2({
        theme: 'bootstrap',
        language: {
            noResults: function () { return "No hay resultados"; },
            searching: function () { return "Buscando.."; }
        },
        placeholder: "Seleccione..."
    });

    $(document).on('click', '.btnContratos', function () {
        $('#employe_id').val($(this).data('id'));
        $.ajax({
            type: "GET",
            url: baseUrl + '/employees/detalleContratos',
            dataType: 'json',
            data: { id: $(this).data('id') },
            success: function (data) {
                var sol = '';
                    data.solicitudes.forEach((item) => {
                        sol += `<option value="${item}">${item}<option>`
                    })
                    $('#staff_request_id').html('<option value="" disabled selected>Seleccione...<option>' + sol);
                let permisoAgregarExamen = data.permisoAgregarExamen;
                let permisoCrearContrato = data.permisoCrearContrato;
                $('#contracts_table').DataTable({
                    stateSave: false,
                    "oLanguage": {
                        "sUrl": baseUrl + "/plugins/datatables/es_es.json"
                    },
                    order: [[0, "desc"]],
                    destroy: true,
                    searching: true,
                    data: data.contratos,
                    responsive: true,
                    paging: true,
                    columns: [
                        { data: "start_date",
                        render: function (data, type, full, meta) {
                            var estado = full.state == 1 ? '<i class="fa fa-check-circle text-success mr-3"></i>': '<i class="fa fa-times-circle text-danger mr-3"></i>';
                            return `${estado+full.start_date}`}
                        },
                        { data: "end_date" },
                        { data: "position" },
                        { data: "schedule" },
                        { data: "id",
                            render: function (data, type, full, meta) {
                                return `
                                <div class="btn-group">` +
                                    ((full.file.length > 1) ?
                                        `<a title="Descargar" href="Adjuntos/Contratos/${full.file}" target="_blank" class='btn btn-danger btn-xs'>   
                                <i class="fa fa-file-pdf-o"></i>
                                </a>` : '') +
                                    `` +
                                    ((full.attached.length > 1) ?
                                        `<a title="Descargar Anexos" href="Adjuntos/Contratos/${full.attached}" target="_blank" class='btn bg-purple text-white btn-xs'>   
                                <i class="fa fa-file-zip-o"></i>
                                </a>` : '') +
                                ((permisoCrearContrato == true) ?
                                    `<a title="Agregar Otros Anexos" href="javascript:void(0)" class='btn btn-dark btn-xs btnOtrosAnexos'>
                                <i class="fa fa-upload"></i>
                                </a>
                                <input type="file" hidden class="inputAnexos" name="otros_anexos[]" accept="application/pdf, image/png, image/jpg, , application/msword" multiple data-id="${full.id}"/>
                                <a href="javascript:void(0)" class="btn btn-warning actualizarAdjuntos" title="Actualizar Archivo" data-id="${full.id}">
                                <i class="fa fa-refresh"></i>
                                </a>

                                <a href="javascript:void(0)" class="btn bg-teal text-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Exámenes">
                                <i class="fa fa-user-md"></i>
                                </a>
                                <div class="dropdown-menu" x-placement="bottom-start">` +
                                    ((permisoAgregarExamen == true) ?
                                        `<a class="dropdown-item agregarExamenes" href="javascript:void(0)" data-id="${full.id}">Agregar Exámenes</a>`
                                        : '') +
                                    `<a class="dropdown-item mostrarExamenes" href="javascript:void(0)" data-id="${full.id}">Mostrar Exámenes</a>
                                </div>`
                                : '') +
                            `</div>`
                                    ;
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
        $('#modal_contratos').modal('show');
    });

    $(document).on('click', '.btnOtrosAnexos', function () {
        $(this).next().trigger('click');
    });

    $(document).on('change', '.inputAnexos', function (e) {
        var id = $(this).data('id');
        var urlA = baseUrl + "/employees/agregarAnexos/" + id;
        var formData = new FormData();
        let files = $(this).prop('files');
        for (let i = 0; i < files.length; i++) {
            formData.append('anexos[]', files[i]);
        }
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
                if (result == 1) {
                    Swal.fire('Anexos agregados correctamente', '', 'success')
                    $('#modal_contratos').modal('hide');
                } else {
                    Swal.fire('Ocurrió un error al guardar, por favor intente nuevamente.', '', 'error')
                }
            },
            error: function (result) {
                hiddenPreload();
                Swal.fire('Ocurrió un error al guardar, por favor intente nuevamente.', '', 'error')
            }
        });
    });

    $('#formCrearContrato').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var urlA = baseUrl + "/employees/crearContrato";
            var formData = new FormData(this);
            //adjuntar contrato
            $('#archivo')[0].files[0];
            //adjuntar anexos
            var anexos = $('#anexos')[0].files;
            $.each(anexos, function (i, file) {
                formData.append('anexo', file);
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
                        Swal.fire('Registro Duplicado', 'Ya existe un registro con los mismos criterios. <br> Por favor validar.', 'error')
                    } else if (result == 1) {
                        Swal.fire('Registro creado exitosamente.', '', 'success')
                        $('#modal_contratos').modal('hide');
                    } else {
                        Swal.fire('Ocurrió un error al guardar, por favor intente nuevamente.', '', 'error')
                    }
                },
                error: function (result) {
                    hiddenPreload();
                    Swal.fire('Ocurrió un error al guardar, por favor intente nuevamente.', '', 'error')
                }
            });
        }
    });

    $('#form_crear').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var urlA = baseUrl + "/employees";
            jQuery.ajax({
                url: urlA,
                type: 'POST',
                data: $('#form_crear').serialize(),
                beforeSend: function () {
                    showPreload();
                },
                success: function (result) {
                    hiddenPreload();
                    if (result == 0) {
                        swal.fire({
                            type: 'error',
                            title: 'Error',
                            text: 'Ocurrio un problema al guardar',
                            footer: '',
                            confirmButtonText:
                                '<i class="fa fa-check"></i> Aceptar!',
                        });
                    } else if (result == 1) {
                        Swal.fire('Ya existe un empleado con este mismo numero de cédula y/o email <br> Por favor, valide la información.', '', 'error')
                    } else {
                        Swal.fire('Registro creado exitosamente.', '', 'success')
                        window.location.assign(baseUrl + "/employees")
                    }
                },
                error: function (result) {
                    hiddenPreload();
                    Swal.fire('Ocurrió un error al guardar, por favor intente nuevamente.', '', 'error')
                }
            });

        }
    });

    $('#form_actualizar').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var urlA = baseUrl + "/employees/" + $('#employe_id').val();
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
                    window.location.assign(baseUrl + "/employees")
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


    $(document).on('click', '.delete-modal', function () {
        var id = $(this).data('id');
        var state = $(this).data('state');
        $('#btnAccion').removeClass('btn-danger');
        $('#btnAccion').removeClass('btn-warning');
        $('#btnAccion').addClass('btn-danger');
        if (state == 0) {
            text1 = 'activar'
            btn = 'Activar'
            text2 = 'activado'
        } else {
            text1 = 'inactivar'
            btn = 'Inactivar'
            text2 = 'inactivo'
        }
        swal.fire({
            title: "¿Esta seguro de " + text1 + " este empleado? ",
            text: " ",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: btn
        }).then(function (e) {
            if (e.value) {
                showPreload();
                var urlA = baseUrl + "/employees/activarRegistro/" + id;
                jQuery.ajax({
                    url: urlA,
                    type: 'POST',
                    data: {
                        '_token': $('input[name=_token]').val(),
                    },
                    success: function (result) {
                        hiddenPreload();
                        if (result == 0) {
                            swal.fire({
                                type: 'error',
                                title: 'Error',
                                text: 'Ocurrio un problema al '.text1,
                                footer: '',
                                confirmButtonText:
                                    '<i class="fa fa-check"></i> OK!',
                            });
                        } else {
                            swal.fire({
                                title: '<strong>Registro ' + text2 + ' correctamente</strong>',
                                type: 'success',
                                showCloseButton: true,
                                focusConfirm: false,
                                confirmButtonText:
                                    '<i class="fa fa-check"></i> OK!',
                            });
                        }
                        table.ajax.reload();
                    },
                    error: function (result) {
                        hiddenPreload();
                        swal.fire({
                            type: 'error',
                            title: 'Error',
                            text: 'Ocurrio un problema al ' + text1,
                            footer: '',
                            confirmButtonText:
                                '<i class="fa fa-check"></i> Aceptar!',
                        });
                    }
                });
            }
        });
    });

    $('#municipo_residencia').on('change', function (e) {
        $.ajax({
            type: "GET",
            url: baseUrl + '/employees/search_locality/' + $(this).val(),
            dataType: 'json',
            success: function (response) {
                $('#localidad_residencia').attr('disabled', true).html('<option value="" disabled selected>Seleccione...<option>');
                $('#barrio_residencia').attr('disabled', true).html('<option value="" disabled selected>Seleccione...<option>');
                if (response.localidades.length != 0) {
                    var loc = '';
                    response.localidades.forEach((item, index) => {
                        loc += `<option value="${item.id}">${item.name}<option>`
                    })
                    $('#localidad_residencia').attr('disabled', false).html('<option value="" disabled selected>Seleccione...<option>' + loc);
                }
            },
            error: function (response) {
            }
        });
    });
    $('#localidad_residencia').on('change', function (e) {
        $.ajax({
            type: "GET",
            url: baseUrl + '/employees/search_neighborhoods/' + $(this).val(),
            dataType: 'json',
            success: function (response) {
                $('#barrio_residencia').attr('disabled', true).html('<option value="" disabled selected>Seleccione...<option>');
                if (response.barrios.length != 0) {
                    var loc = '';
                    response.barrios.forEach((item, index) => {
                        loc += `<option value="${item.id}">${item.name}<option>`
                    })
                    $('#barrio_residencia').attr('disabled', false).html('<option value="" disabled selected>Seleccione...<option>' + loc);
                }
            },
            error: function (response) {
            }
        });
    });

    $("#empresa_id").on("change", function (e) {
        var selected_element = $(e.currentTarget);
        var select_val = selected_element.val();

        if (select_val == '') {
            $('#rol option').remove();
            $('#rol optgroup').remove();
            $('#area option').remove();
            $('#area optgroup').remove();
        } else {
            e.preventDefault();
            $.ajax({
                url: `${baseUrl}/users/areaempresa`,
                cache: false,
                method: "GET",
                dataType: "JSON",
                data: {
                    cedula: $('#cedula').val(),
                    empresas: $(this).val(),
                    email: $('#email').val()
                },
                success(res) {
                    if (res === 0) {
                        $.ajax({
                            url: baseUrl + "/users/rolandarea/" + select_val,
                            cache: false,
                            method: "GET",
                            dataType: "json",
                            cache: false,
                        }).done(function (data) {

                            $('#rol').empty().val("");
                            $('#area option').remove();
                            $('#area optgroup').remove();
                            $("#area").select2({
                                theme: 'bootstrap',
                                data: data[1],
                                language: {
                                    noResults: function () { return "No hay resultados"; },
                                    searching: function () { return "Buscando.."; }
                                },
                            });
                            data[0].forEach(element => {
                                $('#rol').append(`<option value='${element.id}'>${element.display_name}</option>`);
                            });
                        });
                    } else {
                        $('#rol').empty().val("");
                        $('#area option').remove();
                        $('#area optgroup').remove();

                        res[0].roles.forEach(element => {
                            $('#rol').append(`<option value='${element[0].id}'>${element[0].display_name}</option>`);
                        });

                        res[0].area.forEach(element => {
                            $('#area').append(`<option value='${element.id}'>${element.nombre}</option>`);
                        });
                    }
                }
            })
        }
    });

    $(document).on('click', '.actualizarAdjuntos', function (e) {
        var id = $(this).data('id');
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            swal.fire({
                showConfirmButton: false,
                title: '¿Que tipo de archivo desea cambiar?',
                html: `<div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="archivo_edit">Contrato</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control"
                                id="archivo_edit" name="archivo_edit" lang="es" style="cursor: pointer;"
                                accept="application/pdf" data-id="${id}" data-tipo="contrato" required>
                            <label class="custom-file-label" for="archivo_edit" data-browse="PDF">
                                Seleccione un archivo
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="anexos_edit">Documentos Anexos</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control"
                                id="anexos_edit" name="anexos_edit[]" lang="es" style="cursor: pointer;"
                                accept="application/pdf, image/png, image/jpg, , application/msword"
                                multiple data-id="${id}" data-tipo="anexos" required>
                            <label class="custom-file-label" for="anexos_edit"
                                data-browse="Seleccione">
                                Seleccione archivos
                            </label>
                        </div>
                    </div>
                </div>
            </div>`,
                footer: '<h6 class="text-danger">Recuerde que este proceso no permite recuperar ningun archivo.</h6>',
                type: 'warning'
            });
        }
    });

    $(document).on('click', '.agregarExamenes', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            swal.fire({
                showConfirmButton: true,
                confirmButtonText: 'Guardar',
                showCloseButton: true,
                showLoaderOnConfirm: true,
                footer: '<h6 class="text-danger">Todos los campos son obligatorios</h6>',
                type: 'info',
                title: 'Agregar Exámen Médico y Psicométrico',
                html: `<hr>
                <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="tipo_examen_medico" class="font-weight-bold">Exámen Médico</label>
                        <div class="input-group">
                            <select id="tipo_examen_medico" name="tipo_examen_medico" class="form-control form-control-lg">
                                <option selected readonly disabled value="">Seleccione...</option>
                                <option value="Ingreso">Ingreso</option>
                                <option value="Periódico">Periódico</option>
                                <option value="Retiro">Retiro</option>
                                <option value="Post Incapacidad">Post Incapacidad</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="date" class="form-control form-control-lg" placeholder="Fecha de Realización" name="date_medico"
                                id="date_medico" autocomplete="off" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control"
                                id="file_medico" name="file_medico" lang="es" style="cursor: pointer;"
                                accept="application/pdf" data-tipo="medico">
                            <label class="custom-file-label text-left" for="file_medico" data-browse="PDF">
                                Seleccione un archivo
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                        <label for="type" class="font-weight-bold">Exámen Psicométrico</label>
                        <div class="form-group ">
                        <label for="type" class="font-weight-bold"></label>
                        <div class="custom-control custom-radio custom-control-inline ml-3 mr-3 mt-3">
                        <input type="radio" id="radApto" name="radioConcepto" value="Apto" class="custom-control-input" >
                        <label class="custom-control-label" for="radApto">Apto</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline ml-3 mr-3 mt-3">
                        <input type="radio" id="radNoApto" name="radioConcepto" value="No Apto" class="custom-control-input" >
                        <label class="custom-control-label" for="radNoApto">No Apto</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="date" class="form-control form-control-lg" placeholder="Fecha de Realización" name="date_psico"
                                id="date_psico" autocomplete="off"  />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control"
                                id="file_psico" name="file_psico" lang="es" style="cursor: pointer;"
                                accept="application/pdf" data-tipo="psico" >
                            <label class="custom-file-label text-left" for="file_psico" data-browse="PDF">
                                Seleccione un archivo
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            `,
                preConfirm: () => {
                    let medico = $('#tipo_examen_medico').val();
                    let fechaMed = $('#date_medico').val();
                    let fileMed = $('#file_medico')[0].files[0];
                    let psico = $('[name=radioConcepto]:checked').val();
                    let fechaPsico = $('#date_psico').val();
                    let filePsico = $('#file_psico')[0].files[0];

                    var contadorMed = 0;
                    var contadorPsico = 0;
                    if (medico == '' || medico == null)
                        contadorMed++;
                    if (fechaMed == '' || fechaMed == null)
                        contadorMed++;;
                    if (fileMed == 'undefined' || fileMed == '' || fileMed == null)
                        contadorMed++;;
                    if (psico == '' || psico == null)
                        contadorPsico++;
                    if (fechaPsico == '' || fechaPsico == null)
                        contadorPsico++;
                    if (filePsico == 'undefined' || filePsico == '' || filePsico == null)
                    contadorPsico++;

                    if ((contadorMed < 3 && contadorMed > 0) || (contadorPsico < 3 && contadorPsico > 0) ) {
                        Swal.fire('Información Incompleta', '', 'error')
                        return false;
                    }else if ((contadorMed == 3) && (contadorPsico == 3) ) {
                        Swal.fire('No se registró información para almacenar', '', 'info')
                        return false;
                    }

                    var formData = new FormData();
                    formData.append('contract_id', $(this).data('id'));

                    //datos del exámen médico
                    formData.append('tipo_examen_medico', medico);
                    formData.append('date_medico', fechaMed);
                    formData.append('file_medico', fileMed);

                    //datos del exámen psicométrico
                    formData.append('concepto_psico', psico);
                    formData.append('date_psico', fechaPsico);
                    formData.append('file_psico', filePsico);

                    var urlA = baseUrl + "/employees/cargarExamenes";
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
                        type: 'POST'
                    })
                        .then(response => {
                            if (response == 1) {
                                Swal.fire('Exámenes cargados exitosamente', '', 'success')
                            } else {
                                Swal.fire('Ha ocurrido un error. Por favor intentelo nuevamente', '', 'error')
                            }
                        })
                        .catch(error => {
                            Swal.fire('Ha ocurrido un error. Por favor intentelo nuevamente', '', 'error')
                        })
                }
            });
        }
    });

    $(document).on('click', '.mostrarExamenes', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: baseUrl + '/employees/detalleExamenes',
                dataType: 'json',
                data: { id: $(this).data('id') },
                success: function (data) {
                    if(data.length>0){
                    var datos = '';
                    data.forEach((item, index) => {
                        var concepto = '';
                        if(item.concept != null){
                            concepto = `
                            <div class="form-group">
                            <label class="font-weight-bold">${item.concept}</label>
                            </div>`;
                        }
                        datos += `
                            <hr>
                            <div class="row">
                            <div class="col-md-12">
                            <div class="form-group">
                            <label class="font-weight-bold">${item.type}</label>
                            </div>
                            ${concepto}
                            <div class="form-group">
                            <label class="font-weight-bold">${item.date}</label>
                            </div>
                            <div class="form-group">
                            <a href="../Adjuntos/Examenes/${item.file}" target="_blank" title="${item.file}" class="text-danger">
                            <i class="fa fa-download"></i>
                            </a>
                            </div>
                            </div>
                            </div>
                            </div>
                        `
                    })
                    swal.fire({
                        showConfirmButton: false,
                        showCloseButton: true,
                        type: 'info',
                        title: 'Descargar Exámen Médico y Psicométrico',
                        html: datos
                    });
                    }else{
                        Swal.fire('Registro sin Exámenes', 'Aún no se han registrado exámenes vinculados a este contrato', 'error')
                    }
                }
            });
        }
    });

    $(document).on('change', '#file_medico,#file_psico', function (e) {
        var fileName = $(this).val();
        $(this).next('.custom-file-label').addClass("selected").html(fileName.replace(/C:\\fakepath\\/i, ''));
    });

    $(document).on('change', '#archivo_edit,#anexos_edit', function (e) {
        var urlA = baseUrl + "/employees/actualizarArchivo/" + $(this).data('id');
        var formData = new FormData();
        let files = $(this).prop('files');
        for (let i = 0; i < files.length; i++) {
            formData.append('anexos[]', files[i]);
        }
        formData.append('tipo', $(this).data('tipo'));
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
                if (result == 1) {
                    Swal.fire('Anexos agregados correctamente', '', 'success')
                    $('#modal_contratos').modal('hide');
                } else {
                    Swal.fire('Ocurrió un error al guardar, por favor intente nuevamente.', '', 'error')
                }
            },
            error: function (result) {
                hiddenPreload();
                Swal.fire('Ocurrió un error al guardar, por favor intente nuevamente.', '', 'error')
            }
        });
    });
});