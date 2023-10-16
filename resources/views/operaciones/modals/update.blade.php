<!-- Modal -->
<div class="modal animated zoomIn" id="editModal{{$operacion->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Actualizar operacion</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <form method="POST" action="{{route('operaciones.update', $operacion->id)}}" enctype="multipart/form-data">
                 @method('PUT')
                   {{csrf_field()}}
           
                      <div class="row">
                      
                      
                       <div class="col-lg-6">

                        <label for="fecha" class="form-fields">Fecha de Devolucion</label>
                        <label class="mandatory-field">*</label>

                        <input type="date" value="{{$operacion->fecha}}"
                            class="form-control {{ $errors->has('fecha')&&$errors->has('put') ? 'is-invalid' : '' }}"
                            name="fecha" id="fecha" value="{{ old('fecha') }}">
                        @if ($errors->has('fecha')&&$errors->has('put'))
                            <span class="text-danger">{{ $errors->first('fecha') }}</span>
                        @endif
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
