$(document).ready(function () {
    $("#datepickerMonthYear").datepicker({
        startDate: "01-2023",
        endDate: "+0y",
        format: "MM-yyyy",
        viewMode: "months",
        minViewMode: "months",
        autoclose: true,
        language: 'es'
    });

    $('#cedula').on('blur', function (e) {
        var id = $(this).val();
        if (id.length == 0) {
        } else {
            $.get(baseUrl + "/terminationstaff/consultarTrabajador/" + id)
            .done(function (data) {
                if (data.trabajador != null) {
                    $('#table_certificates').DataTable({
                        stateSave: false,
                        oLanguage: { sUrl: baseUrl + "/plugins/datatables/es_es.json" },
                        destroy: true,
                        searching: true,
                        data: data.trabajador.rel_contratos,
                        responsive: true,
                        paging: true,
                        columns: [
                            { data: "start_date" },
                            { data: "end_date" },
                            { data: "position" },
                            {
                                data: "employe_id",
                                render: function (data, type, full, meta) {
                                    return `
                                        <div class='btn-group'>
                                            <a href="javascript:void(0)" class="btnDescCertLab btn btn-danger" data-id="${full.id}" title="Descargar">
                                                <i class="fa fa-file-pdf-o"></i>
                                            </a>
                                        </div>`;
                                },
                                orderable: false
                            }
                        ],
                        pagingType: "full_numbers"
                    });
                }
            });
        }
    });

    $('.list-group-item-action').on('click', function () {
        let v = $(this).attr('aria-selected');
        if (v == undefined || v == false || v == 'false') {
            $('#table_certificates').DataTable().destroy();
            $('#table_certificates tbody').html('');
            $('#cedula').val('');
            $('.btnReset').trigger('click');
        }
    });

    function validarEncabezados() {
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
        }
    };

    function ProcessExcel(data) {
        var workbook = XLSX.read(data, {
            type: 'binary'
        });
        var firstSheet = workbook.SheetNames[0];
        if (
            typeof workbook.Sheets[firstSheet].A1.h == 'undefined' ||
            workbook.Sheets[firstSheet].A1.h !== 'CEDULA' ||
            typeof workbook.Sheets[firstSheet].B1.h == 'undefined' ||
            workbook.Sheets[firstSheet].B1.h !== 'BASICO' ||
            typeof workbook.Sheets[firstSheet].C1.h == 'undefined' ||
            workbook.Sheets[firstSheet].C1.h !== 'DIAS_TRABAJADOS' ||
            typeof workbook.Sheets[firstSheet].D1.h == 'undefined' ||
            workbook.Sheets[firstSheet].D1.h !== 'DIAS_INCAPACIDAD' ||
            typeof workbook.Sheets[firstSheet].E1.h == 'undefined' ||
            workbook.Sheets[firstSheet].E1.h !== 'SUELDO' ||
            typeof workbook.Sheets[firstSheet].F1.h == 'undefined' ||
            workbook.Sheets[firstSheet].F1.h !== 'AUX_TRANS' ||
            typeof workbook.Sheets[firstSheet].G1.h == 'undefined' ||
            workbook.Sheets[firstSheet].G1.h !== 'COMISIONES' ||
            typeof workbook.Sheets[firstSheet].H1.h == 'undefined' ||
            workbook.Sheets[firstSheet].H1.h !== 'BONO' ||
            typeof workbook.Sheets[firstSheet].I1.h == 'undefined' ||
            workbook.Sheets[firstSheet].I1.h !== 'DESCUENTOS' ||
            typeof workbook.Sheets[firstSheet].J1.h == 'undefined' ||
            workbook.Sheets[firstSheet].J1.h !== 'DIPLOMA_CURSO' ||
            typeof workbook.Sheets[firstSheet].K1.h == 'undefined' ||
            workbook.Sheets[firstSheet].K1.h !== 'PENSION' ||
            typeof workbook.Sheets[firstSheet].L1.h == 'undefined' ||
            workbook.Sheets[firstSheet].L1.h !== 'SALUD' ||
            typeof workbook.Sheets[firstSheet].M1.h == 'undefined' ||
            workbook.Sheets[firstSheet].M1.h !== 'INCAPACIDAD' ||
            typeof workbook.Sheets[firstSheet].N1.h == 'undefined' ||
            workbook.Sheets[firstSheet].N1.h !== 'TOTAL_DEVENGADO' ||
            typeof workbook.Sheets[firstSheet].O1.h == 'undefined' ||
            workbook.Sheets[firstSheet].O1.h !== 'TOTAL_DESCUENTOS' ||
            typeof workbook.Sheets[firstSheet].P1.h == 'undefined' ||
            workbook.Sheets[firstSheet].P1.h !== 'VALOR_PAGAR'
        ) {
            swal.fire('Error Encabezados', 'Por favor, corrija los encabezados de la plantilla o de ser necesario vuelva a descargar la plantilla de ejemplo', 'warning');
            $('.btnReset').trigger('click');
        }
    };

    $('.btnCargar').on('click', function () {
        $(this).next().trigger('click');
    });

    $('#csv').on('change', function () {
        $(".btnImportar").prop("disabled", this.files.length == 0);
        if (this.files.length != 0) {
            validarEncabezados();
            let val = $(this).val();
            val = val.replace(/C:\\fakepath\\/i, '');
            var ext = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
            if (ext == 'xlsx') {
                if (val.length > 15) {
                    $('.btnCargar').html(val.substr(0, 13) + '....' + ext).attr('title', val).css('cursor', 'pointer');
                } else {
                    $('.btnCargar').html(val).attr('title', val).css('cursor', 'pointer');
                }
            } else {
                swal.fire('Tipo de archivo no permitido', 'Solo se admiten archivos en formato XLSX', 'warning');
                $(this).val(null);
                $('.btnCargar').html('Seleccione archivo <i class="fa fa-file-excel-o"></i>').attr('title', '');
            }
        }
    });

    $('.btnReset').on('click', function () {
        $('#csv').val(null)
        $('.btnCargar').html('Seleccione archivo <i class="fa fa-file-excel-o"></i>').attr('title', '');
        $('#table_certificates tbody').html('');
        $('.divHidden').attr('hidden', true);
        $(".btnImportar").attr("disabled", "true");
    });


    $('#form-nomina').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            var formData = new FormData(this);
            $('#csv')[0].files[0];
            jQuery.ajax({
                url: baseUrl + "/certificates/cargarNomina",
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
                    if (result.code == 422) {
                        var filas = '';
                        result.message.forEach((element) => {
                            var errores = '';
                            element.errors.forEach((element) => {
                                errores += `${element} <br>`
                            }); 
                            filas += `<tr>
                            <td>${element.attribute}</td>
                            <td>${errores}</td>
                            <td>${element.row}</td>
                            </tr>`;
                        });
                        $('#table_errors tbody').html(filas);
                        $('.divHidden').attr('hidden',false);
                    } else if(result.code == 200){
                        Swal.fire('Listado Cargado Correctamente',result.message,'success')
                        $('.btnReset').trigger('click');
                    }else if(result.code == 500){
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

    $('#identificacion').on('blur', function (e) {
        var id = $(this).val();
        if (id.length == 0) {
        } else {
            $.get(baseUrl + "/certificates/consultarDesprendibles/" + id,{mesAnio: $('#datepickerMonthYear').val()})
            .done(function (data) {
                if (data.code == 422) {
                    Swal.fire('Error',data.message,'warning')
                }else{
                    $('#table_desprendibles').DataTable({
                        stateSave: false,
                        oLanguage: { sUrl: baseUrl + "/plugins/datatables/es_es.json" },
                        destroy: true,
                        searching: true,
                        data: data.desprendibles,
                        responsive: true,
                        paging: true,
                        columns: [
                            { data: "month" },
                            { data: "year" },
                            {
                                data: "id",
                                render: function (data, type, full, meta) {
                                    return `
                                        <div class='btn-group'>
                                            <a href="${window.location.origin}/certificates/payroll/${full.id}" class="btn btn-danger" target="_blank" title="Descargar">
                                                <i class="fa fa-file-pdf-o"></i>
                                            </a>
                                        </div>`;
                                },
                                orderable: false
                            }
                        ],
                        pagingType: "full_numbers"
                    });
                }
            });
        }
    });
});