<x-app-layout filtrage='true'>
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
                                <h4 class="page-title">Cs1->Certificates</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="{{ route('dashboard') }}"  onClick="setActiveId('Dashboard')">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Genarated documents</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Certificate</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">CS</a>
                            </li>
                            <li class="breadcrumb-item active">cs 1</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Cs1->Certificates</strong> List
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example contact_list">
                                    <thead>
                                        <tr>
                                            <th class="center">Matricule</th>
                                            <th class="center"> First name </th>
                                            <th class="center"> Last Name </th>
                                            <th class="center"> Birthdate </th>
                                            <th class="center"> Statut </th>
                                            <th class="center"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="center">bs0001</td>
                                            <td class="center">Sanou</td>
                                            <td class="center">Nangoro</td>
                                            <td class="center">19/07/2015</td>
                                            <td class="center">Pass</td>
                                            <td class="center">
                                                <a class="invoice" href="../../assets/images/test.pdf" target="_blank">
                                                    <i class="far fa-file-pdf"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="center">bs0002</td>
                                            <td class="center">Sanou</td>
                                            <td class="center">Nangoro</td>
                                            <td class="center">19/07/2015</td>
                                            <td class="center">Pass</td>
                                            <td class="center">
                                                <a class="invoice" href="../../assets/images/test.pdf" target="_blank">
                                                    <i class="far fa-file-pdf"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="center">bs0003</td>
                                            <td class="center">Sanou</td>
                                            <td class="center">Nangoro</td>
                                            <td class="center">19/07/2015</td>
                                            <td class="center">Pass</td>
                                            <td class="center">
                                                <a class="invoice" href="../../assets/images/test.pdf" target="_blank">
                                                    <i class="far fa-file-pdf"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="center">bs0004</td>
                                            <td class="center">Sanou</td>
                                            <td class="center">Nangoro</td>
                                            <td class="center">19/07/2015</td>
                                            <td class="center">Pass</td>
                                            <td class="center">
                                                <a class="invoice" href="../../assets/images/test.pdf" target="_blank">
                                                    <i class="far fa-file-pdf"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="center">bs0005</td>
                                            <td class="center">Sanou</td>
                                            <td class="center">Nangoro</td>
                                            <td class="center">19/07/2015</td>
                                            <td class="center">Pass</td>
                                            <td class="center">
                                                <a class="invoice" href="../../assets/images/test.pdf" target="_blank">
                                                    <i class="far fa-file-pdf"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    {{-- <tfoot>
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
