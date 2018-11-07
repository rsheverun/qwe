
                    <!-- modal edit config-->
                    <div class="modal fade" id="editAreaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Konfigurationssatz bearbeiten</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('settings.update', $configset->id)}}" method="post">
                                @method('PUT')
                                @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="camera" class="title">Modell:</label>
                                    <input type="text" class="form-control" name="model" value="{{$configset->model or 'null'}}">
                                </div>
                                <div class="form-group">
                                    <label for="name" class="title">KONFIGURATIONEN :</label>
                                    <input type="text" class="form-control"  name="config_name" value="{{$configset->config_name or 'null'}}">
                                </div>

                                @foreach ($keys as $key=>$name)
                                @if($key<=3 )
                                        @continue
                                    @endif
                                <div class="form-group">
                                    <label for="name" class="title">{{$name}}:</label>
                                    <input type="text" class="form-control"  name="{{$name}}" value="{{$configset->key->$name or 'null'}}">
                                </div>
                                @endforeach

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Schließen</button>
                                <button type="submit" class="btn camera-save" name="configset_update" value="{{$configset->id}}">Bearbeiten</button>
                            </div>
                            </form>
                            </div>
                        </div>
                        </div>
                        <!-- /modal -->
