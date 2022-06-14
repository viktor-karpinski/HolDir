window.onload = () => {
    image()
    $('#loading-box').css('display', 'none')
}

window.onresize = () => {
    image()
}

function image() {
    $('#image-box').css({'height': $('#image-box').outerWidth() + 'px'})
}