$(document).ready(function () {
    $('#home_visits_table').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [[4, "desc"]],
        "ajax": {
            "url": "/homevisits/homeVisitIndex",
            "dataType": "json",
            "type": "GET",
            "data": { "_token": "{{ csrf_token() }}" }
        },
        columns: [
            { data: "documento" },
            { data: "nombre" },
            { data: "resultado" },
            { data: "fecha" },
            { data: "state" },
            { data: "action",
                render: function (data, type, full, meta) {
                    return `<div class='btn-group'>
                <a href="homevisits/${full.id}" target="_blank" class="btn btn-danger" title="Descargar PDF"><i class="fa fa-file-pdf-o"></i>
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
});