/**
 * Created by Shubhang on 09-09-2015.
 */
$(".upvote-question").click(function()
{   var qid = $(this).attr("id");
    $.ajax({
        url : '/upvote/question',
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
$(".upvote-answer").click(function()
{   var aid = $(this).attr("id");
    $.ajax({
        url : '/upvote/answer',
        type: "post",
        data: {'id':$(this).attr("id"),'_token': $('input[name=_token]').val()},
        success: function(data){

            $("#"+aid).html(data);
        }
    })
});