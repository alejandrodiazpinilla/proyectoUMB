@extends('layouts.app.app')
@section('titulo')Roles @endsection
@section('content')
<div class="card" style="padding: 30px;">
    <div class="card-body">
        <div class="m-portlet__head-tools">
            <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm"
                role="tablist">
                <li class="m-portlet__nav-item">
                    <a href="#" data-toggle="modal" data-target="#modal_crear" class="btn btn-dark btn-pill"
                        title="Agregar">
                        <span><i class="la la-plus"></i><span>Nuevo</span></span>
                    </a>
                </li>
            </ul>
        </div>
        <hr>
        <div class="table-responsive">
            <table id="roles_table" class="table theadcolor table-striped dataTable">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $rol)
                    <tr>
                        <td>{{ $rol->display_name }}</td>
                        <td>
                            <div class='btn-group'>
                                <a href="javascript:void(0)"
                                    class="edit-modal btn btn-dark"
                                    data-id="{{$rol->id}}" data-display="{{ $rol->display_name }}" data-permisos="
                                    <?php 
                                    $datos ="";
                                    foreach ($rol->permissions as $key => $permiso){
                                    if ($datos==""){
                                    $datos .= $permiso->pivot->permission_id;
                                    } else {
                                    $datos .=','.$permiso->pivot->permission_id;
                                    }
                                    }
                                    echo trim($datos); 
                                    ?>" data-empresa="{{ $rol->empresa_id }}" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void(0)"
                                    class="delete-modal btn btn-danger"
                                    data-id="{{$rol->id}}" title="Eliminar">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @include('roles.partials.modals')
        </div>
    </div>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/roles/gestion.js') }}"></script>
@endsection