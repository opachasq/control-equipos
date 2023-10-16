<!-- Modal -->
<div class="modal animated zoomIn" id="editModal{{ $locador->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Actualizar Locador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('locadores.update', $locador->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-lg-4 form-group">

                            <label for="dni" class="form-fields">Dni</label>
                            <label class="mandatory-field">*</label>
                            <input type="text" value="{{ $locador->dni }}"
                                class="form-control {{ $errors->has('dni') && $errors->has('put') ? 'is-invalid' : '' }}"
                                name="dni" id="dni" value="{{ old('dni') }}">
                            @if ($errors->has('dni') && $errors->has('put'))
                                <span class="text-danger">{{ $errors->first('dni') }}</span>
                            @endif

                        </div>
                        <div class="col-lg-4 form-group">

                            <label for="codigo" class="form-fields">Codigo</label>
                            <label class="mandatory-field">*</label>
                            <input type="text" value="{{ $locador->codigo }}"
                                class="form-control {{ $errors->has('codigo') && $errors->has('put') ? 'is-invalid' : '' }}"
                                name="codigo" id="codigo" value="{{ old('codigo') }}">
                            @if ($errors->has('codigo') && $errors->has('put'))
                                <span class="text-danger">{{ $errors->first('codigo') }}</span>
                            @endif
                        </div>
                        <div class="col-lg-4 form-group">

                            <label for="celular" class="form-fields">Celular</label>
                            <label class="mandatory-field">*</label>
                            <input type="text" value="{{ $locador->celular }}"
                                class="form-control {{ $errors->has('celular') && $errors->has('put') ? 'is-invalid' : '' }}"
                                name="celular" id="celular" value="{{ old('celular') }}">
                            @if ($errors->has('celular') && $errors->has('put'))
                                <span class="text-danger">{{ $errors->first('celular') }}</span>
                            @endif
                        </div>
                        <div class="col-lg-6 form-group">

                            <label for="nombres" class="form-fields">Nombres</label>
                            <label class="mandatory-field">*</label>
                            <input type="text" value="{{ $locador->nombres }}"
                                class="form-control {{ $errors->has('nombres') && $errors->has('put') ? 'is-invalid' : '' }}"
                                name="nombres" id="nombres" value="{{ old('nombres') }}">
                            @if ($errors->has('nombres') && $errors->has('put'))
                                <span class="text-danger">{{ $errors->first('nombres') }}</span>
                            @endif
                        </div>
                        <div class="col-lg-6 form-group">

                            <label for="apellidos" class="form-fields">Apellidos</label>
                            <label class="mandatory-field">*</label>
                            <input type="text" value="{{ $locador->apellidos }}"
                                class="form-control {{ $errors->has('apellidos') && $errors->has('put') ? 'is-invalid' : '' }}"
                                name="apellidos" id="apellidos" value="{{ old('apellidos') }}">
                            @if ($errors->has('apellidos') && $errors->has('put'))
                                <span class="text-danger">{{ $errors->first('apellidos') }}</span>
                            @endif
                        </div>
                        <div class=" col-lg-6 form-group">
                            <label class="text-sm" for="genero_id">Genero</label>
                            <select class="form-control" name="genero_id">
                                @foreach ($generos as $genero)
                                    @if ($locador->genero_id == $genero->id)
                                        <option value="{{ $genero->id }}" selected>{{ $genero->nombre }}
                                        </option>
                                    @else
                                        <option value="{{ $genero->id }}">{{ $genero->nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class=" col-lg-6 form-group">
                            <label class="text-sm" for="area_id">Area</label>
                            <select class="form-control" name="area_id">
                                @foreach ($areas as $area)
                                    @if ($locador->area_id == $area->id)
                                        <option value="{{ $area->id }}" selected>{{ $area->nombre }}</option>
                                    @else
                                        <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="buttons-form-submit d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">Cerrar</button>
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
