<x-app-layout>
    <x-slot name="custom_css">

    </x-slot>

    <x-slot name="custom_js">
        {{-- <script src="../../assets/js/pages/apps/chat.js"></script> --}}
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
                                <a href="{{ route('dashboard') }}">
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
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="#" onClick="return false;" class=" waves-effect waves-block">Action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;" class=" waves-effect waves-block">Another
                                            action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;" class=" waves-effect waves-block">Something
                                            else
                                            here</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <hr>
                    <div class="body">
                        <div class="demo">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3 col-sm-6">
                                        <div class="pricingTable">
                                            <div class="pricingTable-header">
                                                <i class="material-icons">brightness_medium</i>
                                                <div class="price-value"> 6 Credicts
                                                    <span class="month">120 Hours</span>
                                                </div>
                                            </div>

                                            <h3 class="heading">English</h3>
                                            <div class="pricing-content">
                                                <ul>
                                                    <li>
                                                        <b>2 tests</b> Done
                                                    </li>
                                                    <li>
                                                        <b>1 tests</b> in process
                                                    </li>
                                                </ul>
                                            </div>
                                            {{-- <div class="pricingTable-signup">
                                                <a href="#">sign up</a>
                                            </div> --}}
                                            <div style="position: absolute; top:10px; right:5px; ">
                                                <ul>
                                                    <li class="dropdown">
                                                        <a href="#" onClick="return false;" class="dropdown-toggle"
                                                            data-toggle="dropdown" role="button" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="material-icons">more_vert</i>
                                                        </a>
                                                        <ul class="dropdown-menu pull-right">
                                                            <li>
                                                                <a href="#" onClick="return false;">Tests</a>
                                                            </li>
                                                                       <li>
                                                                <a href="{{route('add_marks')}}" onClick="return true;">Fill marks</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" onClick="return false;">action 1</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="pricingTable greenColor">
                                            <div class="pricingTable-header">
                                                <i class="material-icons">local_mall</i>
                                                <div class="price-value"> 6 Credicts
                                                    <span class="month">120 Hours</span>
                                                </div>
                                            </div>
                                            <h3 class="heading">Mathmatics</h3>
                                            <div class="pricing-content">
                                                <ul>
                                                    <li>
                                                        <b>2 tests</b> Done
                                                    </li>
                                                    <li>
                                                        <b>1 tests</b> in process
                                                    </li>
                                                </ul>
                                            </div>
                                            {{-- <div class="pricingTable-signup">
                                                <a href="#">sign up</a>
                                            </div> --}}
                                            <div style="position: absolute; top:10px; right:5px; ">
                                                <ul>
                                                    <li class="dropdown">
                                                        <a href="#" onClick="return false;" class="dropdown-toggle"
                                                            data-toggle="dropdown" role="button" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="material-icons">more_vert</i>
                                                        </a>
                                                        <ul class="dropdown-menu pull-right">
                                                            <li>
                                                                <a href="#" onClick="return false;">Tests</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{route('add_marks')}}" onClick="return true;">Fill marks</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" onClick="return false;">action 1</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="pricingTable blueColor">
                                            <div class="pricingTable-header">
                                                <i class="material-icons">spa</i>
                                                <div class="price-value"> 6 Credicts
                                                    <span class="month">120 Hours</span>
                                                </div>
                                            </div>
                                            <h3 class="heading">Database</h3>
                                            <div class="pricing-content">
                                                <ul>
                                                    <li>
                                                        <b>2 tests</b> Done
                                                    </li>
                                                    <li>
                                                        <b>1 tests</b> in process
                                                    </li>
                                                </ul>
                                            </div>
                                            {{-- <div class="pricingTable-signup">
                                                <a href="#">sign up</a>
                                            </div> --}}
                                            <div style="position: absolute; top:10px; right:5px; ">
                                                <ul>
                                                    <li class="dropdown">
                                                        <a href="#" onClick="return false;" class="dropdown-toggle"
                                                            data-toggle="dropdown" role="button" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="material-icons">more_vert</i>
                                                        </a>
                                                        <ul class="dropdown-menu pull-right">
                                                            <li>
                                                                <a href="#" onClick="return false;">Tests</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{route('add_marks')}}" onClick="return true;">Fill marks</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" onClick="return false;">action 1</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="pricingTable redColor">
                                            <div class="pricingTable-header">
                                                <i class="material-icons">filter_vintage</i>
                                                <div class="price-value"> 6 Credicts
                                                    <span class="month">120 Hours</span>
                                                </div>
                                            </div>
                                            <h3 class="heading">Python</h3>
                                            <div class="pricing-content">
                                                <ul>
                                                    <li>
                                                        <b>2 tests</b> Done
                                                    </li>
                                                    <li>
                                                        <b>1 tests</b> in process
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                            {{-- <div class="pricingTable-signup">
                                                <a href="#">sign up</a>
                                            </div> --}}
                                            <div style="position: absolute; top:10px; right:5px; ">
                                                <ul>
                                                    <li class="dropdown">
                                                        <a href="#" onClick="return false;" class="dropdown-toggle"
                                                            data-toggle="dropdown" role="button" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="material-icons">more_vert</i>
                                                        </a>
                                                        <ul class="dropdown-menu pull-right">
                                                            <li>
                                                                <a href="#" onClick="return false;">Tests</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{route('add_marks')}}" onClick="return true;">Fill marks</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" onClick="return false;">action 1</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
