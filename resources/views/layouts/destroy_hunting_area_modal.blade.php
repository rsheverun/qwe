<form action="{{route('settings.destroy',$area->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                   
                     <!-- modal delete area-->
                     <div class="modal fade" id="area_destroy_{{$area->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title">Jagdrevier löschen</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-left" id="text">
                                Sind Sie sicher, dass Sie das Jagdgebiet löschen wollen?
                            </div>
                            <div class="modal-footer">
                            <input type="hidden" name="area_destroy">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button>
                                <button type="submit" class="btn btn-danger" name="delete_id" value="{{$area->id}}">Löschen</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal -->
</form>
