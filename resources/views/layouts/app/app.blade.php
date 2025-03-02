<!DOCTYPE html>
<html lang="es">

<head>
	<base href="./">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title> @yield("titulo")</title>
	<!-- Icons-->
	<link href="{{asset('vendors/@coreui/icons/css/coreui-icons.min.css')}}" rel="stylesheet">
	<link href="{{asset('vendors/flag-icon-css/css/flag-icon.min.css')}}" rel="stylesheet">
	<link href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('vendors/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/favicon.ico')}}">
	<!-- Main styles for this application-->
	<link href="{{asset('css/style.css')}}" rel="stylesheet">
	<!-- Datatables-->
	<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

	<!-- Select2 -->
	<link href="{{asset('vendors/select2/css/select2.min.css')}}" rel="stylesheet">
	<!-- Datepicker -->
	<link href="{{asset('vendors/bootstrap-datepicker/css/datepicker.min.css')}}" rel="stylesheet">
	<!-- Daterangepicker -->
	<link href="{{asset('vendors/bootstrap-daterangepicker/css/daterangepicker.min.css')}}" rel="stylesheet">
	<!-- Sweetalert2 -->
	<link href="{{asset('css/sweetalert2.css')}}" rel="stylesheet">

	<link href="{{asset('vendors/pace-progress/css/pace.min.css')}}" rel="stylesheet">

	{{-- Ion.RangeSlider --}}
	<link href="{{asset('vendors/ion-rangeslider/css/ion.rangeSlider.min.css')}}" rel="stylesheet">

	{{-- Spinner SpinKit --}}
	<link href="{{asset('vendors/spinkit/css/spinkit.css')}}" rel="stylesheet">

	{{-- Spinner Toastr --}}
	<link href="{{asset('vendors/toastr/css/toastr.min.css')}}" rel="stylesheet">

    <link href="{{asset('css/preload.css')}}" rel="stylesheet">

	<script>
		(function(i, s, o, g, r, a, m) {
			i['GoogleAnalyticsObject'] = r;
			i[r] = i[r] || function() {
				(i[r].q = i[r].q || []).push(arguments)
			}, i[r].l = 1 * new Date();
			a = s.createElement(o), m = s.getElementsByTagName(o)[0];
			a.async = 1;
			a.src = g;
			m.parentNode.insertBefore(a, m)
		})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
		ga('create', 'UA-118965717-1', 'auto');
		ga('send', 'pageview');
	</script>
	<style>
		textarea:focus,
		select:focus,
		input[type="text"]:focus,
		input[type="password"]:focus,
		input[type="datetime"]:focus,
		input[type="datetime-local"]:focus,
		input[type="date"]:focus,
		input[type="month"]:focus,
		input[type="time"]:focus,
		input[type="week"]:focus,
		input[type="number"]:focus,
		input[type="email"]:focus,
		input[type="url"]:focus,
		input[type="search"]:focus,
		input[type="tel"]:focus,
		input[type="color"]:focus,
		input[type="file"]:focus,
		.uneditable-input:focus {
			border-color: rgba(248, 108, 107, 0.25);
			box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(248, 108, 107, 0.25);
			outline: 0 none;
		}

		/*sombrear los dias desactivados del datepicker*/
		.datepicker table tr td.disabled,
		.datepicker table tr td.disabled:hover {
			background: #f7f8fa;
			color: #999999;
			cursor: no-drop;
		}

		textarea:invalid,
		input:invalid,
		select:invalid {
			border: 1px solid #ffc7c7;
		}

		.dataTables_filter {
			text-align: right;
		}

		input[type=number]::-webkit-inner-spin-button,
		input[type=number]::-webkit-outer-spin-button {
			-webkit-appearance: none;
			margin: 0;
		}

		input[type=number] {
			-moz-appearance: textfield;
		}

		.select2-container--default .select2-results__option[aria-selected=true] {
			background: #eef4fc;
		}

		.table {
			width: 100% !important;
			white-space: nowrap;
			overflow-x: auto;
			border-collapse: inherit !important;
		}

		.theadcolor thead {
			background: #303c54;
		}

		.theadcolor tfoot tr th {
			color: #898b8d !important;
		}

		.theadcolor tfoot {
			background: #fff;
			color: #898b8d !important;
		}

		.theadcolor tr:first-child th:first-child {
			border-top-left-radius: 10px;
		}

		.theadcolor tr:first-child th:last-child {
			border-top-right-radius: 10px;
		}

		.theadcolor tr th {
			color: #FFFFFF !important;
		}

		.theadcolor {
			text-align: center;
		}

		#btn-back-to-top {
			position: fixed;
			bottom: 35px;
			right: 20px;
			display: none;
			border-radius: 50%;
			opacity: 0.5;
		}

		*::selection {
			background: #de5252;
			color: #ffffff;
		}

		/* Firefox */
		*::-moz-selection {
			background: #de5252;
			color: #ffffff;
		}

		.pulse {
			border-radius: 100%;
			position: relative;
			animation: animate 6s linear infinite
		}

		@keyframes animate {
			0% {
				box-shadow: 0 0 0 0 rgb(255, 109, 74, 0.7), 0 0 0 0 rgb(255, 109, 74, 0.7)
			}

			40% {
				box-shadow: 0 0 0 15px rgb(255, 109, 74, 0), 0 0 0 0 rgb(255, 109, 74, 0.7)
			}

			80% {
				box-shadow: 0 0 0 15px rgb(255, 109, 74, 0), 0 0 0 10px rgb(255, 109, 74, 0)
			}

			100% {
				box-shadow: 0 0 0 0 rgb(255, 109, 74, 0), 0 0 0 10px rgb(255, 109, 74, 0)
			}
		}

		a {
			color: #003244;
		}

		@media (min-width: 1024px) {
			.modal-xl {
				max-width: 1000px;
			}
		}

		.pointer {
			cursor: pointer;
		}


		.glyphicon-refresh-animate {
			-animation: spin .7s infinite linear;
			-webkit-animation: spin2 .7s infinite linear;
		}

		@-webkit-keyframes spin2 {
			from {
				-webkit-transform: rotate(0deg);
			}

			to {
				-webkit-transform: rotate(360deg);
			}
		}

		@keyframes spin {
			from {
				transform: scale(1) rotate(0deg);
			}

			to {
				transform: scale(1) rotate(360deg);
			}
		}
		/* ocultar puntos de las listas */
		ul {
			list-style: none;
		}
	</style>
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <div id="loading">
        <img class="imagePreload" src="{{asset('img/logo.png')}}" alt="Logo" style="width: 50px;">
		<span class="spinnerMessage text-white ml-2"> Por favor, espere... </span>
	</div>
	@include('layouts.app.partials.header')
	<div class="app-body">
		@include('layouts.app.partials.menu')
		<main class="main">
			<div class="container-fluid p-4">
				<div class="animated fadeIn">
					<div class="row">
						<div class="col-lg-12 pr-1 pl-1">
							<div class="card">
								{{-- <div class="card-header">
									<h5 class="card-title">Title</h5>
									<p class="card-text">Content</p>
								</div> --}}
								<div class="card-body">
									@yield('content')
									@include('layouts.app.partials.modals')
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		@include('layouts.app.partials.notifications')
	</div>
	@include('layouts.app.partials.footer')
	<!-- CoreUI and necessary plugins-->
	<button class="btn btn-danger" id="btn-back-to-top" title="volver arriba"><i class="fa fa-arrow-up"></i></button>
	@__PHP()
	<script src="{{asset('vendors/jquery/js/jquery.min.js')}}"></script>
	<script src="{{asset('vendors/popper.js/js/popper.min.js')}}"></script>
	<script src="{{asset('vendors/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('vendors/pace-progress/js/pace.min.js')}}"></script>
	<script src="{{asset('vendors/perfect-scrollbar/js/perfect-scrollbar.min.js')}}"></script>
	<script src="{{asset('vendors/@coreui/coreui-pro/js/coreui.min.js')}}"></script>
	<!-- Datatables -->
	<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

	<!-- Datatables Buttons-->
	<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.js') }}"></script>
	<script src="{{ asset('plugins/datatables-buttons/js/buttons/jszip.min.js') }}"></script>
	<script src="{{ asset('plugins/datatables-buttons/js/buttons/pdfmake.min.js') }}"></script>
	<script src="{{ asset('plugins/datatables-buttons/js/buttons/vfs_fonts.js') }}"></script>
	<script src="{{ asset('plugins/datatables-buttons/js/buttons/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('plugins/datatables-buttons/js/buttons/buttons.print.min.js') }}"></script>

	<!-- Select2 -->
	<script src="{{asset('vendors/select2/js/select2.min.js')}}"></script>
	<!-- Datepicker -->
	<script src="{{asset('vendors/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
	<script src="{{asset('vendors/bootstrap-datepicker/js/bootstrap-datepicker.es.js')}}"></script>
	<!-- Daterangepicker -->
	<script src="{{asset('vendors/moment/js/moment.min.js')}}"></script>
	<script src="{{asset('vendors/bootstrap-daterangepicker/js/daterangepicker.js')}}"></script>
	<!-- Forms -->
	<script src="{{asset('vendors/jquery.maskedinput/js/jquery.maskedinput.js')}}"></script>
	<script src="{{asset('js/advanced-forms.js')}}"></script>
	<!-- Sweetalert2 -->
	<script src="{{asset('js/sweetalert2.js')}}" type="text/javascript"></script>
	<!-- Tooltips-->
	<script src="{{asset('js/tooltips.js')}}" type="text/javascript"></script>
	<!-- Ion.RangeSlider -->
	<script src="{{asset('vendors/ion-rangeslider/js/ion.rangeSlider.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('js/sliders.js')}}" type="text/javascript"></script>
	<!-- Jquery validate -->
	<script src="{{asset('vendors/jquery-validation/js/jquery.validate.js')}}" type="text/javascript"></script>
	
	<!-- Toastr -->
	<script src="{{asset('vendors/toastr/js/toastr.js')}}" type="text/javascript"></script>
	<script src="{{asset('js/toastr.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/preload.js')}}"></script>
	@stack('scripts')
	<script type="text/javascript">
	var baseUrl='{{url('/')}}'
    
    $('.custom-file-input').on('change', function() {
    	var fileName = $(this).val();
    	$(this).next('.custom-file-label').addClass("selected").html(fileName.replace(/C:\\fakepath\\/i, ''));
    });
	var invalidChars = [",",".","-","+","e"];
    $('.blockNums').on('keydown', function(e){
		if (invalidChars.includes(e.key)) {
    		return false;
		}
    });

    $('.btnCertificadoLab').on('click', function(e){
		var id = $(this).data('id');
		if (id.length == 0) {
			swal.fire('Error','Usuario no registrado como empleado','error')
        } else {
		$.get(baseUrl + "/terminationstaff/consultarTrabajador/" + id)
		.done(function (data) {
                if (data.trabajador != null) {
					$('#certificates_table').DataTable({
                            stateSave: false,
                            oLanguage: {
								sUrl: baseUrl + "/plugins/datatables/es_es.json"
							},
                            destroy: true,
                            searching: true,
                            data: data.trabajador.rel_contratos,
                            responsive: true,
                            paging: true,
                            columns: [
                                { data: "start_date" },
                                { data: "end_date" },
                                { data: "position" },
                                { data: "employe_id",
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
		$('#modal_certificados').modal('show');
		}
    });

	$('.btnDesprendible').on('click', function(e){
		var id = $(this).data('id');
		if (id.length == 0) {
			swal.fire('Error','Usuario no registrado como empleado','error')
        } else {
		$.get(baseUrl + "/certificates/consultarDesprendibles/" + id)
		.done(function (data) {
                if (data.code == 422) {
                    Swal.fire('Error',data.message,'warning')
                }else{
                    $('#desprend_table').DataTable({
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
                                            <a href="javascript:void(0)" class="btnDescDesprendible btn btn-danger" data-id="${full.id}" title="Descargar">
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
		$('#modal_desprendibles').modal('show');
		}
    });
    
	// function validar_texto
	var invalidNums = ["|","°","*","+","!"];
	$('.blockText').on('keydown', function(e){
    	var tecla = e.keyCode; 
		if (tecla==8 || tecla==46) return true; //Tecla de retroceso (para poder borrar) 
		var patron = /[a-zA-ZñÑáéíóúüÁÉÍÓÚÜ\s]+/; // Solo acepta letras y vocales acentuadas
		var te = String.fromCharCode(tecla); 
		return patron.test(te);
		if (invalidNums.includes(e.key)) {
    		return false;
		}
    });
            
    let mybutton = document.getElementById("btn-back-to-top");
            
  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function () {
  	scrollFunction();
  };
  
  function scrollFunction() {
  	if (
  		document.body.scrollTop > 20 ||
  		document.documentElement.scrollTop > 20
  		) {
  		mybutton.style.display = "block";
  } else {
  	mybutton.style.display = "none";
  }
}

mybutton.addEventListener("click", backToTop);

function backToTop() {
	document.body.scrollTop = 0;
	document.documentElement.scrollTop = 0;
}

// Inicio  input tipo moneda ( money format)
$("input[data-type='currency']").on({
	keyup: function () {
		formatCurrency($(this));
	},
	blur: function () {
		formatCurrency($(this), "blur");
	}
});
function formatNumber(n) {
	return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}
function formatCurrency(input, blur) {
	var input_val = input.val();
	var valor = input_val.replace(/^0*/, '');
	input_val = valor;
	if (input_val === "") { return; }
	var original_len = input_val.length;
	var caret_pos = input.prop("selectionStart");
	if (input_val.indexOf(".") >= 0) {
		var decimal_pos = input_val.indexOf(".");
		var left_side = input_val.substring(0, decimal_pos);
		var right_side = input_val.substring(decimal_pos);
		left_side = formatNumber(left_side);
		right_side = formatNumber(right_side);
		// if (blur === "blur") {
		//     right_side += "00";
		// }
		right_side = right_side.substring(0, 2);
		input_val = "$" + left_side + "." + right_side;
	} else {
		input_val = formatNumber(input_val);
		input_val = "$" + input_val;
		// if (blur === "blur") {
		//     input_val += ".00";
		// }
	}
	input.val(input_val);
	var updated_len = input_val.length;
	caret_pos = updated_len - original_len + caret_pos;
	input[0].setSelectionRange(caret_pos, caret_pos);
}
        // Fin  input tipo moneda ( money format)

$(document).on('click', '.arrows', function () {
	const arr = $('.arrows > i').hasClass('fa-chevron-circle-down');
	if (arr == true)
		$('.arrows > i').removeClass('fa-chevron-circle-down').addClass('fa-chevron-circle-up')
	else
		$('.arrows > i').removeClass('fa-chevron-circle-up').addClass('fa-chevron-circle-down')
});

// cerrar session al cumplir 1 hora de inactividad en la página
var currSeconds = 0;
$(document).ready(function() {
	let idleInterval = setInterval(timerIncrement, 1000);
	$(this).mousemove(resetTimer);
	$(this).keypress(resetTimer);

	$(".select2-single").select2({
        theme: 'bootstrap',
        language: {
            noResults: function () { return "No hay resultados"; },
            searching: function () { return "Buscando.."; }
        },
        closeOnSelect: true,
        placeholder: "Seleccione..."
    });

	$(document).on('click', '.btnDescCertLab', function () {
		$.get( baseUrl + "/certificates/descCertLab/" + $(this).data('id'),function () {
			showPreload();
		})
		.done(function(response) {
			hiddenPreload();
        	window.open(window.location.origin + '/certificates/' + response.contrato, '_blank');
		})
		.fail(function() {
			hiddenPreload();
			alert( "error" );
		})
    });

	$(document).on('click', '.btnDescDesprendible', function () {
		$.get( baseUrl + "/certificates/descDespNom/" + $(this).data('id'),function () {
			showPreload();
		})
		.done(function(response) {
			hiddenPreload();
        	window.open(window.location.origin + '/certificates/payroll/' + response.desprendible, '_blank');
		})
		.fail(function() {
			hiddenPreload();
			alert( "error" );
		})
    });
});

function resetTimer() {
	currSeconds = 0;
}

function timerIncrement() {
	currSeconds = currSeconds + 1;
	if(currSeconds == 3600){
		event.preventDefault();
		document.getElementById('logout-form').submit();
	}
}
	</script>
</body>

</html>