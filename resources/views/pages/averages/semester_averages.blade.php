<x-app-layout filtrage='true'>
    <x-slot name="custom_css">
        <style>
            .rotate_text {
                /* -moz-transform: rotate(-50deg);
                -moz-transform-origin: top left;
                -webkit-transform: rotate(-50deg);
                -webkit-transform-origin: top left;
                -o-transform: rotate(-50deg);
                -o-transform-origin: top left;
                position: relative; */
                /* top: 20px;*/
            }

            .rotated_cell {
                /* height: 100px;
                vertical-align: bottom */
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
        {{-- <script src="assets/js/bundles/export-tables/dataTables.buttons.min.js"></script>
        <script src="assets/js/bundles/export-tables/buttons.flash.min.js"></script>
        <script src="assets/js/bundles/export-tables/jszip.min.js"></script>
        <script src="assets/js/bundles/export-tables/pdfmake.min.js"></script>
        <script src="assets/js/bundles/export-tables/vfs_fonts.js"></script>
        <script src="assets/js/bundles/export-tables/buttons.html5.min.js"></script>
        <script src="assets/js/bundles/export-tables/buttons.print.min.js"></script> --}}
        {{-- <script src="assets/js/pages/apps/support.js"></script> --}}
        <script src="../../assets/js/pages/tables/jquery-datatable.js"></script>

        <script src="assets/export_plugins/libs/jsPDF/polyfills.umd.min.js"></script>
        <script src="assets/export_plugins/libs/jsPDF/jspdf.umd.min.js"></script>
        <script src="assets/export_plugins/libs/pdfmake/pdfmake.min.js"></script>
        <script src="assets/export_plugins/libs/pdfmake/vfs_fonts.js"></script>
        <script type="text/javascript" src="assets/export_plugins/libs/html2canvas/html2canvas.min.js"></script>

        <script src="assets/export_plugins/tableExport.js"></script>



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
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="#" onClick="toPdf()">
                                                export to Pdf</a>
                                        </li>
                                        <li>
                                            <a href="#" onClick="run()">
                                                export to Pdf2</a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <hr />
                        <div class="body">
                            {{-- resume section --}}
                            <ul class="collapsible">
                                <li>
                                    <div class="collapsible-header">
                                        <i class="material-icons">filter_drama</i>
                                        First
                                        <div style="position: absolute; right: 10px;"><i
                                                class="material-icons">keyboard_arrow_down</i></div>
                                    </div>
                                    <div class="collapsible-body">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="support-box text-center l-bg-red">
                                                    <div class="icon m-b-10">
                                                        <div class="chart chart-bar">
                                                            6,4,8,6,8,10,5,6,7,9,5,6,4,8,6,8,10,5,6,7,9,5
                                                        </div>
                                                    </div>
                                                    <div class="text m-b-10">Total Ticket</div>
                                                    <h3 class="m-b-0">1512
                                                        <i class="material-icons">trending_up</i>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="support-box text-center l-bg-cyan">
                                                    <div class="icon m-b-10">
                                                        <span class="chart chart-line">9,4,6,5,6,4,7,3</span>
                                                    </div>
                                                    <div class="text m-b-10">Reply</div>
                                                    <h3 class="m-b-0">1236
                                                        <i class="material-icons">trending_up</i>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="support-box text-center l-bg-orange">
                                                    <div class="icon m-b-10">
                                                        <div class="chart chart-pie">30, 35, 25, 8</div>
                                                    </div>
                                                    <div class="text m-b-10">Resolve</div>
                                                    <h3 class="m-b-0">1107
                                                        <i class="material-icons">trending_down</i>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="support-box text-center green">
                                                    <div class="icon m-b-10">
                                                        <div class="chart chart-bar">
                                                            4,6,-3,-1,2,-2,4,3,6,7,-2,3,4,6,-3,-1,2,-2,4,3,6,7,-2,3
                                                        </div>
                                                    </div>
                                                    <div class="text m-b-10">Pending</div>
                                                    <h3 class="m-b-0">167
                                                        <i class="material-icons">trending_down</i>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <div class="table-responsive">
                                <table id="exportable"
                                    class="table table-bordered table-hover js-basic-example dataTable table-header-rotated"
                                    {{-- id="tableExport" --}} {{-- class="display table table-bordered table-hover table-checkable order-column width-per-100 table-header-rotated" --}}>
                                    <div id="nesp">
                                        <thead id="note_export">
                                            <tr>
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
                                                    <div class="rotate_text">English</div>
                                                </th>
                                                <th class="rotated_cell center nb_cell">
                                                    <div class="rotate_text">Maths</div>
                                                </th>
                                                <th class="rotated_cell center nb_cell">
                                                    <div class="rotate_text">Database</div>
                                                </th>
                                                <th class="rotated_cell center nb_cell">
                                                    <div class="rotate_text">Python</div>
                                                </th>
                                                <th class="rotated_cell center nb_cell">
                                                    <div class="rotate_text">Statistics</div>
                                                </th>
                                                <th class="rotated_cell center nb_cell">
                                                    <div class="rotate_text">Android</div>
                                                </th>
                                                <th class="rotated_cell center nb_cell">
                                                    <div class="rotate_text">php</div>
                                                </th>
                                                <th class="rotated_cell center nb_cell">
                                                    <div class="rotate_text">C#</div>
                                                </th>

                                                <th class="">
                                                    <div class="">Statut</div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tr id="can_export">
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
                                                <div class="rotate_text">English</div>
                                            </th>
                                            <th class="rotated_cell center nb_cell">
                                                <div class="rotate_text">Maths</div>
                                            </th>
                                            <th class="rotated_cell center nb_cell">
                                                <div class="rotate_text">Database</div>
                                            </th>
                                            <th class="rotated_cell center nb_cell">
                                                <div class="rotate_text">Python</div>
                                            </th>
                                            <th class="rotated_cell center nb_cell">
                                                <div class="rotate_text">Statistics</div>
                                            </th>
                                            <th class="rotated_cell center nb_cell">
                                                <div class="rotate_text">Android</div>
                                            </th>
                                            <th class="rotated_cell center nb_cell">
                                                <div class="rotate_text">php</div>
                                            </th>
                                            <th class="rotated_cell center nb_cell">
                                                <div class="rotate_text">C#</div>
                                            </th>

                                            <th class="">
                                                <div class="">Statut</div>
                                            </th>
                                        </tr>
                                        <tbody>
                                            <tr>
                                                <td class="">bs0001</td>
                                                <td class="">Sanogo</td>
                                                <td class="">Adama</td>
                                                <td class="center">05</td>
                                                <td class="center">10</td>
                                                <td class="center">15</td>
                                                <td class="center">13</td>
                                                <td class="center">05</td>
                                                <td class="center">10</td>
                                                <td class="center">15</td>
                                                <td class="center">13</td>
                                                <td class="">
                                                    <div class="badge col-red">fail</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="">bs0009</td>
                                                <td class="">Da</td>
                                                <td class="">Solange</td>
                                                <td class="center">05</td>
                                                <td class="center">05</td>
                                                <td class="center">10</td>
                                                <td class="center">15</td>
                                                <td class="center">13</td>
                                                <td class="center">10</td>
                                                <td class="center">15</td>
                                                <td class="center">13</td>
                                                <td class="">
                                                    <div class="badge col-red">fail</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="">bs0008</td>
                                                <td class="">Nana</td>
                                                <td class="">Jeremie</td>
                                                <td class="center">05</td>
                                                <td class="center">05</td>
                                                <td class="center">10</td>
                                                <td class="center">15</td>
                                                <td class="center">13</td>
                                                <td class="center">10</td>
                                                <td class="center">15</td>
                                                <td class="center">13</td>
                                                <td class="">
                                                    <div class="badge col-red">fail</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="">bs0007</td>
                                                <td class="">Yaro</td>
                                                <td class="">Emmanuel</td>
                                                <td class="center">05</td>
                                                <td class="center">05</td>
                                                <td class="center">10</td>
                                                <td class="center">15</td>
                                                <td class="center">13</td>
                                                <td class="center">10</td>
                                                <td class="center">15</td>
                                                <td class="center">13</td>
                                                <td class="">
                                                    <div class="badge col-red">fail</div>
                                                </td>
                                            </tr>
                                            <tr>
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
                                                <td class="">
                                                    <div class="badge col-red">fail</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="">bs0004</td>
                                                <td class="">Soro</td>
                                                <td class="">Moussa</td>
                                                <td class="center">15</td>
                                                <td class="center">05</td>
                                                <td class="center">10</td>
                                                <td class="center">15</td>
                                                <td class="center">13</td>
                                                <td class="center">10</td>
                                                <td class="center">15</td>
                                                <td class="center">13</td>
                                                <td class="">
                                                    <div class="badge col-green">pass</div>
                                                </td>
                                            </tr>


                                        </tbody>
                                    </div>
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

    <script>
        function vtpdf() {
            var doc = new jsPDF();
            var elementHTML = $('#nesp').html();
            // var specialElementHandlers = {
            //     '#elementH': function(element, renderer) {
            //         return true;
            //     }
            // };
            // doc.fromHTML(elementHTML, 15, 15, {
            //     'width': 170,
            //     'elementHandlers': specialElementHandlers
            // });

            // Save the PDF
            doc.fromHTML(elementHTML);
            doc.save('sample-document.pdf');



        }


        function run() {
            var pdf = new jsPDF('p', 'pt', 'letter'),
                source = $('.header')[0],
                margins = {
                    top: 40,
                    bottom: 40,
                    left: 40,
                    right: 40,
                    width: 522
                };

            pdf.fromHTML(
                source,
                margins.left,
                margins.top, {
                    'width': margins.width
                },
                // function(dispose) {
                    pdf.save('Test.pdf'),
                // },
                margins
            );
        };




        $('#can_export').hide();

        function toPdf() {
            $('#can_export').show();
            $('#note_export').hide();


            function drawh(cell, data) {
                console.log('ddddddddddddddddd');
                cell.styles.fontSize = 20;
            }

            function DoCellData(cell, row, col, data) {
                console.log('row');
            }

            function DoBeforeAutotable(table, headers, rows, AutotableSettings) {
                console.log(AutotableSettings);
            }

            $('#exportable').tableExport({
                fileName: 'sFileName',
                headers: false,
                type: 'pdf',

                jspdf: {
                    orientation: 'l',
                    // format: 'bestfit',
                    margins: {
                        left: 20,
                        right: 10,
                        top: 20,
                        bottom: 20
                    },


                    autotable: false,



                }
            });


            // $('#exportable').tableExport({
            //     type: 'pdf',
            //     htmlContent: true,
            //     ignoreColumn: '.center',
            //     pdfmake: {
            //         enabled: true,
            //         docDefinition: {
            //             pageOrientation: 'landscape'
            //         }
            //     }
            // });
            // $('#note_export').show();
            // $('#can_export').hide();
        }

        function toXls() {
            $('#exportable').tableExport({
                type: 'excel'
            });
        }
    </script>


</x-app-layout>
