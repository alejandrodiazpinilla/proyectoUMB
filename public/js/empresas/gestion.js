$(document).ready(function () {

    $("#ciudad_empresa").select2({
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
            var tablaServ = [];
            var filas = $("#tableServicios").find("tr");
            for (i = 1; i < filas.length; i++) {
                var celdas = $(filas[i]).find("td");
                nombre = $(celdas[0]).text();
                descripcion = $(celdas[1]).text();
                imagen = $(celdas[2]).find('img').attr('src');
                tablaServ.push({
                    nombre,
                    descripcion,
                    imagen,
                })
            }
            if (tablaServ.length > 0) {
            $("#jsonTableServicios").val(JSON.stringify(tablaServ));
            var formData = new FormData(this);
            var files = $('#logoEmpresa1')[0].files[0];
            formData.append('file', files);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var urlA = baseUrl + "/empresas";
            jQuery.ajax({
                url: urlA,
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                type: 'POST',
                beforeSend: function () {
                    showPreload();
                    $('#registrar').html('Enviando...').attr('disabled',true)
                    },
                    success: function (result) {
                    hiddenPreload();
                    $('#registrar').html('Registrar').attr('disabled',false)
                        if (result == 0) {
                            swal.fire({
                                title: '<strong>Campos Vacios</strong>',
                                type: 'error',
                                html: 'Error. No se permiten ingresar valores vacíos, por favor no manipular el HTML.',
                                confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                            });
                        } else if (result == 1) {
                            swal.fire({
                                title: '<strong>Error de Duplicidad</strong>',
                                type: 'error',
                                html: 'Ya existe una empresa con el mismo nombre o el mismo NIT. Por favor validar las empresas existentes.',
                                confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                            });
                        } else if (result == 2) {
                            swal.fire({
                                title: '<strong>Exitoso!</strong>',
                                type: 'success',
                                html: 'La Empresa ha sido creada exitosamente.',
                                showCloseButton: true,
                                focusConfirm: false,
                                confirmButtonText:
                                    '<i class="fa fa-check"></i> Aceptar!',
                            });
                            window.location.assign(baseUrl + "/empresas")
                        } else {
                            swal.fire({
                                title: '<strong>Error al Guardar</strong>',
                                type: 'error',
                                html: 'Ocurrió un error al guardar, por favor intente nuevamente.',
                                confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                            });
                        }
                    },
                    error: function (result) {
                    hiddenPreload();
                    $('#registrar').html('Registrar').attr('disabled',false)
                        var lista = "<ul>";
                        jQuery.each(result.responseJSON.errors, function (key, value) {
                            lista += "<li>" + value + "</li>";
                        });
                        lista += "</ul>";
                        swal.fire({
                            type: 'error',
                            title: 'Error',
                            html: lista,
                            showCloseButton: true,
                            focusConfirm: false,
                            confirmButtonText:
                                '<i class="fa fa-check"></i> Aceptar!',
                        });
                    }
                });
            }else{
                swal.fire({
                    title: '<strong>Error de Duplicidad</strong>',
                    type: 'error',
                    html: 'Por favor, agregue mínimo un servicio.',
                    confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                });
            }
        }
    });

    $('#form_actualizar').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var tablaServ = [];
            var filas = $("#tableServicios").find("tr");
            for (i = 1; i < filas.length; i++) {
                var celdas = $(filas[i]).find("td");
                nombre = $(celdas[0]).text();
                descripcion = $(celdas[1]).text();
                imagen = $(celdas[2]).find('img').attr('src');
                tablaServ.push({
                    nombre,
                    descripcion,
                    imagen,
                })
            }
            if (tablaServ.length > 0) {
                $("#jsonTableServicios").val(JSON.stringify(tablaServ));
                var formData = new FormData(this);
                var files = $('#logoEmpresa2')[0].files[0];
                formData.append('file', files);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var urlA = baseUrl + "/empresas/" + $('#id').val();
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
                    if (result == 0) {
                            swal.fire({
                                title: '<strong>Campos Vacios</strong>',
                                type: 'error',
                                html: 'Error. No se permiten ingresar valores vacíos, por favor no manipular el HTML.',
                                confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                            });
                        } else if (result == 1) {
                            swal.fire({
                                title: '<strong>Error de Duplicidad</strong>',
                                type: 'error',
                                html: 'Ya existe una empresa con el mismo nombre o el mismo NIT. Por favor validar las empresas existentes.',
                                confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                            });
                        } else if (result == 2) {
                            swal.fire({
                                title: '<strong>Exitoso!</strong>',
                                type: 'success',
                                html: 'La Empresa ha sido actualizada exitosamente.',
                                showCloseButton: true,
                                focusConfirm: false,
                                confirmButtonText:
                                    '<i class="fa fa-check"></i> Aceptar!',
                            });
                            window.location.assign(baseUrl + "/empresas")
                        } else {
                            swal.fire({
                                title: '<strong>Error al Guardar</strong>',
                                type: 'error',
                                html: 'Ocurrió un error al guardar, por favor intente nuevamente.',
                                confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                            });
                        }
                    },
                    error: function (result) {
                    hiddenPreload();
                    var lista = "<ul>";
                        jQuery.each(result.responseJSON.errors, function (key, value) {
                            lista += "<li>" + value + "</li>";
                        });
                        lista += "</ul>";
                        swal.fire({
                            type: 'error',
                            title: 'Error',
                            html: lista,
                            showCloseButton: true,
                            focusConfirm: false,
                            confirmButtonText:
                                '<i class="fa fa-check"></i> OK!',
                        });
                    }
                });
            }else{
                swal.fire({
                    title: '<strong>Tabla sin Servicios</strong>',
                    type: 'error',
                    html: 'Por favor, agregue mínimo un servicio.',
                    confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                });
            }
        }
    });

    $(document).on('click', '.edit-modal', function () {
        $('#id_empresa').val($(this).data('id'));
        $('#nombre_empresa_edit').val($(this).data('nombreempresa'));
        $('#nit_empresa_edit').val($(this).data('nitempresa'));
        $('#direccion_empresa_edit').val($(this).data('direccionempresa'));
        $('#telefono_empresa_edit').val($(this).data('telefonoempresa'));
        $('#sede_empresa_edit').val($(this).data('sedeempresa'));
        $('#ciudad_empresa_edit').val($(this).data('ciudadempresa'));
        $('#observaciones_empresa_edit').val($(this).data('observacionesempresa'));

        
        var nombreArchivo = $(this).data('logoempresa');

        if (nombreArchivo.length > 0) {
            var ruta = baseUrl + '/image/logos/empresas/' + nombreArchivo;
            $("#uploadPreview2").attr('src', ruta);
        } else {
            var ruta = baseUrl + '/image/logos/empresas/logo_aqui.png';
            $("#uploadPreview2").attr('src', ruta);
        }


        var ciudades = $('#ciudad_empresa_edit').val();
        if (ciudades != null) {
            $('#ciudad_empresa_edit').val(ciudades).trigger("change");
        }
        $('#modal_editar').modal('show');
    });

    //*** AGREGAR SERVICIOS AL CREAR LA EMPRESA ***

    var tabla_srv = [];
    $("#agregarServicio").on('click',function(e){
        e.preventDefault();
        var nombre = $('#nombre_servicio').val();
        var desc = $('#descripcion_servicio').val();
        var img = $('#logoEmpresa2').val();
        
        if (nombre==''|| desc=='' || img=='') {
            if (nombre == '') {
                text = 'Nombre'
            }else if (desc == '') {
                text = 'Descripción'
            }else if (img == '') {
                text = 'Imagen'
            }
            swal.fire({
                type: 'error',
                title: 'Error',
                text: text+' no puede ir vacío',
                footer: '',
                confirmButtonText:
                '<i class="fa fa-check"></i> Aceptar!',
            });   
            return false;
        } else {
            var dataImg = $('#dataImg').val();
            var fila = 
            `<tr>
            <td>${nombre}</td>
            <td>${desc}</td>
            <td><div class="col-md">
                    <img class="img-responsive" width="150" height="150" src="${dataImg}"/>
                </div>
            </td>
            <td>
            <div class='btn-group'>
            <button type='button' class='eliminarFila btn btn-danger btn-xs'>
            <i class="icons cui-trash"></i>
            </button> 
            </div>
            </td>
            </tr>
            `
            var btn = document.createElement("TR");
            btn.innerHTML=fila;

            document.getElementById("bodyServicios").appendChild(btn);
            $('#nombre_servicio').val('');
            $('#descripcion_servicio').val('');
            $('#logoEmpresa2').val('');
            $('#dataImg').val();
            return true;
        }
    });

    $(document).on('click', '.eliminarFila', function(e){
        if (e.isDefaultPrevented()) {
        }else{
            e.preventDefault();
            var index = $(this).closest("tr").index()
            tabla_srv.splice(index, 1);
            $(this).closest("tr").remove();
        }
    });
});