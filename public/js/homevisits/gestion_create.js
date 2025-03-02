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

    $(".select2-single").select2({
        theme: 'bootstrap',
        language: {
            noResults: function () { return "No hay resultados"; },
            searching: function () { return "Buscando.."; }
        },
        placeholder: "Seleccione..."
    });

    $('#fecha_nacimiento').datepicker({
        format: "dd-mm-yyyy",
        startDate: '-80y',
        endDate: '-18y',
        language: 'es',
        autoclose: true,
        todayHighlight: !0
    });

    $('#form_crear').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var tabla = [];
            var filas = $("#tableInfoFamiliar").find("tr");
            for (i = 1; i < filas.length; i++) {
                var celdas = $(filas[i]).find("td");
                nombres = $(celdas[0]).text();
                apellidos = $(celdas[1]).text();
                parentesco_familiar = $(celdas[2]).text();
                cual_parentesco = $(celdas[3]).text();
                nivel_educativo = $(celdas[4]).text();
                situacion_laboral_fam = $(celdas[5]).text();
                tabla.push({
                    nombres,
                    apellidos,
                    parentesco_familiar,
                    cual_parentesco,
                    nivel_educativo,
                    situacion_laboral_fam
                })
            }
            if (!$('#checkViveSolo').is(':checked') && tabla.length == 0) {
                Swal.fire('', 'Tabla vacía. Por favor agregue mínimo un registro', 'info');
                return false;
            }
            $("#jsonTable").val(JSON.stringify(tabla));

            var tablaImages = [];
            var filasImages = $("#tableImages").find("tr");
              if (filasImages.length < 2) {
                Swal.fire('Visita Sin Evidencias Fotográficas', 'Por favor, seleccione 1 o mas imágenes como evidencias del informe', 'info');
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
            var urlA = baseUrl + "/homevisits";
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
                        swal.fire('Campo no admitido', result.msg, 'error');
                    } else if (result.status == 1) {
                        swal.fire('Registro creado correctamente', '', 'success');
                        location.reload();
                    } else {
                        swal.fire('Error al Guardar', result.msg, 'error');
                    }
                },
                error: function (result) {
                    hiddenPreload();
                    swal.fire('Error al Guardar esto', result.msg, 'error');
                }
            });
        }
    });

    $('#checkViveSolo').on('change', function (e) {
        if ($(this).is(':checked')) {
            $('.hiddenFam').attr('hidden',true);
        }else{
            $('.hiddenFam').attr('hidden',false);
        }
    });

    $(document).on('change', '#cedula', function (e) {
        var value = $(this).val();
        if (value.length == 0) {
        } else {
            $.ajax({
                url: baseUrl + "/terminationstaff/consultarTrabajador/" + $(this).val(),
                method: "GET",
                dataType: "json",
                cache: false,
            }).done(function (data) {
                if (data.status == 0) {
                    Swal.fire('', 'Este número de identificación aún no está asociado a un empleado activo.', 'info');
                    $("#nombre,#apellido,#fecha_nacimiento,#edad,#estado_civil,#cargo,#telefono ,#direccion_residencia").val('');
                    $("#estado_civil,#municipo_residencia").val(null).trigger('change');
                    $("#lblNombreAsp").html('Nombre');
                    $("#lblDocAsp").html('Documento');
                } else {
                    if (data.trabajador != null) {
                        $("#lblNombreAsp").html(data.trabajador.name+' '+data.trabajador.surname);
                        $("#lblDocAsp").html(value);
                        $("#nombre").val(data.trabajador.name);
                        $("#apellido").val(data.trabajador.surname);
                        $("#tipo_doc").val(data.trabajador.document_type_id).trigger('change');
                        let d = new Date(data.trabajador.date_of_birth);
                        let fecha = d.getDate() + "-" + ((d.getMonth() + 1) < 10 ? '0' + (d.getMonth() + 1) : (d.getMonth() + 1)) + "-" + d.getFullYear()
                        $("#fecha_nacimiento").val(fecha);
                        $("#edad").val(calcularEdad(fecha));
                        $("#estado_civil").val(data.trabajador.marital_status_id).trigger('change');
                        $("#cargo").val(data.trabajador?.rel_contratos[0]?.position);
                        $("#telefono").val(data.trabajador.telephone);
                        $("#direccion_residencia").val(data.trabajador.address);
                        $("#municipo_residencia").val(data.trabajador.home_city_id).trigger('change');
                        setTimeout(() => {
                            $('#localidad_residencia').val(data.trabajador.locality_id).trigger('change');
                        }, "500")
                        setTimeout(() => {
                            $('#barrio_residencia').val(data.trabajador.neighborhood_id).trigger('change');
                        }, "900")
                    }
                }
            });
        }
    });

    function calcularEdad(fecha_nacimiento) {
        var birthday_arr = fecha_nacimiento.split("-");
        var birthday_date = new Date(birthday_arr[2], birthday_arr[1] - 1, birthday_arr[0]);
        var ageDifMs = Date.now() - birthday_date.getTime();
        var ageDate = new Date(ageDifMs);
        return Math.abs(ageDate.getUTCFullYear() - 1970);
    }

    $(document).on('change', '#fecha_nacimiento', function (e) {
        let edad = calcularEdad($(this).val());
        $("#edad").val(edad);
    });

    $('#municipo_residencia').on('change', function (e) {
        var value = $(this).val();
        if (value.length == 0) {
            $('#localidad_residencia').attr('disabled', true).html('<option value="" disabled selected>Seleccione...<option>');
            $('#barrio_residencia').attr('disabled', true).html('<option value="" disabled selected>Seleccione...<option>');
        } else {
            $.ajax({
                type: "GET",
                url: baseUrl + '/employees/search_locality/' + $(this).val(),
                dataType: 'json',
                success: function (response) {
                    $('#localidad_residencia').attr('disabled', true).html('<option value="" disabled selected>Seleccione...<option>');
                    $('#barrio_residencia').attr('disabled', true).html('<option value="" disabled selected>Seleccione...<option>');
                    if (response.localidades.length != 0) {
                        var loc = '';
                        response.localidades.forEach((item, index) => {
                            loc += `<option value="${item.id}">${item.name}<option>`
                        })
                        $('#localidad_residencia').attr('disabled', false).html('<option value="" disabled selected>Seleccione...<option>' + loc);
                    }
                },
                error: function (response) {
                }
            });
        }
    });

    $('#localidad_residencia').on('change', function (e) {
        $.ajax({
            type: "GET",
            url: baseUrl + '/employees/search_neighborhoods/' + $(this).val(),
            dataType: 'json',
            success: function (response) {
                $('#barrio_residencia').attr('disabled', true).html('<option value="" disabled selected>Seleccione...<option>');
                if (response.barrios.length != 0) {
                    var loc = '';
                    response.barrios.forEach((item, index) => {
                        loc += `<option value="${item.id}">${item.name}<option>`
                    })
                    $('#barrio_residencia').attr('disabled', false).html('<option value="" disabled selected>Seleccione...<option>' + loc);
                }
            },
            error: function (response) {
            }
        });
    });
    // $('#nivel_educativo option:selected').text()
    var tablaF = [];
    $('#agregarInfoFamiliar').on('click', function () {
        let nombre = $('#nombres').val();
        let apellido = $('#apellidos').val();
        let parentesco = $('[name=parentesco_familiar]:checked').val();
        let cualpar = $('#cual_parentesco').val();
        let lvlEdu = $('#nivel_educativo option:selected').text();
        let sitLab = $('#situacion_laboral_fam').val();

        var lista = "<ul>";
        if (nombre == '' || nombre == null)
            lista += "<li>Nombres</li>";
        if  (apellido == '' || apellido == null)
            lista += "<li>Apellidos</li>";
        if (parentesco == '' || parentesco == null)
            lista += "<li>Parentesco</li>";
        if (cualpar == '' || cualpar == null)
            lista += "<li>¿Cuál?</li>";
        if (lvlEdu == '' || lvlEdu == null || lvlEdu == 'Seleccione...')
            lista += "<li>Nivel Educativo</li>";
        if (sitLab == '' || sitLab == null)
            lista += "<li>Situación Laboral</li>";

        lista += "</ul>";

        if (lista.length > 11) {
            Swal.fire('Información Incompleta', '<strong>Los siguientes campos no pueden ir vacíos:</strong> <br><br>' + lista, 'error')
            return false;
        }

        let filas = $("#tableInfoFamiliar").find("tr");
        for (i = 0; i < filas.length; i++) {
            let celdas = $(filas[i]).find("td");
            if (
                ($(celdas[0]).text() == nombre
                    && $(celdas[1]).text() == apellido
                    && $(celdas[2]).text() == parentesco
                    && $(celdas[3]).text() == cualpar
                    && $(celdas[4]).text() == lvlEdu
                    && $(celdas[5]).text() == sitLab
                )
            ) {
                Swal.fire("Registro ya en tabla", "Éste registro ya se encuentra a la tabla", "warning");
                return false;
            }
        }
        /* Actualizar Tabla */
        let tbody = '';

        /* Cuerpo de Tabla */
        tbody += `<tr>
                <td>${nombre}</td>
                <td>${apellido}</td>
                <td>${parentesco}</td>
                <td>${cualpar}</td>
                <td>${lvlEdu}</td>
                <td>${sitLab}</td>
                <td>
                    <button type="button" class="btn btn-danger btnEliminar" title="Eliminar">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
                </tr>`;


        /* Agregar Items a la Tabla */
        $('#bodyInfoFamiliar').append(tbody);
        /* Limpiar campos y fijar cursor en compromiso */
        $('#nombres').val(null).focus();
        $('#apellidos').val(null);
        $('[name=parentesco_familiar]').prop('checked', false);
        $('#cual_parentesco').val(null);
        $('#nivel_educativo').val(null).trigger('change');
        $('#situacion_laboral_fam').val(null);

    });

    $(document).on('click', '.btnEliminar', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var index = $(this).closest("tr").index()
            tablaF.splice(index, 1);
            $(this).closest("tr").remove();
        }
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
            <button type='button' class='btnEliminar btn btn-danger btn-xs'>
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
});