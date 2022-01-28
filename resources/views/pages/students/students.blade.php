<x-app-layout filtrage='true'>
    <x-slot name="custom_css">
        
    </x-slot>

    <x-slot name="custom_js">
         <!-- Plugins Js -->
    <script src="assets/js/table.min.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/bundles/export-tables/dataTables.buttons.min.js"></script>
    <script src="assets/js/bundles/export-tables/buttons.flash.min.js"></script>
    <script src="assets/js/bundles/export-tables/jszip.min.js"></script>
    <script src="assets/js/bundles/export-tables/pdfmake.min.js"></script>
    <script src="assets/js/bundles/export-tables/vfs_fonts.js"></script>
    <script src="assets/js/bundles/export-tables/buttons.html5.min.js"></script>
    <script src="assets/js/bundles/export-tables/buttons.print.min.js"></script>
    <script src="assets/js/pages/tables/jquery-datatable.js"></script>
    <!-- Demo Js -->
    </x-slot>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">CS1</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="{{ route('dashboard') }}"  onClick="setActiveId('Dashboard')">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">student management</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Student list</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">CS</a>
                            </li>
                            <li class="breadcrumb-item active">CS1</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>CS1 </strong> List</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="{{ route('students_form')}}"  onClick="setActiveId('Add_new_Students');">Add Student</a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                            
                        </div>
                        <hr>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="tableExport"
                                {{-- table-striped --}}
                                    class="display table table-bordered  table-hover table-checkable order-column m-t-20 width-per-100   dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last name</th>
                                            <th>Gender</th>
                                            <th>Birthdate</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>bs00001</td>
                                            <td>Sanou</td>
                                            <td>Lougoudoro</td>
                                            <td>Edinburgh</td>
                                            <td>2008/11/13</td>
                                            <td>51-34-59-12</td>
                                            <td class="text-right">
                                             <ul>
                                                <li class="dropdown">
                                                    <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown"
                                                        role="button" aria-haspopup="true" aria-expanded="false">
                                                        <i class="material-icons">more_vert</i>
                                                    </a>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="#" onClick="return false;">action 1</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" onClick="return false;">action 1</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" onClick="return false;">action 1</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                             </ul>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td>bs00002</td>
                                            <td>Yannogo</td>
                                            <td>Patric</td>
                                            <td>Singapore</td>
                                            <td>2011/06/27</td>
                                            <td>51-34-59-12</td>
                                            <td class="text-right">
                                                <ul>
                                                   <li class="dropdown">
                                                       <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown"
                                                           role="button" aria-haspopup="true" aria-expanded="false">
                                                           <i class="material-icons">more_vert</i>
                                                       </a>
                                                       <ul class="dropdown-menu pull-right">
                                                           <li>
                                                               <a href="#" onClick="return false;">action 1</a>
                                                           </li>
                                                           <li>
                                                               <a href="#" onClick="return false;">action 1</a>
                                                           </li>
                                                           <li>
                                                               <a href="#" onClick="return false;">action 1</a>
                                                           </li>
                                                       </ul>
                                                   </li>
                                                </ul>
                                           </td>
                                        </tr>
                                        <tr>
                                            <td>bs00003</td>
                                            <td>Yaro</td>
                                            <td>Emmanuel</td>
                                            <td>New York</td>
                                            <td>2011/01/25</td>
                                            <td>51-34-59-12</td>
                                            <td class="text-right">
                                                <ul>
                                                   <li class="dropdown">
                                                       <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown"
                                                           role="button" aria-haspopup="true" aria-expanded="false">
                                                           <i class="material-icons">more_vert</i>
                                                       </a>
                                                       <ul class="dropdown-menu pull-right">
                                                           <li>
                                                               <a href="#" onClick="return false;">action 1</a>
                                                           </li>
                                                           <li>
                                                               <a href="#" onClick="return false;">action 1</a>
                                                           </li>
                                                           <li>
                                                               <a href="#" onClick="return false;">action 1</a>
                                                           </li>
                                                       </ul>
                                                   </li>
                                                </ul>
                                           </td>
                                        </tr>
                                    </tbody>
                                    {{-- <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Last name</th>
                                            <th>gender</th>
                                            <th>Birthdate</th>
                                            <th>phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot> --}}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>

        {{-- form --}}

        <x-student-form/>
    </section>
    
</x-app-layout>