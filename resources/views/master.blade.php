<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"">
    <meta charset="utf-8">
    <title></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fugaz+One&family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/berlin-sans-fb-demi" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.js') }}"></script>
</head>

<body>
    @section('navBar')
        <nav>
            <aside>
                <button id="burger-menu">
                    <span class="patty patty-top"></span>
                    <span class="patty patty-mid"></span>
                    <span class="patty patty-bot"></span>
                </button>
                <a href="/" id="logo-name">
                    <!--<img src="{{ asset('images/holdir.png') }}">-->
                    HolDir
                </a>
            </aside>
            <ul>
                <li>
                    <a href="/upload/">
                        <img src="{{ asset('images/add.png') }}">
                    </a>
                </li>
                <li>
                    <a href="/profile/" class="message-info">
                        <img src="{{ asset('images/user.png') }}">
                    </a>
                </li>
            </ul>
        </nav>
    @show

    @if (Session::has('remember'))
        <script>
            localStorage.setItem('token', "{{Session::get('remember')}}")
            localStorage.setItem('user', "{{Session::get('user')}}")
        </script>
    @endif
    @if (Session::has('forget'))
        <script>
           localStorage.removeItem('token')
           localStorage.removeItem('user')
        </script>
    @endif
     @if (!Session::has('user'))
        <form id="token-form" style="display: none">
            @csrf
            <input type="text" name="token" id="token">
            <input type="text" name="user" id="user">
        </form>
        <script>
            if (localStorage.getItem('token') !== null && localStorage.getItem('user') !== null) {
                $('#token').val(localStorage.getItem('token'))
                $('#user').val(localStorage.getItem('user'))
                let form = $('#token-form')
                    form.on('submit', (ev) => {
                        ev.preventDefault()
                        $.ajax({
                            method: 'POST',
                            data: form.serialize(),
                            url: '/authtoken/',
                            success: (data) => {
                                if (data === '1') {
                                    location.reload()
                                }
                            }
                        })
                    }).trigger('submit')
            }
        </script>
    @endif
    
    <section class="main">
        @yield('content')
    </section>
        <footer>
        
        <div>
            <a href="/hilfe">
                Hilfe und Kontakt
            </a>
            <a>
                AGB
            </a>
            <a href="/impressum">
                Impressum
            </a>
            <a>
                Datenschutzerklärung
            </a>
        </div>
        <div>
            <h2>© HolDir. Alle Rechte vorbehalten</h2>
        </div>
    </footer>
</body>

</html>