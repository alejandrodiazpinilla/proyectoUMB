@extends('layouts.app.app')
@section('titulo')Inspección de Ruta @endsection
@section('content')
<div>
    @if (Auth::user()->hasrole('root') || Auth::user()->can('crear_inspeccion_ruta'))
    <a href="{{route('routeinspection.create')}}" class="btn btn-dark btn-pill" title="Crear">
        <span><i class="la la-plus"></i><span>Agregar</span></span>
    </a>
    <hr>
    @endif
    <div class="table-responsive">
        <table id="route_inspection_table" class="theadcolor table table-striped table-hover table-checkable dataTable no-footer dtr-inline">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Cliente</th>
                    <th>REVI</th>
                    <th>Registrado Por</th>
                    <th>Hora Inicio</th>
                    <th>Hora Fin</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
        @include('routeinspection.partials.modals')
    </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#route_inspection_table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [[ 1, "asc" ]],
            "ajax": {
                "url":"{{ route('routeInspectionIndex') }}",
                "dataType":"json",
                "type":"GET",
                "data":{"_token":"{{ csrf_token() }}"}
            },
            columns: [
                {data: "id"},
                {data: "cliente"},
                {data: "revi"},
                {data: "usuario"},
                {data: "hora_inicio"},
                {data: "hora_fin"},
                {data: "action",
                render: function (data,type,full,meta) {
                    return `
                    <div class='btn-group'>
                    <a href="javascript:void(0)" class="edit-modal btn btn-info"
                    data-id="${data.id}"
                    data-cliente="${data.cliente}"
                    data-tema="${data.revi}"
                    data-descripcion_revi="${full.action.description_revi}"
                    data-usuario="${data.usuario}"
                    data-fechai="${data.hora_inicio}"
                    data-fechaf="${data.hora_fin}"
                    data-imagen1="${data.initial_image}"
                    data-imagen2="${data.end_image}"
                    data-visitantes="${full.action.visitors}"
                    data-correspondencia="${full.action.correspondence}"
                    data-puesto="${full.action.workplace}"
                    data-parqueaderos="${full.action.parking}"
                    data-customer_id="${full.action.customer_id}"
                    data-customer_id="${full.action.customer_id}"
                    data-file_revi="${data.file_revi}"
                    data-archivo_revi="${full.archivo_revi}"
                    title="Editar"><i class="fa fa-edit"></i>
                    </a>
                    </div>`;
                },
                orderable: false
            }],
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            responsive: true,
            pagingType: "full_numbers"
        });
    });
</script>
<script src="{{ asset('js/routeinspection/gestion.js') }}"></script>
@endsection