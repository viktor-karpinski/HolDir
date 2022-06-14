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
<br>
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
    {{ $articles->render() }}
</article>

<script src="{{ asset('js/article.js') }}"></script>

@endsection