
                     <!-- modal edit area-->
                     <form action="{{route('settings.update',$id)}}" method="post">
                         @csrf
                         @method('PUT')
                     <div class="modal fade text-left" id="editAreaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Hunting Area</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @csrf
                                    <div class="form-group">
                                        <label for="camera" class="title">Name:</label>
                                        <input type="text" class="form-control" name="name" value="{{$name}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="title">Description:</label>
                                        <textarea type="text" class="form-control"  rows="5"  name="description" value="{{$description}}" required>{{$description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="title">vMAP Instance value:</label>
                                        <input type="text" class="form-control"  name="instance_value" value="{{$instance_value}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="title">vMAP Instance description:</label>
                                        <input type="text" class="form-control"  name="instance_description" value="{{$instance_description}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="title">vMAP MapviewID value:</label>
                                        <input type="text" class="form-control"  name="mapview_value" value="{{$map_value}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="title">vMAP MapviewID description:</label>
                                        <input type="text" class="form-control"  name="mapview_description" value="{{$map_description}}" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="area_update" value="{{$id}}">
                                    <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn camera-save submit-modal" >edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /modal -->
                </form>