<x-app-layout filtrage='true'>
    <x-slot name="custom_css">
        <style>
            .rotate_text {
                -moz-transform: rotate(-90deg);
                -moz-transform-origin: center left;
                -webkit-transform: rotate(-90deg);
                -webkit-transform-origin: center left;
                -o-transform: rotate(-90deg);
                -o-transform-origin: center left;
                position: absolute;
            }



            .rotated_cell {
                height: 100px;
                vertical-align: bottom;
            }

            .nb_cell {
                width: 10px;
            }

        </style>

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

            function turnTableOn(checked) {
                // console.log(value.checked);
                if (checked == true) {
                    console.log('rotate_text');
                    $('.nb_cell').removeClass('rotated_cell');
                    $('.rota_div').removeClass('rotate_text');
                    console.log('rotate_textF');
                } else {
                    $('.nb_cell').addClass('rotated_cell');
                    $('.rota_div').addClass('rotate_text');
                }
            }

            var average_management = JSON.parse(currentActivedb.getItem('average_management'));
    console.log(average_management);
     getAverageOf(average_management.year, average_management.semesterID);
            $('.hider').hide();
        </script>

    </x-slot>


    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">CS1->S1->Averages</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="{{ route('dashboard') }}">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Generated Average</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">CS</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Cs1</a>
                            </li>
                            <li class="breadcrumb-item active">Semester1</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>CS1->S1</strong> Averages
                            </h2>
                            <div class="form-check m-l-10 " style="position: absolute; right: 50px;bottom:5px;">
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
                                            <a href="#" onClick="imprimer('nesp')">
                                                export to Pdf</a>
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
                                                <div class="support-box text-center l-bg-red">
                                                    <div class="icon m-b-10">
                                                        {{-- <div class="chart chart-bar">
                                                            6,4,8,6,8,10,5,6,7,9,5,6,4,8,6,8,10,5,6,7,9,5
                                                        </div> --}}
                                                    </div>
                                                    <div class="text m-b-10">All </div>
                                                    <h3 class="m-b-0">1512
                                                        <i class="material-icons">trending_up</i>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="support-box text-center l-bg-cyan">
                                                    {{-- <div class="icon m-b-10">
                                                        <span class="chart chart-line">9,4,6,5,6,4,7,3</span>
                                                    </div> --}}
                                                    <div class="text m-b-10">Passed</div>
                                                    <h3 class="m-b-0">1236
                                                        <i class="material-icons">trending_up</i>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="support-box text-center l-bg-orange">
                                                    {{-- <div class="icon m-b-10">
                                                        <div class="chart chart-pie">30, 35, 25, 8</div>
                                                    </div> --}}
                                                    <div class="text m-b-10">Failed</div>
                                                    <h3 class="m-b-0">1107
                                                        <i class="material-icons">trending_down</i>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="support-box text-center green">
                                                    <div class="icon m-b-10">
                                                        {{-- <div class="chart chart-bar">
                                                            4,6,-3,-1,2,-2,4,3,6,7,-2,3,4,6,-3,-1,2,-2,4,3,6,7,-2,3
                                                        </div> --}}
                                                    </div>
                                                    <div class="text m-b-10">Should do session</div>
                                                    <h3 class="m-b-0">167
                                                        <i class="material-icons">trending_down</i>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="table-responsive" id="nesp">
                                <table id="s_semester_table"
                                    class="table table-bordered table-hover  dataTable"
                                    {{-- id="tableExport" --}} {{-- class="display table table-bordered table-hover table-checkable order-column width-per-100 table-header-rotated" --}}>

                                    <thead  id="s_semester_thead">
                                        {{-- <tr>
                                            <th class="">
                                                <div class="">ID</div>
                                            </th>
                                            <th class="rotate">
                                                <div class="rot">Fist Name</div>
                                            </th>
                                            <th class="rotate">
                                                <div class="rot">Last Name</div>
                                            </th>

                                            <th class="rotated_cell center nb_cell">
                                                <div class="rota_div">English</div>
                                            </th>
                                            <th class="rotated_cell center nb_cell">
                                                <div class="rota_div">Maths</div>
                                            </th>
                                            <th class="rotated_cell center nb_cell">
                                                <div class="rota_div">Database</div>
                                            </th>
                                            <th class="rotated_cell center nb_cell">
                                                <div class="rota_div">Python</div>
                                            </th>
                                            <th class="rotated_cell center nb_cell">
                                                <div class="rota_div">Statistics</div>
                                            </th>
                                            <th class="rotated_cell center nb_cell">
                                                <div class="rota_div">Android</div>
                                            </th>
                                            <th class="rotated_cell center nb_cell">
                                                <div class="rota_div">php</div>
                                            </th>
                                            <th class="rotated_cell center nb_cell">
                                                <div class="rota_div">C#</div>
                                            </th>
                                            <th class="rotated_cell center nb_cell">
                                                <div class="rota_div">Total</div>
                                            </th>
                                            <th class="rotated_cell center nb_cell">
                                                <div class="rota_div">Final Average</div>
                                            </th>
                                            <th class="rotated_cell center nb_cell">
                                                <div class="rota_div">Inernational grate</div>
                                            </th>
                                            <th class="rotated_cell center nb_cell">
                                                <div class="rota_div">Convertion</div>
                                            </th>

                                            <th class="rotated_cell center nb_cell">
                                                <div class="rota_div">Statut</div>
                                            </th>
                                            <th class="rotated_cell center nb_cell">
                                                <div class="rota_div">Re-do Module</div>
                                            </th>
                                            <th class="rotated_cell center nb_cell">
                                                <div class="rota_div">Remark</div>
                                            </th>
                                        </tr> --}}
                                    </thead>
                           
                                    <tbody id="s_semester_tbody">

                                        {{-- <tr>
                                            <td class="">bs0002</td>
                                            <td class="">Sanou</td>
                                            <td class="">Lougoudoro</td>
                                            <td class="center">05</td>
                                            <td class="center">05</td>
                                            <td class="center">10</td>
                                            <td class="center">15</td>
                                            <td class="center">13</td>
                                            <td class="center">10</td>
                                            <td class="center">15</td>
                                            <td class="center">13</td>
                                            <td class="center">13</td>
                                            <td class="center">13</td>
                                            <td class="center">Not Good</td>
                                            <td class="center">13</td>
                                            <td class="">
                                                <div class="badge col-red">fail</div>
                                            </td>
                                            <td class="center">13</td>
                                            <td class="center">Give_Up</td>
                                        </tr> --}}
                                

                                    </tbody>

                                    {{-- <tfoot>
                                        <tr>
                                            <th class="center">User</th>
                                            <th class="center">Opened By</th>
                                            <th class="center">Email</th>
                                            <th class="center">Subject</th>
                                            <th class="center">Status</th>
                                            <th class="center">Assign To</th>
                                            <th class="center">Date</th>
                                            <th class="center">Action</th>
                                        </tr>
                                    </tfoot> --}}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</x-app-layout>
