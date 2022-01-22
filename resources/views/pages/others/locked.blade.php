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
        {{-- <div class="w-full p-t-15 p-b-15 text-center " style="position: absolute; right: 10px;">
            <div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="#"  onclick="event.preventDefault();
                    this.closest('form').submit();">
                    Logout?
                    </a>
                </form>
            </div>
        </div> --}}
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form">
                    <div class="login100-form-logo">
                        <div class="image">
                            <img src="../../assets/images/user/lougb3.png" alt="User">
                        </div>
                    </div>
                    <span class="login100-form-title p-b-34 p-t-27">
                       @ougoudoro
                    </span>
                    <div class="text-center">
                        <p class="txt1 p-b-20">
                            Locked
                        </p>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="text" name="pass">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>
                    <div class="container-login100-form-btn p-t-30">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                   
                </form>

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
