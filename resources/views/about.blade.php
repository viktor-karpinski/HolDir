@extends('master')

@section('content')
<article id="aboutusbox">
    <div class="aboutmeandstuff">
        <div class="us-image"></div>
        <div class="us-text">
            <h2>
                Viktor Karpinski
            </h2>
            <p>
                Fullstack. Habe alles programmiert und designed.
            </p>
        </div>
    </div>
    <div class="aboutmeandstuff">
        <div class="us-image"></div>
        <div class="us-text">
            <h2>
                Darius Lucuta
            </h2>
            <p>
                Scrum Master. Hat alles organisatorisches gemacht.
            </p>
        </div>
    </div>
    <div class="aboutmeandstuff">
        <div class="us-image"></div>
        <div class="us-text">
            <h2>
                Toni L.
            </h2>
            <p>
                Hat Server gemacht.
            </p>
        </div>
    </div>
    <div class="aboutmeandstuff">
        <div class="us-image"></div>
        <div class="us-text">
            <h2>
                Beni
            </h2>
            <p>
                War lustig.
            </p>
        </div>
    </div>
    <div class="aboutmeandstuff">
        <div class="us-image"></div>
        <div class="us-text">
            <h2>
                Luther Tran
            </h2>
        </div>
    </div>
</article>

<script>
    window.onload = () => {
        resizeThis()
        $('#loading-box').css('display', 'none')
    }

    window.onresize = () => {
        resizeThis()
    }

    function resizeThis() {
        $('.us-image').css('height', $('.us-image').outerWidth() + 'px')
    }
</script>
@endsection