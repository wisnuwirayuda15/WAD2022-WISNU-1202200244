@extends('layouts.main')

@section('content')
    <div class="container align-items-center d-flex" style="height: 100vh">
        <div class="row">
            <div class="col d-flex align-items-center">
                <div class="container">
                    <div class="row row-cols-1">
                        <div class="col">
                            <h1 style="font-size: 50px; font-weight: bold">Selamat Datang Di Showroom{{ $welcome_name }}</h1>
                        </div>
                        <div class="col">
                            <p>Showroom mobil termewah</p>
                        </div>
                        @auth
                            <div class="constainer">
                                <a class="btn btn-primary" href="/showroom" role="button"><i class="bi bi-car-front-fill"></i> MyCar</a>
                            </div>
                        @endauth
                        <div class="col">
                            <div class="container">
                                <div class="row row-cols-auto align-items-center" style="margin-top: 70px">
                                    <img class="img-fluid" style="max-width: 25%" src="/img/logo-ead.png" alt="Logo EAD">
                                    <p style="margin-top: 15px">Wisnu_1202200244</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div id="carouselExampleControls" class="carousel slide d-flex" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="2000">
                            <img src="/img/cooper.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="/img/lotus.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="/img/mercedes.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
