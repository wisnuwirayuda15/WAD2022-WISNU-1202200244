@extends('layouts.main')

@section('content')
    <div class="container justify-content-center" style="margin-top: 5rem">
        <h1 style="font-size: 40px; font-weight: bold">Tambah Mobil</h1>
        <p>Tambah mobil baru anda ke list showroom anda!</p>
        <br>
        <form action="/showroom" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Mobil</label>
                <input value="{{ old('name') }}" type="text" class="form-control" name="name" id="name" required>
            </div>
            <div class="mb-3">
                <label for="owner" class="form-label">Nama Pemilik</label>
                <input value="{{ old('owner', auth()->user()->name) }}" type="text" class="form-control" name="owner" id="owner" required>
            </div>
            <div class="mb-3">
                <label for="brand" class="form-label">Merk</label>
                <input value="{{ old('brand') }}" type="text" class="form-control" name="brand" id="brand" required>
            </div>
            <div class="mb-3">
                <label for="purchase_date" class="form-label">Tanggal Beli</label>
                <input value="{{ old('purchase_date') }}" type="date" class="form-control" id="purchase_date" name="purchase_date" value="" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea value="{{ old('description') }}" class="form-control" name="description" id="description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Pilih file</label>
                <input value="{{ old('image') }}" type="file" class="form-control" name="image" id="image" accept="image/*" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Status Pembayaran</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="lunas" value="Lunas"
                        checked>
                    <label class="form-check-label" for="lunas">Lunas</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="belum_lunas"
                        value="Belum-Lunas">
                    <label class="form-check-label" for="belum_lunas">Belum Lunas</label>
                </div>
            </div>
            <button class="btn btn-primary mb-5" type="submit" name="submit">Selesai</button>
        </form>
    </div>
@endsection
