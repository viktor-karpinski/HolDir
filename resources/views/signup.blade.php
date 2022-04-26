@extends('master')

@section('content')

<article id="form-box">

    <h1>
         Neu registrieren
    </h1>

    <br>

    <p class="text-link">
        Oder als bestehender Benutzer <a href="/login/">einloggen</a>
    </p>

    <form class="input-form" id="signup-form" action="/signup/" data-action="/profile/" data-ids="#signup-password,#signup-email,#signup-name" data-checkbox="#signup-accept">
        @csrf
        <div class="input-box">
            <div class="label-box">
                <label for="signup-name">
                    Name
                </label>
                <span for="signup-name" max="64">
                    0 / 64
                </span>
            </div>
            <input class="input-text" id="signup-name" type="text" placeholder="Viktor Karpinski" name="name" autocomplete="off">
            <p class="regex-box" for="signup-name" data-regex="^[a-zA-ZöÖüÜäÄ ]{2,}$">
                Nur 
                <span>a-zA-Z</span> 
                und 
                <span>üÜäÄöÖ</span> 
                sind erlaubt
            </p>
        </div>
        <br>
        <div class="input-box">
            <div class="label-box">
                <label for="signup-email">
                    Email
                </label>
                <span for="signup-email" max="128">
                    0 / 64
                </span>
            </div>
            <input class="input-text" id="signup-email" type="email" placeholder="7147@htl.rennweg.com" name="email">
            <p class="regex-box" for="signup-email" data-regex="^[^\s@]+@[^\s@]+\.[^\s@]+$" data-text="Only a valid email allowed">
                Nur eine valide E-Mail ist erlaubt
            </p>
        </div>
        <br>
        <div class="input-box">
            <div class="label-box">
                <label for="signup-password">
                    Password
                </label>
                <span for="signup-password" max="64">
                    0 / 64
                </span>
            </div>
            <input class="input-text password" id="signup-password" type="password" placeholder="VeryPassword" name="password" autocomplete="off">
            <button type="button" for="signup-password" class="show-password" tabindex="-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M11.885 14.988l3.104-3.098.011.11c0 1.654-1.346 3-3 3l-.115-.012zm8.048-8.032l-3.274 3.268c.212.554.341 1.149.341 1.776 0 2.757-2.243 5-5 5-.631 0-1.229-.13-1.785-.344l-2.377 2.372c1.276.588 2.671.972 4.177.972 7.733 0 11.985-8.449 11.985-8.449s-1.415-2.478-4.067-4.595zm1.431-3.536l-18.619 18.58-1.382-1.422 3.455-3.447c-3.022-2.45-4.818-5.58-4.818-5.58s4.446-7.551 12.015-7.551c1.825 0 3.456.426 4.886 1.075l3.081-3.075 1.382 1.42zm-13.751 10.922l1.519-1.515c-.077-.264-.132-.538-.132-.827 0-1.654 1.346-3 3-3 .291 0 .567.055.833.134l1.518-1.515c-.704-.382-1.496-.619-2.351-.619-2.757 0-5 2.243-5 5 0 .852.235 1.641.613 2.342z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 7.449-11.985 7.449c-7.18 0-12.015-7.449-12.015-7.449s4.446-6.551 12.015-6.551c7.694 0 11.985 6.551 11.985 6.551zm-7 .449c0-2.761-2.238-5-5-5-2.761 0-5 2.239-5 5 0 2.762 2.239 5 5 5 2.762 0 5-2.238 5-5z"/></svg>
            </button>
            <p class="regex-box" for="signup-password" data-regex="^(?=.*?[A-Z])(?=.*?[a-z])[a-zA-Z\d#?!@$%^&*-].{7,}$">
                mind. 8 Zeichen und einen <span>Groß- & Kleinbuchstaben</span>
            </p>
        </div>
        <br>
        <br>
        <div class="check-box">
            <label class="container text-link" for="signup-accept">
                <p>Ich erkläre mich mit den <a href="/privacy-policy/" tabindex="-1" target="_blank"> AGB</a> einverstanden<p>
                <input type="checkbox" name="accept" id="signup-accept">
                <span class="checkmark"></span>
            </label>
        </div>
        <br><br>
        <br>
        <button type="submit">
            signup
        </button>
    </form>
</article>

<script src="{{ asset('js/form.js') }}"></script>
<script>
$('#signup-password, #signup-name, #signup-email').on('keyup', () => {
    checkForm($('#signup-form'))
})
$('#signup-accept').on('change', () => {
   checkForm($('#signup-form'))
})
$('button[for="signup-password"]').on('click', (ev) => {
    showPassword(ev)
})
$('#signup-form').on('submit', (ev) => {
    sendForm($('#signup-form'), ev)
})
</script>

@endsection
