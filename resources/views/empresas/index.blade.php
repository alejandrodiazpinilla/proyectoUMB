@extends('layouts.app.app')
@section('titulo')Empresas @endsection
@section('content')
<div>
    @if (Auth::user()->hasrole('root') || Auth::user()->can('crear_empresa'))
    <a href="{{route('empresas.create')}}" class="btn btn-dark btn-pill" title="Crear">
        <span><i class="la la-plus"></i><span>Nueva Empresa</span></span>
    </a>
    <hr>
    @endif
    <div class="table-responsive">
        <table id="empresas_table" class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline">
            <thead>
                <tr>
                    <th>Empresa</th>
                    <th>NIT</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Celular</th>
                    <th>Ciudad</th>
                    <th>Observaciones</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
        @include('empresas.partials.modals')
    </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#empresas_table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [[ 0, "asc" ]],
            "ajax": {
                "url":"{{ route('empresasIndex') }}",
                "dataType":"json",
                "type":"GET",
                "data":{"_token":"{{ csrf_token() }}"}
            },
            columns: [
                {data: "nombre"},
                {data: "nit"},
                {data: "direccion"},
                {data: "telefono"},
                {data: "celular"},
                {data: "ciudad"},
                {data: "observaciones"},
                {data: "action",
                render: function (data,type,full,meta) {
                    return `<div class='btn-group'>
                    @if (Auth::user()->hasrole('root') || Auth::user()->can('actualizar_empresa'))
                    <a href="${baseUrl}/empresas/${full.id}/edit" class="edit-modal btn btn-info title="Editar">
                    <i class="fa fa-edit"></i>
                    </a>
                    @endif
                    </div>
                    `;
                },
                orderable: false
            }],
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            responsive: true,
            pagingType: "full_numbers",
        });
    });
</script>
<script src="{{ asset('js/empresas/gestion.js') }}"></script>
@endsection