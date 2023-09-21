@extends('layouts.master')
@section('name', 'Bananna Store')
@section('content')
    <main class="homepage">

        <div class="container">
            <h2 style="margin: 50px 10px">Populære produkter</h2>

            <div class="home-section">
                <div class="product-list">
                    <div class="card col-lg-3 col-md-5 col-sm-12">
                        <img src="/img/banana1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Banan klase</h5>
                            <p class="card-text">Kort beskrivelse af produktet som er en banan klase.</p>
                            @if($is_verified)
                                <a href="#" class="btn btn-primary">Se mere</a>
                            @else
                                <a href="#" class="btn btn-secondary disabled">Se mere</a>
                            @endif
                        </div>
                    </div>

                    <div class="card col-lg-3 col-md-5 col-sm-12">
                        <img src="/img/banana2.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Banan klase</h5>
                            <p class="card-text">Kort beskrivelse af produktet som er en banan klase.</p>
                            <a href="#" class="btn btn-primary">Se mere</a>
                        </div>
                    </div>

                    <div class="card col-lg-3 col-md-5 col-sm-12">
                        <img src="/img/banana1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Banan klase</h5>
                            <p class="card-text">Kort beskrivelse af produktet som er en banan klase.</p>
                            <a href="#" class="btn btn-primary">Se mere</a>
                        </div>
                    </div>

                    <div class="card col-lg-3 col-md-5 col-sm-12">
                        <img src="/img/banana1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Banan klase</h5>
                            <p class="card-text">Kort beskrivelse af produktet som er en banan klase.</p>
                            <a href="#" class="btn btn-primary">Se mere</a>
                        </div>
                    </div>

                    <div class="card col-lg-3 col-md-5 col-sm-12">
                        <img src="/img/banana2.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Banan klase</h5>
                            <p class="card-text">Kort beskrivelse af produktet som er en banan klase.</p>
                            <a href="#" class="btn btn-primary">Se mere</a>
                        </div>
                    </div>

                    <div class="card col-lg-3 col-md-5 col-sm-12">
                        <img src="/img/banana2.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Banan klase</h5>
                            <p class="card-text">Kort beskrivelse af produktet som er en banan klase.</p>
                            <a href="#" class="btn btn-primary">Se mere</a>
                        </div>
                    </div>

                    <div class="card col-lg-3 col-md-5 col-sm-12">
                        <img src="/img/banana1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Banan klase</h5>
                            <p class="card-text">Kort beskrivelse af produktet som er en banan klase.</p>
                            <a href="#" class="btn btn-primary">Se mere</a>
                        </div>
                    </div>

                    <div class="card col-lg-3 col-md-5 col-sm-12">
                        <img src="/img/banana1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Banan klase</h5>
                            <p class="card-text">Kort beskrivelse af produktet som er en banan klase.</p>
                            <a href="#" class="btn btn-primary">Se mere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </main>
@endsection
