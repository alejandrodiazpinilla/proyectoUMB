$(document).ready(function() {

    $(document).on('click', '#validarListado', function() {
        var fileUpload = $("#csv")[0];
        var regex = /^([a-zA-Z0-9\s_\\.\-:()])+(.xls|.xlsx)$/;
        if (regex.test(fileUpload.value.toLowerCase())) {
            if (typeof (FileReader) != "undefined") {
                var reader = new FileReader();

                if (reader.readAsBinaryString) {
                    reader.onload = function (e) {
                        ProcessExcel(e.target.result);
                    };
                    reader.readAsBinaryString(fileUpload.files[0]);
                } else {
                    reader.onload = function (e) {
                        var data = "";
                        var bytes = new Uint8Array(e.target.result);
                        for (var i = 0; i < bytes.byteLength; i++) {
                            data += String.fromCharCode(bytes[i]);
                        }
                        ProcessExcel(data);
                    };
                    reader.readAsArrayBuffer(fileUpload.files[0]);
                }
            } else {
                alert("Este navegador no soporta HTML5.");
            }
        } else {
            swal.fire({
                type: 'error',
                title: 'Error',
                text: 'Seleccione un archivo válido',
                footer: '',
                confirmButtonText:
                '<i class="fa fa-check"></i> OK!',
            });
        }
    });

    function ProcessExcel(data, thrownError) {
        var workbook = XLSX.read(data, {
            type: 'binary'
        });
        var firstSheet = workbook.SheetNames[0];
        if (   typeof workbook.Sheets[firstSheet].A1.h == 'undefined' ||
         workbook.Sheets[firstSheet].A1.h !== 'cedula' ||
         typeof workbook.Sheets[firstSheet].B1.h == 'undefined' ||
         workbook.Sheets[firstSheet].B1.h !== 'nombre'  ||
         typeof workbook.Sheets[firstSheet].C1.h == 'undefined' ||
         workbook.Sheets[firstSheet].C1.h !== 'email'  ||
         typeof workbook.Sheets[firstSheet].D1.h == 'undefined' ||
         workbook.Sheets[firstSheet].D1.h !== 'telefono'  ||
         typeof workbook.Sheets[firstSheet].E1.h == 'undefined' ||
         workbook.Sheets[firstSheet].E1.h !== 'nombre_compania'  ||
         typeof workbook.Sheets[firstSheet].F1.h == 'undefined' ||
         workbook.Sheets[firstSheet].F1.h !== 'fecha_retiro'  ||
         typeof workbook.Sheets[firstSheet].G1.h == 'undefined' ||
         workbook.Sheets[firstSheet].G1.h !== 'nombre_tipo_retiro'  ||
         typeof workbook.Sheets[firstSheet].H1.h == 'undefined' ||
         workbook.Sheets[firstSheet].H1.h !== 'enviar_encuesta') {
            swal.fire({
                type: 'error',
                title: 'Error',
                text: 'Por favor, corrija los encabezados de la plantilla',
                footer: '',
                confirmButtonText:
                '<i class="fa fa-check"></i> OK!',
            });
        }else{
            var excelRows = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[firstSheet]);
            var table = $("#tableRetirosMasivos tbody");
            var resultado = [];
            for(a=0; a<excelRows.length; a++){
                var celda1 = excelRows[a].cedula;
                var celda2 = excelRows[a].nombre;
                var celda3 = excelRows[a].email;
                var celda4 = excelRows[a].telefono;
                var celda5 = excelRows[a].nombre_compania;
                var celda6 = excelRows[a].fecha_retiro;
                var celda7 = excelRows[a].nombre_tipo_retiro;
                var celda8 = excelRows[a].enviar_encuesta;
                cedula = celda1;
                nombre = celda2;
                email = celda3;
                telefono = celda4;
                nombre_compania = celda5;
                fecha_retiro = celda6;
                nombre_tipo_retiro = celda7;
                enviar_encuesta = celda8;
                resultado.push({
                    cedula:cedula,
                    nombre:nombre,
                    email:email,
                    telefono:telefono,
                    nombre_compania:nombre_compania,
                    fecha_retiro:fecha_retiro,
                    nombre_tipo_retiro:nombre_tipo_retiro,
                    enviar_encuesta:enviar_encuesta,
                })
                $('#ids').val(JSON.stringify(resultado));
            }
            $.ajax({
                url: baseUrl+"/encuestasretiro/validarListado",
                method: "GET",
                dataType: "json",
                cache: false,
                data:{ids: $('#ids').val() } ,
                success:function(response, data){
                    console.log(response)
                    if (response == 'ok') {
                        for (var i = 0; i < excelRows.length; i++) {
                            var row = $(table[0].insertRow(-1));
                            var cell = $("<td />");

                            cell.html(excelRows[i].cedula);
                            row.append(cell);

                            cell = $("<td />");
                            cell.html(excelRows[i].nombre);
                            row.append(cell);

                            cell = $("<td />");
                            cell.html(excelRows[i].email);
                            row.append(cell);

                            cell = $("<td />");
                            cell.html(excelRows[i].telefono);
                            row.append(cell);

                            cell = $("<td />");
                            cell.html(excelRows[i].nombre_compania);
                            row.append(cell);

                            cell = $("<td />");
                            d = new Date(excelRows[i].fecha_retiro).getDate();
                            m = new Date(excelRows[i].fecha_retiro).getMonth()+1;
                            a = new Date(excelRows[i].fecha_retiro).getFullYear();
                            f =d+'/'+m+'/'+a;
                            cell.html(f);
                            row.append(cell);

                            cell = $("<td />");
                            cell.html(excelRows[i].nombre_tipo_retiro);
                            row.append(cell);

                            cell = $("<td />");
                            cell.html(excelRows[i].enviar_encuesta);
                            row.append(cell);

                            cell = $("<td />");
                            cell.html($("<div class='btn-group'><button type='button' class='eliminarRegistro btn btn-danger'><i class='fa fa-trash'></i></button></div>"));
                            row.append(cell);
                        }
                        var dvExcel = $("#table-responsive");
                        dvExcel.append(table);
                        var filas = $('#tableRetirosMasivos').find("tr");
                    }else if (response == 'El archivo tiene campos vacíos'){
                        swal.fire({
                            type: 'error',
                            title: 'Error',
                            html: 'El archivo tiene campos vacíos',
                            footer: '',
                            confirmButtonText:
                            '<i class="fa fa-check"></i> OK!',
                        });
                        $('#ids').val('');
                    }else{
                        var lista = "<ul>";
                        response.forEach((item, index)=>{
                            lista += "<li>" + item + "</li>";
                        });
                        lista += "</ul>";
                        swal.fire({
                            type: 'error',
                            title: 'Error',
                            html: lista,
                            footer: '',
                            confirmButtonText:
                            '<i class="fa fa-check"></i> OK!',
                        });
                        $('#ids').val('');
                    }
                },errors:function(errors){
                    alert('El archivo tiene demasiados errores');
                }
            });
        }
    };

    var data_table_cargue_masivo = [];
    $(document).on('click', '.eliminarRegistro', function(e){
        if (e.isDefaultPrevented()) {
        }else{
            e.preventDefault();
            var index = $(this).closest("tr").index()
            data_table_cargue_masivo.splice(index, 1);
            $(this).closest("tr").remove();
        }
    });

    $('#form_masivo').on('submit', function (e) {
        $('#ids').val('');
        if (e.isDefaultPrevented()) {
        }else{
            e.preventDefault();
            var data_table_masivos = [];
            var filas = $("#tableRetirosMasivos").find("tr");
            for(i=1; i<filas.length; i++){
                var celdas = $(filas[i]).find("td");
                cedula = $(celdas[0]).text();
                nombre = $(celdas[1]).text();
                email = $(celdas[2]).text();
                telefono = $(celdas[3]).text();
                nombre_compania = $(celdas[4]).text();
                fecha_retiro = $(celdas[5]).text();
                nombre_tipo_retiro = $(celdas[6]).text();
                enviar_encuesta = $(celdas[7]).text();
                data_table_masivos.push({
                    cedula:cedula,
                    nombre:nombre,
                    email:email,
                    telefono:telefono,
                    nombre_compania:nombre_compania,
                    fecha_retiro:fecha_retiro,
                    nombre_tipo_retiro:nombre_tipo_retiro,
                    enviar_encuesta:enviar_encuesta,
                })
            }
            if (data_table_masivos.length > 0){
                $("#ids").val(JSON.stringify(data_table_masivos));
                var urlA = baseUrl + "/encuestasretiro/cargueMasivo";
                jQuery.ajax({
                    url: urlA,
                    method: 'POST',
                    data: $('#form_masivo').serialize(),
                    beforeSend: function() {
                    showPreload();
                    $('#subirListado').attr('hidden', true);
                        $('#procesando').removeAttr('hidden',true);
                    },
                    success: function(result){
                    hiddenPreload();
                    $('#subirListado').attr('hidden', false);
                    $('#procesando').attr('hidden',true);
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
                            title: '<strong>La carga ha sido exitosa</strong>',
                            type: 'success',
                            html: 'Gracias.',
                            showCloseButton: true,
                            focusConfirm: false,
                            confirmButtonText:
                            '<i class="fa fa-check"></i> Aceptar!',
                        });
                        window.location.assign(baseUrl + "/encuestasretiro")
                    },
                    error: function(result){
                    hiddenPreload();
                    $('#subirListado').attr('hidden', false);
                    $('#procesando').attr('hidden',true);
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

            }else{
                swal.fire({
                    type: 'error',
                    title: 'Error',
                    text: 'Listado vacío, por favor seleccione un archivo y luego de clic en Validar.',
                    footer: '',
                    confirmButtonText:
                    '<i class="fa fa-check"></i> Aceptar!',
                });
            }
        }
    });

});
