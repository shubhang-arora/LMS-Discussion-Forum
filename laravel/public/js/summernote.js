/**
 * Created by Sahil on 9/7/2015.
 */
$(document).ready(function() {
    $('#summernote').summernote({
        height: 300,

        minHeight: null,
        maxHeight: null,

        focus: true

    });
});
var postForm = function() {
    var answer = $('textarea[name="answer"]').html($('#summernote').code());
}