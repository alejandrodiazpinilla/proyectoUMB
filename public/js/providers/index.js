$(document).ready(function () {

    var table = $('#providers_table').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [[0, "asc"]],
        "ajax": {
            "url": "/providers/providersIndex",
            "dataType": "json",
            "type": "GET",
            "data": { "_token": "{{ csrf_token() }}" }
        },
        columns: [
            { data: "nombrep" },
            { data: "ciudad" },
            { data: "telefono" },
            { data: "estado" },
            { data: "action",
                render: function (data, type, full, meta) {
                    return `
                    <div class='btn-group'>
                    <a href="/providers/${full.id}/edit" class="btn btn-dark" data-id="${full.id}" data-nombre="${data.nombrep}" title="Editar">
                    <i class="fa fa-edit"></i>
                    </a>
                    ` +
                    ((full.state == 0) ?
                    `<a href="javascript:void(0)" class="me-2 btnBloquear btn btn-success" title="Activar" data-id="${full.id}" data-estado="${full.state}">
                    <i class="icons cui-circle-check"></i> 
                    </a>` :
                    `<a href="javascript:void(0)" class="me-2 btnBloquear btn btn-danger" title="Bloquear" data-id="${full.id}" data-estado="${full.state}">
                    <i class="icons cui-circle-x"></i> 
                    </a>`) +
                    `</div>`;
                },
                orderable: false
            }
        ],
        "oLanguage": {
            "sUrl": baseUrl + "/plugins/datatables/es_es.json"
        },
        responsive: true,
        pagingType: "full_numbers"
    });

    $(document).on('click', '.btnBloquear', function () {
        var id = $(this).data('id');
        var estado = $(this).data('estado');
        var boton = "";
        if (estado == 0) {
            st = 'activar'
            boton = "Activar";
            txt = "activado";
        } else {
            st = 'bloquear'
            boton = "Bloquear";
            txt = "bloqueado";
        }
        swal.fire({
            title: "¿Está seguro de " + st + " este registro? ",
            text: "",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: boton
        }).then(function (e) {
            if (e.value) {
                showPreload();
                var urlA = baseUrl + "/providers/activarRegistro/" + id;
                jQuery.ajax({
                    url: urlA,
                    type: 'POST',
                    data: { '_token': $('input[name=_token]').val() },
                    success: function (result) {
                        hiddenPreload();
                        if (result.status == 200) {
                            swal.fire('', 'Registro ' + txt + ' correctamente', 'success')
                            table.ajax.reload();
                        } else {
                            swal.fire('Error', 'Ocurrio un problema al ' + st, 'error')
                        }
                    },
                    error: function (result) {
                        hiddenPreload();
                        swal.fire('Error', 'Ocurrio un problema al ' + st, 'error')
                    }
                });
            }
        });
    });
});