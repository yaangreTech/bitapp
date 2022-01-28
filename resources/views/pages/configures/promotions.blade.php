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


        <script src="../../assets/js/bundles/jquery-steps/jquery.steps.min.js"></script>
        <!-- Custom Js -->
        <script src="../../assets/js/pages/forms/form-wizard.js"></script>
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
                            <div class="contact-usertitle-job"> Engineer </div>
                        </div>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Created at</b>
                                <a class="pull-right"><span class="badge bg-blue">02-03-2019</span></a>
                            </li>
                            <li class="list-group-item">
                                Created Promotion
                                <a class="pull-right"><span class="badge bg-blue">Promotion 19</span></a>
                            </li>
                            <li class="list-group-item">
                                Number of Student
                                <a class="pull-right"><span class="badge bg-blue">130 Students</span></a>
                            </li>
                            <li class="list-group-item">
                                Duration
                                <a class="pull-right"><span class="badge bg-blue">100 days until today</span></a>
                            </li>
                            <li class="list-group-item">
                                Departements
                                <a class="pull-right"><span class="badge bg-blue">3 Departements</span></a>
                            </li>
                        </ul>
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
                                        <tr>
                                            <td class="tbl-checkbox">
                                                <label>
                                                    <input type="checkbox" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td class="">
                                                02-03-2019
                                            </td>
                                            <td class="center">---------</td>
                                            <td class="center">
                                                Promotion 19
                                            </td>
                                            <td class="center">
                                                <div class="badge col-green">Actual</div>
                                            </td>
                                            <td class="center">
                                                <button class="btn tblActnBtn">
                                                    <i class="material-icons">mode_edit</i>
                                                </button>
                                                <button class="btn tblActnBtn">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tbl-checkbox">
                                                <label>
                                                    <input type="checkbox" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td class="">
                                                02-03-2019
                                            </td>
                                            <td class="center">02-03-2020</td>
                                            <td class="center">
                                                Promotion 19
                                            </td>
                                            <td class="center">
                                                <div class="badge col-red">Ended</div>
                                            </td>
                                            <td class="center">
                                                <button class="btn tblActnBtn">
                                                    <i class="material-icons">mode_edit</i>
                                                </button>
                                                <button class="btn tblActnBtn">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tbl-checkbox">
                                                <label>
                                                    <input type="checkbox" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td class="">
                                                02-03-2019
                                            </td>
                                            <td class="center"> 02-03-2020</td>
                                            <td class="center">
                                                Promotion 19
                                            </td>
                                            <td class="center">
                                                <div class="badge col-red">Ended</div>
                                            </td>
                                            <td class="center">
                                                <button class="btn tblActnBtn">
                                                    <i class="material-icons">mode_edit</i>
                                                </button>
                                                <button class="btn tblActnBtn">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tbl-checkbox">
                                                <label>
                                                    <input type="checkbox" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td class="">
                                                02-03-2019
                                            </td>
                                            <td class="center">02-03-2020</td>
                                            <td class="center">
                                                Promotion 19
                                            </td>
                                            <td class="center">
                                                <div class="badge col-red">Ended</div>
                                            </td>
                                            <td class="center">
                                                <button class="btn tblActnBtn">
                                                    <i class="material-icons">mode_edit</i>
                                                </button>
                                                <button class="btn tblActnBtn">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tbl-checkbox">
                                                <label>
                                                    <input type="checkbox" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td class="">
                                                02-03-2019
                                            </td>
                                            <td class="center">02-03-2020</td>
                                            <td class="center">
                                                Promotion 19
                                            </td>
                                            <td class="center">
                                                <div class="badge col-red">Ended</div>
                                            </td>
                                            <td class="center">
                                                <button class="btn tblActnBtn">
                                                    <i class="material-icons">mode_edit</i>
                                                </button>
                                                <button class="btn tblActnBtn">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </td>
                                        </tr>

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
