@extends('layouts.main')

@section('content')
    <style>
        .navbar {
            display: none;
        }
    </style>
    <div class="d-flex" style="height: 100vh">
        <!-- login-left  -->
        <div class="w-50 h-100">
            <img src="/img/car-cover.jpg" class="img-fluid h-100" alt="Car Cover" style="display: block; object-fit: cover">
        </div>
        <!-- login-right  -->
        <div class="container w-50 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-8">
                    <h1 style="font-size: 40px; font-weight: bold">Login</h1>
                    <br>
                    <form action="/login" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label @error('email') is-invalid @enderror">Email<span
                                    class='text-danger'>*</span></label>
                            <input value="{{ old('email') }}" type="email" class="form-control" name="email"
                                id="email" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password<span class='text-danger'>*</span></label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <button class="mb-3 btn btn-primary" type="submit" name="login"><i class="bi bi-box-arrow-in-right"></i> Login</button>
                        <p>Anda belum punya akun? <a href="/register">Daftar</a></p>
                        <p>Kembali ke <a href="/">Beranda</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
