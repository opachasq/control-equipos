<!-- Modal -->
<div class="modal animated zoomIn" id="createMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Nuevo Equipo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('equipos.store') }}" role="form" method="POST"
                    enctype="multipart/form-data" id="createCargotFrm">
                    {{ csrf_field() }}

                    <div class="row">
                      
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="cod_patrimonial" class="form-fields">Cod. Patrimonial</label>
                                <label class="mandatory-field">*</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('cod_patrimonial') ? 'is-invalid' : '' }}"
                                    name="cod_patrimonial" id="cod_patrimonial" value="{{ old('cod_patrimonial') }}">
                                @if ($errors->has('cod_patrimonial'))
                                    <span class="text-danger">{{ $errors->first('cod_patrimonial') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="serie" class="form-fields">Serie</label>
                                <label class="mandatory-field">*</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('serie') ? 'is-invalid' : '' }}"
                                    name="serie" id="serie" value="{{ old('serie') }}">
                                @if ($errors->has('serie'))
                                    <span class="text-danger">{{ $errors->first('serie') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 form-group">
                            <div>
                                <label for="caracteristica" class="form-fields">Caracteristica</label>
                                
                                <textarea type="text" class="form-control {{ $errors->has('caracteristica') ? 'is-invalid' : '' }}"
                                    name="caracteristica" id="caracteristica" value="{{ old('caracteristica') }}"></textarea>
                                @if ($errors->has('caracteristica'))
                                    <span class="text-danger">{{ $errors->first('caracteristica') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class=" col-lg-6 form-group">
                            <label class="text-sm" for="categoria_id">Categoria</label>
                            <select class="form-control" name="categoria_id">
                                <option value="">Seleecione</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class=" col-lg-6 form-group">
                            <label class="text-sm" for="marca_id">Marca</label>
                            <select class="form-control" name="marca_id">
                                <option value="">Seleecione</option>
                                @foreach ($marcas as $marca)
                                <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                            @endforeach
                            </select>
                        </div>
                        
                        <div class=" col-lg-6 form-group">
                            <label class="text-sm" for="color_id">Color</label>
                            <select class="form-control" name="color_id">
                                <option value="">Seleecione</option>
                                @foreach ($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->nombre }}</option>
                            @endforeach
                            </select>
                        </div>
                        
                        <div class=" col-lg-6 form-group">
                            <label class="text-sm" for="modelo_id">Modelo</label>
                            <select class="form-control" name="modelo_id">
                                <option value="">Seleecione</option>
                                @foreach ($modelos as $modelo)
                                <option value="{{ $modelo->id }}">{{ $modelo->nombre }}</option>
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
