@extends('dashboard.main')

@section('top-title')
<h3 class="fw-bold text-secondary text-uppercase">kelola mata pelajaran</h3>
@endsection


@section('content')
<div class="container">
    <div>
        <a class="fw-bold tx-info bar-item" href="/dashboard">Mata Pelajaran</a> / <span class="text-secondary">Daftar Mata pelajaran</span>
    </div>
    @if (session()->has('success'))
    <br>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle"></i> {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="mt-5">
        <div><a class="btn btn-primary fw-bold text-uppercase" href="/dashboard/kelas/create"> + buat mata pelajaran </a></div>
    </div>
    <br>
    <div class="py-3 bg-white">

        <div class="container row">

            @foreach($kelas as $k)
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
                        <a href="/dashboard/mapel/kelas/{{$k->id}}" class="btn btn btn-warning text-uppercase fw-bold text-sm"><small><i class="fas fa-cog"></i> kelola mata pelajaran</small></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>
@endsection