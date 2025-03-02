@extends('layouts.app.app')
@section('titulo')Localidades @endsection
@section('content')
@if (Auth::user()->hasrole('root') || Auth::user()->can('crear_localidad'))
<a href="#" data-toggle="modal" data-target="#modal_crear" class="btn btn-dark btn-pill" title="Crear">
   Agregar Localidad
</a>
<hr>
@endif
<div class="table-responsive">
    <table id="localidades_table"
        class="table theadcolor table-striped table-hover table-checkable dataTable no-footer dtr-inline">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Ciudad</th>
                <th>Acciones</th>
            </tr>
        </thead>
    </table>
    @include('localities.partials.modals')
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#localidades_table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [[1, "asc"]],
            "ajax": {
                "url": "{{ route('localitiesIndex') }}",
                "dataType": "json",
                "type": "GET",
                "data": { "_token": "{{ csrf_token() }}" }
            },
            columns: [
                { data: "id" },
                { data: "name" },
                { data: "ciudad" },
                {
                    data: "action",
                    render: function (data, type, full, meta) {
                        return ` 
                    @if (Auth::user()->hasrole('root') || Auth::user()->can('actualizar_localidad'))
                    <a href="javascript:void(0)" class="edit-modal btn btn-info" data-id="${data.id}" data-nombre="${data.name}" data-ciudad="${data.ciudad_id}" title="Editar"><i class="fa fa-edit"></i>
                    </a>
                    @endif`;
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
<script src="{{ asset('js/localities/gestion.js') }}"></script>
@endsection