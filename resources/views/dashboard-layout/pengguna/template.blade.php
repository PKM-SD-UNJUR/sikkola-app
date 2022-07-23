@extends('dashboard.main')

@section('top-title')
<h3 class="fw-bold text-secondary text-uppercase">kelola pengguna</h3>
@endsection


@section('content')


<div class="container">
    <div>
        <a class="fw-bold tx-info bar-item" href="/dashboard">Kelola Pengguna</a> / <span class="text-secondary">Daftar Pengguna</span>
    </div>
    <br>


    <div class="row mt-5">
        <div class="col-md-2">
            <div class="list-group list" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action {{($subtitle=='statistik')?'active':''}}" href="{{route('kelola-pengguna')}}">Statistik Pengguna</a>
                @foreach ($kelas as $kls)
                <a class="list-group-item list-group-item-action {{($subtitle==$kls->nama)?'active':''}}" href="{{route('kelola.index',['id'=>$kls->id, 'nama'=>$kls->nama,'role'=>'siswa'])}}">{{$kls->nama}}</a>
                @endforeach
                <a class="list-group-item list-group-item-action {{($subtitle=='guru')?'active':''}}" href="{{route('kelola.index',['id'=>$kls->id, 'nama'=>'guru', 'role'=>'guru'])}}">Guru</a>
            </div>
        </div>

        <div class="col-md-10">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active pb-5 px-3 bg-info" id="list-home" role="tabpanel" aria-labelledby="list-home-list"><br>
                    @yield('list-group')

                </div>
            </div>
        </div>

    </div>


    <br><br>

    @endsection