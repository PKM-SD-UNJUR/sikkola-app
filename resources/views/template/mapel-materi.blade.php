<div class="container mapelcaption text-center card-kelas" style="width: 80%; padding: 30px; border-radius: 5px; background-image: url('{{ asset('gambar/chalkboard.jpg') }}');" >
    <h2>{{$mapel->kelas->nama}}</h2>
    <h1>{{$mapel->nama}}</h1>
  <style>
  #clock {
      text-align: center;
  }
  </style>
  <div id="clock" class="mb-1"><h5>8:10:45</h5></div>
  <script>
  setInterval(showTime, 1000);
  function showTime() {
      let time = new Date();
      let hour = time.getHours();
      let min = time.getMinutes();
      let sec = time.getSeconds();
      am_pm = "AM";
  
      if (hour > 12) {
          hour -= 12;
          am_pm = "PM";
      }
      if (hour == 0) {
          hr = 12;
          am_pm = "AM";
      }
  
      hour = hour < 10 ? "0" + hour : hour;
      min = min < 10 ? "0" + min : min;
      sec = sec < 10 ? "0" + sec : sec;
  
      let currentTime = hour + ":" 
          + min + ":" + sec + am_pm;
  
      document.getElementById("clock")
          .innerHTML = currentTime;
  }
  
  showTime();
  </script>
  <div class="container">
  {{-- <a class="btn btn-sm btnkelas bg-transparent text-light" href="{{ route('kelas1') }}"><- Kembali</a> --}}
  {{-- @if (auth()->user()->level=="guru") --}}
  <a href="/kelas/{{$mapel->id}}/" class="btn btn-sm btnkelas bg-transparent text-light">kembali</a>
  <a class="btn btn-sm btnkelas bg-transparent text-light" href="/kelas/materi/{{$mapel->id}}/create">+ Tambah Materi</a>
  {{-- @endif --}}
  <button class="btn btn-sm btnkelas bg-transparent text-light" data-bs-toggle="modal" data-bs-target="#exampleModal">? Cari Materi</button>
  {{-- Modal pencarian --}}
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content modalbl">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel"><i class="fas fa-search"></i> Cari Materi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="">
          <div>
            <input type="text" class="form-control" placeholder="Cari materi disini.." name="keyword"><br>
            <button class="btn btn-secondary"><i class="fas fa-search"></i> Cari</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>