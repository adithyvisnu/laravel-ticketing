
// https://codepen.io/mobifreaks/pen/LIbca    
function showThumbnail(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#preview').attr('src', e.target.result);
            $('#preview').css( "maxWidth", "150px");
            $('#preview').css( "maxHeight", "150px");
        };

        reader.readAsDataURL(input.files[0]);
    }
}