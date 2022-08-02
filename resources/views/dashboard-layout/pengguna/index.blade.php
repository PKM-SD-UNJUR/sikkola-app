@extends('dashboard-layout.pengguna.template')
@section('list-group')

@if($users->count() == 0)

<h2 class="text-center text-light fw-bold text-uppercase"><i class="fas fa-users"></i> PENGGUNA BELUM TERSEDIA</h2>

@else

@foreach ($users->take(1) as $user)
@if($user->role == 'guru')
<h2 class="text-center text-light fw-bold text-uppercase"><i class="fas fa-users"></i> DATA PENGGUNA GURU</h2>
@else
<h2 class="text-center text-light fw-bold text-uppercase"><i class="fas fa-users"></i> DATA PENGGUNA {{$user->kelas->nama}}</h2>
@endif
<br>
<div class="row container mt-3">
    <div class="col-md-12 container">

        <div class="mt-1">
            <div><a class="btn btn-primary fw-bold text-uppercase" href="{{route('kelola.create',['nama'=>$user->kelas->nama,'role'=>$user->role,'kelasID'=>$user->kelas_id])}}"> + tambah pengguna </a>
            </div>
        </div>

        <br>
        <div class="bg-white">
            <table class="table table-striped table-bordered">
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Nama</th>
                    <th scope="col" class="text-center">Jenis Kelamin</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Kelas</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
                @foreach ($users as $user)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center">{{$user->name}}</a></td>
                    <td class="text-center">{{$user->jenisKelamin}}</td>
                    <td class="text-center">{{$user->email}}</td>
                    <td class="text-center">{{$user->kelas->nama}}</td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center">
                            <a class="btn-outline-warning btn btn-sm" href="{{route('kelola.edit',[$user->id,'nama'=>$user->kelas->nama,'role'=>$user->role])}}"><i class=" fas fa-edit"></i></a>&nbsp;&nbsp;

                            <form action="{{route('kelola.destroy',[$user->id,$user->id,'role'=>$user->role,'kelasID'=>$user->kelas_id])}}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn-outline-danger btn btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');"><i class="fas fa-trash-alt"></i></button>
                                <input type="hidden" name="mapel_id" value="{{$user->id}}">
                            </form>

                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

    </div>


</div>

@endforeach

@endif

@endsection