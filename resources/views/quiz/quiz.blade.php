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
</style>
<div class="container">
    <div class="py-2 mb-2">
        <a class="fw-bold" href="/kelas/materi/{{$mapel->id}}/{{\Carbon\Carbon::now()->format('m')}}"><i class="fas fa-angle-double-left"></i> KEMBALI KE KELAS</a>
    </div>
    <div>
        <h5 class="fw-bold">&#129303; Selamat datang di quiz kelas {{$mapel->kelas->nama}}</h5>
        <small>Ayo uji pemahanmu dengan mengerjakan quiz yang diberikan oleh guru</small>
    </div>
    <br>
    <div class="container bg-white main-page p-5">
        <div class="d-flex w-100 justify-content-start container">
            <div class="d-flex">
               <div class=" icon-title">
                <img class="w-100" src="{{asset('icon/test.png')}}" alt="">
               </div>
               <div class=" p-2">
                <h1 class="fw-bold mt-2">Quiz</h1>
               </div>
            </div>
            @if(Auth::user()->role == 'guru')
            <div class="ms-auto">
                <a href="/kelas/materi/forum/mapel/{{$mapel->id}}/quiz/create" class="btn btn-dark fw-bold text-uppercase"> + tambah quiz</a>
            </div>
            @endif
        </div>
        <hr>
        <br>

        <div class="container">

            @foreach ($quiz as $q)
            <div class="row container">
                <div class="col-md-1 col-sm-2">
                    <div class="container d-flex justify-content-end">
                        <img class="" src="{{asset('icon/verified.png')}}" width="30px" alt="">
                    </div>
                </div>
                <div class="col-md-11 col-sm-10">
                    <h4 class="fw-bold text-success">  <a href="/kelas/materi/forum/mapel/{{$mapel->id}}/quiz/{{$q->id}}" class="tx-main">{{$q->nama}}</a></h4>
                    <b> &#128198; {{\Carbon\Carbon::parse($q->deadline)->format('d F Y')}}</b>&nbsp;<b>&#128336; {{\Carbon\Carbon::parse($q->deadline)->format('h:m')}} WIB</b>
                </div>
            </div><br><br>
            @endforeach

        </div>
    </div>
</div>

@endsection