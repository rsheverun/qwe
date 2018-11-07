
                     <!-- modal edit group-->
                     <div class="modal fade" id="editAreaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Edit group</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('settings.update',$group->id)}}" method="post">
                            @csrf
                            @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="camera" class="title">usergroup name:</label>
                                <input type="text" class="form-control"  name="name" value="{{$group->name}}" required>
                            </div>
                            <div class="form-group">
                            @foreach($roles as $role)
                                                <div class="check-box ">
                                                    <label class="title " >
                                                        is @if ($role->name == 'admin')
                                                            admin
                                                        @elseif($role->name =='user')
                                                            BENUTZER
                                                        @elseif($role->name == 'guest')
                                                            GAST
                                                        @endif
                                                        ?
                                                        </label>
                                                        <input  type="radio" value="{{$role->id}}"  name="role_id" class="custom-check" @if($group->role->id == $role->id) checked @endif>
                                                </div>

                            @endforeach
                            </div>
                            <div class="form-group areas">
                            <label for="camera" class="title">Jagdgebiete:</label>
                            @foreach ($areas_list as $area)
                               
                                    <span class="col pl-0 mb-2" style="max-width: max-content;">
                                        <input type="checkbox" name="areas[]" id="area_in_loop_{{$area->id}}" value="{{$area->id}}"
                                        @foreach($group->hunting_areas as $user_area)
                                            @if($user_area->id == $area->id)
                                                checked
                                            @endif
                                        @endforeach
                                        >
                                        <label  for="area_in_loop_{{$area->id}}" class="setting-radio mr-0 mb-2">{{$area->name}}</label> 
                                    </span>
                                
                            @endforeach
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="group_update" value="{{$group->id}}">
                            <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Schließen</button>
                            <button type="submit" class="btn camera-save" >Bearbeiten</button>
                        </div>
                </form>

                        </div>
                    </div>
                    </div>
                    <!-- /modal -->
