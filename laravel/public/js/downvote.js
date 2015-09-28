/**
 * Created by Shubhang on 09-09-2015.
 */
$(".downvote-question").click(function()
{   var qid = $(this).attr("id");
    $.ajax({
        url : '/downvote/question',
        type: "post",
        data: {'id':$(this).attr("id"),'_token': $('input[name=_token]').val()},
        success: function(data){
            $("#"+qid).html(data);
        }
    })
});

/**
 * Created by Shubhang on 09-09-2015.
 */
$(".downvote-answer").click(function()
{   var aid = $(this).attr("id");
    $.ajax({
        url : '/downvote/answer',
        type: "post",
        data: {'id':$(this).attr("id"),'_token': $('input[name=_token]').val()},
        success: function(data){

            $("#"+aid).html(data);
        }
    })
});

