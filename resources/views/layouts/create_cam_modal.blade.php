<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add New Camera</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('cameras.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="camera" class="title">Camera:</label>
            <input type="text" class="form-control" id="camera" placeholder="Enter camera" name="cam" value="{{old('cam')}}"required>
        </div>
        <div class="form-group">
            <label for="name" class="title">Name:</label>
            <input type="text" class="form-control" id="name"  placeholder="Enter name" name="cam_name" value="{{old('cam_name')}}"required>
        </div>
        <div class="form-group">
            <label for="model" class="title">Model:</label>
            <input type="text" class="form-control" id="model" placeholder="Enter model" name="cam_model" value="{{old('cam_model')}}" required>
        </div>
        <div class="form-group">
            <label for="desc" class="title">Description:</label>
            <textarea class="form-control" id="desc" name="desc" rows="3" required>{{old('desc')}}</textarea>
        </div>
        <div class="form-group">
            <label for="lat" class="title">Latitude:</label>
            <input type="text" class="form-control" id="latitude" placeholder="Enter latitude" name="latitude" value="{{old('latitude')}}" required>
        </div>
        <div class="form-group">
            <label for="long" class="title">Longitude:</label>
            <input type="text" class="form-control" id="longitude" placeholder="Enter longitude" name="longitude" value="{{old('longitude')}}" required>
        </div>
        <div class="form-group row">
            <div class="col-sm-3 title">Usergroups:</div>
            <div class="col-sm-9">
            <div class="form-check form-check-inline">
            @foreach($camera->usergroups as $k=>$group)
                <input class="form-check-input" type="checkbox" id="{{$group->id}}" name="group_id[]" value="{{$group->id}}" @if($k==0) checked @endif>
                <label class="form-check-label mr-3" for="{{$group->id}}">
                {{$group->name}}
                </label>
            @endforeach
            </div>
            <!-- <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck1">
                <label class="form-check-label" for="gridCheck1">
                group2
                </label>
            </div> -->
            </div>
        </div>
        <div class="form-group">
            <label for="cam_email" class="title">Camera email:</label>
            <input type="email" class="form-control" id="cam_email" name="cam_email" placeholder="Enter camera email" required>
        </div>
        <div class="form-group">
    <label for="config" class="title">Configset:</label>
    <select class="form-control" id="config" name="config_id" required>
    @foreach($configsets as $configset)
                <option value="{{$configset->id}}">{{$configset->config_name}}</option>
    @endforeach
    </select>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
        <button type="submit" class="btn camera-save">Save</button>
      </div>
      </form>

    </div>
  </div>
</div>