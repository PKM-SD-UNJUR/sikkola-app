@extends('dashboard.main')

@section('top-title')
<h3 class="fw-bold text-secondary text-uppercase">kelola mata pelajaran</h3>
@endsection


@section('content')
<div class="container">
    <div>
        <a class="fw-bold tx-info bar-item" href="/dashboard">Mapel</a> / <span class="text-secondary">{{$kelas->nama}}</span>
    </div>
    @if (session()->has('success'))
    <br>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle"></i> {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    
    <div class="mt-5">
        <div><a class="btn btn-primary fw-bold text-uppercase" href="/dashboard/mapel/{{$kelas->id}}/create"> + buat mata pelajaran </a></div>
    </div>
    <br>
    <div class="py-3 bg-white">
    <table class="table">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        @foreach ($mapel as $m)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td><a class="bar-item fw-bold" href="/dashboard/kelas/{{$m->id}}">{{$m->nama}}</a></td>
            <td>{{$m->deskripsi}}</td>
            <td>
                <div class="img-display">
                    <a href="#"><img src="mapel/{{$m->gambar}}" alt=""></a>
                </div>
            </td>
            <td>
                <div class="d-flex">
                    <a class="btn-outline-success btn btn-sm" href=""><i class="fas fa-eye"></i></a>&nbsp;
                    <a class="btn-outline-warning btn btn-sm" href="/dashboard/mapel/{{$m->id}}/edit"><i class="fas fa-edit"></i></a>&nbsp;
                    <form action="/dashboard/mapel/{{$m->id}}" method="post">
                        @method('delete')
                        @csrf
                        <input type="hidden" name="kelas_id" value="{{$m->kelas->id}}">
                        <button class="btn-outline-danger btn btn-sm" onclick="return confirm('Apakah kamu yakin ingin menghapus kelas ini?');"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    
                </div>
            </td>
        </tr>
        @endforeach
    </table>    
    </div>
    </div>
@endsection










