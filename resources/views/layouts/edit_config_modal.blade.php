<form action="{{route('settings.update', $configset->id)}}" method="post">
                    @method('PUT')
                    <!-- modal edit config-->
                    <div class="modal fade text-left" id="editAreaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Edit config set</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @csrf
                                <div class="form-group">
                                    <label for="camera" class="title">Model:</label>
                                    <input type="text" class="form-control" name="model" value="{{$configset->model}}">
                                </div>
                                <div class="form-group">
                                    <label for="name" class="title">configset:</label>
                                    <input type="text" class="form-control"  name="config_name" value="{{$configset->config_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="name" class="title">Org-name:</label>
                                    <input type="text" class="form-control"  name="org_name" value="{{$configset->org_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="name" class="title">SMTP-Server:</label>
                                    <input type="text" class="form-control"  name="server" value="{{$configset->server}}">
                                </div>
                                <div class="form-group">
                                    <label for="name" class="title">SMTP-Port:</label>
                                    <input type="text" class="form-control"  name="port" value="{{$configset->port}}">
                                </div>
                                <div class="form-group">
                                    <label for="name" class="title">SMTP-User:</label>
                                    <input type="text" class="form-control"  name="user" value="{{$configset->user}}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn camera-save" name="configset_update" value="{{$configset->id}}">edit</button>
                            </div>
                            </div>
                        </div>
                        </div>
                        <!-- /modal -->
                </form>