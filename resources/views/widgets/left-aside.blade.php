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
        @if (Auth::user()->right->title == 'isAdmin')
            <li>
                <a href="#" onClick="return false;" class="menu-toggle">
                    <i class="menu-icon ti-settings"></i>
                    <span>Configuration</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('school') }}" id="School" onClick="setActiveId('School')">School
                            Settings</a>
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
        @endif
        {{-- Students management menus --}}
        <li>
            <a href="#" onClick="return false;" class="menu-toggle">
                <i class="material-icons menu-icon">group</i>
                <span>Student management</span>
            </a>
            <ul class="ml-menu">
                {{-- <li>
                    <a href="{{ route('import_form') }}" id="import_Students"
                        onClick="setActiveId('import_Students')">
                        <span>Import Students</span>
                    </a>
                </li> --}}
                <li>
                    <a href="{{ route('students_form') }}" id="Add_new_Students"
                        onClick="setActiveId('Add_new_Students')">
                        <span>Add new Students</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('reinscription_form') }}" id="reinscript_Students"
                        onClick="setActiveId(this.id)">
                        <span>Reinscript Students</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('end_cycle_form') }}" id="end_Cycle" onClick="setActiveId(this.id)">
                        <span>End cycle</span>
                    </a>
                </li>


                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <span>Students list</span>
                    </a>
                    <ul class="ml-menu">
                        @forelse ($departements as $departement)
                            @if (Auth::user()->right->title == 'isAdmin')
                                <li>
                                    <a href="#" onClick="return false;" class="menu-toggle">
                                        <span>{{ $departement->name }}</span>
                                    </a>
                                    <ul class="ml-menu">
                                        @forelse ($departement->branches as $branche)
                                            <li>
                                                <a href="#" onClick="return false;" class="menu-toggle">
                                                    <span>{{ $branche->name }}</span>
                                                </a>
                                                <ul class="ml-menu">
                                                    @forelse ($branche->levels as $level)
                                                        <li>
                                                            <a title="students_list"
                                                                href="{{ route('all_students') }}"
                                                                id="{{ 'sl' . $departement->id . '_' . $level->id }}"
                                                                onClick="setActiveId(this.id, this.title)">

                                                                <span>{{ $level->label }}
                                                                    ({{ $level->name }})</span>
                                                            </a>
                                                        </li>
                                                    @empty
                                                        <span>No Classe for this department</span>
                                                    @endforelse
                                                </ul>
                                            </li>
                                        @empty
                                            <span>No Options for {{ $departement->name }}</span>
                                        @endforelse
                                    </ul>
                                </li>
                            @else
                                @forelse ($departement->branches as $branche)
                                    <li>
                                        <a href="#" onClick="return false;" class="menu-toggle">
                                            <span>{{ $branche->name }}</span>
                                        </a>
                                        <ul class="ml-menu">
                                            @forelse ($branche->levels as $level)
                                                <li>
                                                    <a title="students_list" href="{{ route('all_students') }}"
                                                        id="{{ 'sl' . $departement->id . '_' . $level->id }}"
                                                        onClick="setActiveId(this.id,this.title)">
                                                        <span>{{ $level->label }} ({{ $level->name }})</span>
                                                    </a>
                                                </li>
                                            @empty
                                                <span>No Classe for this department</span>
                                            @endforelse
                                        </ul>
                                    </li>
                                @empty
                                    <span>No Options for {{ $departement->name }}</span>
                                @endforelse
                            @endif
                        @empty
                            <h3>No Department</h3>
                        @endforelse
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
                @forelse ($departements as $departement)
                    @if (Auth::user()->right->title == 'isAdmin')
                        <li>
                            <a href="#" onClick="return false;" class="menu-toggle">
                                <span>{{ $departement->name }}</span>
                            </a>
                            <ul class="ml-menu">
                                @forelse ($departement->branches as $branche)
                                    <li>
                                        <a href="#" onClick="return false;" class="menu-toggle">
                                            <span>{{ $branche->name }}</span>
                                        </a>
                                        <ul class="ml-menu">
                                            @forelse ($branche->levels as $level)
                                                <li>
                                                    <a href="#" onClick="return false;" class="menu-toggle">
                                                        <span>{{ $level->label }} ({{ $level->name }})</span>
                                                    </a>
                                                    <ul class="ml-menu">

                                                        @forelse ($level->semesters as $semester)
                                                            <li>
                                                                <a title="marks_management"
                                                                    href="{{ route('marks_modulus') }}"
                                                                    id="mm{{ $departement->id . $level->id . '_' . $semester->id }}"
                                                                    onClick="setActiveId(this.id, this.title)">
                                                                    <span>{{ $semester->label }}
                                                                        ({{ $semester->name }})</span>
                                                                </a>
                                                            </li>
                                                        @empty
                                                            <span>No Semester</span>
                                                        @endforelse

                                                    </ul>
                                                </li>
                                            @empty
                                                <span>No Level</span>
                                            @endforelse
                                        </ul>
                                    </li>
                                @empty
                                    <span>No Option for {{ $departement->name }}</span>
                                @endforelse



                            </ul>
                        </li>
                    @else
                        @forelse ($departement->branches as $branche)
                            <li>
                                <a href="#" onClick="return false;" class="menu-toggle">
                                    <span>{{ $branche->name }}</span>
                                </a>
                                <ul class="ml-menu">
                                    @forelse ($branche->levels as $level)
                                        <li>
                                            <a href="#" onClick="return false;" class="menu-toggle">
                                                <span>{{ $level->label }} ({{ $level->name }})</span>
                                            </a>
                                            <ul class="ml-menu">
                                                @forelse ($level->semesters as $semester)
                                                    <li>
                                                        <a title='marks_management'
                                                            href="{{ route('marks_modulus') }}"
                                                            id="mm{{ $departement->id . $level->id . '_' . $semester->id }}"
                                                            onClick="setActiveId(this.id,this.title)">
                                                            <span>{{ $semester->label }}
                                                                ({{ $semester->name }})</span>
                                                        </a>
                                                    </li>
                                                @empty
                                                    <span>No Semester</span>
                                                @endforelse

                                            </ul>
                                        </li>
                                    @empty
                                        <span>No Level</span>
                                    @endforelse
                                </ul>
                            </li>
                        @empty
                            <span>No Option for {{ $departement->name }}</span>
                        @endforelse
                    @endif
                @empty
                    <span>No Department</span>
                @endforelse
            </ul>
        </li>


        {{-- genarated average management menus --}}
        <li>
            <a href="#" onClick="return false;" class="menu-toggle">
                <i class="menu-icon fas fa-calculator"></i>
                <span>averages</span>
            </a>
            <ul class="ml-menu">
                @forelse ($departements as $departement)
                    @if (Auth::user()->right->title == 'isAdmin')
                        <li>
                            <a href="#" onClick="return false;" class="menu-toggle">
                                <span>{{ $departement->name }}</span>
                            </a>
                            <ul class="ml-menu">

                                @forelse ($departement->branches as $branche)
                                    <li>
                                        <a href="#" onClick="return false;" class="menu-toggle">
                                            <span>{{ $branche->name }}</span>
                                        </a>
                                        <ul class="ml-menu">

                                            @forelse ($branche->levels as $level)
                                                <li>
                                                    <a href="#" onClick="return false;" class="menu-toggle">
                                                        <span>{{ $level->label }} ({{ $level->name }})</span>
                                                    </a>
                                                    <ul class="ml-menu">

                                                        @forelse ($level->semesters as $semester)
                                                            <li>
                                                                <a title="average_management"
                                                                    href="{{ route('semester_averages') }}"
                                                                    id="sa{{ $departement->id . $level->id . $semester->id . '_' . $semester->id }}"
                                                                    onClick="setActiveId(this.id,this.title)">
                                                                    <span>{{ $semester->label }}
                                                                        ({{ $semester->name }})</span>
                                                                </a>
                                                            </li>
                                                        @empty
                                                            <span>No Semester</span>
                                                        @endforelse

                                                    </ul>
                                                </li>
                                            @empty
                                                <span>No Classe</span>
                                            @endforelse
                                        </ul>
                                    </li>
                                @empty
                                    <span>No Option for {{ $departement->name }}</span>
                                @endforelse

                            </ul>
                        </li>
                    @else
                        @forelse ($departement->branches as $branche)
                            <li>
                                <a href="#" onClick="return false;" class="menu-toggle">
                                    <span>{{ $branche->name }}</span>
                                </a>
                                <ul class="ml-menu">
                                    @forelse ($branche->levels as $level)
                                        <li>
                                            <a href="#" onClick="return false;" class="menu-toggle">
                                                <span>{{ $level->label }} ({{ $level->name }})</span>
                                            </a>
                                            <ul class="ml-menu">
                                                @forelse ($level->semesters as $semester)
                                                    <li>
                                                        <a title="average_management"
                                                            href="{{ route('semester_averages') }}"
                                                            id="sa{{ $departement->id . $level->id . $semester->id . '_' . $semester->id }}"
                                                            onClick="setActiveId(this.id,this.title)">
                                                            <span>{{ $semester->label }}
                                                                ({{ $semester->name }})</span>
                                                        </a>
                                                    </li>
                                                @empty
                                                    <span>No Semester</span>
                                                @endforelse

                                            </ul>
                                        </li>
                                    @empty
                                        <span>No Classe</span>
                                    @endforelse
                                </ul>
                            </li>
                        @empty
                            <span>No Option for {{ $departement->name }}</span>
                        @endforelse
                    @endif
                @empty
                    <span>No Department</span>
                @endforelse

            </ul>
        </li>

        {{-- Generated documents management menu --}}
        <li>
            <a href="#" onClick="return false;" class="menu-toggle">
                <i class="menu-icon fas fa-file-pdf"></i>
                <span>Documents</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <span>Grade transcripts</span>
                    </a>
                    <ul class="ml-menu">
                        @forelse ($departements as $departement)
                            @if (Auth::user()->right->title == 'isAdmin')
                                <li>
                                    <a href="#" onClick="return false;" class="menu-toggle">
                                        <span>{{ $departement->name }}</span>
                                    </a>
                                    <ul class="ml-menu">
                                        @forelse ($departement->branches as $branche)
                                            <li>
                                                <a href="#" onClick="return false;" class="menu-toggle">
                                                    <span>{{ $branche->name }}</span>
                                                </a>
                                                <ul class="ml-menu">

                                                    @forelse ($branche->levels as $level)
                                                        <li>
                                                            <a title="grade_transcript" href="{{ route('grades') }}"
                                                                id="{{ 'gt' . $departement->id . $level->id . '_' . $level->id }}"
                                                                onClick="setActiveId(this.id, this.title)">
                                                                <span>{{ $level->label }}
                                                                    ({{ $level->name }})</span>
                                                            </a>
                                                        </li>
                                                    @empty
                                                        <span>No Classe for this department</span>
                                                    @endforelse
                                                </ul>
                                            </li>
                                        @empty
                                            <span>No Option for {{ $departement->name }}</span>
                                        @endforelse

                                    </ul>
                                </li>
                            @else
                                @forelse ($departement->branches as $branche)
                                    <li>
                                        <a href="#" onClick="return false;" class="menu-toggle">
                                            <span>{{ $branche->name }}</span>
                                        </a>
                                        <ul class="ml-menu">
                                            @forelse ($branche->levels as $level)
                                                <li>
                                                    <a title="grade_transcript" href="{{ route('grades') }}"
                                                        id="{{ 'gt' . $departement->id . $level->id . '_' . $level->id }}"
                                                        onClick="setActiveId(this.id,this.title)">
                                                        <span>{{ $level->label }} ({{ $level->name }})</span>
                                                    </a>
                                                </li>
                                            @empty
                                                <span>No Classe for this department</span>
                                            @endforelse
                                        </ul>
                                    </li>
                                @empty
                                    <span>No Option for {{ $departement->name }}</span>
                                @endforelse
                            @endif
                        @empty
                            <h3>No Department</h3>
                        @endforelse
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <span>Certificates</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ /*route('certificates')*/ '#' }}" id="CS1" onClick="setActiveId('CS1')">
                                <span>in Production</span>
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
                <div class="progress-list m-b-10">
                    <div class="details">
                        <div class="title">Year</div>
                    </div>
                    <div class="status">
                        <span>79 %</span>
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
        function setActiveId(id, title) {
            console.log(id);
            currentActivedb.setItem('currentActive', id);

            switch (title) {
                case 'students_list':
                    // whent it is about student list
                    console.log(id.split('_')[id.split('_').length - 1]);
                    currentActivedb.setItem('students_list', JSON.stringify({
                        'year': 0,
                        'classID': id.split('_')[id.split('_').length - 1]
                    }))
                    break;
                case 'marks_management':
                    // Marks management parts
                    console.log(id.split('_')[id.split('_').length - 1]);
                    currentActivedb.setItem('marks_management', JSON.stringify({
                        'year': 0,
                        'semesterID': id.split('_')[id.split('_').length - 1]
                    }))
                    break;
                case 'average_management':
                    // Average part
                    console.log(id);
                    console.log(id.split('_')[id.split('_').length - 1]);
                    currentActivedb.setItem('average_management', JSON.stringify({
                        'year': 0,
                        'semesterID': id.split('_')[id.split('_').length - 1]
                    }))
                    break;
                case 'grade_transcript':
                    // grade transcript part
                    // console.log(id);
                    console.log(id.split('_')[id.split('_').length - 1]);
                    currentActivedb.setItem('grade_transcript', JSON.stringify({
                        'year': 0,
                        'classID': id.split('_')[id.split('_').length - 1]
                    }))
                    break;
                default:
                    console.log('defau');
                    break;
            }
        }
    </script>
</div>
