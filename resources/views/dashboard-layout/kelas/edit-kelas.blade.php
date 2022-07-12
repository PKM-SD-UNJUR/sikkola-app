@extends('dashboard.main')

@section('top-title')
<h3 class="fw-bold text-secondary text-uppercase">kelola kelas</h3>
@endsection


@section('content')
<div class="container">
<div>
 <a class="fw-bold tx-info bar-item" href="/dashboard/kelas">Kelas</a> / <span class="text-secondary">Buat kelas</span>
</div>
<br>
<div class="py-3 mt-1 bg-white">
<h4>Ubah Kelas</h4>
<br>
<form action="/dashboard/kelas/{{$kelas->id}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="col-md-10">
        <div>
            <label for="">Nama Kelas</label>
            <input name="nama" type="text" class="form-control" value="{{old('nama',$kelas->nama)}}">
        </div>
       @error("nama")
        <div>
            <small class="text-danger">{{$message}}</small>
        </div>
       @enderror
        <br>
        <div>
            <label for="">Deskripsi</label>
            <textarea name="deskripsi" type="text" cols="40" class="form-control" >{{old("deskripsi",$kelas->deskripsi)}}</textarea>
        </div>
        @error("deskripsi")
        <div>
            <small class="text-danger">{{$message}}</small>
        </div>
       @enderror
        <br>
        <div>
            <label for="">Gambar</label>
            <div class="img-display py-2">
                <img src="{{asset("storage/$kelas->gambar")}}" alt="">
            </div>
            <input name="gambar" type="file" class="form-control" value="{{$kelas->gambar}}">
            <input type="hidden" name="oldImage" value={{$kelas->gambar}}>
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