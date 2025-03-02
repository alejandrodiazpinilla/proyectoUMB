<!--begin:Modal -->
<div class="modal fade" id="modal_crear" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form id="form_crear" data-toggle="validator" role="form">
                <div style="background: #303c54;" class="modal-header">
                    <h5 class="modal-title text-white">Agregar</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary" role="alert">El presente documento soporta la entrega de dotación
                        en buen estado, recuerde probarse todas las prendas antes de retirarse de las instalaciones de
                        la empresa, no olvide entregarlas limpias y en buen estado, de lo contrario le será descontado
                        el valor de lavandería por prenda, COSTO <span class="text-danger">($7.000)</span></div>
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="guard_id">Empleado: </label>
                                {{ Form::select('guard_id', $empleados, null, ['class' => 'form-control m-select2', 'id'
                                => 'guard_id', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style' =>
                                'width:100%;']) }}
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="type">Tipo: </label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="radioEntrega" name="radioEntregaDev"
                                        class="custom-control-input" value="Entrega" required>
                                    <label class="custom-control-label" for="radioEntrega">Entrega</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="radioDevolucion" name="radioEntregaDev"
                                        class="custom-control-input" value="Devolución" required>
                                    <label class="custom-control-label" for="radioDevolucion">Devolución</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-4">
                                <h5 class="card-header text-success">Detalle</h5>
                                <div class="card-body">
                                    <input type="hidden" name="jsonTableDelivery" id="jsonTableDelivery">
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table id="delivery_table" class="theadcolor table dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>Prenda</th>
                                                        <th>Talla</th>
                                                        <th>Cantidad</th>
                                                        <th width="60%">Observaciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($prendas as $p)
                                                    <tr>
                                                        <td>{{$p}}</td>
                                                        <td><input type="text" class="form-control"></td>
                                                        <td><input type="number" min="0" minlength="1" maxlength="2"
                                                                class="form-control blockNums"
                                                                oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                                        </td>
                                                        <td><textarea rows="1" class="form-control"
                                                                width="60%"></textarea></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div id="main_content_wrap" class="outer m-portlet__foot mx-auto mb-3">
                                            <section id="main_content" class="inner">
                                                <div style="text-align: center">
                                                    <h6>Firma Quien Entrega</h6>
                                                    <canvas class="sketchpad" id="sketchpad" height="108"
                                                        style="cursor: pointer;">
                                                    </canvas>
                                                    <input type="hidden" name="firmaBase64" id="firmaBase64">
                                                </div>
                                                <div style="text-align: center">
                                                    <input type="button" class="btn btn-danger" id="clear"
                                                        value="Borrar Firma" onclick="clear(); return false;">
                                                </div>
                                            </section>
                                        </div>
                                        <div id="main_content_wrap" class="outer m-portlet__foot mx-auto mb-3">
                                            <section id="main_content" class="inner">
                                                <div style="text-align: center">
                                                    <h6>Firma Quien Recibe</h6>
                                                    <canvas class="sketchpad2" id="sketchpad2" height="108"
                                                        style="cursor: pointer;">
                                                    </canvas>
                                                    <input type="hidden" name="firmaBase642" id="firmaBase642">
                                                </div>
                                                <div style="text-align: center">
                                                    <input type="button" class="btn btn-danger" id="clear2"
                                                        value="Borrar Firma" onclick="clear2(); return false;">
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Registrar', ['class' => 'btn btn-success']) }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end:Modal -->