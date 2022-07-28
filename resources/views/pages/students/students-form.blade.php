<x-app-layout filtrage='false'>
    <x-slot name="custom_css">
        <!-- Multi Select Css -->
        <link href="assets/js/bundles/multiselect/css/multi-select.css" rel="stylesheet">
        <!-- Plugins Core Css -->
        <link href="assets/css/form.min.css" rel="stylesheet">
    </x-slot>

    <x-slot name="custom_js">
        <script src="assets/ajax/student_ajax.js"></script>

        <script>
            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: '/school/get_year/0',
                success: function(year) {},
                error: function(error) {
                    // console.log(error);
                    $('.card').html(emptyYear());
            }})
        </script>
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
                                <a href="{{ route('dashboard') }}" onClick="setActiveId('Dashboard')">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Students management</a>
                            </li>
                            <li class="breadcrumb-item active">Add new students</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <div class="col-xs-12 col-sm-6">
                                <h2>
                                    <strong>Add new students</strong> Form
                                </h2>
                            </div>
                            <ul class="header-dropdown m-r--5">
                                {{-- <span class="pull-right"> --}}
                                    <a href="{{ route('import_form') }}">Multi import form</a>
                                {{-- </span> --}}
                            </ul>
                           
                        
                        </div>
                        <div class="body">
                            <form id="wizard_with_validation" class="student_form" method="POST">
                                @csrf
                                <h3>Students references</h3>
                                <fieldset>
                                    <div class="demo-masked-input">
                                        <div class="row clearfix">
                                            {{-- students ID fied --}}
                                            <div class="col-md-4">
                                                <b>Matricule</b><span class="text-danger">*</span>
                                                <div class="input-group ">
                                                    <div class="form-group ">
                                                        <div class="form-line">
                                                            <input id="studentID" oninput="verfierMatricule(value)"
                                                                name='studentID' type="text" class="form-control ID"
                                                                placeholder="Ex: bs00001" required>
                                                            <span class="text-danger studentID"> </span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            {{-- First name field --}}
                                            <div class="col-md-4">
                                                <b>First name</b><span class="text-danger">*</span>
                                                <div class="input-group">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input id="studentFirstName" name="studentFirstName"
                                                                type="text" class="form-control name"
                                                                placeholder="Ex: Sanou" required>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            {{-- Last name fied --}}
                                            <div class="col-md-4">
                                                <b>Last mane</b><span class="text-danger">*</span>
                                                <div class="input-group">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input id="studentLastName" name="studentLastName"
                                                                type="text" class="form-control name"
                                                                placeholder="Ex: lougoudoro" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Birthday field --}}
                                            <div class="col-md-3">
                                                <b>BirthDate</b><span class="text-danger">*</span>
                                                <div class="input-group">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input id="studentBirthDate" name="studentBirthDate"
                                                                type="text" class="form-control date"
                                                                placeholder="Ex: 1999-07-10" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Birthday field --}}
                                            <div class="col-md-3">
                                                <b>BirthPlace</b><span class="text-danger">*</span>
                                                <div class="input-group">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input id="studentBirthPlace" name="studentBirthPlace"
                                                                type="text" class="form-control"
                                                                placeholder="Ex: Koudougou" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Phone number field --}}
                                            <div class="col-md-3">
                                                <b>Mobile Phone Number</b><span class="text-danger">*</span>
                                                <div class="input-group">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input id="studentPhone" name="studentPhone" type="text"
                                                                class="form-control mobile-phone-number"
                                                                placeholder="Ex: 00 (000) 00-00-00-00" required>
                                                        </div>
                                                    </div>
                                                    <span class="text-danger studentPhone"> </span>
                                                </div>
                                            </div>

                                            {{-- Email adress Field --}}
                                            <div class="col-md-3">
                                                <b>Email Address</b><span class="text-danger">*</span>
                                                <div class="input-group">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input id="studentEmail" name="studentEmail" type="text"
                                                                class="form-control email"
                                                                placeholder="Ex: example@example.com" required>
                                                        </div>
                                                    </div>
                                                    <span class="text-danger studentEmail"> </span>
                                                </div>
                                            </div>

                                            {{-- Gender field --}}
                                            <div class="col-md-4">
                                                <b>Gender</b><span class="text-danger">*</span>
                                                <div class="form-group">
                                                    <label>
                                                        <input class="with-gap" value="Male" name="studentGender"
                                                            type="radio" checked />
                                                        <span>Male</span>
                                                    </label>
                                                    <label>
                                                        <input value="Female" class="with-gap"
                                                            name="studentGender" type="radio" />
                                                        <span>Female</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <h3>Students parents</h3>
                                <fieldset>
                                    <div class="demo-masked-input">
                                        <div class="row clearfix">

                                            <div class="col-md-4">
                                                <b>First name</b>
                                                <div class="input-group">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" name="studentParentFirstName"
                                                                class="form-control" placeholder="Ex: Soro" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <b>Last mane</b>
                                                <div class="input-group">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input name="studentParentLastName" type="text"
                                                                class="form-control " placeholder="Ex: brahima"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <b>Mobile Phone Number</b>
                                                <div class="input-group">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input name="studentParentPhone" type="text"
                                                                class="form-control mobile-phone-number"
                                                                placeholder="Ex: 00 (000) 000-00-00" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label>Profession</label>
                                                <div class="form-group">
                                                    <select name="studentParentProfession" class="browser-default"
                                                        required>
                                                        <option value="" disabled selected>Choose option</option>
                                                        <option value="Farmer">Farmer</option>
                                                        <option value="House">House</option>
                                                        <option value="Worker">Worker</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Type</label>
                                                <div class="form-group">
                                                    <select required name="studentParentType" class="browser-default">
                                                        <option value="" disabled selected>Choose option</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Oncle">Oncle</option>
                                                        <option value="Brother">Brother</option>
                                                        <option value="tutor">tutor</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <h3>Students class</h3>
                                <fieldset>
                                    <div class="demo-masked-input">
                                        <div class="row clearfix">
                                            <div class="col-md-3">
                                                <label>Level</label>
                                                <select required id="studentClasse" name="studentClasse"
                                                    class="browser-default">
                                                    <option value="" disabled selected>Choose the Level</option>
                                                    @forelse ($departments as $department)
                                                        <optgroup label="{{ $department->name }}">
                                                            @forelse ($department->branches as $branch)
                                                                @foreach ($branch->levels as $level)
                                                                    <option value="{{ $level->id }}">
                                                                        {{ $branch->name . ', ' . $level->name }}
                                                                    </option>
                                                                @endforeach
                                                            @empty
                                                            <option value="" disabled>Choose Options for {{$department->name}}</option>
                                                            @endforelse
                                                        </optgroup>
                                                    @empty
                                                        <optgroup label="No department"></optgroup>
                                                    @endforelse
                                                </select>
                                                <span class="text-danger studentClasse"></span>
                                            </div>

                                            <div class="col-md-3">
                                                <label>Promotion</label>
                                                <select required id="studentPromotion" name="studentPromotion"
                                                    class="browser-default">
                                                    <option value="" disabled selected>Choose the Promotion</option>
                                                    @forelse ($promotions as $promotion)
                                                        <option value="{{ $promotion->id }}">{{ $promotion->name }}
                                                        </option>
                                                    @empty
                                                        <option disabled>No promotion</option>
                                                    @endforelse


                                                </select>
                                                <span class="text-danger studentPromotion"></span>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                                {{-- <h3>Validation</h3>
                                <fieldset>
                                    <div class="form-check m-l-10">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" id="acceptTerms-2"
                                                name="acceptTerms" required> I agree with the Terms and Conditions.
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </fieldset> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <script type="text/javascript">
        $('#wizard_with_validation').css('height', '450px');
        $('fieldset').css('height', '325px');
    </script>



</x-app-layout>
