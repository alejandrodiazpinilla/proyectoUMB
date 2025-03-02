var tabla1 = [];

$(document).ready(function () {

    $('#induction_date').datepicker({
        format: "yyyy-mm-dd",
        startDate: '+2d',
        endDate: '+20d',
        language: 'es',
        autoclose: true,
        todayHighlight: !0
    });

    $('#age_range').ionRangeSlider({
        type: 'double',
        grid: true,
        min: 18,
        max: 80,
        from: 20,
        to: 45,
        step: 1,
        prettify_enabled: false,
        prefix: 'Edad ',
        max_postfix: '+'
    });

    $("#company_id,#customer_id,#vacant_type_id,#contract_type_id").select2({
        theme: 'bootstrap',
        language: {
            noResults: function () { return "No hay resultados"; },
            searching: function () { return "Buscando.."; }
        },
        closeOnSelect: true,
        placeholder: "Seleccione..."
    });

    var table = $('#staff_request_table').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [[1, "asc"]],
        "ajax": {
            "url": baseUrl + "/staffrequest/staffrequestIndex",
            "dataType": "json",
            "type": "GET",
            "data": { "_token": "{{ csrf_token() }}" }
        },
        columns: [
            { data: "job_title" },
            { data: "customer" },
            { data: "created_at" },
            { data: "state" },
            { data: "reasson" },
            {
                data: "action",
                render: function (data, type, full, meta) {
                    return `
                    <div class="btn-group">`+
                        ((full.permisoAprobar == true && full.action.state != 1 && full.candidatos > 0) ?
                            `<a href="javascript:void(0)" class="btn btn-success btnAprobar" title="Finalizar" data-crypt_id="${full.crypt_id}">
                    <i class="icons cui-circle-check"></i>
                    </a>`
                            : ''
                        ) +
                        `<a href="javascript:void(0)" class="btnDescargarPDF btn btn-danger" 
                    data-crypt_id="${full.crypt_id}"
                    title="Descargar PDF"><i class="fa fa-file-pdf-o"></i>
                    </a>
                    <a href="javascript:void(0)" class="btnCandidatos btn btn-dark" 
                    data-crypt_id="${full.crypt_id}"
                    title="Agregar Candidatos"><i class="icons cui-user-follow"></i>
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

    $('#form_crear').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var urlA = baseUrl + "/staffrequest";
            jQuery.ajax({
                url: urlA,
                data: $('#form_crear').serialize(),
                method: 'POST',
                beforeSend: function () {
                    showPreload();
                },
                success: function (result) {
                    hiddenPreload();
                    if (result == 1) {
                        Swal.fire('Informe creado exitosamente', '', 'success')
                        window.location.assign(baseUrl + "/staffrequest")
                    } else {
                        Swal.fire('Ha ocurrido un error. Por favor intentelo nuevamente', '', 'error')
                    }
                },
                error: function (result) {
                    hiddenPreload();
                    Swal.fire('Ha ocurrido un error. Por favor intentelo nuevamente', '', 'error')
                }
            });
        }
    });

    $(document).on('click', '.btnCandidatos', function () {
        $('#id').val($(this).data('crypt_id'));
        $.ajax({
            type: "GET",
            url: baseUrl + '/staffrequest/traerCandidatos',
            dataType: 'json',
            data: { id: $(this).data('crypt_id') },
            success: function (response) {
                if (response.status == 0)
                    return false;

                var archivos_table = '';
                response.data.forEach((item, index) => {
                    archivos_table += `
                    <tr>
                    <td>${item.identification}</td>
                    <td>${item.name}</td>
                    <td>${item.telephone}</td>
                    <td>${item.email}</td>
                    <td>` +
                        ((response.estado == 0) ?
                            `
                    <div class='btn-group'>
                    <button type='button' class='eliminarFila btn btn-danger btn-xs'>
                    <i class='fa fa-trash-o'></i>
                    </button>
                    </div>`
                            : ''
                        ) +
                        `</td>
                    </tr>
                    `
                });
                $('#candidates_table tbody').html(archivos_table);

                if (response.estado == 1){
                    $('.hiddenSection').attr('hidden', true);
                    $('.btnGuardar').attr('hidden', true);
                }else{
                    $('.hiddenSection').attr('hidden', false);
                    $('.btnGuardar').attr('hidden', false);
                }
            },
            error: function (data) {
            }
        });
        // nostar la modal solo despues de haber cargado la data
        setTimeout(() => {
            $('#modal_editar').modal('show');
        }, "200")
    });

    $(document).on('click', '.btnDescargarPDF', function () {
        var url = 'staffrequest/' + $(this).data('crypt_id')
        window.open(url, '_blank');
    });

    $(document).on('click', '.eliminarFila', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var index = $(this).closest("tr").index()
            tabla1.splice(index, 1);
            $(this).closest("tr").remove();
        }
    });

    $(document).on('click', '.btnAprobar', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var id = $(this).data('crypt_id');
            Swal.fire({
                title: "¿Está seguro de finalizar esta solicitud? ",
                type: 'info',
                showCancelButton: true,
                confirmButtonText: 'Sí, !Finalizar!',
                cancelButtonText: 'Cancelar',
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    var urlA = baseUrl + "/staffrequest/aprobarSolicitud/" + id;
                    jQuery.ajax({
                        url: urlA,
                        data: { '_token': $('input[name=_token]').val() },
                        method: 'POST'
                    })
                        .then(response => {
                            if (response == 1) {
                                Swal.fire('Estado actualizado exitosamente', '', 'success')
                                table.ajax.reload();
                            } else {
                                Swal.fire('Ha ocurrido un error. Por favor intentelo nuevamente', '', 'error')
                            }
                        })
                        .catch(error => {
                            Swal.fire('Ha ocurrido un error. Por favor intentelo nuevamente', '', 'error')
                        })
                }
            })
        }
    });

    // validar si el numero de cedula ya esta asociado a un empleado activo
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
                    Swal.fire('Este número de identificación ya se encuentra asociado a un empleado activo.', '', 'info')
                    $("#name").val('');
                    $("#email").val('');
                    $("#telephone").val('');
                } else {
                    if (data.trabajador != null) {
                        $("#name").val(data.trabajador.name);
                        $("#email").val(data.trabajador.email);
                        $("#telephone").val(data.trabajador.telephone);
                    }
                }
            });
        }
    });

    // *******************AGREGAR CANDIDATOS*****************************************************

    $("#agregarcandidato").on('click', function (e) {
        e.preventDefault();
        var nombre = $('#name').val();
        var cedula = $('#identification').val();
        var telefono = $('#telephone').val();
        var email = $('#email').val();
        var lista = "<ul>";

        if (cedula.length < 1)
            lista += "<li> Número de Documento </li>";

        if (nombre.length < 1)
            lista += "<li> Nombre Completo </li>";

        if (telefono.length < 1)
            lista += "<li> Teléfono </li>";

        if (email.length < 1)
            lista += "<li> Email <br> <strong>Si el candidato no posee email dejar por defecto noemail@dominio.com</strong> </li>";

        lista += "</ul>";

        if (lista.length > 9) {
            Swal.fire('Los siguientes campos son obligatorios:', lista, 'error')
            return false;
        }
        var filas = $("#candidates_table").find("tr");
        for (i = 0; i < filas.length; i++) {
            var celdas = $(filas[i]).find("td");
            if (($(celdas[0]).text() == cedula && $(celdas[1]).text() == nombre)
                || ($(celdas[0]).text() == cedula && $(celdas[2]).text() == telefono)
                || ($(celdas[0]).text() == cedula && $(celdas[3]).text() == email)) {
                Swal.fire('Este candidato ya se encuentra registrado en la tabla.', '', 'error')
                return false;
            }
        }
        var fila =
            `<tr>
            <td>${cedula}</td>
            <td>${nombre}</td>
            <td>${telefono}</td>
            <td>${email}</td>
            <td>
            <div class='btn-group'>
            <button type='button' class='eliminarFila btn btn-danger btn-xs'>
            <i class='fa fa-trash-o'></i>
            </button>
            </div>
            </td>
            </tr>
            `
        var btn = document.createElement("TR");
        btn.innerHTML = fila;
        document.getElementById("bodycandidatos").appendChild(btn);
        $('#name').val('');
        $('#identification').val('');
        $('#telephone').val('');
        $('#email').val('');
    });

    $('#form_editar').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();

            var tabla = [];
            var filas = $("#candidates_table").find("tr");
            for (i = 1; i < filas.length; i++) {
                var celdas = $(filas[i]).find("td");
                cc = $(celdas[0]).text();
                nombre = $(celdas[1]).text();
                tel = $(celdas[2]).text();
                mail = $(celdas[3]).text();
                tabla.push({
                    identification: cc,
                    name: nombre,
                    telephone: tel,
                    email: mail
                })
            }
            if (tabla.length == 0) {
                Swal.fire('Debe agregar al menos un candidato a la tabla', '', 'error')
                hiddenPreload();
                return false;
            }

            $("#jsonTable").val(JSON.stringify(tabla));

            const swal2 = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success mr-1',
                    cancelButton: 'btn btn-primary ml-1'
                },
                buttonsStyling: false
            })
            swal2.fire({
                title: 'Enviar Correo Electrónico',
                text: "¿Desea enviar correo solicitando la información a todo el personal en la tabla?",
                type: 'warning',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: 'Si, Enviar',
                cancelButtonText: 'No, Solo Guardar'
            }).then((result) => {
                if (result.value == true) {
                    var formData = $('#form_editar').serialize() + '&sendEmail=1';
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    var formData = $('#form_editar').serialize();
                } else {
                    hiddenPreload();
                    return false;
                }
                jQuery.ajax({
                    url: baseUrl + "/staffrequest/agregarCandidatos",
                    data: formData,
                    method: 'POST',
                    beforeSend: function () {
                        showPreload();
                    },
                    success: function (result) {
                        hiddenPreload();
                        if (result == 1) {
                            $('#modal_editar').modal('hide');
                            swal2.fire('Candidatos Guardados', 'Se ha enviado el correo a todos los candidatos en la tabla', 'success')
                        } else if (result == 2) {
                            $('#modal_editar').modal('hide');
                            swal2.fire('Candidatos Guardados', 'Registros guardados correctamente', 'success')
                        } else {
                            Swal.fire('Ha ocurrido un error. Por favor intentelo nuevamente', '', 'error')
                        }
                    },
                    error: function (result) {
                        hiddenPreload();
                        Swal.fire('Ha ocurrido un error. Por favor intentelo nuevamente', '', 'error')
                    }
                });
            })
        }
    });

});