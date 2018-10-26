
import "./app"

$(function() {
    var height = $(".img-height").find("img").css("height");
    $(".img-height").css("min-height",height);
    
    //open edit modal on settings page
    $('.open-modal').click(function() {
        var target = $(this).data('target');
        var id = $(this).val();
        var url = $(location).attr('href') +'/get/'+ id
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                url: url,
                type: "post",
                data: {
                    id:id,
                    [target]: true
                },
                success: function(response){ // What to do if we succeed
                    console.log(response);
                    $('#editArea').html(response);
                    $('#editAreaModal').modal('toggle').on('hide.bs.modal', function(){
                        $('#editArea').html('');
                    });
                },
                error: function(msg){
                    console.error('ERROR')
                    //
                }
            });
    })

});