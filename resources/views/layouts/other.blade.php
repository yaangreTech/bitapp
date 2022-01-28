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
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/pages/extra_pages.css" rel="stylesheet" />
</head>

<body>
    <div class="limiter">
        <div class="w-full p-t-15 p-b-15 text-center " style="position: absolute; right: 10px;">
           {{ $other_head}}
          
        </div>
        <div class="container-login100">
            <div class="wrap-login100">
               {{--  --}}
               {{$slot}}
               {{--  --}}

                <div class="login100-more" style="background-image: url('../../assets/images/pages/bg-01.png');">
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
