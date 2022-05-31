@extends('master')

@section('content')
    <article class="chat-box">
        <div class="message-box">
            @if($messages !== null)
                @foreach($messages as $message)
                    @if ($message->user_id !== $user->id)
                    <div class="message" id="{{ $message->id }}">
                        <h1>
                            {{ $notuser->name }}
                        </h1>
                    @else
                    <div class="message right" id="{{ $message->id }}">
                    @endif
                        <p>
                            {{ $message->message }}
                        </p>
                    </div>
                @endforeach
            @else
                <h2>
                    schreib was
                </h2>
            @endif
        </div>
        <form id="message-form" action="/contact/{{ $article->id }}/{{ $notuser->id }}" data-action="/contact/{{ $article->id }}/{{ $notuser->id }}" data-ids="#message">
            @csrf
            <div class="input-box">
                <input type="text" name="message" id="message" placeholder="Geht 10€?" autocomplete="off">
                <div class="label-box">
                    <span for="message" max="64">
                    </span>
                </div>
            </div>
            <button type="submit">
                <img src="{{ asset('images/send.png') }}">
            </button>
        </form>
    </article>

    <form id="reload-form" action="/contact/get/{{ $article->id }}/{{ $notuser->id }}">
        @csrf
    </form>
    <input type="hidden" data-name="{{ $notuser->name }}" data-id="{{ $user->id }}" id="user-id">

    <script src="{{ asset('js/form.js') }}"></script>
    <script>
        window.onload = () => {
            checkForm($('#message-form'))
            scrollDown()
            $('#message').focus()
            checkText()
        }

        function checkText() {
            setTimeout(() => {
                console.log('geht')
                $.ajax({
                    type: 'GET',
                    url: $('#reload-form').attr('action'),
                    data: $('#reload-form').serialize(),
                    success(data) {
                        let lastId = $('.message:last-of-type').attr('id')
                        for (let i = 0; i < data.length; i++) {
                        if (data[i].id > lastId) {
                                console.log(data[i])
                                let message = '<div id="'+data[i].id+'" class="message'

                                if (data[i].user_id !== $('#user-id').attr('data-id')) {
                                    message += '"><h1>'+$("#user-id").attr("data-name")+'</h1><p>'+data[i].message+'</p></div>'
                                } else {
                                    message += ' right"><p>'+data[i].message+'</p></>'
                                }

                                console.log(message)
                                $('.message-box').append(message)
                                scrollDown()
                        }
                        }
                    }
                })
                checkText()
            }, 2000)
        }

        function scrollDown() {
            $('.message-box').scrollTop($('.message-box').prop("scrollHeight"))
        }

        $('#message').on('keyup', () => {
            checkForm($('#message'))
        })

        $('#message-form').on('submit', (ev) => {
            ev.preventDefault()
            if ($('#message').val().length > 0)
                sendForm($('#message-form'), ev)
        })
    </script>
@endsection