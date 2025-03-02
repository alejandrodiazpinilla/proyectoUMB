@extends('layouts.app.app')
@section('titulo')Permisos @endsection
@section('content')
<div class="card" style="padding: 30px;">
    <div class="card-body">
        <div class="m-portlet__head-tools">
            <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                <li class="m-portlet__nav-item">
                    <a href="#" data-toggle="modal" data-target="#modal_crear" class="btn btn-dark btn-pill">
                        <span><i class="la la-plus"></i><span>Nuevo</span></span>
                    </a>
                </li>
            </ul>
        </div>
        <hr>
    <div class="table-responsive">
        <table id="permisos_table" class="table table-striped  table-hover table-checkable dataTable no-footer dtr-inline theadcolor">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
        @include('permissions.partials.modals')
    </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#permisos_table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url":"{{ route('permissionsIndex') }}",
                "dataType":"json",
                "type":"GET",
                "data":{"_token":"{{ csrf_token() }}"}
            },
            columns: [
                {data: "display_name"},
                {data: "action",
                render: function (data,type,full,meta) {
                    return ` 
                    <a href="javascript:void(0)" class="edit-modal btn btn-dark" title="Editar" data-id="${data.id}" data-display="${data.display_name}"><i class="fa fa-edit"></i></a>
                    `;
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
<script src="{{ asset('js/permissions/gestion.js') }}"></script>
@endsection


