@extends('layouts.app.app')
@section('titulo')Novedades / Clientes @endsection
@section('content')
@if (Auth::user()->hasrole('root') || Auth::user()->can('crear_novedad_cliente'))
<a href="{{route('noveltiescustomers.create')}}" class="btn btn-dark btn-pill mb-4" title="Crear">
    <span><i class="la la-plus"></i><span>Agregar</span></span>
</a>
@endif
<div class="table-responsive">
    <table id="noveltiescustomer_table" class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tipo de Novedad</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Fecha de Creación</th>
                <th>Acciones</th>
            </tr>
        </thead>
    </table>
</div>
@include('noveltiescustomers.partials.modals')
<script src="{{asset('js/jquery.min.js')}}"></script> 
<script type="text/javascript">
    $(document).ready(function() {
        $('#noveltiescustomer_table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [[ 0, "desc" ]],
            "ajax": {
                "url":"{{ route('NoveltycustomerIndex') }}",
                "dataType":"json",
                "type":"GET",
                "data":{"_token":"{{ csrf_token() }}"}
            },
            columns: [
            {data: "id"},
            {data: "tipo_novedad"},
            {data: "description"},
            {data: "state"},
            {data: "created_at"},
            {data: "action",
            render: function (data,type,full,meta) {
                return `
                <div class="btn-group">
                <a href="javascript:void(0)" class="btnVerNovedad btn btn-dark" data-novelty_type_id="${data.novelty_type_id}" data-tipo_novedad="${data.tipo_novedad}" data-watchman_name="${data.nombre_guarda}" data-image="${full.image}" data-novelty_type_name="${data.novelty_type_name}" data-description="${data.description}" data-description_action="${data.description_action}" data-tipo_accion="${data.tipo_accion}" data-action_type="${data.action_type}" title="Editar">
                <i class="fa fa-eye"></i>
                `+
                ((data.action_type == 'Por Gestionar')?
                `@if (Auth::user()->hasrole('root') || Auth::user()->can('gestionar_novedad_cliente'))
                <a href="javascript:void(0)" class="btnGestionar btn bg-yellow text-dark" data-id="${full.crypt_id}" data-novelty_type_id="${data.novelty_type_id}" data-tipo_novedad="${data.tipo_novedad}" data-watchman_name="${data.nombre_guarda}" data-image="${full.image}" data-action_type="${data.action_type}" data-novelty_type_name="${data.novelty_type_name}" data-description="${data.description}" title="Editar">
                <i class="fa fa-pencil-square-o"></i>
                </a>
                @endif`:'')+
                `</div>`;
            },
            orderable: false
        }],
        "oLanguage": {
            "sUrl": baseUrl + "/plugins/datatables/es_es.json"
        },
        responsive: true,
        pagingType: "full_numbers"
    });
    });
</script>
<script src="{{ asset('js/noveltiescustomers/gestion.js') }}"></script>
@endsection