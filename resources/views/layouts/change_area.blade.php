<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Please select a hunting area</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <select class="form-control" id="exampleFormControlSelect1" name="area">
        @if($user_areas->count() != 0)
            @foreach($user_areas->unique() as $area)
                
                <option value="{{$area}}" @if(Session::get('area') == $area) selected @endif>
                    {{$area}}
            </option>
            @endforeach
        @endif
        </select>
        
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn camera-save">Change</button>
      </div>
    </div>
  </div>
</div>