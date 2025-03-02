var archivos = [];
var arc = '';
$(document).ready(function() {
    $('#form_crear').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        }else{
            e.preventDefault();
            var tablaExp = [];
            var filas = $("#tableExperiencia").find("tr");
            for(i=1; i<filas.length; i++){
                var celdas = $(filas[i]).find("td");
                compania = $(celdas[0]).text();
                cargo = $(celdas[1]).text();
                fechaini = $(celdas[2]).text();
                fechafin = $(celdas[3]).text();
                jefe = $(celdas[4]).text();
                telefono = $(celdas[5]).text();
                funciones = $(celdas[6]).text();
                tablaExp.push({
                    compania,
                    cargo,
                    fechaini,
                    fechafin,
                    jefe,
                    telefono,
                    funciones
                })
            }
            var tablaRef = [];
            var filasRef = $("#tableReferencia").find("tr");
            for(i=1; i<filasRef.length; i++){
                var celdas = $(filasRef[i]).find("td");
                nombre = $(celdas[0]).text();
                cargo = $(celdas[1]).text();
                telefono = $(celdas[5]).text();
                tablaRef.push({
                    nombre,
                    cargo,
                    telefono,
                })
            }
            $("#jsonTableExp").val(JSON.stringify(tablaExp));
            $("#jsonTableRef").val(JSON.stringify(tablaRef));

            var urlA = baseUrl + "/curriculum";
            var formData = new FormData();
            var files = $('#contrato_adjunto')[0].files[0];
            $.each($('#form_crear').serializeArray(), function(i, field) {
                formData.append(field.name, field.value);
                formData.append('file',files);
            })
            jQuery.ajax({
                url: urlA,
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                type: 'POST',
                beforeSend: function() {
                },
                success: function(result){
                    if(result == 0){
                        swal.fire({
                            type: 'error',
                            title: 'Error',
                            text: 'Número de cédula del trabajador no encontrado',
                            footer: '',
                            confirmButtonText:
                            '<i class="fa fa-check"></i> Aceptar!',
                        });
                    }else{
                        swal.fire({
                            title: '<strong>Registro creado correctamente</strong>',
                            type: 'success',
                            html: 'Gracias.',
                            showCloseButton: true,
                            focusConfirm: false,
                            confirmButtonText:
                            '<i class="fa fa-check"></i> Aceptar!',
                        });
                        // window.location.assign(baseUrl + "/curriculum")
                    }
                },
                error: function(result){
                    var lista = "<ul>";
                    jQuery.each(result.responseJSON.errors, function(key, value){
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
        }
    });
    $('#form_actualizar').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        }else{
            e.preventDefault();
            var urlA = baseUrl + "/curriculum/" + $('#id_curriculum').val();
            jQuery.ajax({
                url: urlA,
                type: 'PUT',
                data: $('#form_actualizar').serialize(),
                beforeSend: function() {
                },
                success: function(result){
                    if(result == 0){
                        swal.fire({
                            type: 'error',
                            title: 'Error',
                            text: 'Ocurrio un problema al guardar',
                            footer: '',
                            confirmButtonText:
                            '<i class="fa fa-check"></i> Aceptar!',
                        });
                    }
                    swal.fire({
                        title: '<strong>Registro actualizado correctamente</strong>',
                        type: 'success',
                        html: 'Gracias.',
                        showCloseButton: true,
                        focusConfirm: false,
                        confirmButtonText:
                        '<i class="fa fa-check"></i> OK',
                    });
                    location.reload();
                },
                error: function(result){
                    var lista = "<ul>";
                    jQuery.each(result.responseJSON.errors, function(key, value){
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
        }
    });

// ************************************AGREGAR ADJUNTOS A AFILIACIONES*****************************************************

$(document).on('change', '.up', function () {
    var obs_archivo_var = $('.obs_adjunto').val();
    var id = $(this).attr('id'); 
    var profilePicValue = $(this).val();
    var fileNameStart = profilePicValue.lastIndexOf('\\'); 
    profilePicValue = profilePicValue.substr(fileNameStart + 1).substring(0, 15); 
    if (profilePicValue != '') {
        $(this).closest('.fileUpload').find('.upl').html(profilePicValue); 
    }
    var f = new Date();
    var fecha = (f.getFullYear() + "" + (f.getMonth() +1) + "" + f.getDate()+ "" + f.getHours() + "" + f.getMinutes() + "" + f.getSeconds());
    var profilePicValues = fecha + $(this).val().replace(/C:\\fakepath\\/i, '');
    arc = profilePicValues
    archivos.push({nombre_archivo:profilePicValues, obs_archivo:obs_archivo_var  
    });
    var nombArchivo = $('#nombre_adjunto').val(profilePicValues);
    obs_archivo_var ='';
});

var table_adjunto = [];

$("#agregar_adjunto").on('click',function(e){
    e.preventDefault();
    var files = $('#upload')[0].files[0];
    if (files == undefined) {
        swal.fire({
            type: 'error',
            title: 'Error',
            text: 'Por favor, seleccione un archivo',
            footer: '',
            confirmButtonText:
            '<i class="fa fa-check"></i> Aceptar!',
        }); 
    }else{
        var archi = arc; 
        table_adjunto.push({
            archivos_val: archi,
            obs_adjunto : $('#obs_adjunto').val(),
        })
        pintarTabla(table_adjunto)
        var formData = new FormData();

        $.each($('#form_crear').serializeArray(), function(i, field) {
            formData.append(field.name, field.value);
            formData.append('file',files);
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var urlA = baseUrl + "/curriculum/cargarArchivoAfiliacion";
        jQuery.ajax({
            url: urlA,
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            type: 'POST',
            success: function(result){
            },
        });
        $("#upload").val(null);
        $("#obs_adjunto").val('');
        $('.fileUpload').find(".icon").attr('src', 'https://image.flaticon.com/icons/svg/136/136549.svg');
        $(".upl").html('Cargar archivo');
        $('#afiliacion').val(null).trigger('change');
    }

});

function pintarTabla(data){
    let body = ''
    data.forEach((item,index) => {
        body += `
        <tr>
        <td>${item.archivos_val}</td>
        <td>${item.obs_adjunto}</td>
        <td><a data-toggle="tooltip" title="Eliminar"
        href="javascript:void(0)"
        class="eliminarArchivoAfiliaicon btn btn-danger btn-xs" data-nombre="${item.archivos_val}">
        <i class="fa fa-trash"></i></a></td>
        </tr>
        `
    });
    $('#body_adjunto').html(body)
    $("#afiliaciones_adjuntos").val(JSON.stringify(table_adjunto));
};

$(document).on('click', '.eliminarArchivoAfiliaicon', function(e){
    if (e.isDefaultPrevented()) {
    }else{
        e.preventDefault();
        nombre = $(this).data('nombre');
        var index = $(this).closest("tr").index()
        table_adjunto.splice(index, 1);
        $(this).closest("tr").remove();
        $("#afiliaciones_adjuntos").val(JSON.stringify(table_adjunto));
        var urlA = baseUrl + "/curriculum/eliminarArchivoAfiliacion/" + nombre;
        jQuery.ajax({
            url: urlA,
            type: 'POST',
            data: $('#form_crear').serialize(),
        });
    }
});

// ************************************AGREGAR ADJUNTOS A ESTUDIOS*****************************************************

$(document).on('change', '.up_estudio', function () {
    var obs_archivo_var = $('.obs_adjunto_estudio').val();
    var id = $(this).attr('id'); 
    var profilePicValue = $(this).val();
    var fileNameStart = profilePicValue.lastIndexOf('\\'); 
    profilePicValue = profilePicValue.substr(fileNameStart + 1).substring(0, 15); 
    if (profilePicValue != '') {
        $(this).closest('.fileUpload_estudio').find('.upl_estudio').html(profilePicValue); 
    }
    var f = new Date();
    var fecha = (f.getFullYear() + "" + (f.getMonth() +1) + "" + f.getDate()+ "" + f.getHours() + "" + f.getMinutes() + "" + f.getSeconds());
    var profilePicValues = fecha + $(this).val().replace(/C:\\fakepath\\/i, '');
    arc = profilePicValues
    archivos.push({nombre_archivo:profilePicValues, obs_archivo:obs_archivo_var  
    });
    var nombArchivo = $('#nombre_adjunto_estudio').val(profilePicValues);
    obs_archivo_var ='';
});

var table_adjunto_estudio = [];

$("#agregar_adjunto_estudio").on('click',function(e){
    e.preventDefault();
    var files = $('#upload_estudio')[0].files[0];
    if (files == undefined) {
        swal.fire({
            type: 'error',
            title: 'Error',
            text: 'Por favor, seleccione un archivo',
            footer: '',
            confirmButtonText:
            '<i class="fa fa-check"></i> Aceptar!',
        }); 
    }else{
        var archi = arc; 
        table_adjunto_estudio.push({
            archivos_val: archi,
            obs_adjunto : $('#obs_adjunto_estudio').val(),
        })
        pintarTablaEstudio(table_adjunto_estudio)
        var formData = new FormData();

        $.each($('#form_crear').serializeArray(), function(i, field) {
            formData.append(field.name, field.value);
            formData.append('file',files);
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var urlA = baseUrl + "/curriculum/cargarArchivoEstudio";
        jQuery.ajax({
            url: urlA,
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            type: 'POST',
            success: function(result){
            },
        });
        $("#upload_estudio").val(null);
        $("#obs_adjunto_estudio").val('');
        $('.fileUpload_estudio').find(".icon").attr('src', 'https://image.flaticon.com/icons/svg/136/136549.svg');
        $(".upl_estudio").html('Cargar archivo');
        $('#estudio').val(null).trigger('change');
    }
});

function pintarTablaEstudio(data){
    let body = ''
    data.forEach((item,index) => {
        body += `
        <tr>
        <td>${item.archivos_val}</td>
        <td>${item.obs_adjunto}</td>
        <td><a data-toggle="tooltip" title="Eliminar"
        href="javascript:void(0)"
        class="eliminarArchivoEstudio btn btn-danger btn-xs" data-nombre="${item.archivos_val}">
        <i class="fa fa-trash"></i></a></td>
        </tr>
        `
    });
    $('#body_adjunto_estudio').html(body)
    $("#estudios_adjuntos").val(JSON.stringify(table_adjunto_estudio));
};

$(document).on('click', '.eliminarArchivoEstudio', function(e){
    if (e.isDefaultPrevented()) {
    }else{
        e.preventDefault();
        nombre = $(this).data('nombre');
        var index = $(this).closest("tr").index()
        table_adjunto_estudio.splice(index, 1);
        $(this).closest("tr").remove();
        $("#estudios_adjuntos").val(JSON.stringify(table_adjunto_estudio));
        var urlA = baseUrl + "/curriculum/eliminarArchivoEstudio/" + nombre;
        jQuery.ajax({
            url: urlA,
            type: 'POST',
            data: $('#form_crear').serialize(),
        });
    }
});

// ************************************AGREGAR EXPERIENCIA LABORAL*****************************************************

var tabla_experiencia = [];

$("#agregarExperiencia").on('click',function(e){
    e.preventDefault();
    var compania = $('#compania_exp').val();
    var cargo = $('#cargo_exp').val();
    var fechaIni = $('#fecha_ini_exp').val();
    var fechaFin = $('#fecha_fin_exp').val();
    var jefe = $('#jefe_exp').val();
    var telefono = $('#tel_jefe_exp').val();
    var funciones = $('#funciones_exp').val();

    if (compania==''|| cargo==''|| fechaIni==''|| fechaFin==''|| jefe==''|| telefono==''|| funciones=='') {
        if (compania == '') {
            text = 'Compañía'
        }else if (cargo == '') {
            text = 'Cargo'
        }else if (fechaIni == '') {
            text = 'Fecha Inicio'
        }else if (fechaFin == '') {
            text = 'Fecha Terminación'
        }else if (jefe == '') {
            text = 'Jefe'
        }else if (telefono == '') {
            text = 'Teléfono'
        }else if (funciones == '') {
            text = 'Funciones'
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
        var fila = 
        `<tr>
        <td>${compania}</td>
        <td>${cargo}</td>
        <td>${fechaIni}</td>
        <td>${fechaFin}</td>
        <td>${jefe}</td>
        <td>${telefono}</td>
        <td>${funciones}</td>
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
        btn.innerHTML=fila;

        document.getElementById("bodyExperiencia").appendChild(btn);
        $('#compania_exp').val('');
        $('#cargo_exp').val('');
        $('#fecha_ini_exp').val('');
        $('#fecha_fin_exp').val('');
        $('#jefe_exp').val('');
        $('#tel_jefe_exp').val('');
        $('#funciones_exp').val('');
        return true;
    }
});


$(document).on('click', '.eliminarFila', function(e){
    if (e.isDefaultPrevented()) {
    }else{
        e.preventDefault();
        var index = $(this).closest("tr").index()
        tabla_experiencia.splice(index, 1);
        $(this).closest("tr").remove();
    }
});

// ************************************AGREGAR REFERENCIA PERSONAL*****************************************************

var tabla_experiencia = [];

$("#agregarReferencia").on('click',function(e){
    e.preventDefault();
    var nombre = $('#nombre_ref').val();
    var cargo = $('#cargo_ref').val();
    var telefono = $('#tel_ref').val();

    if (nombre==''|| cargo=='' || telefono=='') {
        if (nombre == '') {
            text = 'Nombre'
        }else if (cargo == '') {
            text = 'Cargo'
        }else if (telefono == '') {
            text = 'Teléfono'
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
        var fila = 
        `<tr>
        <td>${nombre}</td>
        <td>${cargo}</td>
        <td>${telefono}</td>
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
        btn.innerHTML=fila;

        document.getElementById("bodyReferencia").appendChild(btn);
        $('#nombre_ref').val('');
        $('#cargo_ref').val('');
        $('#tel_ref').val('');
        return true;
    }
});

});