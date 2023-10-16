<!-- Modal -->
<div class="modal animated zoomIn" id="createMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Nuevo Locador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('locadores.store') }}" role="form" method="POST"
                    enctype="multipart/form-data" id="createCargotFrm">
                    {{ csrf_field() }}

                    <div class="row">
                      
                        <div class="col-lg-4 form-group">
                            <div>
                                <label for="dni" class="form-fields">Dni</label>
                                <label class="mandatory-field">*</label>
                                <input type="text" maxlength="8"
                                onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                                    class="form-control {{ $errors->has('dni') ? 'is-invalid' : '' }}"
                                    name="dni" id="dni" value="{{ old('dni') }}">
                                @if ($errors->has('dni'))
                                    <span class="text-danger">{{ $errors->first('dni') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 form-group">
                            <div>
                                <label for="codigo" class="form-fields">Código</label>
                                <label class="mandatory-field">*</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('codigo') ? 'is-invalid' : '' }}"
                                    name="codigo" id="codigo" value="{{ old('codigo') }}">
                                @if ($errors->has('codigo'))
                                    <span class="text-danger">{{ $errors->first('codigo') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 form-group">
                            <div>
                                <label for="celular" class="form-fields">Celular</label>
                                <label class="mandatory-field">*</label>
                                <input type="text" maxlength="9"
                                onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                                    class="form-control {{ $errors->has('celular') ? 'is-invalid' : '' }}"
                                    name="celular" id="celular" value="{{ old('celular') }}">
                                @if ($errors->has('celular'))
                                    <span class="text-danger">{{ $errors->first('celular') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="nombres" class="form-fields">Nombres</label>
                                <label class="mandatory-field">*</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('nombres') ? 'is-invalid' : '' }}"
                                    name="nombres" id="nombres" value="{{ old('nombres') }}">
                                @if ($errors->has('nombres'))
                                    <span class="text-danger">{{ $errors->first('nombres') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="apellidos" class="form-fields">Apellidos</label>
                                <label class="mandatory-field">*</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('apellidos') ? 'is-invalid' : '' }}"
                                    name="apellidos" id="apellidos" value="{{ old('apellidos') }}">
                                @if ($errors->has('apellidos'))
                                    <span class="text-danger">{{ $errors->first('apellidos') }}</span>
                                @endif
                            </div>
                        </div>
                       
                        <div class=" col-lg-6 form-group">
                            <label class="text-sm" for="genero_id">Genero</label>
                            <select class="form-control" name="genero_id">
                                <option value="">Seleecione</option>
                                @foreach ($generos as $genero)
                                    <option value="{{ $genero->id }}">{{ $genero->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class=" col-lg-6 form-group">
                            <label class="text-sm" for="area_id">Oficina</label>
                            <select class="form-control" name="area_id">
                                <option value="">Seleecione</option>
                                @foreach ($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                            @endforeach
                            </select>
                        </div>
                       

                    </div>


                    <div class="buttons-form-submit d-flex justify-content-end">
                        <button type="reset" class="btn btn-secondary mr-1" data-dismiss="modal">Cerrar</button>
                        <button type="submit" href="#" class="btn btn-primary">
                            Guardar
                            <i class="fas fa-spinner fa-spin d-none"></i>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
