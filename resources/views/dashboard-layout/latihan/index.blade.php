@extends('dashboard.main')

@section('top-title')
<h3 class="fw-bold text-secondary text-uppercase">kelola latihan</h3>
@endsection



@section('content')

@foreach($mapel as $mp)


<div class="container">
    <div>
        <a class="fw-bold tx-info bar-item" href="/dashboard">Latihan</a> / <span class="text-secondary">Buat Latihan</span>
    </div>
    {{-- @if (session()->has('success'))
<br>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check-circle"></i> {{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif --}}

<h4 class="fw-bold text-secondary text-uppercase mt-5">Kelola Mata Pelajaran {{$mp->nama }} {{$mp->kelas->nama}}</h4>

<div class="mt-5">
    <div><a class="btn btn-primary fw-bold text-uppercase" href="{{route('kelolaLatihan.create',['id'=>$mp->id])}}"> + buat latihan </a></div>
</div>

<br>
<div class="py-3 bg-white">
    <table class="table">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Waktu Mulai</th>
            <th>Waktu Selesai</th>
            <th>Link Tugas</th>
            <th>Aksi</th>
        </tr>
        @foreach ($latihan->where('mapel_id',$mp->id)->where('kelas_id',$mp->kelas_id) as $lth)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$lth->judul}}</a></td>
            <td>{{$lth->waktumulai}}</td>
            <td>{{$lth->waktuselesai}}</td>
            <td><a href="{{$lth->link}}" target="_blank">{{$lth->link}}</a></td>
            <td>
                <div class="d-flex">
                    <a class="btn-outline-success btn btn-sm" href="#"><i class="fas fa-eye"></i></a>&nbsp;

                    <a class="btn-outline-warning btn btn-sm" href="{{route('kelolaLatihan.edit',[$lth->id,'id'=>$mp->id])}}"><i class=" fas fa-edit"></i></a>&nbsp;
                    

                    <form action="{{route('kelolaLatihan.destroy',$lth->id)}}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn-outline-danger btn btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus latihan ini?');"><i class="fas fa-trash-alt"></i></button>
                        <input type="hidden" name="mapel_id" value="{{$mp->id}}">
                    </form>

                </div>
            </td>
        </tr>
        @endforeach
    </table>
</div>
</div>

@endforeach
@endsection