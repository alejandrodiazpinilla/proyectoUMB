$(document).ready(function () {

  $("#customer_id,#watchman_id").select2({
    theme: 'bootstrap',
    language: {
      noResults: function () { return "No hay resultados"; },
      searching: function () { return "Buscando.."; }
    },
    closeOnSelect: true,
    placeholder: "Seleccione..."
  });

  $('#customer_id').on('change', function (e) {
    var validar = $(this).val();
    if (validar.length > 0) {
      $.ajax({
        type: "GET",
        url: baseUrl + '/users/searchWatchman/' + $(this).val(),
        dataType: 'json',
        success: function (response) {
          guarda = '<option value="">Seleccione...<option>';
          response.forEach((item) => {
            guarda += `
                  <option value="${item.id}">${item.name}<option>
                  `
          })
          $('#watchman_id').html(guarda);
        }
      });
    }
  });

  $(document).on('click', '.edit-modal', function () {
    // mostrar info principal de la inspeccion de ruta
    $('#lblFechaI').html($(this).data('fechai'))
    $('#lblFechaF').html($(this).data('fechaf'))
    $('#lblCliente').html($(this).data('cliente'))
    $('#lblUsuario').html($(this).data('usuario'))
    $('#id_cliente').val($(this).data('customer_id'))
    $('#id').val($(this).data('id'))
  
    // mostrar info de la minuta
    $('#lblVisitantes').html($(this).data('visitantes'))
    $('#lblCorrespondencia').html($(this).data('correspondencia'))
    $('#lblPuesto').html($(this).data('puesto'))
    $('#lblParqueadero').html($(this).data('parqueaderos'))
    
    $('#lblTema').html($(this).data('tema'))
    $('#lblDescripcion').html($(this).data('descripcion_revi'))
    var pdf = $(this).data('file_revi');
    if(pdf == null){
    $('.btnDescargarPDF').attr('data-archivo_revi','')
    $('.btnEliminarPDF').attr('data-id','')
    }else{
    $('.btnDescargarPDF').attr('data-archivo_revi',$(this).data('archivo_revi'))
    $('.btnEliminarPDF').attr('data-id',$(this).data('id'))
    }
    // mostrar imagen 1
    var imagen1 = $(this).data('imagen1');
    if (imagen1 != null){
        var ruta1 = baseUrl+'/image/inspeccionRuta/'+imagen1;
    }else{
        var ruta1 = '';
    }
    $("#lblImage1").attr('src',ruta1);

    // mostrar imagen 2
    var imagen2 = $(this).data('imagen2');
    if (imagen2 != null){
        var ruta2 = baseUrl+'/image/inspeccionRuta/'+imagen2;
    }else{
        var ruta2 = '';
    }
    $("#lblImage2").attr('src',ruta2);


    $.ajax({
      type: "GET",
      url: baseUrl + '/routeinspection/getPersPreWatchmen/' + $(this).data('id'),
      dataType: 'json',
      success: function (response) {
        // mostrar tabla de información de guardas
        var tablappw = '';
        if(response.tabla_ppw.length>0){
        response.tabla_ppw.forEach((item) => {
          tablappw += `
            <tr>
            <td style="word-wrap: break-word;max-width: 400px;">${item.rel_guarda.name}</td>
            <td style="word-wrap: break-word;max-width: 400px;">${item.identity_card}</td>
            <td style="word-wrap: break-word;max-width: 400px;">${item.cockade}</td>
            <td style="word-wrap: break-word;max-width: 400px;">${item.cap}</td>
            <td style="word-wrap: break-word;max-width: 400px;">${item.personal_presentation}</td>
            </tr>
            `
            $('.divRevi').attr('hidden',false);
          $('#tablePresGuarda tbody').html(tablappw);
        });
      }else{
        $('#tablePresGuarda tbody').html('');
            $('.divRevi').attr('hidden',true);
      }
        // mostrar tabla de imagenes de informe REVI
        var tablaImgRevi = '';
        if (response.img_revi.length>0){
          response.img_revi.forEach((item) => {
            tablaImgRevi += `
            <div class="col-md-3 p-3">
            <a href="/image/inspeccionRuta/revi/${item.image}" download>
            <img src="/image/inspeccionRuta/revi/${item.image}"  style="max-width: 50%;">
            </a>
            </div>
              `
            });
            $('.divRevi').attr('hidden',false);
            $('.divImagenes').html(tablaImgRevi);
        }else{
            $('.divRevi').attr('hidden',true);
            $('.divImagenes').html('');
        }
        if(pdf == null){
          $('.cagarPDF').attr('hidden',false);
          $('.descagarPDF').attr('hidden',true);
          $('#registrar').attr('hidden',false);
        }else{
          $('.descagarPDF').attr('hidden',false);
          $('.cagarPDF').attr('hidden',true);
          $('#registrar').attr('hidden',true);
        }
      }
    });
    $('#modalVerInspeccion').modal('show');
  });

  $('#formVerInspeccion').on('submit', function (e) {
    if (e.isDefaultPrevented()) {
    } else {
        e.preventDefault();
        if(document.getElementById("pdf_report_revi").files.length == 0 && $('#check_risk').is(':checked')){
            swal.fire({
                type: 'error',
                title: 'Error',
                html: 'Por favor, Seleccione un archivo en PDF para enviar',
                showCloseButton: true,
                focusConfirm: false,
                confirmButtonText:
                    '<i class="fa fa-check"></i> Aceptar!',
            });
            return false;
        }
        var urlA = baseUrl + "/inspeccionRuta/guardarPdfRevi";
        var formData = new FormData(this);
        //adjuntar pdf
        $('#pdf_report_revi')[0].files[0];
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
                if (result == 1) {
                    swal.fire({
                        title: '<strong>Exitoso!</strong>',
                        type: 'success',
                        html: 'Registro almacenado exitosamente.',
                        showCloseButton: true,
                        focusConfirm: false,
                        confirmButtonText:
                            '<i class="fa fa-check"></i> Aceptar!',
                    });
                    window.location.assign(baseUrl + "/routeinspection")
                } else {
                    swal.fire({
                        title: '<strong>Error al Guardar</strong>',
                        type: 'error',
                        html:result,
                        confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
                    });
                }
            },
            error: function (result) {
                hiddenPreload();
                swal.fire({
                    type: 'error',
                    title: 'Error',
                    html: JSON.stringify(result),
                    showCloseButton: true,
                    focusConfirm: false,
                    confirmButtonText:
                        '<i class="fa fa-check"></i> OK!',
                });
            }
        });
    }
  });

  $(document).on('click', '.btnDescargarPDF', function () {
    var url = $(this).data('archivo_revi')
    window.open(url, '_blank');
  });

  $(document).on('click', '.btnEliminarPDF', function() {
    var id = $(this).data('id');
    console.log(id)
    swal.fire({
        title: "¿Está seguro de eliminar este archivo? ",
        text: "",
        type: "warning",
        showCancelButton: !0,
        confirmButtonText: 'Eliminar!'
    }).then(function(e) {
        if(e.value){
          showPreload();
          var urlA = baseUrl + "/inspeccionRuta/eliminarPdfRevi/" + id;
            jQuery.ajax({
                url: urlA,
                type: 'POST',
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function(result){
                  hiddenPreload();
                  if(result == 0){
                        swal.fire({
                            type: 'error',
                            title: 'Error',
                            text: 'Ocurrio un problema al eliminar el archivo',
                            html: result,
                            confirmButtonText:
                            '<i class="fa fa-check"></i> OK!',
                        });
                    }else{
                        swal.fire({
                            title: '<strong>Archivo eliminado correctamente</strong>',
                            type: 'success',
                            html: '',
                            showCloseButton: true,
                            focusConfirm: false,
                            confirmButtonText:
                            '<i class="fa fa-check"></i> OK!',
                        });
                    }
                },
                error: function(result){
                  hiddenPreload();
                  swal.fire({
                        type: 'error',
                        title: 'Error',
                        text: 'Ocurrio un problema al eliminar el archivo',
                        html: result,
                        confirmButtonText:
                        '<i class="fa fa-check"></i> OK!',
                    });
                }
            });
        }
    });
});


});

$("#FotoUs").click(function () {
  $('#FotoUs').attr('src', "");
  $("#foto_usuario").val("");
  $("#videoUs").show();
  $("#btnTomarFoto").show();
});

const constraints = {
  video: true
};
const button = document.querySelector('#btnTomarFoto');
const img = document.querySelector('#FotoUs');
const video = document.querySelector('#videoUs');
const canvas = document.createElement('canvas');

function handleSuccess(stream) {
  video.srcObject = stream;
  $("#videoUs").attr('hidden', false);
}

function handleError(error) {
  swal.fire({
    title: '<strong>Permiso denegado</strong>',
    type: 'error',
    html: 'Al parecer no concedió el permiso para acceder a la cámara. Por favor, actualice la página e intente nuevamente.',
    confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
  });
  $("#btnIniciar").hide();
  $(".collapse").removeClass('show');
  $("#tab1,#tab2,#tab3,#tab4,#tab5").css('pointer-events', 'none');
}
button.onclick = video.onclick = function () {
  canvas.width = video.videoWidth;
  canvas.height = video.videoHeight;
  canvas.getContext('2d').drawImage(video, 0, 0);
  img.src = canvas.toDataURL('image/png');
  var info = canvas.toDataURL('image/png');
  info = info.split(",");
  $("#foto_usuario").val(info[1]);

  var urlA = baseUrl + "/routeinspection";
  jQuery.ajax({
    url: urlA,
    method: 'POST',
    data: $('#form_crear').serialize(),
    success: function (result) {
      $('#id').val(result)
    },
    error: function (result) {
      swal.fire({
        type: 'error',
        title: 'Error',
        html: result,
        showCloseButton: true,
        focusConfirm: false,
        confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
      });
    }
  });

  $("#videoUs").hide();
  $("#btnTomarFoto").hide();
  $("#tab2").trigger('click');
  $("#tab1").css('pointer-events', 'none');
  $("#tab2,#tab3,#tab4,#tab5").css('pointer-events', 'auto');
};

$("#btnIniciar").click(function () {

  if ($("#customer_id").val() == '') {
    swal.fire({
      title: '<strong>Campo vacío</strong>',
      type: 'info',
      html: 'Por favor, seleccione un cliente.',
      confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
    });
  } else {

    try {
      navigator.mediaDevices.getUserMedia(constraints).
        then(handleSuccess).catch(handleError);
      $("#btnTomarFoto").attr('hidden', false);
      $(this).hide();
    } catch (error) {
      swal.fire({
        title: '<strong>Permiso denegado</strong>',
        type: 'error',
        html: 'Al parecer no concedió el permiso para acceder a la cámara. Por favor, actualice la página e intente nuevamente.',
        confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
      });
      $("#btnIniciar").hide();
      $(".collapse").removeClass('show');
      $("#tab1,#tab2,#tab3,#tab4,#tab5").css('pointer-events', 'none');
    }
  }
});

$("#FotoUs2").click(function () {
  $('#FotoUs2').attr('src', "");
  $("#foto_usuario2").val("");
  $("#videoUs2").show();
  $("#btnTomarFoto2").show();
});

const constraints2 = {
  video: true
};
const button2 = document.querySelector('#btnTomarFoto2');
const img2 = document.querySelector('#FotoUs2');
const video2 = document.querySelector('#videoUs2');
const canvas2 = document.createElement('canvas');

function handleSuccess2(stream) {
  video2.srcObject = stream;
  $("#videoUs2").attr('hidden', false);
}

function handleError2(error) {
  swal.fire({
    title: '<strong>Permiso denegado</strong>',
    type: 'error',
    html: 'Al parecer no concedió el permiso para acceder a la cámara. Por favor, actualice la página e intente nuevamente.',
    confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
  });
  $("#btnIniciar2").hide();
  $(".collapse").removeClass('show');
  $("#tab1,#tab2,#tab3,#tab4,#tab5").css('pointer-events', 'none');
}
button2.onclick = video2.onclick = function () {
  canvas2.width = video2.videoWidth;
  canvas2.height = video2.videoHeight;
  canvas2.getContext('2d').drawImage(video, 0, 0);
  img2.src = canvas2.toDataURL('image/png');
  var info2 = canvas2.toDataURL('image/png');
  info2 = info2.split(",");
  $("#foto_usuario2").val(info2[1]);
  $("#videoUs2").hide();
  $("#btnTomarFoto2").hide();
  $("#agregarInforme").attr('hidden', false);
};

$("#btnIniciar2").click(function () {
  $("#btnTomarFoto2").attr('hidden', false);
  navigator.mediaDevices.getUserMedia(constraints2).
    then(handleSuccess2).catch(handleError2);
  $(this).hide();
});

$("#agregarInforme").click(function () {
  var tablaRevi = [];
  var filasRevi = $("#tableRevi").find("tr");
  var tema = $('#nombre_revi').val();
  var descripcionRevi = $('#descripcion_revi').val();
  if ((filasRevi.length < 2 && (tema.length > 0 || descripcionRevi.length > 0)) || (filasRevi.length > 1 && (tema.length < 1 || descripcionRevi.length < 1))) {
    swal.fire({
      title: '<strong>Informe Incompleto</strong>',
      type: 'error',
      html: 'Por favor, complete el informe REVI',
      confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
    });
    return false;
  }
  var tablaGuardas = [];
  var filasGuardas = $("#personal_presentation_table").find("tr");
  if (filasGuardas.length < 2) {
    swal.fire({
      title: '<strong>Evaluación de guardas incompleta</strong>',
      type: 'error',
      html: 'Por favor, complete el informe de los guardas',
      confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
    });
    return false;
  }

  if ((!$('#checkVisitantes').is(':checked') && $('#visitors').val() == '') || 
  (!$('#checkCorrespondencia').is(':checked') && $('#correspondence').val() == '') || 
  (!$('#checkPuesto').is(':checked') && $('#workplace').val() == '') || 
  (!$('#checkParqueadero').is(':checked') && $('#parking').val() == '')){

    swal.fire({
      title: '<strong>Validación minuta incompleta</strong>',
      type: 'error',
      html: 'Por favor, complete la sección de validación de minuta',
      confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
    });
    return false;
  }

  for (i = 1; i < filasRevi.length; i++) {
    var celdas = $(filasRevi[i]).find("td");
    imagen = $(celdas[0]).find('img').attr('src');
    tablaRevi.push({
      imagen
    })
  }
  $("#jsonTableRevi").val(JSON.stringify(tablaRevi));

  for (i = 1; i < filasGuardas.length; i++) {
    var celdas = $(filasGuardas[i]).find("td");
    guarda_id = $(celdas[0]).text();
    carnet = $(celdas[2]).text();
    escarapela = $(celdas[3]).text();
    gorra = $(celdas[4]).text();
    presentacion = $(celdas[5]).text();
    tablaGuardas.push({
      guarda_id,
      carnet,
      escarapela,
      gorra,
      presentacion
    })
  }
  $("#jsonTableGuarda").val(JSON.stringify(tablaGuardas));


  var urlA = baseUrl + "/routeinspection/" + $('#id').val();
  jQuery.ajax({
    url: urlA,
    type: 'PUT',
    data: $('#formActualizar').serialize(),
    beforeSend: function () {
      showPreload();
    },
    success: function (result) {
      hiddenPreload();
      if (result == 1) {
        swal.fire({
          title: '<strong>Exitoso!</strong>',
          type: 'success',
          html: 'Registro creado correctamente.',
          showCloseButton: true,
          focusConfirm: false,
          confirmButtonText:
            '<i class="fa fa-check"></i> Aceptar!',
        });
        window.location.assign(baseUrl + "/routeinspection")
      } else {
        swal.fire({
          title: '<strong>Error al Guardar</strong>',
          type: 'error',
          html: 'Ocurrió un error al guardar, por favor intente nuevamente.',
          footer: result,
          confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
        });
      }
    },
    error: function (result) {
      hiddenPreload();
      swal.fire({
        title: '<strong>Error al Guardar</strong>',
        type: 'error',
        html: result,
        confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
      });
    }
  });
});


// *******************AGREGAR REGISTRO PRESENTACIÓN PERSONAL GUARDA****************************
var tabla = [];
$("#agregarGuarda").on('click', function (e) {
  e.preventDefault();

  var filas = $("#personal_presentation_table").find("tr");
  for (i = 1; i < filas.length; i++) {
    var celdas = $(filas[i]).find("td");
    var guarda = $(celdas[0]).text() == $('#watchman_id option:selected').text();
    if (guarda == true) {

      swal.fire({
        title: '<strong>Guarda en lista</strong>',
        type: 'info',
        html: 'Evaluación de guarda ya se encuentra en lista',
        confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
      });
      return false;
    }
  }

  var guarda = $('#watchman_id').val();
  var carnet = $('#identity_card').val();
  var escarapela = $('#cockade').val();
  var gorra = $('#cap').val();
  var presentacion = $('#personal_presentation').val();
  if (guarda == ''
    || (!$('#checkCarnet').is(':checked') && carnet == '')
    || (!$('#checkEscarapela').is(':checked') && escarapela == '')
    || (!$('#checkGorra').is(':checked') && gorra == '')
    || (!$('#checkPpersonal').is(':checked') && presentacion == '')
  ) {
    if (guarda == '') {
      text = 'Guarda';
    } else if (!$('#checkCarnet').is(':checked') && carnet == '') {
      text = 'Descripción de Carnet';
    } else if (!$('#checkEscarapela').is(':checked') && escarapela == '') {
      text = 'Descripción de Escarapela';
    } else if (!$('#checkGorra').is(':checked') && gorra == '') {
      text = 'Descripción de Gorra o Quepis';
    } else if (!$('#checkPpersonal').is(':checked') && presentacion == '') {
      text = 'Descripción de Presentación Personal';
    }
    swal.fire({
      type: 'error',
      title: 'Error',
      html: text + ' no puede ir vacío',
      footer: '',
      confirmButtonText:
        '<i class="fa fa-check"></i> Aceptar!',
    });
    return false;
  } else {
    var guarda_id = $('#watchman_id').val();
    var nombre_guarda = $('#watchman_id option:selected').text();
    var fila =
      `<tr>
        <td style="word-wrap: break-word;max-width: 400px;">${guarda_id}</td>
        <td style="word-wrap: break-word;max-width: 400px;">${nombre_guarda}</td>
        <td style="word-wrap: break-word;max-width: 400px;">${carnet ? carnet : 'Sin Novedad'}</td>
        <td style="word-wrap: break-word;max-width: 400px;">${escarapela ? escarapela : 'Sin Novedad'}</td>
        <td style="word-wrap: break-word;max-width: 400px;">${gorra ? gorra : 'Sin Novedad'}</td>
        <td style="word-wrap: break-word;max-width: 400px;">${presentacion ? presentacion : 'Sin Novedad'}</td>
        <td>
        <button type='button' class='eliminarFila btn btn-danger btn-xs'>
        <i class='icons cui-trash'></i>
        </button> 
        </td>
      </tr>`
    var btn = document.createElement("TR");
    btn.innerHTML = fila;

    document.getElementById("body_guardas").appendChild(btn);
    $('#watchman_id').val(null).trigger('change');
    $('#identity_card').val('');
    $('#cockade').val('');
    $('#cap').val('');
    $('#personal_presentation').val('');
    return true;
  }
});

//*** AGREGAR INFORME REVI ***

$("#agregarRevi").on('click', function (e) {
  e.preventDefault();
  var nombre = $('#nombre_revi').val();
  var desc = $('#descripcion_revi').val();
  var img = $('#imagen_revi')[0].files;
  if (nombre == '' || desc == '' || img.length < 1) {
    if (nombre == '') {
      text = 'Tema a Evaluar'
    } else if (img.length < 1) {
      text = 'Imagen(es)'
    } else if (desc == '') {
      text = 'Descripción'
    }
    swal.fire({
      type: 'error',
      title: 'Error',
      text: text + ' no puede ir vacío',
      footer: '',
      confirmButtonText:
        '<i class="fa fa-check"></i> Aceptar!',
    });
    return false;
  } else {
    Object.keys(img).forEach(function (key) {
      agregarImagenes(img[key]);
    });
    return true;
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
        <img class="img-responsive mx-auto" width="150" height="150" src="${dataImg}"/>
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
    document.getElementById("bodyRevi").appendChild(btn);
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
    tabla.splice(index, 1);
    $(this).closest("tr").remove();
  }
});