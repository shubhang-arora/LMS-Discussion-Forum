/**
 * Created by Sahil on 9/27/2015.
 */

$("#school_id").change(function()
{   var qid = $(this).attr("options");
    var aid = $(this).val();
    /*$.ajax({
        url : '/upvote/question',
        type: "post",
        data: {'id':$(this).attr("id"),'_token': $('input[name=_token]').val()},
        success: function(data){
            $("#"+qid).html(data);
        }
    })*/
    alert(aid);
});