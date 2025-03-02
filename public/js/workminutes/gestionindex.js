$(document).ready(function () {
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
            { data: "consecutive" },
            { data: "fecha" },
            { data: "area" },
            { data: "tema" },
            { data: "lugar" },
            { data: "lider" },
            {
                data: "action",
                render: function (data, type, full, meta) {
                    return `<div class='btn-group'>
                <a href="workminutes/${full.crypt_id}" target="_blank" class="btn btn-danger" title="Descargar"><i class="fa fa-file-pdf-o"></i>
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