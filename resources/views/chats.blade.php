@extends('master')

@section('content')

    @if(count($chats_buying) > 0)
        <article id="about" class="chat-about">
             <h1>
                Von wem du holen würdest
            </h1>
        </article>
        <section class="chats-box">
            @foreach($chats_buying as $chat)
                <a class="chat" href="/contact/{{ $chat->article_id }}/{{ $chat->seller }}">
                    <div class="chat-image" style="background-image: url('{{ asset('article_images/' . $images_buying[$loop->index+1]->name) }}')"></div>
                    <h2>
                        {{ $names_buying[$loop->index+1]->name }}
                    </h2>
                </a>
            @endforeach
        </section>
    @endif

    @if(count($chats_selling) > 0)
        <article id="about" class="chat-about">
             <h1>
                Wem du geben würdest
            </h1>
        </article>
        <section class="chats-box">
            @foreach($chats_selling as $chat)
                <a class="chat" href="/contact/{{ $chat->article_id }}/{{ $chat->buyer }}">
                    <div class="chat-image" style="background-image: url('{{ asset('article_images/' . $images_selling[$loop->index+1]->name) }}')"></div>
                    <h2>
                        {{ $names_selling[$loop->index+1]->name }}
                    </h2>
                </a>
            @endforeach
        </section>
    @endif

@endsection