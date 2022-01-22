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

        <li class="active">
            <a href="{{ route('dashboard') }}">
                <i class="menu-icon ti-home"></i>
                <span>Dashboard</span>
            </a>
        </li>

        {{-- configuration menus --}}
        <li>
            <a href="#" onClick="return false;" class="menu-toggle">
                <i class="menu-icon ti-face-smile"></i>
                <span>Configuration</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="{{ route('school') }}" onClick="return true;">School</a>
                </li>
                {{-- <li>
                    <a href="#" onClick="return false;" class="menu-toggle">School</a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ route('all_departments') }}">Departements</a>
                        </li>
                        <li>
                            <a href="{{ route('all_classes') }}">Semesters</a>
                        </li>
                        <li>
                            <a href="{{ route('all_classes') }}">Classes</a>
                        </li>
                        <li>
                            <a href="{{ route('all_modulus') }}">Modulus</a>
                        </li>
                    </ul>
                </li> --}}
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">Organisation</a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ route('all_promotions') }}">Promotions</a>
                        </li>
                        <li>
                            <a href="{{ route('all_users') }}">Users</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        {{-- Students management menus --}}
        <li>
            <a href="#" onClick="return false;" class="menu-toggle">
                <i class="menu-icon ti-angle-double-down"></i>
                <span>Student management</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="{{ route('students_form') }}" onClick="return true;">
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
                                    <a href="{{ route('all_students') }}" onClick="return true;">
                                        <span>Cs1</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('all_students') }}" onClick="return true;">
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
                <i class="menu-icon ti-angle-double-down"></i>
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
                                    <a href="{{ route('marks_modulus') }}" onClick="return true;">
                                        <span>Semestre1</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('marks_modulus') }}" onClick="return true;">
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
                                    <a href="{{ route('marks_modulus') }}" onClick="return true;">
                                        <span>Semestre3</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('marks_modulus') }}" onClick="return true;">
                                        <span>Semestre4</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                    </ul>

                    <ul class="ml-menu">
                        <li>
                            <a href="#" onClick="return false;">
                                <span>cs1</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" onClick="return false;">
                                <span>cs2</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" onClick="return false;">
                                <span>cs3</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <span>EE</span>
                    </a>
                    <ul class="ml-menu">

                        <li>
                            <a href="#" onClick="return false;" class="menu-toggle">
                                <span>cs1</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="#" onClick="return false;">
                                        <span>Semestre1</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick="return false;">
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
                                    <a href="#" onClick="return false;">
                                        <span>Semestre3</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick="return false;">
                                        <span>Semestre4</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                    </ul>

                    <ul class="ml-menu">
                        <li>
                            <a href="#" onClick="return false;">
                                <span>cs1</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" onClick="return false;">
                                <span>cs2</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" onClick="return false;">
                                <span>cs3</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

        </li>

        {{-- genarated average management menus --}}
        <li>
            <a href="#" onClick="return false;" class="menu-toggle">
                <i class="menu-icon ti-angle-double-down"></i>
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
                                    <a href="{{ route('semester_averages') }}" onClick="return true;">
                                        <span>Semestre1</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('semester_averages') }}" onClick="return true;">
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
                                    <a href="{{ route('semester_averages') }}" onClick="return true;">
                                        <span>Semestre3</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('semester_averages') }}" onClick="return true;">
                                        <span>Semestre4</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                    </ul>

                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <span>EE</span>
                    </a>
                    <ul class="ml-menu">

                        <li>
                            <a href="#" onClick="return false;" class="menu-toggle">
                                <span>cs1</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="#" onClick="return false;">
                                        <span>Semestre1</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick="return false;">
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
                                    <a href="#" onClick="return false;">
                                        <span>Semestre3</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick="return false;">
                                        <span>Semestre4</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                    </ul>

                    <ul class="ml-menu">
                        <li>
                            <a href="#" onClick="return false;">
                                <span>cs1</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" onClick="return false;">
                                <span>cs2</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" onClick="return false;">
                                <span>cs3</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        {{-- Generated documents management menu --}}
        <li>
            <a href="#" onClick="return false;" class="menu-toggle">
                <i class="menu-icon ti-face-smile"></i>
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
                                    <a href="{{ route('grades') }}" onClick="return true;">
                                        <span>cs1</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('grades') }}" onClick="return true;">
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
                            <a href="#" onClick="return false;" class="menu-toggle">
                                <span>cs</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="{{ route('certificates') }}" onClick="return true;">
                                        <span>cs1</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('certificates') }}" onClick="return true;">
                                        <span>cs2</span>
                                    </a>
                                </li>
                            </ul>
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
{{-- 
        <li style="position: absolute; bottom: 0px; width: 100%;">
            <a href="#" onClick="return false;" class="bg-red">
                <i class="menu-icon ti-face-smile"></i>
                <span>Lock</span>
            </a> 
        </li> --}}
        
    </ul>
</div>
