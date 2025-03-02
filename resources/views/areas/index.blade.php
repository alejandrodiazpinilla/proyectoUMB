@extends('layouts.app.app')
@section('titulo')Areas @endsection
@section('content')
<div>
    @if (Auth::user()->hasrole('root') || Auth::user()->can('crear_area'))
    <a href="#" data-toggle="modal" data-target="#modal_crear" class="btn btn-dark btn-pill" title="Crear">
        <span><i class="la la-plus"></i><span>Agregar Area</span></span>
    </a>
    <hr>
    @endif
    <div class="table-responsive">
        <table id="areas_table" class="theadcolor table table-striped table-hover table-checkable dataTable no-footer dtr-inline">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Empresa</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
        @include('areas.partials.modals')
    </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#areas_table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [[ 1, "asc" ]],
            "ajax": {
                "url":"{{ route('areasIndex') }}",
                "dataType":"json",
                "type":"GET",
                "data":{"_token":"{{ csrf_token() }}"}
            },
            columns: [
                {data: "id"},
                {data: "nombre"},
                {data: "empresa"},
                {data: "estado"},
                {data: "action",
                render: function (data,type,full,meta) {
                    return `<div class='btn-group'>
                    @if (Auth::user()->hasrole('root') || Auth::user()->can('actualizar_area'))
                    <a href="javascript:void(0)" class="edit-modal btn btn-info" 
                    data-id="${data.id}" data-nombrearea="${data.nombre}" data-empresa="${data.empresa_id}" 
                    title="Editar"><i class="fa fa-edit"></i>
                    </a>
                    @endif
                    @if (Auth::user()->hasrole('root') || Auth::user()->can('bloquear_area'))
                    `+
                    ((data.estado == 0)?
                        `<a href="javascript:void(0)" class="activarArea btn btn-success" title="Activar" data-id="${data.id}" data-estado="${data.estado}">
                        <i class="icons cui-circle-check"></i> 
                        </a>`
                        :
                        `<a href="javascript:void(0)" class="activarArea btn btn-danger" title="Bloquear" data-id="${data.id}" data-estado="${data.estado}">
                        <i class="icons cui-circle-x"></i> 
                        </a>`)+
                    `@endif
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
<script src="{{ asset('js/areas/gestion.js') }}"></script>
@endsection