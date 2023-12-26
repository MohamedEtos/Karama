// merchant cover 
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').css({'width':'100%'});
            $('#imagePreview').css({'height':'100%'});
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload1").change(function() {
    readURL(this);
});


// merchant image

function readURL2(input2) {
    if (input2.files && input2.files[0]) {
        var reader2 = new FileReader();
        reader2.onload = function(e) {
            $('#imagePreview2').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview2').hide();
            $('#imagePreview2').fadeIn(650);
        }
        reader2.readAsDataURL(input2.files[0]);
    }
}
$("#imageUpload2").change(function() {
    readURL2(this);
});

