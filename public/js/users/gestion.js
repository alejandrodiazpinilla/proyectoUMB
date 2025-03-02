function viewPass() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function clienteActivo(tipo) {

  if (tipo == 'checkCliente') {
    var x = $("#customer_id").attr('disabled');
    if (x == 'disabled') {
      $("#customer_id").attr('disabled', false).attr('required', true);
    } else {
      $("#customer_id").attr('disabled', true).attr('required', false);
    }
  }

  if (tipo == 'checkClienteEdit') {
    var y = $("#customer_id_edit").attr('disabled');
    if (y == 'disabled') {
      $("#customer_id_edit").attr('disabled', false).attr('required', true);
    } else {
      $("#customer_id_edit").attr('disabled', true).attr('required', false);
    }
  }

}

$(document).ready(function () {

  $('#password').val('');
  $('#rol option').remove();
  $('#area option').remove();

  $('#modal_editar').on('shown.bs.modal', function () {
    $("#name_act").focus();
  });

  $('#modal_crear').on('shown.bs.modal', function () {
    $("#name").focus();
    $("#tablaRoles tbody").empty();
  });

  $('#fecha_nacimiento').daterangepicker({
    opens: 'right',
    drops: 'down',
    singleDatePicker: true,
    showDropdowns: true,
    minDate: moment().subtract(40, 'years'),
    maxDate: moment().add(0, 'days'),
    locale: {
      format: 'YYYY-MM-DD',
      firstDay: 1
    }
  }).val('');

  $("#rol, #rol_act, #area, #area_act,#customer_id,#customer_id_edit,#gender,#city").select2({
    theme: 'bootstrap',
    language: {
      noResults: function () { return "No hay resultados"; },
      searching: function () { return "Buscando.."; }
    },
    placeholder: "Seleccione..."
  });

  $(document).on('click', '.edit-modal', function () {

    $('#id_act').val($(this).data('id'));
    $('#name_act').val($(this).data('name'));
    $('#email_act').val($(this).data('email'));
    $('#username_act').val($(this).data('username'));
    $('#cargo_act').val($(this).data('cargo'));
    $("#tablaRoles_edit tbody").empty();
    $("#rol_act").empty();
    $("#area_act").empty();
    if ($(this).data('customer_id') != null) {
      $('#checkClienteEdit').attr('checked', true);
      $('#customer_id_edit').val($(this).data('customer_id')).trigger('change').attr('disabled', false);
    } else {
      $('#checkClienteEdit').attr('checked', false);
      $('#customer_id_edit').val(null).trigger('change').attr('disabled', true);
    }
    var nombreArchivo = $(this).data('firma');
    if (nombreArchivo != null) {
      var ruta = baseUrl + '/image/users/firmas/' + nombreArchivo;
    } else {
      var ruta = baseUrl + '/image/users/firmas/tu_firma_aqui.jpg';
    }
    $("#uploadPreview2").attr('src', ruta);

    /***********************************************************************************************************
     *                        CONSULTA DE EMPRESAS, ROLES Y AREAS ASOCIADAS AL USUARIO                         *
     ***********************************************************************************************************/
    $.ajax({
      url: `${baseUrl}/users/areaempresa`,
      cache: false,
      method: "GET",
      dataType: "JSON",
      data: {
        id: $(this).data('id'),
        empresas: $(this).data('empresa')
      },
      success(res) {
        for (let index = 0; index < res.length; index++) {
          let rolId = "", rolName = "";

          res[index].roles.forEach(element => {
            rolId = `${element[0].id}, ${rolId}`;
            rolName = `${element[0].display_name}</br>${rolName}`;
          });

          $("#tablaRoles_edit tbody").append(
            "<tr>" +
            "<td class='align-middle'><input type='hidden' name='empresaTbl_edit[]' value='" + res[index].empresa[0].id + "'>" + res[index].empresa[0].nombre + "</td>" +
            "<td class='align-middle'><input type='hidden' name='areaTbl_edit[]' value='" + res[index].area[0].id + "'>" + res[index].area[0].nombre + "</td>" +
            "<td class='align-middle'><input type='hidden' name='rolesTbl_edit[]s' value='" + rolId + "'>" + rolName + "</td>" +
            "<td class='align-middle'>" +
            "<button type='button' class='btn btn-sm btn-danger delete' data-empresa='" + res[index].empresa[0].id + "' data-area='" + res[index].area[0].id + "' data-roles='" + rolId + "'>" +
            "<i class='icons cui-trash'></i>" +
            "</button>" +
            "</td>"
            + "</tr>"
          )
        }
      }
    })

    /***********************************************************************************************************
     *                        MOSTRAR LOS CLIENTES A LOS QUE HA ESTADO ASOCIADO EL USUARIO                     *
     ***********************************************************************************************************/
    $.ajax({
      url: `${baseUrl}/users/clientes`,
      cache: false,
      method: "GET",
      dataType: "JSON",
      data: {
        id: $(this).data('id'),
      },
      success(res) {
        $('#customers_table').dataTable().fnClearTable();
        $('#customers_table').dataTable().fnDestroy();
        $('#customers_table').DataTable({
          stateSave: true,
          language: {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
              "sFirst":    "Primero",
              "sLast":     "Último",
              "sNext":     "Siguiente",
              "sPrevious": "Anterior"
            },
            "oAria": {
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
          },
          order: [[1, "desc"]],
          destroy: true,
          searching: true,
          data: res,
          responsive: true,
          paging: true,
          columns: [
            { data: "cliente" },
            { data: "fecha_ini" },
            { data: "fecha_fin" }
          ],
          pagingType: "full_numbers"
        });

      }
    })

    $('#modal_editar').modal('show');
  });

  $(document).on('click', '.activarUsuario', function (e) {
    var id = $(this).data('id');
    swal.fire({
      title: "¿Esta seguro de cambiar de estado este usuario? ",
      type: "warning",
      showCancelButton: !0,
      confirmButtonText: "Aceptar"
    }).then(function (e) {
      if (e.value) {
        $.ajax({
          url: baseUrl + '/users/activarUsuario',
          type: 'POST',
          data: { id: id, _token: $('input[name=_token]').val() },
          dataType: 'json',
          success: (json) => {
            swal.fire({
              type: 'success',
              title: 'Realizado',
              html: "",
              showCloseButton: true,
              focusConfirm: false,
              timer: 2000,
              confirmButtonText:
                '<i class="fa fa-check"></i> Aceptar!',
            });
            location.reload();
          },
          error: function (xhr, ajaxOptions, thrownError) {
            swal.fire({
              type: 'error',
              title: 'Error!!, por favor intente nuevamente.',
              html: "",
              showCloseButton: true,
              focusConfirm: false,
              timer: 2000,
              confirmButtonText:
                '<i class="fa fa-check"></i> Aceptar!',
            });
          }
        })
      }
    });
  });

  $('#form_crear').on('submit', function (e) {
    if (e.isDefaultPrevented()) {
    } else {
      e.preventDefault();
      var formData = new FormData();
      var files = $('#firmaUsuario1')[0].files[0];
      $.each($('#form_crear').serializeArray(), function (i, field) {
        formData.append(field.name, field.value);
        formData.append('file', files);
      });
      var urlA = baseUrl + "/users";
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
              html: 'Ya existe un usuario con el mismo username o mismo email, Por favor validar los usuarios existentes.',
              confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
            });
          } else if (result == 2) {
            swal.fire({
              title: '<strong>Exitoso!</strong>',
              type: 'success',
              html: 'El usuario ha sido creado exitosamente.',
              showCloseButton: true,
              focusConfirm: false,
              confirmButtonText:
                '<i class="fa fa-check"></i> Aceptar!',
            });
            location.reload();
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
              '<i class="fa fa-check"></i> Aceptar!',
          });
        }
      });
    }
  });

  $('#form_actualizar').on('submit', function (e) {
    if (e.isDefaultPrevented()) {
    } else {
      e.preventDefault();
      var formData = new FormData(this);
      var files = $('#firmaUsuario2')[0].files[0];
      formData.append('file', files);
      var urlA = baseUrl + "/users/" + $('#id_act').val();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
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
              html: 'Ya existe un usuario con el mismo username o mismo email, Por favor validar los usuarios existentes.',
              confirmButtonText: '<i class="fa fa-check"></i> Aceptar!',
            });
          } else if (result == 2) {
            swal.fire({
              title: '<strong>Exitoso!</strong>',
              type: 'success',
              html: 'El usuario ha sido actualizado exitosamente.',
              showCloseButton: true,
              focusConfirm: false,
              confirmButtonText:
                '<i class="fa fa-check"></i> Aceptar!',
            });
            location.reload();
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
              '<i class="fa fa-check"></i> Aceptar!',
          });
        }
      });
    }
  });

  $('#formActualizarPefil').on('submit', function (e) {
    if (e.isDefaultPrevented()) {
    } else {
      e.preventDefault();

      var nombreUsuario = $('#name_act').val()
      var cargo = $('#cargo_act').val()
      var cedula = $('#identification').val()
      var direccion = $('#address').val()
      var email = $('#email_act').val()
      
      var nombreContacto = $('#contact_name').val()
      var telefonoContacto = $('#contact_phone').val()
      var parentezcoContacto = $('#relationship').val()

      var camisa = $('#shirt').val()
      var pantalon = $('#pant').val()
      var zapatos = $('#shoes').val()

      var lista = "<ul>";

      if(nombreUsuario == '')
        lista += "<li>Nombre Completo</li>";
      if(cargo== '') 
        lista += "<li>Cargo</li>";
      if(cedula== '') 
        lista += "<li>Cédula</li>";
      if(direccion== '') 
        lista += "<li>Dirección</li>";
      if(email== '') 
        lista += "<li>Correo Electrónico</li>";
      if(nombreContacto== '') 
        lista += "<li>Nombre de Contacto</li>";
      if(telefonoContacto== '') 
        lista += "<li>Teléfono de Contacto</li>";
      if(parentezcoContacto== '') 
        lista += "<li>Parentezco</li>";

      // si existe este input el usuario es un guarda
      if($('#shirt').length == 1){
      if(camisa== '') 
        lista += "<li>Camisa/camiseta</li>";
      if(pantalon== '') 
        lista += "<li>Pantalón</li>";
      if(zapatos== '')
        lista += "<li>Botas</li>";
      }

      lista += "</ul>";

      if(lista.length > 11){
        swal.fire({
          type: 'error',
          title: 'Información Incompleta',
          html: '<strong>Los siguientes campos no pueden ir vacíos:</strong> <br><br>' + lista,
          confirmButtonText:
            '<i class="fa fa-check"></i> Aceptar!',
        });
        return false;
      }


      var data_table_hijos = [];
      var filas = $("#tableHijos").find("tr");
      for (i = 1; i < filas.length; i++) {
        var celdas = $(filas[i]).find("td");
        nombre = $(celdas[0]).text();
        fecha = $(celdas[1]).text();
        sexo = $(celdas[2]).text();
        ciudad = $(celdas[3]).text();
        data_table_hijos.push({
          nombre,
          fecha,
          sexo,
          ciudad,
        })
      }
      $("#jsontableSons").val(JSON.stringify(data_table_hijos));
      var formData = new FormData();
      var files = $('#firmaUsuario2')[0].files[0];
      $.each($('#formActualizarPefil').serializeArray(), function (i, field) {
        formData.append(field.name, field.value);
        formData.append('file', files);
      });
      var urlA = baseUrl + "/users/actualizar/" + $('#id_perfil').val();
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
              title: '<strong>El usuario ha sido actualizado</strong>',
              type: 'success',
              html: 'Gracias.',
              showCloseButton: true,
              focusConfirm: false,
              confirmButtonText:
                '<i class="fa fa-check"></i> Aceptar!',
            });
          } else {
            swal.fire({
              type: 'error',
              title: 'Error al Actualizar',
              text: 'A ocurrido un error al guardar, por favor valide que todos los campos señalados con el asterisco de color rojo, se encuentre diligenciados, luego vuelva a intentarlo.',
              footer: '',
              confirmButtonText:
                '<i class="fa fa-check"></i> Aceptar!',
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
              '<i class="fa fa-check"></i> Aceptar!',
          });
        }
      });
    }
  });

  $("#empresa").select2().on("change", function (e) {
    var selected_element = $(e.currentTarget);
    var select_val = selected_element.val();

    if (select_val == '') {
      $('#rol option').remove();
      $('#rol optgroup').remove();
      $('#area option').remove();
      $('#area optgroup').remove();
    } else {
      e.preventDefault();
      $.ajax({
        url: baseUrl + "/users/rolandarea/" + select_val,
        cache: false,
        method: "GET",
        dataType: "json",
        cache: false,
      }).done(function (data) {

        let roles, dataRol = [], differences = [], Allroles = [];
        $('#rol').empty().val("");
        $('#area option').remove();
        $('#area optgroup').remove();
        $("#area").select2({
          theme: 'bootstrap',
          data: data[1]
        });
        data[0].forEach(element => {
          dataRol.push(element.id);
          $('#rol').append(`<option value='${element.id}'>${element.display_name}</option>`);
        });
        $('#tablaRoles tbody tr').each(function () {
          $(this).find('td input').each(function (index) {
            /***
             * RECORRO LA COLUMNA EMPRESA DE MI TABLA
             */
            if (index == 0) {
              if (parseInt($(this).val()) == parseInt(selected_element.val())) {
                /***
                 * SI LA EMPRESA SELECCIONADA YA SE ENCUENTRA EN MI TABLA CONSULTO LA COLUMNA ROL PARA VALIDAR LOS QUE NO HAN SIDO SELECCIONADOS
                 */
                $(this).parent().parent().each(function () {
                  $(this).find('td input').each(function (index) {
                    if (index == 2) {
                      let arrayProvisional = [];
                      roles = Array.from($(this).val().replaceAll(",", ""), x => parseInt(x));
                      /***
                       * CONCATENACION DE ARRAYS
                       */
                      arrayProvisional = Allroles;
                      Allroles = arrayProvisional.concat(roles);
                    }
                  })
                });
                /***
                 * SE VALIDA EL AREA ACTIVA PARA CONTINUAR DESDE ALLI
                 */
                $(this).parent().parent().each(function () {
                  $(this).find('td input').each(function (index) {
                    if (index == 1) {
                      $('#area option').remove();
                      $('#area optgroup').remove();
                      data[1][0].children.forEach(element => {
                        if (element.id == $(this).val()) {
                          $("#area").append(`<option value='${element.id}'>${element.text}</option>`)
                        }
                      });
                    }
                  })
                })
              }
            }
          })
          /***
           * FILTRO LOS ROLES PROVENIENTES DE LA CONSULTA AJAX Y SOLO CARGO LOS NO SELECCIONADOS
           */
          differences = dataRol.filter(x => !Allroles.includes(x));

          $('#rol option').remove();
          data[0].forEach(element => {
            if (differences.find(difference => element.id == difference)) {
              $('#rol').append(`<option value='${element.id}'>${element.display_name}</option>`);
            }
          });
        })
      });
    }
  });

  $("#empresa_act").select2().on("select2:select select2:unselect", function (e) {
    var selected_element_edit = $(e.currentTarget);
    var select_val_edit = selected_element_edit.val();
    if (select_val_edit == '') {
      $('#rol_act option').remove();
      $('#rol_act optgroup').remove();
      $('#area_act option').remove();
      $('#area_act optgroup').remove();
      $("#area_act").select2({
        theme: 'bootstrap',
        language: {
          noResults: function () { return "No hay resultados"; },
          searching: function () { return "Buscando.."; }
        },
        closeOnSelect: false,
        placeholder: "Seleccione..."
      });
    } else {
      e.preventDefault();
      $.ajax({
        url: baseUrl + "/users/rolandarea/" + select_val_edit,
        cache: false,
        method: "GET",
        dataType: "json",
        cache: false,
      }).done(function (data) {

        let roles, dataRol_edit = [], differences = [], Allroles = [];
        $('#rol_act').empty().val("");
        $('#area_act option').remove();
        $('#area_act optgroup').remove();
        $("#area_act").select2({
          theme: 'bootstrap',
          language: {
            noResults: function () { return "No hay resultados"; },
            searching: function () { return "Buscando.."; }
          },
          closeOnSelect: false,
          placeholder: "Seleccione...",
          data: data[1]
        });

        data[0].forEach(element => {
          dataRol_edit.push(element.id);
          $('#rol_act').append(`<option value='${element.id}'>${element.display_name}</option>`);
        });
        $('#tablaRoles_edit tbody tr').each(function () {
          $(this).find('td input').each(function (index) {
            /***
             * RECORRO LA COLUMNA EMPRESA DE MI TABLA
             */
            if (index == 0) {
              if (parseInt($(this).val()) == parseInt(selected_element_edit.val())) {
                /***
                 * SI LA EMPRESA SELECCIONADA YA SE ENCUENTRA EN MI TABLA CONSULTO LA COLUMNA ROL PARA VALIDAR LOS QUE NO HAN SIDO SELECCIONADOS
                 */
                $(this).parent().parent().each(function () {
                  $(this).find('td input').each(function (index) {
                    if (index == 2) {
                      let arrayProvisional = [];
                      roles = Array.from($(this).val().replaceAll(",", ""), x => parseInt(x));
                      /***
                       * CONCATENACION DE ARRAYS
                       */
                      arrayProvisional = Allroles;
                      Allroles = arrayProvisional.concat(roles);
                    }
                  })
                })
                /***
                 * SE VALIDA EL AREA ACTIVA PARA CONTINUAR DESDE ALLI
                 */
                $(this).parent().parent().each(function () {
                  $(this).find('td input').each(function (index) {
                    if (index == 1) {
                      $('#area_act option').remove();
                      $('#area_act optgroup').remove();
                      $("#area_act").select2({
                        theme: 'bootstrap',
                        language: {
                          noResults: function () { return "No hay resultados"; },
                          searching: function () { return "Buscando.."; }
                        },
                        closeOnSelect: false,
                        placeholder: "Seleccione..."
                      });
                      data[1][0].children.forEach(element => {
                        if (element.id == $(this).val()) {
                          $("#area_act").append(`<option value='${element.id}'>${element.text}</option>`)
                        }
                      });
                    }
                  })
                })
              }
            }
          })
          /***
           * FILTRO LOS ROLES PROVENIENTES DE LA CONSULTA AJAX Y SOLO CARGO LOS NO SELECCIONADOS
           */
          differences = dataRol_edit.filter(x => !Allroles.includes(x));

          $('#rol_act option').remove();
          data[0].forEach(element => {
            if (differences.find(difference => element.id == difference)) {
              $('#rol_act').append(`<option value='${element.id}'>${element.display_name}</option>`);
            }
          });
        })
      });
    }
  });

  /************************************************************************************************************
   *                             AGREGA EMPRESA, AREA Y ROLES AL USUARIO A CREAR                              *
   ************************************************************************************************************/
  $(document).on('click', '#rolesTabla', function () {
    let roles = $("#rol").select2('data');
    let empresa = $('#empresa').select2('data');
    let area = $('#area').select2('data');
    let idCam = '', nameCamp = '', arrayTR = [];

    roles.forEach(element => {
      let id = element.id, name = element.text;
      idCam = id + ',' + idCam;
      nameCamp = name + '</br>' + nameCamp;
    });

    $('#tablaRoles').append(
      `<tr>
            <td class='align-middle'><input type='hidden' name='empresaTbl[]' value='${empresa[0].id}'>${empresa[0].text}</td>
            <td class='align-middle'><input type='hidden' name='areaTbl[]' value='${area[0].id}'>${area[0].text}</td>
            <td class='align-middle'><input type='hidden' name='rolesTbl[]' value='${idCam}'>${nameCamp}</td>
            <td class='align-middle'>
              <button class='btn btn-sm btn-danger delete'>
                <i class="icons cui-trash"></i>
              </button>
            </td>
          </tr>`
    )

    $("#empresa").val("").trigger('change');

  })

  /************************************************************************************************************
   *                            AGREGA EMPRESA, AREA Y ROLES AL USUARIO A EDITAR                              *
   ************************************************************************************************************/
  $(document).on('click', '#rolesTabla_edit', function () {
    let roles = $("#rol_act").select2('data');
    let empresa = $('#empresa_act').select2('data');
    let area = $('#area_act').select2('data');
    let idCam = '', nameCamp = '';

    roles.forEach(element => {
      let id = element.id, name = element.text;
      idCam = id + ',' + idCam;
      nameCamp = name + '</br>' + nameCamp;
    });

    $('#tablaRoles_edit').append(
      `<tr>
            <td class='align-middle'><input type='hidden' name='empresaTbl_edit[]' value='${empresa[0].id}'>${empresa[0].text}</td>
            <td class='align-middle'><input type='hidden' name='areaTbl_edit[]' value='${area[0].id}'>${area[0].text}</td>
            <td class='align-middle'><input type='hidden' name='rolesTbl_edit[]' value='${idCam}'>${nameCamp}</td>
            <td class='align-middle'>
              <button class='btn btn-sm btn-danger delete'>
                <i class="icons cui-trash"></i>
              </button>
            </td>
          </tr>`
    )

    $("#empresa_act").val("").trigger('change');
    $('#rol_act option').remove();
    $('#rol_act optgroup').remove();
    $('#area_act option').remove();
    $('#area_act optgroup').remove();
    $("#area_act").select2({
      theme: 'bootstrap',
      language: {
        noResults: function () { return "No hay resultados"; },
        searching: function () { return "Buscando.."; }
      },
      closeOnSelect: false,
      placeholder: "Seleccione..."
    });
  })

  /************************************************************************************************************
   *                       ELIMINA EL TR CORRESPONDIENTE A LA LINIA DEL BOTON OBTURADO                        *
   ************************************************************************************************************/
  $(document).on('click', '.delete', function () {
    event.preventDefault();
    $(this).closest('tr').remove();
  })

  $("#AgregarHijo").on('click', function (e) {
    e.preventDefault();
    var nombre_hijo = $('#son_name').val();
    var fecha_nacimiento = $('#birthdate').val();
    var sexo_hijo = $('#gender').val();
    var lugar_residencia = $('select[name="city"] option:selected').text();

    if (nombre_hijo == '' || fecha_nacimiento == '' || sexo_hijo == '' || lugar_residencia == '') {
      if (nombre_hijo == '') {
        text = 'Nombre Completo'
      } else if (fecha_nacimiento == '') {
        text = 'Fecha de Nacimiento'
      } else if (sexo_hijo == '') {
        text = 'Sexo'
      } else if (lugar_residencia == '') {
        text = 'Lugar de Residencia'
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

      var fila =
        `<tr>
            <td>${nombre_hijo}</td>
            <td>${fecha_nacimiento}</td>
            <td>${sexo_hijo}</td>
            <td>${lugar_residencia}</td>
            <td>
            <div class='btn-group'>
            <button type='button' class='delete btn btn-danger btn-xs'>
            <i class='fa fa-trash'></i>
            </button> 
            </div>
            </td>
            </tr>
            `
      var btn = document.createElement("TR");
      btn.innerHTML = fila;

      document.getElementById("body_hijos").appendChild(btn);
      $('#son_name').val('');
      $('#birthdate').val('');
      $('#gender').val(null).trigger('change');
      $('#city').val(null).trigger('change');
      return true;
    }
  });

  // MOSTRAR TABLA DE HIJOS , SI TIENE
  var id = $("#id_perfil").val();
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    type: "GET",
    url: baseUrl + '/users/detalleHijos',
    dataType: 'json',
    data: id,
    success: function (data) {
      var archivos_table = '';
      data.forEach((item, index) => {
        f = item.birthdate.split("-", 3);
        fecha = f[2] + "-" + f[1] + "-" + f[0];
        archivos_table += `
                    <tr>
                    <td>${item.son_name}</td>
                    <td>${fecha}</td>
                    <td>${item.gender}</td>
                    <td>${item.nombre_ciudad} - ${item.departamento}</td>
                    <td>
                    <div class='btn-group'>
                    <button type='button' class='eliminarFila btn btn-danger btn-xs'>
                    <i class='fa fa-trash'></i>
                    </button> 
                    </div>
                    </td>
                    </tr>
                    `
      });
      $('#tableHijos tbody').html(archivos_table);
      $('#tableHijos2').html($("#tableHijos").html()).find('button').attr('hidden', true).removeClass('eliminarFila')

    },
    error: function (data) {
    }
  });

  // LLENAR TAB DE CONFIRMAR INFORMACION CON LO DE LAS DEMAS TABS
  $(document).on('click', '#tabConfirm', function (e) {
    $('#spNombreUser').html($('#name_act').val())
    $('#spEmail').html($('#email_act').val())
    $('#spCedula').html($('#identification').val())
    $('#spCargo').html($('#cargo_act').val())
    $('#spDireccion').html($('#address').val())

    $('#tableHijos2').html($("#tableHijos").html()).find('button').attr('hidden', true).removeClass('eliminarFila')
    $('#spNombre').html($('#contact_name').val())
    $('#spTelefono').html($('#contact_phone').val())
    $('#spParentezco').html($('#relationship').val())

    $('#spCamisa').html($('#shirt').val())
    $('#spPantalon').html($('#pant').val())
    $('#spBotas').html($('#shoes').val())
  });
});