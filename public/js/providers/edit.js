$(document).ready(function () {

    $(document).on('click', '.btnRut,.btnCc,.btnCb', function () {
        $(this).next().trigger('click');
    });

    $('#doc_rut,#camara_comercio,#cert_bancaria').change(function (e) {
        let val = $(this).val();
        var attr_id = $(this).attr('id');
        var label = '';
            if (attr_id == 'doc_rut') {
            var label = '.lblRut';
        } else if (attr_id == 'camara_comercio') {
            var label = '.lblCc';
        } else if (attr_id == 'cert_bancaria') {
            var label = '.lblCb';
        }
        if (val.length > 0) {
            val = val.replace(/C:\\fakepath\\/i, '');
            var ext = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
            if (ext == 'pdf') {
                if (val.length > 15) {
                    $(label).html(val.substr(0, 13) + '....' + ext).attr('title', val).css('cursor', 'pointer');
                } else {
                    $(label).html(val).attr('title', val).css('cursor', 'pointer');
                }
            } else {
                swal.fire('Tipo de archivo no permitido', 'Solo se admiten archivos en formato PDF', 'warning');
                $(this).val(null);
                $(label).html('Seleccione...').attr('title', '');
            }
        } else {
            $(this).val(null);
            $(label).html('Seleccione...').attr('title', '');
        }
    });

    // llenar botones de la sección RUT
    var rut = __PHP().vars().proveedor.rut;
    if (rut.length > 0) {
        if (rut.length > 15) {
            rut = rut.replace(/C:\\fakepath\\/i, '');
            var ext = rut.substring(rut.lastIndexOf('.') + 1).toLowerCase();
            $('.lblRut').html(rut.substr(0, 13) + '....' + ext).attr('title', rut).css('cursor', 'pointer');
        } else {
            $('.lblRut').html(rut).attr('title', rut).css('cursor', 'pointer');
        }
    }

    // llenar botones de la sección CAMARA DE COMERCIO
    var camcom = __PHP().vars().proveedor.chamber_commerce;
    if (camcom.length > 0) {
        if (camcom.length > 15) {
            rut = camcom.replace(/C:\\fakepath\\/i, '');
            var ext = camcom.substring(camcom.lastIndexOf('.') + 1).toLowerCase();
            $('.lblCc').html(camcom.substr(0, 13) + '....' + ext).attr('title', camcom).css('cursor', 'pointer');
        } else {
            $('.lblCc').html(camcom).attr('title', camcom).css('cursor', 'pointer');
        }
    }

    // llenar botones de la sección CAMARA DE COMERCIO
    var certban = __PHP().vars().proveedor.bank_certification;
    if (certban.length > 0) {
        if (certban.length > 15) {
            rut = certban.replace(/C:\\fakepath\\/i, '');
            var ext = certban.substring(certban.lastIndexOf('.') + 1).toLowerCase();
            $('.lblCb').html(certban.substr(0, 13) + '....' + ext).attr('title', certban).css('cursor', 'pointer');
        } else {
            $('.lblCb').html(certban).attr('title', certban).css('cursor', 'pointer');
        }
    }

    $("#economic_activity").select2({
        theme: 'bootstrap',
        language: {
            noResults: function () { return "No hay resultados"; },
            searching: function () { return "Buscando.."; }
        },
        closeOnSelect: true,
        placeholder: "Seleccione..."
    });

    // Obtener las actividades económicas y mostrarlas el select2
    $.getJSON("https://www.datos.gov.co/resource/3vbk-w3sc.json", function (data) {
        $("#economic_activity").append(`<option value="" readonly disabled>Seleccione...</option>`);
        $.each(data, function (key, val) {
            var split = val.clasificacion_ciiu.split(' ** ');
            var selected = __PHP().vars().proveedor.economic_activity;
            if(selected == split[0])
                $("#economic_activity").append(`<option selected value="${split[0]}">${split[0]} - ${split[1]}</option>`);
            else
                $("#economic_activity").append(`<option value="${split[0]}">${split[0]} - ${split[1]}</option>`);
        });
    });

    $('#form_actualizar').on('submit', function (e) {
        e.preventDefault();
        var urlA = baseUrl + "/providers/"+$('#id').val();
        var formData = new FormData(this);
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        jQuery.ajax({
            url: urlA, data: formData, processData: false, contentType: false, cache: false, type: 'POST',
            beforeSend: function () {
                showPreload();
            },
            success: function (result) {
                hiddenPreload();
                swal.fire('', result.msg, result.icon);
                if(result.status == 200)
                    window.location.assign(baseUrl + "/providers")
            },
            error: function (result) {
                hiddenPreload();
                swal.fire('', result.msg, 'error');
            }
        });
    });
});
