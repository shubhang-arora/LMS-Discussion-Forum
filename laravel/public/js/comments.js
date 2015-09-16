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
    var comment= $(".writeComment");
    comment.empty();
    $.ajax({
        url : parentID()+'/comments',
        type: "get",
        data: {'parentID':parentID()},
        success: function(data){
            $(".writeComment").prepend('<div class="panel panel-default"><ul class="list-group">'+data+'</ul></div>');

        }
    });
    comment.append('<div class="form-group"><input type="text" name="comment" class="form-control" id="write"></div>');

}

function postComment(){
    $.ajax({
        url : parentID()+'/comments',
        type: "post",
        data: {'comment':$('input[name=comment]').val(),'parentID':parentID() ,'_token': $('input[name=_token]').val()},
        success: function(){

            loadComments();
        }
    });
}

$(document).ready(function(){
    $("#comment").click(function(){
        loadComments();

    });

    $(document).on('keypress', 'input#write',function(e) {
        if (e.which == 13) {
            postComment();
        }
    })
});
