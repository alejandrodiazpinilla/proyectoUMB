@extends('layouts.app.app')
@section('titulo')Estado Civil @endsection
@section('content')
@if (Auth::user()->hasrole('root') || Auth::user()->can('crear_estado_civil'))
<a href="#" data-toggle="modal" data-target="#modal_crear" class="btn btn-dark btn-elevate btn-pill" title="Crear">
Agregar Estado Civil
</a>
<hr>
@endif
<div class="table-responsive">
    <table id="maritalstatus_table" class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
    </table>
</div>
@include('maritalstatus.partials.modals')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#maritalstatus_table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [[ 1, "asc" ]],
            "ajax": {
                "url":"{{ route('maritalStatusIndex') }}",
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
                    @if (Auth::user()->hasrole('root') || Auth::user()->can('actualizar_estado_civil'))
                <a href="javascript:void(0)" class="edit-modal btn btn-info" data-id="${data.id}" data-nombre="${data.name}" title="Editar">
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
<script src="{{ asset('js/maritalstatus/gestion.js') }}"></script>
@endsection