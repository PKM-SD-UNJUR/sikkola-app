@extends('template.main')

@section('container')
<div class="container card-kelas text-center p-2 px-5" style="">
    <h4>Ubah Latihan</h4>
    <small>{{$mapel->kelas->nama}} : {{$mapel->nama}}</small>
    <div class="container">
        <a class="btn btn-sm mt-3 btnkelas bg-transparent text-light" href="/kelas/latihan/{{$mapel->id}}/{{\Carbon\Carbon::now()->format('m')}}"><i class="fas fa-angle-left"></i> Kembali</a>
    </div>
</div>

<div class="container formtambah mt-3 col-10 p-3 bg-light" style="max-width: 800px;">
    <form action="/kelas/latihan/{{$mapel->id}}/{{$latihan->id}}/update" enctype="multipart/form-data" method="post" class="form-group">
        @csrf
        <div>
            <input type="hidden" name="mapel_id" value="{{$latihan->mapel_id}}">
            <input type="hidden" name="kelas_id" value="{{$latihan->kelas_id}}">
        </div>
        <div class="row">
            <div class="col-md-6 mt-2">
                <label for="judul" class="mb-1 fw-bold container">Judul @error('judul')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i> {{$message}}</span>@enderror</label>
                <input id="judul" value="{{old('judul', $latihan->judul)}}" name="judul" class="form-control form-sm @error('judul')is-invalid @enderror" type="text" placeholder="Masukkan judul latihan disini...">
            </div>
            <div class="col-md-6 mt-2">
                <label for="link" class="mb-1 fw-bold container">Link Latihan @error('link') <span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i> {{$message}}</span>@enderror</label>
                <input id="link" value="{{old('link',$latihan->link)}}" name="link" class="form-control form-sm @error('link',$latihan->link)is-invalid @enderror" type="text" placeholder="Masukkan link latihan disini...">
            </div>
            <div class="col-md-6 mt-2">
                <label for="waktumulai" class="mb-1 fw-bold container">Waktu Mulai @error('waktumulai')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i> {{$message}}</span>@enderror</label>
                <input id="waktumulai" value="{{old('waktumulai',$latihan->waktumulai)}}" name="waktumulai" class="form-control form-sm @error('waktumulai')is-invalid @enderror" type="datetime-local">
            </div>
            <div class="col-md-6 mt-2">
                <label for="waktuselesai" class="mb-1 fw-bold container">Waktu Selesai @error('waktuselesai')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i> {{$message}}</span>@enderror</label>
                <input id="waktuselesai" value="{{old('waktuselesai',$latihan->waktuselesai)}}" name="waktuselesai" class="form-control form-sm @error('waktuselesai')is-invalid @enderror" type="datetime-local">
            </div>
            <div class="col-md-12 mt-3 mb-2">
                <label for="editor" class="mb-1 fw-bold container">Keterangan @error('keterangan')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i> {{$message}}</span>@enderror</label>
                <textarea class="form-control ck-editor @error('keterangan')is-invalid @enderror" name="keterangan" id="editor" cols="20" rows="30">{{ old('keterangan',$latihan->keterangan)}} </textarea>
            </div>
            <div class="col-md-6 mt-3 ">
                <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i> Simpan</button>
                <a type="reset" class="btn btn-secondary" href="{{ url()->previous() }}"><i class="fas fa-angle-double-left"></i> Batal</a>
            </div>
        </div>
    </form>
</div>
<br><br>
@endsection