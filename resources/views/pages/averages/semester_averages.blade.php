<x-app-layout filtrage='true'>
    <x-slot name="custom_css">
        <style>
            .rotate_text {
                /* -moz-transform: rotate(-90deg);
                -moz-transform-origin: center left;
                -webkit-transform: rotate(-90deg);
                -webkit-transform-origin: center left;
                -o-transform: rotate(-90deg);
                -o-transform-origin: center center; */
                /* position: absolute; */
            }

            .rotated_cell {
                height: 100px;
                vertical-align: bottom;
            }

            .nb_cell {
                width: 10px;
               
            }

            .tableStyle {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

           .bodyStyle {
            /* overflow-x:auto; */
            display: table;
            width: 100%;
           }


        </style>
        <script> var action='average_management';</script>
    </x-slot>

    <x-slot name="custom_js">
        <!-- Demo Js -->
        <script src="assets/js/pages/ui/collapse.js"></script>

        <script src="assets/js/table.min.js"></script>
        <!-- Export table -->
        {{-- <script src="assets/js/pages/tables/jquery-datatable.js"></script> --}}
        <script src="assets/ajax/average_ajax.js"></script>



        <script>
            $('.rota_div').addClass('rotate_text');
            $('#s_semester_with_session_table').hide();

            function turnTableOn(checked) {
                // console.log(value.checked);

                if (checked == true) {
                    console.log('rotate_text');
                    $('.nb_cell').removeClass('rotated_cell');
                    $('.rota_div').removeClass('rotate_text');
                    // $('#s_semester_table').addClass('tableStyle');
                    // $('#s_semester_with_session_table').addClass('tableStyle');
                    console.log('rotate_textF');
                } else {
                    $('.nb_cell').addClass('rotated_cell');
                    $('.rota_div').addClass('rotate_text');
                    // $('#s_semester_table').removeClass('tableStyle');
                    // $('#s_semester_with_session_table').removeClass('tableStyle');
                }
            }

         

            var average_management = JSON.parse(currentActivedb.getItem('average_management'));
            console.log(average_management);
            
            // getAverageWithSessionOf(average_management.year, average_management.semesterID);
            getAverageOf(average_management.year, average_management.semesterID);
            $('.hider').hide();
            
           

            function display_with_session(checked) {
                if (checked == true) {
                    // $('#s_semester_table').hide();
                    getAverageWithSessionOf(average_management.year, average_management.semesterID);
                    // $('#s_semester_with_session_table').show();
                    
                } else {
                    // $('#s_semester_with_session_table').hide();
                    getAverageOf(average_management.year, average_management.semesterID);
                    // $('#s_semester_table').show();
                   
                }
            }
            
        </script>

    </x-slot>


    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title"></h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="{{ route('dashboard') }}">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Generated Average</a>
                            </li>
                            {{-- <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">CS</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Cs1</a>
                            </li>
                            <li class="breadcrumb-item active">Semester1</li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong class="page-title"></strong> Averages
                            </h2>
                            <div class="form-check m-l-10 " style="position: absolute; right: 50px;bottom:5px;">

                                <label class="form-check-label">
                                    <input onChange="display_with_session(this.checked)" class="form-check-input"
                                        type="checkbox" name="acceptTerms" required> With session
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                                <label class="form-check-label">
                                    <input onChange="turnTableOn(this.checked)" class="form-check-input" type="checkbox"
                                        name="acceptTerms" required> Extended view
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            {{-- <a href="#" onClick="imprimer('nesp')">
                                                export to Pdf</a> --}}
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <hr />
                        <div class="body">
                            {{-- resume section --}}
                            <div class="loading">
                                <x-loading />
                            </div>
                            <ul class="collapsible hider">
                                <li>
                                    <div class="collapsible-header">
                                        <i class="material-icons">filter_drama</i>
                                        Overview
                                        <div style="position: absolute; right: 10px;"><i
                                                class="material-icons">keyboard_arrow_down</i></div>
                                    </div>
                                    <div class="collapsible-body">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="support-box text-center l-bg-cyan">
                                                    <div class="text m-b-10">All </div>
                                                    <h3 class="m-b-0 "><span class="all">0</span>
                                                        Students
                                                        {{-- <i class="material-icons">trending_up</i> --}}
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="support-box text-center  green">
                                                    <div class="text m-b-10">Passed</div>
                                                    <h3 class="m-b-0"> <span class="passed">0</span>
                                                        <i class="material-icons">trending_up</i>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="support-box text-center l-bg-orange">
                                                    <div class="text m-b-10">Failed</div>
                                                    <h3 class="m-b-0"><span class="failed">0</span>
                                                        <i class="material-icons">trending_down</i>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="support-box text-center red">
                                                    <div class="text m-b-10">Give Up</div>
                                                    <h3 class="m-b-0"><span class="give_up">0</span>
                                                        <i class="material-icons">trending_down</i>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="table-responsive" id="nesp">
                                <table id="s_semester_table" class="table table-bordered table-hover   "
                                    {{-- id="tableExport" --}} {{-- class="display table table-bordered table-hover table-checkable order-column width-per-100 table-header-rotated" --}}>
                                    <thead id="s_semester_thead">
                                    </thead>
                                    <tbody id="s_semester_tbody" >
                                    </tbody>
                                </table>

                                {{-- <table id="s_semester_with_session_table"
                                    class="table table-bordered table-hover  "
                                    >
                                    <thead id="s_semester_with_session_thead">

                                    </thead>
                                    <tbody id="s_semester_with_session_tbody">
                                    </tbody>
                                </table> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</x-app-layout>
