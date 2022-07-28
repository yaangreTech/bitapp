<x-app-layout filtrage='false'>
    <x-slot name="custom_css">
        <!-- Multi Select Css -->
        <link href="assets/js/bundles/multiselect/css/multi-select.css" rel="stylesheet">
        <!-- Plugins Core Css -->
        <link href="assets/css/form.min.css" rel="stylesheet">
    </x-slot>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Reinscript students</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="{{ route('dashboard') }}" onClick="setActiveId('Dashboard')">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Students management</a>
                            </li>
                            <li class="breadcrumb-item active">Reinscript students</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Reinscript students</strong> Form
                            </h2>
                        </div>
                        <div class="body">

                            <form id="wizard_with_validation" class="end_cycle_students_form" method="POST">
                                @csrf
                                <h3>The Licence-3/Master 2 Classe</h3>
                                <fieldset>
                                    <div class="demo-masked-input">
                                        <label>The licence-3 Classe</label>
                                        <div class="form-group">
                                            <select required id="concerned_class" name="concerned_class"
                                                class="browser-default" onChange="getPromotions(this.value)">
                                                <option value="" disabled selected>Choose the licence-3/Master 2 Classe</option>
                                                @forelse ($departments as $department)
                                                    @forelse ($department->branches as $branche)
                                                        <optgroup label="{{ $department->name .'->' . $branche->name}}">
                                                            <?php $levels=$branche->levels->whereIn('name',['L3', 'M2']) ?>
                                                            @forelse ($levels as $level)
                                                            <option value="{{ $level->id }}">
                                                                {{$branche->name}}, {{ $level->label }} ({{ $level->name }})
                                                            </option>
                                                            @empty
                                                            <option value="" disabled>No licence-3/Master 2 Classe for the branch: <strong>{{$branche->name}}</strong></option>
                                                            @endforelse
                                                          
                                                        </optgroup>
                                                    @empty
                                                    @endforelse
                                                @empty
                                                    <optgroup label="No department"></optgroup>
                                                @endforelse
                                            </select>
                                        </div>
                                </fieldset>
                                <h3>Promotion</h3>
                                <fieldset>
                                    <div class="demo-masked-input">
                                        <label>Promotions</label>
                                        <div class="form-group">
                                            <select required name="conserned_promotion" id="conserned_promotion"
                                                class="browser-default" onChange="getStudentsToEnd(this.value)">
                                                <option value="" disabled selected>Choose the promotions</option>
                                                <option value="Father"></option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <h3> Concerned Students</h3>
                                <fieldset>
                                    {{-- <div class="demo-masked-input">
                                        <div class="form-group"> --}}
                                    <input style="height: 0px;width: 0px;position: absolute;right: 0px;" type="text"
                                        name="students_ids" id="students_ids" required readonly>
                                    {{-- </div>
                                    </div> --}}

                                    <div class="table-responsive">
                                        <table id="consernedStudents_table" class="table table-hover">
                                            <thead id="consernedStudents_head">
                                            </thead>
                                            <tbody id="consernedStudents_body">
                                            </tbody>
                                        </table>
                                    </div>
                                </fieldset>

                                <h3>Validation</h3>
                                <fieldset>
                                    <div class="m-b-20 m-t-20 center">
                                        <h4 class="text-warning">Important!!!</h4><br />
                                        <h5> 
                                            Note that you will not be able to revert the action if you validate it
                                            !!!<br /></h5>
                                    </div>
                                    <div class="form-check m-l-10 center">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" id="acceptTerms-2"
                                                name="acceptTerms" required> I agree with.
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

    {{-- <script type="text/javascript">
        $('#wizard_with_validation').css('height', '450px');
        $('fieldset').css('height', '325px');
    </script> --}}


    <x-slot name="custom_js">
        <script src="assets/ajax/student_ajax.js"></script>

        <script src="assets/js/table.min.js"></script>
        <!-- Custom Js -->
        <script src="assets/js/pages/tables/jquery-datatable.js"></script>
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
</x-app-layout>
