window.onload = () => {
    image()
}

window.onresize = () => {
    image()
}

function image() {
    $('#image-box').css({'height': $('#image-box').outerWidth() + 'px'})
}