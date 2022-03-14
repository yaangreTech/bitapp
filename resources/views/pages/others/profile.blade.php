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
                                <a href="{{ route('dashboard') }}" onClick="setActiveId('Dashboard')">
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
                                    <div class="user-name">{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}
                                    </div>
                                    <div class="name-center">{{ Auth::user()->email }}</div>
                                </div>
                                <img src="assets/images/user/lougb3.png" class="user-img" alt="">
                                <p>
                                    {{ Auth::user()->right->label }}
                                    <br />since 2021
                                </p>
                                <div>
                                    <span class="phone">
                                        <i class="material-icons">phone</i>{{ Auth::user()->phone }}</span>
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
                                                    <p class="text-muted">{{ Auth::user()->firstname }}</p>
                                                </div>
                                                <div class="col-md-4 col-6 b-r">
                                                    <strong>Last Name</strong>
                                                    <br>
                                                    <p class="text-muted">{{ Auth::user()->lastname }}</p>
                                                </div>
                                                <div class="col-md-4 col-6 b-r">
                                                    <strong>Mobile</strong>
                                                    <br>
                                                    <p class="text-muted">
                                                        {{ Auth::user()->phone != null ? Auth::user()->phone : '---' }}</p>
                                                </div>
                                                <div class="col-md-12 col-6 b-r">
                                                    <strong>Email</strong>
                                                    <br>
                                                    <p class="text-muted">{{ Auth::user()->email }}</p>
                                                </div>
                                                <div class="col-md-12 col-6">
                                                    <strong>Right</strong>
                                                    <br>
                                                    <p class="text-muted">{{ Auth::user()->right->label }} of BitApp
                                                    </p>
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
                                        <strong>Account</strong> Settings
                                    </h2>
                                </div>

                                <form id="update_profile">
                                    <div class="body">
                                        <div class="row clearfix">
                                            @csrf
                                            <div class="col-lg-6 col-md-12">
                                                <b>First name</b>
                                                <div class="form-group">
                                                    <input type="text" name="firstname" class="form-control"
                                                        placeholder="Sanou" value="{{ Auth::user()->firstname }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <b>last name</b>
                                                <div class="form-group">
                                                    <input type="text" name="lastname" class="form-control"
                                                        placeholder="Lougoudoro" value="{{ Auth::user()->lastname }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <b>Phone</b>
                                                <div class=" demo-masked-input">
                                                    <div class="form-group">
                                                        <input type="text" name="phone"
                                                            class="form-control mobile-phone-number" placeholder="----"
                                                            value="{{ Auth::user()->phone }}">
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div class="col-md-12">
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
                                        </div> --}}
                                            <div class="col-md-12">
                                                <button id="{{ Auth::user()->id }}"
                                                    onclick="modifier('/profile/'+this.id,'update_profile',null)"
                                                    class="btn btn-primary btn-round">Save Changes</button>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
