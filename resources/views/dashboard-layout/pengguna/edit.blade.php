@extends('dashboard-layout.pengguna.template')
@section('list-group')
@if($user->role == 'guru')
<h2 class="text-center text-light fw-bold text-uppercase"><i class="fas fa-users"></i> UBAH PENGGUNA GURU</h2>
@else
<h2 class="text-center text-light fw-bold text-uppercase"><i class="fas fa-users"></i> UBAH PENGGUNA {{$user->kelas->nama}}</h2>
@endif
<br>
<div class="row container mt-3">
    <div class="col-md-12 container">

        <div class="form-group mb-5">
            <div class="d-flex justify-content-start mx-3">
                <a href="#" data-bs-toggle="modal" data-bs-target="#password" class="btn btn-warning ml-5">Klik Untuk Ubah Password</a>
            </div>
        </div>

        <form enctype="multipart/form-data" action="{{ route('kelola.update',[$user->id,'role'=>$user->role,'kelasID'=>$user->kelas_id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group ">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25  text-light">Nama</label>
                    <input type="text" name="nama" class="form-control mx-4" value="{{ old('nama',$user->name) }}" autofocus autocomplete="off">
                </div>
            </div>
            @error('nama')
            <div class="mx-4 alert alert-danger mt-3 alert-dismissible fade show" role="alert">{{$message}} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
            @enderror

            <div class="form-group mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25  text-light">Jenis Kelamin</label>
                    <select class="form-control custom-select mx-4" name="jenisKelamin" id="jenisKelamin">
                        <option value="{{$user->jenisKelamin}}">{{$user->jenisKelamin}} (Ganti Jenis Kelamin)</option>
                        <option value="Laki-Laki" <?php if (old('jenisKelamin') == 'Laki-Laki') { ?>selected="selected" <?php } ?>>Laki-Laki</option>
                        <option value="Perempuan" <?php if (old('jenisKelamin', $user->jenisKelamin) == 'Perempuan') { ?>selected="selected" <?php } ?>> Perempuan</option>
                    </select>
                </div>
            </div>
            @error('jenisKelamin')
            <div class="mx-4 alert alert-danger mt-3 alert-dismissible fade show" role="alert">{{$message}} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
            @enderror

            <div class="form-group mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25  text-light">Email</label>
                    <input type="text" name="email" class="form-control mx-4" value="{{ old('email',$user->email) }}" autofocus autocomplete="off">
                </div>
            </div>
            @error('email')
            <div class="mx-4 alert alert-danger mt-3 alert-dismissible fade show" role="alert">{{$message}} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
            @enderror

            <div class="form-group mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25  text-light">Kelas</label>
                    <select class="form-control custom-select mx-4" name="kelas" id="kelas">
                        <option value="{{$user->kelas_id}}">{{$user->kelas->nama}} (Ganti Kelas)</option>
                        @foreach($kelas as $kls)
                        <option value="{{$kls->id}}">{{$kls->nama}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @error('kelas')
            <div class="mx-4 alert alert-danger mt-3 alert-dismissible fade show" role="alert">{{$message}} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
            @enderror





            <br>
            <div class="d-flex mt-3 mb-3 justify-content-between">
                <a style="width: 40%" href="{{ url()->previous() }}" class="btn btn-secondary">Batal</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button style="width: 40%" type="submit" class="btn btn-success ">Simpan</button>
            </div>

        </form>

    </div>


</div>

@include('layouts.modalPassword')

@endsection