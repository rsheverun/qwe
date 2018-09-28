
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
    }
