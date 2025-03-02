<div class="sidebar">
  <nav class="sidebar-nav">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/home') }}">
          <i class="nav-icon fa fa-home"></i> Inicio
        </a>
      </li>
      @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_administracion'))
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon icons cui-cog"></i> Administración</a>
        <ul class="nav-dropdown-items">
          @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_afiliaciones'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('affiliations.index')}}">
              Afiliaciones
            </a>
          </li>
          @endif
          @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_areas'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('areas.index')}}">
              Areas
            </a>
          </li>
          @endif
          @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_barrios'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('neighborhoods.index')}}">
              Barrios
            </a>
          </li>
          @endif
          @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_ciudades'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('ciudades.index')}}">
              Ciudades
            </a>
          </li>
          @endif
          @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_clientes'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('customers.index')}}">
              Clientes
            </a>
          </li>
          @endif
          {{-- @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_condiciones_pago'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('paymentconditions.index')}}">
              Condiciones de Pago
            </a>
          </li>
          @endif --}}
          @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_empleados'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('employees.index')}}">
              Empleados
            </a>
          </li>
          @endif
          @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_empresas'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('empresas.index')}}">
              Empresas
            </a>
          </li>
          @endif
          {{-- @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_encargados_novedades'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('delegatesnovelties.index')}}">
              Encargados Novedades
            </a>
          </li>
          @endif --}}
          @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_entidades_formacion'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('trainingentities.index')}}">
              Entidades de Formación
            </a>
          </li>
          @endif
          @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_estado_civil'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('maritalstatus.index')}}">
              Estado Civil
            </a>
          </li>
          @endif
          @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_localidades'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('localities.index')}}">
              Localidades
            </a>
          </li>
          @endif
          {{-- @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_proveedores'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('providers.index')}}">
              Proveedores
            </a>
          </li>
          @endif --}}
          @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_tipos_documentos'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('documenttypes.index')}}">
              Tipos de Documentos
            </a>
          </li>
          @endif
          {{-- @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_tipos_novedades'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('noveltiestypes.index')}}">
              Tipos de Novedades
            </a>
          </li>
          @endif --}}
          @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_tipos_visitas'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('visittypes.index')}}">
              Tipos de Visitas
            </a>
          </li>
          @endif
          @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_usuarios'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('users.index')}}">
              Usuarios
            </a>
          </li>
          @endif
        </ul>
      </li>
      @endif
      {{-- @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_actas_reunion'))
      <li class="nav-item">
        <a class="nav-link" href="{{route('workminutes.index')}}">
          <i class="nav-icon cui-list"></i> Actas De Visitas</a>
      </li>
      @endif --}}
      {{-- @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_apodatos'))
      <li class="nav-item">
        <a class="nav-link" href="{{route('apodatos.index')}}">
          <i class="nav-icon cui-task"></i> APODATOS</a>
      </li>
      @endif --}}
      @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_banco_hdv'))
      <li class="nav-item">
        <a class="nav-link" href="{{route('bankofresumes.index')}}">
          <i class="nav-icon fa fa-address-card-o"></i> Banco Hojas de Vida</a>
      </li>
      @endif
      @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_certificados'))
      <li class="nav-item">
        <a class="nav-link" href="{{route('trainings.index')}}">
          <i class="nav-icon fa fa-graduation-cap"></i> Capacitaciones</a>
      </li>
      @endif
      {{-- @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_capacitaciones'))
      <li class="nav-item">
        <a class="nav-link" href="{{route('certificates.index')}}">
          <i class="nav-icon cui-calculator"></i> Certificados</a>
      </li>
      @endif --}}
      {{-- @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_cotizaciones'))
      <li class="nav-item">
        <a class="nav-link" href="{{route('quotations.index')}}">
          <i class="nav-icon icons cui-euro"></i> Cotizaciones</a>
      </li>
      @endif --}}
      @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_desvinculaciones'))
      <li class="nav-item">
        <a class="nav-link" href="{{route('terminationstaff.index')}}">
          <i class="nav-icon icons cui-user-unfollow"></i> Desvinculaciones</a>
      </li>
      @endif
      {{-- @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_entrega_dotacion'))
      <li class="nav-item">
        <a class="nav-link" href="{{route('deliveryendowment.index')}}">
          <i class="nav-icon icon-handbag"></i> Entrega Dotación</a>
      </li>
      @endif
      @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_informes'))
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon fa fa-copy"></i> Informes</a>
        <ul class="nav-dropdown-items">
          @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_cctv'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('cctv.index')}}">
              Actividades CCTV
            </a>
          </li>
          @endif
          @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_informe_mensual'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('monthreport.index')}}">
              Informe Mensual
            </a>
          </li>
          @endif
          @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_inspeccion_ruta'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('routeinspection.index')}}">
              Inspección de Ruta
            </a>
          </li>
          @endif
        </ul>
      </li>
      @endif --}}
      {{-- @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_novedades'))
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon icon-layers"></i> Novedades</a>
        <ul class="nav-dropdown-items">
          @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_novedades_clientes'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('noveltiescustomers.index')}}">
              <i class="nav-icon fa fa-handshake-o"></i> Clientes</a>
          </li>
          @endif
          @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_novedades_guardas'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('noveltieswatchmen.index')}}">
              <i class="nav-icon fa fa-get-pocket"></i> Guardas</a>
          </li>
          @endif
          @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_novedades_rrhh'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('noveltiesrrhh.index')}}">
              <i class="nav-icon fa fa-book"></i> RRHH</a>
          </li>
          @endif
        </ul>
      </li>
      @endif --}}
      {{-- @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_solicitud_personal'))
      <li class="nav-item">
        <a class="nav-link" href="{{route('staffrequest.index')}}">
          <i class="nav-icon cui-people"></i> Solicitud de Personal</a>
      </li>
      @endif --}}
      @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_visitas_domiciliarias'))
      <li class="nav-item">
        <a class="nav-link" href="{{route('homevisits.index')}}">
          <i class="nav-icon cui-home"></i> Visitas Domiciliarias</a>
      </li>
      @endif
      {{-- @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_visita_tecnica'))
      <li class="nav-item">
        <a class="nav-link" href="{{route('technicalvisits.index')}}">
          <i class="nav-icon cui-calendar"></i> Visitas técnicas</a>
      </li>
      @endif --}}
    </ul>
  </nav>
  <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
