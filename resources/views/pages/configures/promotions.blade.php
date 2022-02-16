<x-app-layout filtrage='false'>
    <x-slot name="custom_css">
        <link href="assets/css/form.min.css" rel="stylesheet">
    </x-slot>

    <x-slot name="custom_js">
        <script src="assets/js/table.min.js"></script>
        <script src="assets/js/form.min.js"></script>
        <!-- Custom Js -->
        <script src="assets/js/pages/tables/jquery-datatable.js"></script>
        <script src="assets/js/pages/forms/basic-form-elements.js"></script>


        {{-- <script src="assets/js/bundles/jquery-steps/jquery.steps.min.js"></script> --}}
        <!-- Custom Js -->
        <script src="assets/ajax/promotion_ajax.js"></script>
        {{-- <script src="assets/js/pages/forms/form-wizard.js"></script> --}}
    </x-slot>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Promotions</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="{{ route('dashboard') }}"  onClick="setActiveId('Dashboard')">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Configurations</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Organisation</a>
                            </li>
                            <li class="breadcrumb-item active">Promotions</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

                    <div class="card body">
                        <div class="contact-usertitle">
                            <div class="contact-usertitle-name"> Actual School year</div>
                            {{-- <div class="contact-usertitle-job"> Engineer </div> --}}
                        </div>
                        @if ($years->count()>0)
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Created at</b>
                                <a class="pull-right"><span class="badge bg-blue">{{$years->first()->created_at}}</span></a>
                            </li>
                            <li class="list-group-item">
                            Promotion
                                <a class="pull-right"><span class="badge bg-blue">{{$years->first()->promotion->name}}</span></a>
                            </li>
                            <li class="list-group-item">
                                Number of Student
                                <a class="pull-right"><span class="badge bg-blue">{{$years->first()->inscriptions->count()}} Students</span></a>
                            </li>
                            <li class="list-group-item">
                                Duration
                                <a class="pull-right"><span class="badge bg-blue">{{round((time()-strtotime($years->first()->start_date))/(60 * 60 * 24))}} days until today</span></a>
                            </li>
                           
                        </ul>
                        @else
                            <h3 class="center">No School year</h3>
                        @endif
                        <div class="newLabelBtn">
                            <button type="button" data-toggle="modal" data-target="#add_promotion"
                                class="btn btn-border-radius bg-purple waves-effect">Start new year</button>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example contact_list">
                                    <thead>
                                        <tr>
                                            <th class="center"></th>
                                            <th class="center">Start Date</th>
                                            <th class="center">End Date</th>
                                            <th class="center">created promotion</th>
                                            <th class="center">Statut</th>
                                            <th class="center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($years as $year)
                                        <tr>
                                            <td class="tbl-checkbox">
                                                <label>
                                                    <input type="checkbox" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td class="">
                                                {{$year->start_date}}
                                            </td>
                                            <td class="center">{{$year->end_date==null ?'---':$year->end_date}} </td>
                                            <td class="center">
                                                {{$year->promotion->name}}
                                            </td>
                                            <td class="center">
                                                @if ($year->end_date==null)
                                                <div class="badge col-green">Actual</div>
                                                @else
                                                <div class="badge col-red">ended</div>  
                                                @endif
                                               
                                            </td>
                                            <td class="center">
                                                {{-- <button class="btn tblActnBtn">
                                                    <i class="material-icons">mode_edit</i>
                                                </button> --}}
                                                <button onclick="delete_Year({{$year->id}})" class="btn tblActnBtn">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </td>
                                        </tr> 
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- forms --}}
        <x-promotion-form />
    </section>

</x-app-layout>
