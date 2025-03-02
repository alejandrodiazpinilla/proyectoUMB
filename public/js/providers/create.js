$(document).ready(function() {
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
        $("#economic_activity").append(`<option value="" selected readonly disabled>Seleccione...</option>`);
        $.each(data, function (key, val) {
            var split = val.clasificacion_ciiu.split(' ** ');
            $("#economic_activity").append(`<option value="${split[0]}">${split[0]} - ${split[1]}</option>`);
        });
    });

    $('#form_crear').on('submit', function (e) {
        e.preventDefault();
        var urlA = baseUrl + "/providers";
        var formData = new FormData(this);
        $('#doc_rut')[0].files[0];
        $('#camara_comercio')[0].files[0];
        $('#cert_bancaria')[0].files[0];
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        jQuery.ajax({
            url: urlA,data: formData,processData: false,contentType: false,cache: false,type: 'POST',
            beforeSend: function () {
                showPreload();
            },
            success: function (result) {
                hiddenPreload();
                swal.fire('',result.msg,result.icon);
                if(result.status == 200)
                    window.location.assign(baseUrl + "/providers")
            },
            error: function (result) {
                hiddenPreload();
                swal.fire('',result.msg,'error');
            }
        });
    });
});
