<!-- Modal -->
<div class="modal fade" id="editAreaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Neue Kamera hinzufügen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<form action="{{route('cameras.store')}}" method="post" id="create_modal">
      <div class="modal-body">
        @csrf
        <div class="form-group">
            <label for="camera" class="title">KAMERA:</label>
            <input type="text" class="form-control" id="camera" placeholder="Kamera eingeben" name="cam" value="{{old('cam')}}"required>
        </div>
        <div class="form-group">
            <label for="name" class="title">Name:</label>
            <input type="text" class="form-control" id="name"  placeholder="Name eingeben" name="cam_name" value="{{old('cam_name')}}"required>
        </div>
        <div class="form-group">
            <label for="model" class="title">Modell:</label>
            <input type="text" class="form-control" id="model" placeholder="Modell eingeben" name="cam_model" value="{{old('cam_model')}}" required>
        </div>
        <div class="form-group">
            <label for="desc" class="title">BESCHREIBUNG:</label>
            <textarea class="form-control" id="desc" name="desc" rows="3" required>{{old('desc')}}</textarea>
        </div>
        <div class="form-group">
            <label for="lat" class="title">Breitengrad:</label>
            <input type="text" class="form-control" id="latitude" placeholder="Breitengrad eingeben" name="latitude" value="{{old('latitude')}}" required>
        </div>
        <div class="form-group">
            <label for="long" class="title">Längengrad:</label>
            <input type="text" class="form-control" id="longitude" placeholder="Längengrad eingeben" name="longitude" value="{{old('longitude')}}" required>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 title">USERGRUPPE:</div>
            <div class="col-sm-8">
                <div class="d-flex flex-wrap">
                @foreach($user_groups as $k=>$group)
                    <div class="d-flex align-items-baseline">
                        <input class="ml-2" type="checkbox" id="group_{{$group->id}}" name="group[]" value="{{$group->id}}" @if($k==0) checked @endif >
                            <label  for="group_{{$group->id}}" class="ml-1">
                            {{$group->name}}
                            </label>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="cam_email" class="title">KAMERA-E-MAIL:</label>
            <input type="email" class="form-control" id="cam_email" name="cam_email" placeholder="Geben Sie die E-Mail der Kamera ein" required>
        </div>
        <div class="form-group">
    <label for="config" class="title">KONFIGURATIONSSATZ :</label>
    <select class="form-control" id="config" name="config_id" required>
    @foreach($configsets as $configset)
                <option value="{{$configset->id}}">{{$configset->name}}</option>
    @endforeach
    </select>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal" onclick="clear_fields()">Schließen</button>
        <button type="submit" class="btn camera-save" id="checkBtn">Speichern</button>
      </div>
  </form>

    </div>
  </div>
</div>

