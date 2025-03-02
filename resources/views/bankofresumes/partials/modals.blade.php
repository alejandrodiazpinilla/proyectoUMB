<div class="modal fade" id="modal_crear" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div style="background: #303c54;" class="modal-header">
                <h5 class="modal-title text-white">Agregar Hoja de Vida</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="form_crear" data-toggle="validator" role="form" enctype="multipart/form-data">
                <input type="hidden" id="id" name="id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="company_id">Empresa</label>
                                {{ Form::select('company_id', $empresas, null, ['class'=> 'form-control select2-single',
                                'id'=>'company_id', 'required' => 'true', 'placeholder' => 'Seleccione...',
                                'style'=>'width:100%;']) }}
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="archivo">Hoja de Vida (Magnético)</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input form-control" id="archivo"
                                        name="archivo" lang="es" accept="application/pdf" style="cursor: pointer;">
                                    <label class="custom-file-label" for="archivo" data-browse="PDF">
                                        Seleccione un archivo
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="identification">Número de Documento</label>
                                <input autofocus type="number" minlength="6" maxlength="10" min="50000"
                                    name="identification" id="identification" class="form-control blockNums"
                                    title="6 a 11 caracteres" required pattern="[0-9]"
                                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)"
                                    onkeypress="if (this.value == 'e') return false" />
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="name">Nombres y Apellidos</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="telephone">Número de Celular</label>
                                <input type="number" min="2000000" minlength="7" maxlength="10" name="telephone"
                                    pattern="" id="telephone" class="form-control blockNums" title="7 a 10 caracteres"
                                    required
                                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="gender">Género</label>
                                <select name="gender" id="gender" class="form-control select2-single" required
                                    style="width: 100%">
                                    <option value="" disabled selected>Seleccione</option>
                                    <option value="F">Femenino</option>
                                    <option value="M">Masculino</option>
                                    <option value="O">Otro</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <fieldset class="form-group">
                                    <label for="date_of_birth">Fecha de Nacimiento</label>
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </span>
                                        <input type="text" autocomplete="off" class="form-control" name="date_of_birth"
                                            id="date_of_birth" required onkeydown="return false;">
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="address">Dirección</label>
                                <input type="text" name="address" id="address" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="city_id">Municipio</label>
                                {{ Form::select('city_id', $ciudades, null, ['class'=> 'form-control select2-single',
                                'id'=>'city_id', 'required' => 'true', 'placeholder' => 'Seleccione...',
                                'style'=>'width:100%;']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="locality_id">Localidad</label>
                                {{ Form::select('locality_id', $localidades, null, ['class'=> 'form-control
                                select2-single', 'id'=>'locality_id', 'required' => 'true', 'placeholder' =>
                                'Seleccione...', 'style'=>'width:100%;']) }}
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="neighborhood_id">Barrio</label>
                                {{ Form::select('neighborhood_id', $barrios, null, ['class'=> 'form-control
                                select2-single', 'id'=>'neighborhood_id', 'required' => 'true', 'placeholder' =>
                                'Seleccione...', 'style'=>'width:100%;']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="description">Observaciones</label>
                                <textarea id="description" class="form-control" name="description" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    {{ Form::submit('Registrar', array('class' => 'btn btn-success')) }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
