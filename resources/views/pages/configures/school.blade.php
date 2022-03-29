<x-app-layout filtrage='false'>
    <x-slot name="custom_css">
        <link href="assets/css/form.min.css" rel="stylesheet">

        <link href="assets/js/bundles/rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="assets/js/bundles/rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    </x-slot>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">School Settings</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="{{ route('dashboard') }}" onClick="setActiveId('Dashboard')">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Configuration</a>
                            </li>
                            <li class="breadcrumb-item active">School Settings</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Tabs With Icon Title -->
            <div class="row clearfix">
                <div class=" col-md-12">
                    <div class="card">
                        <div class="profile-tab-box">
                            <div class="p-l-20">
                                <ul class="nav ">
                                    <li class="nav-item tab-all">
                                        <a class="nav-link active show" href="#m_Departements"
                                            data-toggle="tab">Departements Settings</a>
                                    </li>
                                    <li class="nav-item tab-all">
                                        <a class="nav-link" href="#m_branches" data-toggle="tab">Option
                                            Settings</a>
                                    </li>
                                    {{-- <li class="nav-item tab-all p-l-20">
                                        <a class="nav-link" href="#m_Semesters" data-toggle="tab">Semesters
                                            Settings</a>
                                    </li>
                                    <li class="nav-item tab-all">
                                        <a class="nav-link" href="#m_Classes" data-toggle="tab">Classes
                                            Settings</a>
                                    </li> --}}
                                    <li class="nav-item tab-all p-l-20">
                                        <a class="nav-link" href="#m_TU" data-toggle="tab">TU && ECU Settings</a>
                                    </li>
                                    {{-- <li class="nav-item tab-all p-l-20">
                                        <a class="nav-link" href="#m_Modulus" data-toggle="tab">Modulus
                                            Settings</a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        {{-- departments views --}}
                        <div role="tabpanel" class="tab-pane active" id="m_Departements" aria-expanded="true">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card project_widget">
                                        <div class="header">
                                            <h2><strong>Departements </strong>Settings</h2>
                                            <ul class="header-dropdown m-r--5">
                                                <button data-toggle="modal" data-target="#add_department" type="button"
                                                    class="btn  btn-outline-info initier">
                                                    <i class="material-icons">
                                                        add_circle_outline</i>
                                                    <span>new Departement</span>
                                                </button>
                                            </ul>
                                        </div>
                                        <div class="body">
                                            <div class="table-responsive">
                                                <table id="departement_table" class="table table-hover  ">
                                                    <thead>
                                                        <tr>
                                                            <th class=""> Departement Name </th>
                                                            <th class=""> Options </th>
                                                            <th class=""> Created at </th>
                                                            <th class=""> Head of Departement </th>
                                                            <th class=""> Status </th>
                                                            <th class=""> Action </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="department_body">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        {{-- branches view --}}
                        <div role="tabpanel" class="tab-pane" id="m_branches" aria-expanded="false">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card project_widget">
                                        <div class="header">
                                            <h2><strong>Branches </strong>Settings</h2>
                                            <ul class="header-dropdown m-r--5">
                                                <button data-toggle="modal" data-target="#add_branch" type="button"
                                                    class="btn  btn-outline-info initier">
                                                    <i class="material-icons">
                                                        add_circle_outline</i>
                                                    <span>new Branch</span>
                                                </button>
                                            </ul>
                                        </div>
                                        <div class="body">
                                            <div class="table-responsive">
                                                <table id="branches_table" class="table table-hover  ">
                                                    <tbody 
                                                    id="branches_body"
                                                    >
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        {{-- semesters view --}}
                        {{-- <div role="tabpanel" class="tab-pane" id="m_Semesters" aria-expanded="false">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                        <strong>Semesters</strong> Settings
                                    </h2>
                                    <ul class="header-dropdown m-r--5">
                                        <button data-toggle="modal" data-target="#add_semester" type="button"
                                            class="btn  btn-outline-info initier">
                                            <i class="material-icons">
                                                add_circle_outline</i>
                                            <span>new semester</span>
                                        </button>
                                    </ul>
                                </div>
                                <div class="body">
                                    <div class="table-responsive">
                                        <table id="semester_table" class="table table-hover  contact_list">
                                            <thead>
                                                <tr>
                                                    <th class=""> Semester </th>
                                                    <th class=""> Classes </th>
                                                    <th class=""> Status </th>
                                                    <th class=""> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody id='semester_body'>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div> --}}

                        {{-- classes view --}}
                        {{-- <div role="tabpanel" class="tab-pane" id="m_Classes" aria-expanded="false">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                        <strong>Classes</strong> Settings
                                    </h2>
                                    <ul class="header-dropdown m-r--5">
                                        <button data-toggle="modal" data-target="#add_class" type="button"
                                            class="btn  btn-outline-info initier">
                                            <i class="material-icons">
                                                add_circle_outline</i>
                                            <span>new classe</span>
                                        </button>
                                    </ul>
                                </div>
                                <div class="body">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                            <div class="card">
                                                <div class="body">
                                                    <div id="mail-nav">
                                                        <h3 type="button" class="">Departements</h3>
                                                        <ul class="classes_departments" id="mail-folders">
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                                            <div class="card">
                                                <div class="boxs mail_listing">
                                                    <div class="inbox-center table-responsive">
                                                        <table  id="classe_table" class="table table-hover">
                                                            <tbody id="classe_body">

                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> --}}

                        {{-- tus view --}}
                        <div role="tabpanel" class="tab-pane" id="m_TU" aria-expanded="false">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                        <strong>Tu</strong> Settings
                                    </h2>
                                    <ul class="header-dropdown m-r--5">
                                        <button data-toggle="modal" data-target="#add_TU" type="button"
                                            class="btn  btn-outline-info initier">
                                            <i class="material-icons">
                                                add_circle_outline</i>
                                            <span>new TU</span>
                                        </button>
                                </div>


                                <div class="body">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                            <div class="card">
                                                <div class="body">
                                                    <div id="mail-nav">
                                                        <h3 type="button" class="">Departements</h3>
                                                        <ul class="collapsible tu_departments">
                                                            {{--  --}}
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                                            <div class="card">
                                                <div class="boxs mail_listing">
                                                    <div class="inbox-center table-responsive">
                                                        <table class="table table-hover">

                                                            <tbody id="tu_body">
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        {{-- modulus view --}}
                        {{-- <div role="tabpanel" class="tab-pane" id="m_Modulus" aria-expanded="false">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                        <strong>Modulus</strong> Settings
                                    </h2>
                                    <ul class="header-dropdown m-r--5">
                                        <button data-toggle="modal" data-target="#add_modulus" type="button"
                                            class="btn  btn-outline-info initier">
                                            <i class="material-icons">
                                                add_circle_outline</i>
                                            <span>new Modulus</span>
                                        </button>
                                </div>
                                <div class="body">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                            <div class="card">
                                                <div class="body">
                                                    <div id="mail-nav">
                                                        <h3 type="button" class="">Departements</h3>
                                                        <ul class="collapsible modulus_departments">

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                                            <div class="card">
                                                <div class="boxs mail_listing">
                                                    <div class="inbox-center table-responsive">
                                                        <table id="modulus_table" class="table table-hover">

                                                            <tbody id="modulus_body">

                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>

            </div>

        </div>


        {{-- forms --}}
        <x-department-form />
        <x-branch-form />
        {{-- <x-semester-form /> --}}
        {{-- <x-class-form /> --}}
        <x-modulus-form />
        <x-tu-form />
    </section>

    <x-slot name="custom_js">
        <script src="assets/js/table.min.js"></script>
        <!-- Custom Js -->
        <script src="assets/js/pages/tables/jquery-datatable.js"></script>
        <script src="assets/js/form.min.js"></script>

        <script src="assets/ajax/school_ajax.js"></script>
        <!-- Custom Js -->
        <script src="assets/js/pages/apps/chat.js"></script>
        <script src="assets/js/pages/forms/basic-form-elements.js"></script>

        <!-- Demo Js -->
        <script src="assets/js/pages/ui/collapse.js"></script>

        {{-- range  --}}
        <script src="assets/js/bundles/rangeSlider/js/ion.rangeSlider.js"></script>
        {{-- <script src="assets/js/pages/ui/range-sliders.js"></script> --}}

    </x-slot>
</x-app-layout>
