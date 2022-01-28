<div class="menu">
    <ul class="list">
        {{-- <li>
            <div class="sidebar-profile clearfix">
                <div class="profile-img">
                    <img src="assets/images/loug.png" alt="profile">
                </div>
                <div class="profile-info">
                    <h3>Sanou Lougoudoro</h3>
                    
                    <p>Welcome Admin sanou !</p>
                </div>
            </div>
        </li> --}}
        {{-- <li class="header">Navigation</li> --}}

        <li>
            <a href="{{ route('dashboard') }}" id="Dashboard" onClick="setActiveId('Dashboard')">
                <i class="menu-icon ti-home"></i>
                <span>Dashboard</span>
            </a>
        </li>

        {{-- configuration menus --}}
        <li>
            <a href="#" onClick="return false;" class="menu-toggle">
                <i class="menu-icon ti-settings"></i>
                <span>Configuration</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="{{ route('school') }}" id="School" onClick="setActiveId('School')">School Settings</a>
                </li>

                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">Organisation</a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ route('all_promotions') }}" id="Promotions"
                                onClick="setActiveId('Promotions')">Promotions</a>
                        </li>
                        <li>
                            <a href="{{ route('all_users') }}" id="Users" onClick="setActiveId('Users')">Users</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        {{-- Students management menus --}}
        <li>
            <a href="#" onClick="return false;" class="menu-toggle">
                <i class="material-icons menu-icon">group</i>
                <span>Student management</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="{{ route('students_form') }}" id="Add_new_Students"
                        onClick="setActiveId('Add_new_Students')">
                        <span>Add new Students</span>
                    </a>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <span>Students list</span>
                    </a>
                    <ul class="ml-menu">

                        <li>
                            <a href="#" onClick="return false;" class="menu-toggle">
                                <span>CS</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="{{ route('all_students') }}" id="Cs1" onClick="setActiveId('Cs1')">
                                        <span>Cs1</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('all_students') }}" id="Cs2" onClick="setActiveId('Cs2')">
                                        <span>Cs2</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                    </ul>

                </li>
            </ul>

        </li>

        {{-- Marks management menus --}}
        <li>
            <a href="#" onClick="return false;" class="menu-toggle">
                <i class="menu-icon ti-marker-alt"></i>
                <span>Marks management</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <span>CS</span>
                    </a>
                    <ul class="ml-menu">

                        <li>
                            <a href="#" onClick="return false;" class="menu-toggle">
                                <span>cs1</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="{{ route('marks_modulus') }}" id="Semester1"
                                        onClick="setActiveId('Semester1')">
                                        <span>Semester1</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('marks_modulus') }}" id="Semester2"
                                        onClick="setActiveId('Semester2')">
                                        <span>Semester2</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li>
                            <a href="#" onClick="return false;" class="menu-toggle">
                                <span>cs2</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="{{ route('marks_modulus') }}" id="Semestre3"
                                        onClick="setActiveId('Semestre3')">
                                        <span>Semestre3</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('marks_modulus') }}" id="Semestre4"
                                        onClick="setActiveId('Semestre4')">
                                        <span>Semestre4</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                    </ul>

                </li>

            </ul>

        </li>

        {{-- genarated average management menus --}}
        <li>
            <a href="#" onClick="return false;" class="menu-toggle">
                <i class="menu-icon fas fa-calculator"></i>
                <span>generated average</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <span>CS</span>
                    </a>
                    <ul class="ml-menu">

                        <li>
                            <a href="#" onClick="return false;" class="menu-toggle">
                                <span>cs1</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="{{ route('semester_averages') }}" id="semestre1"
                                        onClick="setActiveId('semestre1')">
                                        <span>Semestre1</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('semester_averages') }}" id="semestre2"
                                        onClick="setActiveId('semestre2')">
                                        <span>Semestre2</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li>
                            <a href="#" onClick="return false;" class="menu-toggle">
                                <span>cs2</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="{{ route('semester_averages') }}" id="semestre3"
                                        onClick="setActiveId('semestre3')">
                                        <span>Semestre3</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('semester_averages') }}" id="semestre4"
                                        onClick="setActiveId('semestre4')">
                                        <span>Semestre4</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                    </ul>

                </li>
            </ul>
        </li>

        {{-- Generated documents management menu --}}
        <li>
            <a href="#" onClick="return false;" class="menu-toggle">
                <i class="menu-icon fas fa-file-pdf"></i>
                <span>Genarated documents</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <span>grade transcript</span>
                    </a>
                    <ul class="ml-menu">

                        <li>
                            <a href="#" onClick="return false;" class="menu-toggle">
                                <span>cs</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="{{ route('grades') }}" id="cS1" onClick="setActiveId('cS1')">
                                        <span>cs1</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('grades') }}" id="cS2" onClick="setActiveId('cS2')">
                                        <span>cs2</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <span>Certificate</span>
                    </a>
                    <ul class="ml-menu">

                        <li>
                            <a href="{{ route('certificates') }}" id="CS1" onClick="setActiveId('CS1')">
                                <span>CS3</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('certificates') }}" id="EE3" onClick="setActiveId('EE3')">
                                <span>EE3</span>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </li>

        {{-- Aside footer --}}
        <li>
            <hr>
            <div class="leftSideProgress">
                <div class="progress-list">
                    <div class="details">
                        <div class="title">Semester</div>
                    </div>
                    <div class="status">
                        <span>52</span>%
                    </div>
                    <div class="progress-s progress">
                        <div class="progress-bar progress-bar-success width-per-52" role="progressbar"
                            aria-valuenow="38" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                </div>
            </div>
            <div class="leftSideProgress">
                <div class="progress-list m-b-10">
                    <div class="details">
                        <div class="title">Year</div>
                    </div>
                    <div class="status">
                        <span>79</span>%
                    </div>
                    <div class="progress-s progress">
                        <div class="progress-bar progress-bar-warning width-per-79" role="progressbar"
                            aria-valuenow="38" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                </div>
            </div>


        </li>

    </ul>


    <script>

        function setActiveId(id) {
            currentActivedb.setItem('currentActive', id);
        }
    </script>
</div>

