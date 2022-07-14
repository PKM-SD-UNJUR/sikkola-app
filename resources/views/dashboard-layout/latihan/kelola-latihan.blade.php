@extends('dashboard.main')


@section('top-title')
<h3 class="fw-bold text-secondary text-uppercase">kelola latihan</h3>
@endsection



@section('content')
<div class="container">
    <div>
        <a class="fw-bold tx-info bar-item" href="/dashboard">Mapel</a> / <span class="text-secondary">Daftar Latihan</span>
    </div>
    @if (session()->has('success'))
    <br>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle"></i> {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <br>
    <div class="py-3 bg-white">

        <div class="container row">

            @foreach($kelas as $k)
            <span data-bs-toggle="collapse" href="#collapse{{$k->id}}" style="text-decoration: none;">
                <div class="mapel-bar row mb-3">
                    <div class="col-md-2">
                        <h4 class="mt-2">{{$k->nama}}</h4>
                    </div>
                    <div class="col-md-2">
                        <img src="../kelas/{{$k->gambar}}" alt="" width="70">
                    </div>
                    <div class=" col-md-2">
                        <small>Jumlah mata pelajaran : </small>
                    </div>
                    <div class=" col-md-2">

                        <h5 class="container">{{$k->mapel->count()}}</h5>
                    </div>

                    <div class="col-md-4">
                        <div class="mt-2">
                            <a href="#" class="btn btn btn-info text-uppercase fw-bold text-sm"><small><i class="fas fa-eye"></i> Lihat Mata Pelajaran {{$k->nama}}</small></a>
                        </div>
                    </div>
                </div>
            </span>


            <div class="collapse mt-2 mb-3" id="collapse{{$k->id}}">

                    <div class="row mx-5">
                        @if($k->mapel->count()!=0)
                        @foreach($mapel->where('kelas_id',$k->id) as $m)
                        <div class="mapel-bar2 row mb-3 py-2">
                        <div class="col-md-2">
                        <h6 class="mt-2">{{$m->nama}}</h6>
                    </div>
                    <div class="col-md-2">
                        <img src="../mapel/{{$m->gambar}}" alt="" width="50">
                    </div>
                            
                            <div class="col-md-2">
                                <div>
                                    <small>Jumlah latihan : </small>
                                </div>
                            </div>
                            <div class=" col-md-2">

                                <h5 class="container">{{$m->latihan->count()}}</h5>
                            </div>

                            <div class="col-md-4">
                                    <a href="{{route('kelola.index',['id'=>$m->id])}}" class="btn btn btn-warning text-uppercase fw-bold text-sm"><small><i class="fas fa-cog"></i> kelola latihan {{$m->nama}}</small></a>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <p class="fw-bold fs-4 text-center">Mata Pelajaran {{$k->nama}} Tidak Tersedia</p>
                        @endif
                    </div>
            </div>

            @endforeach


        </div>

    </div>
</div>
@endsection