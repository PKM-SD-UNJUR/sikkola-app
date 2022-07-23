@extends('template.main')

@section('container')

@include('template.mapel-materi')

<div class="mainlist mt-4 mb-4">

    @include('template.mapel-page-link-submit')

    <div class="container mt-2">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active container" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                <div class="row">

                    {{-- Bulan     --}}
                    <div class="col-12 container mb-2">
                        <div class="list-group list-group-horizontal-md" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action @if($tg == " 01") active @endif" id="list-home-list" href="/kelas/submitForm/{{$mapel->id}}/{{$tgl = "01"}}" role="tab" aria-controls="list-home">Januari</a>
                            <a class="list-group-item list-group-item-action @if($tg == " 02") active @endif" id="list-profile-list" href="/kelas/submitForm/{{$mapel->id}}/{{$tgl = "02"}}" role="tab" aria-controls="list-profile">Februari</a>
                            <a class="list-group-item list-group-item-action @if($tg == " 03") active @endif" id="list-messages-list" href="/kelas/submitForm/{{$mapel->id}}/{{$tgl = "03"}}" role="tab" aria-controls="list-messages">Maret</a>
                            <a class="list-group-item list-group-item-action @if($tg == " 04") active @endif" id="list-settings-list" href="/kelas/submitForm/{{$mapel->id}}/{{$tgl = "04"}}" role="tab" aria-controls="list-settings">April</a>
                            <a class="list-group-item list-group-item-action @if($tg == " 05") active @endif" id="list-home-list" href="/kelas/submitForm/{{$mapel->id}}/{{$tgl = "05"}}" role="tab" aria-controls="list-home">Mei</a>
                            <a class="list-group-item list-group-item-action @if($tg == " 06") active @endif" id="list-profile-list" href="/kelas/submitForm/{{$mapel->id}}/{{$tgl = "06"}}" role="tab" aria-controls="list-profile">Juni</a>
                            <a class="list-group-item list-group-item-action @if($tg == " 07") active @endif" id="list-messages-list" href="/kelas/submitForm/{{$mapel->id}}/{{$tgl = "07"}}" role="tab" aria-controls="list-messages">July</a>
                            <a class="list-group-item list-group-item-action @if($tg == " 08") active @endif" id="list-settings-list" href="/kelas/submitForm/{{$mapel->id}}/{{$tgl = "08"}}" role="tab" aria-controls="list-settings">Agustus</a>
                            <a class="list-group-item list-group-item-action @if($tg == " 09") active @endif" id="list-home-list" href="/kelas/submitForm/{{$mapel->id}}/{{$tgl = "09"}}" role="tab" aria-controls="list-home">September</a>
                            <a class="list-group-item list-group-item-action @if($tg == " 10") active @endif" id="list-profile-list" href="/kelas/submitForm/{{$mapel->id}}/{{$tgl = "10"}}" role="tab" aria-controls="list-profile">Oktober</a>
                            <a class="list-group-item list-group-item-action @if($tg == " 11") active @endif" id="list-messages-list" href="/kelas/submitForm/{{$mapel->id}}/{{$tgl = "11"}}" role="tab" aria-controls="list-messages">November</a>
                            <a class="list-group-item list-group-item-action @if($tg == " 12") active @endif" id="list-settings-list" href="/kelas/submitForm/{{$mapel->id}}/{{$tgl = "12"}}" role="tab" aria-controls="list-settings">Desember</a>
                        </div>
                    </div>
                    <div class="container">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="januari" role="tabpanel" aria-labelledby="list-profile-list">

                                @if(Auth::user()->role=='guru')
                                <div class="tambah my-3">
                                    <a class="btn btn-info fw-bold text-light" data-bs-toggle="collapse" href="#collapseTugas" role="button" aria-expanded="false" aria-controls="collapseTugas"><i class="fas fa-tasks"></i> TAMBAH TUGAS</a>
                                </div>
                                @endif

                                <!-- COLLAPESE TAMBAH TUGAS -->

                                @include('submitForm.tambah-tugas')

                                <!-- END COLLAPSE TAMBAH TUGAS -->

                                @if($submitForm->count() > 0)
                                @foreach ($submitForm as $m)
                                <div class="materi-card container mb-3 mt-3">
                                    @include('submitForm.list-tugas')
                                </div>
                                @endforeach
                                @else
                                <div class="py-5">
                                    <h1 class="text-center fw-bold text-secondary">
                                        &#128012; Belum ada tugas pada bulan ini
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
  }

  .quiz-button {
    width: max-content;
  }

  .disscussion-forum-button .btn-chat-area {
    /* border: 1px solid #AF601A; */
    max-width: 100px;
    max-height: 100px;
    padding: 16px;
    background-color: rgb(0, 43, 135);
    border-radius: 100%;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px;
    transition: 0.3s ease;
  }

  .quiz-button .btn-chat-area {
    /* border: 1px solid #AF601A; */
    max-width: 100px;
    max-height: 100px;
    padding: 16px;
    background-color: rgb(0, 43, 135);
    border-radius: 100%;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px;
    transition: 0.3s ease;
  }

  .btn-chat-area img {
    transition: 0.3s ease;
  }

  .btn-chat-area:hover {
    box-shadow: rgba(48, 155, 255, 0.686) 0px 10px 50px;
  }

  .btn-chat-area:hover img {
    transform: scale(1.50);

  }

  .disscussion-forum-button img {
    width: 100%;
  }

  .quiz-button img {
    width: 100%;
  }

  .forum-btn {
    padding: 20px;
  }

  .forum-desc {
    transition: 0.3s ease-in;
    border-radius: 5px 100px 100px 5px;
    margin-bottom: -225px;
    box-shadow: rgba(48, 155, 255, 0.686) 0px 10px 50px;
  }

  .disscussion-forum-button:hover .forum-desc {
    margin-bottom: 40px;
  }
</style>


<div class="d-flex justify-content-end fixed-bottom">

  <div class="forum-btn ">
    <div class="disscussion-forum-button">
      <div class="area-desc-btn d-flex" data-placement="left" data-toggle="tooltip" data-type="primary" title="Ruang bertanya">
        <div class="btn-chat-area" id="btn-chat-area">
          <a class="btn-forum" href="/kelas/materi/forum/mapel/{{$mapel->id}}/question"><img src="{{asset('/icon/chat.png')}}" alt=""></a>
        </div>
      </div>
    </div>
  </div>

  <div class="forum-btn ">
    <div class="quiz-button">
      <div class="area-desc-btn d-flex" data-placement="left" data-toggle="tooltip" data-type="primary" title="Quiz">
        <div class="btn-chat-area bg-warning" id="btn-chat-area">
          <a class="btn-forum" href="/kelas/materi/forum/mapel/{{$mapel->id}}/quiz"><img src="{{asset('/icon/test.png')}}" alt=""></a>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection