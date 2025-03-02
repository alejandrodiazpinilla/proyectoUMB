var tabla1 = [];

$(document).ready(function () {

    $("#datepickerMonthYear").datepicker({
        language: 'es',
        startDate: '-30d',
        endDate: '+0d',
        format: "MM-yyyy",
        viewMode: "months", 
        minViewMode: "months",
        autoclose: true,
    });
    $("#company_id").select2({
        theme: 'bootstrap',
        language: {
            noResults: function () { return "No hay resultados"; },
            searching: function () { return "Buscando.."; }
        },
        closeOnSelect: true,
        placeholder: "Seleccione..."
    });

    var table = $('#month_report_table').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [[1, "asc"]],
        "ajax": {
            "url": baseUrl + "/monthreport/monthReportIndex",
            "dataType": "json",
            "type": "GET",
            "data": { "_token": "{{ csrf_token() }}" }
        },
        columns: [
            { data: "user" },
            { data: "state" },
            { data: "month_year" },
            { data: "area" },
            { data: "created_at" },
            { data: "action",
                render: function (data, type, full, meta) {
                    return `
                    <div class="btn-group">`+
                    ((full.permisoAprobar == true)?
                    `<a href="javascript:void(0)" class="btnAprobar btn btn-success" 
                    data-crypt_id="${full.crypt_id}"
                    data-tipo="aprobar"
                    title="Aprobar"><i class="icons cui-circle-check"></i>
                    </a>
                    <a href="javascript:void(0)" class="btnAprobar btn btn-danger" 
                    data-crypt_id="${full.crypt_id}"
                    data-tipo="rechazar"
                    title="Rechazar"><i class="icons cui-circle-x"></i>
                    </a>`
                    :''
                    )+
                    ((full.permisoEditar == true && full.action.state != 1 && full.action.state != 3)?
                    `<a href="`+baseUrl+`/monthreport/`+full.crypt_id+`/edit" class="btn bg-yellow" title="Editar">
                    <i class="fa fa-edit"></i>
                    </a>`
                    :''
                    )+
                    `<a href="javascript:void(0)" class="btnDescargarPDF btn bg-light-blue text-white" 
                    data-crypt_id="${full.crypt_id}"
                    title="Descargar PDF"><i class="fa fa-file-pdf-o"></i>
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

    $('#modal_crear').on('shown.bs.modal', function () {
        $("#company_id").val(null).trigger('change').focus();
        $('#form_crear').trigger("reset");
        $('#bodyImages').html("");
    });

    $('#form_crear').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var tablaImages = [];
            var filasImages = $("#tableImages").find("tr");
              if (filasImages.length < 2) {
              swal.fire({
                title: '<strong>Informe sin Evidencias Fotográficas</strong>',
                type: 'error',
                html: 'Por favor, seleccione 1 o mas imágenes como evidencias del informe',
                confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
              });
              return false;
            }
            for (i = 1; i < filasImages.length; i++) {
                var celdas = $(filasImages[i]).find("td");
                imagen = $(celdas[0]).find('img').attr('src');
                tablaImages.push({
                  imagen
                })
              }

            $("#jsonImages").val(JSON.stringify(tablaImages));
            var urlA = baseUrl + "/monthreport";
            jQuery.ajax({
                url: urlA,
                data: $('#form_crear').serialize(),
                method: 'POST',
                beforeSend: function () {
                    showPreload();
                },
                success: function (result) {
                    hiddenPreload();
                    if (result == 0){
                        swal.fire({
                            title: '<strong>Informe Duplicado</strong>',
                            type: 'error',
                            text: 'El informe que intenta registrar ya se encuentra en el sistema. Por favor consulte la tabla principal para validar la información.',
                            html: result,
                            confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                        });
                    }else if (result == 1) {
                        swal.fire({
                            title: '<strong>Exitoso!</strong>',
                            type: 'success',
                            html: 'Informe creado exitosamente.',
                            showCloseButton: true,
                            focusConfirm: false,
                            confirmButtonText:
                                '<i class="fa fa-check"></i> Aceptar!',
                        });
                        window.location.assign(baseUrl + "/monthreport")
                    } else {
                        swal.fire({
                            title: '<strong>Error al Guardar</strong>',
                            type: 'error',
                            text: 'Ocurrió un error al guardar, por favor intente nuevamente.',
                            html: result,
                            confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                        });
                    }
                },
                error: function (result) {
                    hiddenPreload();
                    swal.fire({
                        title: '<strong>Error al Guardar</strong>',
                        type: 'error',
                        html: result.responseJSON['message'],
                        text: 'Ocurrió un error al guardar, por favor intente nuevamente.',
                        confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                    });
                }
            });
        }
    });

    $('#form_actualizar').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var tablaImages = [];
            var filasImages = $("#tableImages").find("tr");
              if (filasImages.length < 2) {
              swal.fire({
                title: '<strong>Informe sin Evidencias Fotográficas</strong>',
                type: 'error',
                html: 'Por favor, seleccione 1 o mas imágenes como evidencias del informe',
                confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
              });
              return false;
            }
            for (i = 1; i < filasImages.length; i++) {
                var celdas = $(filasImages[i]).find("td");
                imagen = $(celdas[0]).find('img').attr('src');
                tablaImages.push({
                  imagen
                })
              }

            $("#jsonImages").val(JSON.stringify(tablaImages));
            var urlA = baseUrl + "/monthreport/"+ $('#id').val();
            jQuery.ajax({
                url: urlA,
                data: $('#form_actualizar').serialize(),
                method: 'PUT',
                beforeSend: function () {
                    showPreload();
                },
                success: function (result) {
                    hiddenPreload();
                    if (result == 0){
                        swal.fire({
                            title: '<strong>Informe Duplicado</strong>',
                            type: 'error',
                            text: 'El informe que intenta registrar ya se encuentra en el sistema. Por favor consulte la tabla principal para validar la información.',
                            html: result,
                            confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                        });
                    }else if (result == 1) {
                        swal.fire({
                            title: '<strong>Exitoso!</strong>',
                            type: 'success',
                            html: 'Informe creado exitosamente.',
                            showCloseButton: true,
                            focusConfirm: false,
                            confirmButtonText:
                                '<i class="fa fa-check"></i> Aceptar!',
                        });
                        window.location.assign(baseUrl + "/monthreport")
                    } else {
                        swal.fire({
                            title: '<strong>Error al Guardar</strong>',
                            type: 'error',
                            text: 'Ocurrió un error al guardar, por favor intente nuevamente.',
                            html: result,
                            confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                        });
                    }
                },
                error: function (result) {
                    hiddenPreload();
                    swal.fire({
                        title: '<strong>Error al Guardar</strong>',
                        type: 'error',
                        html: result.responseJSON['message'],
                        text: 'Ocurrió un error al guardar, por favor intente nuevamente.',
                        confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                    });
                }
            });
        }
    });

    $(document).on('click', '.btnDescargarPDF', function () {
        var url = 'monthreport/' + $(this).data('crypt_id')
        window.open(url, '_blank');
      });

    $(document).on('click', '#btn_images', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            var img = $('#images_evidence')[0].files;
            if(img.length > 0){
                Object.keys(img).forEach(function (key) {
                    agregarImagenes(img[key]);
                });
                $('#images_evidence').val('');
                $('.custom-file-label').html('Seleccione una o mas imágenes')
            }
        }
    });
      
    function agregarImagenes(img) {
        const file = img;
        const reader = new FileReader();
    
        reader.addEventListener("load", function () {
        var dataImg = reader.result;
        var fila =
            `<tr>
            <td>
            <div class="col-md-12">
            <img class="img-responsive mx-auto" width="150" src="${dataImg}"/>
            </div>
            </td>
            <td>
            <button type='button' class='eliminarFila btn btn-danger btn-xs'>
            <i class="icons cui-trash"></i>
            </button> 
            </td>
            </tr>`
        var btn = document.createElement("TR");
        btn.innerHTML = fila;
        document.getElementById("bodyImages").appendChild(btn);
        }, false);
    
        if (file) {
        reader.readAsDataURL(file);
        }
    }
    
    $(document).on('click', '.eliminarFila', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
        e.preventDefault();
        var index = $(this).closest("tr").index()
        tabla1.splice(index, 1);
        $(this).closest("tr").remove();
        }
    });
    $(document).on('click', '.btnAprobar', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var id = $(this).data('crypt_id');
            var tipo = $(this).data('tipo');
            swal.fire({
                title: "¿Está seguro de "+tipo+" este informe? ",
                text: '',
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: tipo[0].toUpperCase() + tipo.substring(1)
        }).then(function(e) {
            if(e.value){
                var urlA = baseUrl + "/monthreport/aprobarInforme/" + id;
            jQuery.ajax({
                url: urlA,
                data:{'_token': $('input[name=_token]').val(),'tipo': tipo},
                method: 'POST',
                beforeSend: function () {
                    showPreload();
                },
                success: function (result) {
                    hiddenPreload();
                    if (result == 0) {
                        swal.fire({
                            title: '<strong>Error al Guardar</strong>',
                            type: 'error',
                            text: 'Ud no tiene permisos para realizar ésta acción',
                            confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                        });
                    }else if (result == 1) {
                        swal.fire({
                            title: '<strong>Exitoso!</strong>',
                            type: 'success',
                            html: 'Estado actualizado exitosamente.',
                            showCloseButton: true,
                            focusConfirm: false,
                            confirmButtonText:
                                '<i class="fa fa-check"></i> Aceptar!',
                        });
                        table.ajax.reload();
                    } else {
                        swal.fire({
                            title: '<strong>Error al Guardar</strong>',
                            type: 'error',
                            text: 'Ocurrió un error al guardar, por favor intente nuevamente.',
                            html: result,
                            confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                        });
                    }
                },
                error: function (result) {
                    hiddenPreload();
                    swal.fire({
                        title: '<strong>Error al Guardar</strong>',
                        type: 'error',
                        text: 'Ocurrió un error al guardar, por favor intente nuevamente.',
                        confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                    });
                }
            });
            }
        });
        }
    });
});