<x-app-layout>
    <x-slot name="custom_css">
        <!-- Multi Select Css -->
        <link href="assets/js/bundles/multiselect/css/multi-select.css" rel="stylesheet">
        <!-- Plugins Core Css -->
        <link href="assets/css/form.min.css" rel="stylesheet">
    </x-slot>

    <x-slot name="custom_js">
        <script src="assets/js/form.min.js"></script>
        <script src="assets/js/bundles/multiselect/js/jquery.multi-select.js"></script>
        <script src="assets/js/bundles/jquery-steps/jquery.steps.min.js"></script>
        <!-- Custom Js -->
        <script src="../../assets/js/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script>
        <script src="assets/js/pages/forms/form-wizard.js"></script>
        <script src="assets/js/pages/forms/advanced-form-elements.js"></script>
    </x-slot>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Add new students</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="{{route('dashboard')}}">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Students management</a>
                            </li>
                            <li class="breadcrumb-item active">Add new student</li>
                        </ul>
                    </div>
                </div>
            </div>
         
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Add new student</strong> Form</h2>
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
                            <div id="wizard_horizontal">
                                <h2>Students references</h2>
                                <section class="section">
                                    <p>
                                        <div class="demo-masked-input">
                                            <div class="row clearfix">
                                                  {{-- students ID fied --}}
                                                  <div class="col-md-4">
                                                    <b>ID</b>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">access_time</i>
                                                        </span>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control ID" placeholder="Ex: bs00001">
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- First name field --}}
                                                <div class="col-md-4">
                                                    <b>First name</b>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">access_time</i>
                                                        </span>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control name"
                                                                placeholder="Ex: Sanou">
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Last name fied --}}
                                                <div class="col-md-4">
                                                    <b>Last mane</b>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">date_range</i>
                                                        </span>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control name"
                                                                placeholder="Ex: lougoudoro">
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Birthday field --}}
                                                <div class="col-md-4">
                                                    <b>BirthDate</b>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">date_range</i>
                                                        </span>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control date"
                                                                placeholder="Ex: 1999/07/10">
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Phone number field --}}
                                                <div class="col-md-4">
                                                    <b>Mobile Phone Number</b>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">phone_iphone</i>
                                                        </span>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control mobile-phone-number"
                                                                placeholder="Ex: 00 (000) 00-00-00-00">
                                                        </div>
                                                    </div>
                                                </div>
            
                                                {{-- Email adress Field --}}
                                                <div class="col-md-4">
                                                    <b>Email Address</b>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">email</i>
                                                        </span>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control email"
                                                                placeholder="Ex: example@example.com">
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Gender field --}}
                                                <div class="col-md-4">
                                                    <b>Gender</b>
                                                    <div class="form-group">
                                                        <label>
                                                            <input class="with-gap" name="group1" type="radio" checked />
                                                            <span>Male</span>
                                                        </label>
                                                        <label>
                                                            <input class="with-gap" name="group1" type="radio" />
                                                            <span>Female</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </p>
                                </section>

                                <h2>Students parents</h2>
                                <section class="section">
                                    <p>
                                        <div class="demo-masked-input">
                                            <div class="row clearfix">

                                                <div class="col-md-3">
                                                    <b>First name</b>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">access_time</i>
                                                        </span>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control"
                                                                placeholder="Ex: Soro">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <b>Last mane</b>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">date_range</i>
                                                        </span>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control "
                                                                placeholder="Ex: brahima">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <b>Mobile Phone Number</b>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">phone_iphone</i>
                                                        </span>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control mobile-phone-number"
                                                                placeholder="Ex: 00 (000) 000-00-00">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row clearfix">
                                                        <div class="col-md-6">
                                                            <label>Profession</label>
                                                            <select class="browser-default">
                                                                <option value="" disabled selected>Choose option</option>
                                                                <option value="1">Former</option>
                                                                <option value="2">House</option>
                                                                <option value="3">Seller</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Type</label>
                                                            <select class="browser-default">
                                                                <option value="" disabled selected>Choose option</option>
                                                                <option value="1">Father</option>
                                                                <option value="2">Mother</option>
                                                                <option value="3">Tutor</option>
                                                                <option value="3">Oncle</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <div class="row clearfix">
                                               <div>
                                                <button type="button" class="btn btn-outline-primary m-l-20">Add new parent</button>
                                               </div>
                                            </div>
                                        </div>
                                    </p>
                                </section>
                                <h2>students class</h2>
                                <section class="section">
                                    <div class="row clearfix">
                                        <div class="col-md-3">
                                            <label>Departement</label>
                                            <select class="browser-default">
                                                <option value="" disabled selected>Choose the departement</option>
                                                <option value="1">departement 1</option>
                                                <option value="2">departement 2</option>
                                                <option value="3">departement 3</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Branch</label>
                                            <select class="browser-default">
                                                <option value="" disabled selected>Choose the Branch</option>
                                                <option value="1">Branch 1</option>
                                                <option value="2">Branch 2</option>
                                                <option value="3">Branch 3</option>
                                            </select>
                                        </div>
        
                                        <div class="col-md-3">
                                            <label>Class</label>
                                            <select class="browser-default">
                                                <optgroup label="Branch 1">
                                                    <option value="" disabled selected>Choose the Class</option>
                                                    <option>Class 1</option>
                                                    <option>Class 2</option>
                                                    <option>Class 3</option>
                                                </optgroup>
                                                <optgroup label="Branch 2">
                                                    <option>Class 6</option>
                                                    <option>Class 7</option>
                                                    <option>Class 8</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                       
                                        <div class="col-md-3">
                                            <label>Promotion</label>
                                            <select class="browser-default">
                                                <option value="" disabled selected>Choose the Promotion</option>
                                                <option value="1">Promotion 1</option>
                                                <option value="2">Promotion 2</option>
                                                <option value="3">Promotion 3</option>
                                            </select>
                                        </div>
                                    </div>
                                </section>
                                <h2>Validation</h2>
                                <section class="section">
                                    <p>
                                        save
                                    </p>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

      
        </div>
    </section>

    <script type="text/javascript">
    $('#wizard_horizontal').css('height','500px');
    $('#section').css('height','200px');
    </script>
</x-app-layout>
