<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-left" id="text">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" id="delete-btn" name="user_id">Delete</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    function modal_data(id, title) { 
        var a = document.getElementById("delete-btn");
        a.setAttribute("value", id); 
        
        if(title == 'user_destroy') {
            document.getElementById("title").innerHTML = "Delete user";
            document.getElementById("text").innerHTML = "Are you sure you want to delete user?";
        }
        if(title == 'camera_destroy') {
            document.getElementById("title").innerHTML = "Delete camera";
            document.getElementById("text").innerHTML = "Are you sure you want to delete camera?";
        }
        if(title == 'image_destroy') {
            document.getElementById("title").innerHTML = "Delete image";
            document.getElementById("text").innerHTML = "Are you sure you want to delete image?";
        }
    }
</script>