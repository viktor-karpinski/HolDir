@extends('master')

@section('content')

    <article id="kontakt" method="GET" action="/search/">

        <div class="about-section">
            <h1>About Us</h1>
            <br></br>
            <p>Wir haben uns die Herausforderung gestellt, einen Onlineshop namens HolDir zu kreieren,
                von Schüler für Schüler.</p>
            <p>Unser Team besteht aus fünf Schüler der HTL Rennweg aus der Klasse 4AX.</p>

        </div>

        <hr style="border-top: 1px solid gray
        ; margin: auto; margin-top: 25px; margin-bottom: 25px; width: 70%; ">

        <h2 class="teamcontainer">Unser Team</h2>
        <div class="row">
            <div class="column">
                <div class="card">
                    <img src="{{ asset('images/toni.jpeg') }}" alt="toni">
                    <div class="container">
                        <h3>Tino Lengerov</h3>
                        <p class="title">Developer</p>
                        <p>9234@htl.rennweg.at</p>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="card">
                <img src="{{ asset('images/viktor.jpg') }}" alt="toni">
                    <div class="container">
                        <h3>Viktor Karpinski</h3>
                        <p class="title">Backend Developer</p>
                        <p>viktor@htl.rennweg.at</p>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="card">
                <img src="{{ asset('images/darius.jpg') }}" alt="toni">
                    <div class="container">
                        <h3>Darius Lucuta</h3>
                        <p class="title">Projektleiter</p>
                        <p>8079@htl.rennweg.at</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <div class="card">
                <img src="{{ asset('images/luther.jpeg') }}" alt="toni">
                    <div class="container">
                        <h3>Luther Tran</h3>
                        <p class="title">Developer</p>
                        <p>Luther@htl.rennweg.at</p>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="card">
                <img src="{{ asset('images/beni.jpeg') }}" alt="toni">
                    <div class="container">
                        <h3>Beni Szydlowski</h3>
                        <p class="title">Designer</p>
                        <p>Beni@htl.rennweg.at</p>
                    </div>
                </div>
            </div>
        </div>

        <hr style="border-top: 1px solid gray
        ; margin-top: 25px; margin-bottom: 25px;">

        <div class="info-section">
            <div class="row">
                <div>
                <h2>
                Hast du Fragen?
                </h2>
                <br>
                <p>Hier bist du an der richtigen Stelle. Für Fragen kontaktiere uns auf der unten angegebenen Email.</p>
                <br></br>
                <br></br>
                <h2>Offizilles</h2>
                <br></br>
                <p>HTL Rennweg
                    <br>
                Rennweg 89b, 1030 Wien
                <br>
                www.holdir.newwebsite.com
                <br>
                email: 9234@htl.rennweg.at
                <br>
                tel: +4366473263097
                </p>
                </div>
            </div>
        </div>

    </article>

@endsection
