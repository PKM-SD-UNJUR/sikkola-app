@extends('dashboard.main')

@section('top-title')
<h3 class="fw-bold text-secondary text-uppercase">kelola mata pelajaran</h3>
@endsection


@section('content')
<div class="container">
<div>
    <a class="fw-bold tx-info bar-item" href="/dashboard/kelas">Mata Pelajaran</a> / <span class="text-secondary">Buat Mata Pelajaran</span>
</div>
<br>
<div class="py-3 mt-1 bg-white">
<h4>Buat Mata Pelajaran</h4>
<br>
<form action="/dashboard/mapel" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-md-10">
        <div>
            <label for="">Nama Mata pelajaran</label>
            <input name="nama" type="text" class="form-control" value="{{old('nama')}}">
            <input type="hidden" name="kelas_id" value="{{$kelas->id}}">
        </div>
       @error("nama")
        <div>
            <small class="text-danger">{{$message}}</small>
        </div>
       @enderror
        <br>
        <div>
            <label for="">Deskripsi</label>
            <textarea name="deskripsi" type="text" cols="40" class="form-control" >{{old('deskripsi')}}</textarea>
        </div>
        @error("deskripsi")
        <div>
            <small class="text-danger">{{$message}}</small>
        </div>
       @enderror
        <br>
        <div>
            <label for="">Gambar</label>
            <input name="gambar" type="file" class="form-control">
        </div>
        @error("gambar")
        <div>
            <small class="text-danger">{{$message}}</small>
        </div>
       @enderror
        <div class="mt-3 d-flex justify-content-end">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </div>
</form>    
</div>
</div>
@endsection