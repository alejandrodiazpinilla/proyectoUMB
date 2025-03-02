<aside class="aside-menu ps">
    <ul class="nav nav-tabs" role="tablist" style="flex-wrap: nowrap;overflow-x: auto;overflow-y: hidden;">
        {{-- Notificacion de comercial --}}
        @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_notificaciones_comercial'))
        <li class="nav-item" title="Comercial">
            <a class="nav-link active" data-toggle="tab" href="#comercial" role="tab">
                <div class="comercial">
                    <i class="fa fa-handshake-o {{ notificaciones_comercial()[1]->count()>0?'pulse':'' }}"></i>
                </div>
            </a>
        </li>
        @endif
        {{-- notificaciones de desvinculacion de personal --}}
        @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_notificaciones_desvinculaciones'))
        <li class="nav-item" title="Desvinculaciones">
            <a class="nav-link" data-toggle="tab" href="#retiros" role="tab">
                <div class="retiros">
                    <i class="fa fa-user-times {{ notificaciones_desvinculaciones()[1]->count()>0?'pulse':'' }}"></i>
                </div>
            </a>
        </li>
        @endif
        {{-- notificaciones de solicitud de personal --}}
        @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_notificaciones_solicitud_personal'))
        <li class="nav-item" title="Solicitud de Personal">
            <a class="nav-link" data-toggle="tab" href="#solicitud_personal" role="tab">
                <div class="solicitud_personales">
                    <i class="fa fa-user-plus {{ notificaciones_solicitud_personal()[1]->count()>0?'pulse':'' }}"></i>
                </div>
            </a>
        </li>
        @endif
        {{-- notificaciones de APODATOS --}}
        @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_notificaciones_apodatos'))
        <li class="nav-item" title="Apodatos">
            <a class="nav-link" data-toggle="tab" href="#apodatos" role="tab">
                <div class="apodatos">
                    <i class="fa fa-check-square-o {{ notificaciones_apodatos()[1]->count()>0?'pulse':'' }}"></i>
                </div>
            </a>
        </li>
        @endif
        {{-- notificaciones de AFILIACIONES --}}
        @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_notificaciones_afiliaciones'))
        <li class="nav-item" title="Afiliaciones">
            <a class="nav-link" data-toggle="tab" href="#afiliaciones" role="tab">
                <div class="afiliaciones">
                    <i class="fa fa-list-alt {{ notificaciones_afiliaciones()[1]->count()>0?'pulse':'' }}"></i>
                </div>
            </a>
        </li>
        @endif
    </ul>

    <!-- Tab panes-->
    <div class="tab-content">
        {{-- Notificacion de comercial --}}
        @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_notificaciones_comercial'))
        <div class="tab-pane active" id="comercial" role="tabpanel">
            @foreach (notificaciones_comercial()[0] as $noti)
            <div id="div_{{$noti->id}}" class="message">
                <div class="py-3 float-left">
                    <div class="col-md-12">
                        @if($noti->read == 'no')
                        <button class="btn btn-outline-success btn-sm" id="btn_comercial{{$noti->id}}"
                            onclick="notificacionClienteLeida('{{$noti->id}}','comercial')" title="Marcar como leída">
                            <i class="icons cui-circle-check"></i>
                        </button>
                        @else
                        <button class="btn btn-outline-danger btn-sm" id="btn_comercial{{$noti->id}}"
                            onclick="notificacionClienteLeida('{{$noti->id}}','comercial')"
                            title="Marcar como no leída">
                            <i class="icons cui-circle-x"></i>
                        </button>
                        @endif
                    </div>
                    <div class="col-md-12 pt-1">
                        <button class="btn btn-outline-danger btn-sm"
                            onclick="notificacionClienteEliminada('{{$noti->id}}','comercial')">
                            <i class="icons cui-trash"></i>
                        </button>
                    </div>
                </div>
                <div>
                    <small class="text-muted">
                        {{ $noti->rel_cliente->name }}
                    </small>
                    <small class="text-muted float-right mt-1">
                        {{ date('d/m/Y G:i a', strtotime($noti->created_at)) }}
                    </small>
                </div>
                <div class="text-truncate font-weight-bold" data-toggle="tooltip" data-placement="top" data-html="true"
                    title="{{ $noti->rel_tipo->name }}">
                    {{ $noti->rel_tipo->name }}
                </div>
                <small class="text-muted">
                    {{ $noti->obs }}
                </small>
                <div class="text-center border-top border-warning mt-3">
                    <small class="text-muted">
                        Notificado el: {{ date('d-m-Y h:i:s a',strtotime($noti->created_at)) }}
                    </small>
                </div>
                <hr>
            </div>
            @endforeach
            <div class="mt-4 text-center font-weight-bold text-muted text-uppercase small">
                {{ notificaciones_comercial()[0]->count()>0?'':'¡Todo al día!' }}
                <br>
                {{ notificaciones_comercial()[0]->count()>0?'':'No hay nuevas notificaciones en esta sección.' }}
            </div>
        </div>
        @endif

        {{-- notificaciones de desvinculacion de personal --}}
        @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_notificaciones_desvinculaciones'))
        <div class="tab-pane" id="retiros" role="tabpanel">
            @foreach (notificaciones_desvinculaciones()[0] as $noti)
            <div id="div_{{$noti->id}}" class="message">
                <div class="py-3 float-left">
                    <div class="col-md-12">
                        @if($noti->read == 'no')
                        <button class="btn btn-outline-success btn-sm" id="btn_retiro{{$noti->id}}"
                            onclick="notificacionClienteLeida('{{$noti->id}}','retiro')" title="Marcar como leída">
                            <i class="icons cui-circle-check"></i>
                        </button>
                        @else
                        <button class="btn btn-outline-danger btn-sm" id="btn_retiro{{$noti->id}}"
                            onclick="notificacionClienteLeida('{{$noti->id}}','retiro')" title="Marcar como no leída">
                            <i class="icons cui-circle-x"></i>
                        </button>
                        @endif
                    </div>
                    <div class="col-md-12 pt-1">
                        <button class="btn btn-outline-danger btn-sm"
                            onclick="notificacionClienteEliminada('{{$noti->id}}','retiro')">
                            <i class="icons cui-trash"></i>
                        </button>
                    </div>
                </div>
                <div>
                    <small class="text-muted">
                        {{-- ->rel_usuario_empleado->name --}}
                        {{ $noti?->rel_empleado?->name }}
                    </small>
                    <small class="text-muted float-right mt-1">
                        {{ date('d/m/Y', strtotime($noti->retirement_date)) }}
                    </small>
                </div>
                <div class="text-truncate font-weight-bold" data-toggle="tooltip" data-placement="top" data-html="true"
                    title="{{ $noti->rel_tipo->name }}">
                    {{ $noti->rel_tipo->name }}
                </div>
                <small class="text-muted">
                    {{ $noti->obs }}
                </small>
                <div class="text-center border-top border-warning mt-3">
                    <small class="text-muted">
                        Notificado el: {{ date('d-m-Y h:i:s a',strtotime($noti->created_at)) }}
                    </small>
                </div>
                <hr>
            </div>
            @endforeach
            <div class="mt-4 text-center font-weight-bold text-muted text-uppercase small">
                {{ notificaciones_desvinculaciones()[0]->count()>0?'':'¡Todo al día!' }}
                <br>
                {{ notificaciones_desvinculaciones()[0]->count()>0?'':'No hay nuevas notificaciones en esta sección.' }}
            </div>
        </div>
        @endif

        {{-- notificaciones de solicitud de personal --}}
        @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_notificaciones_solicitud_personal'))
        <div class="tab-pane" id="solicitud_personal" role="tabpanel">
            @foreach (notificaciones_solicitud_personal()[0] as $noti)
            <div id="div_{{$noti->id}}" class="message">
                <div class="py-3 float-left">
                    <div class="col-md-12">
                        @if($noti->read == 'no')
                        <button class="btn btn-outline-success btn-sm" id="btn_solicitud_personal{{$noti->id}}"
                            onclick="notificacionClienteLeida('{{$noti->id}}','solicitud_personal')"
                            title="Marcar como leída">
                            <i class="icons cui-circle-check"></i>
                        </button>
                        @else
                        <button class="btn btn-outline-danger btn-sm" id="btn_solicitud_personal{{$noti->id}}"
                            onclick="notificacionClienteLeida('{{$noti->id}}','solicitud_personal')"
                            title="Marcar como no leída">
                            <i class="icons cui-circle-x"></i>
                        </button>
                        @endif
                    </div>
                    <div class="col-md-12 pt-1">
                        <button class="btn btn-outline-danger btn-sm"
                            onclick="notificacionClienteEliminada('{{$noti->id}}','solicitud_personal')">
                            <i class="icons cui-trash"></i>
                        </button>
                    </div>
                </div>
                <div>
                    <small class="text-muted">
                        {{ $noti?->rel_empleado?->name }}
                    </small>
                    <small class="text-muted float-right mt-1">

                    </small>
                </div>
                <div class="text-truncate font-weight-bold" data-toggle="tooltip" data-placement="top" data-html="true"
                    title="{{ $noti->type }}">
                    {{ $noti->type }}
                </div>
                <small class="text-muted">
                    {{ $noti->obs }}
                </small>
                <div class="text-center border-top border-warning mt-5">
                    <small class="text-muted">
                        Notificado el: {{ date('d-m-Y h:i:s a',strtotime($noti->created_at)) }}
                    </small>
                </div>
                <hr>
            </div>
            @endforeach
            <div class="mt-4 text-center font-weight-bold text-muted text-uppercase small">
                {{ notificaciones_solicitud_personal()[0]->count()>0?'':'¡Todo al día!' }}
                <br>
                {{ notificaciones_solicitud_personal()[0]->count()>0?'':'No hay nuevas notificaciones en esta sección.'
                }}
            </div>
        </div>
        @endif

        {{-- notificaciones de APODATOS --}}
        @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_notificaciones_apodatos'))
        <div class="tab-pane" id="apodatos" role="tabpanel">
            @foreach (notificaciones_apodatos()[0] as $noti)
            <div id="div_{{$noti->id}}" class="message">
                <div class="py-3 float-left">
                    <div class="col-md-12">
                        @if($noti->read == 'no')
                        <button class="btn btn-outline-success btn-sm" id="btn_apodatos{{$noti->id}}"
                            onclick="notificacionClienteLeida('{{$noti->id}}','apodatos')" title="Marcar como leída">
                            <i class="icons cui-circle-check"></i>
                        </button>
                        @else
                        <button class="btn btn-outline-danger btn-sm" id="btn_apodatos{{$noti->id}}"
                            onclick="notificacionClienteLeida('{{$noti->id}}','apodatos')" title="Marcar como no leída">
                            <i class="icons cui-circle-x"></i>
                        </button>
                        @endif
                    </div>
                    <div class="col-md-12 pt-1">
                        <button class="btn btn-outline-danger btn-sm"
                            onclick="notificacionClienteEliminada('{{$noti->id}}','apodatos')">
                            <i class="icons cui-trash"></i>
                        </button>
                    </div>
                </div>
                <div>
                    <small class="text-muted">
                        {{ $noti?->rel_empleado?->name .' '. $noti?->rel_empleado?->surname }}
                    </small>
                    <small class="text-muted float-right mt-1">

                    </small>
                </div>
                <div class="text-truncate font-weight-bold" data-toggle="tooltip" data-placement="top" data-html="true"
                    title="{{ $noti->type }}">
                    {{ $noti->type }}
                </div>
                <small class="text-muted">
                    {{ $noti->obs }}
                </small>
                <div class="text-center border-top border-warning mt-5">
                    <small class="text-muted">
                        Notificado el: {{ date('d-m-Y h:i:s a',strtotime($noti->created_at)) }}
                    </small>
                </div>
                <hr>
            </div>
            @endforeach
            <div class="mt-4 text-center font-weight-bold text-muted text-uppercase small">
                {{ notificaciones_apodatos()[0]->count()>0?'':'¡Todo al día!' }}
                <br>
                {{ notificaciones_apodatos()[0]->count()>0?'':'No hay nuevas notificaciones en esta sección.'
                }}
            </div>
        </div>
        @endif

        {{-- notificaciones de AFILIACIONES --}}
        @if (Auth::user()->hasrole('root') || Auth::user()->can('mostrar_notificaciones_afiliaciones'))
        <div class="tab-pane" id="afiliaciones" role="tabpanel">
            @foreach (notificaciones_afiliaciones()[0] as $noti)
            <div id="div_{{$noti->id}}" class="message">
                <div class="py-3 float-left">
                    <div class="col-md-12">
                        @if($noti->read == 'no')
                        <button class="btn btn-outline-success btn-sm" id="btn_afiliaciones{{$noti->id}}"
                            onclick="notificacionClienteLeida('{{$noti->id}}','afiliaciones')" title="Marcar como leída">
                            <i class="icons cui-circle-check"></i>
                        </button>
                        @else
                        <button class="btn btn-outline-danger btn-sm" id="btn_afiliaciones{{$noti->id}}"
                            onclick="notificacionClienteLeida('{{$noti->id}}','afiliaciones')" title="Marcar como no leída">
                            <i class="icons cui-circle-x"></i>
                        </button>
                        @endif
                    </div>
                    <div class="col-md-12 pt-1">
                        <button class="btn btn-outline-danger btn-sm"
                            onclick="notificacionClienteEliminada('{{$noti->id}}','afiliaciones')">
                            <i class="icons cui-trash"></i>
                        </button>
                    </div>
                </div>
                <div>
                    <small class="text-muted">
                        {{ $noti?->rel_empleado?->name .' '. $noti?->rel_empleado?->surname }}
                    </small>
                    <small class="text-muted float-right mt-1">

                    </small>
                </div>
                <div class="text-truncate font-weight-bold" data-toggle="tooltip" data-placement="top" data-html="true"
                    title="{{ $noti->type }}">
                    {{ $noti->type }}
                </div>
                <small class="text-muted">
                    {{ $noti->obs }}
                </small>
                <br><br>
                <div class="text-center border-top border-warning mt-5">
                    <small class="text-muted">
                        Notificado el: {{ date('d-m-Y h:i:s a',strtotime($noti->created_at)) }}
                    </small>
                </div>
                <hr>
            </div>
            @endforeach
            <div class="mt-4 text-center font-weight-bold text-muted text-uppercase small">
                {{ notificaciones_afiliaciones()[0]->count()>0?'':'¡Todo al día!' }}
                <br>
                {{ notificaciones_afiliaciones()[0]->count()>0?'':'No hay nuevas notificaciones en esta sección.'
                }}
            </div>
        </div>
        @endif
    </div>
</aside>
<script>
    function notificacionClienteLeida(id,tipo) {
    var btn = '#btn_'+tipo+id;
    if(tipo == 'comercial')
        var urlA = baseUrl + "/notificacionClienteLeida"
    else if(tipo == 'retiro')
        var urlA = baseUrl + "/notificacionDesvinculacionLeida"
    else if(tipo == 'solicitud_personal')
        var urlA = baseUrl + "/notificacionSolicitudPersonalLeida"
    else if(tipo == 'apodatos')
        var urlA = baseUrl + "/notificacionApodatosLeida"
    else if(tipo == 'afiliaciones')
        var urlA = baseUrl + "/notificacionAfiliacionesLeida"
    
        $.ajax({
            url: urlA,
            type: 'POST',
            data: {'id':id,"_token": "{{ csrf_token() }}"},
            success: function(result){
                var estado = result.nuevoEstado[0].read;
                if(estado == 'no'){
                    $(btn).removeClass('btn-outline-danger').addClass('btn-outline-success').html('<i class="icons cui-circle-check"></i>').attr('title','Marcar como leída');
                }else if(estado == 'si'){
                        $(btn).removeClass('btn-outline-success').addClass('btn-outline-danger').html('<i class="icons cui-circle-x"></i>').attr('title','Marcar como no leída');
                }
                let nuevoConteoComercial = result.nuevoConteo.nuevoConteoComercial;
                let nuevoConteoRetiros = result.nuevoConteo.nuevoConteoRetiros;
                let nuevoConteoSolicitud = result.nuevoConteo.nuevoConteoSolicitud;
                let nuevoConteoApodatos = result.nuevoConteo.nuevoConteoApodatos;
                let nuevoConteoAfiliaciones = result.nuevoConteo.nuevoConteoAfiliaciones;
                let conteo = (nuevoConteoComercial + nuevoConteoRetiros + nuevoConteoSolicitud + nuevoConteoApodatos + nuevoConteoAfiliaciones);
                if(conteo > 0){
                    $('.bagde-number').html('<i class="icon-bell pulse"></i><span class="badge badge-pill badge-danger bagde-number" style="top: 40%; font-size: 10px;">'+conteo+'</span>')
                }else{
                    $('.bagde-number').html('<i class="icon-bell">')
                }

                    if(tipo == 'comercial' && nuevoConteoComercial > 0)
                        $('.comercial').html('<i class="fa fa-handshake-o pulse">')
                    else if(tipo == 'comercial' && nuevoConteoComercial == 0)
                        $('.comercial').html('<i class="fa fa-handshake-o">')


                    if(tipo == 'retiro' && nuevoConteoRetiros > 0)
                        $('.retiros').html('<i class="fa fa-user-times pulse">')
                    else if(tipo == 'retiro' && nuevoConteoRetiros == 0)
                        $('.retiros').html('<i class="fa fa-user-times">')


                    if(tipo == 'solicitud_personal' && nuevoConteoSolicitud > 0)
                        $('.solicitud_personales').html('<i class="fa fa-user-plus pulse">')
                    else if(tipo == 'solicitud_personal' && nuevoConteoSolicitud == 0)
                        $('.solicitud_personales').html('<i class="fa fa-user-plus">')


                    if(tipo == 'apodatos' && nuevoConteoApodatos > 0)
                        $('.apodatos').html('<i class="fa fa-check-square-o pulse">')
                    else if(tipo == 'apodatos' && nuevoConteoApodatos == 0)
                        $('.apodatos').html('<i class="fa fa-check-square-o">')
                            

                    if(tipo == 'afiliaciones' && nuevoConteoAfiliaciones > 0)
                        $('.afiliaciones').html('<i class="fa fa-list-alt pulse">')
                    else if(tipo == 'afiliaciones' && nuevoConteoAfiliaciones == 0)
                        $('.afiliaciones').html('<i class="fa fa-list-alt">')
            },
        });
    };

    function notificacionClienteEliminada(id,tipo) {
        if(tipo == 'comercial')
            var urlA = baseUrl + "/notificacionClienteEliminada"
        else if(tipo == 'retiro')
            var urlA = baseUrl + "/notificacionDesvinculacionEliminada"
        else if(tipo == 'solicitud_personal')
            var urlA = baseUrl + "/notificacionSolicitudPersonalEliminada"
        else if(tipo == 'apodatos')
            var urlA = baseUrl + "/notificacionApodatosEliminada"
        else if(tipo == 'afiliaciones')
            var urlA = baseUrl + "/notificacionAfiliacionesEliminada"

        swal.fire({
            title: "¿Esta seguro de eliminar esta notificación? ",
            type: "warning",
            showCancelButton: !0,
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Eliminar'
        }).then(function(e) {
            if (e.value!=true) {
            }
            if(e.value){
                $.ajax({
                    url: urlA,
                    type: 'POST',
                    data: {'id':id,"_token": "{{ csrf_token() }}"},
                    success: function(result){
                        var div = '#div_'+id;
                        $(div).remove();
                        let nuevoConteoComercial = result.nuevoConteo.nuevoConteoComercial;
                        let nuevoConteoRetiros = result.nuevoConteo.nuevoConteoRetiros;
                        let nuevoConteoSolicitud = result.nuevoConteo.nuevoConteoSolicitud;
                        let nuevoConteoApodatos = result.nuevoConteo.nuevoConteoApodatos;
                        let nuevoConteoAfiliaciones = result.nuevoConteo.nuevoConteoAfiliaciones;
                        let conteo = (nuevoConteoComercial + nuevoConteoRetiros + nuevoConteoSolicitud + nuevoConteoApodatos + nuevoConteoAfiliaciones);
                        if(conteo > 0){
                            $('.bagde-number').html('<i class="icon-bell pulse"></i><span class="badge badge-pill badge-danger bagde-number" style="top: 40%; font-size: 10px;">'+conteo+'</span>')
                        }else{
                            $('.bagde-number').html('<i class="icon-bell">')
                        }

                            if(tipo == 'comercial' && nuevoConteoComercial > 0)
                                $('.comercial').html('<i class="fa fa-handshake-o pulse">')
                            else if(tipo == 'comercial' && nuevoConteoComercial == 0)
                                $('.comercial').html('<i class="fa fa-handshake-o">')

                            if(tipo == 'retiro' && nuevoConteoRetiros > 0)
                                $('.retiros').html('<i class="fa fa-user-times pulse">')
                            else if(tipo == 'retiro' && nuevoConteoRetiros == 0)
                                $('.retiros').html('<i class="fa fa-user-times">')

                            if(tipo == 'solicitud_personal' && nuevoConteoSolicitud > 0)
                                $('.solicitud_personales').html('<i class="fa fa-user-plus pulse">')
                            else if(tipo == 'solicitud_personal' && nuevoConteoSolicitud == 0)
                                $('.solicitud_personales').html('<i class="fa fa-user-plus">')

                            if(tipo == 'apodatos' && nuevoConteoApodatos > 0)
                                $('.apodatos').html('<i class="fa fa-check-square-o pulse">')
                            else if(tipo == 'apodatos' && nuevoConteoApodatos == 0)
                                $('.apodatos').html('<i class="fa fa-check-square-o">')

                            if(tipo == 'afiliaciones' && nuevoConteoAfiliaciones > 0)
                                $('.afiliaciones').html('<i class="fa fa-list-alt pulse">')
                            else if(tipo == 'afiliaciones' && nuevoConteoAfiliaciones == 0)
                                $('.afiliaciones').html('<i class="fa fa-list-alt">')
                    }
                });
            }
        });
    };
</script>