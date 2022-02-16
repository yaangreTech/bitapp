<div class="container-fluid">
    <div class="navbar-header">
        <a href="#" onClick="return false;" class="navbar-toggle collapsed" data-toggle="collapse"
            data-target="#navbar-collapse" aria-expanded="false"></a>
        <a href="#" onClick="return false;" class="bars"></a>
        <a class="navbar-brand" href="{{ route('dashboard') }}" onClick="setActiveId('Dashboard')">
            <img src="assets/images/logo.png" alt="" />
            <span class="logo-name">BIT</span>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse">
        <ul class="nav navbar-nav navbar-left">
            <li>
                <a href="#" onClick="return false;" class="sidemenu-collapse">
                    <i class="nav-hdr-btn ti-align-left"></i>
                </a>
            </li>
            @if ($displayf=='true' && $years->count()>0)
            <li>
                   <div class="m-t-10 m-l-20" style="height: 100%;">
                    <select class="browser-default">
                      @foreach ($years as $year)
                      @if ($year->end_date==null)
                        <option value="{{$year->id}}">Current year</option>
                      @else
                      <option value="{{$year->id}}">{{ $year->name}}</option>
                      @endif
                      @endforeach
                    </select>
                   </div>
               
            </li>
            @endif
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="">
                <a href="{{ route('locked') }}" class="">
                    <i class="nav-hdr-btn ti-lock"></i>
                </a>
            </li>
            <!-- Full Screen Button -->
            <li class="fullscreen">
                <a href="javascript:;" class="fullscreen-btn">
                    <i class="nav-hdr-btn ti-fullscreen"></i>
                </a>
            </li>
            <!-- #END# Full Screen Button -->
            <!-- #START# Notifications-->
            <li class="dropdown">
                <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button">
                    <i class="nav-hdr-btn ti-bell"></i>
                    <span class="notify"></span>
                    <span class="heartbeat"></span>
                </a>
                <ul class="dropdown-menu pullDown">
                    <li class="header">NOTIFICATIONS</li>
                    {{-- <li class="body">
                        <ul class="menu">
                            <li>
                                <a href="#" onClick="return false;">
                                    <span class="table-img msg-user">
                                        <img src="assets/images/user/user1.jpg" alt="">
                                    </span>
                                    <span class="menu-info">
                                        <span class="menu-title">Sarah Smith</span>
                                        <span class="menu-desc">
                                            <i class="material-icons">access_time</i> 14 mins ago
                                        </span>
                                        <span class="menu-desc">Please check your email.</span>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#" onClick="return false;">
                                    <span class="table-img msg-user">
                                        <img src="assets/images/user/user6.jpg" alt="">
                                    </span>
                                    <span class="menu-info">
                                        <span class="menu-title">Charde Marshall</span>
                                        <span class="menu-desc">
                                            <i class="material-icons">access_time</i> 3 hours ago
                                        </span>
                                        <span class="menu-desc">Please check your email.</span>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#" onClick="return false;">
                                    <span class="table-img msg-user">
                                        <img src="assets/images/user/user7.jpg" alt="">
                                    </span>
                                    <span class="menu-info">
                                        <span class="menu-title">John Doe</span>
                                        <span class="menu-desc">
                                            <i class="material-icons">access_time</i> Yesterday
                                        </span>
                                        <span class="menu-desc">Please check your email.</span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="footer">
                        <a href="#" onClick="return false;">View All Notifications</a>
                    </li> --}}
                    <li class="footer">
                        <a href="#" onClick="return false;">No Notifications</a>
                    </li>
                </ul>
            </li>
            <!-- #END# Notifications-->
            <li class="dropdown user_profile">
                <div class="dropdown-toggle" data-toggle="dropdown">
                    <img src="assets/images/loug.png" alt="user">
                </div>
                <ul class="dropdown-menu pullDown">
                    <li class="body">
                        <ul class="user_dw_menu">
                            <li>
                                <a href="{{ route('profile') }}" onClick="return true;">
                                    <i class="material-icons">person</i>Profile
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('faqs') }}" onClick="return true;">
                                    <i class="material-icons">help</i>FAQs
                                </a>
                            </li>
                            <li>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a :href="route('logout')" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                        <i class="material-icons">power_settings_new</i>Logout
                                    </a>
                            </li>
                            </form>


                        </ul>
                    </li>
                </ul>
            </li>
            <!-- #END# Tasks -->
            <li class="pull-right">
                <a href="#" onClick="return false;" class="js-right-sidebar" data-close="true">
                    <i class="nav-hdr-btn ti-layout-grid2"></i>
                </a>
            </li>

        </ul>
    </div>
</div>
