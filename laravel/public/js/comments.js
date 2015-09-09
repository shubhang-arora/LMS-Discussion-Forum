/**
 * Created by Sahil on 9/7/2015.
 */

function parentID(){
    var PageURL = window.location.pathname,
        URLVariables = PageURL.split('/');
    for(var i=0;URLVariables[i]!=null;i++){

    }
    return URLVariables[i-1];
}

function loadComments(){
    $.ajax({
        url : parentID()+'/comments',
        type: "get",
        data: {'parentID':parentID()},
        success: function(data){
            $("#comment").after("<br>"+data);

        }
    });
}

function postComment(){
    $.ajax({
        url : parentID()+'/comments',
        type: "post",
        data: {'comment':$('input[name=comment]').val(),'parentID':parentID() ,'_token': $('input[name=_token]').val()},
        success: function(data){
            console.log(data);
        }
    });
}

$(document).ready(function(){


    $(".writeComment").hide();
    $("#comment").click(function(){
        loadComments();
        $(".writeComment").show();
    });
    $(".send-btn").click(function(){

        postComment();
    });
});
