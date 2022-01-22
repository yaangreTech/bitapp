<x-app-layout>
    <x-slot name="custom_css">
        <link href="assets/css/form.min.css" rel="stylesheet">
    </x-slot>

    <x-slot name="custom_js">
        <script src="assets/js/table.min.js"></script>
        <!-- Custom Js -->
        <script src="assets/js/pages/tables/jquery-datatable.js"></script>
        <script src="assets/js/form.min.js"></script>
        <!-- Custom Js -->
        <script src="assets/js/pages/apps/chat.js"></script>
        <script src="assets/js/pages/forms/basic-form-elements.js"></script>

        <!-- Demo Js -->
        <script src="../../assets/js/pages/ui/collapse.js"></script>
    </x-slot>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">School</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="{{ route('dashboard') }}">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Configuration</a>
                            </li>
                            <li class="breadcrumb-item active">School</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Tabs With Icon Title -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>School</strong> Configuration
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="#" onClick="return false;">Action</a>
                                        </li>
                                        <li>
                                            <a href="#" onClick="return false;">Another action</a>
                                        </li>
                                        <li>
                                            <a href="#" onClick="return false;">Something else here</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation">
                                    <a href="#home_with_icon_title" data-toggle="tab" class="active show">
                                        <i class="material-icons">home</i> Departments
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#profile_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">face</i> Semesters
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#messages_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">email</i> Classes
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#settings_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">settings</i> Modulus
                                    </a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">

                                {{-- for departments --}}
                                <div role="tabpanel" class="tab-pane fade in active show" id="home_with_icon_title">
                                    <div class="table-responsive">
                                        <table class="table table-hover js-basic-example contact_list">
                                            <thead>
                                                <tr>
                                                    <th class=""> Departement Name </th>
                                                    <th class=""> Classes </th>
                                                    <th class=""> Created at </th>
                                                    <th class=""> Actual Team </th>
                                                    <th class=""> Status </th>
                                                    <th class=""> Progress</th>
                                                    <th class=""> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd gradeX">
                                                    <td class="">Computer Science</td>
                                                    <td class=""><span class="badge bg-white">3
                                                            Classes</span></td>
                                                    <td class="">11-10-2018</td>
                                                    <td class="text-truncate ">
                                                        <ul class="list-unstyled order-list">
                                                            <li class="avatar avatar-sm">
                                                                <img class="rounded-circle"
                                                                    src="assets/images/user/loug.png" alt="user">
                                                            </li>
                                                            <li class="avatar avatar-sm">
                                                                <img class="rounded-circle"
                                                                    src="assets/images/user/loug.png" alt="user">
                                                            </li>
                                                            <li class="avatar avatar-sm">
                                                                <img class="rounded-circle"
                                                                    src="assets/images/user/loug.png" alt="user">
                                                            </li>
                                                            <li class="avatar avatar-sm">
                                                                <span class="badge">+2</span>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td class="">
                                                        <div class="badge col-green">Active</div>
                                                    </td>
                                                    <td class="">
                                                        <div class="progress-xs not-rounded progress">
                                                            <div class="progress-bar progress-bar-success"
                                                                role="progressbar" aria-valuenow="25" aria-valuemin="0"
                                                                aria-valuemax="100" style="width: 25%">
                                                                <span class="sr-only">25%</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="center">
                                                        <a href="#" class="btn btn-tbl-edit">
                                                            <i class="material-icons">create</i>
                                                        </a>
                                                        <a href="#" class="btn btn-tbl-delete">
                                                            <i class="material-icons">delete_forever</i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td class="">Electrical Engineering</td>
                                                    <td class=""><span class="badge bg-white">3
                                                            Classes</span></td>
                                                    <td class="">02-03-2019</td>
                                                    <td class="text-truncate ">
                                                        <ul class="list-unstyled order-list">
                                                            <li class="avatar avatar-sm">
                                                                <img class="rounded-circle"
                                                                    src="assets/images/user/loug.png" alt="user">
                                                            </li>
                                                            <li class="avatar avatar-sm">
                                                                <img class="rounded-circle"
                                                                    src="assets/images/user/loug.png" alt="user">
                                                            </li>
                                                            <li class="avatar avatar-sm">
                                                                <img class="rounded-circle"
                                                                    src="assets/images/user/loug.png" alt="user">
                                                            </li>
                                                            <li class="avatar avatar-sm">
                                                                <span class="badge">+4</span>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td class="">
                                                        <div class="badge col-orange">Pending</div>
                                                    </td>
                                                    <td class="">
                                                        <div class="progress-xs not-rounded progress">
                                                            <div class="progress-bar progress-bar-warning"
                                                                role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                                aria-valuemax="100" style="width: 40%">
                                                                <span class="sr-only">40%</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="center">
                                                        <a href="#" class="btn btn-tbl-edit">
                                                            <i class="material-icons">create</i>
                                                        </a>
                                                        <a href="#" class="btn btn-tbl-delete">
                                                            <i class="material-icons">delete_forever</i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td class="">Mechanical Engineering</td>
                                                    <td class=""><span class="badge bg-white">3
                                                            Classes</span></td>
                                                    <td class="">18-12-2018</td>
                                                    <td class="text-truncate ">
                                                        <ul class="list-unstyled order-list">
                                                            <li class="avatar avatar-sm">
                                                                <img class="rounded-circle"
                                                                    src="assets/images/user/loug.png" alt="user">
                                                            </li>
                                                            <li class="avatar avatar-sm">
                                                                <img class="rounded-circle"
                                                                    src="assets/images/user/loug.png" alt="user">
                                                            </li>
                                                            <li class="avatar avatar-sm">
                                                                <img class="rounded-circle"
                                                                    src="assets/images/user/loug.png" alt="user">
                                                            </li>
                                                            <li class="avatar avatar-sm">
                                                                <span class="badge">+7</span>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td class="">
                                                        <div class="badge col-green">Active</div>
                                                    </td>
                                                    <td class="">
                                                        <div class="progress-xs not-rounded progress">
                                                            <div class="progress-bar progress-bar-success"
                                                                role="progressbar" aria-valuenow="56" aria-valuemin="0"
                                                                aria-valuemax="100" style="width: 56%">
                                                                <span class="sr-only">56%</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="center">
                                                        <a href="#" class="btn btn-tbl-edit">
                                                            <i class="material-icons">create</i>
                                                        </a>
                                                        <a href="#" class="btn btn-tbl-delete">
                                                            <i class="material-icons">delete_forever</i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                {{-- For semesters --}}
                                <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                                    <div class="table-responsive">
                                        <table class="table table-hover js-basic-example contact_list">
                                            <thead>
                                                <tr>
                                                    <th class=""> Semester </th>
                                                    <th class=""> Modulus </th>
                                                    <th class=""> Status </th>
                                                    <th class=""> Progress</th>
                                                    <th class=""> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd gradeX">
                                                    <td class="">Semester 1</td>
                                                    <td class=""><span class="badge bg-teal">10
                                                            Modulus</span></td>
                                                    <td class="">
                                                        <div class="badge col-green">Active</div>
                                                    </td>
                                                    <td class="">
                                                        <div class="progress-xs not-rounded progress">
                                                            <div class="progress-bar progress-bar-success"
                                                                role="progressbar" aria-valuenow="25" aria-valuemin="0"
                                                                aria-valuemax="100" style="width: 25%">
                                                                <span class="sr-only">25%</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="center">
                                                        <a href="#" class="btn btn-tbl-edit">
                                                            <i class="material-icons">create</i>
                                                        </a>
                                                        <a href="#" class="btn btn-tbl-delete">
                                                            <i class="material-icons">delete_forever</i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td class="">Semester 2</td>
                                                    <td class=""><span class="badge bg-teal">10
                                                            Modulus</span></td>
                                                    <td class="">
                                                        <div class="badge col-orange">Pending</div>
                                                    </td>
                                                    <td class="">
                                                        <div class="progress-xs not-rounded progress">
                                                            <div class="progress-bar progress-bar-warning"
                                                                role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                                aria-valuemax="100" style="width: 40%">
                                                                <span class="sr-only">40%</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="center">
                                                        <a href="#" class="btn btn-tbl-edit">
                                                            <i class="material-icons">create</i>
                                                        </a>
                                                        <a href="#" class="btn btn-tbl-delete">
                                                            <i class="material-icons">delete_forever</i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td class="">Semester 3</td>
                                                    <td class=""><span class="badge bg-teal">10
                                                            Modulus</span></td>
                                                    <td class="">
                                                        <div class="badge col-green">Active</div>
                                                    </td>
                                                    <td class="">
                                                        <div class="progress-xs not-rounded progress">
                                                            <div class="progress-bar progress-bar-success"
                                                                role="progressbar" aria-valuenow="56" aria-valuemin="0"
                                                                aria-valuemax="100" style="width: 56%">
                                                                <span class="sr-only">56%</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="center">
                                                        <a href="#" class="btn btn-tbl-edit">
                                                            <i class="material-icons">create</i>
                                                        </a>
                                                        <a href="#" class="btn btn-tbl-delete">
                                                            <i class="material-icons">delete_forever</i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                {{-- For classes --}}
                                <div role="tabpanel" class="tab-pane fade" id="messages_with_icon_title">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                            <div class="card">
                                                <div class="body">
                                                    <div id="mail-nav">
                                                        <h3 type="button" class="">Departements</h3>
                                                        <ul class="" id="mail-folders">
                                                            <li class="active">
                                                                <a href="#" title="Computer Science">Computer Science
                                                                    <span class="pull-right badge bg-orange">3</span>
                                                                </a>
                                                            </li>
                                                            <li class="">
                                                                <a href="#" title="Electrical Engineering">Electrical
                                                                    Engineering
                                                                    <span class="pull-right badge bg-orange">3</span>
                                                                </a>
                                                            </li>
                                                            <li class="">
                                                                <a href="#" title="Mechanical Engineering">Mechanical
                                                                    Engineering
                                                                    <span class="pull-right badge bg-orange">3</span>
                                                                </a>
                                                            </li>
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
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">
                                                                        <label class="form-check-label">
                                                                            <input type="checkbox">
                                                                            <span class="form-check-sign"></span>
                                                                        </label>
                                                                    </th>
                                                                    <th colspan="3">
                                                                        <div class="inbox-header">
                                                                            <div class="mail-option no-pad-left">
                                                                                <div class="email-btn-group m-l-15">

                                                                                    <a href="#"
                                                                                        class="col-dark-gray waves-effect m-r-20"
                                                                                        title="Delete">
                                                                                        <i
                                                                                            class="material-icons">delete</i>
                                                                                    </a>
                                                                                    <a href="#"
                                                                                        class="col-dark-gray waves-effect m-r-20"
                                                                                        title="refresh">
                                                                                        <i
                                                                                            class="material-icons">autorenew</i>
                                                                                    </a>
                                                                                    <a href="#"
                                                                                        class="col-dark-gray waves-effect m-r-20"
                                                                                        title="add new">
                                                                                        <i
                                                                                            class="material-icons">add_circle</i>
                                                                                    </a>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </th>
                                                                    <th class="hidden-xs" colspan="2">
                                                                        <div class="pull-right">
                                                                            <div class="email-btn-group m-l-15">
                                                                                <a href="#"
                                                                                    class="col-dark-gray waves-effect m-r-20"
                                                                                    title="back">
                                                                                    <i
                                                                                        class="material-icons">navigate_before</i>
                                                                                </a>
                                                                                <a href="#"
                                                                                    class="col-dark-gray waves-effect m-r-20"
                                                                                    title="Archive">
                                                                                    <i
                                                                                        class="material-icons">navigate_next</i>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="unread">
                                                                    <td class="tbl-checkbox">
                                                                        <label class="form-check-label">
                                                                            <input type="checkbox">
                                                                            <span class="form-check-sign"></span>
                                                                        </label>
                                                                    </td>
                                                                    <td class="hidden-xs">CS1</td>
                                                                    <td class="max-texts">
                                                                        <a href="#">
                                                                            <span
                                                                                class="label l-bg-purple shadow-style m-r-10">30</span>
                                                                            Students</a>
                                                                    </td>
                                                                    <td class="hidden-xs">
                                                                        <div class="badge col-green">Active</div>
                                                                    </td>
                                                                    <td class="text-right"><span
                                                                            class="badge bg-teal">5 Modulus</span>
                                                                    </td>
                                                                </tr>
                                                                <tr class="unread">
                                                                    <td class="tbl-checkbox">
                                                                        <label class="form-check-label">
                                                                            <input type="checkbox">
                                                                            <span class="form-check-sign"></span>
                                                                        </label>
                                                                    </td>
                                                                    <td class="hidden-xs">CS2</td>
                                                                    <td class="max-texts">
                                                                        <a href="#">
                                                                            <span
                                                                                class="label l-bg-purple shadow-style m-r-10">35</span>
                                                                            Students</a>
                                                                    </td>
                                                                    <td class="hidden-xs">
                                                                        <div class="badge col-green">Active</div>
                                                                    </td>
                                                                    <td class="text-right"> <span
                                                                            class="badge bg-teal">5 Modulus</span>
                                                                    </td>
                                                                </tr>
                                                                <tr class="unread">
                                                                    <td class="tbl-checkbox">
                                                                        <label class="form-check-label">
                                                                            <input type="checkbox">
                                                                            <span class="form-check-sign"></span>
                                                                        </label>
                                                                    </td>
                                                                    <td class="hidden-xs">CS3</td>
                                                                    <td class="max-texts">
                                                                        <a href="#">
                                                                            <span
                                                                                class="label l-bg-purple shadow-style m-r-10">50</span>
                                                                            Students</a>
                                                                    </td>
                                                                    <td class="hidden-xs">
                                                                        <div class="badge col-green">Active</div>
                                                                    </td>
                                                                    <td class="text-right"> <span
                                                                            class="badge bg-teal">5 Modulus</span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-7 ">
                                                            <p class="p-15">Showing 1 - 4 of 4</p>
                                                        </div>
                                                        <div class="col-sm-5 text-right">
                                                            <div class="pull-right p-15">
                                                                <button type="button" class="btn btn-primary">
                                                                    <i class="material-icons">navigate_before</i>
                                                                </button>
                                                                <button type="button" class="btn btn-primary">
                                                                    <i class="material-icons">navigate_next</i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- For modulus --}}
                                <div role="tabpanel" class="tab-pane fade" id="settings_with_icon_title">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                            <div class="card">
                                                <div class="body">
                                                    <div id="mail-nav">
                                                        <h3 type="button" class="">Departements</h3>
                                                        <ul class="collapsible">
                                                            <li>
                                                                <div class="collapsible-header">Computer Science
                                                                    <div style="position: absolute; right: 10px;"><i
                                                                            class="material-icons">keyboard_arrow_down</i>
                                                                    </div>
                                                                </div>
                                                                <div class="collapsible-body">
                                                                    <ul class="" id="mail-folders">
                                                                        <li class="active">
                                                                            <a href="#" title="Inbox">CS1
                                                                                <span
                                                                                    class="pull-right badge bg-orange">4</span>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="Sent">CS2
                                                                                <span
                                                                                class="pull-right badge bg-orange">4</span>
                                                                            </a>
                                                                            
                                                                        </li>
                                                                        <li>
                                                                            <a href="#;" title="Draft">CS3
                                                                                <span
                                                                                class="pull-right badge bg-orange">4</span>
                                                                            </a>
                                                                            
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="collapsible-header">Electrical Engineering
                                                                    <div style="position: absolute; right: 10px;"><i
                                                                            class="material-icons">keyboard_arrow_down</i>
                                                                    </div>
                                                                </div>
                                                                <div class="collapsible-body">
                                                                    <ul class="" id="mail-folders">
                                                                        <li class="active">
                                                                            <a href="#" title="EE1">EE1
                                                                                <span
                                                                                    class="pull-right badge bg-orange">3</span>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="EE2">EE2
                                                                                <span
                                                                                class="pull-right badge bg-orange">3</span>
                                                                            </a>
                                                                            
                                                                        </li>
                                                                        <li>
                                                                            <a href="#;" title="EE3">EE3
                                                                                <span
                                                                                class="pull-right badge bg-orange">3</span>
                                                                            </a>
                                                                            
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="collapsible-header">Mechanical Engineering
                                                                    <div style="position: absolute; right: 10px;"><i
                                                                            class="material-icons">keyboard_arrow_down</i>
                                                                    </div>
                                                                </div>
                                                                <div class="collapsible-body">
                                                                    <ul class="" id="mail-folders">
                                                                        <li class="active">
                                                                            <a href="#" title="ME1">ME1
                                                                                <span
                                                                                    class="pull-right badge bg-orange">5</span>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="ME2">ME2 <span
                                                                                    class="pull-right badge bg-orange">5</span></a>

                                                                        </li>
                                                                        <li>
                                                                            <a href="#;" title="ME3">ME3<span
                                                                                    class="pull-right badge bg-orange">5</span></a>

                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
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
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">
                                                                        <label class="form-check-label">
                                                                            <input type="checkbox">
                                                                            <span class="form-check-sign"></span>
                                                                        </label>
                                                                    </th>
                                                                    <th colspan="3">
                                                                        <div class="inbox-header">
                                                                            <div class="mail-option no-pad-left">
                                                                                <div class="email-btn-group m-l-15">

                                                                                    <a href="#"
                                                                                        class="col-dark-gray waves-effect m-r-20"
                                                                                        title="Delete">
                                                                                        <i
                                                                                            class="material-icons">delete</i>
                                                                                    </a>
                                                                                    <a href="#"
                                                                                        class="col-dark-gray waves-effect m-r-20"
                                                                                        title="refresh">
                                                                                        <i
                                                                                            class="material-icons">autorenew</i>
                                                                                    </a>
                                                                                    <a href="#"
                                                                                        class="col-dark-gray waves-effect m-r-20"
                                                                                        title="add new">
                                                                                        <i
                                                                                            class="material-icons">add_circle</i>
                                                                                    </a>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </th>
                                                                    <th class="hidden-xs" colspan="2">
                                                                        <div class="pull-right">
                                                                            <div class="email-btn-group m-l-15">
                                                                                <a href="#"
                                                                                    class="col-dark-gray waves-effect m-r-20"
                                                                                    title="back">
                                                                                    <i
                                                                                        class="material-icons">navigate_before</i>
                                                                                </a>
                                                                                <a href="#"
                                                                                    class="col-dark-gray waves-effect m-r-20"
                                                                                    title="Archive">
                                                                                    <i
                                                                                        class="material-icons">navigate_next</i>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="unread">
                                                                    <td class="tbl-checkbox">
                                                                        <label class="form-check-label">
                                                                            <input type="checkbox">
                                                                            <span class="form-check-sign"></span>
                                                                        </label>
                                                                    </td>
                                                                    <td class="hidden-xs">Mathmatic</td>
                                                                    <td class="hidden-xs">
                                                                        <div class="badge col-gray">Semester 1</div>
                                                                    </td>

                                                                    <td class="max-texts">
                                                                        <a href="#">
                                                                            <span
                                                                                class="label l-bg-orange shadow-style m-r-10">6</span>
                                                                            Credicts</a>
                                                                    </td>

                                                                    <td class="text-right"> <span
                                                                            class="badge bg-pink">120 Hours</span>
                                                                    </td>
                                                                </tr>
                                                                <tr class="unread">
                                                                    <td class="tbl-checkbox">
                                                                        <label class="form-check-label">
                                                                            <input type="checkbox">
                                                                            <span class="form-check-sign"></span>
                                                                        </label>
                                                                    </td>
                                                                    <td class="hidden-xs">Database</td>
                                                                    <td class="hidden-xs">
                                                                        <div class="badge col-gray">Semester 2</div>
                                                                    </td>
                                                                    <td class="max-texts">
                                                                        <a href="#">
                                                                            <span
                                                                                class="label l-bg-orange shadow-style m-r-10">6</span>
                                                                            Credicts</a>
                                                                    </td>
                                                                    <td class="text-right"> <span
                                                                            class="badge bg-pink">120 Hours</span>
                                                                    </td>
                                                                </tr>
                                                                <tr class="unread">
                                                                    <td class="tbl-checkbox">
                                                                        <label class="form-check-label">
                                                                            <input type="checkbox">
                                                                            <span class="form-check-sign"></span>
                                                                        </label>
                                                                    </td>
                                                                    <td class="hidden-xs">Python</td>
                                                                    <td class="hidden-xs">
                                                                        <div class="badge col-gray">Semester 1</div>
                                                                    </td>
                                                                    <td class="max-texts">
                                                                        <a href="#">
                                                                            <span
                                                                                class="label l-bg-orange shadow-style m-r-10">6</span>
                                                                            Credicts</a>
                                                                    </td>
                                                                    <td class="text-right"> <span
                                                                            class="badge bg-pink">120 Hours</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="tbl-checkbox">
                                                                        <label class="form-check-label">
                                                                            <input type="checkbox">
                                                                            <span class="form-check-sign"></span>
                                                                        </label>
                                                                    </td>
                                                                    <td class="hidden-xs">Statistics</td>
                                                                    <td class="hidden-xs">
                                                                        <div class="badge col-gray">Semester 2</div>
                                                                    </td>
                                                                    <td class="max-texts">
                                                                        <a href="#">
                                                                            <span
                                                                                class="label l-bg-orange shadow-style m-r-10">6</span>
                                                                            Credicts</a>
                                                                    </td>
                                                                    <td class="text-right"><span
                                                                            class="badge bg-pink">120 Hours</span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-7 ">
                                                            <p class="p-15">Showing 1 - 4 of 4</p>
                                                        </div>
                                                        <div class="col-sm-5 text-right">
                                                            <div class="pull-right p-15">
                                                                <button type="button" class="btn btn-primary">
                                                                    <i class="material-icons">navigate_before</i>
                                                                </button>
                                                                <button type="button" class="btn btn-primary">
                                                                    <i class="material-icons">navigate_next</i>
                                                                </button>
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
                </div>
            </div>
            <!-- #END# Tabs With Icon Title -->
        </div>
    </section>
</x-app-layout>
