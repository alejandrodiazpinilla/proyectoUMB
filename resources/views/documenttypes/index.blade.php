@extends('layouts.app.app')
@section('titulo')Tipos de Documentos @endsection
@section('content')
@if (Auth::user()->hasrole('root') || Auth::user()->can('crear_tipo_documento'))
<a href="#" data-toggle="modal" data-target="#modal_crear" class="btn btn-dark btn-elevate btn-pill" title="Crear">
Agregar Tipo de Documento
</a>
<hr>
@endif
<div class="table-responsive">
    <table id="tipos_docs_table" class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>abreviación</th>
                <th>Acciones</th>
            </tr>
        </thead>
    </table>
</div>
@include('documenttypes.partials.modals')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tipos_docs_table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [[ 1, "asc" ]],
            "ajax": {
                "url":"{{ route('documentTypesIndex') }}",
                "dataType":"json",
                "type":"GET",
                "data":{"_token":"{{ csrf_token() }}"}
            },
            columns: [
            {data: "id"},
            {data: "name"},
            {data: "abbreviation"},
            {data: "action",
            render: function (data,type,full,meta) {
                return `
                <div class='btn-group'>
                @if (Auth::user()->hasrole('root') || Auth::user()->can('actualizar_tipo_documento'))
                <a href="javascript:void(0)" class="edit-modal btn btn-info" data-id="${data.id}" data-nombre="${data.name}" data-abreviacion="${data.abbreviation}" data-categoria="${data.document_category_id}"  title="Editar">
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
<script src="{{ asset('js/documenttypes/gestion.js') }}"></script>
@endsection