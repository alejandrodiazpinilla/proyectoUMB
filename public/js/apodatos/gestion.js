$(document).ready(function () {

    $('#apodatos_table').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [[1, "asc"]],
        "ajax": {
            "url": "/apodatos/apodatosIndex",
            "dataType": "json",
            "type": "GET",
            "data": { "_token": "{{ csrf_token() }}" }
        },
        columns: [
            { data: "documento" },
            { data: "nombre" },
            { data: "codigo_curso" },
            { data: "nro" },
            { data: "fecha_vencimiento" },
            { data: "state" },
            {
                data: "action",
                render: function (data, type, full, meta) {
                    return `<div class='btn-group'>
                <a href="Adjuntos/Apodatos/${data.file}" class="btn btn-success" title="Descargar"><i class="fa fa-file-excel-o"></i>
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

    $('#fecha_nacimiento').datepicker({
        format: "dd-mm-yyyy",
        startDate: '-80y',
        endDate: '-18y',
        language: 'es',
        autoclose: true,
        todayHighlight: !0
    });
    $('#fecha_vinculacion').datepicker({
        format: "dd-mm-yyyy",
        startDate: '-364d',
        endDate: '+0d',
        language: 'es',
        autoclose: true,
        todayHighlight: !0
    });
    $('#fecha_curso').datepicker({
        format: "dd-mm-yyyy",
        startDate: '-364d',
        endDate: '+0d',
        language: 'es',
        autoclose: true,
        todayHighlight: !0
    });

    $("#genero").select2({
        theme: 'bootstrap',
        language: {
            noResults: function () { return "No hay resultados"; },
            searching: function () { return "Buscando.."; }
        },
        closeOnSelect: true,
        placeholder: "Seleccione..."
    });

    $(document).on('change', '#cedula', function (e) {
        var value = $(this).val();
        if (value.length == 0) {
        } else {
            $.ajax({
                url: baseUrl + "/terminationstaff/consultarTrabajador/" + $(this).val(),
                method: "GET",
                dataType: "json",
                cache: false,
            }).done(function (data) {
                if (data.status == 0) {
                    Swal.fire('', 'Este número de identificación aún no está asociado a un empleado activo.', 'info');
                    $("#fecha_nacimiento,#genero,#cargo,#fecha_vinculacion,#nombre1,#nombre2,#apellido1,#apellido2,#cargoRec").val('');
                } else {
                    if (data.trabajador != null) {
                        var nombre = data.trabajador.name;
                        var divN = nombre.split(" ");
                        var apellido = data.trabajador.surname;
                        var divA = apellido.split(" ");

                        $("#nombre1").val(divN[0]);
                        if (divN.length > 1)
                            $("#nombre2").val(nombre.substring(divN[0].length + 1, nombre.length));
                        else
                            $("#nombre2").val('')

                        $("#apellido1").val(divA[0]);
                        if (divA.length > 1)
                            $("#apellido2").val(apellido.substring(divA[0].length + 1, apellido.length));
                        else
                            $("#apellido2").val('')

                        $("#fecha_nacimiento").val(data.trabajador.date_of_birth);
                        $("#genero").val(data.trabajador.gender == 'Masculino' ? 1 : 2).trigger('change');
                        $("#cargo").val(data.trabajador.rel_contratos[0]?.position);
                        $("#cargoRec").val(data.trabajador.rel_contratos[0]?.position);
                        $("#fecha_vinculacion").val(data.trabajador.rel_contratos[0]?.start_date);
                    }
                }
            });
        }
    });

    $(document).on('change', '#nit', function (e) {
        var value = $(this).val();
        if (value.length == 0) {
        } else {
            $.ajax({
                url: baseUrl + "/apodatos/consultarAcademia/" + $(this).val(),
                method: "GET",
                dataType: "json",
                cache: false,
            }).done(function (data) {
                if (data.status == 0) {
                    $("#nombre_academia,#tel_academia,#direccion_academia").val('');
                } else {
                    $("#nombre_academia").val(data.academia.name);
                    $("#tel_academia").val(data.academia.telephone);
                    $("#direccion_academia").val(data.academia.address);
                }
            });
        }
    });

    // *******************AGREGAR EMPLEADO A TABLA********************************

    var tabla = [];

    $("#agregarApodatos").on('click', function (e) {
        e.preventDefault();
        var doc = $('#cedula').val();
        var nombre1 = $('#nombre1').val();
        var nombre2 = $('#nombre2').val();
        var apellido1 = $('#apellido1').val();
        var apellido2 = $('#apellido2').val();
        var cargo = $('#cargo').val();
        var fecha_v = $('#fecha_vinculacion').val();
        var nit_academia = $('#nit').val();
        var nomb_academia = $('#nombre_academia').val();
        var tel_academia = $('#tel_academia').val();
        var dir_academia = $('#direccion_academia').val();
        var cod_curso = $('#codigo_curso').val();
        var fecha_curso = $('#fecha_curso').val();
        var nro_curso = $('#numero').val();

        var lista = "<ul>";
        if (doc == '')
            lista += "<li>N° Documento</li>";
        if (nombre1 == '' || apellido1 == '')
            lista += "<li>Nombre y Apellidos</li>";
        if (cargo == '')
            lista += "<li>Cargo</li>";
        if (fecha_v == '')
            lista += "<li>Fecha Vinculación</li>";
        if (nit_academia == '')
            lista += "<li>NIT de la Academia</li>";
        if (nomb_academia == '')
            lista += "<li>Nombre de la Academia</li>";
        if (tel_academia == '')
            lista += "<li>Teléfono de la Academia</li>";
        if (dir_academia == '')
            lista += "<li>Dirección de la Academia</li>";
        if (cod_curso == '')
            lista += "<li>Código del Curso</li>";
        if (fecha_curso == '')
            lista += "<li>Fecha del Curso</li>";
        if (nro_curso == '')
            lista += "<li>Número</li>";

        lista += "</ul>";

        if (lista.length > 11) {
            Swal.fire('Información Incompleta', '<strong>Los siguientes campos no pueden ir vacíos:</strong> <br><br>' + lista, 'error')
            return false;
        }
        var filas = $("#tableApodatos").find("tr");
        for (i = 0; i < filas.length; i++) {
            var celdas = $(filas[i]).find("td");
            if (
                ($(celdas[0]).text() == doc
                    && $(celdas[1]).text() == nombre1 + ' ' + nombre2 + ' ' + apellido1 + ' ' + apellido2
                    && $(celdas[2]).text() == cargo
                    && $(celdas[3]).text() == fecha_v
                    && $(celdas[4]).text() == nit_academia
                    && $(celdas[5]).text() == nomb_academia
                    && $(celdas[6]).text() == tel_academia
                    && $(celdas[7]).text() == dir_academia
                    && $(celdas[8]).text() == cod_curso
                    && $(celdas[9]).text() == fecha_curso
                    && $(celdas[10]).text() == nro_curso) || $(celdas[0]).text() == doc
            ) {
                Swal.fire("Registro ya en tabla", "Éste registro ya se encuentra a la tabla", "warning");
                return false;
            }
        }
        let cargoRec = $('#cargoRec').val();
        if (cargoRec.length < 1) {
            Swal.fire("Empleado sin contrato activo", "El empleado a registrar no tiene un contrato activo. Por favor registre primero el contrato actual e intente nuevamente", "warning");
            return false;
        }
        let random = Math.floor((Math.random() * 100));
        var fila =
            `<tr>
            <td>
            <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input checkUni" id="checkUni_${doc + random}">
            <label class="custom-control-label" for="checkUni_${doc + random}"></label>
            </div>
            </td>
            <td>${doc}</td>
            <td>${nombre1 + ' ' + nombre2 + ' ' + apellido1 + ' ' + apellido2}</td>
            <td>${cargo}</td>
            <td>${fecha_v}</td>
            <td>${nit_academia}</td>
            <td>${nomb_academia}</td>
            <td>${tel_academia}</td>
            <td>${dir_academia}</td>
            <td>${cod_curso}</td>
            <td>${fecha_curso}</td>
            <td>${nro_curso}</td>
            <td>
            <div class='btn-group'>
            <button type='button' class='eliminarFila btn btn-danger btn-xs rounded-right mr-1'>
            <i class='fa fa-trash'></i>
            </button>
            <div>
            </td>
            </tr>
            `
        var btn = document.createElement("TR");
        btn.innerHTML = fila;

        document.getElementById("bodyApodatos").appendChild(btn);
        $('#cedula').val('');
        $('#nombre1').val('');
        $('#nombre2').val('');
        $('#apellido1').val('');
        $('#apellido2').val('');
        $('#cargo').val('');
        $('#fecha_nacimiento').val('');
        $('#fecha_vinculacion').val('');
        $('#nit').val('');
        $('#nombre_academia').val('');
        $('#tel_academia').val('');
        $('#direccion_academia').val('');
        $('#codigo_curso').val('');
        $('#fecha_curso').val('');
        $('#numero').val('');
    });

    $(document).on('click', '.eliminarFila', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var index = $(this).closest("tr").index()
            tabla.splice(index, 1);
            $(this).closest("tr").remove();
        }
    });

    $(document).on('click', '#checkAll', function (e) {
        if (this.checked) {
            $('.checkUni').each(function () {
                this.checked = true;
            });
        } else {
            $('.checkUni').each(function () {
                this.checked = false;
            });
        }
    });

    $(document).on('click', '#descargarPlantilla', function (e) {

        var tablaApodatos = [];
        var filas = $("#tableApodatos").find("tr");
        for (i = 1; i < filas.length; i++) {
            var celdas = $(filas[i]).find("td");
            cedula = $(celdas[1]).text();
            nombre = $(celdas[2]).text();
            cargo = $(celdas[3]).text();
            fecha_v = $(celdas[4]).text();
            nit = $(celdas[5]).text();
            nomb_academia = $(celdas[6]).text();
            tel_academia = $(celdas[7]).text();
            dir_academia = $(celdas[8]).text();
            cod_curso = $(celdas[9]).text();
            fecha_curso = $(celdas[10]).text();
            nro = $(celdas[11]).text();
            tablaApodatos.push({
                cedula,
                nombre,
                cargo,
                fecha_v,
                nit,
                nomb_academia,
                tel_academia,
                dir_academia,
                cod_curso,
                fecha_curso,
                nro
            })
        }
        if (tablaApodatos.length == 0) {
            Swal.fire('', 'Tabla vacía. Por favor agregue mínimo un registro', 'info');
            return false;
        }
        var jsonTable = JSON.stringify(tablaApodatos);

        jQuery.ajax({
            url: baseUrl + "/apodatos/descargarPlantilla",
            method: 'POST',
            data: { '_token': $('input[name=_token]').val(), jsonTable },
            xhrFields: {
                responseType: 'blob'
            },
            beforeSend: function () {
                showPreload();
            },
            success: function (result, status, xhr) {
                hiddenPreload();
                var binaryData = [];
                binaryData.push(result);
                var url = window.URL.createObjectURL(new Blob(binaryData, { type: "application/vnd.ms-excel" }))
                var a = document.createElement('a');
                a.href = url;
                var disposition = xhr.getResponseHeader('content-disposition');
                var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                var matches = filenameRegex.exec(disposition);
                if (matches != null && matches[1]) {
                    var filename = matches[1].replace(/['"]/g, '')
                } else {
                    Swal.fire('', 'El trabajador con cédula <strong>' + cedula + '</strong> aún no está registrado. Por favor, regístrelo antes de continuar', 'error');
                    return false;
                }

                a.download = filename;
                a.click();
                window.URL.revokeObjectURL(url);
            },
            error: function (result) {
                hiddenPreload();
            }
        });

    });

    $('#form_crear').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var tablaApodatos = [];
            var filas = $("#tableApodatos").find("tr");
            for (i = 1; i < filas.length; i++) {
                var celdas = $(filas[i]).find("td");
                checkValidar = $(celdas[0]).find("input[type=checkbox]")[0].checked;
                cedula = $(celdas[1]).text();
                nombre = $(celdas[2]).text();
                cargo = $(celdas[3]).text();
                fecha_v = $(celdas[4]).text();
                nit = $(celdas[5]).text();
                nomb_academia = $(celdas[6]).text();
                tel_academia = $(celdas[7]).text();
                dir_academia = $(celdas[8]).text();
                cod_curso = $(celdas[9]).text();
                fecha_curso = $(celdas[10]).text();
                nro = $(celdas[11]).text();
                tablaApodatos.push({
                    checkValidar,
                    cedula,
                    nombre,
                    cargo,
                    fecha_v,
                    nit,
                    nomb_academia,
                    tel_academia,
                    dir_academia,
                    cod_curso,
                    fecha_curso,
                    nro
                })
            }
            if (tablaApodatos.length == 0) {
                Swal.fire('', 'Tabla vacía. Por favor agregue mínimo un registro', 'info');
                return false;
            }
            var jsonTable = JSON.stringify(tablaApodatos);

            jQuery.ajax({
                url: baseUrl + "/apodatos",
                method: 'post',
                data: { '_token': $('input[name=_token]').val(), jsonTable },
                beforeSend: function () {
                    showPreload();
                },
                success: function (result) {
                    hiddenPreload();
                    if (result.status == 0) {
                        Swal.fire('', result.message, 'error');
                    } else if (result.status == 1) {
                        Swal.fire('', result.message, 'success');
                        location.reload();
                    } else {
                        Swal.fire('error al guardar', result, 'error');
                    }
                },
                error: function (result) {
                    hiddenPreload();
                    Swal.fire('error al guardar', result, 'error');
                }
            });
        }
    });
});