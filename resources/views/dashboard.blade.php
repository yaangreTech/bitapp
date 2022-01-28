<x-app-layout filtrage='false'>
    <x-slot name="custom_css">

        <link rel="stylesheet" type="text/css" href="assets/css/style2.css">

    </x-slot>

    <x-slot name="custom_js">

        <script src="assets/js/chart.min.js"></script>
        {{-- customs --}}
        <script src="assets/js/bundles/echart/echarts.js"></script>
        <script src="assets/js/bundles/apexcharts/apexcharts.min.js"></script>
        <script src="assets/js/pages/index.js"></script>
    </x-slot>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Dashboard</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="{{route('dashboard')}}" onClick="setActiveId('Dashboard')">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget info-box5 ">
                        <span class="dash-widget-bg1 m-r-35"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right pull-right m-l-35">
                            <h3>98</h3>
                            <span class="widget-title1">Users <i class="fa fa-check"
                                    aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3 ">
                    <div class="dash-widget info-box5">
                        <span class="dash-widget-bg2 m-r-20"><i class="fa fa-user-o"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>1072</h3>
                            <span class="widget-title2">Departments <i class="fa fa-check"
                                    aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget info-box5">
                        <span class="dash-widget-bg3 m-r-70"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>72</h3>
                            <span class="widget-title3">Classes <i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget info-box5">
                        <span class="dash-widget-bg4 m-r-70"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>618</h3>
                            <span class="widget-title4">Students <i class="fa fa-check"
                                    aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-5 col-5">
                                    <span class="info-box-icon"><i class="material-icons">work</i></span>
                                </div>
                                <div class="col-lg-7 col-7">
                                    <div>
                                        <h2 class="col-purple">
                                            <span>125</span>
                                        </h2>
                                        <p>Projects</p>
                                    </div>
                                </div>
                            </div>
                            <div class="icon m-b-10">
                                <canvas id="infoboxChart1"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-5 col-5">
                                    <span class="info-box-icon"><i class="material-icons">group</i></span>
                                </div>
                                <div class="col-lg-7 col-7">
                                    <div>
                                        <h2 class="col-green">
                                            <span>213</span>
                                        </h2>
                                        <p>New Employee</p>
                                    </div>
                                </div>
                            </div>
                            <div class="icon m-b-10">
                                <canvas id="infoboxChart2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-5 col-5">
                                    <span class="info-box-icon"><i class="material-icons">local_activity</i></span>
                                </div>
                                <div class="col-lg-7 col-7">
                                    <div>
                                        <h2 class="col-orange">
                                            <span>145</span>
                                        </h2>
                                        <p>Tasks</p>
                                    </div>
                                </div>
                            </div>
                            <div class="icon m-b-10">
                                <canvas id="infoboxChart3"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-5 col-5">
                                    <span class="info-box-icon"><i class="material-icons">monetization_on</i></span>
                                </div>
                                <div class="col-lg-7 col-7 pl-0">
                                    <div>
                                        <h2 class="col-cyan">
                                            $<span>2753</span>
                                        </h2>
                                        <p>Earning</p>
                                    </div>
                                </div>
                            </div>
                            <div class="icon m-b-10">
                                <canvas id="infoboxChart4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Revenue</strong> Report
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
                            <div class="recent-report__chart">
                                <canvas id="desktop-chart1"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Revenue</strong> Report
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
                            <div class="recent-report__chart">
                                <div id="echart_graph_line" class="chartsh"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Project</strong> Details
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
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Project</th>
                                            <th>Team</th>
                                            <th>Priority</th>
                                            <th>Status</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Project A</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm"><img class="rounded-circle"
                                                            src="assets/images/user/user1.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm"><img class="rounded-circle"
                                                            src="assets/images/user/user2.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm"><img class="rounded-circle"
                                                            src="assets/images/user/user3.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm"><span
                                                            class="badge">+4</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td><span class="badge col-orange">High</span></td>
                                            <td>
                                                <div class="progress-xs not-rounded progress shadow-style">
                                                    <div class="progress-bar progress-bar-danger width-per-40"
                                                        role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        <span class="sr-only">40%</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$150.00</td>
                                        </tr>
                                        <tr>
                                            <td>Project B</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm"><img class="rounded-circle"
                                                            src="assets/images/user/user4.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm"><img class="rounded-circle"
                                                            src="assets/images/user/user5.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm"><span
                                                            class="badge">+3</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td><span class="badge col-cyan">Medium</span></td>
                                            <td>
                                                <div class="progress-xs not-rounded progress shadow-style">
                                                    <div class="progress-bar progress-bar-lightred width-per-60"
                                                        role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        <span class="sr-only">60%</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$470.00</td>
                                        </tr>
                                        <tr>
                                            <td>Project C</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm"><img class="rounded-circle"
                                                            src="assets/images/user/user1.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm"><img class="rounded-circle"
                                                            src="assets/images/user/user2.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm"><img class="rounded-circle"
                                                            src="assets/images/user/user3.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm"><span
                                                            class="badge">+4</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td><span class="badge col-orange">High</span></td>
                                            <td>
                                                <div class="progress-xs not-rounded progress shadow-style">
                                                    <div class="progress-bar progress-bar-warning width-per-40"
                                                        role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        <span class="sr-only">40%</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$564.00</td>
                                        </tr>
                                        <tr>
                                            <td>Project D</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm"><img class="rounded-circle"
                                                            src="assets/images/user/user6.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm"><img class="rounded-circle"
                                                            src="assets/images/user/user7.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm"><img class="rounded-circle"
                                                            src="assets/images/user/user8.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm"><span
                                                            class="badge">+4</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td><span class="badge col-green">Low</span></td>
                                            <td>
                                                <div class="progress-xs not-rounded progress shadow-style">
                                                    <div class="progress-bar progress-bar-success width-per-45"
                                                        role="progressbar" aria-valuenow="45" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        <span class="sr-only">45%</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$925.00</td>
                                        </tr>
                                        <tr>
                                            <td>Project E</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm"><img class="rounded-circle"
                                                            src="assets/images/user/user8.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm"><img class="rounded-circle"
                                                            src="assets/images/user/user9.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm"><span
                                                            class="badge">+1</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td><span class="badge col-cyan">Medium</span></td>
                                            <td>
                                                <div class="progress-xs not-rounded progress shadow-style">
                                                    <div class="progress-bar progress-bar-lightred width-per-80"
                                                        role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        <span class="sr-only">80%</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$785.00</td>
                                        </tr>
                                        <tr>
                                            <td>Project G</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm"><img class="rounded-circle"
                                                            src="assets/images/user/user1.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm"><img class="rounded-circle"
                                                            src="assets/images/user/user6.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm"><img class="rounded-circle"
                                                            src="assets/images/user/user8.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm"><span
                                                            class="badge">+3</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td><span class="badge col-green">Low</span></td>
                                            <td>
                                                <div class="progress-xs not-rounded progress shadow-style">
                                                    <div class="progress-bar progress-bar-success width-per-40"
                                                        role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        <span class="sr-only">40%</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$270.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                <!-- Browser Usage -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>TODO </strong>List
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
                            <div class="tdl-content">
                                <ul class="to-do-list ui-sortable">
                                    <li class="clearfix">
                                        <div class="form-check m-l-10">
                                            <label class="form-check-label"> <input class="form-check-input"
                                                    type="checkbox" value="">
                                                Add salary details in system <span class="form-check-sign"> <span
                                                        class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="todo-actionlist pull-right clearfix">
                                            <a href="#"> <i class="material-icons">clear</i>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <div class="form-check m-l-10">
                                            <label class="form-check-label"> <input class="form-check-input"
                                                    type="checkbox" value="">
                                                Announcement for holiday <span class="form-check-sign"> <span
                                                        class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="todo-actionlist pull-right clearfix">
                                            <a href="#"> <i class="material-icons">clear</i>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <div class="form-check m-l-10">
                                            <label class="form-check-label"> <input class="form-check-input"
                                                    type="checkbox" value="">
                                                call bus driver <span class="form-check-sign"> <span
                                                        class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="todo-actionlist pull-right clearfix">
                                            <a href="#"> <i class="material-icons">clear</i>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <div class="form-check m-l-10">
                                            <label class="form-check-label"> <input class="form-check-input"
                                                    type="checkbox" value="">
                                                Office Picnic <span class="form-check-sign"> <span
                                                        class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="todo-actionlist pull-right clearfix">
                                            <a href="#"> <i class="material-icons">clear</i>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <div class="form-check m-l-10">
                                            <label class="form-check-label"> <input class="form-check-input"
                                                    type="checkbox" value="">
                                                Website Must Be Finished <span class="form-check-sign"> <span
                                                        class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="todo-actionlist pull-right clearfix">
                                            <a href="#"> <i class="material-icons">clear</i>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <div class="form-check m-l-10">
                                            <label class="form-check-label"> <input class="form-check-input"
                                                    type="checkbox" value="">
                                                Recharge My Mobile <span class="form-check-sign"> <span
                                                        class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="todo-actionlist pull-right clearfix">
                                            <a href="#"> <i class="material-icons">clear</i>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <div class="form-check m-l-10">
                                            <label class="form-check-label"> <input class="form-check-input"
                                                    type="checkbox" value="">
                                                Add salary details in system <span class="form-check-sign"> <span
                                                        class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="todo-actionlist pull-right clearfix">
                                            <a href="#"> <i class="material-icons">clear</i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <input type="text" class="tdl-new form-control-radious" placeholder="Enter Todo...">
                        </div>
                    </div>
                </div>
                <!-- #END# Browser Usage -->
            </div>

            {{-- <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Revenue</strong> Chart</h2>
                        </div>
                        <div class="body">
                            <div class="recent-report__chart">
                                <div id="chart1"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Profit</strong> Chart</h2>
                        </div>
                        <div class="body">
                            <div class="recent-report__chart">
                                <div id="chart2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="row clearfix">
                <!-- Spinners -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Spinner</strong>
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
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="input-group spinner" data-trigger="spinner">
                                        <div class="form-line">
                                            <input type="text" class="form-control text-center" value="1"
                                                data-rule="quantity">
                                        </div>
                                        <span class="input-group-addon">
                                            <a href="javascript:;" class="spin-up" data-spin="up">
                                                <i class="material-icons">keyboard_arrow_up</i>
                                            </a>
                                            <a href="javascript:;" class="spin-down" data-spin="down">
                                                <i class="material-icons">keyboard_arrow_down</i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group spinner" data-trigger="spinner">
                                        <div class="form-line">
                                            <input type="text" class="form-control text-center" value="1"
                                                data-rule="currency">
                                        </div>
                                        <span class="input-group-addon">
                                            <a href="javascript:;" class="spin-up" data-spin="up">
                                                <i class="material-icons">keyboard_arrow_up</i>
                                            </a>
                                            <a href="javascript:;" class="spin-down" data-spin="down">
                                                <i class="material-icons">keyboard_arrow_down</i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Spinners -->
                <!-- Tags Input -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Tags</strong> Input
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
                            <div class="form-group demo-tagsinput-area">
                                <div class="form-line">
                                    <input type="text" class="form-control" data-role="tagsinput"
                                        value="Amsterdam,Washington,Sydney,Beijing,Cairo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Tags Input -->
            </div>


        </div>
    </section>

    {{-- @endsection --}}
</x-app-layout>
