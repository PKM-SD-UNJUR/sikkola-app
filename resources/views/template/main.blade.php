<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <x-embed-styles />
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;800&display=swap');
        body{
          background-color: #f4f9fc;
          font-family: 'Nunito', sans-serif;
        }
         @font-face {
              font-family: fontgua;
              src: url('font/School Book New.ttf');
          }
          .img-beranda-area{
            width: 150px;
            height: 150px;
          }
          .navbar-brand h5{
            font-family: fontgua;
          }
          .navbar{
            box-shadow: rgba(132, 190, 248, 0.2) 0px 8px 24px;
              font-weight: bold;
          }
          option{
            font-weight: bolder; 
          }
          select{
            font-weight: bolder;
          }
          .card-title{
            font-family: fontgua;
            color: white;
          }
          .list-card-kelas{
            background-color: white;
            box-shadow: rgba(163, 210, 254, 0.2) 0px 8px 24px;
            padding: 10px;
            border-radius: 10px;
            background-image: #F1948A;
            transition: 0.3s ease; 
            border-radius: 2px solid #3498DB;
          }



          .border-chalk{
            border: 10px solid #AF601A;
          }

          .card-kelas{
            border: 10px solid #AF601A;
            width: max-content;
            color: white;
            background-color:rgb(4, 71, 24);
          }
          
          
        .footer{
          font-family: fontgua;
        }
        .bg{
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

        a{
          text-decoration: none;
        }

        .tx-main{
          color: #1A5276;
        }
        .tx-info{
          color: #3498DB;
        }
        .tx-main{
          color: #1A5276;
        }
        .tx-main{
          color: #1A5276;
        }

        .btn-back{
          border: 2px solid white;
          padding: 5px;
          color: white;
          border-radius: 5px;
          font-size: 10px;
          transition: 0.3s;
        }

        .btn-back:hover{
         background-color: white;
         color: black;
        }

        .img-mapel-area{
            height: 100px;
          }
          .img-mapel-area img{
            max-height: 100px;
          }

          .materi-link{
            transition: 0.3s;
          }

          .materi-link:hover{
            letter-spacing: 3px;
          }

          .formtambah{
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
          }

          .ck-editor__editable {
              min-height: 200px;
          }

          .img-materi-card{
            width: 100%;
          }

          .line-materi-card{
            margin: auto;
            border-right: 8px solid black;
            border-left: 0;
            border-color: rgba(255, 234, 130, 0.759);
            border-style: dashed;
            height: 80%; 
            width: 0px;
          }

          .card-materi-desc{
            border-radius: 20px;
            box-shadow: rgba(17, 17, 26, 0.1) 0px 0px 16px;
          }

          .menu-materi-card{
            box-shadow: rgba(17, 17, 26, 0.1) 0px 0px 16px;
            border-radius: 10px;
            width: max-content;
          }
          .pin-icon{
            max-width: 30px;
            position: absolute;
            margin-left: 5%;
            margin-top: 70px;
          }

          .calender-block{
            position: absolute;
            margin-left: 20px;
            margin-top: -14px;
          }

          .cal-title{
            width: 100px;
          } 

        @media only screen and (max-width: 800px) {
          .img-mapel-area{
            height: 150px;
          }
          .img-mapel-area img{
            height: 100%;
          }

          .line-materi-card{
            display: none;
          }

          .menu-materi-card{
            display: inline;
            margin-right: 10px;
            font-size: 12px;
            margin-top: 10px;
            float: right;
          }

          .pin-icon{
           display: none;
          }

          .calender-block button{
            display: none;
          }

          .calendar h1{
            font-size: 15px;
          }
        }
      </style>
</head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
          <a class="navbar-brand d-flex text-light" href="#"><img src="{{asset('gambar/logo.jpg')}}" width="180" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                  {{-- @if (auth()->user()->level=="guru")
                  <li class="nav-item">
                    <a href="/user" class="nav-link container text-light" aria-current="page" ><i class="fas fa-user-plus"></i> Kelola Pengguna</a>
                  </li>
                  @endif --}}
                  <li class="nav-item">
                
                  </li>
                  {{-- @if (Route::has('login'))
                  <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                      @auth
                          <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                      @else
                          <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>
  
                        
                      @endauth
                  </div>
              @endif --}}
                  <li class="nav-item dropstart">
                    <a class="nav-link dropdown-toggle  text-light" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{-- <i class="fas fa-user-graduate @if (auth()->user()->level=="guru") d-none @endif"></i>
                        @if (auth()->user()->level=="guru")
                        <i class="fas fa-chalkboard-teacher"></i>
                        @endif
                        {{ Auth::user()->username }} --}}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink" style="width: max-content;">
                      {{-- <li><a class="dropdown-item disabled text-muted">{{ Auth::user()->name }}</a></li> --}}
                      <li>
                        {{-- <a class="dropdown-item text-danger" aria-current="page" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off"></i> {{ __('Logout') }}
                        </a> --}}
                      {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                      </form> --}}
                      </li>
                    </ul>
                  </li>
            </ul>
          </div>
        </div>
      </nav>
      <br><br>
  
      
      @yield('container')

      </div>
  
      <br><br>
        <footer class="fixed-bottom mt-4">
          <div class="bg p-1">
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
    <script>
      ClassicEditor
          .create( document.querySelector( '#editor' ) )
          .catch( error => {
              console.error( error );
          } );
    </script>
  </body>
</html>