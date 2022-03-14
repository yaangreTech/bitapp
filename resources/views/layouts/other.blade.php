<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BitApp') }}</title>
    <!-- Favicon-->
    <!-- Plugins Core Css -->
    <link href="assets/css/app.min.css" rel="stylesheet">
    <!-- Custom Css -->
    {{-- <link href="assets/css/style.css" rel="stylesheet" /> --}}
    <link href="assets/css/pages/extra_pages.css" rel="stylesheet" />
    <script src="assets/ownjs/localDB.js"></script>
</head>

<body>
    <div class="limiter ">
        <div class="w-full p-t-15 p-b-15 text-center " style="position: absolute; right: 10px;">
            {{ $other_head }}

        </div>
        <div class="container-login100" style="background-image: url('assets/images/bg1.jpg');  background-position: center;
        background-size: cover;">
            <div class="setOverlay" style=" position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: black;
                opacity: 0.5;"></div>
            <div class="wrap-login100" style="z-index: 100;">
                {{--  --}}
                {{ $slot }}
                {{--  --}}
                <div class="login100-more" {{-- style="background-image: url('assets/images/logo.png');" --}}>
                </div>
            </div>
        </div>
    </div>

    <!-- Plugins Js -->
    <script src="assets/js/app.min.js"></script>
    <!-- Extra page Js -->
    <script src="assets/js/pages/examples/pages.js"></script>
</body>


</html>
