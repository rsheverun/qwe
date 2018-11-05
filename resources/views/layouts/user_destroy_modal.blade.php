<form action="{{route('settings.destroy',$user->id)}}" method="post">
                    @csrf
                    @method("DELETE")
                    <input type="hidden" name="user_destroy">
                    <!-- modal delete user-->
                    <div class="modal fade" id="user_destroy_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title">Benutzer löschen</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-left" id="text">
                                Sind Sie sicher, dass Sie den Benutzer löschen möchten?
                            </div>
                            <div class="modal-footer">
                            <input type="hidden" name="user_destroy">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button>
                                <button type="submit" class="btn btn-danger" name="delete_id" value="{{$user->id}}">Bearbeiten</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- endmodal -->
                </form>
