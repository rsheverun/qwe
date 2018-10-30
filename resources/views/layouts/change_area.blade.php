<div class="modal fade" id="editAreaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Please select a hunting area</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<form action="{{route('change_area')}}">

      <div class="modal-body">
        <select class="form-control" id="exampleFormControlSelect1" name="area">
        @if($user_areas->count() != 0)
            @foreach($user_areas as $area)
                
                <option value="{{$area->id}}" @if($area->id == Session::get('area')) selected @endif)>
                    {{$area->name}}
            </option>
            @endforeach
        @endif
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="area-modal-close" >Close</button>
        <button type="submit" class="btn camera-save">Change</button>
      </div>
</form>
  
    </div>
  </div>
</div>