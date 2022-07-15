<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sikkola</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script>
    Dropzone.options.fileuploaded = {
      maxFileSize: 1
    }
  </script>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;800&display=swap');

    body {
      background-color: #f4f9fc;
      font-family: 'Nunito', sans-serif;
    }

    @font-face {
      font-family: fontgua;
      src: url('font/School Book New.ttf');
    }

    .img-beranda-area {
      width: 150px;
      height: 150px;
    }

    .navbar-brand h5 {
      font-family: fontgua;
    }

    .navbar {
      box-shadow: rgba(132, 190, 248, 0.2) 0px 8px 24px;
      font-weight: bold;
    }

    option {
      font-weight: bolder;
    }

    select {
      font-weight: bolder;
    }

    .card-title {
      font-family: fontgua;
      color: white;
    }

    .list-card-kelas {
      background-color: white;
      box-shadow: rgba(163, 210, 254, 0.2) 0px 8px 24px;
      padding: 10px;
      border-radius: 10px;
      background-image: #F1948A;
      transition: 0.3s ease;
      border-radius: 2px solid #3498DB;
    }



    .border-chalk {
      border: 10px solid #AF601A;
    }

    .card-kelas {
      border: 10px solid #AF601A;
      width: max-content;
      color: white;
      background-color: rgb(4, 71, 24);
    }


    .footer {
      font-family: fontgua;
    }

    .bg {
      background: linear-gradient(to bottom right, #0098fd 0%, #3fb2ff 100%);
    }

    a {
      cursor: pointer;
    }

    .d-flex {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .d-flex a {
      text-decoration: none;
    }

    a {
      text-decoration: none;
    }

    .tx-main {
      color: #1A5276;
    }

    .tx-info {
      color: #3498DB;
    }

    .tx-main {
      color: #1A5276;
    }

    .tx-main {
      color: #1A5276;
    }

    .btn-back {
      border: 2px solid white;
      padding: 5px;
      color: white;
      border-radius: 5px;
      font-size: 10px;
      transition: 0.3s;
    }

    .btn-back:hover {
      background-color: white;
      color: black;
    }

    .img-mapel-area {
      height: 100px;
    }

    .img-mapel-area img {
      max-height: 100px;
    }

    .materi-link {
      transition: 0.3s;
    }

    .materi-link:hover {
      letter-spacing: 3px;
    }

    .formtambah {
      box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    }

    .ck-editor__editable {
      min-height: 200px;
    }

    .img-materi-card {
      width: 100%;
    }

    .line-materi-card {
      margin: auto;
      border-right: 8px solid black;
      border-left: 0;
      border-color: rgba(255, 234, 130, 0.759);
      border-style: dashed;
      height: 80%;
      width: 0px;
    }

    .line-latihan-card {
      margin: auto;
      border-right: 8px solid black;
      border-left: 0;
      border-color: rgba(248, 228, 200, 1);
      border-style: dashed;
      height: 80%;
      width: 0px;
    }

    .line-tugas-card {
      margin: auto;
      border-right: 8px solid black;
      border-left: 0;
      border-color: rgba(96, 192, 231, 0.6);
      border-style: dashed;
      height: 80%;
      width: 0px;
    }

    .card-materi-desc {
      border-radius: 20px;
      box-shadow: rgba(17, 17, 26, 0.1) 0px 0px 16px;
    }

    .menu-materi-card {
      box-shadow: rgba(17, 17, 26, 0.1) 0px 0px 16px;
      border-radius: 10px;
      width: max-content;
    }

    .pin-icon {
      max-width: 30px;
      position: absolute;
      margin-left: 6%;
      margin-top: 70px;
    }

    .calender-block {
      position: absolute;
      margin-left: 20px;
      margin-top: -14px;
    }

    .cal-title {
      width: 100px;
    }

    @media only screen and (max-width: 800px) {
      .img-mapel-area {
        height: 150px;
      }

      .img-mapel-area img {
        height: 100%;
      }

      .line-materi-card {
        display: none;
      }

      .menu-materi-card {
        display: inline;
        margin-right: 10px;
        font-size: 12px;
        margin-top: 10px;
        float: right;
      }

      .pin-icon {
        display: none;
      }

      .calender-block button {
        display: none;
      }

      .calendar h1 {
        font-size: 15px;
      }
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
      <a class="navbar-brand d-flex text-light" href="/"><img src="{{asset('gambar/logo.jpg')}}" width="180" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>

      @if(Auth::user()->role == 'guru')
      <a class="btn btn-info ms-auto mx-5 text-light fw-bold" href="/dashboard"><i class="fas fa-chalkboard-teacher"></i> Lihat Halaman Guru</a>
      @endif

      <div class="dropdown mr-5">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-user"></i>&nbsp; {{ Auth::user()->name }} &nbsp;&nbsp;
        </button>
        <ul class="dropdown-menu  mt-2" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="{{ route('profil') }}"><i class="fas fa-address-card"></i>&nbsp;Profil</a></li>
          <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>&nbsp;Keluar</a></li>
        </ul>
      </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
    </form>

  </nav>

  <br><br>


  @yield('container')
  </div>

  <br><br>
  
  {{-- <footer class="fixed-bottom mt-3 d-none">
  <br><br>
  <footer class="fixed-bottom mt-3">
    <div class="bg p-1 py-1">
      <div class="d-flex mt-1">
        <a class="footer d-flex link-light" href="#"><img src="{{asset('gambar/logo2.png')}}" width="50" alt=""></a>&nbsp;&nbsp;&nbsp;

        <p class="text-center text-light mt-1">Copyright © <?= date("Y"); ?> | Program Pengabdian Masyarakat <a class="" href="https://www.del.ac.id/" style="color: yellow">Institut Teknologi Del</a></p>&nbsp;&nbsp;&nbsp;
        <a href="https://www.del.ac.id/"><img class="" style="width: 48px;" src="{{asset('gambar/itdel.png')}}" alt=""></a>
      </div>
    </footer>
  
      <br><br> --}}

      <br><br>
        <footer class=" mt-4">
          <div class="bg p-1 py-3">
              <div class="d-flex mt-2">
                <a href="https://www.del.ac.id/"><img class="" style="width: 48px;" src="{{asset('gambar/itdel.png')}}" alt=""></a>&nbsp;&nbsp;&nbsp;
                <a class="footer d-flex link-light" href="#"><img src="{{asset('gambar/logo2.png')}}" width="50" alt=""></a>
              </div>
            <p class="text-center text-light mt-1">Copyright &copy;2021 | Program Pengabdian Masyarakat <a class="" href="https://www.del.ac.id/" style="color: yellow">Institut Teknologi Del</a></p>
          </div>
        </footer>

    @include('sweetalert::alert')
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
      <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
      <script data-require="jquery@2.1.3" data-semver="2.1.3" src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script>
        ClassicEditor
          .create(document.querySelector('#editor'))
          .catch(error => {
            console.error(error);
          });

        $(document).ready(function() {
          $("body").tooltip({
            selector: '[data-toggle=tooltip]'
          });
        });
      </script>
</body>

</html>