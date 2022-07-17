@extends('template.main')

@section('container')

@include('template.mapel-materi')

<div class="mainlist mt-4 mb-4">

  @include('template.mapel-page-link-latihan')

  <div class="container mt-2">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active container" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
        <div class="row">

          {{-- Bulan     --}}
          <div class="col-12 container mb-2">
            <div class="list-group list-group-horizontal-md" id="list-tab" role="tablist">
              <a class="list-group-item list-group-item-action @if($tg == " 01") active @endif" id="list-home-list" href="/kelas/latihan/{{$mapel->id}}/{{$tgl = "01"}}" role="tab" aria-controls="list-home">Januari</a>
              <a class="list-group-item list-group-item-action @if($tg == " 02") active @endif" id="list-profile-list" href="/kelas/latihan/{{$mapel->id}}/{{$tgl = "02"}}" role="tab" aria-controls="list-profile">Februari</a>
              <a class="list-group-item list-group-item-action @if($tg == " 03") active @endif" id="list-messages-list" href="/kelas/latihan/{{$mapel->id}}/{{$tgl = "03"}}" role="tab" aria-controls="list-messages">Maret</a>
              <a class="list-group-item list-group-item-action @if($tg == " 04") active @endif" id="list-settings-list" href="/kelas/latihan/{{$mapel->id}}/{{$tgl = "04"}}" role="tab" aria-controls="list-settings">April</a>
              <a class="list-group-item list-group-item-action @if($tg == " 05") active @endif" id="list-home-list" href="/kelas/latihan/{{$mapel->id}}/{{$tgl = "05"}}" role="tab" aria-controls="list-home">Mei</a>
              <a class="list-group-item list-group-item-action @if($tg == " 06") active @endif" id="list-profile-list" href="/kelas/latihan/{{$mapel->id}}/{{$tgl = "06"}}" role="tab" aria-controls="list-profile">Juni</a>
              <a class="list-group-item list-group-item-action @if($tg == " 07") active @endif" id="list-messages-list" href="/kelas/latihan/{{$mapel->id}}/{{$tgl = "07"}}" role="tab" aria-controls="list-messages">Juli</a>
              <a class="list-group-item list-group-item-action @if($tg == " 08") active @endif" id="list-settings-list" href="/kelas/latihan/{{$mapel->id}}/{{$tgl = "08"}}" role="tab" aria-controls="list-settings">Agustus</a>
              <a class="list-group-item list-group-item-action @if($tg == " 09") active @endif" id="list-home-list" href="/kelas/latihan/{{$mapel->id}}/{{$tgl = "09"}}" role="tab" aria-controls="list-home">September</a>
              <a class="list-group-item list-group-item-action @if($tg == " 10") active @endif" id="list-profile-list" href="/kelas/latihan/{{$mapel->id}}/{{$tgl = "10"}}" role="tab" aria-controls="list-profile">Oktober</a>
              <a class="list-group-item list-group-item-action @if($tg == " 11") active @endif" id="list-messages-list" href="/kelas/latihan/{{$mapel->id}}/{{$tgl = "11"}}" role="tab" aria-controls="list-messages">November</a>
              <a class="list-group-item list-group-item-action @if($tg == " 12") active @endif" id="list-settings-list" href="/kelas/latihan/{{$mapel->id}}/{{$tgl = "12"}}" role="tab" aria-controls="list-settings">Desember</a>
            </div>
          </div>
          <div class="container">
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="januari" role="tabpanel" aria-labelledby="list-profile-list">

                @if(Auth::user()->role=='guru')
                <div class="tambah my-3">
                  <a class="btn btn-info fw-bold text-light" href="/kelas/latihan/{{$mapel->id}}/create"><i class="fas fa-tasks"></i> TAMBAH LATIHAN</a>
                </div>
                @endif

                @if($latihan->count() > 0)
                @foreach ($latihan as $l)
                <div class="materi-card container mb-3 mt-3">
                  <div class="row">
                    <div class="col-md-11 card-materi-desc bg-white p-4">
                      <div class="row">
                        <div class="col-md-3 py-2" style="max-width: 60px;">
                          <img class="img-materi-card" src="{{asset("icon/kuis.png")}}" alt="">
                          <div class="line-latihan-card mt-2"></div>
                        </div>
                        <div class="col-md-11 mt-1">
                          <h4 class="fw-bold">{{$l->judul}}</h4>
                          <h6 class="text-secondary fw-bold">{!!$l->keterangan!!}</h6>
                          <div class="mt-1">
                            <h6 class="tx-info"><i class="fas fa-clock"></i> {{Carbon\Carbon::parse($l->waktumulai)->format('H:i')}} - {{Carbon\Carbon::parse($l->waktuselesai)->format('H:i')}}</h6>
                          </div>
                          <div class="py-2 d-flex justify-content-start">

                            <a class="btn btn-outline-info btn-sm fw-bold" href="{{$l->link}}" target="_blank"><i class="fas fa-tasks"></i> Buka Latihan</a>

                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-1">

                    @if(Auth::user()->role=='guru')
                      <div class="p-3 mb-2 bg-white menu-materi-card">
                        <a class="fw-bold " href="/kelas/latihan/{{$mapel->id}}/{{$l->id}}/edit"><i class="fas fa-edit"></i> UBAH</a>
                      </div>

                      <div class="p-3 bg-white  menu-materi-card">
                        <a class="fw-bold text-danger" data-bs-toggle="modal" data-bs-target="#delete{{$l->id}}"><i class="fas fa-trash"></i> HAPUS</a>
                      </div>
                    @endif

                      {{--modal hapus--}}
                      <div class="modal fade" id="delete{{$l->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content modalhapus" style="background-color: white;">
                            <div class="modal-body">
                              <h1 class="text-center text-warning warning"><i class="fas fa-exclamation-triangle"></i></h1>
                              <h2 class="text-center">Apakah kamu yakin?</h2>
                              <p class="text-center text-muted container">Latihan yang dihapus tidak dapat dipulihkan</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
                              <a href="/kelas/latihan/{{$mapel->id}}/{{$l->id}}/delete" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus Latihan</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      {{--modal hapus end--}}

                      <div class="bg-white calendar  menu-materi-card mt-3">
                        <div class="calender-block d-flex">
                          <button class="btn btn-sm btn-dark"></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <button class="btn btn-sm btn-dark"></button>
                        </div>
                        <img class="pin-icon" src="{{asset('icon/pin.png')}}" alt="">
                        <div class="bg-danger text-center cal-title rounded px-2 py-1 text-sm fw-bold text-white text-uppercase">
                          {{\Carbon\Carbon::parse($l->waktumulai)->formatLocalized('%b')}}
                          {{\Carbon\Carbon::parse($l->waktumulai)->format('Y')}}
                        </div>
                        <div class="py-2 text-center">
                          <h1 class="text-secondary fw-bold">{{\Carbon\Carbon::parse($l->waktumulai)->format('d')}}</h1>
                          <small class="text-uppercase fw-bold text-sm">{{\Carbon\Carbon::parse($l->waktumulai)->format('l')}}</small>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                @endforeach
                @else
                <div class="py-5">
                  <h1 class="text-center fw-bold text-secondary">
                    &#128012; Belum ada latihan pada bulan ini
                  </h1>
                </div>
                @endif

              </div>
              {{--end0fjanuary--}}

            </div>
          </div>
        </div>
      </div>



    </div>
  </div>
</div>

<style>
  .disscussion-forum-button {
    width: max-content;
    /* background-color: black; */
    /* overflow: hidden; */
  }

  .disscussion-forum-button .btn-chat-area {
    /* border: 1px solid #AF601A; */
    max-width: 100px;
    max-height: 100px;
    padding: 16px;
    background-color: rgb(0, 43, 135);
    border-radius: 100%;

    transition: 0.3s ease;
  }

  .btn-chat-area img {
    transition: 0.3s ease;
  }

  .btn-chat-area:hover {
    box-shadow: rgba(48, 155, 255, 0.686) 0px 10px 50px;
  }

  .btn-chat-area:hover img {
    /* box-shadow: rgba(48, 155, 255, 0.686) 0px 10px 50px; */
    transform: scale(1.50);
    /* padding: 10px; */

  }


  .disscussion-forum-button img {
    width: 100%;
  }

  .forum-btn {
    padding: 20px;
  }

  .forum-desc {
    transition: 0.3s ease-in;
    /* position: absolute; */
    border-radius: 5px 100px 100px 5px;
    margin-bottom: -225px;
    /* border: 5px solid; */
    /* border-color: rgb(170, 218, 255); */
    box-shadow: rgba(48, 155, 255, 0.686) 0px 10px 50px;
  }

  /* .btn-forum:hover .forum-desc{
      margin-top: -105px;
    }  */

  .disscussion-forum-button:hover .forum-desc {
    margin-bottom: 40px;
  }
</style>


<div class="d-flex justify-content-end fixed-bottom">
  <div class="forum-btn ">
    <div class="disscussion-forum-button">
      <div class="area-desc-btn d-flex" data-placement="left" data-toggle="tooltip" data-type="primary" title="Ruang bertanya">
      <div class="btn-chat-area" id="btn-chat-area">
        <a class="btn-forum"  href="/kelas/materi/forum/mapel/{{$mapel->id}}/question"><img src="{{asset('/icon/chat.png')}}" alt=""></a>
      </div>
    </div>
    </div>
  </div>
</div>

@endsection