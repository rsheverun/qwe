<!-- Modal -->

<div class="modal fade text-left" id="forward_email" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Forward email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          @csrf
          <div class="form-group">
              <label for="email" class="title">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{old('email')}}"required>
          </div>
          <div class="form-group">
              <label for="subject" class="title">Subject:</label>
              <input type="text" class="form-control" id="subject" placeholder="Enter subject" name="subject" value="{{old('subject')}}"required>
          </div>
          <div class="form-group">
              <label for="desc" class="title">Description:</label>
              <textarea class="form-control" id="desc" name="text" rows="3" required>{{old('description')}}</textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal" >Close</button>
          <button type="submit" class="btn camera-save" id="submit-btn" name="img_id">send</button>
        </div>

      </div>
  </div>
</div>

