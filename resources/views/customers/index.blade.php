@extends('layouts.app.app')
@section('titulo')Clientes @endsection
@section('content')
<style type="text/css">
  @media (min-width: 1024px) {
    .modal-xl {
      max-width: 1000px;
    }
  }
</style>

@if (Auth::user()->hasrole('root') || Auth::user()->can('crear_cliente'))
<div class="header">
        <a href="{{route('customers.create')}}" class="btn btn-dark btn-pill" title="Crear">
            <span><i class="la la-plus"></i><span>Nuevo Cliente</span></span>
        </a>
</div>
<hr>
@endif
<div class="table-responsive">
    <table id="customers_table" class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Administrador</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Localidad</th>
                <th>Fecha Final Contrato</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
    </table>
</div>
@include('customers.partials.modals')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#customers_table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [[ 1, "asc" ]],
            "ajax": {
                "url":"{{ route('customersIndex') }}",
                "dataType":"json",
                "type":"GET",
                "data":{"_token":"{{ csrf_token() }}"}
            },
            columns: [
            {data: 'name'},
            {data: 'admin_name'},
            {data: 'telephone'},
            {data: 'email'},
            {data: 'localidad'},
            {data: 'current_contract_end_date'},
            {data: 'state'},
            {data: 'action',
            render: function (data,type,full,meta) {
                return `
                <div class="btn-group">
                @if (Auth::user()->hasrole('root') || Auth::user()->can('actualizar_cliente'))
                <a href="${baseUrl}/customers/${full.crypt_id}/edit" class="btn btn-info" title="Editar">
                <i class="fa fa-edit"></i>
                </a>
                @endif
                @if (Auth::user()->hasrole('root') || Auth::user()->can('bloquear_cliente'))
                    `+
                    ((data.state == 0)?
                        `<a href="javascript:void(0)" class="activar btn btn-success" title="Activar" data-id="${full.crypt_id}" data-estado="${data.state}">
                        <i class="icons cui-circle-check"></i>
                        </a>`
                        :
                        `<a href="javascript:void(0)" class="activar btn btn-danger" title="Bloquear" data-id="${full.crypt_id}" data-estado="${data.state}">
                        <i class="icons cui-circle-x"></i>
                        </a>`
                    )+
                `@endif
                <a href="javascript:void(0)" class="btnVerCliente btn btn-primary" data-logo="${data.logo}" data-company_name="${data.company_name}" data-name="${data.name}" data-admin_name="${data.admin_name}" data-telephone="${data.telephone}" data-email="${data.email}" data-current_contract_end_date="${full.current_contract_end_date}" data-contract_init_date="${full.contract_init_date}" data-contract_end_date="${full.contract_end_date}" data-residential_units="${data.residential_units}" data-address="${data.address}" data-city_name="${full.city_name}" data-localidad="${full.localidad}" data-neighborhood_name="${full.neighborhood_name}" title="Ver">
                <i class="fa fa-eye"></i>
                </a>
                </div>
                `;
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
<script src="{{ asset('js/customers/gestion.js') }}"></script>
@endsection
