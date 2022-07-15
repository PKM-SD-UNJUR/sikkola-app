@extends('template.main')

@section('container')
<div class="container card-kelas text-center p-2 px-5" style="" >
    <h4>Tambah Materi</h4>
    <small>{{$mapel->kelas->nama}} : {{$mapel->nama}}</small>
<div class="container">
<a class="btn btn-sm mt-3 btnkelas bg-transparent text-light" href="/kelas/latihan/{{$mapel->id}}/{{\Carbon\Carbon::now()->format('m')}}"><i class="fas fa-angle-left"></i> Kembali</a>
</div>
</div>

<div class="container formtambah mt-3 col-10 p-3 bg-light" style="max-width: 800px;">
  <form action="/kelas/materi/{{$mapel->id}}" enctype="multipart/form-data" method="post" class="form-group">
      @csrf
      <div>
        <input type="hidden" name="mapel_id" value="{{$mapel->id}}">
        <input type="hidden" name="kelas_id" value="{{$mapel->kelas->id}}">
      </div>
      <div class="row">
          <div class="col-md-6 mt-2">
              <label for="tanggal" class="mb-1 fw-bold container">Tanggal Pelaksanaan @error('tanggal')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i> {{$message}}</span>@enderror</label>
              <input id="tanggal" value="{{old('tanggal')}}" name="tanggal" class="form-control form-sm @error('tanggal')is-invalid @enderror" type="date">
          </div>
          <div class="col-md-6 mt-2">
              <label for="topik" class="mb-1 fw-bold container">Topik @error('topik')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i>  {{$message}}</span>@enderror</label>
              <input id="topik" value="{{old('topik')}}" name="topik" class="form-control form-sm @error('topik') is-invalid @enderror" type="text" placeholder="Masukkan topik materi disini...">
          </div>
          <div class="col-md-6 mt-2">
              <label for="judul" class="mb-1 fw-bold container">Judul @error('Judul')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i>  {{$message}}</span>@enderror</label>
              <input id="judul" value="{{old('judul')}}" name="judul" class="form-control form-sm @error('Judul')is-invalid @enderror" type="text" placeholder="Masukkan judul materi disini...">
          </div>
          <div class="col-md-6 mt-2">
            <label for="link" class="mb-1 fw-bold container">Link Video</label>
            <input id="link" value="{{old('video')}}" name="video" class="form-control form-sm" type="text" placeholder="Masukkan link video disini...">
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
              <label for="file" class="mb-1 fw-bold container">File Materi</label>
              <input id="file" name="file" value="{{old('file')}}" class="form-control form-sm" type="file" placeholder="Masukkan  disini...">
          </div>
          <div class="col-md-12 mt-3 mb-2">
              <label for="editor" class="mb-1 fw-bold container">Deskripsi</label>
              <textarea class="form-control ck-editor" name="deskripsi" id="editor" cols="20" rows="30">{{ old('username')}} </textarea>
          </div>
          <div class="col-md-6 mt-3 ">
              <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i> Tambah</button>
              <a type="reset" class="btn btn-secondary" href="back()"><i class="fas fa-angle-double-left"></i> Batal</a>
          </div>
        </div>
  </form>
</div>
<br><br>
@endsection