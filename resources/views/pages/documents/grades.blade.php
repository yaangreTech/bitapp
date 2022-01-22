<x-app-layout>
    <x-slot name="custom_css">
        
    </x-slot>

    <x-slot name="custom_js">
        <script src="assets/js/table.min.js"></script>
        <!-- Custom Js -->
        <script src="assets/js/pages/tables/jquery-datatable.js"></script>
    </x-slot>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Cs1->Grade transcripts</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="{{ route('dashboard') }}">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Genarated documents</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">grade transcripts</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">CS</a>
                            </li>
                            <li class="breadcrumb-item active">cs 1</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Cs1->Grade transcripts</strong> List
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:void(0);">Action</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Another action</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Something else here</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example contact_list">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th class="center"> Invoice No </th>
                                            <th class="center"> Date </th>
                                            <th class="center"> Organization </th>
                                            <th class="center"> Payment Type </th>
                                            <th class="center"> Amount </th>
                                            <th class="center"> Invoice </th>
                                            <th class="center"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="center">1</td>
                                            <td class="center">IN00125</td>
                                            <td class="center">01 January 2018</td>
                                            <td class="center">Sun Technology</td>
                                            <td class="center">Bank Transfer</td>
                                            <td class="center"> $10,000</td>
                                            <td class="center">
                                                <a class="invoice" href="../../assets/images/test.pdf" target="_blank">
                                                    <i class="far fa-file-pdf"></i>
                                                </a>
                                            </td>
                                            <td class="center">
                                                <a href="#" class="btn btn-tbl-edit">
                                                    <i class="material-icons">create</i>
                                                </a>
                                                <a href="#" class="btn btn-tbl-delete">
                                                    <i class="material-icons">delete_forever</i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="center">2</td>
                                            <td class="center">IN00185</td>
                                            <td class="center">15 January 2017</td>
                                            <td class="center">Ajay Singh</td>
                                            <td class="center">Cash</td>
                                            <td class="center"> $1,000</td>
                                            <td class="center">
                                                <a class="invoice" href="../../assets/images/test.pdf" target="_blank">
                                                    <i class="far fa-file-pdf"></i>
                                                </a>
                                            </td>
                                            <td class="center">
                                                <a href="#" class="btn btn-tbl-edit">
                                                    <i class="material-icons">create</i>
                                                </a>
                                                <a href="#" class="btn btn-tbl-delete">
                                                    <i class="material-icons">delete_forever</i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="center">3</td>
                                            <td class="center">IN25875</td>
                                            <td class="center">17 February 2017</td>
                                            <td class="center">Manas Infotech</td>
                                            <td class="center">Cheque</td>
                                            <td class="center"> $3,724</td>
                                            <td class="center">
                                                <a class="invoice" href="../../assets/images/test.pdf" target="_blank">
                                                    <i class="far fa-file-pdf"></i>
                                                </a>
                                            </td>
                                            <td class="center">
                                                <a href="#" class="btn btn-tbl-edit">
                                                    <i class="material-icons">create</i>
                                                </a>
                                                <a href="#" class="btn btn-tbl-delete">
                                                    <i class="material-icons">delete_forever</i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="center">4</td>
                                            <td class="center">IN00568</td>
                                            <td class="center">11 March 2017</td>
                                            <td class="center">Swaraj Steel</td>
                                            <td class="center">Bank</td>
                                            <td class="center"> $528</td>
                                            <td class="center">
                                                <a class="invoice" href="../../assets/images/test.pdf" target="_blank">
                                                    <i class="far fa-file-pdf"></i>
                                                </a>
                                            </td>
                                            <td class="center">
                                                <a href="#" class="btn btn-tbl-edit">
                                                    <i class="material-icons">create</i>
                                                </a>
                                                <a href="#" class="btn btn-tbl-delete">
                                                    <i class="material-icons">delete_forever</i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="center">5</td>
                                            <td class="center">IN0069</td>
                                            <td class="center">17 March 2017</td>
                                            <td class="center">Ankur Plastic</td>
                                            <td class="center">Cheque</td>
                                            <td class="center"> $856</td>
                                            <td class="center">
                                                <a class="invoice" href="../../assets/images/test.pdf" target="_blank">
                                                    <i class="far fa-file-pdf"></i>
                                                </a>
                                            </td>
                                            <td class="center">
                                                <a href="#" class="btn btn-tbl-edit">
                                                    <i class="material-icons">create</i>
                                                </a>
                                                <a href="#" class="btn btn-tbl-delete">
                                                    <i class="material-icons">delete_forever</i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="center">#</th>
                                            <th class="center"> Invoice No </th>
                                            <th class="center"> Date </th>
                                            <th class="center"> Organization </th>
                                            <th class="center"> Payment Type </th>
                                            <th class="center"> Amount </th>
                                            <th class="center"> Invoice </th>
                                            <th class="center"> Action </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>