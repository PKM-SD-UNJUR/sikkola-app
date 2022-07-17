@extends('dashboard.main')

@section('top-title')
<h3 class="fw-bold text-secondary text-uppercase">kelola mata pelajaran</h3>
@endsection


@section('content')
<div class="container">
    <div>
        <a class="fw-bold tx-info bar-item" href="/dashboard/mapel">Mata Pelajaran</a> / <span class="text-secondary">Ubah Mata Pelajaran</span>
    </div>
    <br>
    <div class="py-3 mt-1 bg-white">
        <h4 class="fw-bold text-secondary text-uppercase">Ubah Mata Pelajaran {{$mapel->nama}}</h4>
        <br>
        <form action="/dashboard/mapel/{{$mapel->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="col-md-10">
                <div>
                    <label for="">Nama mapel</label>
                    <input name="nama" type="text" class="form-control" value="{{old('nama',$mapel->nama)}}">
                    <input type="hidden" name="kelas_id" value="{{$mapel->kelas->id}}">
                </div>
                @error("nama")
                <div>
                    <small class="text-danger">{{$message}}</small>
                </div>
                @enderror
                <br>
                <div>
                    <label for="">Deskripsi</label>
                    <textarea name="deskripsi" type="text" cols="30" rows="10" class="form-control">{{old("deskripsi",$mapel->deskripsi)}}</textarea>
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
                        <img src="/mapel/{{$mapel->gambar}}" alt="">
                    </div>
                    <input name="gambar" type="file" class="form-control" value="{{$mapel->gambar}}">
                    <input type="hidden" name="oldImage" value={{$mapel->gambar}}>
                </div>
                @error("gambar")
                <div>
                    <small class="text-danger">{{$message}}</small>
                </div>
                @enderror
                <br>
                <div class="d-flex mt-3 mb-3 justify-content-between">
                    <a style="width: 40%" href="{{ url()->previous() }}" class="btn btn-secondary">Batal</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button style="width: 40%" type="submit" class="btn btn-success ">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection