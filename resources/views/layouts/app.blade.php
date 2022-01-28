<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BitApp') }} </title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    {{-- <script src="assets/added/js/main-jquery.js"></script> --}}
    <script src="assets/added/js/jquery.js"></script>
    <script src="assets/ownjs/localDB.js"></script>
    <script src="assets/ownjs/jsPDF.js"></script>


    <!-- Plugins Core Css -->
    <link href="assets/css/app.min.css" rel="stylesheet">
    <!-- Custom Css -->

    {{-- vrai --}}
    <link href="assets/css/style.css" rel="stylesheet" />

    {{ $custom_css }}

    <!--  all themes -->
    <link href="assets/css/styles/all-themes.css" rel="stylesheet" />
</head>

<body class="light">

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Top Bar -->
    <nav class="navbar">
        <x-nav-bar displayf={{$filtrage}} />
    </nav>
    <!-- #Top Bar -->

    <div>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <x-left-aside />
        </aside>
        <!-- #END# Left Sidebar -->

        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <x-right-aside />
        </aside>
        <!-- #END# Right Sidebar -->


    </div>

    <!-- Page Content -->
    {{ $slot }}
    <!-- End page Content -->

    {{-- Js links --}}
    <script src="assets/js/app.min.js"></script>

    <!-- Custom Js -->
    <script src="assets/js/admin.js"></script>
    <script src="assets/js/pages/ui/dialogs.js"></script>

    {{-- others --}}
    {{-- <script src="assets/ownjs/modaljs.js"></script> --}}


    {{-- moi --}}
    {{ $custom_js }}

    <script>
        var currentActive = currentActivedb.getItem('currentActive');
        var parents = $('#' + currentActive).parents('li');
        parents.addClass('active');
    </script>
</body>

</html>
