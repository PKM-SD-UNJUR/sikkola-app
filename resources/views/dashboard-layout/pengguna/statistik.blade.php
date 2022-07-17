@extends('dashboard-layout.pengguna.template')
@section('list-group')
<h2 class="text-center text-light fw-bold"><i class="fas fa-server"></i> STATISTIK DATA</h2><br>

<div class="row container mt-3">
    <div class="col-md-6 container">
        <div class="card w-80">
            <div class="card-body">
                <div class="d-flex">
                    <h2 class="text-muted">
                        <i class="far fa-user text-secondary"></i> SISWA
                    </h2>&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="d-flex ms-auto">
                        <small class="mt-2">Jumlah Total Siswa :</small>&nbsp;&nbsp;&nbsp;
                        <h2>{{$users->where('role','siswa')->count()}}</h2>
                    </div>
                </div>
                <div class="">
                    @foreach ($kelas as $kls)

                    <?php
                    $siswa = $users->where('role', 'siswa')->count();
                    $siswaKelas = $users->where('kelas_id', $kls->id)->where('role', 'siswa')->count();

                    if ($siswa == 0) {
                        $siswa = 1;
                    }

                    $persenSiswaKelas = $siswaKelas / $siswa;
                    ?>

                    <small class="text-muted fw-bold">{{$kls->nama}}</small>
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: {{number_format($persenSiswaKelas,2)}}%" aria-valuenow="{{$siswa}}" aria-valuemin="0" aria-valuemax="100">{{number_format($persenSiswaKelas,2)}}%</div>&nbsp;{{$siswaKelas}} siswa
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 container">
        <div class="card w-80">
            <div class="card-body">
                <div class="d-flex">
                    <h2 class="text-muted">
                        <i class="fas fa-chalkboard-teacher"></i> GURU
                    </h2>&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="d-flex ms-auto">
                        <small class="mt-2">Jumlah Total Guru :</small>&nbsp;&nbsp;&nbsp;
                        <h2>{{$users->where('role','guru')->count()}}</h2>
                    </div>
                </div>
                <div class="">
                    @foreach ($kelas as $kls)

                    <?php
                    $guru = $users->where('role', 'guru')->count();
                    $guruKelas = $users->where('kelas_id', $kls->id)->where('role', 'guru')->count();

                    if ($guru == 0) {
                        $guru = 1;
                    }

                    $persenGuruKelas = $guruKelas / $guru;
                    ?>

                    <small class="text-muted fw-bold">{{$kls->nama}}</small>
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: {{number_format($persenGuruKelas,2)}}%" aria-valuenow="{{$guruKelas}}" aria-valuemin="0" aria-valuemax="100">{{number_format($persenGuruKelas,2)}}%</div>&nbsp;{{$guruKelas}} guru
                    </div>


                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row container">
    @foreach ($kelas as $kls)

    <?php
    $siswaKelas = $users->where('role', 'siswa')->where('kelas_id', $kls->id)->count();
    $siswaPria = $users->where('role', 'siswa')->where('kelas_id', $kls->id)->where('jenisKelamin', 'Laki-Laki')->count();
    $siswaWanita = $users->where('role', 'siswa')->where('kelas_id', $kls->id)->where('jenisKelamin', 'Perempuan')->count();

    if ($siswaKelas == 0) {
        $siswaKelas = 1;
    }

    $persenSiswaPria = $siswaPria / $siswaKelas;
    $persenSiswaWanita = $siswaWanita / $siswaKelas;
    ?>
    <div class="col-md-4 container mt-4">
        <div class="card w-80">
            <div class="card-body">
                <div class="d-flex">
                    <h6 class="text-muted text-uppercase">
                        <i class="fas fa-users"></i> SISWA {{$kls->nama}}
                    </h6>
                </div>
                <div class="">
                    <small class="text-muted"><i class="fas fa-mars text-primary"></i> Laki - Laki</small>
                    <div class="progress mb-1" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{number_format($persenSiswaPria,2)}}%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">{{number_format($persenSiswaPria,2)}}%</div>&nbsp;{{$siswaPria}} siswa
                    </div>
                    <small class="text-muted"><i class="fas fa-venus text-danger"></i> Perempuan</small>
                    <div class="progress mb-1" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" style="width: {{number_format($persenSiswaWanita,2)}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{number_format($persenSiswaWanita,2)}}%</div>&nbsp;{{$siswaWanita}} siswa
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection