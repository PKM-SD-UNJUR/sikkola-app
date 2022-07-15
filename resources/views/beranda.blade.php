@extends('template.main')

@section('container')
<div class="container">
  <div class="row container">


    @if(Auth::user()->role == 'siswa')
    @foreach ($kelas->where('id',Auth::user()->kelas_id) as $k)

    <h2>Hai, Selamat Datang, {{Auth::user()->name}}</h2>
    <h5>Silakan masuk ke kelas...</h5>

      <div class="mt-4 main-kelas-area mt-5">
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
  </div>
    @endforeach
    @endif

    @if(Auth::user()->role == 'guru')
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
    @endif


  </div><br>

</div><br>
</div>
</div>
</div>
@endsection