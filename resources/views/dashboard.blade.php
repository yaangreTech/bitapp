<x-app-layout filtrage='false'>
    <x-slot name="custom_css">
        <link rel="stylesheet" type="text/css" href="assets/css/style2.css">
    </x-slot>
    <x-slot name="custom_js">
        <script src="assets/js/chart.min.js"></script>
        {{-- customs --}}
        <script src="assets/js/bundles/echart/echarts.js"></script>
        {{-- <script src="assets/js/bundles/apexcharts/apexcharts.min.js"></script> --}}
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
                                            <span>{{$departments->count()}}</span>
                                        </h2>
                                        <p>Departements</p>
                                    </div>
                                </div>
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
                                            <span>{{$options->count()}}</span>
                                        </h2>
                                        <p>Options</p>
                                    </div>
                                </div>
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
                                            <span>{{$levels->count()}}</span>
                                        </h2>
                                        <p>Classes</p>
                                    </div>
                                </div>
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
                                <div class="col-lg-7 col-7 pl-0">
                                    <div>
                                        <h2 class="col-cyan">
                                            <span>{{$students->count()}}</span>
                                        </h2>
                                        <p>Students</p>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="icon m-b-10">
                                <canvas id="infoboxChart4"></canvas>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Detail</strong>  of the distribution of students</h2>
                        </div>
                        <div class="body">
                            <div class="recent-report__chart">
                                <div id="echart_graph_line" class="chartsh"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- @endsection --}}
</x-app-layout>
