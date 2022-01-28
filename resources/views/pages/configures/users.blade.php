<x-app-layout filtrage='false'>
    <x-slot name="custom_css">

    </x-slot>

    <x-slot name="custom_js">
        <script src="assets/js/pages/apps/chat.js"></script>

        <script src="assets/js/form.min.js"></script>
        <!-- Custom Js -->
        <script src="assets/js/pages/forms/basic-form-elements.js"></script>
        <script src="../../assets/js/bundles/jquery-steps/jquery.steps.min.js"></script>
        <!-- Custom Js -->
        <script src="../../assets/js/pages/forms/form-wizard.js"></script>
    </x-slot>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Users</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="{{route('dashboard')}}" onClick="setActiveId('Dashboard')">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Configuration</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Organisation</a>
                            </li>
                            <li class="breadcrumb-item active">Users</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="col-xs-12 col-sm-6">
                                <h2>
                                    <strong>Users</strong> List
                                </h2>
                            </div>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#add_user"
                                                onClick="return false;">Add user</a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card border-apply">
                                        <div class="m-b-20">
                                            <div class="contact-grid">
                                                <div class="profile-header bg-dark">
                                                    <div class="user-name">Sanou Lougoudoro</div>
                                                    <div class="name-center">slougoudoro@gmail.com</div>
                                                </div>
                                                <img src="assets/images/user/lougb3.png" class="user-img" alt="">
                                                <p>
                                                    Super Admin
                                                    <br />of BitApp
                                                </p>
                                                <div>
                                                    <span class="phone">
                                                        <i class="material-icons">phone</i>264-625-2583</span>
                                                </div>
                                                <div class="profile-userbuttons">

                                                    <button type="button" data-toggle="modal" data-target="#add_user"
                                                        class="btn btn-outline-info btn-border-radius">Change
                                                        right</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border-apply">
                                        <div class="m-b-20">
                                            <div class="contact-grid">
                                                <div class="profile-header bg-brown">
                                                    <div class="user-name">Sanou Lougoudoro</div>
                                                    <div class="name-center">slougoudoro@gmail.com</div>
                                                </div>
                                                <img src="assets/images/user/lougb3.png" class="user-img" alt="">
                                                <p>
                                                    Super Admin
                                                    <br />of BitApp
                                                </p>
                                                <div>
                                                    <span class="phone">
                                                        <i class="material-icons">phone</i>264-625-2583</span>
                                                </div>
                                                <div class="profile-userbuttons">

                                                    <button type="button" data-toggle="modal" data-target="#add_user"
                                                        class="btn btn-outline-info btn-border-radius">Change
                                                        right</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border-apply">
                                        <div class="m-b-20">
                                            <div class="contact-grid">
                                                <div class="profile-header bg-dark">
                                                    <div class="user-name">Sanou Lougoudoro</div>
                                                    <div class="name-center">slougoudoro@gmail.com</div>
                                                </div>
                                                <img src="assets/images/user/lougb3.png" class="user-img" alt="">
                                                <p>
                                                    Super Admin
                                                    <br />of BitApp
                                                </p>
                                                <div>
                                                    <span class="phone">
                                                        <i class="material-icons">phone</i>264-625-2583</span>
                                                </div>
                                                <div class="profile-userbuttons">

                                                    <button type="button" data-toggle="modal" data-target="#add_user"
                                                        class="btn btn-outline-info btn-border-radius">Change
                                                        right</button>
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
        </div>

        {{-- forms --}}
        <x-user-form />
    </section>
</x-app-layout>
