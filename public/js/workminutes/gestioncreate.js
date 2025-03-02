var sketchpad;

function clear() {
    sketchpad.clear();
}
document.getElementById('clear').onclick = clear;

$(document).ready(function () {
    sketchpad = new Sketchpad({
        element: '#sketchpad',
        width: 288,
        height: 108
    });

    $('#fecha_nacimiento').datepicker({
        format: "dd-mm-yyyy",
        startDate: '-80y',
        endDate: '-18y',
        language: 'es',
        autoclose: true,
        todayHighlight: !0
    });

    $(".select2-single").select2({
        theme: 'bootstrap',
        language: {
            noResults: function () { return "No hay resultados"; },
            searching: function () { return "Buscando.."; }
        },
        placeholder: "Seleccione..."
    });

    $('#reuniones_table').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [[0, "asc"]],
        "ajax": {
            "url": "/workminutes/workMinutesIndex",
            "dataType": "json",
            "type": "GET",
            "data": { "_token": "{{ csrf_token() }}" }
        },
        columns: [
            { data: "consecutivo" },
            { data: "fecha" },
            { data: "area" },
            { data: "tema" },
            { data: "lugar" },
            { data: "lider" },
            {
                data: "action",
                render: function (data, type, full, meta) {
                    return `<div class='btn-group'>
                <a href="Adjuntos/Actas de Visitas/${data.signture}" class="btn btn-success" title="Descargar"><i class="fa fa-file-excel-o"></i>
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

    /* Control Orden Del Dia */
    var ordenDelDia = [];
    $('#addOrder').on('click', function () {
        if ($('#item').val() == '' || $('#item').val() === undefined || $('#item').val() == null) {
            Swal.fire('Error', 'El punto de la orden del día no puede estar vacío', 'error');
            return false;
        }
        if (ordenDelDia.includes($('#item').val())) {
            Swal.fire('Error', 'Este ítem ya existe en la órden del día', 'error');
        } else {
            ordenDelDia = [...ordenDelDia, $('#item').val()];

            /* Actualizar Tabla */
            let tbody = '';

            /* Cuerpo de Tabla */
            ordenDelDia.forEach(function (value) {
                tbody += `<tr>
                <td>${value}</td>
                <td>
                    <button type="button" class="btn btn-danger delItem" title="Eliminar" data-text="${value}">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
                </tr>`
            });

            /* Agregar Item a la Tabla */
            $('#items').html(tbody);
            $('#item').val(null).focus();
        }
    })

    $(document).on('click', '.delItem', function () {
        let itemDelete = $(this).data('text');
        let ordenDelDiaActualizada = ordenDelDia.filter(function (value) {
            return value !== itemDelete;
        })
        ordenDelDia = ordenDelDiaActualizada;

        /* Actualizar Tabla */
        let tbody = '';

        /* Cuerpo de Tabla */
        ordenDelDiaActualizada.forEach(function (value) {
            tbody += `<tr>
            <td>${value}</td>
            <td>
                <button type="button" class="btn btn-danger delItem" title="Eliminar" data-text="${value}">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
            </tr>`
        });

        /* Agregar Item a la Tabla */
        $('#items').html(tbody);
        $('#item').focus();
    });

    /* Compromisos */
    var compromisos = [];
    $('#addCompromiso').on('click', function () {
        let comp = $('#compromiso').val();
        let resp = $('#responsable').val();
        let respS = $('#responsable option:selected').text();
        let fIni = $('#fecha_compromiso').val();
        let fFin = $('#fecha_cierre').val();

        var lista = "<ul>";
        if (comp == '')
            lista += "<li>Compromiso</li>";
        if (resp == '' || resp == null)
            lista += "<li>Responsable</li>";
        if (fIni == '' || fIni == null)
            lista += "<li>Fecha</li>";
        if (fFin == '' || fFin == null)
            lista += "<li>Cierre</li>";

        lista += "</ul>";

        if (lista.length > 11) {
            Swal.fire('Información Incompleta', '<strong>Los siguientes campos no pueden ir vacíos:</strong> <br><br>' + lista, 'error')
            return false;
        }

        let filas = $("#compromisos_table").find("tr");
        for (i = 0; i < filas.length; i++) {
            let celdas = $(filas[i]).find("td");
            if (
                ($(celdas[0]).text() == comp
                    && $(celdas[1]).text() == resp
                    && $(celdas[2]).text() == fIni
                    && $(celdas[3]).text() == fFin)
            ) {
                Swal.fire("Registro ya en tabla", "Éste registro ya se encuentra a la tabla", "warning");
                return false;
            }
        }
        /* Actualizar Tabla */
        let tbody = '';

        /* Cuerpo de Tabla */
        tbody += `<tr>
                <td>${comp}</td>
                <td>${respS}</td>
                <td>${fIni}</td>
                <td>${fFin}</td>
                <td>
                    <button type="button" class="btn btn-danger elimComp" title="Eliminar">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
                </tr>`;


        /* Agregar Items a la Tabla */
        $('#compromisos').append(tbody);
        /* Limpiar campos y fijar cursor en compromiso */
        $('#compromiso').val(null).focus();
        $('#responsable').val(null).trigger('change');
        $('#fecha_compromiso').val(null);
        $('#fecha_cierre').val(null);

    });

    $(document).on('click', '.elimComp', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var index = $(this).closest("tr").index()
            compromisos.splice(index, 1);
            $(this).closest("tr").remove();
        }
    });

    // precargar los datos del trabajador al digitar cedula
    $(document).on('change', '#cedula', function () {
        var value = $(this).val();
        if (value.length == 0)
            return false;

        $.ajax({
            url: baseUrl + "/terminationstaff/consultarTrabajador/" + $(this).val(),
            method: "GET",
            dataType: "json",
            cache: false,
        }).done(function (data) {
            if (data.status !== 0) {
                $("#nombre").val(data.trabajador.name);
                $("#cargo").val(data.trabajador?.rel_ult_contrato?.position);
            } else {
                $("#nombre").val('');
                $("#cargo").val('');
            }
        });
    });

    /* asistentes */
    var asistentes = [];
    $('#addAsistente').on('click', function () {
        let cc = $('#cedula').val();
        let nom = $('#nombre').val();
        let cargo = $('#cargo').val();
        let firma = $('#sketchpad')[0].toDataURL();

        var lista = "<ul>";
        if (cc == '')
            lista += "<li>Cedula</li>";
        if (nom == '')
            lista += "<li>Nombre</li>";
        if (cargo == '')
            lista += "<li>Cargo</li>";
        if (firma.length < 1500)
            lista += "<li>Firma</li>";

        lista += "</ul>";

        if (lista.length > 11) {
            Swal.fire('Información Incompleta', '<strong>Los siguientes campos no pueden ir vacíos:</strong> <br><br>' + lista, 'error')
            return false;
        }

        let filas = $("#asistentes_table").find("tr");
        for (i = 0; i < filas.length; i++) {
            let celdas = $(filas[i]).find("td");
            if (
                ($(celdas[0]).text() == cc
                    && $(celdas[1]).text() == nom
                    && $(celdas[2]).text() == cargo)
            ) {
                Swal.fire("Registro ya en tabla", "Éste registro ya se encuentra a la tabla", "warning");
                return false;
            }
        }
        /* Actualizar Tabla */
        let tbody = '';

        /* Cuerpo de Tabla */
        tbody += `<tr>
                <td>${cc}</td>
                <td>${nom}</td>
                <td>${cargo}</td>
                <td><img id="firma_${cc}" src="${firma}"/></td>
                <td>
                    <button type="button" class="btn btn-danger elimAsis" title="Eliminar">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
                </tr>`;

        /* Agregar Items a la Tabla */
        $('#asistentes').append(tbody);

        /* Limpiar campos y fijar cursor en asistente */
        $('#cedula').val(null).focus();
        $('#nombre').val(null);
        $('#cargo').val(null);
        $('#clear').trigger('click');
    });

    $(document).on('click', '.elimAsis', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var index = $(this).closest("tr").index()
            asistentes.splice(index, 1);
            $(this).closest("tr").remove();
        }
    });

    $('#form_crear').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var tablaOrden = [], tablaAsistentes = [], tablaCompromisos = [];
            var filasOrden = $("#orden_table").find("tr");
            if (filasOrden.length < 2) {
                Swal.fire("Acta sin orden del día!", "Acta de reunión sin registros en orden del día", "error");
            }else{
                for (i = 1; i < filasOrden.length; i++) {
                    var celdas = $(filasOrden[i]).find("td");
                    ordenDia = $(celdas[0]).text();
                    tablaOrden.push({
                        ordenDia
                    });
                }
                $("#jsonOrden").val(JSON.stringify(tablaOrden));
            }
            var filasAsistentes = $("#asistentes_table").find("tr");
            if (filasAsistentes.length < 2) {
                Swal.fire("Acta sin orden del día!", "Acta de reunión sin registros en orden del día", "error");
            }else{
                for (i = 1; i < filasAsistentes.length; i++) {
                    var celdas = $(filasAsistentes[i]).find("td");
                    cedula = $(celdas[0]).text();
                    nombre = $(celdas[1]).text();
                    cargo = $(celdas[2]).text();
                    firma = $(celdas[3]).find('img').attr('src')
                    tablaAsistentes.push({
                        cedula,
                        nombre,
                        cargo,
                        firma
                    })
                }
                $("#jsonAsistentes").val(JSON.stringify(tablaAsistentes));
            }
            var filasCompromisos = $("#compromisos_table").find("tr");
            if (filasCompromisos.length > 1) {
                for (i = 1; i < filasCompromisos.length; i++) {
                    var celdas = $(filasCompromisos[i]).find("td");
                    compromiso = $(celdas[0]).text();
                    responsable = $(celdas[1]).text();
                    fecha = $(celdas[2]).text();
                    cierre = $(celdas[3]).text();
                    tablaCompromisos.push({
                        compromiso,
                        responsable,
                        fecha,
                        cierre
                    })
                }
                $("#jsonCompromisos").val(JSON.stringify(tablaCompromisos));
            }
            var urlA = baseUrl + "/workminutes";
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
                        Swal.fire("Registro Exitoso!", "Acta de reunión creada correctamente", "success");
                        window.location.assign(baseUrl + "/workminutes")
                    } else {
                        Swal.fire("Error al Guardar", "Ocurrió un error al guardar, por favor intente nuevamente", "error");
                    }
                },
                error: function (result) {
                    hiddenPreload();
                    Swal.fire("Error al Guardar", result.responseJSON['message'], "error");
                }
            });
        }
    });
});