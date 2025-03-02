var sketchpad;
var sketchpad2;
$(document).ready(function () {
    sketchpad = new Sketchpad({
      element: '#sketchpad',
      width: 288,
      height: 108
    });
    sketchpad2 = new Sketchpad({
        element: '#sketchpad2',
        width: 288,
        height: 108
      });
  function clear() {
   sketchpad.clear();
  }
  function clear2() {
    sketchpad2.clear();
   }
  document.getElementById('clear').onclick = clear;
  document.getElementById('clear2').onclick = clear2;

    var table = $('#delivery_endowment_table').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [[1, "asc"]],
        "ajax": {
            "url": baseUrl + "/deliveryendowment/deliveryEndowmentIndex",
            "dataType": "json",
            "type": "GET",
            "data": { "_token": "{{ csrf_token() }}" }
        },
        columns: [
            { data: "id" },
            { data: "guard" },
            { data: "created_at" },
            { data: "action",
                render: function (data, type, full, meta) {
                    return `
                    <a href="javascript:void(0)" class="btnDescargarPDF btn btn-danger" 
                    data-crypt_id="${full.crypt_id}"
                    title="Descargar PDF"><i class="fa fa-file-pdf-o"></i>
                    </a>`;
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
        $("#guard_id").val(null).trigger('change').focus();
        $('#form_crear').trigger("reset");
        $('#clear').trigger('click');
        $('#clear2').trigger('click');
    });

    $("#guard_id").select2({
        theme: 'bootstrap',
        language: {
            noResults: function () { return "No hay resultados"; },
            searching: function () { return "Buscando.."; }
        },
        closeOnSelect: true,
        placeholder: "Seleccione..."
    });

    $('#form_crear').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();

            // validar si se han realizado las 2 firmas 
            var img1 = new Image;
            d1 = document.getElementById("sketchpad")
            img1.src = d1.toDataURL("image/png")
            var canva1 = document.getElementById("sketchpad")
            var image1 = canva1.toDataURL("image/png")
            document.getElementById('firmaBase64').value = image1
            var stringLength1 = image1.length - 'data:image/png;base64,'.length

            var img2 = new Image;
            d2 = document.getElementById("sketchpad2")
            img2.src = d2.toDataURL("image/png")
            var canva2 = document.getElementById("sketchpad2")
            var image2 = canva2.toDataURL("image/png")
            document.getElementById('firmaBase642').value = image2
            var stringLength2 = image2.length - 'data:image/png;base64,'.length

            if (stringLength1<1150 || stringLength2<1150) {
                swal.fire({
                    title: '<strong>Documento sin Firmar</strong>',
                    type: 'error',
                    text: 'Por favor complete los campos de las firmas.',
                    confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                });
                return false;
            }
            var tablaDot = [];
            var filas = $("#delivery_table").find("tr");
            for (i = 1; i < filas.length; i++) {
                var celdas = $(filas[i]).find("td");
                prenda = $(celdas[0]).text();
                talla = $($(celdas[1]).children("input")[0]).val();
                cantidad = $($(celdas[2]).children("input")[0]).val();
                obs = $($(celdas[3]).children("textarea")[0]).val();
                tablaDot.push({
                    prenda,
                    talla,
                    cantidad,
                    obs,
                })
            }
            // validar si todos los campos de talla y cantidad tienen valor
            const conteoTalla = tablaDot.filter(fila => fila.talla);
            const conteoCantidad = tablaDot.filter(fila => fila.cantidad);

            if(conteoTalla.length == 0 || conteoCantidad.length == 0 || (conteoTalla.length != conteoCantidad.length)){
                swal.fire({
                    title: '<strong>Prendas sin seleccionar o incompletas</strong>',
                    type: 'error',
                    text: 'Por favor, seleccione las prendas a entregar con su respectiva talla y cantidad.',
                    confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                });
                return false;
            }

            $("#jsonTableDelivery").val(JSON.stringify(tablaDot));
            var urlA = baseUrl + "/deliveryendowment";
            jQuery.ajax({
                url: urlA,
                data: $('#form_crear').serialize(),
                method: 'POST',
                beforeSend: function () {
                    showPreload();
                },
                success: function (result) {
                    hiddenPreload();
                    if (result == 0) {
                        swal.fire({
                            title: '<strong>Prendas sin seleccionar o incompletas</strong>',
                            type: 'error',
                            text: 'Por favor, seleccione las prendas a entregar con su respectiva talla y cantidad.',
                            confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                        });
                    } else if (result == 1) {
                        swal.fire({
                            title: '<strong>Exitoso!</strong>',
                            type: 'success',
                            html: 'Registro creado exitosamente.',
                            showCloseButton: true,
                            focusConfirm: false,
                            confirmButtonText:
                                '<i class="fa fa-check"></i> Aceptar!',
                        });
                        table.ajax.reload();
                        $('#modal_crear').modal('hide');
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
        var url = 'deliveryendowment/' + $(this).data('crypt_id')
        window.open(url, '_blank');
      });

});