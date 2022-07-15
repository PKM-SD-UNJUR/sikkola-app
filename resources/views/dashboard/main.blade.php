<!DOCTYPE html>
<html>
<title>Sikkola</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<body>

<style>
    .w3-sidebar{
        box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 50px;
    }

    .bar-item{
        text-decoration: none;
        color:#3498DB; 
    }

    .link-bar{
        padding: 15px;
        /* border: 1px black solid; */
        font-weight: bold;
    }

    .link-item ul{
        list-style: none;
    }

    .active{
        background-color: #3498DB;
        border-radius: 8px; 
        box-shadow: rgb(131, 187, 242) 0px 8px 10px;
    }

    .active .bar-item{
        color: white;
    }

    .img-display{
        max-width: 100px;
    }

    .img-display img{
        width: 100%;
    }
    
    .mapel-bar{
        padding: 20px;
        border-radius: 15px;
        border: 4px solid rgb(168, 220, 250);
    }

    .mapel-bar2{
        padding: 5px;
        margin-left: 15px;
        border-radius: 15px;
        border: 2px solid #1AFF21;
    }

    @media only screen and (max-width: 800px) {
    .link-text {
        display: none
    }

    .active{
        width: max-content;
    }

    }
</style>

<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block" style="width:20%">
    <div class="p-3 d-flex justify-content-center">
        <a class="navbar-brand d-flex text-light" href="/"><img src="{{asset('gambar/logo.jpg')}}" width="200" alt=""></a>
    </div>
   
  <div class="container link-item mt-2">
    <ul>
        <li class="link-bar {{($title=='kelas')?'active':''}}"><a href="/dashboard/kelas" class="bar-item"><i class="fas fa-chalkboard"></i> <span class="link-text">Kelas</span> </a></li>
        <li class="link-bar {{($title=='mapel')?'active':''}}"><a href="/dashboard/mapel" class="bar-item"><i class="fas fa-book"></i> <span class="link-text">Mata Pelajaran</span></a></li>
        <li class="link-bar {{($title=='latihan')?'active':''}}"><a href="{{route('kelola-latihan')}}" class="bar-item"><i class="far fa-file-alt"></i> <span class="link-text">Latihan</span></a></li>
        <li class="link-bar"><a href="#" class="bar-item"> <span class="link-text">link</span></a></li>
    </ul>
  </div>
</div>

<!-- Page Content -->
<div style="margin-left:25%">

<div class="w3-container">
    
    <div class="container">
        <div class="d-flex mt-4">
            <div>
                @yield('top-title')
            </div>
            
            <div class="ms-auto d-flex ">
                <a class="btn btn-info mx-5 ms-auto fw-bold text-light" href="/"><i class="fas fa-user-graduate"></i> Lihat Halaman Siswa</a>

        
                <div class="dropdown">
                    <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="far fa-user"></i> {{Auth::user()->name}}
                    </a>
                  
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>&nbsp;Keluar</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </div>
            </div>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    @yield('content')
</div>

</div>
@include('sweetalert::alert')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script> 
</body>
</html>