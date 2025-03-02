@extends('layouts.app.app')
@section('titulo')Usuarios @endsection
@section('content')
<style type="text/css">
    .upload_image img {
        border: 1px solid #dadada;
    }
    .img-responsive{
        display:block;
        max-width:100%;
        height:auto;
    }
    .margin-top{
        width: 288px;
        margin: 0px auto;
        padding-top:6px;
    }

</style>
<script>
    function previewImage(nb) {        
        var reader = new FileReader();         
        reader.readAsDataURL(document.getElementById('firmaUsuario'+nb).files[0]);         
        reader.onload = function (e) {             
            document.getElementById('uploadPreview'+nb).src = e.target.result;         
        };     
    }
</script>

    @if (Auth::user()->hasrole('root') || Auth::user()->can('crear_usuario'))
    <a href="#" data-toggle="modal" data-target="#modal_crear" class="btn btn-dark btn-pill modal_crear" title="Agregar">
        Agregar Usuario
    </a>
    @endif
    <hr>
    <div class="table-responsive">
        <table id="users_table" class="theadcolor table table-striped table-hover table-checkable dataTable no-footer dtr-inline">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Cargo</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
    </table>
</div>
    @include('users.partials.modals')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#users_table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [[ 0, "asc" ]],
            "ajax": {
                "url":"{{ route('usersIndex') }}",
                "dataType":"json",
                "type":"GET",
                "data":{"_token":"{{ csrf_token() }}"}
            },
            columns: [
                {data: "name"},
                {data: "username"},
                {data: "email"},
                {data: "cargo"},
                {data: "estado"},
                {data: "action",
                render: function (data,type,full,meta) {
                    var arrayRoles = [];
                    var keys = Object.values(data.roles_id);
                    keys.forEach((item,index) => {
                        arrayRoles.push(item.nombre_rol)
                    });

                    var arrayEmpresas = [];
                    var keys = Object.values(data.empresa);
                    keys.forEach((item,index) => {
                        arrayEmpresas.push(item.nombre_empresa.id)
                    });

                    var arrayAreas = [];
                    var keys = Object.values(data.areas);
                    keys.forEach((item,index) => {
                        arrayAreas.push(item.nombre_areas.id)
                    });
                    return `<div class='btn-group'>
                    @if (Auth::user()->hasrole('root') || Auth::user()->can('actualizar_usuario'))
                    <a href="javascript:void(0)" class="edit-modal btn btn-info"  data-id="${data.id}" data-name="${data.name}" data-username="${data.username}" data-email="${data.email}" data-firma="${data.signature}" data-cargo="${data.cargo}" data-area="${arrayAreas}" data-empresa="${arrayEmpresas}"  data-rol="${arrayRoles}" data-customer_id="${full.action.customer_id}" title="Editar">
                    <i class="fa fa-edit"></i>
                    </a>
                    @endif
                    @if (Auth::user()->hasrole('root') || Auth::user()->can('bloquear_usuario'))
                    `+
                    ((data.estado == 0)?
                        `<a href="javascript:void(0)" class="activarUsuario btn btn-success" title="Activar" data-id="${data.id}">
                        <i class="icons cui-circle-check"></i> 
                        </a>`
                        :
                        `<a href="javascript:void(0)" class="activarUsuario btn btn-danger" title="Bloquear" data-id="${data.id}">
                        <i class="icons cui-circle-x"></i> 
                        </a>`)+
                    `@endif
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
<script src="{{ asset('js/users/gestion.js') }}"></script>
<script>
    $(document).ready(function() {
$("#empresa, #empresa_act").select2({
      theme: 'bootstrap',
      language: {
        noResults: function () { return "No hay resultados"; },
        searching: function () { return "Buscando.."; }
      },
      placeholder: "Seleccione..."
    });
    });
</script>
@endsection