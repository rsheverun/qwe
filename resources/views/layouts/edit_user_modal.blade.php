<form action="{{route('settings.update',$user->id)}}" method="post">
                    @csrf
                    @method('PUT')
                     <!-- modal edit user-->
                     <div class="modal fade text-left" id="editAreaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Edit user</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="camera" class="title">First name:</label>
                                <input type="text" class="form-control" name="first_name" value="{{$user->first_name}}" required>
                            </div>
                            <div class="form-group">
                                <label for="camera" class="title">last name:</label>
                                <input type="text" class="form-control" name="last_name" value="{{$user->last_name}}" required>
                            </div>
                            <div class="form-group">
                                <label for="camera" class="title">Email:</label>
                                <input type="email" class="form-control"  id="user_email_{{$user->id}}" name="email" value="{{$user->email}}" required>
                                <div class="d-flex flex-row form-check email-notify">
                                    <input type="checkbox" id="emailNotify_{{$user->id}}" class="form-check-input" name="notification" value="1" @if($user->notification == 1) checked @endif>
                                    <label class="form-check-label pt-1" for="emailNotify_{{$user->id}}">eMail notification for new images?</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="camera" class="title">User:</label>
                                <input type="text" class="form-control" name="nickname" value="{{$user->nickname}}" required>
                            </div>
                            <div class="form-group">
                            
                            </div>
                            <div class="form-group areas">
                            <label for="camera" class="title">usergroup name:</label>
                            @foreach ($groups_list as $group)
                            <span class="col pl-0 mb-2" style="max-width: max-content;">
                                <input type="checkbox" name="group[]" id="group_{{$group->id}}_{{$user->id}}" value="{{$group->id}}"
                                @foreach($user->usergroups as $user_group)
                                    @if($user_group->id == $group->id)
                                        checked
                                    @endif
                                @endforeach
                                >
                                <label  for="group_{{$group->id}}_{{$user->id}}" class="setting-radio mr-0 mb-2">{{$group->name}}</label> 
                            </span>
                            @endforeach
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="user_update" value="{{$user->id}}">
                            <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn camera-save" >edit</button>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- /modal -->
                </form>