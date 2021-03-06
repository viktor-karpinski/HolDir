window.onload = () => {
    article()
    
    if (window.location.pathname === '/search/') {
        let getters = window.location.search.split('?')[1].split('&')
        $('#search').val(getters[0].split('=')[1])
        if (getters[1].split('=')[1] === 's')
            $('.radio-box label[for="service"]').trigger('click')
    }

    $('#loading-box').css('display', 'none')
}

window.onresize = () => {
    article()
}

function article() {
    $('.article').find('.place-holder').css({'height': $('.article').outerWidth() + 'px'})
    $('.article').first().css({'height': 'auto'})
    if (screen.width < 800)
        $('#article-box').css('grid-row-gap', $('#article-box').innerWidth() * 0.04 + 'px')
    else
        $('#article-box').css('grid-row-gap', $('#article-box').innerWidth() * 0.02 + 'px')
}