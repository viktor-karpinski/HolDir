@extends('master')

@section('content')

<article id="form-box">

    <h1>
        Konto bearbeiten
    </h1>
</article>

<article id="form-box">
    <form class="input-form" id="name-form" action="/changeName/" data-action="/settings/" data-ids="#name">
        @csrf
        <div class="input-box">
            <div class="label-box">
                <label for="name">
                    Name
                </label>
                <span for="name" max="64">
                    0 / 64
                </span>
            </div>
            <input class="input-text" id="name" type="text" placeholder="Viktor Karpinski" name="name" autocomplete="off" value="{{ $user->name }}">
            <p class="regex-box" for="name" data-regex="^[a-zA-ZöÖüÜäÄ ]{2,}$">
                Nur 
                <span>a-zA-Z</span> 
                und 
                <span>üÜäÄöÖ</span> 
                sind erlaubt
            </p>
        </div>
        <br><br>
        <button type="submit">
            Name ändern
        </button>
    </form>
</article>

<article id="form-box">
    <form class="input-form" id="email-form" action="/changeEmail/" data-action="/settings/" data-ids="#email">
        @csrf
        <div class="input-box">
            <div class="label-box">
                <label for="email">
                    Email
                </label>
                <span for="email" max="128">
                    0 / 64
                </span>
            </div>
            <input class="input-text" id="email" type="email" placeholder="7147@htl.rennweg.com" name="email" value="{{ $user->email }}">
            <p class="regex-box" for="email" data-regex="^[^\s@]+@[^\s@]+\.[^\s@]+$" data-text="Only a valid email allowed">
                Nur eine valide E-Mail ist erlaubt
            </p>
        </div>
        <br><br>
        <button type="submit">
            E-Mail ändern
        </button>
    </form>
</article>
<script src="{{ asset('js/form.js') }}"></script>
<script>
window.onload = () => {
    checkForm($('#name-form'))
    checkForm($('#email-form'))
}
$('#name').on('keyup', () => {
    checkForm($('#name-form'))
})
$('#name-form').on('submit', (ev) => {
    sendForm($('#name-form'), ev)
})
$('#email').on('keyup', () => {
    checkForm($('#email-form'))
})
$('#email-form').on('submit', (ev) => {
    sendForm($('#email-form'), ev)
})
</script>

@endsection
