$(document).ready(function () {

    fechaDatepicker();
    estadoSelect2();

    $('#fecha_inicio_reporte').datepicker({
        format: "dd-mm-yyyy",
        startDate: '01-01-2021',
        endDate: '+0d',
        language: 'es',
        autoclose: true,
        todayHighlight: !0
    }).on('changeDate',
        function (selected) {
            $('#fecha_fin_reporte').datepicker('clearDates');
            $('#fecha_fin_reporte').datepicker('setStartDate', $(this).val());
        });
    $('#fecha_fin_reporte').datepicker({
        format: "dd-mm-yyyy",
        startDate: '+0d',
        endDate: '+0d',
        language: 'es',
        autoclose: true,
        todayHighlight: !0
    });

    var table = $('#novedades_table').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [[3, "asc"]],
        "ajax": {
            "url": "/noveltiesrrhh/noveltiesRrhhIndex",
            "dataType": "json",
            "type": "GET",
            "data": { "_token": "{{ csrf_token() }}" }
        },
        columns: [
            { data: "empleado" },
            { data: "cliente" },
            { data: "tipo_novedad" },
            { data: "estado" },
            { data: "fecha_creacion" },
            {
                data: "action",
                render: function (data, type, full, meta) {
                    return `
                            <div class="form-group">
                                <a href="javascript:void(0)" class="edit-modal btn btn-${(full.permisoGestionar == true) ? 'dark' : 'warning'}" data-data='${JSON.stringify(full)}' title="${(full.permisoGestionar == true) ? 'Gestionar' : 'Detalle'}">
                                    <i class="fa fa-${(full.permisoGestionar == true) ? 'edit' : 'eye'}"></i>
                                </a>
                            </div>
                            `;
                },
                orderable: false
            }],
            "oLanguage": {
                "sUrl": baseUrl + "/plugins/datatables/es_es.json"
            },
        responsive: true,
        pagingType: "full_numbers"
    });

    $('#form_crear').validate({
        rules: {
            cedula: 'required',
            customer_id: 'required',
            novelty_type_id: 'required',
            company_id: 'required',
            description: 'required',
            fecha: 'required',
            cedula: {
                required: true,
                minlength: 7,
                maxlength: 10
            }
        },
        messages: {
            customer_id: 'Seleccione un cliente',
            company_id: 'Seleccione una empresa',
            novelty_type_id: 'Seleccione una novedad',
            description: 'Detalle la novedad generada',
            fecha: 'Seleccione una fecha',
            penalty: 'Describa la sanción a realizar',
            cedula: {
                required: 'Ingrese la cedula del empleado',
                minlength: 'La cédula no puede tener menos de 7 caracteres',
                maxlength: 'La cédula no puede tener más de 10 caracteres'
            }
        },
        errorElement: 'em',
        errorPlacement: function errorPlacement(error, element) {
            error.addClass('invalid-feedback');

            if (element.prop('type') === 'checkbox') {
                error.insertAfter(element.parent('label'));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function highlight(element) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function unhighlight(element) {
            $(element).addClass('is-valid').removeClass('is-invalid');
        }
    });

    $('#form_crear').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            let id = $('#id').val()
            if (id == null || id.length == 0)
                var urlA = baseUrl + "/noveltiesrrhh";
            else
                var urlA = baseUrl + "/noveltiesrrhh/" + id;
            jQuery.ajax({
                url: urlA,
                method: 'POST',
                data: $('#form_crear').serialize(),
                beforeSend: function () {
                    showPreload();
                },
                success: function (result) {
                    hiddenPreload();
                    if (result.status == 0) {
                        Swal.fire('Empleado no Registrado', result.msg, 'error');
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
                    Swal.fire('Error', 'Número de cédula del trabajador no encontrado', 'error')
                    $("#nombre").val('');
                    $("#position").val('');
                } else {
                    $("#nombre").val(data.trabajador.name+' '+data.trabajador.surname);
                    $("#position").val(data.trabajador.rel_ult_contrato.position);
                }
            });
        }
    });

    $("#checkAdmin").change(function () {
        if ($("#customer_id").attr('disabled') == 'disabled') {
            $("#customer_id").attr('disabled', false).attr('required', true);
        } else {
            $("#customer_id").attr('disabled', true).attr('required', false).val(null).trigger('change');
        }
    });

    var texto = `<div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <fieldset class="form-group">
                                <label for="fecha">Fecha</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </span>
                                    <input type="text" autocomplete="off" class="form-control" alt="fecha"
                                        name="fecha" id="fecha" required placeholder="Fecha Estimada de Pago">
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="state">Estado</label>
                            <select id="state" name="state" class="form-control select2-single">
                                <option value="0">Pago Pendiente</option>
                                <option value="1">Pago Recibido</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="penalty">Sanción</label>
                            <textarea name="penalty" id="penalty" class="form-control"
                                placeholder="Describa la Sanción" required></textarea>
                        </div>
                    </div>
                </div>`;

    $('#modal_crear').on('hidden.bs.modal', function () {
        var permiso = $('#permiso').val()
        if (permiso == 'true') {
            $('.divGestion').html(texto)
        } else {
            $('.divGestion').html('')
        }
        estadoSelect2();
        fechaDatepicker();
        $('#form_crear').trigger("reset");
        $('#company_id').val(null).trigger('change');
        $('#novelty_type_id').val(null).trigger('change');
        $('#customer_id').val(null).trigger('change').attr('disabled', false);
        $('#btnRegistrar').val('Registrar');
        $('.lblTitulo').html('Agregar Novedad');
        $('.modal-footer').html('<input class="btn btn-success" id="btnRegistrar" type="submit" value="Registrar"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>');
        $('#form_crear :input').attr('disabled', false);
    });

    $(document).on('click', '.edit-modal', function () {
        let full = $(this).data('data');
        var id = full.id;
        $('.divGestion').html(texto);
        fechaDatepicker();
        estadoSelect2();
        $('#id').val(id);
        $("#nombre").val(full.action.empleado);
        $("#position").val();
        $('#company_id').val(full.action.company_id).trigger('change');
        $('#novelty_type_id').val(full.action.novelty_type_id).trigger('change');
        $('#state').val(full.action.state).trigger('change');
        $('#fecha').val(full.action.payment_date);
        $('#penalty').val(full.sancion);
        $('#description').val(full.description);
        $('.modal-title').html('Gestionar Novedad');
        $('#form_crear :input').attr('disabled', false);
        if (full.action.customer_id == null) {
            $('#checkAdmin').prop('checked', true)
            $('#customer_id').val(null).trigger('change').attr('disabled', true);
        } else {
            $('#checkAdmin').prop('checked', false)
            $('#customer_id').val(full.action.customer_id).trigger('change').attr('disabled', false);
        }

        $('#btnRegistrar').val('Actualizar');
        setTimeout(() => {
            $('#cedula').focus().val(full.cedula);
        }, "10");
        setTimeout(() => {
            $('#penalty').focus();
        }, "50");
        setTimeout(() => {
            if (full.permisoGestionar == true) {
                $('.modal-footer').html('<input class="btn btn-success" id="btnRegistrar" type="submit" value="Actualizar"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>');
            } else {
                $('.modal-footer').html('');
                $('.lblTitulo').html('Mostrar Novedad');
                $('#form_crear :input').attr('disabled', true);
            }
        }, "50");
        $('#modal_crear').modal('show');
        $('#permiso').val(full.permisoGestionar);
    });
});

function fechaDatepicker() {
    $('#fecha').datepicker({
        format: "dd-mm-yyyy",
        startDate: '+0d',
        endDate: '+90d',
        language: 'es',
        autoclose: true,
        todayHighlight: !0
    });
}

function estadoSelect2() {
    $(".select2-single").select2({
        theme: 'bootstrap',
        language: {
            noResults: function () { return "No hay resultados"; },
            searching: function () { return "Buscando.."; }
        },
        closeOnSelect: true,
        placeholder: "Seleccione..."
    });
}