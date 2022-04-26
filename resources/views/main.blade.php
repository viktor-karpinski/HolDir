@extends('master')

@section('content')
<form id="search-form" method="GET" action="/search/">
    <label for="search">
        <input type="text" autocomplete="off" required="true" name="search" id="search" placeholder="Was suchst du?">
        <button type="submit">
        <img src="{{ asset('images/search.png') }}">
        </button>
    </label>
    <div class="radio-box">
        <div id="mover"></div>
        <label for="article">
            Artikel
        </label>
        <label for="service">
            Dienste
        </label>
    </div>
    <input type="radio" name="type" id="article" value="article" checked>
    <input type="radio" name="type" id="service" value="service">

    <script src="{{ asset('js/search.js') }}"></script>
</form>

<article id="about">
<a href="/aboutus">
    <h1>
        
        Über <span>HolDir</span>
    </h1>
    <br>
    <p>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
    </p>
</a>
</article>

<article id="article-box">

    <a class="article" href="">
        <div class="place-holder"></div>
        <div class="info-holder">
            <h2>
                Taschenrechner
            </h2>
            <p>
                50€
            </p>

        </div>
    </a>

    <a class="article" href="">
        <div class="place-holder"></div>
        <div class="info-holder">
            <h2>
                Taschenrechner
            </h2>
            <p>
                50€
            </p>

        </div>
    </a>

    <a class="article" href="">
        <div class="place-holder"></div>
        <div class="info-holder">
            <h2>
                Taschenrechner
            </h2>
            <p>
                50€
            </p>

        </div>
    </a>

    <a class="article" href="">
        <div class="place-holder"></div>
        <div class="info-holder">
            <h2>
                Taschenrechner
            </h2>
            <p>
                50€
            </p>

        </div>
    </a>

    <a class="article" href="">
        <div class="place-holder"></div>
        <div class="info-holder">
            <h2>
                Taschenrechner
            </h2>
            <p>
                50€
            </p>

        </div>
    </a>

    <a class="article" href="">
        <div class="place-holder"></div>
        <div class="info-holder">
            <h2>
                Taschenrechner
            </h2>
            <p>
                50€
            </p>

        </div>
    </a>

    <a class="article" href="">
        <div class="place-holder"></div>
        <div class="info-holder">
            <h2>
                Taschenrechner
            </h2>
            <p>
                50€
            </p>

        </div>
    </a>
</article>
<article id="next-box">
    <a href="" class="disabled">
        <img src="{{ asset('images/left_arrow.png') }}">
    </a>

    <p>1 / 3</p>

    <a href="">
        <img src="{{ asset('images/right_arrow.png') }}">
    </a>
</article>

<script src="{{ asset('js/article.js') }}"></script>
@endsection