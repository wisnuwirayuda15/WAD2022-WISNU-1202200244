@extends('layouts.main')

@section('content')
    <style>
        .navbar {
            display: none;
        }
    </style>
    <div class="d-flex" style="height: 100vh">
        <!-- register-left  -->
        <div class="w-50 h-100">
            <img src="/img/car-cover.jpg" class="img-fluid h-100" alt="Car Cover" style="display: block; object-fit: cover">
        </div>
        <!-- register-right  -->
        <div class="container w-50 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-8">
                    <h1 style="font-size: 40px; font-weight: bold">Register</h1>
                    <br>
                    <form action="/register" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email<span class='text-danger'>*</span></label>
                            <input value="{{ old('email') }}" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                                required autofocus>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name<span class='text-danger'>*</span></label>
                            <input value="{{ old('name') }}" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                                required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="invalid-feedback">
                            {{ $errors }}
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">Phone Number<span class='text-danger'>*</span></label>
                            <div class="input-group"> <span class="input-group-text" id="basic-addon1">+62</span>
                                <input value="{{ old('no_hp') }}" type="text"
                                    class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp"
                                    required>
                                @error('no_hp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password<span class='text-danger'>*</span></label>
                            <input value="{{ old('password') }}" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" id="password"
                                required>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('conf_pass')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="conf_pass" class="form-label">Confirm Password<span
                                    class='text-danger'>*</span></label>
                            <input type="password" class="form-control @error('conf_pass') is-invalid @enderror"
                                name="conf_pass" id="conf_pass" required>
                        </div>
                        <button class="mb-3 btn btn-primary" type="submit" name="register"><i class="bi bi-journal-text"></i> Register</button>
                        <p>Anda sudah punya akun? <a href="/login">Login</a></p>
                        <p>Kembali ke <a href="/">Beranda</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
