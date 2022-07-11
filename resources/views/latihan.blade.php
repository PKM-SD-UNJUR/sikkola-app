@extends('template.main')

@section('container')
<div class="container mapelcaption text-center card-kelas" style="width: 80%; padding: 30px; border-radius: 5px; background-image: url('{{ asset('gambar/chalkboard.jpg') }}');" >
  <h2>Kelas 1 submit</h2>
  <h1>IPS</h1>
<style>
#clock {
    text-align: center;
}
</style>
<div id="clock" class="mb-1"><h5>8:10:45</h5></div>
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

    let currentTime = hour + ":" 
        + min + ":" + sec + am_pm;

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
  <div class="col-10 container mt-4"></div>
      <div class="list-group list-group-horizontal-sm " id="list-tab" role="tablist">
        <a class="list-group-item list-group-item-action fw-bold text-center" href="/detail" aria-controls="list-home"><i class="fas fa-book"></i> Materi</a>
        <a class="list-group-item list-group-item-action active fw-bold text-center" href="/latihan" aria-controls="list-profile"><i class="fas fa-pencil-alt"></i> Latihan</a>
        <a class="list-group-item list-group-item-action fw-bold text-center" href="/submit" aria-controls="list-profile"><i class="fas fa-calendar-check"></i> Tugas</a>
      </div>
   </div>
    <div class="container mt-2">
      <div class="tab-content" id="nav-tabContent">

{{--latihan--}}
    <div class="tab-pane fade show active bg-light" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
        <div class="card">
          <div class="card-header">
            <ul class="nav nav-pills card-header-pills">
              <li class="nav-item ">
                <div class="d-flex">
                  {{-- @if (auth()->user()->level=="guru")
                  <a class="btn btn-primary fw-bold ms-auto" href="/kelas1/ips/kuis/tambah"><i class="fas fa-plus-square"></i> Tambah Quis</a>&nbsp;
                  @endif --}}
                  <a href="/kelas1/ips" class="btn btn-outline-secondary"><i class="fas fa-sync-alt refresh"></i></a>&nbsp;
                  <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#policy"><i class="fas fa-tasks"></i></button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="policy" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content" style="background-image: url('{{asset('gambar/chalkboard.jpg')}}'); border: 12px solid #784212;">
                      <div class="modal-body">
                        <ul class="" style="color: #F9E79F;">
                          <h4 class="text-center">Keterangan :</h4>
                          <li>Diharapkan untuk memasuki ruang kuis 10 menit sebelum kuis dimulai</li><br>
                          <li>Tombol untuk memasuki kuis tidak akan tersedia lagi jika waktu sudah tepat dengan waktu yang ditentukan</li><br>
                          <li>jika anda menekan tombol <span class="text-warning">"Masuk Kuis Sekarang"</span> anda akan dialihkan ke web Kahoot dan tunggu instruksi selanjutnya dari guru</li>
                        </ul>
                        <center><br>
                          <button type="button" class="btn btn-sm border border-2 text-light" data-bs-dismiss="modal">Oke, Saya mengerti</button>
                        </center>
                      </div>
                    </div>
                  </div>
                </div>

              </li>
            </ul>
          </div>
          <style>
            .btn-quiz{
              transition: 0.3s;
            }
            .btn-quiz:hover{
              transform: scale(1.08);
            }
          </style>
          <div class="card-body container">
            {{-- area kuis --}}
            <div class="contianer row">

              {{-- @forelse ($kuis as $quiz)
              @if($quiz->tanggal <= \Carbon\Carbon::now("Asia/Jakarta")->toDateString()) --}}
              <div class="col-md-4 container card-quiz" style="width: 18rem;">
                <div class="card-body">
                    <small class="text-muted">
                      {{-- @php
                         $result =  \Carbon\Carbon::parse($quiz->waktumulai)->diffForHumans(\Carbon\Carbon::now("Asia/Jakarta")->toTimeString());
                         Str::replace('setelahnya', 'lagi', $result);
                      @endphp
                      @if ($quiz->tanggal < \Carbon\Carbon::now("Asia/Jakarta")->toDateString()) --}}
                          Selesai
                        {{-- @else
                          {{$result}}
                      @endif --}}
                    </small>


                    {{-- @if ($quiz->tanggal >= \Carbon\Carbon::now("Asia/Jakarta")->toDateString())
                      @if ($quiz->waktumulai  > \Carbon\Carbon::now("Asia/Jakarta")->toTimeString())
                          {{$quiz->waktumulai > \Carbon\Carbon::now("Asia/Jakarta")->hour }} --}}
                        <small class="bg-success rounded-pill text-light" style="width: max-content; padding-right: 3px; padding-left: 3px; font-size: 10px;"><i class="fas fa-bolt"></i>Baru</small> 
                        {{-- @else --}}
                        <small class="bg-danger rounded-pill text-light" style="width: max-content; padding-right: 3px; padding-left: 3px; font-size: 10px;"><i class="fas fa-check-circle"></i>Sudah Dimulai</small>
                      {{-- @endif
                    @else --}}
                    <small class="bg-danger rounded-pill text-light" style="width: max-content; padding-right: 3px; padding-left: 3px; font-size: 10px;"><i class="fas fa-check-circle"></i>Selesai</small>
                    {{-- @endif --}}

                  <h5 class="quiz-time fw-bold text-dark">{{--$quiz->topik--}}</h5>
                  <div class="d-flex">
                    <h6 class="quiz-time"><i class="fas fa-stopwatch"></i> {{--$quiz->waktumulai--}} WIB</h6>&nbsp;
                    {{-- @if ($quiz->keterangan != NULL) --}}
                    <a class="link-info fw-bold" style="margin-top: -3px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#keterangan{{--$quiz->id--}}"><i class="fas fa-info-circle"></i> info</a>
                    {{-- @endif --}}
                     <!-- Modal -->
                      <div class="modal fade" id="keterangan{{--$quiz->id--}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-body">
                                <h4 class="text-center">Keterangan :</h4>
                                {{-- {!!$quiz->keterangan!!} --}}
                              <center><br>
                                <button type="button" class="btn btn-primary btn-sm text-light" data-bs-dismiss="modal">Oke, Saya mengerti</button>
                              </center>
                            </div>
                          </div>
                        </div>
                      </div>

                  </div>
                  {{-- <div class="d-flex"> --}}
                  <a href="{{--$quiz->link--}}" class="btn btn btn-quiz text-light fw-bold mt-1{{-- @if($quiz->tanggal < \Carbon\Carbon::now("Asia/Jakarta")->toDateString()) disabled @endif--}}" style="background-color: #F39C12; align-item: left;">
                     Masuk Quiz Sekarang 
                  <i class="fas fa-sign-in-alt">
                  </i></a><br>
                  <div class="d-flex mt-1 p-1">
                    <small class="text-muted" style="font-size: 12px"><i class="fas fa-calendar-alt"></i> {{--$quiz->tanggal--}}</small>&nbsp;&nbsp;
                    {{-- @if (auth()->user()->level=="guru") --}}
                    <a href="" class="text-muted" style="font-size: 12px; cursor:pointer;"  data-bs-toggle="modal" data-bs-target="#deletekuis{{--$quiz->id--}}"><i class="far fa-trash-alt"></i> Hapus</a>
                  {{-- Konfirmasi hapus materi modals --}}
                  <!-- Modal -->
                    <div class="modal fade" id="deletekuis{{--$quiz->id--}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content modalhapus" style="background-color: white;">
                          <div class="modal-body">
                            <h1 class="text-center text-warning warning"><i class="fas fa-exclamation-triangle"></i></h1>
                            <h2 class="text-center">Apakah kamu yakin?</h2>
                            <p class="text-center text-muted container">Materi yang dihapus tidak dapat dipulihkan</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
                            <a href="/kelas1/ips/kuis/hapus/{{--$quiz->id--}}" class="btn btn-primary"><i class="fas fa-trash-alt"></i> Hapus Materi</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    {{-- @endif --}}
                  </div>
                  {{-- </div> --}}
                </div>
              </div>
                {{-- @else --}}
                <div class="card card-quiz text-center container  mb-2" style="width: 18rem;">
                  <div class="card-body">
                    <center><small class="bg-secondary rounded-pill text-light" style="width: max-content; padding-right: 3px; padding-left: 3px; font-size: 10px;"><i class="fas fa-bolt"></i>Segera Hadir</small> </center>
                    <h5 class="card-title">{{--$quiz->topik--}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted"><i class="far fa-calendar-alt"></i> {{--$quiz->tanggal--}}</h6>
                    <h6 class="card-subtitle mb-2 text-muted"><i class="fas fa-stopwatch"></i> {{--$quiz->waktumulai--}}</h6>
                    <h5 class="card-text text-muted"><i class="far fa-smile-beam"></i> Quiz Coming Soon</h5>
                  </div>
                </div>
                {{-- @endif  
                @empty --}}
                <h1 class="container text-muted">Belum ada Kuis</h1>          
              {{-- @endforelse --}}
                 

            </div>
          </div>
        </div>
      </div>
    {{--end of latihan--}}
        
        
       
      </div>
    </div>
  </div>

@endsection