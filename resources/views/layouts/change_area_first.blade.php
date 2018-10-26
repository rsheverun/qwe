<form action="{{route('change_area')}}">
  <div class="modal fade" id="first_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Please select a hunting area</h5>
          
        </div>
        <div class="modal-body">
          <select class="form-control" id="exampleFormControlSelect1" name="area" required>
          @if($user_areas->count() != 0)
              @foreach($user_areas as $area)
                  
                  <option value="{{$area}}" >
                      {{$area}}
              </option>
              @endforeach
          @endif
          </select>
          
        
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn camera-save">Change</button>
        </div>
      </div>
    </div>
  </div>
</form>