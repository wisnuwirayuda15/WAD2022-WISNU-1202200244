@extends('layouts.main')

@section('content')
    <div class="container justify-content-center mb-5" style="margin-top: 5rem">
        <h1 style="font-size: 40px; font-weight: bold">Edit</h1>
        <p>Edit mobil {{ $carList->name }}</p>
        <form action="/showroom/{{ $carList->id }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Mobil</label>
                <input value="{{ $carList->name }}" type="text" class="form-control" name="name" id="name"
                    required>
            </div>
            <div class="mb-3">
                <label for="owner" class="form-label">Nama Pemilik</label>
                <input value="{{ $carList->owner }}" type="text" class="form-control" name="owner" id="owner"
                    required>
            </div>
            <div class="mb-3">
                <label for="brand" class="form-label">Merk</label>
                <input value="{{ $carList->brand }}" type="text" class="form-control" name="brand" id="brand"
                    required>
            </div>
            <div class="mb-3">
                <label for="purchase_date" class="form-label">Tanggal Beli</label>
                <input value="{{ $carList->purchase_date }}" type="date" class="form-control" id="purchase_date"
                    name="purchase_date" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="description" id="description" rows="3" required>{{ $carList->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Pilih file</label>
                <img class="img-thumbnail img-fluid mt-3 mb-3">
                <input type="file" class="form-control" name="image" id="image" accept="image/*">
            </div>
            <div class="mb-3">
                <label class="form-label">Status Pembayaran</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="lunas" value="Lunas"
                        {{ $carList->status == 'Lunas' ? 'checked' : '' }}>
                    <label class="form-check-label" for="lunas">Lunas</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="belum_lunas"
                        value="Belum-Lunas" {{ $carList->status == 'Belum-Lunas' ? 'checked' : '' }}>
                    <label class="form-check-label" for="belum_lunas">Belum Lunas</label>
                </div>
            </div>
            <button class="btn btn-primary px-3" style="margin-right: 2rem" type="submit" name="edit" onclick="return confirm('Simpan perubahan mobil {{ $carList->name }}?')"><i class="bi bi-download"></i> Simpan</button>
            <a class="btn btn-danger px-3" href="/showroom" role="button"><i class="bi bi-caret-left-fill"></i> Back</a>
        </form>
    </div>
@endsection
