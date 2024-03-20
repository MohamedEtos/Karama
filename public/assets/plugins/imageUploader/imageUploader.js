function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#adsImage').css('background-image', 'url('+e.target.result +')');

            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload1").change(function() {
    readURL(this);
});

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
function readURL3(input3) {
    if (input3.files && input3.files[0]) {
        var reader3 = new FileReader();
        reader3.onload = function(e) {
            $('#imagePreview3').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview3').append('<img id="sss">');
            $('#imagePreview3').hide();
            $('#imagePreview3').fadeIn(650);
        }
        reader3.readAsDataURL(input3.files[0]);
    }
}
$("#imageUpload3").change(function() {
    readURL3(this);
});
