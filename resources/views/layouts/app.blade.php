<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BitApp') }} </title>


    <!-- Fonts -->
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

    {{-- <script src="assets/added/js/main-jquery.js"></script> --}}
    <script src="assets/added/js/jquery.js"></script>
    <script src="assets/ownjs/localDB.js"></script>
    {{-- <script src="assets/ownjs/jsPDF.js"></script> --}}

    <!-- Plugins Core Css -->
    <link href="assets/css/app.min.css" rel="stylesheet">
    <!-- Custom Css -->

    {{-- vrai --}}
    <link href="assets/css/style.css" rel="stylesheet" />

    <link rel="stylesheet" href="assets/edite/css/jquery-simpleedit.css" />





    {{ $custom_css }}

    <!--  all themes -->
    <link href="assets/css/styles/all-themes.css" rel="stylesheet" />

    <link href="assets/ownjs/sweetalert2.all.min.css" rel="stylesheet">

    <script src="assets/ajax/ajax_helpers.js"></script>
</head>

<body class="light">

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Top Bar -->
    <nav class="navbar">
        <x-nav-bar displayf='{{ $filtrage }}' />
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
    @if (Auth::user()->lastname == null || Auth::user()->firstname == null)
        <x-complete-profile-form />
    @endif
    
   

    {{-- Js links --}}
    <script src="assets/js/app.min.js"></script>
    <script src="assets/ownjs/logic.js"></script>

    <!-- Custom Js -->
    <script src="assets/js/admin.js"></script>
    <script src="assets/js/pages/ui/dialogs.js"></script>
    <script src="assets/ownjs/sweetalert2.all.min.js"></script>

    {{-- others --}}
    {{-- <script src="assets/ownjs/modaljs.js"></script> --}}

    <script src="assets/edite/js/jquery-simpleedit.js"></script>




    <script src="assets/js/pages/forms/form-wizard.js"></script>

    <script src="assets/js/pages/forms/advanced-form-elements.js"></script>
    <script src="assets/js/form.min.js"></script>


    <script src="assets/js/bundles/jquery-steps/jquery.steps.min.js"></script>
    <script src="assets/js/bundles/multiselect/js/jquery.multi-select.js"></script>

    <script>
        $('#compete_profile').modal('show');
    </script>

    {{-- moi --}}
    {{ $custom_js }}



    <script>
        var currentActive = currentActivedb.getItem('currentActive');
        var parents = $('#' + currentActive).parents('li');
        parents.addClass('active');
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        function complete_Registration(formID) {
            modifier('/school/complete_registration/', formID, null, true);
        }
    </script>
    <script src="assets/ownjs/printThis.js"></script>

   

</body>

</html>
