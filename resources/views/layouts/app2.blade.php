<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">

    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: fontloe;
            src: url('../font/Chalktastic.otf');
        }

        .bg {
            /* The image used */
            background-image: url("gambar/bgberanda.jpg");

            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .card {
            padding: 18px;
        }

        /* h3{
        font-family: 'Quicksand', sans-serif;
    } */
        @font-face {
            font-family: fontloe;
            src: url('../font/Chalktastic.otf');
        }

        .mapelcaption {
            display: fixed;
            color: white;
            background-size: cover;
            background-attachment: fixed;
            background-repeat: no-repeat;
            border: 12px solid #AF601A;
            letter-spacing: 1px;
            box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
            /* justify-content: center; */
        }

        label {
            font-family: fontloe;
        }

        h2 {
            font-family: fontloe;
        }

        button {
            font-family: fontloe;
            transition: 0.3s;
            background: transparent;
        }

        .btn:hover {
            background-color: white;
            color: black;
        }

        .btn {
            border: 2px solid white;
            margin-top: 12px;
            color: white;
        }

        input {
            background: transparent;
            color: white;
            border-color: white;
            border: none;
            border-bottom: 2px solid;
        }

        input:focus {
            outline: none;
        }

        .col-md-10 {}

        ::placeholder {
            color: rgb(211, 201, 201);
            opacity: 1;
            /* Firefox  */
        }
    </style>

</head>

<body>
    <div class="bg">
        @yield('content')
    </div>
</body>

</html>