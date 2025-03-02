$(document).ready(function () {

    $('.arrows').trigger('click');

    $(".select2-single").select2({
        theme: 'bootstrap',
        language: {
            noResults: function () { return "No hay resultados"; },
            searching: function () { return "Buscando.."; }
        },
        closeOnSelect: true,
        placeholder: "Seleccione..."
    });

    $('#date_of_birth,#date_of_birth_filter').datepicker({
        format: "yyyy-mm-dd",
        startDate: '-90y',
        endDate: '-18y',
        language: 'es',
        autoclose: true,
        todayHighlight: !0
    });

    $('#age_range').ionRangeSlider({
        type: 'double',
        grid: true,
        min: 18,
        max: 80,
        from: 20,
        to: 45,
        step: 1,
        prettify_enabled: false,
        prefix: 'Edad ',
        max_postfix: '+'
    });

    $(document).on('click', '.btnReset', function () {
        $("#company_id_filter").val(null).trigger('change').focus();
        $("#gender_filter").val(null).trigger('change');
        $("#city_id_filter").val(null).trigger('change');
        $("#locality_id_filter").val(null).trigger('change').attr('disabled', true);
        $("#neighborhood_id_filter").val(null).trigger('change').attr('disabled', true);
        $('.table-responsive').attr('hidden', true);
        $('#form_filter').trigger("reset");
        $('#age_range').ionRangeSlider().data("ionRangeSlider").reset();
        setTimeout(() => {
            $('#age_range').val('20;45').trigger('change');
        }, "400")
    });

    $('#modal_crear').on('hidden.bs.modal', function () {
        $('.modal-title').html('Agregar Hoja de Vida')
        $("#company_id").val(null).trigger('change').focus();
        $("#gender").val(null).trigger('change');
        $("#city_id").val(null).trigger('change');
        $("#locality_id").val(null).trigger('change').attr('disabled', true);
        $("#neighborhood_id").val(null).trigger('change').attr('disabled', true);
        $(".custom-file-label").html('Seleccione un archivo');
        $('#form_crear').trigger("reset");
    });

    $('#city_id,#city_id_filter').on('change', function (e) {
        let val = $(this).val();
        if (val == null || val.length == 0)
            return false;
        let localidad = '';
        let barrio = '';
        let tipo = $(this).attr('id');

        if (tipo == 'city_id'){
             localidad = '#locality_id';
             barrio = '#neighborhood_id';
        }else{
             localidad = '#locality_id_filter';
             barrio = '#neighborhood_id_filter';
        }

        $.ajax({
            type: "GET",
            url: baseUrl + '/employees/search_locality/' + $(this).val(),
            dataType: 'json',
            success: function (response) {
                $(localidad).attr('disabled', true).html('<option value="" disabled selected>Seleccione...<option>');
                $(barrio).attr('disabled', true).html('<option value="" disabled selected>Seleccione...<option>');
                if (response.localidades.length != 0) {
                    var loc = '';
                    response.localidades.forEach((item, index) => {
                        loc += `<option value="${item.id}">${item.name}<option>`
                    })
                    $(localidad).attr('disabled', false).html('<option value="" disabled selected>Seleccione...<option>' + loc);
                }
            },
            error: function (response) {
            }
        });
    });
    $('#locality_id,#locality_id_filter').on('change', function (e) {
        let val = $(this).val();
        if (val == null || val.length == 0)
            return false;
        
        let barrio = '';
        let tipo = $(this).attr('id');
        if (tipo == 'locality_id'){
            barrio = '#neighborhood_id';
        }else{
            barrio = '#neighborhood_id_filter';
        }
        $.ajax({
            type: "GET",
            url: baseUrl + '/employees/search_neighborhoods/' + $(this).val(),
            dataType: 'json',
            success: function (response) {
                $(barrio).attr('disabled', true).html('<option value="" disabled selected>Seleccione...<option>');
                if (response.barrios.length != 0) {
                    var loc = '';
                    response.barrios.forEach((item, index) => {
                        loc += `<option value="${item.id}">${item.name}<option>`
                    })
                    $(barrio).attr('disabled', false).html('<option value="" disabled selected>Seleccione...<option>' + loc);
                }
            },
            error: function (response) {
            }
        });
    });

    $('#form_crear').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            let id = $('#id').val()
            if (id == null || id.length == 0)
                var urlA = baseUrl + "/bankofresumes";
            else
                var urlA = baseUrl + "/bankofresumes/" + id;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = new FormData(this);
            $('#archivo')[0].files[0];
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
                        Swal.fire('Error de duplicidad. Ya existe un registro con este email o número de identificación.', '', 'error')
                    } else if (result.status == 1) {
                        Swal.fire('Registro ' + result.msg + ' exitosamente', '', 'success')
                        $('#modal_crear').modal('hide');
                        $('.btnConsultar').trigger('click');
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

    $('#form_filter').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            jQuery.ajax({
                url: baseUrl + "/bankofresumes/consultar",
                method: 'GET',
                data: $('#form_filter').serialize(),
                beforeSend: function () {
                    showPreload();
                },
                success: function (result) {
                    hiddenPreload();
                    if (result.status == 1) {
                        $('.table-responsive').attr('hidden', false);
                        $('#hdv_table').DataTable({
                            stateSave: false,
                            "oLanguage": {
								"sUrl": baseUrl + "/plugins/datatables/es_es.json"
							},
                            destroy: true,
                            searching: true,
                            data: result.data,
                            responsive: true,
                            paging: true,
                            columns: [
                                { data: "identification" },
                                { data: "name" },
                                { data: "company" },
                                { data: "email" },
                                { data: "telephone" },
                                { data: "age" },
                                { data: "genderExtend" },
                                { data: "address" },
                                { data: "city" },
                                { data: "locality" },
                                { data: "neighborhood" },
                                { data: "stateExtend" },
                                {
                                    data: "file",
                                    render: function (data, type, full, meta) {
                                        return `<div class='btn-group'>` +
                                            ((full.file != null) ?
                                                `<a href="Adjuntos/BancoHdv/${full.file}" target="_blank" class="btnDescargar btn btn-danger" data-id="${full.id}" title="Descargar">
                                            <i class="fa fa-file-pdf-o"></i>
                                            </a>`: ''
                                            ) +
                                            ((full.permisoEditar == true) ?
                                                `<a href="javascript:void(0)" class="btnEditar btn btn-dark" data-datos='${JSON.stringify(full)}' title="Editar">
                                            <i class="fa fa-edit"></i>
                                            </a>`: ''
                                            ) +
                                            `</div>`;
                                    },
                                    orderable: false
                                }
                            ],
                            pagingType: "full_numbers",
                            dom: 'lfrtipB',
                            buttons: [
                                {
                                    extend: 'excelHtml5',
                                    autoFilter: true,
                                    footer: true,
                                    title: 'Banco Hojas de Vida',
                                    text: 'Exportar <i class="fa fa-file-excel-o"></i>',
                                    tag: "button",
                                    className: "btn btn-success",
                                    customize: function (xlsx) {
                                        var source = xlsx.xl['workbook.xml'].getElementsByTagName('sheet')[0];
                                        source.setAttribute('name', 'Hojas de Vida');
                                    },
                                }
                            ],
                        });
                    } else {
                        $('.table-responsive').attr('hidden', true);
                        Swal.fire('Sin resultados con los criterios de búsqueda actuales.', '', 'info')
                    }
                },
                error: function (result) {
                    hiddenPreload();
                    Swal.fire('Ha ocurrido un error. Por favor intentelo nuevamente', '', 'error')
                }
            });
        }
    });

    $(document).on('click', '.btnEditar', function () {
        let full = $(this).data('datos');
        $('#city_id').val(full.city_id).trigger('change');
        $('#company_id').val(full.company_id).trigger('change');
        $('#identification').val(full.identification);
        $('#name').val(full.name);
        $('#email').val(full.email);
        $('#telephone').val(full.telephone);
        $('#gender').val(full.gender).trigger('change');
        $('#date_of_birth').val(full.date_of_birth);
        $('#address').val(full.address);
        $('.modal-title').html('Actualizar Hoja de Vida')
        $('#id').val(full.id);
        setTimeout(() => {
            $('#locality_id').val(full.locality_id).trigger('change');
        }, "300")
        setTimeout(() => {
            $('#neighborhood_id').val(full.neighborhood_id).trigger('change');
        }, "700")
        $('#modal_crear').modal('show');
    });

});