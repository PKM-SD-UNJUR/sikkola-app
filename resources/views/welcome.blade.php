@extends('template.main')

@section('container')
<div class="container">
    <div class="row container">
      <div class="col-md-6">
      <div class="list-card-kelas mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <center>
            <img src="{{asset('gambar/kelas1.png')}}" class="img-fluid rounded-start" alt="...">
          </center>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Kelas 1</h5>
              <p class="card-text fw-bold" style="color:#7B241C;">Klik tombol untuk memasuki kelas</p>
              {{-- <a href="{{ route('kelas1') }}" class="btn btn-danger rounded-pill"><i class="far fa-play-circle"></i> Masuk kelas</a> --}}
              <a href="/kelas">masuk kelas</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="list-card-kelas mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <center>
            <img src="{{asset('gambar/kelas2.png')}}" class="img-fluid rounded-start" alt="...">
            </center>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Kelas 2</h5>
              <p class="card-text fw-bolder" style="color: #154360;">Klik tombol untuk memasuki kelas</p>
              {{-- <a href="{{ route('kelas2') }}" class="btn btn-primary rounded-pill"><i class="far fa-play-circle"></i> Masuk kelas</a> --}}
            </div>
          </div>
        </div>
      </div>
    </div> 
    </div><br>

    
  <div class="container">
    <div class="row container">
      <div class="col-md-6">
      <div class="list-card-kelas mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <center>
            <img src="{{asset('gambar/kelas6.png')}}" class="img-fluid rounded-start" alt="...">
          </center>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Kelas 3</h5>
              <p class="card-text fw-bold">Klik tombol untuk memasuki kelas</p>
              {{-- <a href="{{ route('kelas3') }}" class="btn btn-success rounded-pill"><i class="far fa-play-circle"></i> Masuk kelas</a> --}}
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="list-card-kelas mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <center>
            <img src="{{asset('gambar/kelas4.png')}}" class="img-fluid rounded-start" alt="...">
          </center>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Kelas 4</h5>
              <p class="card-text fw-bold" style="color: #424949;">Klik tombol untuk memasuki kelas</p>
              {{-- <a href="{{ route('kelas4') }}" class="btn btn-secondary rounded-pill"><i class="far fa-play-circle"></i> Masuk kelas</a> --}}
            </div>
          </div>
        </div>
      </div>
    </div> 
    </div><br>

    
  <div class="container">
    <div class="row container">
      <div class="col-md-6">
      <div class="list-card-kelas mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <center>
            <img src="{{asset('gambar/kelas5.png')}}" class="img-fluid rounded-start" alt="...">
          </center>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Kelas 5</h5>
              <p class="card-text fw-bolder" style="color: #7D6608;">Klik tombol untuk memasuki kelas</p>
              {{-- <a href="{{ route('kelas5') }}" class="btn btn-warning rounded-pill"><i class="far fa-play-circle"></i> Masuk kelas</a> --}}
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="list-card-kelas mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <center>
            <img src="{{asset('gambar/kelas3.png')}}" class="img-fluid rounded-start" alt="...">
          </center>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Kelas 6</h5>
              <p class="card-text fw-bolder" style="color: white;">Klik tombol untuk memasuki kelas</p>
              {{-- <a href="{{ route('kelas6') }}" class="btn btn-dark rounded-pill"><i class="far fa-play-circle"></i> Masuk kelas</a> --}}
            </div>
          </div>
        </div>
      </div>
    </div> 
    </div><br>
  </div>
  </div>
  </div>
  @endsection