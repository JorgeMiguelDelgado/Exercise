<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-update-{{$note->id}}">

    {{Form::open(array('action'=>array('App\Http\Controllers\NoteController@estado',$note->id),'method'=>'PUT'))}}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    
                    @if ($note->status == 1)
                        <h4 class="modal-title">Archivar nota</h4>                        
                    @else
                        <h4 class="modal-title">Desarchivar nota</h4>
                    @endif
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if ($note->status == 1)
                    <p>Confirme si desea Archivar la Nota</p>
                    @else
                    <p>Confirme si desea Desarchivar la Nota</p>
                    @endif
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
            </div>
        </div>

    {{Form::close()}}

</div>