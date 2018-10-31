
import "./app"

$(function() {
    var height = $(".img-height").find("img").css("height");
    $(".img-height").css("min-height",height);
    
    //open edit modal
    $('.open-modal').click(function() {
        var target = $(this).data('target');
        console.log(target);
        if (target == 'create_cam') {
            console.log('1')
            var id = 'create_cam';
            var url = '/dashboard/settings/get/'+ id 
        } else if(target == 'change-area-modal') {
            var id = 'area';
            var url = '/dashboard/settings/get/'+ id
        } else {
            var id = $(this).val();
            var url = $(location).attr('href') +'/get/'+ id
            
        }
        console.log(url)
        //SettingController@getData
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
                    $('#editArea').html(response);
                    $("body").css("overflow","hidden");
                    $('#editAreaModal').modal('toggle').on('hide.bs.modal', function(){
                        $('#editArea').html('');
                        $("body").css("overflow","auto");

                    });
                },
                error: function(msg){
                    console.error('ERROR', msg)
                    //
                }
            });
    })
 

});