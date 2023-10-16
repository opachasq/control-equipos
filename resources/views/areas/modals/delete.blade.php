<!-- Modal -->
<div class="modal fade text-center" id="deleteModal{{$area->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form method="POST" action="{{route('areas.destroy', $area->id)}}">
                  @method('DELETE')
                    {{csrf_field()}}
                    <div class="modal-body">
                        <i class="fa fa-exclamation-circle fa-5x text-danger"></i>
                        <br><br>
                        <h4 style="font-family: cursive"><b>¿Estás seguro de Eliminarlo?</b></h4>
                        <h5 style="font-family: cursive"><small class="text-muted">¡No podrás revertir esto!</small></h5>
                        <br><br>


                          <button type="submit" href="{{route('areas.destroy', $area->id)}}" class="btn btn-primary">
                              ¡Si, elimínelo!
                              <i class="fas fa-spinner fa-spin d-none"></i>
                          </button>
                            <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
