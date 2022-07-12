@extends('layouts.app2')

@section('content')
<br><br><br><br>
<div class="mapelcaption container" style="width: max-content; padding: 20px; margin-top: 20px; border-radius: 5px; background-image: url('../gambar/chalkboard.jpg');">
    <h3 class="text-center">MASUK <img src="{{asset('gambar/logo2.png')}}" width="50" alt=""> SIKKOLA</h3><br>
    <div class="container">
        <form method="POST" action="{{route('login')}}" class="mr-2">
            @csrf
            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-start">{{ __('Email') }}</label>

                <div class="col-md-8">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback fs-6"  role="alert">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-start">{{ __('Password') }}</label>

                <div class="col-md-8">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="text-center">
                <br>
                <center><button class="btn btn tombol fw-bold">Masuk</button></center>
                <hr>
                <small class="text-center">Anda belum mempunyai akun?</small>
                <br>
                <a href="/register" class="text-center text-light">Daftar di sini !</a>
            </div>
        </form>
    </div>
</div>
@endsection