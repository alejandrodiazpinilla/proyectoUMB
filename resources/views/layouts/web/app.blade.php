<!DOCTYPE html>
<html lang="es">
<head>
    <!-- <base href="../"> -->
    <meta charset="utf-8">
    <title> SegurVict | @yield("titulo")</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 
    <!-- Favicon -->
    <link rel="icon" sizes="16x16" href="{{asset('img/favicon.ico')}}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    
    <!-- CSS -->
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/all.min.css')}}" rel="stylesheet">

	<link href="{{asset('css/sweetalert2.css')}}" rel="stylesheet">

    <!-- Estilos -->
	<link href="{{asset('css/estilos.css')}}" rel="stylesheet">
    <link href="{{asset('css/preload.css')}}" rel="stylesheet">
</head>

<body>
    @php $url = $_SERVER['REQUEST_URI'] @endphp
    <div id="loading">
        <img class="imagePreload" src="{{asset('img/logo.png')}}" alt="Logo" style="width: 50px;">
		<span class="spinnerMessage text-white ml-2"> Por favor, espere... </span>
	</div>
    <div class="wrapper">
        <!-- Header -->
        <div class="header">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-2">
                        <div class="brand">
                                <img src="{{asset('/image/logos/empresas/'.infoEmpresa()->logo)}}" alt="Logo" style="width: 50%; height: 100%">
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="topbar">
                            <div class="topbar-col">
                                <a href="tel:+57 {{infoEmpresa()->telefono}}"><i class="fa fa-phone-alt"></i>+57 {{infoEmpresa()->telefono}}</a>
                            </div>
                            <div class="topbar-col">
                                <a href="mailto:{{infoEmpresa()->email}}"><i class="fa fa-envelope"></i>{{infoEmpresa()->email}}</a>
                            </div>
                            <div class="topbar-col">
                                <div class="topbar-social">
                                    <a href="{{infoEmpresa()->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <a href="{{infoEmpresa()->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a>
                                    <a href="{{infoEmpresa()->linkedin}}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="navbar navbar-expand-lg bg-light navbar-light">
                            <a href="#" class="navbar-brand">MENU</a>
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                                <div class="navbar-nav ml-auto">
                                    <a href="{{ url('index') }}" class="nav-item nav-link home">Home</a>
                                    <a href="{{ url('aboutUs') }}" class="nav-item nav-link aboutUs">Sobre nosotros</a>
                                    <a href="{{ url('services') }}" class="nav-item nav-link services">Servicios</a>
                                    <a href="{{ url('contactUs') }}" class="nav-item nav-link contactUs">Contáctanos</a>
                                    <a href="{{ url('login') }}" class="nav-item nav-link Login">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header -->
        @if(substr(strrchr($url,"/"),1) !== 'index')
        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    @if(substr(strrchr($url,"/"),1) == 'aboutUs')
                    <div class="col-12">
                        <h2>Sobre Nosotros</h2>
                    </div>
                    <div class="col-12">
                        <a href="{{ url('index') }}">Home</a>
                        <a href="{{ url('aboutUs') }}">Sobre Nosotros</a>
                    </div>
                    @elseif (substr(strrchr($url,"/"),1) == 'services')
                    <div class="col-12">
                        <h2>Nuestros Servicios</h2>
                    </div>
                    <div class="col-12">
                        <a href="{{ url('index') }}">Home</a>
                        <a href="{{ url('services') }}">Nuestros Servicios</a>
                    </div>
                    @elseif (substr(strrchr($url,"/"),1) == 'contactUs')
                    <div class="col-12">
                        <h2>Contáctanos</h2>
                    </div>
                    <div class="col-12">
                        <a href="{{ url('index') }}">Home</a>
                        <a href="{{ url('contactUs') }}">Contáctanos</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        @endif

        <!-- Contact Start -->
        <div class="contact">
            <!-- <div class="container"> -->
                @yield('content')
                <!-- </div> -->
            </div>
            <!-- Contact End -->

            <!-- Footer -->
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="footer-about">
                                <h2>Sobre nosotros</h2>
                                <p><i class="fa fa-map-marker-alt"></i>{{infoEmpresa()->direccion}}</p>
                                <p><i class="fa fa-tablet-alt"></i>+57 {{infoEmpresa()->celular}}</p>
                                <p><i class="fa fa-phone-alt"></i>+57 {{infoEmpresa()->telefono}}</p>
                                <p><i class="fa fa-envelope"></i>{{infoEmpresa()->email}}</p>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="footer-link">
                                        <h2>Redes Sociales</h2>
                                        <a href="{{infoEmpresa()->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="{{infoEmpresa()->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a>
                                        <a href="{{infoEmpresa()->linkedin}}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="footer-link">
                                        <h2>Enlaces útiles</h2>
                                        <a href="{{ url('aboutUs') }}">Sobre nosotros</a>
                                        <a href="{{ url('services') }}">Nuestros servicios</a>
                                        <a href="{{ url('contactUs') }}">Contáctanos</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
        </div>

        <!-- JavaScript -->
    	<script src="{{asset('js/jquery-3.4.1.min.js')}}" type="text/javascript"></script>
    	<script src="{{asset('js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
    	<script src="{{asset('js/sweetalert2.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/preload.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                var url = location.pathname.split("/").slice(-1);
                if (url == 'index') 
                    $('.home').addClass('active');
                if (url == 'aboutUs') 
                    $('.aboutUs').addClass('active');
                if (url == 'services') 
                    $('.services').addClass('active');
                if (url == 'contactUs') 
                    $('.contactUs').addClass('active');
            });
        </script>
</body>
</html>;