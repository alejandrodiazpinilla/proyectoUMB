<!DOCTYPE html>
<html lang="es">
<head>
    <base href="../">
    <meta charset="utf-8">
    <title> @yield("titulo")</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="{{asset('vendors/@coreui/icons/css/coreui-icons.min.css')}}" rel="stylesheet">
	<link href="{{asset('vendors/flag-icon-css/css/flag-icon.min.css')}}" rel="stylesheet">
	<link href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('vendors/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/favicon.ico')}}">
    <!-- Main styles for this application-->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/pace-progress/css/pace.min.css')}}" rel="stylesheet">
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
    <meta name="robots" content="noindex">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-118965717-1');
    </script>
</head>
<body class="c-app flex-row align-items-center" style="margin-top: 80px;">
    <div id="loading">
        <img class="imagePreload" src="{{asset('img/logo.png')}}" alt="Logo" style="width: 50px;">
		<span class="spinnerMessage text-white ml-2"> Por favor, espere... </span>
	</div>
    @yield('content')
    <!-- CoreUI and necessary plugins-->
    <script src="{{asset('vendors/jquery/js/jquery.min.js')}}"></script>
    <script src="{{asset('vendors/popper.js/js/popper.min.js')}}"></script>
    <script src="{{asset('vendors/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('vendors/pace-progress/js/pace.min.js')}}"></script>
    <script src="{{asset('vendors/perfect-scrollbar/js/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('vendors/@coreui/coreui-pro/js/coreui.min.js')}}"></script>
    <script src="{{asset('js/preload.js')}}"></script>
</body>
</html>