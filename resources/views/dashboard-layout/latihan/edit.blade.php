@extends('dashboard.main')


@section('top-title')
<h3 class="fw-bold text-secondary text-uppercase">kelola latihan</h3>
@endsection


@section('content')
<div class="container">
    @foreach($mapel->take(1) as $mp)
    <div>
        <a class="fw-bold tx-info bar-item" href="/dashboard/kelas">Kelas</a> / <span class="text-secondary">Ubah Latihan {{$mp->nama }} {{$mp->kelas->nama}}</span>
    </div>
    <br>
    <div class="py-3 mt-1 bg-white">
        <h4 class="fw-bold text-secondary text-uppercase">Ubah Latihan {{$mp->nama }} {{$mp->kelas->nama}}</h4>
        <br>
        <form action="{{ route('kelolaLatihan.update',[$latihan->id,'id'=>$mp->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-10">
                <div>
                    <label for="">Judul</label>
                    <input name="judul" type="text" class="form-control" value="{{$latihan->judul}}">
                </div>
                @error("judul")
                <div>
                    <small class="text-danger">{{$message}}</small>
                </div>
                @enderror
                <br>
                <div>
                    <label for="">Waktu Mulai</label>
                    <input name="waktumulai" type="datetime-local" class="form-control" value="{{$latihan->waktumulai}}">
                </div>
                @error("waktumulai")
                <div>
                    <small class="text-danger">{{$message}}</small>
                </div>
                @enderror
                <br>
                <div>
                    <label for="">Waktu Selesai</label>
                    <input name="waktuselesai" type="datetime-local" class="form-control" value="{{$latihan->waktuselesai}}">
                </div>
                @error("waktuselesai")
                <div>
                    <small class="text-danger">{{$message}}</small>
                </div>
                @enderror
                <br>
                <div>
                    <label for="">Link Latihan Soal</label>
                    <input name="link" type="text" class="form-control" value="{{$latihan->link}}">
                </div>
                @error("link")
                <div>
                    <small class="text-danger">{{$message}}</small>
                </div>
                @enderror
                <br>
                <div>
                    <label for="">Keterangan</label>
                    <textarea name="keterangan" type="text" cols="30" rows="10" class="form-control">{{$latihan->keterangan}}</textarea>
                </div>
                @error("keterangan")
                <div>
                    <small class="text-danger">{{$message}}</small>
                </div>
                @enderror
                <br>

                <input type="hidden" name="kelas_id" value="{{$mp->kelas_id}}">

                @error("kelas_id")
                <div>
                    <small class="text-danger">{{$message}}</small>
                </div>
                @enderror

                <input type="hidden" name="mapel_id" value="{{$mp->id}}">

                @error("mapel_id")
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
    @endforeach
</div>
@endsection