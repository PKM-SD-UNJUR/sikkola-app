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
  <form action="/kelas/materi/forum/mapel/{{$mapel->id}}/quiz" enctype="multipart/form-data" method="post" class="form-group">
      @csrf
      <div>
        <input type="hidden" name="mapel_id" value="{{$mapel->id}}">
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
      </div>
      <div class="row">
        <div class="col-md-6 mt-2">
          <label for="nama" class="mb-1 fw-bold container">Judul @error('nama')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i>  {{$message}}</span>@enderror</label>
          <input id="nama" value="{{old('nama')}}" name="nama" class="form-control form-sm @error('nama') is-invalid @enderror" type="text" placeholder="Masukkan nama judul quiz disini...">
        </div>
          <div class="col-md-6 mt-2">
              <label for="deadline" class="mb-1 fw-bold container">Deadline @error('deadline')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i> {{$message}}</span>@enderror</label>
              <input id="deadline" value="{{old('deadline')}}" name="deadline" class="form-control form-sm @error('deadline')is-invalid @enderror" type="datetime-local">
          </div>
          <div class="col-md-12 mt-3 mb-2">
              <label for="editor" class="mb-1 fw-bold container">Keterangan</label>
              <textarea class="form-control ck-editor" name="keterangan" id="editor" cols="20" rows="30">{{ old('keterangan')}} </textarea>
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