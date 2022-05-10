@extends('master')

@section('content')
<form id="search-form" method="GET" action="/search/">
    <label for="search">
        <input type="text" autocomplete="off" required="true" name="s" id="search" placeholder="Was suchst du?">
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
    <input type="radio" name="t" id="article" value="a" checked>
    <input type="radio" name="t" id="service" value="s">

    <script src="{{ asset('js/search.js') }}"></script>
</form>

<article id="about">
<a href="/aboutus">
    <h1>
        
        Über <span>HolDir</span>
    </h1>
    <br>
    <p>
        5 Jungs aus der 4AX, welche sich der Herausforderung gestellt haben, eine Webseite zu erstellen, um den Schülern zu ermöglichen ihre Sachen zu verkaufen. Jeder von uns braucht was, also HolDir. Wir hoffen euch gefällts!
    </p>
</a>
</article>

<article id="article-box">
    @foreach ($articles as $article)
        <a 
            class="article" 
            href="/article/{{ $article->id }}" 
            id="{{ $article->id }}"
            style="background-image: url('{{ asset('article_images/'. $images[$loop->index+1]->name) }}')"
            >
            <div class="place-holder"></div>
            <div class="info-holder">
                <h2>
                    {{ $article->name }}
                </h2>
                <p>
                    {{ $article->price }}€
                </p>
            </div>
        </a>
    @endforeach
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