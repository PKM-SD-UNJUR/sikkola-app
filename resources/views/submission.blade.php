@extends('template.main')

@section('container')
<div class="container mapelcaption text-center card-kelas" style="width: 80%; padding: 30px; border-radius: 5px; background-image: url('{{ asset('gambar/chalkboard.jpg') }}');">
  <h2>Kelas 1 submit</h2>
  <h1>IPS</h1>
  <style>
    #clock {
      text-align: center;
    }
  </style>
  <div id="clock" class="mb-1">
    <h5>8:10:45</h5>
  </div>
  <script>
    setInterval(showTime, 1000);

    function showTime() {
      let time = new Date();
      let hour = time.getHours();
      let min = time.getMinutes();
      let sec = time.getSeconds();
      am_pm = "AM";

      if (hour > 12) {
        hour -= 12;
        am_pm = "PM";
      }
      if (hour == 0) {
        hr = 12;
        am_pm = "AM";
      }

      hour = hour < 10 ? "0" + hour : hour;
      min = min < 10 ? "0" + min : min;
      sec = sec < 10 ? "0" + sec : sec;

      let currentTime = hour + ":" +
        min + ":" + sec + am_pm;

      document.getElementById("clock")
        .innerHTML = currentTime;
    }

    showTime();
  </script>
  <div class="container">
    {{-- <a class="btn btn-sm btnkelas bg-transparent text-light" href="{{ route('kelas1') }}"><- Kembali</a> --}}
      {{-- @if (auth()->user()->level=="guru")
<a class="btn btn-sm btnkelas bg-transparent text-light" href="/kelas1/ips/tambah">+ Tambah Materi</a>
@endif --}}
      <button class="btn btn-sm btnkelas bg-transparent text-light" data-bs-toggle="modal" data-bs-target="#exampleModal">? Cari Materi</button>
      {{-- Modal pencarian --}}
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content modalbl">
            <div class="modal-header">
              <h5 class="modal-title text-dark" id="exampleModalLabel"><i class="fas fa-search"></i> Cari Materi</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="">
                <div>
                  <input type="text" class="form-control" placeholder="Cari materi disini.." name="keyword"><br>
                  <button class="btn btn-secondary"><i class="fas fa-search"></i> Cari</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>

<div class="mainlist mt-4 mb-4">
  <div class="col-10 container mt-4">
    <div class="list-group list-group-horizontal-sm " id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action fw-bold text-center" href="/detail" aria-controls="list-home"><i class="fas fa-book"></i> Materi</a>
      <a class="list-group-item list-group-item-action fw-bold text-center" href="/latihan" aria-controls="list-profile"><i class="fas fa-pencil-alt"></i> Latihan</a>
      <a class="list-group-item list-group-item-action active fw-bold text-center" href="/submit" aria-controls="list-profile"><i class="fas fa-calendar-check"></i> Tugas</a>
    </div>
  </div>
  <div class="container mt-2">
    <div class="tab-content" id="nav-tabContent">
      {{-- submision --}}
      <div class="tab-pane show active fade bg-light" id="submision" role="tabpanel" aria-labelledby="list-profile-list">
        <div class="card">
          <h5 class="card-header">
            {{-- @if (auth()->user()->level=="guru") --}}
            <button id="tambahsubmitan" class="btn btn-primary"><i class="fas fa-plus-square"></i> Tambah Submitan</button>
            {{-- @endif --}}
            <a href="/kelas1/ips" class="btn btn-outline-secondary"><i class="fas fa-sync-alt refresh"></i></a>&nbsp;
          </h5>
          <div class="card-body">
            {{--alert error--}}
            <div class="container">
            </div>
            {{-- form tambah submission --}}
            <div class="card mb-4 formtambah">
              <div class="card-header text-center">
                Tambah Tugas
              </div>
              <div class="card-body container">
                {{-- alert error --}}
                <center>
                  <form class="" action="/kelas1/ips/addsubmission" enctype="multipart/form-data" method="post">
                    {{ method_field('POST') }}
                    @csrf
                    <table cellpadding="2">
                      <tr>
                        <td>Judul</td>
                        <td>:</td>
                        <td><input name="judul" class="form-control" type="text" placeholder="Masukkan judul submitan disini..."></td>
                      </tr>
                      <tr>
                        <td>Deadline</td>
                        <td>:</td>
                        <td><input name="bataswaktu" class="form-control" type="datetime-local"></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td><button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-upload"></i> Publish</button></td>
                      </tr>
                    </table>
                  </form>
                </center>
              </div>
            </div>
            {{-- list submitan --}}
            {{-- @foreach ($submit as $sub) --}}
            <div class="card text-center" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
              <div class="card-body">
                <h5 class="card-title">{{--$sub->judul--}} <a data-bs-toggle="modal" data-bs-target="#deletekuis{{--$sub->id--}}" style="font-size: 15px;" class="text-muted"><i class="far fa-trash-alt"></i></a></h5>
                
                {{-- Konfirmasi hapus materi modals --}}
                <!-- Modal -->
                <div class="modal fade" id="deletekuis{{--$sub->id--}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content modalhapus" style="background-color: white;">
                      <div class="modal-body">
                        <h1 class="text-center text-warning warning"><i class="fas fa-exclamation-triangle"></i></h1>
                        <h2 class="text-center">Apakah kamu yakin?</h2>
                        <p class="text-center text-muted container">Submission yang dihapus tidak dapat dipulihkan</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
                        {{-- <a href="/kelas1/ips/submisionform/delete/{{$sub->id}}" class="btn btn-primary"><i class="fas fa-trash-alt"></i> Hapus Form Submit</a> --}}
                      </div>
                    </div>
                  </div>
                </div>
                {{--end hapus--}}
                <div class="col-8 container">
                  <table class="table table-striped table-hover container">
                    <tr>
                      <th>Batas Pengumpulan</th>
                      <td>:</td>
                      {{-- <td>{{$sub->bataswaktu}}</td> --}}
                    </tr>
                    <tr>
                      <th>Waktu Pengingat</th>
                      <td>:</td>
                      {{-- <td>
                @php
                $time = \Carbon\Carbon::now()->diffForHumans($sub->bataswaktu);
                str_replace('after','more',$sub->bataswaktu);
                @endphp
                {{$time}}
                      </td> --}}
                    </tr>
                  </table>
                </div>
                {{-- form-submitan = /kelas1/ips/addsubmit --}}
                <div class="col-8 container">
                  {{-- <form class="container mb-2" action="/kelas1/ips/addsubmit" enctype="multipart/form-data" method="post" class="dropzone dz-clickable" >
            {{ method_field('POST') }}
                  @csrf
                  <input type="hidden" name="nama" value="{{ Auth::user()->name }}">
                  <input type="hidden" name="submit_id" value="{{$sub->id}}">
                  <input id="file" name="file" class="form-control form-sm dropzone" type="file">
                  <div class="dz-default dz-message">
                    <span class="text-muted fw-bold"><i class="fas fa-cloud-upload-alt"></i> Seret atau jatuhkan file disini</span>
                  </div>
                  <br>
                  <button type="submit" class="btn btn-outline-secondary kumpul-tugas{{$sub->id}}"><i class="fas fa-upload"></i> Kumpulkan Tugas</button>
                  @if (auth()->user()->level=="guru")
                  <a class="btn btn-outline-secondary" data-bs-toggle="offcanvas" href="#daftarsubmit{{$sub->id}}" role="button" aria-controls="offcanvasExample"><i class="fas fa-list-ul"></i> Daftar Tugas</a>
                  @endif
                  </form> --}}
                </div>


                {{-- daftar submision --}}
                <div class="offcanvas offcanvas-start" tabindex="-1" id="daftarsubmit{{--$sub->id--}}" aria-labelledby="offcanvasExampleLabel">
                  <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Daftar Submision</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body">
                    <table class="table table-striped table-hover">
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>File Tugas</th>
                        <th>Status</th>
                      </tr>
                      {{-- @php $i = 1 @endphp --}}
                      {{-- @foreach ($submited as $tugas) --}}
                      {{-- @if ($sub->id == $tugas->submit_id)  --}}
                      <tr>
                        {{-- <td>{{ $i }}</< /td> --}}
                        {{-- <td>{{$tugas->nama}}</td> --}}
                        <td>
                          {{-- <a href="/kelas1/ips/submit/download/{{$tugas->file}}" class="link-secondary"><i class="fas fa-file-download"> {{$tugas->file}}</i></a> --}}
                        </td>
                        {{-- @if ($tugas->created_at->isBefore($sub->bataswaktu)) --}}
                        <td class="table-success">Tepat Waktu</td>
                        {{-- @else --}}
                        <td class="table-danger">Terlambat</td>
                        {{-- @endif --}}
                      </tr>
                      {{-- @php
                $i++ 
             @endphp
                @endif
                @endforeach --}}
                    </table>
                  </div>
                </div>
              </div>
              {{-- @foreach ($submited as $tugas) --}}
              {{-- @if (Auth::user()->name == $tugas->nama &&  $sub->id == $tugas->submit_id) --}}
              <a class="detail-submit{{--$sub->id--}}" style="cursor: pointer"><i class="fas fa-info-circle"></i> Detail Submitan ({{--$tugas->nama--}})</a><br>
              <div class="col-8 container detail-submitan{{--$sub->id--}}">
                <table class="table table-striped table-hover">
                  <tr>
                    <td>File</td>
                    <td>:</td>
                    {{-- <td><a href="/kelas1/ips/submit/download/{{$tugas->file}}" class="link-secondary"><i class="fas fa-file-download"> {{$tugas->file}}</i></a></td> --}}
                  </tr>
                  <tr>
                    <td>Waktu Pengumpulan</td>
                    <td>:</td>
                    {{-- <td>{{$tugas->created_at}}</td> --}}
                  </tr>
                  {{-- @if ($tugas->created_at->isBefore($sub->bataswaktu)) --}}
                  <tr class="table-success">
                    <td>Status</td>
                    <td>:</td>
                    <td>Tepat waktu</td>
                  </tr>
                  {{-- @else --}}
                  <tr class="table-danger">
                    <td>Status</td>
                    <td>:</td>
                    <td>Telat</td>
                  </tr>
                  {{-- @endif --}}
                  <tr>
                    <td>
                      <a href="/kelas1/ips/submit/ubah/{{--$tugas->id--}}" class="link-secondary"><i class="fas fa-edit"></i> Edit</a>&nbsp;
                    </td>
                    <td></td>
                    <td>
                      <a class="text-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal{{--$tugas->id--}}"><i class="far fa-trash-alt"></i> Hapus</a>
                      {{-- Konfirmasi hapus materi modals --}}
                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal{{--$tugas->id--}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content modalhapus" style="background-color: white;">
                            <div class="modal-body">
                              <h1 class="text-center text-warning warning"><i class="fas fa-exclamation-triangle"></i></h1>
                              <h2 class="text-center">Apakah kamu yakin?</h2>
                              <p class="text-center text-muted container">Tugas yang dihapus tidak dapat dipulihkan</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
                              {{-- <a href="/kelas1/ips/destroysubmit/{{$tugas->id}}" id="#deletekuis{{$sub->id}}" class="btn btn-primary"><i class="fas fa-trash-alt"></i> Hapus Tugas</a> --}}
                            </div>
                          </div>
                        </div>
                      </div>
                      {{--end hapus--}}
                    </td>
                  </tr>
                </table>
              </div>
              {{-- @endif
        @endforeach --}}
              <div class="card-footer text-muted mt-1">
                {{-- {{$sub->created_at->diffForHUmans()}} --}}
              </div>
            </div>
            {{-- @endforeach  --}}
          </div>
        </div>
      </div>



    </div>
  </div>
</div>

@endsection