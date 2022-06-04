<x-app-layout filtrage='true'>
    <x-slot name="custom_css">
        <script> var action='graduated';</script>
    </x-slot>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Data Table</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="../../index-2.html">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Tables</a>
                            </li>
                            <li class="breadcrumb-item active">Data Tables</li>
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
                                <strong>Graduated students</strong>
                            </h2>
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
                            <div class="table-responsive">
                                <table id="graduated_table"
                                    class="table table-bordered table-striped table-hover dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>FirstName</th>
                                            <th>LastName</th>
                                            <th>BirthDate</th>
                                            <th>Gender</th>
                                            <th>Option</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="graduated_body">
                                        <tr >
                                            <td colspan="7">

                                                <x-loading />
                                            </td>
                                        </tr>
                                    </tbody>
                                 
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->


            <!-- #END# Add Rows -->
        </div>
    </section>
    <x-slot name="custom_js">
        <script src="assets/js/table.min.js"></script>
        <!-- Custom Js -->
        {{-- <script src="assets/js/pages/tables/jquery-datatable.js"></script> --}}

        <script src="assets/ajax/graduated_ajax.js"></script>
        <script>    
            var graduatedD = JSON.parse(currentActivedb.getItem('graduated'));
            console.log(graduatedD);
            if(graduatedD.cycle=='bachelor'){
                getbachelorstudents(graduatedD.year);
            }else{
                getmasterstudents(graduatedD.year);
            }
            
        
</script>
    </x-slot>


</x-app-layout>
