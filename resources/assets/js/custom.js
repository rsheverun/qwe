
import "./app"

$(function() {
    var height = $(".img-height").find("img").css("height");
    $(".img-height").css("min-height",height);
    $(".datepicker-here").datepicker({
        language: {
            days: ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'],
            daysShort: ['Son', 'Mon', 'Die', 'Mit', 'Don', 'Fre', 'Sam'],
            daysMin: ['So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa'],
            months: ['Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'],
            monthsShort: ['Jan', 'Feb', 'Mär', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dez'],
            today: 'Heute',
            clear: 'Aufräumen',
            dateFormat: 'dd.mm.yyyy',
            timeFormat: 'hh:ii',
            firstDay: 1
        }
    });
    //open edit modal
    $('.open-modal').click(function() {
        var target = $(this).data("target");
        var url, id
        switch (target) {
            case "create_cam":
                id = "create_cam";
                url = "/dashboard/settings/get/" + id;
                break;
            case "change-area-modal":
                id = "area";
                url = "/dashboard/settings/get/" + id;
                break;
            default:
                id = $(this).val();
                url = "/dashboard/settings/get/" + id;
        }
        
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

                    $('#editAreaModal').modal('toggle').on('hide.bs.modal', function(){
                        $('#editArea').html('');

                    });
                },
                error: function(msg){
                    console.error('ERROR', msg)
                    //
                }
            });
    })
});
