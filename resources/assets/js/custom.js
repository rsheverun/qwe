
import "./app"

$(function() {
    var height = $(".img-height").find("img").css("height");
    $(".img-height").css("min-height",height);
    
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
    function clear_fields(){
        document.getElementById('create_modal').reset();
    }
    
});

   
