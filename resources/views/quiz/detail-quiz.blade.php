@extends('template.main')

@section('container')
<style>
  .qna-area {
    box-shadow: rgb(214, 234, 255) 0px 8px 24px;
  }

  .main-page {
    border-radius: 20px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
  }

  .max-width {
    width: ;
  }

  .icon-title {
    max-width: 60px;
  }

  .question-area {
    /* margin-top: 100px; */
  }

  .radio-toolbar {
    margin: 10px;
  }

  .radio-toolbar input[type="radio"] {
    opacity: 0;
    position: fixed;
    width: 0;
  }

  .radio-toolbar label {
    /* display: inline-block; */
    /* background-color: rgb(255, 255, 255); */
    padding: 8px 16px;
    font-family: sans-serif, Arial;
    font-size: 16px;
    /* border: 1px solid rgb(190, 190, 190); */
    border-radius: 6px;
    font-weight: bold;
    transition: 0.3s;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
  }

  .radio-toolbar label:hover {
    /* background-color: #dfd; */
    /* font-weight: bold; */
  }

  .radio-toolbar input[type="radio"]:focus+label {
    /* border: 5px dashed rgb(255, 255, 255); */
  }

  .radio-toolbar input[type="radio"]:checked+label {
    background-color: #F1C40F;
    box-shadow: rgb(255, 236, 64) 0px 7px 15px 0px;
    /* border-color: #4c4; */
    color: white;
    font-weight: bold;
    /* transform: scale(1.10); */
  }

  .manage-soal {
    float: right;
  }

  .area-answer {
    max-height: 250px;
    max-width: 250px;
    overflow: hidden;
  }

  /* ul li{
  list-style: none;
} */

  .score-img {
    max-width: 250px;
  }
</style>
<div class="container">
  <div class="py-2 mb-2">
    <a class="fw-bold" href="/kelas/materi/forum/mapel/{{$mapel->id}}/quiz"><i class="fas fa-angle-double-left"></i> KEMBALI KE DAFTAR QUIZ</a>
  </div>
  <br>
  <div class="container bg-white main-page p-5">
    <div class="text-center">
      @if (Auth::user()->role == 'guru')
      <div class="ms-auto">
        <a class="fw-bold text-warning" href="/kelas/materi/forum/mapel/{{$mapel->id}}/quiz/{{$quiz->id}}/edit"><i class="far fa-edit"></i> UBAH</a>&nbsp; | &nbsp;
        <a class="fw-bold text-danger" data-bs-toggle="modal" data-bs-target="#delete{{$quiz->id}}"><i class="far fa-trash-alt"></i> HAPUS</a>
      </div><br>
      @endif
      <div class="d-flex">
        <img class="" src="{{asset('icon/verified.png')}}" width="70px" alt="">&nbsp;&nbsp;
        <h1 class="fw-bold tx-main">{{$quiz->nama}}</h1>
      </div>
      <br><br>
      <div>
        <b><i class="fas fa-bullhorn"></i> Quiz akan dimulai pada {{\Carbon\Carbon::parse($quiz->deadline)->format('d F Y')}} pukul {{\Carbon\Carbon::parse($quiz->deadline)->format('h:d')}}</b>
        <br>
      </div>
      <br>
    </div>
    <div class="container mt-3">
      <div class="container d-flex justify-content-center">
        <div>
          <h6>
            {!!$quiz->keterangan!!}
          </h6>
        </div>
      </div>
    </div>
    <br><br>

    @if($myresult != null)
    <h3 class="text-center fw-bold">Ringakasan Hasil Pengerjaan : </h3>
    <br>
    <div class="text-center d-flex justify-content-center">
      <table class="table table-hover">
        <tr>
          <th>STATUS</th>
          <th>WAKTU SUBMIT</th>
          <th>NILAI</th>
          <th>REVIEW</th>
        </tr>
        <tr>
          @if ($myresult->created_at->isBefore($quiz->deadline))
          <td class="bg-success text-white fw-bold">
            Tepat Waktu
          </td>
          @else
          <td class="bg-danger text-white fw-bold">
            Telat
          </td>
          @endif
          <td>{{\Carbon\Carbon::parse($myresult->created_at)->format('d F Y , H:i')}}</td>
          <td>{{number_format($myresult->nilai, 2)}}</td>
          <td> <a href="/kelas/materi/forum/quiz/soal/{{$quiz->id}}/review" class="fw-bold text-underline">Lihat pembahasan</a> </td>
        </tr>
      </table>
    </div>
    <br><br>
    <div class="text-center mb-3">
      <b>Hasil akhir kamu : </b>
    </div>
    <div class="d-flex">
      <img class="" src="{{asset('icon/nilai.png')}}" width="50px">&nbsp;&nbsp;&nbsp;&nbsp;<h1 class="fw-bold">{{number_format($myresult->nilai, 2)}} / 100</h1>
    </div>
    <div class="text-center mt-5">
      @if ($myresult->nilai >= 95)
      <img class="score-img" src="{{asset('icon/perfect.gif')}}" alt="">
      <h3 class="fw-bold tx-main">Wooww Kamu hebat!! &#128512;</h3>
      @endif
      @if ( $myresult->nilai < 95 && $myresult->nilai >= 85)
        <img class="score-img" src="{{asset('icon/verygood.gif')}}" alt="">
        <h3 class="fw-bold tx-main"> Hasil yang sangat bagus <br> Good job &#128077;</h3>
        @endif
        @if ( $myresult->nilai < 85 && $myresult->nilai >= 75)
          <img class="score-img" src="{{asset('icon/good.gif')}}" alt="">
          <h3 class="fw-bold tx-main">Hasil yang cukup bagus <br> tetap semangat &#128079;</h3>
          @endif
          @if ( $myresult->nilai < 75 && $myresult->nilai >= 60)
            <img class="score-img" src="{{asset('icon/notbad.gif')}}" alt="">
            <h3 class="fw-bold tx-main">Usaha yang baik ayo lebih semangat belajar nya &#128513;</h3>
            @endif
            @if ( $myresult->nilai < 60) <img class="score-img" src="{{asset('icon/keep.gif')}}" alt="">
              <h3 class="fw-bold tx-main">Tetap semangat dan mari tingkatkan di latihan berikutnya &#128522;</h3>
              @endif
    </div>
    @endif

    <br><br>
    <div class="text-center py-3">
      @if (Auth::user()->role == 'siswa')
      @if ($start != null && $quiz->status)
      @if($myresult == null)
      <a href="/kelas/materi/forum/quiz/{{$quiz->id}}/soal/{{$start->id}}" class="btn btn-dark text-uppercase btn-lg fw-bold">&#128394; Kerjakan Latihan</a><br><br>
      @endif
      @endif
      @else
      <button class="btn btn-outline-dark btn-lg text-uppercase fw-bold" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">&#128394; Hasil Latihan</button>
      @endif

    </div>
  </div>

  {{-- list nilai --}}
  <div class="offcanvas  @if(session()->has('nilai')) show @endif offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title text-uppercase fw-bold" id="offcanvasRightLabel">hasil quiz {{$quiz->nama}}</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <table class="table">
        <tr>
          <th>No</th>
          <th>Status</th>
          <th>Nama</th>
          <th>NIlai</th>
          <th>action</th>
        </tr>
        @foreach ($allResult as $ar)
        <tr>
          <td>{{$loop->iteration}}</td>
          @if ($myresult != null)
          @if ($myresult->created_at->isBefore($quiz->deadline))
          <td class="table-success text-success fw-bold">
            Tepat Waktu
          </td>
          @else
          <td class="table-danger text-danger fw-bold">
            Telat
          </td>
          @endif
          @endif
          <td>{{$ar->user->name}}</td>
          <td>
            <form method="post" action="/kelas/materi/forum/quiz/nilai/{{$ar->id}}/update" enctype="multipart/form-data">
              @csrf
              <input class="w-100" name="nilai" type="text" value="{{number_format($ar->nilai,2)}}">
          </td>
          <td>
            <button type="submit" class="badge border border-none border-primary bg-primary">EDIT</button>
            </form>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
  {{-- list nilai --}}

  {{--modal hapus--}}
  <div class="modal fade" id="delete{{$quiz->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content modalhapus" style="background-color: white;">
        <div class="modal-body">
          <h1 class="text-center text-warning warning"><i class="fas fa-exclamation-triangle"></i></h1>
          <h2 class="text-center">Apakah kamu yakin?</h2>
          <p class="text-center text-muted container">Quiz yang dihapus tidak dapat dipulihkan</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
          <form action="/kelas/materi/forum/mapel/{{$mapel->id}}/quiz/{{$quiz->id}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus Quiz</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  {{--modal hapus end--}}

  <br><br>
  @if (Auth::user()->role == 'guru')
  <div class="container bg-white main-page p-5">
    <div class="d-flex justify-content-start">
      <h3 class="fw-bold text-uppercase"><i class="fas fa-tasks"></i> list soal</h3>
      <div class="ms-auto">
        @if (!$quiz->status)
        <a class="btn btn-outline-dark btn-sm fw-bold text-uppercase" data-bs-toggle="modal" data-bs-target="#terapkan" href="/kelas/materi/forum/mapel/{{$mapel->id}}/quiz/{{$quiz->id}}"><i class="fas fa-check-circle"></i> terapkan soal</a>
        <a class="btn btn-info btn-sm fw-bold text-white text-uppercase" href="/kelas/materi/forum/quiz/{{$quiz->id}}}/soal/create"> + tambah soal</a>
        @else
        <small class="fw-bold text-success text-uppercase"><i class="fas fa-check-circle"></i> seluruh soal telah diterapkan</small>
        @endif
      </div>
    </div>

    <hr>

    <br>
    <table class="table">

      @foreach ($soal as $s)
      <tr class="w-100">
        <td class="fw-bold">
          <div class="py-3">
            <h2 class="fw-bold">{{$loop->iteration}}</h2>
          </div>
        </td>
        <td>
          {{-- <a class="mb-2 text-dark">{!!$s->soal!!}</a>
            <br> --}}
          <div class="py-3">
            @if ($s->soalGambar)
            <div class="py-2">
              <a class="" href="{{asset("/storage/$s->soalGambar")}}">
                <div class="area-answer">
                  <img class="w-100 h-100" src="{{asset("/storage/$s->soalGambar")}}" alt="">
                </div>
              </a>
            </div>
            @endif
            <a class="fw-bold text-dark">{!!$s->soal!!}</a>

            <div class="question-area">

              <div class="py-3">
                <div class="d-flex justify-content-start">
                  <p>A.&nbsp;{!!$s->opsi1!!}</p>
                </div>
                <div class="d-flex justify-content-start">
                  <p>B.&nbsp;{!!$s->opsi1!!}</p>
                </div>
                <div class="d-flex justify-content-start">
                  <p>C.&nbsp;{!!$s->opsi1!!}</p>
                </div>
                <div class="d-flex justify-content-start">
                  <p>D.&nbsp;{!!$s->opsi1!!}</p>
                </div>
              </div>
            </div>

          </div>
          <div class="p-2 rounded">
            <h5 class="fw-bold">Jawaban : </h5>
            <b>
              @if ($s->jawaban == 'a')
              {!!$s->opsi1!!}
              @elseif($s->jawaban == 'b')
              {!!$s->opsi2!!}
              @elseif($s->jawaban == 'c')
              {!!$s->opsi3!!}
              @elseif($s->jawaban == 'd')
              {!!$s->opsi4!!}
              @endif
            </b>
          </div>
          <div class="p-2 py-4 rounded">
            <h5 class="fw-bold">Pembahasan : </h5>
            {!! $s->pembahasan !!}
          </div>
          <div class="py-5 gambar-area">
            @if ($s->jawabanGambar)
            <a class="" href="{{asset("/storage/$s->jawabanGambar")}}">
              <div class="area-answer">
                <img class="w-100 h-100" src="{{asset("/storage/$s->jawabanGambar")}}" alt="">
              </div>
            </a>
            @endif
          </div>
        </td>
        @if (!$quiz->status)
        <td>
          <div class="py-3 manage-soal">
            <a class="text-warning fw-bold" href="/kelas/materi/forum/quiz/{{$quiz->id}}/soal/{{$s->id}}/edit"><small>&#128394; UBAH</small></a>&nbsp;&nbsp;
            <a class="text-danger fw-bold" data-bs-toggle="modal" data-bs-target="#soal{{$s->id}}"><small>&#128465; HAPUS</small></a>
          </div>
        </td>
        @endif
      </tr>

      {{--modal terapkan--}}
      <div class="modal fade" id="terapkan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content modalhapus" style="background-color: white;">
            <div class="modal-body">
              <h1 class="text-center text-warning warning"><i class="fas fa-exclamation-triangle"></i></h1>
              <h2 class="text-center">Apakah kamu yakin?</h2>
              <p class="text-center text-muted container">Seluruh soal akan diterapkan pada quiz dan kamu tidak dapat lagi mengelola setiap soal</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary text-uppercase" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
              <form action="/kelas/materi/forum/mapel/{{$mapel->id}}/quiz/{{$quiz->id}}/apply" method="post">
                @csrf
                <input type="hidden" name="status" value="1">
                <button type="submit" class="btn btn-dark text-uppercase"><i class="fas fa-check-circle"></i> terapkan Soal</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      {{--modal hapus end--}}

      {{--modal hapus--}}
      <div class="modal fade" id="soal{{$s->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content modalhapus" style="background-color: white;">
            <div class="modal-body">
              <h1 class="text-center text-warning warning"><i class="fas fa-exclamation-triangle"></i></h1>
              <h2 class="text-center">Apakah kamu yakin?</h2>
              <p class="text-center text-muted container">Soal yang dihapus tidak dapat dipulihkan</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
              <form action="/kelas/materi/forum/quiz/{{$quiz->id}}/soal/{{$s->id}}" method="post">
                @csrf
                @method('delete')
                <input type="hidden" name="mapel" value="{{$mapel->id}}">
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus Soal</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      {{--modal hapus end--}}

      @endforeach

    </table>
  </div>
  @endif

</div>

@endsection