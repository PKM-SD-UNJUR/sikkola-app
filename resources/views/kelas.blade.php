    @extends('template.main')

    @section('container')

    <div class="container card-kelas p-3 px-5"">
              <h2 class=" kelas text-center">{{$kelas->nama}}</h2>
      <br>
      <div class="text-center">
        <a class="btn-back" href="/">Kembali</a>
      </div>
    </div>
    <br><br>

        <div class="container">
        <div class="row container">
          @if ($mapel->count() > 0)
          @foreach ($mapel as $m)
          <div class="col-md-5 container">
            <div class="card py-2 container card-mapel col-mb-4 mt-4" {{--style="max-width: 400px;"--}}>
              <div class="row">
                <div class="col-md-4">
                  <div class="text-center img-mapel-area">
                    <img src="../mapel/{{$m->gambar}}" class="img-fluid rounded-start mt-4" alt="...">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="fw-bold" style="color: #2874A6 ;"><i class="fas fa-book-reader"></i>&nbsp; {{$m->nama}}</h5>
                    <small class="text-muted caption" style="margin-top: -5px;">{{$m->deskripsi}}
                    </small><br><br>
                    <a href="/kelas/materi/{{$m->id}}/{{\Carbon\Carbon::now()->format('m')}}" style="color: #EC7063;" class="materi-link fw-bold">Lihat Materi <i class="fas fa-hand-point-right"></i></a>
                    {{-- <a href="/detail">lihat pelajaran</a> --}}
                  </div>
                </div>
              </div>
              </div>
          </div>
          {{-- <div class="col-md-5">mantap</div> --}}
          @endforeach
          @endif
        </div>
      </div>
  
  

    @endsection