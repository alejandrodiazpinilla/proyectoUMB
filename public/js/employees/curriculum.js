var archivos = [];
var arc = '';
$(document).ready(function () {
    $(document).on('click', '#linksAntecedentes', function () {
        var text = $('#linksAnt').val()
        Swal.fire('', text, 'info')
    });

    $("#estudio,#affiliation_id,#antecedente_id,#otros_id").select2({
        theme: 'bootstrap',
        language: {
            noResults: function () { return "No hay resultados"; },
            searching: function () { return "Buscando.."; }
        },
        placeholder: "Seleccione..."
    });

    $('#fecha_ini_exp').datepicker({
        format: "yyyy-mm-dd",
        startDate: '+0d',
        endDate: '+30d',
        language: 'es',
        autoclose: true,
        todayHighlight: !0
    }).on('changeDate',
        function (selected) {
            $('#fecha_fin_exp').datepicker('clearDates');
            $('#fecha_fin_exp').datepicker('setStartDate', $(this).val());
        });
    $('#fecha_fin_exp').datepicker({
        format: "yyyy-mm-dd",
        startDate: '+0d',
        endDate: '+380d',
        language: 'es',
        autoclose: true,
        todayHighlight: !0
    });

    $('#form_crear').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var tablaExp = [];
            var filas = $("#tableExperiencia").find("tr");
            for (i = 1; i < filas.length; i++) {
                var celdas = $(filas[i]).find("td");
                fechaini = $(celdas[0]).text();
                fechafin = $(celdas[1]).text();
                compania = $(celdas[2]).text();
                cargo = $(celdas[3]).text();
                jefe = $(celdas[4]).text();
                telefono = $(celdas[5]).text();
                funciones = $(celdas[6]).text();
                tablaExp.push({ fechaini, fechafin, compania, cargo, jefe, telefono, funciones });
            }

            var tablaRef = [];
            var filasRef = $("#tableReferencia").find("tr");
            for (i = 1; i < filasRef.length; i++) {
                var celdas = $(filasRef[i]).find("td");
                nombre = $(celdas[0]).text();
                cargo = $(celdas[1]).text();
                telefono = $(celdas[2]).text();
                parentezco = $(celdas[3]).text();
                tablaRef.push({ nombre, cargo, telefono, parentezco, });
            }
            if (tablaRef.length < 1) {
                Swal.fire('', 'Debe agregar al menos una referencia personal.', 'error')
                // hiddenPreload();
                return false;
            }

            $("#jsonTableExp").val(JSON.stringify(tablaExp));
            $("#jsonTableRef").val(JSON.stringify(tablaRef));

            var formData = new FormData(this);
            var urlA = baseUrl + "/employees/actualizarCurriculum";
            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
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
                            text: 'Trabajador no encontrado',
                            footer: '',
                            confirmButtonText:
                                '<i class="fa fa-check"></i> Aceptar!',
                        });
                    } else {
                        Swal.fire('Curriculum actualizado correctamente', '', 'success')
                    }
                },
                error: function (result) {
                    hiddenPreload();
                    Swal.fire('Ha ocurrido un error. Por favor intentelo nuevamente', '', 'error')
                }
            });
        }
    });

    // ************************************AGREGAR ADJUNTOS A AFILIACIONES*****************************************************

    var table_adjunto_afiliaciones = [];

    $(document).on('change', '#afiliacionFile', function () {
        var obs_archivo_var = $('.obs_adjunto_afiliacion').val();
        var ident = $('#identification').val();
        var profilePicValue = $(this).val();
        var fileNameStart = profilePicValue.lastIndexOf('\\');
        profilePicValue = profilePicValue.substr(fileNameStart + 1).substring(0, 15);
        var f = new Date();
        var fecha = (f.getFullYear() + "_" + (f.getMonth() + 1) + "_" + f.getDate() + "-" + f.getHours() + "." + f.getMinutes() + "." + f.getSeconds());
        var profilePicValues = ident + '-' + fecha + $(this).val().replace(/C:\\fakepath\\/i, '');
        arc = profilePicValues;
        archivos.push({
            nombre_archivo: profilePicValues, obs_archivo: obs_archivo_var
        });
        $('#nombre_adjunto_afiliacion').val(profilePicValues);
        obs_archivo_var = '';
    });

    $("#agregar_adjunto_afiliacion").on('click', function (e) {
        e.preventDefault();
        showPreload();

        var files = $('#afiliacionFile')[0].files[0];
        var tDoc = $('#affiliation_id').val()
        var obs = $('#obs_adjunto_afiliacion').val()
        var lista = "<ul>";

        if (files == undefined)
            lista += "<li>Archivo PDF</li>";

        if (tDoc == '' || tDoc == null)
            lista += "<li>Tipo de Documento</li>";

        if (obs == '')
            lista += "<li>Observación</li>";

        lista += "</ul>";

        if (lista.length > 11) {
            Swal.fire('Información Incompleta', '<strong>Los siguientes campos no pueden ir vacíos:</strong> <br><br>' + lista, 'error');
            hiddenPreload();
            return false;
        }

        var formData = new FormData();
        $.each($('#form_crear').serializeArray(), function (i, field) {
            formData.append(field.name, field.value);
            formData.append('file', files);
        });
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        var urlA = baseUrl + "/employees/cargarArchivoAfiliacion";
        jQuery.ajax({
            url: urlA,
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            type: 'POST',
            success: function (result) {
                hiddenPreload();
                if (result == 1) {
                    var archi = arc;
                    table_adjunto_afiliaciones.push({
                        file: archi,
                        description: $('#obs_adjunto_afiliacion').val(),
                    });
                    pintarTablaAfiliacion(table_adjunto_afiliaciones)
                    $("#afiliacionFile").val(null);
                    $("#obs_adjunto_afiliacion").val('');
                    $(".lblAfiliacion").html('Seleccione un archivo');
                    $('#affiliation_id').val(null).trigger('change');
                } else {
                    Swal.fire('Ha ocurrido un error. Por favor intentelo nuevamente', '', 'error')
                }
            },
            error: function (result) {
                hiddenPreload();
                Swal.fire('Ha ocurrido un error. Por favor intentelo nuevamente', '', 'error')
            }
        });
    });

    function pintarTablaAfiliacion(data) {
        let body = ''
        data.forEach((item, index) => {
            body = `
            <tr>
            <td class="text-center">${item.file}</td>
            <td class="text-center">${item.description}</td>
            <td class="text-center">
            <div class="btn-group">
            <a title="Eliminar" href="javascript:void(0)" class="eliminarArchivoAfiliacion btn btn-danger btn-xs" data-nombre="${item.file}">
            <i class="fa fa-trash"></i>
            </a>
            <a title="Descargar" href="/Adjuntos/Afiliaciones/${item.file}" target="_blank" class="descargarArchivoAfiliacion btn btn-dark btn-xs">
            <i class="fa fa-download"></i>
            </a>
            </div>
            </td>
            </tr>
            `
        });
        $('#body_adjunto_afiliacion').append(body)
    };

    $(document).on('click', '.eliminarArchivoAfiliacion', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            nombre = $(this).data('nombre');
            var index = $(this).closest("tr").index()
            table_adjunto_afiliaciones.splice(index, 1);
            $(this).closest("tr").remove();
            var urlA = baseUrl + "/employees/eliminarArchivoAfiliacion/" + nombre;
            jQuery.ajax({
                url: urlA,
                type: 'POST',
                data: { '_token': $('input[name=_token]').val() },
            });
        }
    });

    // ************************************AGREGAR ADJUNTOS A ANTECEDENTES*****************************************************

    var table_adjunto_antecedente = [];

    $(document).on('change', '#upload_antecedente', function () {
        var obs_archivo_var = $('.obs_adjunto_antecedente').val();
        var ident = $('#identification').val();
        var profilePicValue = $(this).val();
        var fileNameStart = profilePicValue.lastIndexOf('\\');
        profilePicValue = profilePicValue.substr(fileNameStart + 1).substring(0, 15);
        var f = new Date();
        var fecha = (f.getFullYear() + "_" + (f.getMonth() + 1) + "_" + f.getDate() + "-" + f.getHours() + "." + f.getMinutes() + "." + f.getSeconds());
        var profilePicValues = ident + '-' + fecha + $(this).val().replace(/C:\\fakepath\\/i, '');
        arc = profilePicValues;
        archivos.push({
            nombre_archivo: profilePicValues, obs_archivo: obs_archivo_var
        });
        $('#nombre_adjunto_antecedente').val(profilePicValues);
        obs_archivo_var = '';
    });

    $("#agregar_adjunto_antecedente").on('click', function (e) {
        e.preventDefault();
        showPreload();

        var files = $('#upload_antecedente')[0].files[0];
        var tDoc = $('#antecedente_id').val()
        var obs = $('#obs_adjunto_antecedente').val()
        var lista = "<ul>";

        if (files == undefined)
            lista += "<li>Archivo PDF</li>";

        if (tDoc == '' || tDoc == null)
            lista += "<li>Tipo de Documento</li>";

        if (obs == '')
            lista += "<li>Observación</li>";

        lista += "</ul>";

        if (lista.length > 11) {
            Swal.fire('Información Incompleta', '<strong>Los siguientes campos no pueden ir vacíos:</strong> <br><br>' + lista, 'error');
            hiddenPreload();
            return false;
        }

        var formData = new FormData();
        $.each($('#form_crear').serializeArray(), function (i, field) {
            formData.append(field.name, field.value);
            formData.append('file', files);
        });
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        var urlA = baseUrl + "/employees/cargarArchivoAntecedente";
        jQuery.ajax({
            url: urlA,
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            type: 'POST',
            success: function (result) {
                hiddenPreload();
                if (result == 1) {
                    var archi = arc;
                    table_adjunto_antecedente.push({
                        file: archi,
                        description: $('#obs_adjunto_antecedente').val(),
                    });
                    pintarTablaAntecedente(table_adjunto_antecedente)
                    $("#upload_antecedente").val(null);
                    $("#obs_adjunto_antecedente").val('');
                    $(".lblAntecedente").html('Seleccione un archivo');
                    $('#antecedente_id').val(null).trigger('change');
                } else {
                    Swal.fire('Ha ocurrido un error. Por favor intentelo nuevamente', '', 'error')
                }
            },
            error: function (result) {
                hiddenPreload();
                Swal.fire('Ha ocurrido un error. Por favor intentelo nuevamente', '', 'error')
            }
        });
    });

    function pintarTablaAntecedente(data) {
        let body = ''
        data.forEach((item, index) => {
            body = `
            <tr>
            <td class="text-center">${item.file}</td>
            <td class="text-center">${item.description}</td>
            <td class="text-center">
            <div class="btn-group">
            <a title="Eliminar" href="javascript:void(0)" class="eliminarArchivoAntecedente btn btn-danger btn-xs" data-nombre="${item.file}">
            <i class="fa fa-trash"></i>
            </a>
            <a title="Descargar" href="/Adjuntos/Antecedentes/${item.file}" target="_blank" class="descargarArchivoAntecedente btn btn-dark btn-xs">
            <i class="fa fa-download"></i>
            </a>
            </div>
            </td>
            </tr>
            `
        });
        $('#body_adjunto_antecedente').append(body)
    };

    $(document).on('click', '.eliminarArchivoAntecedente', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            nombre = $(this).data('nombre');
            var index = $(this).closest("tr").index()
            table_adjunto_antecedente.splice(index, 1);
            $(this).closest("tr").remove();
            var urlA = baseUrl + "/employees/eliminarArchivoAntecedente/" + nombre;
            jQuery.ajax({
                url: urlA,
                type: 'POST',
                data: { '_token': $('input[name=_token]').val() },
            });
        }
    });

    $(document).on('change', '#otros_id', function () {
        if ($(this).val() == 9)
            $('.otros_cual').attr('hidden', false);
        else
            $('.otros_cual').attr('hidden', true);
    });
    // ************************************AGREGAR ADJUNTOS A OTROS DOCUMENTOS*****************************************************

    var table_adjunto_otros = [];

    $(document).on('change', '#upload_otros', function () {
        var obs_archivo_var = $('.obs_adjunto_otros').val();
        var ident = $('#identification').val();
        var profilePicValue = $(this).val();
        var fileNameStart = profilePicValue.lastIndexOf('\\');
        profilePicValue = profilePicValue.substr(fileNameStart + 1).substring(0, 15);
        var f = new Date();
        var fecha = (f.getFullYear() + "_" + (f.getMonth() + 1) + "_" + f.getDate() + "-" + f.getHours() + "." + f.getMinutes() + "." + f.getSeconds());
        var profilePicValues = ident + '-' + fecha + $(this).val().replace(/C:\\fakepath\\/i, '');
        arc = profilePicValues;
        archivos.push({
            nombre_archivo: profilePicValues, obs_archivo: obs_archivo_var
        });
        $('#nombre_adjunto_otros').val(profilePicValues);
        obs_archivo_var = '';
    });

    $("#agregar_adjunto_otros").on('click', function (e) {
        e.preventDefault();
        showPreload();
        var files = $('#upload_otros')[0].files[0];
        var tDoc = $('#otros_id').val();
        var obs = $('#obs_adjunto_otros').val();
        var cual = $('#otros_cual').val();
        var lista = "<ul>";
        if (files == undefined)
            lista += "<li>Archivo PDF</li>";

        if (tDoc == '' || tDoc == null)
            lista += "<li>Tipo de Documento</li>";

        if (obs == '')
            lista += "<li>Observación</li>";

        if (tDoc == 9 && cual == '')
            lista += "<li>¿Cuál?</li>";

        lista += "</ul>";

        if (lista.length > 11) {
            Swal.fire('Información Incompleta', '<strong>Los siguientes campos no pueden ir vacíos:</strong> <br><br>' + lista, 'error');
            hiddenPreload();
            return false;
        }
            var formData = new FormData();
            $.each($('#form_crear').serializeArray(), function (i, field) {
                formData.append(field.name, field.value);
                formData.append('file', files);
            });
            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            var urlA = baseUrl + "/employees/cargarArchivoOtros";
            jQuery.ajax({
                url: urlA,
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                type: 'POST',
                success: function (result) {
                    hiddenPreload();
                    if (result == 1) {
                        var archi = arc;
                        table_adjunto_otros.push({
                            file: archi,
                            description: $('#obs_adjunto_otros').val(),
                        });
                        pintarTablaOtros(table_adjunto_otros)
                        $("#upload_otros").val(null);
                        $("#obs_adjunto_otros").val('');
                        $(".lblOtros").html('Seleccione un archivo');
                        $('#otros_id').val(null).trigger('change');
                    } else {
                        Swal.fire('Ha ocurrido un error. Por favor intentelo nuevamente', '', 'error')
                    }
                },
                error: function (result) {
                    hiddenPreload();
                    Swal.fire('Ha ocurrido un error. Por favor intentelo nuevamente', '', 'error')
                }
            });
    });

    function pintarTablaOtros(data) {
        let body = ''
        data.forEach((item, index) => {
            body = `
             <tr>
             <td class="text-center">${item.file}</td>
             <td class="text-center">${item.description}</td>
             <td class="text-center">
             <div class="btn-group">
             <a title="Eliminar" href="javascript:void(0)" class="eliminarArchivoOtros btn btn-danger btn-xs" data-nombre="${item.file}">
             <i class="fa fa-trash"></i>
             </a>
             <a title="Descargar" href="/Adjuntos/OtrosDocumentosCurriculum/${item.file}" target="_blank" class="descargarArchivoOtros btn btn-dark btn-xs">
             <i class="fa fa-download"></i>
             </a>
             </div>
             </td>
             </tr>
             `
        });
        $('#body_adjunto_otros').append(body)
    };

    $(document).on('click', '.eliminarArchivoOtros', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            nombre = $(this).data('nombre');
            var index = $(this).closest("tr").index()
            table_adjunto_otros.splice(index, 1);
            $(this).closest("tr").remove();
            var urlA = baseUrl + "/employees/eliminarArchivoOtros/" + nombre;
            jQuery.ajax({
                url: urlA,
                type: 'POST',
                data: { '_token': $('input[name=_token]').val() },
            });
        }
    });

    // ************************************AGREGAR ADJUNTOS A ESTUDIOS*****************************************************

    var table_adjunto_estudio = [];

    $(document).on('change', '#upload_estudio', function () {
        var obs_archivo_var = $('.obs_adjunto_estudio').val();
        var ident = $('#identification').val();
        var profilePicValue = $(this).val();
        var fileNameStart = profilePicValue.lastIndexOf('\\');
        profilePicValue = profilePicValue.substr(fileNameStart + 1).substring(0, 15);
        var f = new Date();
        var fecha = (f.getFullYear() + "_" + (f.getMonth() + 1) + "_" + f.getDate() + "-" + f.getHours() + "." + f.getMinutes() + "." + f.getSeconds());
        var profilePicValues = ident + '-' + fecha + $(this).val().replace(/C:\\fakepath\\/i, '');
        arc = profilePicValues;
        archivos.push({
            nombre_archivo: profilePicValues, obs_archivo: obs_archivo_var
        });
        $('#nombre_adjunto_estudio').val(profilePicValues);
        obs_archivo_var = '';
    });

    $("#agregar_adjunto_estudio").on('click', function (e) {
        e.preventDefault();
        showPreload();
        var files = $('#upload_estudio')[0].files[0];
        var tDoc = $('#estudio').val();
        var obs = $('#obs_adjunto_estudio').val();
        var lista = "<ul>";
        if (files == undefined)
            lista += "<li>Archivo PDF</li>";

        if (tDoc == '' || tDoc == null)
            lista += "<li>Tipo de Documento</li>";

        if (obs == '')
            lista += "<li>Observación</li>";

        lista += "</ul>";

        if (lista.length > 11) {
            Swal.fire('Información Incompleta', '<strong>Los siguientes campos no pueden ir vacíos:</strong> <br><br>' + lista, 'error');
            hiddenPreload();
            return false;
        }

            var formData = new FormData();
            $.each($('#form_crear').serializeArray(), function (i, field) {
                formData.append(field.name, field.value);
                formData.append('file', files);
            });
            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            var urlA = baseUrl + "/employees/cargarArchivoEstudio";
            jQuery.ajax({
                url: urlA,
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                type: 'POST',
                success: function (result) {
                    hiddenPreload();
                    if (result == 1) {
                        var archi = arc;
                        table_adjunto_estudio.push({
                            file: archi,
                            description: $('#obs_adjunto_estudio').val(),
                        });
                        pintarTablaEstudio(table_adjunto_estudio)
                        $("#upload_estudio").val(null);
                        $("#obs_adjunto_estudio").val('');
                        $(".lblEstudio").html('Seleccione un archivo');
                        $('#estudio').val(null).trigger('change');
                    } else {
                        Swal.fire('Ha ocurrido un error. Por favor intentelo nuevamente', '', 'error')
                    }
                },
                error: function (result) {
                    hiddenPreload();
                    Swal.fire('Ha ocurrido un error. Por favor intentelo nuevamente', '', 'error')
                }
            });
    });

    function pintarTablaEstudio(data) {
        let body = ''
        data.forEach((item, index) => {
            body = `
            <tr>
            <td class="text-center">${item.file}</td>
            <td class="text-center">${item.description}</td>
            <td class="text-center">
            <div class="btn-group">
            <a title="Eliminar" href="javascript:void(0)" class="eliminarArchivoEstudio btn btn-danger btn-xs" data-nombre="${item.file}">
            <i class="fa fa-trash"></i>
            </a>
            <a title="Descargar" href="/Adjuntos/Estudios/${item.file}" target="_blank" class="descargarArchivoEstudio btn btn-dark btn-xs">
            <i class="fa fa-download"></i>
            </a>
            </div>
            </td>
            </tr>
            `
        });
        $('#body_adjunto_estudio').append(body)
    };

    $(document).on('click', '.eliminarArchivoEstudio', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            nombre = $(this).data('nombre');
            var index = $(this).closest("tr").index()
            table_adjunto_estudio.splice(index, 1);
            $(this).closest("tr").remove();
            var urlA = baseUrl + "/employees/eliminarArchivoEstudio/" + nombre;
            jQuery.ajax({
                url: urlA,
                type: 'POST',
                data: { '_token': $('input[name=_token]').val() },
            });
        }
    });

    // ************************************AGREGAR EXPERIENCIA LABORAL*****************************************************

    var tabla_experiencia = [];

    $("#agregarExperiencia").on('click', function (e) {
        e.preventDefault();
        var compania = $('#compania_exp').val();
        var cargo = $('#cargo_exp').val();
        var fechaIni = $('#fecha_ini_exp').val();
        var fechaFin = $('#fecha_fin_exp').val();
        var jefe = $('#jefe_exp').val();
        var telefono = $('#tel_jefe_exp').val();
        var funciones = $('#funciones_exp').val();
        var lista = "<ul>";

        if (fechaIni == '')
            lista += "<li>Fecha Inicio</li>";
        if (fechaFin == '')
            lista += "<li>Fecha Terminación</li>";
        if (compania == '')
            lista += "<li>Compañía</li>";
        if (cargo == '')
            lista += "<li>Cargo</li>";
        if (jefe == '')
            lista += "<li>Jefe</li>";
        if (telefono == '')
            lista += "<li>Teléfono</li>";
        if (funciones == '')
            lista += "<li>Funciones</li>";

        lista += "</ul>";

        if (lista.length > 11) {
            Swal.fire('Información Incompleta', '<strong>Los siguientes campos no pueden ir vacíos:</strong> <br><br>' + lista, 'error')
            return false;
        }

        var fila =
            `<tr>
            <td>${fechaIni}</td>
            <td>${fechaFin}</td>
            <td>${compania}</td>
            <td>${cargo}</td>
            <td>${jefe}</td>
            <td>${telefono}</td>
            <td>${funciones}</td>
            <td>
            <div class='btn-group'>
            <button type='button' class='eliminarFila btn btn-danger btn-xs'>
            <i class='fa fa-trash'></i>
            </button> 
            </div>
            </td>
            </tr>
            `
        var btn = document.createElement("TR");
        btn.innerHTML = fila;

        document.getElementById("bodyExperiencia").appendChild(btn);
        $('#compania_exp').val('');
        $('#cargo_exp').val('');
        $('#fecha_ini_exp').val('');
        $('#fecha_fin_exp').val('');
        $('#jefe_exp').val('');
        $('#tel_jefe_exp').val('');
        $('#funciones_exp').val('');
        return true;
    });


    $(document).on('click', '.eliminarFila', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var index = $(this).closest("tr").index()
            tabla_experiencia.splice(index, 1);
            $(this).closest("tr").remove();
        }
    });

    // ************************************AGREGAR REFERENCIA PERSONAL*****************************************************

    $("#agregarReferencia").on('click', function (e) {
        e.preventDefault();
        var nombre = $('#nombre_ref').val();
        var cargo = $('#cargo_ref').val();
        var telefono = $('#tel_ref').val();
        var parentezco = $('#parentezco').val();
        var lista = "<ul>";

        if (nombre == '')
            lista += "<li>Nombre</li>";
        if (cargo == '')
            lista += "<li>Cargo</li>";
        if (telefono == '')
            lista += "<li>Teléfono de Contacto</li>";
        if (parentezco == '')
            lista += "<li>Parentezco</li>";

        lista += "</ul>";

        if (lista.length > 11) {
            Swal.fire('Información Incompleta', '<strong>Los siguientes campos no pueden ir vacíos:</strong><br><br>' + lista, 'error')
            return false;
        }

        var fila =
            `<tr>
        <td>${nombre}</td>
        <td>${cargo}</td>
        <td>${telefono}</td>
        <td>${parentezco}</td>
        <td>
        <div class='btn-group'>
        <button type='button' class='eliminarFila btn btn-danger btn-xs'>
        <i class='fa fa-trash'></i>
        </button> 
        </div>
        </td>
        </tr>
        `
        var btn = document.createElement("TR");
        btn.innerHTML = fila;

        document.getElementById("bodyReferencia").appendChild(btn);
        $('#nombre_ref').val('');
        $('#cargo_ref').val('');
        $('#tel_ref').val('');
        $('#parentezco').val('');
        return true;

    });

});