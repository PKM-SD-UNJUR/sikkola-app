@extends('dashboard.main')

@section('top-title')
<h3 class="fw-bold text-secondary text-uppercase">kelola kelas</h3>
@endsection


@section('content')

<div class="container">
<div>
    <a class="fw-bold tx-info bar-item" href="/dashboard">Kelas</a> / <span class="text-secondary">Buat kelas</span>
</div>
{{-- @if (session()->has('success'))
<br>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check-circle"></i> {{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif --}}

<div class="mt-5">
    <div><a class="btn btn-primary fw-bold text-uppercase" href="/dashboard/kelas/create"> + buat kelas </a></div>
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
    @foreach ($kelas as $k)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td><a class="bar-item fw-bold" href="/dashboard/kelas/{{$k->id}}">{{$k->nama}}</a></td>
        <td>{{$k->deskripsi}}</td>
        <td>
            <div class="img-display">
                <a href="{{asset("/storage/$k->gambar")}}"><img src="{{asset("/storage/$k->gambar")}}" alt=""></a>
            </div>
        </td>
        <td>
            <div class="d-flex">
                <a class="btn-outline-success btn btn-sm" href=""><i class="fas fa-eye"></i></a>&nbsp;
                <a class="btn-outline-warning btn btn-sm" href="/dashboard/kelas/{{$k->id}}/edit"><i class="fas fa-edit"></i></a>&nbsp;
                <form action="/dashboard/kelas/{{$k->id}}" method="post">
                    @method('delete')
                    @csrf
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