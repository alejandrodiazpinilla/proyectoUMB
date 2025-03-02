<header class="app-header navbar">
    <div class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
      <span class="navbar-toggler-icon"></span>
    </div>
    <div class="navbar-brand">
      <img class="navbar-brand-full" src="{{asset('img/logo.png') }}" width="30%" alt="CoreUI Logo">
      <img class="navbar-brand-minimized" src="{{asset('img/logo.png') }}" width="100%" alt="CoreUI Logo">
    </div>
    <div class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
      <span class="navbar-toggler-icon"></span>
    </div>
    <ul class="nav navbar-nav ml-auto">
      {{-- <li class="nav-item" >
        <div class="nav-link navbar-toggler aside-menu-toggler d-md-down-none bagde-number" type="button" data-toggle="aside-menu-lg-show">
          <i class="icon-bell @if((count(notificaciones_solicitud_personal()[1]) + count(notificaciones_comercial()[1]) + count(notificaciones_desvinculaciones()[1]) + count(notificaciones_apodatos()[1]) + count(notificaciones_afiliaciones()[1]))>0) pulse @endif"></i>
          @if((count(notificaciones_solicitud_personal()[1]) + count(notificaciones_comercial()[1]) + count(notificaciones_desvinculaciones()[1]) + count(notificaciones_apodatos()[1]) + count(notificaciones_afiliaciones()[1]))>0)
            <span class="badge badge-pill badge-danger" style="top: 40%; font-size: 10px;">{{(count(notificaciones_solicitud_personal()[1]) + count(notificaciones_comercial()[1]) + count(notificaciones_desvinculaciones()[1]) + count(notificaciones_apodatos()[1]) + count(notificaciones_afiliaciones()[1]))}}</span>
          @endif
        </div>
        <div class="nav-link navbar-toggler aside-menu-toggler d-lg-none bagde-number" type="button" data-toggle="aside-menu-show">
          <i class="icon-bell @if((count(notificaciones_solicitud_personal()[1]) + count(notificaciones_comercial()[1]) + count(notificaciones_desvinculaciones()[1]) + count(notificaciones_apodatos()[1]) + count(notificaciones_afiliaciones()[1]))>0) pulse @endif"></i>
          @if((count(notificaciones_solicitud_personal()[1]) + count(notificaciones_comercial()[1]) + count(notificaciones_desvinculaciones()[1]))>0)
          <span class="badge badge-pill badge-danger" style="top: 40%; font-size: 10px;">{{(count(notificaciones_solicitud_personal()[1]) + count(notificaciones_comercial()[1]) + count(notificaciones_desvinculaciones()[1]) + count(notificaciones_apodatos()[1]) + count(notificaciones_afiliaciones()[1]))}}</span>
          @endif
        </div>
      </li> --}}
      <li class="nav-item dropdown">
        <a class="nav-link nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <button type="button" aria-pressed="false" autocomplete="off" class="btn btn-outline-secondary">{{ substr(Auth::user()->name,0,1) }}</button>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-header text-center">
            <strong>Configuración</strong>
          </div>
          <div class="dropdown-item pointer"> Nombre :  {{ Auth::user()->name }}</div>
          {{-- <div class="dropdown-item btnDesprendible pointer" data-id="{!! Crypt::encryptstring(Auth::user()->identification) !!}">
            <i class="icon-wallet"></i> Desprendibles
          </div> --}}
          {{-- <div class="dropdown-item btnCertificadoLab pointer" data-id="{!! Crypt::encryptstring(Auth::user()->identification) !!}">
            <i class="icon-like"></i> Certificado Laboral
          </div> --}}
          <a class="dropdown-item" href="{!! route('users.edit',Crypt::encryptString(Auth::user()->id)) !!}">
              <i class="fa fa-user"></i> Perfil
          </a>
          {{-- <div class="dropdown-divider"></div> --}}
          <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" target="_blank">
              <i class="fa fa-lock text-danger"></i> Cerrar Sesión
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </div>
      </li>
    </ul>
  </header>