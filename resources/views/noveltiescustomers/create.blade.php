@extends('layouts.app.app')
@section('titulo')Crear Novedad @endsection
@section('content')
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
        reader.readAsDataURL(document.getElementById('image').files[0]);         
        reader.onload = function (e) {             
            document.getElementById('uploadPreview').src = e.target.result;         
        };     
    }  
</script>
<form id="form_crear" data-toggle="validator" role="form" enctype="multipart/form-data">
    <div>
        <h5>Agregar Novedad</h5>
        <hr>
    </div>
    <div class="modal-body">
        @csrf
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                    <label for="novelty_type_id">Tipo de Novedad</label>
                    {{ Form::select('novelty_type_id', $tipos_novedades, null, ['class'=> 'form-control m-select2', 'id'=>'novelty_type_id', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
                </div>
            </div>
            <div class="col-md novedadGuarda" hidden>
                <div class="form-group">
                    <label for="watchman_name_id">Nombre Guarda</label>
                    {{ Form::select('watchman_name_id', $usuarios, null, ['class'=> 'form-control m-select2', 'id'=>'watchman_name_id', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="novelty_type_name">Novedad</label>
                    <input type="text" name="novelty_type_name" id="novelty_type_name" class="form-control" placeholder="Novedad" required>
                </div>
            </div>
        </div>
       <div class="row NovedadServicio" hidden>
            <div class="col-md-6 mx-auto">
                <div class="upload_image">
                    <div class="custom-file ">
                        <input type="file" class="custom-file-input form-control" id="image" name="image" lang="es" accept="image/*" onchange="previewImage(1);" style="cursor: pointer;" required>
                        <label class="custom-file-label" for="image" data-browse="Seleccionar">
                            Seleccione un imagen
                        </label>
                    </div>
                    <div class="col-md-3 margin-top">
                    <img id="uploadPreview" class="img-responsive" width="150" height="150" src="{!! asset('img/foto_evidencia.jpg') !!}"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea name="description" id="description" class="form-control" rows="2" placeholder="Descripción de la Novedad" Required></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            {{ Form::submit('Registrar', array('class' => 'btn btn-success')) }}
            <a href="{{route('noveltiescustomers.index')}}" type="button" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
</form>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/noveltiescustomers/gestion.js') }}"></script>
@endsection