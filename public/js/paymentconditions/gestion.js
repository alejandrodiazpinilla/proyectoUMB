$(document).ready(function() {

    var table = $('#payments_table').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [[0, "asc"]],
        "ajax": {
            "url": "/paymentconditions/PaymentConditionsIndex",
            "dataType": "json",
            "type": "GET",
            "data": {"_token": "{{ csrf_token() }}"}
        },
        columns: [
            {data: "nombre"},
            {data: "action",
        render: function(data, type, full, meta) {
        return `
        <div class='btn-group'>
        <a href="javascript:void(0)" class="edit-modal btn btn-dark" data-id="${full.id}" data-nombre="${data.nombre}" title="Editar">
        <i class="fa fa-edit"></i>
        </a>
        ` +
        ((data.state == 0) ?
        `<a href="javascript:void(0)" class="me-2 btnBloquear btn btn-success" title="Activar" data-id="${full.id}" data-estado="${data.state}">
            <i class="icons cui-circle-check"></i> 
            </a>` :
        `<a href="javascript:void(0)" class="me-2 btnBloquear btn btn-danger" title="Bloquear" data-id="${full.id}" data-estado="${data.state}">
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

    $('#modal_crear').on('shown.bs.modal', function () {
        $("#nombre_afiliacion").focus();
    });
    
    $('#form_crear').on('submit', function (e) {
            e.preventDefault();
            var id = $('#id').val();
            var formData = new FormData(this);
            if (id == null || id.length == 0)
                var urlA = baseUrl + "/paymentconditions";
            else
                var urlA = baseUrl + "/paymentconditions/" + id;

            jQuery.ajax({
                url: urlA,
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                type: 'POST',
                beforeSend: function() {
                    showPreload();
                },
                success: function(result){
                    hiddenPreload();
                    if(result.status == 200){
                        swal.fire('',result.msg,'success');
                        table.ajax.reload();
                        $('#modal_crear').modal('hide');
                    }else{
                        swal.fire('',result.msg,'error');
                    }
                },
                error: function(result){
                    hiddenPreload();
                    swal.fire('Error',result,'error');
                }
            });
    });

    $(document).on('click', '.edit-modal', function() {
        $('#id').val($(this).data('id'));
        $('#nombre').val($(this).data('nombre'));
        $('#modal_crear').modal('show');
    });

    $(document).on('click', '.btnBloquear', function() {
        var id = $(this).data('id');
        var estado = $(this).data('estado');
        var boton ="";
        if (estado == 0) {
            st = 'activar'
            boton = "Activar";
            txt = "activado";
        }else{
            st = 'bloquear'
            boton = "Bloquear";
            txt = "bloqueado";
        }
        swal.fire({
            title: "¿Está seguro de "+st+" este registro? ",
            text: "",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: boton
        }).then(function(e) {
            if(e.value){
                showPreload();
                var urlA = baseUrl + "/paymentconditions/activarRegistro/" + id;
                jQuery.ajax({
                    url: urlA,
                    type: 'POST',
                    data: {
                        '_token': $('input[name=_token]').val(),
                    },
                    success: function(result){
                    hiddenPreload();
                    if(result.status == 200){
                        swal.fire('','Registro '+txt+' correctamente','success')
                        table.ajax.reload();
                    }else{
                            swal.fire('Error','Ocurrio un problema al '+st,'error')    
                        }
                    },
                    error: function(result){
                        hiddenPreload();
                        swal.fire('Error','Ocurrio un problema al '+st,'error')    
                    }
                });
            }
        });
    });
});