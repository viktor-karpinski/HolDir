function checkInput(id) {

    // checks length and repairs length of input
    let max = $('span[for="'+id.attr('id')+'"]')
    if (id.val().length > max.attr('max')) 
        id.val(id.val().substring(0, max.attr('max')))
    max.text(id.val().length + ' / ' + max.attr('max'))

    // checks regex
    let disabled = false,
        reg = $('.regex-box[for=' +id.attr('id')+ ']')
    if (!new RegExp($('.regex-box[for="'+id.attr('id')+'"]').attr('data-regex')).test(id.val())) {
        reg.addClass('error')
        disabled = true
    } else {
        reg.removeClass('error')
        disabled = false
    }
    if (reg.attr('data-text') !== null)
        reg.text(reg.attr('data-text'))

    return disabled
}

function checkBox(input) {
    let disabled = false
    if (!input.is(":checked")) {
        disabled = true
        input.parent().addClass('error')
    } else {
        input.parent().removeClass('error')
    }
    return disabled
}

function showPassword(ev) {
    let btn = $(ev.currentTarget)
    btn.toggleClass('show')
    $('#' + btn.attr('for')).attr('type', ($('#' + btn.attr('for')).attr('type') === 'password') ? 'text':'password')
}

function checkForm(form) {
    let disabled = false

    if (form[0].hasAttribute('data-ids')) {
        let inputs = form.attr('data-ids').split(',')

        inputs.forEach(input => {
            if (checkInput($(input)))
                disabled = true
        })
    }

    if (form[0].hasAttribute('data-checkbox')) {
        let checkboxes = form.attr('data-checkbox').split(',')

        checkboxes.forEach(checkbox => {
            if (checkBox($(checkbox)))
                disabled = true
        })
    }

    if (disabled) 
        form.find('button[type="submit"]').prop('disabled', true)
    else
        form.find('button[type="submit"]').prop('disabled', false)

    return disabled
}

function sendForm(form, ev) {
    ev.preventDefault()

    if (!checkForm(form)) {
        $.ajax({
            method: 'post',
            enctype: 'multipart/form-data',
            url: form.attr('action'),
            data: new FormData(form[0]),
            processData: false,
            contentType: false,
            cache: false,
            success: (res) => {
               handle(form, res)
            },
            error: (res) => {
                handle(form, res)
            },
        })
    }

    function handle(form, res) {
        console.log(res)
        if (res === '1') {
            $(location).attr('href', form.attr('data-action'))
            return;
        } else if (res === '2') {
            $('.error-box').addClass('show')
            return;
        } 

        for (const [key, value] of Object.entries(res.responseJSON.errors)) {
            let id = form.find('input[name="' +key+ '"]').attr('id')
            $('.regex-box[for="' +id+ '"]').addClass('error')
            $('.regex-box[for="' +id+ '"]').text(value)
        }
    }
}