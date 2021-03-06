@extends('master')

@section('content')
<article id="form-box">
    <h1>
        Artikel / Dienst hochladen
    </h1>

    <form class="input-form" id="upload-form" action="/edit/{{$article->id}}" data-action="/article/{{$article->id}}" data-ids="#upload-name" enctype="multipart/form-data">
        @csrf
        <input type="file" multiple name="pictures[]" accept="image/*" id="file">
        <div class="input-box">
            <div class="label-box">
                <label for="upload-name">
                    Name des Artikels / Dienstes
                </label>
                <span for="upload-name" max="64">
                    0 / 64
                </span>
            </div>
            <input class="input-text" id="upload-name" type="text" placeholder="Taschenrechner" name="name" autocomplete="off" value="{{ $article->name }}">
            <p class="regex-box" for="upload-name" data-regex="^[a-zA-Z0-9üÜöÖäÄ,._#+*/!(){}\-;: ]{3,}$">
                Mindestens 3 Zeichen
            </p>
        </div>
        <br><br>
        <div class="radio-box upload">
            <div id="mover"></div>
            <label for="article">
                Artikel
            </label>
            <label for="service">
                Dienst
            </label>
        </div>
        <input type="radio" name="type" id="article" value="1" checked>
        <input type="radio" name="type" id="service" value="0">

        <script src="{{ asset('js/search.js') }}"></script>
        @if($article->type === 0)
            <script>
                $('label[for="service"]').trigger('click')
            </script>
        @endif
        <br>
        <br>
        <div class="input-box">
            <div class="label-box">
                <label for="upload-price">
                    Preis (in €)
                </label>
            </div>
            <input class="input-text" id="upload-price" min="1" type="number" value="{{ $article->price }}" required placeholder="20" name="price" autocomplete="off">
        </div>
        <br>
        <div class="input-box">
            <div class="label-box">
                <label for="upload-description">
                    Beschreibung
                </label>
                <span for="upload-description" max="128">
                    0 / 255
                </span>
            </div>
            <textarea class="input-text" id="upload-description" type="text" placeholder="Ein sehr gutes..." name="description">{{ $article->description }}</textarea>
        </div>
        
        <br><br>
        <button type="submit">
            hochladen
        </button>
    </form>
</article>

<div id="image-box-container">
    <article id="form-box">
        <h1 style="text-align:center">
            Achtung! Wenn du neue Bilder auswählst, dann werden die alten gelöscht!
        </h1>
    </article>
    <br>
    <div id="image-box" for="file">
        <label class="placeholder" for="file">
        </label>
    </div>
    <div class="reset-button-box">
        <button id="reset-file">
            Reset
        </button>
    </div>
</div>

<script src="{{ asset('js/image.js') }}"></script>
<script src="{{ asset('js/file.js') }}"></script>
<script src="{{ asset('js/form.js') }}"></script>
<script>
    $('.main').addClass('different even-more')
    $('#upload-name').on('keyup', () => {
        checkForm($('#upload-form'))
    })
    $('#upload-form').on('submit', (ev) => {
        sendForm($('#upload-form'), ev)
    })
</script>

@endsection
