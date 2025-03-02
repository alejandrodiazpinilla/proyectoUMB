$('#producto').focus();
var productos = [];

$(document).ready(function () {
    $('#form_crear').on('submit', function (e) {
        e.preventDefault();
        var urlA = baseUrl + "/quotations";
        var formData = new FormData(this);
        var tablaP = [];
        var filas = $("#tbQuotation").find("tr");

        if (filas.length == 0) {
            swal.fire('Tabla vacía', 'Por favor agregue mínimo un producto y un proveedor con su información relacionada', 'error');
            return false;
        }

        // guardar registros de la tabla
        for (i = 0; i < filas.length; i++) {
            var celdas = $(filas[i]).find("td");
            producto = $(celdas[0]).text();
            cantidad = $(celdas[1]).text();
            proveedor1 = $('#spanP1').text();
            costo1 = $(celdas[2]).text();
            condicion_pago1 = $(celdas[3]).text();

            proveedor2 = $('#spanP2').text();
            costo2 = $(celdas[4]).text();
            condicion_pago2 = $(celdas[5]).text();

            proveedor3 = $('#spanP3').text();
            costo3 = $(celdas[6]).text();
            condicion_pago3 = $(celdas[7]).text();

            tablaP.push({
                producto,
                cantidad,
                proveedor1,
                costo1,
                condicion_pago1,
                proveedor2,
                costo2,
                condicion_pago2,
                proveedor3,
                costo3,
                condicion_pago3,
            });
        }
        formData.append('jsonTable', JSON.stringify(tablaP));

        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        jQuery.ajax({
            url: urlA, data: formData, processData: false, contentType: false, cache: false, type: 'POST',
            beforeSend: function () {
                showPreload();
            },
            success: function (result) {
                hiddenPreload();
                swal.fire('', result.msg, result.icon);
                if (result.status == 200)
                    window.location.assign(baseUrl + "/quotations");
            },
            error: function (result) {
                hiddenPreload();
                swal.fire('', result.msg, 'error');
            }
        });
    });

    $('#prov1').on('change', function (e) {
        if ($(this).val() == $('#prov2').val() || $(this).val() == $('#prov3').val()) {
            $(this).val(null).trigger('change');
        }
    });

    $('#prov2').on('change', function (e) {
        if ($(this).val() == $('#prov1').val() || $(this).val() == $('#prov3').val()) {
            $(this).val(null).trigger('change');
        }
    });

    $('#prov3').on('change', function (e) {
        if ($(this).val() == $('#prov2').val() || $(this).val() == $('#prov1').val()) {
            $(this).val(null).trigger('change');
        }
    });
});

$(document).on('click', '.btnAgregar', function () {
    let prod = $('#producto').val();
    let cant = $('#cantidad').val();

    let prov1 = $('#prov1').val();
    let provt1 = $('#prov1 option:selected').text();
    let cond1 = $('#cond_pago1').val();
    let condt1 = $('#cond_pago1 option:selected').text();
    let cost1 = $('#costo1').val() != '$' ? $('#costo1').val() : '';

    let prov2 = $('#prov2').val();
    let provt2 = $('#prov2 option:selected').text();
    let cond2 = $('#cond_pago2').val();
    let condt2 = $('#cond_pago2 option:selected').text();
    let cost2 = $('#costo2').val() != '$' ? $('#costo2').val() : '';

    let prov3 = $('#prov3').val();
    let provt3 = $('#prov3 option:selected').text();
    let cond3 = $('#cond_pago3').val();
    let condt3 = $('#cond_pago3 option:selected').text();
    let cost3 = $('#costo3').val() != '$' ? $('#costo3').val() : '';


    if (($('#check1').is(':checked') && prov2.length == 0 && prov3.length == 0) || ($('#check2').is(':checked') && prov1.length == 0 && prov3.length == 0) || ($('#check3').is(':checked') && prov1.length == 0 && prov2.length == 0) || ($('#check1').is(':checked') && $('#check2').is(':checked') && prov3.length == 0) || ($('#check2').is(':checked') && $('#check3').is(':checked') && prov1.length == 0) || ($('#check1').is(':checked') && $('#check3').is(':checked') && prov2.length == 0) || (prov1.length == 0 && prov2.length == 0 && prov3.length == 0) || prod.length == 0 || cant.length == 0 || ($('#check1').is(':checked') && $('#check2').is(':checked') && $('#check3').is(':checked'))) {
        swal.fire('', 'Debe agregar mínimo un producto, cantidad y proveedor con su información relacionada ', 'error');
        return;
    }

    let lista = "<ul>";
    if (!$('#check1').is(':checked')) {

        if (prov1.length == 0 || cond1.length == 0 || cant.length == 0 || cost1.length == 0)
            lista += "<li><H4>" + $('#prov1 option:selected').text() + "</H4></li>";

        if (prov1.length == 0)
            lista += "<li>Proveedor 1</li>";
        if (cond1.length == 0)
            lista += "<li>Condición de Pago</li>";
        if (cant.length == 0)
            lista += "<li>Cantidad</li>";
        if (cost1.length == 0)
            lista += "<li>Costo</li>";
    }

    if (!$('#check2').is(':checked')) {

        if (prov2.length == 0 || cond2.length == 0 || cant.length == 0 || cost2.length == 0)
            lista += "<li><H4>" + $('#prov2 option:selected').text() + "</H4></li>";

        if (prov2.length == 0)
            lista += "<li>Proveedor 2</li>";
        if (cond2.length == 0)
            lista += "<li>Condición de Pago</li>";
        if (cant.length == 0)
            lista += "<li>Cantidad</li>";
        if (cost2.length == 0)
            lista += "<li>Costo</li>";
    }

    if (!$('#check3').is(':checked')) {
        if (prov3.length == 0 || cond3.length == 0 || cant.length == 0 || cost3.length == 0)
            lista += "<li><H4>" + $('#prov3 option:selected').text() + "</H4></li>";

        if (prov3.length == 0)
            lista += "<li>Proveedor 3</li>";
        if (cond3.length == 0)
            lista += "<li>Condición de Pago</li>";
        if (cant.length == 0)
            lista += "<li>Cantidad</li>";
        if (cost3.length == 0)
            lista += "<li>Costo</li>";
    }

    if (lista.length > 4) {
        Swal.fire('Información Incompleta', '<strong>Los siguientes campos no pueden ir vacíos:</strong> <br><br>' + lista + '</ul>', 'error')
        return;
    }

    /* Actualizar Tabla */
    let tbody = '';

    /* Cuerpo de Tabla */
    tbody += `<tr>
            <td>${prod}</td>
            <td>${cant}</td>
            <td>${cost1}</td>
            <td>${condt1 == 'Seleccione...' ? '' : condt1}</td>
            
            <td>${cost2}</td>
            <td>${condt2 == 'Seleccione...' ? '' : condt2}</td>
            
            <td>${cost3}</td>
            <td>${condt3 == 'Seleccione...' ? '' : condt3}</td>
            <td>
                <button type="button" class="btn btn-danger elimRegistro" title="Eliminar">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
            </tr>`;

    /* Agregar Items a la Tabla */
    $('#tbQuotation').append(tbody);

    /* Limpiar campos y fijar cursor en producto */
    $('#producto').val(null).focus();
    $('#spanP1').html(provt1 == 'Seleccione...' ? 'Proveedor1' : provt1);
    $('#spanP2').html((provt2 == 'Seleccione...' ? 'Proveedor2' : provt2));
    $('#spanP3').html((provt3 == 'Seleccione...' ? 'Proveedor3' : provt3));

    (prov1.length > 0) ? $('#prov1').attr('disabled', true) : '';
    (prov2.length > 0) ? $('#prov2').attr('disabled', true) : '';
    (prov3.length > 0) ? $('#prov3').attr('disabled', true) : '';

    $('#cond_pago1').val(null).trigger('change');
    $('#cond_pago2').val(null).trigger('change');
    $('#cond_pago3').val(null).trigger('change');

    $('#cantidad').val(null);

    $('#costo1').val(null);
    $('#costo2').val(null);
    $('#costo3').val(null);
});

$(document).on('change', '#check1', function () {
    var span = $('#spanP1').text();
    if ($(this).is(':checked')) {
        $('#prov1').attr('disabled', true);
        $('#cond_pago1').attr('disabled', true).val(null).trigger('change');
        $('#costo1').attr('disabled', true).val(null);
    } else {
        (span != 'Proveedor1') ? $('#prov1').attr('disabled', true) : $('#prov1').attr('disabled', false);
        $('#cond_pago1').attr('disabled', false);
        $('#costo1').attr('disabled', false);
    }
});

$(document).on('change', '#check2', function () {
    var span = $('#spanP2').text();
    if ($(this).is(':checked')) {
        $('#prov2').attr('disabled', true);
        $('#cond_pago2').attr('disabled', true).val(null).trigger('change');
        $('#costo2').attr('disabled', true).val(null);
    } else {
        (span != 'Proveedor2') ? $('#prov2').attr('disabled', true) : $('#prov2').attr('disabled', false);
        $('#cond_pago2').attr('disabled', false);
        $('#costo2').attr('disabled', false);
    }
});

$(document).on('change', '#check3', function () {
    var span = $('#spanP3').text();
    if ($(this).is(':checked')) {
        $('#prov3').attr('disabled', true);
        $('#cond_pago3').attr('disabled', true).val(null).trigger('change');
        $('#costo3').attr('disabled', true).val(null);
    } else {
        (span != 'Proveedor3') ? $('#prov3').attr('disabled', true) : $('#prov3').attr('disabled', false);
        $('#cond_pago3').attr('disabled', false);
        $('#costo3').attr('disabled', false);
    }
});

$(document).on('click', '.elimRegistro', function (e) {
    e.preventDefault();
    var index = $(this).closest("tr").index()
    productos.splice(index, 1);
    $(this).closest("tr").remove();
});