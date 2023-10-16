<!-- Modal -->
<div class="modal animated zoomIn" id="editModal{{ $equipo->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Actualizar Equipo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('equipos.update', $equipo->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-lg-6 form-group">

                            <label for="cod_patrimonial" class="form-fields">Codigo Patrimonial</label>
                            <label class="mandatory-field">*</label>
                            <input type="text" value="{{ $equipo->cod_patrimonial }}"
                                class="form-control {{ $errors->has('cod_patrimonial') && $errors->has('put') ? 'is-invalid' : '' }}"
                                name="cod_patrimonial" id="cod_patrimonial" value="{{ old('cod_patrimonial') }}">
                            @if ($errors->has('cod_patrimonial') && $errors->has('put'))
                                <span class="text-danger">{{ $errors->first('cod_patrimonial') }}</span>
                            @endif

                        </div>
                        <div class="col-lg-6 form-group">

                            <label for="serie" class="form-fields">Serie</label>
                            <input type="text" value="{{ $equipo->serie }}"
                                class="form-control {{ $errors->has('serie') && $errors->has('put') ? 'is-invalid' : '' }}"
                                name="serie" id="serie" value="{{ old('serie') }}">
                            @if ($errors->has('serie') && $errors->has('put'))
                                <span class="text-danger">{{ $errors->first('serie') }}</span>
                            @endif

                        </div>

                        <div class="col-lg-12 form-group">
                            <div class="form-outline">
                                <label class="form-label" for="caracteristica">Caracteristicas</label>
                                <textarea class="form-control {{ $errors->has('caracteristica') ? 'is-invalid' : '' }}" name="caracteristica"
                                    id="caracteristica" value="{{ old('caracteristica') }}" rows="2">{{ $equipo->caracteristica }}</textarea>
                            </div>
                        </div>
                        <div class=" col-lg-6 form-group">
                            <label class="text-sm" for="cargo_id">Categoria</label>
                            <select class="form-control" name="categoria_id">
                                @foreach ($categorias as $categoria)
                                    @if ($equipo->categoria_id == $categoria->id)
                                        <option value="{{ $categoria->id }}" selected>{{ $categoria->nombre }}
                                        </option>
                                    @else
                                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class=" col-lg-6 form-group">
                            <label class="text-sm" for="area_id">Marca</label>
                            <select class="form-control" name="marca_id">
                                @foreach ($marcas as $marca)
                                    @if ($equipo->marca_id == $marca->id)
                                        <option value="{{ $marca->id }}" selected>{{ $marca->nombre }}</option>
                                    @else
                                        <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="color" class="form-fields">color</label>
                            <select class="form-control" name="color_id">
                                @foreach ($colors as $color)
                                    @if ($equipo->color_id == $color->id)
                                        <option value="{{ $color->id }}" selected>{{ $color->nombre }}
                                        </option>
                                    @else
                                        <option value="{{ $color->id }}">{{ $color->nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="modelo" class="form-fields">modelo</label>
                            <select class="form-control" name="modelo_id">
                                @foreach ($modelos as $modelo)
                                    @if ($equipo->modelo_id == $modelo->id)
                                        <option value="{{ $modelo->id }}" selected>{{ $modelo->nombre }}
                                        </option>
                                    @else
                                        <option value="{{ $modelo->id }}">{{ $modelo->nombre }}</option>
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
