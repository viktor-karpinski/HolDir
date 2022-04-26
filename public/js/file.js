$('#file').on('change', (ev) => {
    let input = $('#file')[0]
    if (input.files) {
        var filesAmount = input.files.length;

        for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();

            reader.onload = function(event) {
                $($.parseHTML('<div>')).attr('class', 'image').css({'background-image': 'url("'+event.target.result+'")'}).prependTo('#image-box')
            }

            reader.readAsDataURL(input.files[i]);
            $('#image-box').scrollLeft(0)
            $('.reset-button-box').css('height', 'auto')
        }
    }
})

$('#reset-file').on('click', () => {
    $('#file')[0].files = new DataTransfer().files  
    $('.image').css('display', 'none')
    $('.reset-button-box').css('height', '0')
})

