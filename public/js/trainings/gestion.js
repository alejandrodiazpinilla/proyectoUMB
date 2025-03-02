$(document).ready(function () {

    $('#fecha').datepicker({
        format: "dd-mm-yyyy",
        startDate: '+0d',
        endDate: '+90d',
        language: 'es',
        autoclose: true,
        todayHighlight: !0
    });

   var table = $('#capacitaciones_table').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [[1, "asc"]],
        "ajax": {
            "url": "/trainings/trainingsIndex",
            "dataType": "json",
            "type": "GET",
            "data": { "_token": "{{ csrf_token() }}" }
        },
        columns: [
            { data: "date" },
            { data: "nro_participants" },
            { data: "topic" },
            { data: "description" },
            { data: "created_at" },
            {
                data: "action",
                render: function (data, type, full, meta) {
                    if (full.permisoEditar == true)
                    return `
                    <div class="form-group">
                        <a href="javascript:void(0)" class="edit-modal btn btn-${(full.fechasDiff == true)?'dark':'warning'}" data-data='${JSON.stringify(full)}' title="${(full.fechasDiff == true)?'Editar':'Detalle'}">
                            <i class="fa fa-${(full.fechasDiff == true)?'edit':'eye'}"></i>
                        </a>
                    </div>
                    `;
                    else
                    return '';
                },
                orderable: false
            }],
        "oLanguage": {
            "sUrl": baseUrl + "/plugins/datatables/es_es.json"
        },
        responsive: true,
        pagingType: "full_numbers"
    });

    $('#form_crear').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var tablaPart = [];
            var filas = $("#tableParticipantes").find("tr");
            for(i=1; i<filas.length; i++){
                var celdas = $(filas[i]).find("td");
                cedula = $(celdas[0]).text();
                tablaPart.push({cedula})
            }
            if (tablaPart.length == 0){
                Swal.fire('Tabla sin participantes', 'Por favor registre los participantes a la capacitación', 'error')
                return false;
            }

            $("#jsonTableParti").val(JSON.stringify(tablaPart));
            let id = $('#id').val()
            var formData = new FormData(this);
            if (id == null || id.length == 0)
                var urlA = baseUrl + "/trainings";
            else
                var urlA = baseUrl + "/trainings/" + id;

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
                    if (result.status == 0) {
                        Swal.fire('Error de duplicidad', result.msg, 'error');
                        table.ajax.reload();
                    } else if (result.status == 1) {
                        Swal.fire('Registro ' + result.msg + ' exitosamente', '', 'success')
                        $('#modal_crear').modal('hide');
                        table.ajax.reload();
                    } else {
                        Swal.fire('Ha ocurrido un error. Por favor intentelo nuevamente', '', 'error')
                    }
                },
                error: function (result) {
                    hiddenPreload();
                    Swal.fire('Ha ocurrido un error. Por favor intentelo nuevamente', '', 'error')
                }
            });
        }
    });

    $('#modal_crear').on('hidden.bs.modal', function () {
        $('#form_crear').trigger("reset");
        $('#entity_id').val(null).trigger('change');
        $('#btnRegistrar').val('Registrar');
        $('.lblTitulo').html('Agregar Capacitación');
        $('#bodyParticipantes').html('');
        $('.modal-footer').html('<input class="btn btn-success" id="btnRegistrar" type="submit" value="Registrar"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>');
        $('.divParticipantes').attr('hidden',false)
    });

    $(document).on('click', '.edit-modal', function () {
        let full = $(this).data('data');
        var id = full.id;
        $('#id').val(id);
        $('#fecha').val(full.fecha);
        $('#hora').val(full.hour);
        $('#nro_participants').val(full.nro_participants);
        $('#entity_id').val(full.action.entity_id).trigger('change');
        $('#topic').val(full.topic);
        $('#description').val(full.description);
        $('.modal-title').html('Actualizar Capacitación');
        $('#form_crear :input').attr('disabled',false);
        if (full.type == 'Link'){
            $('#linkDir').attr('type', 'url').attr('placeholder', 'Link de la entrevista').val(full.action.link_address);
            $('#radioLink').prop('checked', true)
        }else{
            $('#linkDir').attr('type', 'text').attr('placeholder', 'Dirección de la entrevista').val(full.action.link_address);
            $('#radioDir').prop('checked', true)
        }
        if(full.fechasDiff == true){
            $('.modal-footer').html('<input class="btn btn-success" id="btnRegistrar" type="submit" value="Registrar"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>');
        }else{
            $('.divParticipantes').attr('hidden',true);
            $('.modal-footer').html('');
            $('.lblTitulo').html('Mostrar Capacitación');
            $('#form_crear :input').attr('disabled',true);
        }
        $.ajax({
            type: "GET",
            url: baseUrl + '/trainings/tablaParticipantes',
            dataType: 'json',
            data: { id: id },
            success: function (data) {
                if(data == 0)
                    return false;

                var btn = '';
                if(full.fechasDiff == true){
                    btn = `<button type='button' class='eliminarFila btn btn-danger btn-xs'>
                    <i class='fa fa-trash'></i>
                    </button>`;
                }
                var archivos_table = '';
                data.forEach((item) => {
                    archivos_table += `
                    <tr>
                    <td>${item.empleado.identification}</td>
                    <td>${item.empleado.name}</td>
                    <td>${item.empleado.email}</td>
                    <td>
                    <div class='btn-group'>
                    ${btn} 
                    </div>
                    </td>
                    </tr>
                    `
                });
                $('#tableParticipantes tbody').html(archivos_table);
            }
        });
        $('#btnRegistrar').val('Actualizar');
        $('#modal_crear').modal('show');
    });

    var tabla_participantes = [];

    $("#agregarParticipante").on('click', function (e) {
        e.preventDefault();

        var nombre = $('#nombre').val();
        var cedula = $('#cedula').val();
        var email = $('#email').val();
        var cantPart = $('#participantes').val();

        if ((nombre == '' || email == '') && cedula.length > 0)
            return false;

        if (cedula == '') {
            Swal.fire('Error', 'Cédula no puede ir vacío', 'error');
            return false;
        }

        let filas = $("#tableParticipantes").find("tr");
        for (i = 0; i < filas.length; i++) {
            let celdas = $(filas[i]).find("td");
            if ($(celdas[0]).text() == cedula) {
                Swal.fire("Error de Duplicidad", "Éste participante ya se encuentra a la tabla", "warning");
                return false;
            }
        }

        if (cantPart == '') {
            Swal.fire("Error", "# de participantes no puede estar vacío.", "warning");
            return false;
        }
        if (filas.length > cantPart) {
            Swal.fire("Error", "Cantidad máxima de participantes excedida.", "warning");
            return false;
        }

        var fila =
            `<tr>
        <td>${cedula}</td>
        <td>${nombre}</td>
        <td>${email}</td>
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
        document.getElementById("bodyParticipantes").appendChild(btn);
        $('#nombre').val('');
        $('#cedula').val('');
        $('#email').val('');
        return true;

    });

    $(document).on('click', '.eliminarFila', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var index = $(this).closest("tr").index()
            tabla_participantes.splice(index, 1);
            $(this).closest("tr").remove();
        }
    });

    $("#cedula").blur(function () {
        var value = $(this).val();
        if (value.length == 0) {
        } else {
            $.ajax({
                url: baseUrl + "/terminationstaff/consultarTrabajador/" + $(this).val(),
                method: "GET",
                dataType: "json",
                cache: false,
            }).done(function (data) {
                if (data.trabajador == null) {
                    Swal.fire('Error', 'Número de cédula del trabajador no encontrado o trabajador inactivo', 'error')
                    $("#nombre").val('');
                    $("#email").val('');
                } else {
                    $("#nombre").val(data.trabajador.name);
                    $("#email").val(data.trabajador.email);
                }
            });
        }
    });

    $(document).on('click', '.radioLinkDir', function (e) {
        let val = $('[name=type]:checked').val();
        if (val == 'Link')
            $('#linkDir').attr('type', 'url').attr('placeholder', 'Link de la entrevista');
        else
            $('#linkDir').attr('type', 'text').attr('placeholder', 'Dirección de la entrevista');
    });

});