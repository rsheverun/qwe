
    <div class="modal fade" id="editAreaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title">{{ $title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        @if($key == 'image_destroy')
            <form action="{{route('images.destroy',$id)}}" method="post">
            @else
            <form action="{{route('settings.destroy',$id)}}" method="post">
         @endif
            @csrf
            @method('DELETE')

            <div class="modal-body text-left">
            {{ $body }}
          </div>

        <div class="modal-footer">
            <input type="hidden" name="{{$key}}">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button>
        <button type="submit" class="btn btn-danger" id="delete_id" name="delete_id" value="{{$id}}">Löschen</button>
      </div>
        </form>

    </div>
  </div>
</div>
