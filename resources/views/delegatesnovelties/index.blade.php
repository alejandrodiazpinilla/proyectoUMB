@extends('layouts.app.app')
@section('titulo')Encargados de Novedades @endsection
@section('content')
@if (Auth::user()->hasrole('root') || Auth::user()->can('crear_encargado_novedad'))
<a href="#" data-toggle="modal" data-target="#modal_crear" class="btn btn-dark btn-elevate btn-pill" title="Crear">
    <span><i class="la la-plus"></i><span>Agregar Encargado de Novedad</span></span>
</a>
<hr>
@endif
<div class="table-responsive">
    <table id="encargados_table" class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
    </table>
</div>
@include('delegatesnovelties.partials.modals')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#encargados_table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [[ 1, "asc" ]],
            "ajax": {
                "url":"{{ route('delegatesNoveltiesIndex') }}",
                "dataType":"json",
                "type":"GET",
                "data":{"_token":"{{ csrf_token() }}"}
            },
            columns: [
            {data: "id"},
            {data: "name"},
            {data: "action",
            render: function (data,type,full,meta) {
                return `
                <div class='btn-group'>
                    @if (Auth::user()->hasrole('root') || Auth::user()->can('actualizar_encargado_novedad'))
                <a href="javascript:void(0)" class="edit-modal btn btn-info" data-id="${data.id}" data-nombreencargado="${data.name}" title="Editar">
                <i class="fa fa-edit"></i>
                </a>
                @endif
                </div>`;
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
<script src="{{ asset('js/delegatesnovelties/gestion.js') }}"></script>
@endsection