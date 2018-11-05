 <!-- modal delete config-->
 <div class="modal fade" id="config_destroy_{{$configset->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title">Konfigurationssatz löschen</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-left" id="text">
                                Sind Sie sicher, dass Sie den Konfigurationssatz löschen möchten?
                            </div>
                            <div class="modal-footer">
                            <input type="hidden" name="config_destroy">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" name="delete_id" value="{{$configset->id}}">Delete</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- endmodal -->
