@extends('dashboard-layout.pengguna.template')
@section('list-group')
@foreach ($users->take(1) as $user)
@if($user->role == 'guru')
<h2 class="text-center text-light fw-bold text-uppercase"><i class="fas fa-users"></i> TAMBAH PENGGUNA GURU</h2>
@else
<h2 class="text-center text-light fw-bold text-uppercase"><i class="fas fa-users"></i> TAMBAH PENGGUNA {{$user->kelas->nama}}</h2>
@endif
<br>
@endforeach
<div class="row container mt-3">
    <div class="col-md-12 container">

        <form enctype="multipart/form-data" action="{{ route('kelola.store',['role'=>$user->role,'kelasID'=>$user->kelas_id]) }}" method="post">
            @csrf
            <div class="form-group ">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25  text-light">Nama</label>
                    <input type="text" name="nama" class="form-control mx-4" value="{{ old('nama') }}" autofocus autocomplete="off">
                </div>
            </div>
            @error('nama')
            <div class="mx-4 alert alert-danger mt-3 alert-dismissible fade show" role="alert">{{$message}} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
            @enderror

            <div class="form-group mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25  text-light">Jenis Kelamin</label>
                    <select class="form-control custom-select mx-4" name="jenisKelamin" id="jenisKelamin">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki" <?php if (old('jenisKelamin') == 'Laki-Laki') { ?>selected="selected" <?php } ?>>Laki-Laki</option>
                        <option value="Perempuan" <?php if (old('jenisKelamin') == 'Perempuan') { ?>selected="selected" <?php } ?>> Perempuan</option>
                    </select>
                </div>
            </div>
            @error('jenisKelamin')
            <div class="mx-4 alert alert-danger mt-3 alert-dismissible fade show" role="alert">{{$message}} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
            @enderror

            <div class="form-group mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25  text-light">Email</label>
                    <input type="text" name="email" class="form-control mx-4" value="{{ old('email') }}" autofocus autocomplete="off">
                </div>
            </div>
            @error('email')
            <div class="mx-4 alert alert-danger mt-3 alert-dismissible fade show" role="alert">{{$message}} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
            @enderror


            <div class="form-group mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25  text-light">Password</label>
                    <input type="password" name="password" class="form-control mx-4" autofocus autocomplete="off" autocomplete="new-password">
                </div>
            </div>
            @error('password')
            <div class="mx-4 alert alert-danger mt-3 alert-dismissible fade show" role="alert">{{$message}} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
            @enderror

            <div class="form-group mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25  text-light">Konfirmasi Password</label>
                    <input id="password-confirm" type="password" class="form-control mx-4" name="password_confirmation" autocomplete="new-password">
                </div>
            </div>


            <br>
            <div class="d-flex mt-3 mb-3 justify-content-between">
                <a style="width: 40%" href="{{ url()->previous() }}" class="btn btn-secondary">Batal</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button style="width: 40%" type="submit" class="btn btn-success ">Kirim</button>
            </div>

        </form>

    </div>


</div>

@endsection