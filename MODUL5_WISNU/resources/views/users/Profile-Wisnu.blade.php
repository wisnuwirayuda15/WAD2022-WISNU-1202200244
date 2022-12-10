@extends('layouts.main')

@section('content')
    <style>
        label {
            flex-basis: 30%;
        }
    </style>
    <div class="container justify-content-center" style="margin-top: 5rem">
        <h1 class="text-center" style="font-size: 40px; font-weight: bold">Profile</h1>
        <br>
        <form action="/profile/{{ auth()->user()->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3 d-flex">
                <label class="form-label" style="flex-basis: 23%">Email</label>
                <p>{{ auth()->user()->email }}</p>
            </div>
            <div class="input-group mb-3 d-flex">
                <label style="flex-basis: 23%" for="name" class="form-label">Name<span class='text-danger'>*</span></label>
                <input value="{{ old('name', auth()->user()->name) }}" type="text" class="form-control rounded" name="name"
                    id="name" placeholder="Nama minimal 3 karakter." required>
                <span class="input-group-text rounded" id="basic-addon2">Minimal 3 karakter.</span>
            </div>
            <div class="mb-3 d-flex">
                <label for="no_hp" class="form-label">Phone Number<span class='text-danger'>*</span></label>
                <div class="input-group"> <span class="input-group-text" id="basic-addon1">+62</span>
                    <input value="{{ old('no_hp', auth()->user()->no_hp) }}" type="text" class="form-control"
                        name="no_hp" id="no_hp" placeholder="Nomor hp harus berupa angka." required>
                </div>
            </div>
            <hr class="mb-4 mt-4">
            <div class="mb-3 d-flex">
                <label for="password" class="form-label">New Password<span class='text-danger'>*</span></label>
                <input type="password" class="form-control" name="password" id="password"
                    placeholder="Password minimal 8 karakter.">
            </div>
            <div class="mb-3 d-flex">
                <label for="conf_pass" class="form-label">Confirm Password<span class='text-danger'>*</span></label>
                <input type="password" class="form-control" name="conf_pass" id="conf_pass">
            </div>
            <div class="mb-3 d-flex">
                <label for="navcol" class="form-label">Warna Navbar</label>
                <select class="form-select" name="navcol" id="navcol" aria-label="Default select example"
                    onchange="setNavcol();">
                    <option value="not changed">Pilih warna...</option>
                    <option value="navbar navbar-dark bg-primary bg-gradient navbar-expand-md fixed-top">Blue</option>
                    <option value="navbar navbar-dark bg-dark bg-gradient navbar-expand-md fixed-top">Dark</option>
                    <option value="navbar navbar-dark bg-danger bg-gradient navbar-expand-md fixed-top">Red</option>
                    <option value="navbar navbar-dark bg-success bg-gradient navbar-expand-md fixed-top">Green</option>
                    <option value="navbar bg-warning bg-gradient navbar-expand-md fixed-top">Yellow</option>
                </select>
            </div>
            <div class="container d-flex justify-content-center">
                <button class="btn btn-primary" type="submit" name="update"
                    onclick="return confirm('Simpan perubahan?')"><i class="bi bi-pencil-fill"></i> Update</button>
        </form>
        <form action="/profile/{{ auth()->user()->id }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="ms-4 btn btn-danger" name="delete"
                onclick="return confirm('Apakah anda yakin ingin menghapus akun {{ auth()->user()->name }}? Anda tidak dapat mengembalikan akun anda setelah anda memilih OK.')"><i
                    class="bi bi-person-x-fill"></i> Delete
                Account</button>
        </form>
    </div>
    </div>
    <footer class="fixed-bottom">
        <div class="container d-flex">
            <img class="img-fluid mt-3 mb-3" style="width: 10%; height: auto;" src="/img/logo-ead.png" alt="Logo EAD">
            <p class="mt-4 px-3">Wisnu_1202200244</p>
        </div>
    </footer>
@endsection

@if ($errors->any())
    @php
        redirect('/profile')
            ->with('toast', 'Update akun gagal, silahkan ikuti ketentuan yang berlaku.')
            ->with('color', 'text-danger');
    @endphp
@endif
