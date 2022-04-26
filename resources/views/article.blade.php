@extends('master')

@section('content')
<br>
<div id="image-box" for="file">
@foreach ($images as $image)
    <div class="image" style="background-image: url('{{ asset('article_images/'. $image->name) }}')"></div>
@endforeach
</div>
<script src="{{ asset('js/image.js') }}"></script>

<article id="about">
    <h1>
        {{ $article->name }}
    </h1>
    <br>
    <h2>
        {{ $article->price }}€
    </h2>
    <br>
    <p>
        {{ $article->description }}
    </p>
    <button>
        Kontaktieren
    </button>
</article>

@endsection
