@extends('template.main')

@section('container')
<div class="container mapelcaption text-center card-kelas" style="width: 80%; padding: 30px; border-radius: 5px; background-image: url('{{ asset('gambar/chalkboard.jpg') }}');" >
  <h2>{{$mapel->kelas->nama}}</h2>
  <h1>{{$mapel->nama}}</h1>
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
  <div class="col-10 container mt-4">
      <div class="list-group list-group-horizontal-sm " id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action active fw-bold text-center" href="/detail" aria-controls="list-home"><i class="fas fa-book"></i> Materi</a>
          <a class="list-group-item list-group-item-action fw-bold text-center" href="/latihan" aria-controls="list-profile"><i class="fas fa-pencil-alt"></i> Latihan</a>
          <a class="list-group-item list-group-item-action fw-bold text-center" href="/submit" aria-controls="list-profile"><i class="fas fa-calendar-check"></i> Tugas</a>
      </div>
   </div>
    <div class="container mt-2">
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active container" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
          <div class="row">

        {{-- Bulan     --}}
            <div class="col-12 container mb-2">
              <div class="list-group list-group-horizontal-md" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list" href="#januari" role="tab" aria-controls="list-home">Januari</a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#februari" role="tab" aria-controls="list-profile">Februari</a>
                <a class="list-group-item list-group-item-action" id="list-messages-list" data-bs-toggle="list" href="#maret" role="tab" aria-controls="list-messages">Maret</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-bs-toggle="list" href="#april" role="tab" aria-controls="list-settings">April</a>
                <a class="list-group-item list-group-item-action" id="list-home-list" data-bs-toggle="list" href="#mei" role="tab" aria-controls="list-home">Mei</a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#juni" role="tab" aria-controls="list-profile">Juni</a>
                <a class="list-group-item list-group-item-action" id="list-messages-list" data-bs-toggle="list" href="#juli" role="tab" aria-controls="list-messages">July</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-bs-toggle="list" href="#agustus" role="tab" aria-controls="list-settings">Agustus</a>
                <a class="list-group-item list-group-item-action" id="list-home-list" data-bs-toggle="list" href="#september" role="tab" aria-controls="list-home">September</a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#oktober" role="tab" aria-controls="list-profile">Oktober</a>
                <a class="list-group-item list-group-item-action" id="list-messages-list" data-bs-toggle="list" href="#november" role="tab" aria-controls="list-messages">November</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-bs-toggle="list" href="#desember" role="tab" aria-controls="list-settings">Desember</a>
              </div>
            </div>
            <div class="container">
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="januari" role="tabpanel" aria-labelledby="list-profile-list">
                  {{-- @foreach ($data as $item)
                  @if(\Carbon\Carbon::parse($item->tanggal)->format('F')=='January') --}}
                    <div class="card activitycard">
                        <div class="card-header d-flex">
                            {{-- <h5>{{ $item->hari }}, {{ $item->tanggal }}</h5> --}}
                            <div class="ms-auto" style="float: right;">
                              {{-- @if (auth()->user()->level=="guru")
                              <a href="/kelas1/ips/ubah/{{ $item->id }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a>
                              <a class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#delete{{$item->id}}"><i class="fas fa-trash-alt"></i> Delete</a>
                              @endif --}}
                                {{-- Konfirmasi hapus materi modals --}}
                                <!-- Modal -->
                                  {{-- <div class="modal fade" id="delete{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content modalhapus" style="background-color: white;">
                                        <div class="modal-body">
                                          <h1 class="text-center text-warning warning"><i class="fas fa-exclamation-triangle"></i></h1>
                                          <h2 class="text-center">Apakah kamu yakin?</h2>
                                          <p class="text-center text-muted container">Materi yang dihapus tidak dapat dipulihkan</p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
                                          <a href="/kelas1/ips/hapus/{{ $item->id }}" class="btn btn-primary"><i class="fas fa-trash-alt"></i> Hapus Materi</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div> --}}

                            </div>
                        </div>
                        <table class="">
                            <tr>
                                <td><h5 class="card-title container" style="color: #1A5276;">Topik&nbsp;</h5></td>
                                <td><h5 class="card-title" style="color: #1A5276;">:</h5></td>
                                {{-- <td><h5 class="card-title container" style="color: #1A5276;">{{ $item->Topik }}</h5></td> --}}
                            </tr>
                            <tr>
                                <td><p class="container">Judul</p></td>
                                <td><p class="">:</p></td>
                                {{-- <td><p class="container">{{ $item->Judul }}</p></td> --}}
                            </tr>
                            <tr>
                                <td><p class="container" style="margin-top: -15px; color: #D4AC0D;"><i class="fas fa-clock"></i>Time</p></td>
                                <td><p class="" style="margin-top: -15px; color: #D4AC0D;">:</p></td>
                                {{-- <td><p class="container" style="margin-top: -15px; color: #D4AC0D;">{{ $item->waktumulai }} sampai {{ $item->waktuselesai }}</p></td> --}}
                            </tr>
                        </table>
                        <div class="card-body">
                          {{-- @if ($item->deskripsi!=NULL) --}}
                            <div class="accordion mb-2" id="accordionExample">
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                  {{-- <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#des{{$item->id}}" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fas fa-info-circle"></i> &nbsp;Deskripsi
                                  </button> --}}
                                </h2>
                                {{-- <div id="des{{$item->id}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                    <strong>Apa yang akan dilakukan siswa pada materi ini ?</strong><br>
                                    <p>{!!$item->deskripsi!!}</p>
                                  </div>
                                </div> --}}
                              </div>
                            </div>
                          {{-- @endif
                          @if ($item->vidio != NULL)
                            <button class="btn btn-outline-danger mb-1" data-bs-toggle="modal" data-bs-target="#video{{ $item->id }}"><i class="fab fa-youtube"></i> Play Video</button>
                          @endif
                          @if ($item->file != NULL)
                            <a href="/kelas1/ips/download/{{$item->file}}" class="btn btn-outline-info"><i class="fas fa-file-alt"></i> Download Materi</a>
                          @endif --}}

                        </div>
                      </div>
                      {{-- Modal Video --}}
                    <!-- Modal -->
                    {{-- <div class="modal fade" id="video{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                      <div class="modal-content modalbl">
                          <div class="modal-header">
                            <img src="{{ asset('gambar/robotvideo.gif') }}" style="max-width: 60px;" alt=""> 
                          <h4 class="modal-title" id="exampleModalLabel">Tonton Video Yukk!</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="container col-12">
                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{$item->vidio}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                          </div>
                          <br>
                      </div>
                      </div>
                  </div> --}}
                  <br>
                  {{-- @endif
                @endforeach --}}
                </div>
                {{--end0fjanuary--}}
               
              </div>
            </div>
          </div>
        </div>
        
        
       
      </div>
    </div>
  </div>

@endsection