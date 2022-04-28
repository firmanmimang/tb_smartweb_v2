<!DOCTYPE html>
<html lang="en">

<head>
    <!-- required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=divice-width, initial-scale==1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="{{asset('img/favicon.ico')}}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    {{-- font awesome --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    {{-- css masing-masing halaman --}}
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    {{-- css scrollTop --}}
    <link rel="stylesheet" href="{{asset('css/scroll-top.css')}}">
    {{-- css floating weather info --}}
    <link rel="stylesheet" href="{{asset('css/weather.css')}}">

    <title>{{env('APP_NAME')}} | {{ $title ?? '' }}</title>
</head>

<body class="overflow-x-hidden d-flex flex-column" style="min-height: 100vh;">
    {{-- navbar --}}
    <div class="wrapper">
        <!-- navbar atas -->
        @include('frontend.partials.top-nav')
        <!-- navbar bawah -->
    </div>
    @include('frontend.partials.bottom-nav')

    {{-- main content --}}
    @yield('content')

    <!-- footer -->
    @include('frontend.partials.footer')

    {{-- floating button scrollTop --}}
    @include('frontend.partials.scroll-top')

    {{-- floating weather info --}}
    @include('frontend.partials.weather')

    <!-- Optional Js, popper.js first then bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    {{-- slide up animation --}}
    <script src="{{asset('js/slideUp.js')}}"></script>

    {{-- scroll top --}}
    <script src="{{asset('js/scrollTop.js')}}"></script>

    {{-- weather button floating --}}
    <script src="{{asset('js/btnWeather.js')}}"></script>
</body>

</html>