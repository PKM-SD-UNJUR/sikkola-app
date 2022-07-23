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

    .soal-link a{
      color: black;
    }

    .soal-link .active a{
      color: white;
    }

    .correct{
      background-color: green;
      font-weight: bold;
      color: white;
      border-radius: 5px;
      box-shadow: rgb(191, 255, 191) 0px 7px 29px 0px;
    }
    
    .wrong{
      background-color: rgba(227, 0, 0, 0.885);
      font-weight: bold;
      color: white;
      border-radius: 5px;
      box-shadow: rgb(255, 191, 191) 0px 7px 29px 0px;
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

    .soal-link-group{
      position: fixed;
      left: 0;
      width: 30%;
      padding-right: 10px;
    }

    .select{
        background-color: #F1C40F;
        padding: 8px 16px;
        box-shadow: rgb(255, 236, 64) 0px 7px 15px 0px;
        /* border-color: #4c4; */
        color: white;
        font-weight: bold;
        border: 0;
    }

    .link-question-area{
        max-height: 250px;
        overflow-y: auto;
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
        <div class="py-2 bg-white shadow rounded soal-link-group">
            <div class="container">
                <h6 class="container text-uppercase">pilih soal:</h6>
                <hr>
            </div>
            
            @php
            $fill = 0;
            @endphp
            <div class="row container link-question-area">
              
              @foreach ($listSoal as $s)
              <div class="col-md-1 col-sm-1 mb-1 px-4">
                <input type="hidden" name="quiz" value="{{$quiz->id}}">
                <div class="bg-transparent border border-none fw-bold soal-link">
                <div class="soal-link-area text-center border border-2 border-dark rounded
                 @if ($s->jawabanQuiz != null)
                  @foreach ($s->jawabanQuiz as $jwb)
                    @if($jwb->user_id == Auth::user()->id)
                    @if ($jwb->jawaban != "")
                      active
                    @else
                    @endif 
                    @endif 
                  @endforeach
                 @endif"  
                 style="width: 40px; height: 40px;">
                  <a href="#soal{{$s->id}}" class="fw-bold border border-0 mt-3 bg-transparent w-0">
                    <div class="py-2">{{$loop->iteration}}</div>
                   </a>
                </div>

                </div>
              </div>
              @if ($s->jawabanQuiz == null)
              @php
                $fill += 1;
              @endphp
             @endif
             {{-- {{$s->jawabanQuiz->jawaban}} --}}
              @endforeach
            @php
              $last = $listSoal->last();
              $submit = 0;
            @endphp
             @if ($last->id == $s->id)
              @php
                $submit = 1;
              @endphp
             @endif

            <div class="mt-3">
            <br><br>
            
            @if($submit == 1)
            <a href="/kelas/materi/forum/mapel/{{$quiz->mapel->id}}/quiz/{{$quiz->id}}" class="container text-uppercase btn btn-dark fw-bold"><i class="fas fa-angle-double-left"></i> kembali ke quiz</a>
            @endif
          </div>
        </div>
    </div>

</div>

        <div class="col-md-8">
          @php
            $answer = 'x';
            $nilai = '';
          @endphp
          @foreach ($listSoal as $soal)

            @foreach ($jawabanku as $ma)
            @if ($ma->soal_id == $soal->id && $ma->user_id == Auth::user()->id)
              @if ($ma->jawaban != null)
              @php
               $answer = $ma->jawaban;
               $nilai = $ma->skor;
              @endphp
              @else
              @php
                $answer = '';
              @endphp
              @endif
            @endif
            @endforeach
            {{-- {{$answer}} --}}

            <div id="soal{{$soal->id}}" class="container bg-white main-page p-4">
            <div class="">
               <div class="d-flex">
                <h4 class=" container fw-bold">SOAL {{$loop->iteration}} 
                </h4>
                <div class="ms-auto">
                  @if ($soal->jawabanQuiz != null)
                  <small class="fw-bold text-secondary">skor :
                    @if ($soal->jawabanQuiz !== '')
                    @foreach ($soal->jawabanQuiz as $jwb)
                      @if($jwb->user_id == Auth::user()->id && $soal->id == $jwb->soal_id)
                      @if ($jwb->status != null)
                        @if ($jwb->jawaban == $soal->jawaban)
                        {{number_format(floatval($jwb->skor),2)}}
                        @else
                        {{number_format(floatval($jwb->skor),2)}}
                        @endif 
                      @else
                      0
                      @endif
                      @endif 
                    @endforeach
                    @else
                    @endif 
                  
                  </small>
                  @else
                  @php
                    $answer = '';
                  @endphp
                  <i class="fs-italic fw-bold text-secondary">Tidak terjawab</i>
                  @endif
                  {{-- @if ($soal->jawabanQuiz != null)
                  {{$soal->jawabanku->jawaban}}
                  @endif --}}
                </div>
               </div>
               <hr>
               <br>
               <div class="stylw" style="text-align:justify;">
                <section >
                <div id="radio-toolbar" class="container">
                  @if ($soal->soalGambar != null)
                    <a href="{{asset("/storage/$soal->soalGambar")}}">
                      <div class="soal-img-area mb-3">
                        <img src="{{asset("/storage/$soal->soalGambar")}}" alt="" class="w-100">
                      </div>
                    </a>
                    @endif
                    <h5>{!!$soal->soal!!}</h5>
                    @foreach ($soal->jawabanQuiz as $s)
                    @if ($s->quiz_id == $soal->quiz_id  && $s->user_id == Auth::user()->id) 
                      {{-- @if ($s->jawaban != $soal->jawaban)
                        {{$s->jawaban}}
                      @endif --}}
                    @endif
                    @endforeach
                    <div class="radio-toolbar mt-4">

                      <div class="d-flex form-check justify-content-start
                          @if ($soal->jawaban == "a")
                              correct
                          @endif
                          @if ($soal->jawabanQuiz != null)
                          @foreach ($soal->jawabanQuiz as $jwb)
                            @if($jwb->user_id == Auth::user()->id)
                            @if ($jwb->jawaban == "a")
                            @if ($jwb->jawaban == $soal->jawaban)
                                correct
                            @else
                                wrong
                            @endif 
                            @endif
                            @endif 
                          @endforeach
                          @endif 
                       ">
                        <input class="form-check-input select" type="radio" id="opsi1" name="jawaban" value="a" disabled >
                        <label =
                        @if ($soal->jawabanQuiz != null)
                        @foreach ($soal->jawabanQuiz as $jwb)
                          @if($jwb->user_id == Auth::user()->id)
                          @if ($jwb->jawaban == "a")
                           class="select"
                          @endif 
                          @endif 
                        @endforeach
                        @endif 
                        for="opsi1">A</label>&nbsp;&nbsp;
                        <div class="p-3">
                          {!!$soal->opsi1!!}
                        </div>
                      </div><br>

                      <div class="d-flex form-check justify-content-start
                        @if ($soal->jawaban == "b")
                            correct
                        @endif
                        @if ($soal->jawabanQuiz != null)
                        @foreach ($soal->jawabanQuiz as $jwb)
                          @if($jwb->user_id == Auth::user()->id)
                          @if ($jwb->jawaban == "b")
                          @if ($jwb->jawaban == $soal->jawaban)
                              correct
                          @else
                              wrong
                          @endif 
                          @endif
                          @endif 
                        @endforeach
                        @endif 
                       ">
                        <input type="radio" id="opsi2" name="jawaban" value="b" disabled >
                        <label
                        @if ($soal->jawabanQuiz != null)
                        @foreach ($soal->jawabanQuiz as $jwb)
                          @if($jwb->user_id == Auth::user()->id)
                          @if ($jwb->jawaban == "b")
                           class="select"
                          @endif 
                          @endif 
                        @endforeach
                        @endif 
                        for="opsi2">B</label>&nbsp;&nbsp;
                        <div class="p-3">
                            {!!$soal->opsi2!!}
                        </div>
                      </div><br>

                      <div class="d-flex form-check justify-content-start
                      @if ($soal->jawaban == "c")
                          correct
                      @endif
                      @if ($soal->jawabanQuiz != null)
                      @foreach ($soal->jawabanQuiz as $jwb)
                        @if($jwb->user_id == Auth::user()->id)
                        @if ($jwb->jawaban == "c")
                        @if ($jwb->jawaban == $soal->jawaban)
                            correct
                        @else
                            wrong
                        @endif 
                        @endif
                        @endif 
                      @endforeach
                      @endif 
                       ">
                        <input type="radio" id="opsi3" name="jawaban" value="c" disabled >
                        <label
                        @if ($soal->jawabanQuiz != null)
                        @foreach ($soal->jawabanQuiz as $jwb)
                          @if($jwb->user_id == Auth::user()->id)
                          @if ($jwb->jawaban == "c")
                           class="select"
                          @endif 
                          @endif 
                        @endforeach
                        @endif 
                        for="opsi3">C</label>&nbsp;&nbsp;
                        <div class="p-3">
                            {!!$soal->opsi3!!}
                        </div>
                      </div><br>
                      <div class="d-flex form-check justify-content-start 
                      @if ($soal->jawaban == "d")
                          correct
                      @endif
                      @if ($soal->jawabanQuiz != null)
                          @foreach ($soal->jawabanQuiz as $jwb)
                            @if($jwb->user_id == Auth::user()->id)
                            @if ($jwb->jawaban == "d")
                            @if ($jwb->jawaban == $soal->jawaban)
                                correct
                            @else
                                wrong
                            @endif 
                            @endif
                            @endif 
                          @endforeach
                          @endif 
                      ">
                        <input type="radio" id="opsi4" name="jawaban" value="d" disabled >
                        <label
                        @if ($soal->jawabanQuiz != null)
                        @foreach ($soal->jawabanQuiz as $jwb)
                          @if($jwb->user_id == Auth::user()->id)
                          @if ($jwb->jawaban == "d")
                           class="select"
                          @endif 
                          @endif 
                        @endforeach
                        @endif 
                        for="opsi4">D</label>&nbsp;&nbsp;
                        <div class="p-3">
                            {!!$soal->opsi4!!}
                        </div>
                      </div>
                      
                      <input type="hidden" value="" name="skor">
                      <input type="hidden" value="" name="status">
                      <input type="hidden" value="{{$soal->id}}" name="soal_id">
                      <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                      <input type="hidden" name="quiz" value="{{$quiz->id}}">

                    </form>
                    </div>
                </div>
                <div>
                  <div class="container mt-4">
                    {{-- @if ($s->jawabanQuiz != null)
                  @foreach ($s->jawabanQuiz as $jwb)
                    @if($jwb->user_id == Auth::user()->id)
                    @if ($jwb->jawaban != "")
                      active
                    @else
                    @endif 
                    @endif 
                  @endforeach
                  @endif"   --}}
                  @if ($s->jawabanQuiz != null)
                  @foreach ($s->jawabanQuiz as $jwb)
                    @if($jwb->user_id == Auth::user()->id)
                    @if ($jwb->jawaban != "")
                      active
                    @else
                    @endif 
                    @endif 
                  @endforeach
                 @endif

                 {{-- @if ($soal->jawabanQuiz != null)
                 @foreach ($soal->jawabanQuiz as $jwb)
                   @if($jwb->user_id == Auth::user()->id)
                   @if ($jwb->jawaban == $soal->jawaban)
                   <b class="text-success text-uppercase fw-bold">
                    <i class="fas fa-check"></i> jawaban kamu benar
                  </b><br>
                   @else
                   <b class="text-danger text-uppercase fw-bold">
                    <i class="fas fa-times"></i> jawaban kamu salah
                  </b><br>
                   @endif 
                   @else
                   @endif 
                 @endforeach
                 @endif  --}}

                 @if ($soal->jawabanQuiz != null)
                 @foreach ($soal->jawabanQuiz as $jwb)
                   @if($jwb->user_id == Auth::user()->id)
                   @if ($jwb->jawaban != "")
                   @if ($soal->jawaban == $jwb->jawaban)
                    <b class="text-success text-uppercase fw-bold"> 
                      Jawaban kamu benar
                    </b><br>
                   @else
                   <b class="text-danger text-uppercase fw-bold">
                     <i class="fas fa-times"></i> jawaban kamu salah
                   </b><br>
                   @endif
                   @else
                   <b class="text-success text-uppercase fw-bold"> 
                    Jawaban kamu benar
                  </b><br>
                   @endif 
                   @endif 
                 @endforeach
                @endif

                  {{-- @if ($answer != null)
                    @if ($soal->jawaban == $answer)
                    <b class="text-success text-uppercase fw-bold">
                     
                    </b><br>
                    @else
                    <b class="text-danger text-uppercase fw-bold">
                      <i class="fas fa-times"></i> jawaban kamu salah
                    </b><br>
                    @endif
                    @else
                    <b class="text-danger text-uppercase fw-bold">
                      
                    </b><br>
                    @endif --}}


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
                    @if ($soal->jawabanGambar != null)
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
            
        @endforeach
         
        </div>
  

</div>
@include('quiz/function/radio-select')
@endsection