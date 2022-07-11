@extends('template.main')

@section('container')
<div class="container">
    <div class="row container">

        <h2 class="mb-3 mt-4 fw-bold mx-4 mb-5 mt-5">PROFIL PENGGUNA</h2>

        <form action="/profil/{{ Auth::user()->id }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="container float-left">
                <div class="form-group mt-3">
                    <div class="d-flex justify-content-center">
                        <label class="mx-4 w-10">Nama </label>
                        <input type="text" name="nama" class="form-control mx-4" value="{{ Auth::user()->name }}" autofocus autocomplete="off">
                    </div>
                    @error('nama')
                    <div class="alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>


                <div class="form-group mt-3">
                    <div class="d-flex justify-content-center">
                        <label class="mx-4 w-10">Email</label>
                        <input type="text" name="email" class="form-control mx-4" value="{{ Auth::user()->email }}" autofocus autocomplete="off">
                    </div>
                    @error('email')
                    <div class="alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>


                <div class="form-group mt-3">
                    <div class="d-flex justify-content-center">
                        <label class="mx-4 w-10">Kelas&nbsp;&nbsp;</label>
                        <select class="form-control custom-select mx-4" name="kelas" id="kelas">
                            <option value="{{ Auth::user()->kelas_id }}">{{ Auth::user()->kelas->nama }} (Ganti Kelas)</option>

                            @foreach($kelas as $kls)
                            <option value="{{$kls->id}}">{{$kls->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('kelas')
                    <div class="alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>


                <div class="flex justify-content-center mt-5 ml-3">
                    <button type="submit" class="btn btn-success mr-5">Simpan Perubahan</button>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#password" class="btn btn-info ml-3">Ubah Password</a>
                </div>

            </div>

        </form>

        @include('layouts.modalPassword')

    </div><br>

</div><br>
</div>
</div>
</div>
<br><br><br><br>
@endsection