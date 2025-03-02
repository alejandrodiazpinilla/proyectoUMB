@extends('layouts.app.app')
@section('titulo')Crear Novedad @endsection
@section('content')
<style type="text/css">
    @media (min-width:100px) {
        .margin-top {
            width: 150px;
            margin: 0px auto;
            padding-top: 2px;
        }
    }

    .upload_image img {
        border: 1px solid #dadada;
    }

    .img-responsive {
        display: block;
        max-width: 100%;
        height: auto;
    }

    .margin-top {
        top: 25%;
        right: 0;
        left: 0;
        margin: 0 auto;
    }
</style>
<script>
    function previewImage(nb) {        
        var reader = new FileReader();         
        reader.readAsDataURL(document.getElementById('img_novedad'+nb).files[0]);         
        reader.onload = function (e) {             
            document.getElementById('uploadPreview'+nb).src = e.target.result;         
        };     
    }  
</script>
<form id="form_crear" data-toggle="validator" role="form" enctype="multipart/form-data">
    <div>
        <h5>Agregar Novedad</h5>
        <hr>
    </div>
    <div class="modal-body">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                    <label for="tipo_novedad_id">Tipo de Novedad</label>
                    {{ Form::select('tipo_novedad_id', $tipos_novedades, null, ['class'=> 'form-control m-select2', 'id'=>'tipo_novedad_id', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
                </div>
            </div>
            <div class="col-md cambioTurno" hidden>
                <div class="form-group">
                    <label for="jornada">Jornada</label>
                    <select name="jornada" id="jornada" class="form-control">
                        <option value="" selected disabled readonly>Seleccione...</option>
                        <option value="Diurno">Diurno</option>
                        <option value="Nocturno">Nocturno</option>
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-md NovedadServicio" hidden>
                <div class="form-group">
                    <label for="tipo_novedad">Novedad</label>
                    <input type="text" name="tipo_novedad" id="tipo_novedad" class="form-control" placeholder="Novedad">
                </div>
            </div>
        </div>
        <div class="row cambioTurno" hidden>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nombre_entrante">Nombres Guarda Entrante</label>
                    {{ Form::select('nombre_entrante', $usuarios, null, ['class'=> 'form-control m-select2', 'id'=>'nombre_entrante', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nombre_saliente">Nombres Guarda Saliente</label>
                    {{ Form::select('nombre_saliente', $usuarios, null, ['class'=> 'form-control m-select2', 'id'=>'nombre_saliente', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
                </div>
            </div>
        </div>
        <div class="row NovedadServicio" hidden>
            <div class="col-12">
                <div class="card mb-4">
                    <h5 class="card-header text-info">Datos del Afectado</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre_afectado">Nombre</label>
                                    <input type="text" name="nombre_afectado" id="nombre_afectado" class="form-control" placeholder="Nombre del Afectado">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="datos_afectado">Torre/Casa/Apto</label>
                                    <input type="text" name="datos_afectado" id="datos_afectado" class="form-control" placeholder="Torre/Casa/Apto">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <div class="row NovedadServicio" hidden>
            <div class="col-md-6 mx-auto">
                <div class="upload_image">
                    <div class="custom-file ">
                        <input type="file" class="custom-file-input form-control" id="img_novedad1" name="img_novedad1" lang="es" accept="image/*" onchange="previewImage(1);" style="cursor: pointer;">
                        <label class="custom-file-label" for="img_novedad1" data-browse="Seleccionar">
                            Seleccione un imagen
                        </label>
                    </div>
                    <div class="col-md-3 margin-top">
                    <img id="uploadPreview1" class="img-responsive" width="150" height="150" src="{!! asset('img/foto_evidencia.jpg') !!}"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" rows="2" placeholder="Descripción de la Novedad" Required></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            {{ Form::submit('Registrar', array('class' => 'btn btn-success')) }}
            <a href="{{route('noveltieswatchmen.index')}}" type="button" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
</form>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/noveltieswatchmen/gestion.js') }}"></script>
@endsection