@extends('layouts.main')

@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="/img/uploaded/{{ $carList->image }}" class="card-img-top sticky-top rounded" alt="gambar mobil">
                </div>
            </div>
        </div>
    </div>
    <div class="container justify-content-center" style="margin-top: 5rem">
        <h1 style="font-size: 40px; font-weight: bold">{{ $carList->name }}</h1>
        <p>Detail mobil {{ $carList->name }}</p>
        <div class="row">
            <div class="col-5">
                <img id="detail_img" src="/img/uploaded/{{ $carList->image }}" class="card-img-top sticky-top rounded"
                    alt="gambar mobil" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    style=" aspect-ratio: 4 / 3; object-fit: cover;">
            </div>
            <div class="col-7">
                <form action="/showroom/{{ $carList->id }}/edit" method="GET">
                    @csrf
                    <input type="hidden" name="foto_mobil" id="foto_mobil" value="{{ $carList->image }}">
                    <input type="hidden" name="status_pembayaran" id="status_pembayaran" value="{{ $carList->status }}" />
                    <div class="mb-3">
                        <label for="nama_mobil" class="form-label">Nama Mobil</label>
                        <input value="{{ $carList->name }}" type="text" class="form-control" name="nama_mobil"
                            id="nama_mobil" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="pemilik_mobil" class="form-label">Nama Pemilik</label>
                        <input value="{{ $carList->owner }}" type="text" class="form-control" name="pemilik_mobil"
                            id="pemilik_mobil" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="merk_mobil" class="form-label">Merk</label>
                        <input value="{{ $carList->brand }}" type="text" class="form-control" name="merk_mobil"
                            id="merk_mobil" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_beli" class="form-label">Tanggal Beli</label>
                        <input value="{{ $carList->purchase_date }}" type="date" class="form-control" id="tanggal_beli"
                            name="tanggal_beli" value="" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" readonly>{{ $carList->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status Pembayaran</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_pembayaran" id="lunas"
                                value="Lunas" {{ $carList->status == 'Lunas' ? 'checked' : '' }} disabled>
                            <label class="form-check-label" for="lunas">Lunas</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_pembayaran" id="belum_lunas"
                                value="Belum Lunas" {{ $carList->status == 'Belum-Lunas' ? 'checked' : '' }} disabled>
                            <label class="form-check-label" for="belum_lunas">Belum Lunas</label>
                        </div>
                    </div>
                    <div class="mb-5 d-flex">
                        <button class="btn btn-warning px-4" style="margin-right: 2rem" type="submit" name="submit"><i
                                class="bi bi-pencil-square"></i> Edit</button>
                        <a class="btn btn-danger px-4" href="/showroom" role="button"><i
                                class="bi bi-caret-left-fill"></i> Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
