<!-- Modal -->
<div class="modal animated zoomIn" id="createMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Nuevo Color</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('colores.store')}}" role="form" method="POST" id="createProductFrm">
                    {{csrf_field()}}
                    
                    <div class="row">
                        <div class="col-lg-12 form-group">
                          <div>
                              <label for="nombre" class="form-fields">Nombre</label>
                              <label class="mandatory-field">*</label>
                              <input type="text"
                                     class="form-control {{$errors->has('nombre') ? 'is-invalid' : ''}}"
                                     name="nombre" id="nombre" value="{{old('nombre')}}">
                              @if($errors->has('nombre'))
                                  <span class="text-danger">{{$errors->first('nombre')}}</span>
                              @endif
                          </div>
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
