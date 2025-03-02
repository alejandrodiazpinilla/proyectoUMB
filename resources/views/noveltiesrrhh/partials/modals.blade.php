<div class="modal fade" id="modal_crear" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div style="background: #303c54;" class="modal-header">
                <h5 class="modal-title text-white lblTitulo">Agregar Novedad</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <input type="hidden" id="permiso">
            <form id="form_crear" data-toggle="validator" role="form" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="cedula">Cédula</label>
                                <input type="number" min="1000000" minlength="7" maxlength="10" name="cedula" pattern=""
                                    id="cedula" class="form-control blockNums" placeholder="Cedula"
                                    title="7 a 10 caracteres"
                                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="nombre" class="form-control blockText" readonly disabled>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="position">Puesto</label>
                                <input type="text" id="position" class="form-control" readonly disabled>
                            </div>
                        </div>
                    </div>
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
                                <label>¿Es administrativo?</label>
                                <div class="custom-control custom-checkbox ml-3">
                                    <input type="checkbox" id="checkAdmin" name="checkAdmin"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="checkAdmin"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="customer_id">Cliente</label>
                                {{ Form::select('customer_id', $clientes, null, ['class'=> 'form-control
                                select2-single', 'id'=>'customer_id', 'required' => 'true', 'placeholder' =>
                                'Seleccione...', 'style'=>'width:100%;']) }}
                            </div>
                        </div>
                        <div class="col-md">
                            <label for="novelty_type_id">Tipo de Novedad</label>
                            <div class="form-group">
                                {{ Form::select('novelty_type_id', $tiposNovedades, null, ['class'=> 'form-control
                                select2-single', 'id'=>'novelty_type_id', 'required' => 'true', 'placeholder' =>
                                'Seleccione...', 'style'=>'width:100%;']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <textarea name="description" id="description" class="form-control" rows="4"
                                    required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="divGestion">
                        @if(Auth::user()->hasRole('root') || Auth::user()->can('gestionar_novedad_rrhh'))
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <fieldset class="form-group">
                                        <label for="fecha">Fecha</label>
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </span>
                                            <input type="text" autocomplete="off" class="form-control" alt="fecha"
                                                name="fecha" id="fecha" required placeholder="Fecha Estimada de Pago">
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="state">Estado</label>
                                    <select id="state" name="state" class="form-control select2-single">
                                        <option value="0">Pago Pendiente</option>
                                        <option value="1">Pago Recibido</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="penalty">Sanción</label>
                                    <textarea name="penalty" id="penalty" class="form-control"
                                        placeholder="Describa la Sanción" required></textarea>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        {{ Form::submit('Registrar', array('class' => 'btn btn-success','id'=>'btnRegistrar')) }}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>