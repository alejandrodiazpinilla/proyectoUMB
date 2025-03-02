$(document).ready(function() {

   var table = $('#entidades_table').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [[1, "asc"]],
        "ajax": {
            "url": "/trainingentities/trainingEntitiesIndex",
            "dataType": "json",
            "type": "GET",
            "data": {
                "_token": "{{ csrf_token() }}"
            }
        },
        columns: [
        {data: "name"},
        {data: "state"},
        {data: "action",
        render: function(data, type, full, meta) {
            return `
        <div class='btn-group'>
        <a href="javascript:void(0)" class="edit-modal btn btn-dark" data-id="${data.id}" data-name="${data.name}" data-state="${data.state}" title="Editar">
        <i class="fa fa-edit"></i>
        </a>
        ` +
        ((data.state == 0) ?
        `<a href="javascript:void(0)" class="me-2 delete-modal btn btn-success" title="Activar" data-id="${data.id}" data-estado="${data.state}">
            <i class="icons cui-circle-check"></i> 
            </a>` :
        `<a href="javascript:void(0)" class="me-2 delete-modal btn btn-danger" title="Bloquear" data-id="${data.id}" data-estado="${data.state}">
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
        $("#name").focus();
    }); 

    $('#modal_crear').on('hidden.bs.modal', function () {
        $("#id").val(null);
        $("#name").val(null);
        $('#btnRegistrar').val('Registrar');
        $('.lblTitulo').html('Agregar Entidad de Formación');
    });
    
    $('#form_crear').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        }else{
            e.preventDefault();
            let id = $('#id').val()
            if (id == null || id.length == 0)
                var urlA = baseUrl + "/trainingentities";
            else
                var urlA = baseUrl + "/trainingentities/" + id;

            jQuery.ajax({
                url: urlA,
                method: 'POST',
                data: $('#form_crear').serialize(),
                beforeSend: function() {
                    showPreload();
                },
                success: function(result){
                    hiddenPreload();
                    Swal.fire('Registro ' + result.msg + ' exitosamente', '', 'success');
                    $('#modal_crear').modal('hide');
                    table.ajax.reload();
                },
                error: function(result){
                    hiddenPreload();
                    Swal.fire('Ha ocurrido un error. Por favor intentelo nuevamente', result, 'error')
                }
            });
        }
    });

    $(document).on('click', '.edit-modal', function() {
        $('#id').val($(this).data('id'));
        $('#name').val($(this).data('name'));
        $('#btnRegistrar').val('Actualizar');
        $('.lblTitulo').html('Actualizar Entidad de Formación');
        $('#modal_crear').modal('show');
    });

    $(document).on('click', '.delete-modal', function() {
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
                var urlA = baseUrl + "/trainingentities/activarEntidad/" + id;
                jQuery.ajax({
                    url: urlA,
                    type: 'POST',
                    data: {
                        '_token': $('input[name=_token]').val(),
                    },
                    success: function(result){
                        hiddenPreload();
                        Swal.fire('Registro ' + result.msg + ' exitosamente', '', 'success')
                        table.ajax.reload();
                    },
                    error: function(result){
                    hiddenPreload();
                    Swal.fire('Ha ocurrido un error. Por favor intentelo nuevamente', result, 'error')
                    }
                });
            }
        });
    });
});