@extends('template.main')

@section('container')
<style>
    .qna-area{
        box-shadow: rgb(214, 234, 255) 0px 8px 24px;
    }
    .main-page{
        border-radius: 20px;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }
    .max-width{
        width: ;
    }
    .icon-title{
        max-width: 60px;
    }

    .question-area{
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
        padding: 2px 8px;
        font-family: sans-serif, Arial;
        font-size: 16px;
        /* border: 1px solid rgb(190, 190, 190); */
        border-radius: 6px;
        font-weight: bold;
        transition: 0.3s;
        border: 5px solid #F1C40F;
        cursor: pointer;
        /* box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; */
    }

    .radio-toolbar label:hover {
      /* background-color: #dfd; */
      /* font-weight: bold; */
    }

    .radio-toolbar input[type="radio"]:focus + label {
        /* border: 5px dashed rgb(255, 255, 255); */
    }

    .radio-toolbar input[type="radio"]:checked + label {
        background-color: #F1C40F;
        padding: 8px 16px;
        box-shadow: rgb(255, 236, 64) 0px 7px 15px 0px;
        /* border-color: #4c4; */
        color: white;
        font-weight: bold;
        border: 0;
        /* transform: scale(1.10); */
    }
    .manage-soal{
      float: right;
    }

    .area-answer{
      max-height: 250px;
      max-width: 250px;
    }

    .soal-link-area a{
      margin-top: 20px;
    }

    .soal-link .active{
      background-color: black;
      color: white;
    }

    .soal-link .now{
      color: white;
    }

    .soal-link .active button{
      color: white;
    }

    .correct{
      background-color: green;
      font-weight: bold;
      color: white;
      border-radius: 5px;
      box-shadow: rgb(191, 255, 191) 0px 7px 29px 0px;
    }

    .soal-img-area{
      max-width: 200px;
      max-height: 200px;
      overflow: hidden;
    }

    .soal-img-area img{
      width: 100%;
      height: 100%;
    }

    .bg-now{
      background-color: rgba(251, 255, 190, 0.996);
    }

</style>
<div class="container">

    <div class="py-2 mb-2">
        {{-- <a class="fw-bold" href="/kelas/materi/{{$mapel->id}}/{{\Carbon\Carbon::now()->format('m')}}"><i class="fas fa-angle-double-left"></i> KEMBALI KE KELAS</a> --}}
    </div>
    <div class="d-flex justify-content-start">
        <img class="" src="{{asset('icon/verified.png')}}" width="40px" alt="">&nbsp;&nbsp;
        <h1 class="fw-bold tx-main">{{$quiz->nama}}</h1>
    </div>
    <br>

    <div class="row">


      <div class="col-md-4">
        <div class="p-4 bg-white shadow rounded">
            <div>
                <h5>Pilih Soal</h5>
                <hr>
            </div>
            
            @php
              $fill = 0;
            if($jawabanku != null){
              if($jawabanku->count() != $listSoal->count()){
                $fill += 1;
              }
            }else{
              $fill += 1;
            }
            @endphp
            <div class="row">
              
              @foreach ($listSoal as $s)
              <div class="col-md-1 col-sm-1 px-4">
                <form id="form" action="/kelas/materi/forum/quiz/question/{{$soal->id}}/next" method="post" class="">
                @csrf
                <input type="hidden" name="quiz" value="{{$quiz->id}}">
                <div class="bg-transparent border border-none fw-bold soal-link">
                <div class="soal-link-area text-center border border-2 border-dark rounded
                  @if (session()->get('nomor') == $loop->iteration)
                    bg-now
                  @endif
                  @foreach ($jawabanku2 as $q)
                    @if($q->soal_id == $s->id)
                      active
                    @endif 
                  @endforeach"
                style="width: 40px; height: 40px;">
                  <input name="number" value="{{$loop->iteration}}" type="hidden">
                  <button name="next" value="{{$s->id}}" class="fw-bold border border-0 py-2 bg-transparent w-0">{{$loop->iteration}} </button>
                </div>

                </div>
                </form>
              </div>
             
              @endforeach
            @php
              $last = $listSoal->last();
              $submit = 0;
            @endphp
             @if ($last->id == $soal->id)
              @php
                $submit = 1;
              @endphp
             @endif

            <div class="mt-3">

              @php 
                $disabled = 0;
                $endTime = \Carbon\Carbon::parse($quiz->deadline);
                $startTime = \Carbon\Carbon::now();
                $timeleft = $startTime->diffForHumans($endTime, true).' lagi';
              @endphp

            @if($startTime->isBefore($endTime))
            <b class="text-info"><i class="fas fa-bullhorn "></i> Waktu tersisa {{$timeleft}} </b>
            @else
            @php $disabled = 1; @endphp
            <b class="text-danger"><i class="fas fa-bullhorn "></i> Waktu telah habis </b><br>
            <small>Waktu pengerjaan soal telah berakhir dan kamu sudah tidak bisa memberikan jawaban, segera menuju soal terakhir dan kirim jawaban kamu</small>
            @endif
            <br><br>
            
            @if($submit == 1)
            <button class="container text-uppercase btn btn-success fw-bold"  data-bs-toggle="modal" data-bs-target="#answer">kirim jawaban</button>
            @endif

             {{--modal hapus--}}
             <div class="modal fade" id="answer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content modalhapus" style="background-color: white;">
                  <div class="modal-body">
                    <h1 class="text-center text-warning warning"><i class="fas fa-exclamation-triangle"></i></h1>
                    <h2 class="text-center"> Apakah kamu yakin? </h2>
                    <p class="text-center text-muted container"> Jawaban kamu akan dikirim dan tidak dapat diubah dan pastikan kamu telah menjawab seluruh soal terlebih dahulu</p>
                  </div>
                  <div class="modal-footer">
                    <form action="/kelas/materi/forum/quiz/question/{{$quiz->id}}/submit" method="post" class="">
                      @csrf
                      <input type="hidden" name="mapel" value="{{$quiz->mapel->id}}"> 
                      <input type="hidden" name="nilai" value=""> 
                      <input type="hidden" name="submit" value=""> 
                      <input type="hidden" name="quiz_id" value="{{$quiz->id}}"> 
                      <input type="hidden" name="user_id" value="{{Auth::user()->id}}"> 
                      <button class="btn btn-success" type="submit">Kirim jawaban saya</button>
                    </form> 
                  </div>
                </div>
              </div>
          </div>
          {{--modal hapus end--}}

          
          </div>
        </div>
    </div>

</div>

        <div class="col-md-8">
            <div class="container bg-white main-page p-4">
            <div class="">
               <div class="">
                <h4 class=" container fw-bold">SOAL {{Session::get('nomor')}} @if ($jawabanku != null && $jawabanku->soal_id == $soal->id) {{$jawabanku->status}}&nbsp;{{$jawabanku->skor}} @endif</h4>
                </div>
               <hr>
               <br>
               <div class="stylw" style="text-align:justify;">
                <form id="formJawab" action="/kelas/materi/forum/quiz/question/{{$soal->id}}" method="post" class="">
                 @csrf
                <div id="radio-toolbar" class="container">
                  @if ($soal->soalGambar)
                  <a href="{{asset("/storage/$soal->soalGambar")}}">
                    <div class="soal-img-area mb-3">
                      <img src="{{asset("/storage/$soal->soalGambar")}}" alt="" class="w-100">
                    </div>
                  </a>
                  @endif

                    <h5>{!!$soal->soal!!}</h5>
                    <div class="radio-toolbar mt-4">

                      <div class="d-flex form-check justify-content-start">
                        <input type="radio" id="opsi1" name="jawaban" value="a" @if ($jawabanku != null && $jawabanku->soal_id == $soal->id) @if($jawabanku->jawaban == 'a') checked @endif @endif @if($disabled > 0)disabled @endif>
                        <label for="opsi1">A</label>&nbsp;&nbsp;
                        <div class="p-3">
                          {!!$soal->opsi1!!}
                        </div>
                      </div><br>

                      <div class="d-flex form-check justify-content-start">
                        <input type="radio" id="opsi2" name="jawaban" value="b"  @if ($jawabanku != null && $jawabanku->soal_id == $soal->id) @if($jawabanku->jawaban == 'b') checked @endif @endif @if($disabled > 0)disabled @endif>
                        <label for="opsi2">B</label>&nbsp;&nbsp;
                        <div class="p-3">
                            {!!$soal->opsi2!!}
                        </div>
                      </div><br>

                      <div class="d-flex form-check justify-content-start">
                        <input type="radio" id="opsi3" name="jawaban" value="c"  @if ($jawabanku != null && $jawabanku->soal_id == $soal->id) @if($jawabanku->jawaban == 'c') checked @endif @endif @if($disabled > 0)disabled @endif>
                        <label for="opsi3">C</label>&nbsp;&nbsp;
                        <div class="p-3">
                            {!!$soal->opsi3!!}
                        </div>
                      </div><br>
                      <div class="d-flex form-check justify-content-start">
                        <input type="radio" id="opsi4" name="jawaban" value="d"  @if ($jawabanku != null && $jawabanku->soal_id == $soal->id) @if($jawabanku->jawaban == 'd') checked @endif @endif @if($disabled > 0)disabled @endif>
                        <label for="opsi4">D</label>&nbsp;&nbsp;
                        <div class="p-3">
                            {!!$soal->opsi4!!}
                        </div>
                      {{-- </div>{{$soal->quiz->id}} --}}
                      @if ($jawabanku != null && $jawabanku->soal_id == $soal->id)
                        <input type="hidden" value="{{$jawabanku->jawaban}}" name="hasil_jawaban">
                      @endif
                      <input type="hidden" value="" name="skor">
                      <input type="hidden" value="{{$soal->jawaban}}" name="status">
                      <input type="hidden" name="key" value="{{$soal->jawaban}}">
                      <input type="hidden" value="{{$soal->id}}" name="soal_id">
                      <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                      <input type="hidden" name="quiz" value="{{$soal->quiz->id}}">

                    </form>
                    </div>
                </div>
                <div>
                  <div class="container mt-4">
                    <b>Jawaban : {{$soal->jawaban}}&nbsp;</b>
                    <div class="">
                      @if($soal->jawaban == 'a')
                        {!!$soal->opsi1!!}
                      @elseif($soal->jawaban == 'b')
                        {!!$soal->opsi2!!}
                      @elseif($soal->jawaban == 'c')
                        {!!$soal->opsi3!!}
                      @elseif($soal->jawaban == 'd')
                        {!!$soal->opsi4!!}
                      @endif
                    </div>
                  </div>
                  <div class="container mt-4">
                    <b>Pembahasan : </b>
                    <div>
                      {!!$soal->pembahasan!!}
                    </div>

                    @if ($soal->jawabanGambar)
                    <a href="{{asset("/storage/$soal->jawabanGambar")}}">
                      <div class="soal-img-area mt-3">
                        <img src="{{asset("/storage/$soal->jawabanGambar")}}" alt="" class="w-100">
                      </div>
                    </a>
                    @endif

                  </div>
                </div>
               </div>
           
               <br>
                </div>
                <br><br>
            </div>
        
            <br><br>
         
        </div>
  

</div>
</div>
@include('quiz/function/radio-select')
@endsection