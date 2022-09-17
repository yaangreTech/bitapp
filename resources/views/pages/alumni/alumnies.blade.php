<x-app-layout filtrage='false'>
    <x-slot name="custom_css">
        <script> var action='alumniref';</script>
    </x-slot>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Alumnis</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="{{ route('dashboard') }}" onClick="setActiveId('Dashboard')">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            
                            <li class="breadcrumb-item active">Alumni</li>
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
                                            data-toggle="tab">All list</a>
                                    </li>
                                    <li class="nav-item tab-all">
                                        <a class="nav-link" href="#m_branches" data-toggle="tab">Employed</a>
                                    </li>
                                    <li class="nav-item tab-all p-l-20">
                                        <a class="nav-link" href="#m_TU" data-toggle="tab">Internes</a>
                                    </li>
                                    <li class="nav-item tab-all p-l-20">
                                        <a class="nav-link" href="#m_TU" data-toggle="tab">Students</a>
                                    </li>
                                </ul>
                           
                              
                            </div>
                        </div>
                    </div>
                    {{-- <div class="tab-content">
        
                        <div role="tabpanel" class="tab-pane active " id="m_Departements" aria-expanded="true">
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
                                                            <th class=""> Departement label </th>
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

                
                        <div role="tabpanel" class="tab-pane" id="m_branches" aria-expanded="false">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card project_widget">
                                        <div class="header">
                                            <h2><strong>Options </strong>Settings</h2>
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

            

                    
                        <div role="tabpanel" class="tab-pane active " id="m_TU" aria-expanded="false">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                        <strong>Tu</strong> Settings
                                    </h2>
                                    <ul class="header-dropdown m-r--5">
                                        <button data-toggle="modal" data-target="#add_TU" type="button"
                                            class="btn  btn-outline-info initier" onclick="$('#wizard_with_validation').addClass('TU_form');$('#wizard_with_validation').removeClass('TU_form_update');initialECU();">
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
                                                        <h3 type="button" class="">Options</h3>
                                                        <ul class="collapsible tu_departments">
                                                         
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
                                                            <thead id="tu_head">

                                                            </thead>

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

                    </div> --}}
                </div>

            </div>

        </div>


     
    </section>

    <x-slot name="custom_js">
        {{-- <script src="assets/js/table.min.js"></script>
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
        {{-- <script src="assets/js/bundles/rangeSlider/js/ion.rangeSlider.js"></script> --}} --}}
        {{-- <script src="assets/js/pages/ui/range-sliders.js"></script> --}}

    </x-slot>

</x-app-layout>