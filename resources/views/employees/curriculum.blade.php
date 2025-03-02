@extends('layouts.app.app')
@section('titulo')Crear Curriculum @endsection
@section('content')

<form id="form_crear" data-toggle="validator" role="form" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal-header">
        <h5 class="modal-title">Agregar Curriculum</h5>
    </div>
    <div class="">
        <input type="hidden" id="id" name="id" value="{{ Crypt::encryptString($empleado->id) }}">
        <input type="hidden" id="identification" name="identification" value="{{ $empleado->identification }}">
        <div class="mt-4">
            <div class="row">
                <div class="col-sm-offset-1 col-sm-12">
                    <div class="card card-accent-warning">
                        <div class="card-header font-weight-bold">Afiliaciones</div>
                        <div class="card-body">
                            <div>
                                <div class="row">
                                    <div class="col-md">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control"
                                                    id="afiliacionFile" name="afiliacionFile" lang="es"
                                                    style="cursor: pointer;" accept="application/pdf">
                                                <label class="custom-file-label lblAfiliacion" for="afiliacionFile"
                                                    data-browse="PDF">
                                                    Seleccione un archivo
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        {{ Form::select('affiliation_id', $afiliaciones, null, ['class' => 'form-control
                                        select2-single', 'id' => 'affiliation_id', 'placeholder' => 'Seleccione...',
                                        'style' => 'width:100%;']) }}
                                    </div>
                                    <div class="col-md">
                                        <textarea name="obs_adjunto_afiliacion"
                                            class="form-control obs_adjunto_afiliacion" id="obs_adjunto_afiliacion"
                                            rows="1" placeholder="Observación"
                                            style="padding: 0.75rem 1rem;"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="pointer btn bg-cyan text-white btn-elevate btn-pill" title="Agregar"
                                    id="agregar_adjunto_afiliacion">
                                    <span><i class="fa fa-plus"></i><span>Agregar</span></span>
                                </button>
                            </div>
                            <input type="hidden" id="nombre_adjunto_afiliacion" name="nombre_adjunto_afiliacion">
                            <div class="row">
                                <div class="mt-3 col-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline mb-0"
                                            cellspacing="0" style="white-space: inherit!important;">
                                            <thead>
                                                <th class="text-center">Nombre</th>
                                                <th class="text-center">Observación</th>
                                                <th class="text-center">Acciones</th>
                                            </thead>
                                            <tbody id="body_adjunto_afiliacion">
                                                @foreach ($empleado->rel_afiliaciones as $item)
                                                <tr>
                                                    <td class="text-center">{{ $item->file }}</td>
                                                    <td class="text-center">{{ $item->rel_afiliacion->name.': '.$item->description }}</td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            @if(Auth::user()->hasRole('root'))
                                                            <a title="Eliminar" href="javascript:void(0)"
                                                                class="eliminarArchivoEstudio btn btn-danger btn-xs"
                                                                data-nombre="{{ $item->file }}">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                            @endif
                                                            <a title="Descargar"
                                                                href="/Adjuntos/Afiliaciones/{{ $item->file }}"
                                                                target="_blank"
                                                                class="descargarArchivoEstudio btn btn-dark btn-xs">
                                                                <i class="fa fa-download"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="">
            <div class="row">
                <div class="col-sm-offset-1 col-sm-12">
                    <div class="card card-accent-warning">
                        <div class="card-header font-weight-bold">Estudios</div>
                        <div class="card-body">
                            <div>
                                <div class="row">
                                    <div class="col-md">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control"
                                                    id="upload_estudio" name="upload_estudio" lang="es"
                                                    style="cursor: pointer;" accept="application/pdf">
                                                <label class="custom-file-label lblEstudio" for="upload_estudio"
                                                    data-browse="PDF">
                                                    Seleccione un archivo
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        {{ Form::select('estudio', $estudios, null, ['class' => 'form-control
                                        select2-single', 'id' => 'estudio', 'placeholder' =>
                                        'Seleccione...', 'style' =>
                                        'width:100%;']) }}
                                    </div>
                                    <div class="col-md">
                                        <textarea name="obs_adjunto_estudio" class="form-control obs_adjunto_estudio"
                                            id="obs_adjunto_estudio" rows="1" placeholder="Observación"
                                            style="padding: 0.75rem 1rem;"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="pointer btn bg-cyan text-white btn-elevate btn-pill" title="Agregar"
                                    id="agregar_adjunto_estudio">
                                    <span><i class="fa fa-plus"></i><span>Agregar</span></span>
                                </button>
                            </div>
                            <input type="hidden" id="nombre_adjunto_estudio" name="nombre_adjunto_estudio">
                            <div class="row">
                                <div class="mt-3 col-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline mb-0"
                                            cellspacing="0" style="white-space: inherit!important;">
                                            <thead>
                                                <th class="text-center">Nombre</th>
                                                <th class="text-center">Observación</th>
                                                <th class="text-center">Acciones</th>
                                            </thead>
                                            <tbody id="body_adjunto_estudio">
                                                @foreach ($empleado->rel_estudios as $item)
                                                <tr>
                                                    <td class="text-center">{{ $item->file }}</td>
                                                    <td class="text-center">{{ $item->rel_estudio->name.': '.$item->description }}</td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            @if(Auth::user()->hasRole('root'))
                                                            <a title="Eliminar" href="javascript:void(0)"
                                                                class="eliminarArchivoEstudio btn btn-danger btn-xs"
                                                                data-nombre="{{ $item->file }}">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                            @endif
                                                            <a title="Descargar"
                                                                href="/Adjuntos/Estudios/{{ $item->file }}"
                                                                target="_blank"
                                                                class="descargarArchivoEstudio btn btn-dark btn-xs">
                                                                <i class="fa fa-download"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="">
            <div class="row">
                <div class="col-sm-offset-1 col-sm-12">
                    <div class="card card-accent-warning">
                        <div class="card-header font-weight-bold">Antecedentes
                            <i class="pull-right fa fa-external-link pointer" data-toggle="tooltip" data-placement="top"
                                title="Lista de Vínculos" id="linksAntecedentes"></i>
                        </div>
                        <div class="card-body">
                            <textarea id="linksAnt" hidden>
                                @foreach ($antecedentes as $a)
                                <div class="row">
                                    <div class="col-md-6 mx-auto">
                                        <div class="form-group">
                                            <a href="{{ $a->url }}" target="_blank">{{ $a->name }}</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </textarea>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input form-control"
                                                id="upload_antecedente" name="upload_antecedente" lang="es"
                                                style="cursor: pointer;" accept="application/pdf">
                                            <label class="custom-file-label lblAntecedente" for="upload_antecedente"
                                                data-browse="PDF">
                                                Seleccione un archivo
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <select name="antecedente_id" id="antecedente_id" class="form-control
                                    select2-single" placeholder="Seleccione..." style="width:100%;">
                                        <option value="" selected readonly disabled>Seleccione...</option>
                                        @foreach ($antecedentes as $a)
                                        <option value="{{ $a->id }}">{{ $a->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md">
                                    <textarea name="obs_adjunto_antecedente"
                                        class="form-control obs_adjunto_antecedente" id="obs_adjunto_antecedente"
                                        rows="1" placeholder="Observación" style="padding: 0.75rem 1rem;"></textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="pointer btn bg-cyan text-white btn-elevate btn-pill" title="Agregar"
                                    id="agregar_adjunto_antecedente">
                                    <span><i class="fa fa-plus"></i><span>Agregar</span></span>
                                </button>
                            </div>
                            <input type="hidden" id="nombre_adjunto_antecedente" name="nombre_adjunto_antecedente">
                            <div class="row">
                                <div class="mt-3 col-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline mb-0"
                                            cellspacing="0" style="white-space: inherit!important;">
                                            <thead>
                                                <th class="text-center">Nombre</th>
                                                <th class="text-center">Observación</th>
                                                <th class="text-center">Acciones</th>
                                            </thead>
                                            <tbody id="body_adjunto_antecedente">
                                                @foreach ($empleado->rel_antecedentes as $item)
                                                <tr>
                                                    <td class="text-center">{{ $item->file }}</td>
                                                    <td class="text-center">{{ $item->rel_antecedente->name.': '.$item->description }}</td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            @if(Auth::user()->hasRole('root'))
                                                            <a title="Eliminar" href="javascript:void(0)"
                                                                class="eliminarArchivoAntecedente btn btn-danger btn-xs"
                                                                data-nombre="{{ $item->file }}">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                            @endif
                                                            <a title="Descargar"
                                                                href="/Adjuntos/Antecedentes/{{ $item->file }}"
                                                                target="_blank"
                                                                class="descargarArchivoAntecedente btn btn-dark btn-xs">
                                                                <i class="fa fa-download"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="">
            <div class="row">
                <div class="col-sm-offset-1 col-sm-12">
                    <div class="card card-accent-warning">
                        <div class="card-header font-weight-bold">Otros Documentos
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input form-control"
                                                id="upload_otros" name="upload_otros" lang="es"
                                                style="cursor: pointer;" accept="application/pdf">
                                            <label class="custom-file-label lblOtros" for="upload_otros"
                                                data-browse="PDF">
                                                Seleccione un archivo
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <select name="otros_id" id="otros_id" class="form-control
                                    select2-single" placeholder="Seleccione..." style="width:100%;">
                                        <option value="" selected readonly disabled>Seleccione...</option>
                                        @foreach ($otros as $o)
                                        <option value="{{ $o->id }}">{{ $o->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md otros_cual" hidden>
                                    <div class="form-group">
                                        <input type="text" name="otros_cual" id="otros_cual" class="form-control"
                                            placeholder="¿Cuál?">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <textarea name="obs_adjunto_otros"
                                        class="form-control obs_adjunto_otros" id="obs_adjunto_otros"
                                        rows="1" placeholder="Observación" style="padding: 0.75rem 1rem;"></textarea>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <button class="pointer btn bg-cyan text-white btn-elevate btn-pill" title="Agregar"
                                    id="agregar_adjunto_otros">
                                    <span><i class="fa fa-plus"></i><span>Agregar</span></span>
                                </button>
                            </div>
                            <input type="hidden" id="nombre_adjunto_otros" name="nombre_adjunto_otros">
                            <div class="row">
                                <div class="mt-3 col-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline mb-0"
                                            cellspacing="0" style="white-space: inherit!important;">
                                            <thead>
                                                <th class="text-center">Nombre</th>
                                                <th class="text-center">Observación</th>
                                                <th class="text-center">Acciones</th>
                                            </thead>
                                            <tbody id="body_adjunto_otros">
                                                @foreach ($empleado->rel_otros as $item)
                                                <tr>
                                                    <td class="text-center">{{ $item->file }}</td>
                                                    <td class="text-center">{{ ($item->other_document_id == 9?$item->which_document:$item->rel_otro->name).': '.$item->description }}</td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            @if(Auth::user()->hasRole('root'))
                                                            <a title="Eliminar" href="javascript:void(0)"
                                                                class="eliminarArchivoOtros btn btn-danger btn-xs"
                                                                data-nombre="{{ $item->file }}">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                            @endif
                                                            <a title="Descargar"
                                                                href="/Adjuntos/OtrosDocumentosCurriculum/{{ $item->file }}"
                                                                target="_blank"
                                                                class="descargarArchivoOtros btn btn-dark btn-xs">
                                                                <i class="fa fa-download"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="">
            <div class="row">
                <div class="col-sm-offset-1 col-sm-12">
                    <div class="card card-accent-warning">
                        <div class="card-header font-weight-bold">Experiencia Laboral</div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label>Fecha Inicial</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="fecha_ini_exp"
                                                id="fecha_ini_exp" autocomplete="off" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label>Fecha Final</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="fecha_fin_exp"
                                                id="fecha_fin_exp" autocomplete="off" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="compania_exp">Compañía</label>
                                        <input type="text" name="compania_exp" id="compania_exp" class="form-control"
                                            placeholder="Empresa donde laboró">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="cargo_exp">Cargo</label>
                                        <input type="text" name="cargo_exp" id="cargo_exp" class="form-control"
                                            placeholder="Cargo que desempeñó en la compañía">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="jefe_exp">Jefe Inmediato</label>
                                        <input type="text" name="jefe_exp" id="jefe_exp" class="form-control blockText" placeholder="Jefe Inmediato">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="tel_jefe_exp">Teléfono de Contacto</label>
                                        <input type="number" min="2000000" minlength="7" maxlength="10"
                                            name="tel_jefe_exp" pattern="" id="tel_jefe_exp"
                                            class="form-control blockNums" placeholder="Teléfono"
                                            title="7 a 10 caracteres"
                                            oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="funciones_exp">Funciones</label>
                                        <textarea name="funciones_exp" id="funciones_exp" class="form-control"
                                            placeholder="Funciones realizadas en la compañía" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="pointer btn bg-cyan text-white btn-elevate btn-pill" title="Agregar"
                                    id="agregarExperiencia">
                                    <span><i class="fa fa-plus"></i><span>Agregar</span></span>
                                </button>
                            </div>
                            <input type="hidden" name="jsonTableExp" id="jsonTableExp">
                            <div class="row">
                                <div class="mt-3 col-12">
                                    <div class="table-responsive">
                                        <table id="tableExperiencia"
                                            class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline mb-0"
                                            cellspacing="0" style="white-space: inherit!important;">
                                            <thead>
                                                <tr>
                                                    <th>Fecha Inicio</th>
                                                    <th>Fecha Terminación</th>
                                                    <th>Compañía</th>
                                                    <th>Cargo</th>
                                                    <th>Jefe Inmediato</th>
                                                    <th>Teléfono Jefe</th>
                                                    <th>Funciones Realizadas</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="bodyExperiencia">
                                                @foreach ($empleado->rel_experiencia as $item)
                                                <tr>
                                                    <td class="text-center">{{ $item->start_date }}</td>
                                                    <td class="text-center">{{ $item->end_date }}</td>
                                                    <td class="text-center">{{ $item->company_name }}</td>
                                                    <td class="text-center">{{ $item->position }}</td>
                                                    <td class="text-center">{{ $item->immediate_boss }}</td>
                                                    <td class="text-center">{{ $item->telephone }}</td>
                                                    <td class="text-center">{{ $item->functions }}</td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a title="Eliminar" href="javascript:void(0)"
                                                                class="eliminarArchivoEstudio btn btn-danger btn-xs"
                                                                data-nombre="{{ $item->file }}">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="">
            <div class="row">
                <div class="col-sm-offset-1 col-sm-12">
                    <div class="card card-accent-warning">
                        <div class="card-header font-weight-bold">Referencias Personales</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="nombre_ref">Nombre</label>
                                        <input type="text" name="nombre_ref" id="nombre_ref" class="form-control blockText" placeholder="Nombre de la persona">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="cargo_ref">Cargo</label>
                                        <input type="text" name="cargo_ref" id="cargo_ref" class="form-control"
                                            placeholder="Cargo que desempeña">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="tel_ref">Teléfono de Contacto</label>
                                        <input type="number" min="2000000" minlength="7" maxlength="10" name="tel_ref"
                                            pattern="" id="tel_ref" class="form-control blockNums"
                                            placeholder="Teléfono" title="7 a 10 caracteres"
                                            oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="parentezco">Parentezco</label>
                                        <input type="text" name="parentezco" id="parentezco" class="form-control"
                                            placeholder="Parentezco">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="pointer btn bg-cyan text-white btn-elevate btn-pill" title="Agregar"
                                    id="agregarReferencia">
                                    <span><i class="fa fa-plus"></i><span>Agregar</span></span>
                                </button>
                            </div>
                            <input type="hidden" name="jsonTableRef" id="jsonTableRef">
                            <div class="row">
                                <div class="mt-3 col-12">
                                    <div class="table-responsive">
                                        <table id="tableReferencia"
                                            class="table table-striped theadcolor table-hover table-checkable dataTable no-footer dtr-inline mb-0"
                                            cellspacing="0" style="white-space: inherit!important;">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Cargo</th>
                                                    <th>Teléfono</th>
                                                    <th>Parentezco</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="bodyReferencia">
                                                @foreach ($empleado->rel_referencias as $item)
                                                <tr>
                                                    <td class="text-center">{{ $item->name }}</td>
                                                    <td class="text-center">{{ $item->position }}</td>
                                                    <td class="text-center">{{ $item->telephone }}</td>
                                                    <td class="text-center">{{ $item->relationship }}</td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a title="Eliminar" href="javascript:void(0)"
                                                                class="eliminarArchivoEstudio btn btn-danger btn-xs"
                                                                data-nombre="{{ $item->file }}">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            {{ Form::submit('Registrar', array('class' => 'btn btn-success')) }}
            <a href="{{route('employees.index')}}" type="button" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
</form>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/employees/curriculum.js') }}"></script>
@endsection