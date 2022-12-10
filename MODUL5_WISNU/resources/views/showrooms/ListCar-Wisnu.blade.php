@extends('layouts.main')

@section('content')
    <div class="container justify-content-center">
        <h1 style="font-size: 40px; font-weight: bold; margin-top: 5rem">List Showroom</h1>
        <p>List Showroom {{ auth()->user()->name }}</p>
        <br>
        <div class="row row-cols-auto">
            @foreach ($carList as $list)
                <div class="col">
                    <div class="card shadow d-flex justify-content-center" id="card_list"
                        style="width: 18rem; margin-bottom: 10%; height: 30rem;">
                        <img src="/img/uploaded/{{ $list->image }}" class="card-img-top" alt="gambar mobil"
                            style="display: block; width: 18rem; height: 18rem; object-fit: cover">
                        <div class="card-body">
                            <h4 class="card-title" style="font-weight: bold">{{ mb_strimwidth($list->name, 0, 18, '...') }}</h4>
                            <p class="card-text">{{ mb_strimwidth($list->description, 0, 40, '...') }}</p>
                            <div class="d-flex justify-content-around position-absolute" style="bottom: 1.5rem; right: 0; left: 0">
                                <form action="/showroom/{{ $list->id }}" method="GET" class="d-flex">
                                    @csrf
                                    <button class="btn btn-primary rounded-pill px-4"><i class="bi bi-eye-fill"></i> Detail</button>
                                </form>
                                <form action="/showroom/{{ $list->id }}" method="POST" class="d-flex">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger rounded-pill px-4"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus mobil {{ $list->name }}?')"><i class="bi bi-trash-fill"></i> Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </main>
    <footer>
        <div class="container">
            <p>Jumlah Mobil: {{ count($carList) }} </p>
        </div>
    </footer>
@endsection
