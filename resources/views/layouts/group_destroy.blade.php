<form action="{{route('settings.destroy',$group->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="group_destroy">
                        <!-- modal delete group-->
                        <div class="modal fade" id="group_destroy_{{$group->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="title">Gruppe löschen</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-left" id="text">
                                    Are you sure you want to delete user group?
                                </div>
                                <div class="modal-footer">
                                <input type="hidden" name="group_destroy">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button>
                                    <button type="submit" class="btn btn-danger" name="delete_id" value="{{$group->id}}">Bearbeiten</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- endmodal -->
                    </form>
