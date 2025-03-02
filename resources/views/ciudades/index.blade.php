@extends('layouts.app.app')
@section('titulo')Ciudades @endsection
@section('content')
<div>
    @if (Auth::user()->hasrole('root') || Auth::user()->can('crear_ciudad'))
    <a href="#" data-toggle="modal" data-target="#modal_crear" class="btn btn-dark btn-pill" title="Crear">
        <span><i class="la la-plus"></i><span>Agregar Ciudad</span></span>
    </a>
    <hr>
    @endif
    <div class="table-responsive">
        <table id="ciudades_table" class="table theadcolor table-striped table-hover table-checkable dataTable no-footer dtr-inline">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Departamento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
        @include('ciudades.partials.modals')
    </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#ciudades_table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [[ 1, "asc" ]],
            "ajax": {
                "url":"{{ route('ciudadesIndex') }}",
                "dataType":"json",
                "type":"GET",
                "data":{"_token":"{{ csrf_token() }}"}
            },
            columns: [
                {data: "id"},
                {data: "nombre"},
                {data: "departamento"},
                {data: "action",
                render: function (data,type,full,meta) {
                    return ` 
                    @if (Auth::user()->hasrole('root') || Auth::user()->can('actualizar_ciudad'))
                    <a href="javascript:void(0)" class="edit-modal btn btn-info" data-id="${data.id}" data-nombreciudad="${data.nombre}" data-nombredepartamento="${data.departamento}" title="Editar"><i class="fa fa-edit"></i>
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
<script src="{{ asset('js/ciudades/gestion.js') }}"></script>
@endsection