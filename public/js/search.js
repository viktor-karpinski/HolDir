$('#service, #article').on('change', () => {
    if ($('#service').is(':checked'))
        $('#mover').addClass('moved')
    else 
        $('#mover').removeClass('moved')
})