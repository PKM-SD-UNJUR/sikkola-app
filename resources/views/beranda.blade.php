@extends('template.main')

@section('container')
<div class="container">
    <div class="row container">

      @foreach ($kelas as $k)
      <div class="col-md-6 main-kelas-area">
      <div class="list-card-kelas mb-3" style="max-width: 540px;">
        <div class="row ">
          <div class="col-md-4">
            <center>
              <div class="img-beranda-area">
                <img src="kelas/{{$k->gambar}}" class="img-fluid rounded-start" alt="...">
              </div>
          </center>
          </div>
          <div class="col-md-8">
            <div class="card-body p-2 ">
              <h4 class="fw-bold tx-main">{{$k->nama}}</h4>
              <p class="t">{{$k->deskripsi}}</p>
              <div class="">
                <a class="tx-info fw-bold" href="/kelas/{{$k->id}}">masuk kelas <i class="fas fa-sign-in-alt"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  
    </div><br>

    </div><br>
  </div>
  </div>
  </div>
  <br><br><br><br>
  @endsection