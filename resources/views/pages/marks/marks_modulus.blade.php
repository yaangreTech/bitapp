<x-app-layout filtrage='false'>
    <x-slot name="custom_css">

    </x-slot>

    <x-slot name="custom_js">
        <script src="assets/js/table.min.js"></script>
        <script src="assets/js/form.min.js"></script>
        <!-- Custom Js -->
        <script src="assets/js/pages/tables/jquery-datatable.js"></script>
        <script src="assets/js/pages/forms/basic-form-elements.js"></script>
        <script src="assets/ajax/marks_ajax.js"></script>
        {{-- <script src="assets/ajax/marks_inputs_ajax.js"></script> --}}

    </x-slot>


    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">CS1->S1</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="{{ route('dashboard') }}" onClick="setActiveId('Dashboard')">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Marks management</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">CS</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">CS1</a>
                            </li>
                            <li class="breadcrumb-item active">Semester 1</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix m-t-20">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Cs1->S1</strong> Modulus
                        </h2>
                    </div>
                    <hr>
                    <div class="body ">



                        {{--  --}}

                        {{-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> --}}
                        {{-- <div class="card"> --}}
                        {{-- <div class="body" > --}}
                        <ul class="timeline" id="marks_modulus">
                            <x-loading />
                          {{-- ajout --}}
                        </ul>
                        {{-- </div> --}}
                        {{-- </div> --}}
                        {{-- </div> --}}



                        {{--  --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- form --}}
    <x-test-form />
</x-app-layout>
