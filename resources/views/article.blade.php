@extends('master')

@section('content')
<br>
<div id="image-box-container" class="view">
<div id="image-box" for="file">
@foreach ($images as $image)
    <div class="image" style="background-image: url('{{ asset('article_images/'. $image->name) }}')"></div>
@endforeach
</div>
<script src="{{ asset('js/image.js') }}"></script>
</div>

<article id="about">
    <h1>
        {{ $article->name }}
    </h1>
    <br>
    <h2>
        {{ $article->price }}€
    </h2>
    @if (strlen($article->description) > 0)
        <br>
        <p class="description">
            {{ $article->description }}
        </p>
    @endif
    <br>
    <p>
        <b>Verkäufer:</b> <a href="/profile/{{ $user->id }}">{{ $user->name }}</a>
    </p>
    <br><br>
    @if ($user->email === Session::get('user'))
        <a class="button" href="/delete/{{ $article->id }}">
            GibWeg 
            <span>(löschen)</span>
        </a>
        <br>
        <a class="button" href="/edit/{{ $article->id }}">
            MachAnders
            <span>(bearbeiten)</span>
        </a>
    @else
        <a class="button" href="/contact/{{ $article->id }}/{{ $user->id }}">
            HolDir 
            <span>(kontaktieren)</span>
        </a>
        @if (Session::get('admin') === 1)
            <br>
            <a class="button" href="/delete/{{ $article->id }}">
                GibWeg 
            <span>(löschen)</span>
        </a>
        @endif
    @endif
</article>

<script>
    $('.main').addClass('different')
</script>

@endsection
