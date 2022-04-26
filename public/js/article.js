window.onload = () => {
    article()
}

window.onresize = () => {
    article()
}

function article() {
    $('.article').find('.place-holder').css({'height': $('.article').outerWidth() + 'px'})
    $('.article').first().css({'height': 'auto'})
}