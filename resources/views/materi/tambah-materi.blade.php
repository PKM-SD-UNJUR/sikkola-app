@extends('template.main')

@section('container')
<div class="container card-kelas text-center p-2 px-5" style="" >
    <h4>Tambah Materi</h4>
    <small>Kelas 1 : Agama</small>
<div class="container">
<a class="btn btn-sm mt-3 btnkelas bg-transparent text-light" href="/kelas1/agama">Kembali</a>
</div>
</div>

<div class="container formtambah mt-3 col-10 p-3 bg-light" style="max-width: 800px;">
  <form action="/kelas/materi/{{$mapel->id}}" enctype="multipart/form-data" method="post" class="form-group">
      @csrf
      <div class="row">
          <div class="col-md-6 mt-2">
              <label for="tanggal" class="mb-1 fw-bold container">Tanggal @error('tanggal')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i> {{$message}}</span>@enderror</label>
              <input id="tanggal" value="{{old('tanggal')}}" name="tanggal" class="form-control form-sm @error('tanggal')is-invalid @enderror" type="date">
          </div>
          <div class="col-md-6 mt-2">
              <label for="topik" class="mb-1 fw-bold container">Topik @error('Topik')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i>  {{$message}}</span>@enderror</label>
              <input id="topik" value="{{old('Topik')}}" name="Topik" class="form-control form-sm @error('Topik') is-invalid @enderror" type="text" placeholder="Masukkan topik materi disini...">
          </div>
          <div class="col-md-6 mt-2">
              <label for="judul" class="mb-1 fw-bold container">Judul @error('Judul')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i>  {{$message}}</span>@enderror</label>
              <input id="judul" value="{{old('Judul')}}" name="Judul" class="form-control form-sm @error('Judul')is-invalid @enderror" type="text" placeholder="Masukkan judul materi disini...">
          </div>
          <div class="col-md-6 mt-2">
            <label for="link" class="mb-1 fw-bold container">Link Video</label>
            <input id="link" value="{{old('vidio')}}" name="vidio" class="form-control form-sm" type="text" placeholder="Masukkan link video disini...">
          </div>
          <div class="col-md-6 mt-2">
              <label for="waktuselesai" class="mb-1 fw-bold container">Waktu Selesai @error('waktuselesai')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i>  {{$message}}</span>@enderror</label>
              <input id="waktuselesai" value="{{old('waktuselesai')}}" name="waktuselesai" class="form-control form-sm @error('waktuselesai')is-invalid @enderror" type="time">
          </div>
          <div class="col-md-6 mt-2">
            <label for="waktumulai" class="mb-1 fw-bold container">Waktu Mulai  @error('waktumulai')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i>  {{$message}}</span>@enderror</label>
            <input id="waktumulai" value="{{old('waktumulai')}}" name="waktumulai" class="form-control form-sm @error('waktumulai')is-invalid @enderror" type="time">
          </div>
          <div class="col-md-6 mt-2">
              <label for="file" class="mb-1 fw-bold container">File</label>
              <input id="file" name="file" value="{{old('file')}}" class="form-control form-sm" type="file" placeholder="Masukkan  disini...">
          </div>
          <div class="col-md-12 mt-3 mb-2">
              <label for="editor" class="mb-1 fw-bold container">Deskripsi</label>
              <textarea class="form-control ck-editor" name="deskripsi" id="editor" cols="20" rows="30">{{ old('username')}} </textarea>
          </div>
          <div class="col-md-6 mt-3 ">
              <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i> Tambah</button>
              <button type="reset" class="btn btn-secondary"><i class="fas fa-trash"></i> Hapus</button>
          </div>
        </div>
  </form>
</div>
<br><br>
@endsection