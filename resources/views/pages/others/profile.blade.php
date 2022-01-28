<x-app-layout filtrage='false'>
    <x-slot name="custom_css">
        
    </x-slot>

    <x-slot name="custom_js">

    </x-slot>

     <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Profile</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="{{route('dashboard')}}"  onClick="setActiveId('Dashboard')">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Your content goes here  -->
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="m-b-20">
                            <div class="contact-grid">
                                <div class="profile-header bg-dark">
                                    <div class="user-name">Sanou Lougoudoro</div>
                                    <div class="name-center">@lougoudoro</div>
                                </div>
                                <img src="../../assets/images/user/lougb3.png" class="user-img" alt="">
                                <p>
                                    Super admin
                                    <br />since 2021
                                </p>
                                <div>
                                    <span class="phone">
                                        <i class="material-icons">phone</i>+226 56-80-96-35</span>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <h5>564</h5>
                                        <small>Following</small>
                                    </div>
                                    <div class="col-4">
                                        <h5>18k</h5>
                                        <small>Followers</small>
                                    </div>
                                    <div class="col-4">
                                        <h5>565</h5>
                                        <small>Post</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="profile-tab-box">
                            <div class="p-l-20">
                                <ul class="nav ">
                                    <li class="nav-item tab-all">
                                        <a class="nav-link active show" href="#project" data-toggle="tab">About Me</a>
                                    </li>
                                    <li class="nav-item tab-all p-l-20">
                                        <a class="nav-link" href="#usersettings" data-toggle="tab">Settings</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="project" aria-expanded="true">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card project_widget">
                                        <div class="header">
                                            <h2>About</h2>
                                        </div>
                                        <div class="body">
                                            <div class="row">
                                                <div class="col-md-4 col-6 b-r">
                                                    <strong>First Name</strong>
                                                    <br>
                                                    <p class="text-muted">Sanou</p>
                                                </div>
                                                <div class="col-md-4 col-6 b-r">
                                                    <strong>Last Name</strong>
                                                    <br>
                                                    <p class="text-muted">Lougoudoro</p>
                                                </div>
                                                <div class="col-md-4 col-6 b-r">
                                                    <strong>Mobile</strong>
                                                    <br>
                                                    <p class="text-muted">(123) 456 7890</p>
                                                </div>
                                                <div class="col-md-12 col-6 b-r">
                                                    <strong>Email</strong>
                                                    <br>
                                                    <p class="text-muted">johndeo@example.com</p>
                                                </div>
                                                <div class="col-md-12 col-6">
                                                    <strong>Right</strong>
                                                    <br>
                                                    <p class="text-muted">Super admin of BitApp</p>
                                                </div>
                                            </div>
                                          <br>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="timeline" aria-expanded="false">
                        </div>
                        <div role="tabpanel" class="tab-pane" id="usersettings" aria-expanded="false">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                        <strong>Account</strong> Settings</h2>
                                </div>
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-12">
                                            <b>First name</b>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Sanou"  value="Sanou">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <b>First name</b>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Lougoudoro" value="Lougoudoro">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-check m-l-10">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" id="checkbox"
                                                            name="checkbox"> Profile Visibility For Everyone
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-primary btn-round">Save Changes</button>
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