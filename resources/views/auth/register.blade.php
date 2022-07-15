@extends('layouts.app2')

@section('content')
<br><br><br>
<div class="mapelcaption container" style="width: max-content; padding: 10px; margin-top: 5px; border-radius: 5px; background-image: url('../gambar/chalkboard.jpg');">
    <h2 class="text-center">DAFTAR <img src="{{asset('gambar/logo2.png')}}" width="50" alt=""> SIKKOLA</h2><br>
    <div class="container">
        <form method="POST" action="{{ route('register') }}" class="mr-2">
            @csrf
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-start">{{ __('Nama') }}</label>

                <div class="col-md-8">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-start">{{ __('Email') }}</label>

                <div class="col-md-8">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="kelas" class="col-md-4 col-form-label text-md-start">{{ __('Kelas') }}</label>

                <div class="col-md-8">

                    <?php $kelas = DB::table('kelas')->get() ?>

                    <select class="form-control @error('kelas') is-invalid @enderror" name="kelas" id="kelas" value="{{ old('kelas') }}">
                        <option value="">pilih kelas</option>
                        @foreach($kelas as $kls)
                        <option value="{{$kls->id}}">{{$kls->nama}}</option>
                        @endforeach
                    </select>

                    @error('kelas')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-start">{{ __('Password') }}</label>

                <div class="col-md-8">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-start">{{ __('Konfirmasi Password') }}</label>

                <div class="col-md-8">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>


            <div class="text-center">
                <center><button type="submit" class="btn btn tombol fw-bold">Daftar</button></center>
                <hr>
                <small class="text-center">Anda telah mempunyai akun?</small>
                <br>
                <a href="/login" class="text-center text-light">Masuk di sini !</a>
            </div>
        </form>
    </div>
</div>
@endsection