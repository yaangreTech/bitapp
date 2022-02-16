<x-app-layout filtrage='true'>
    <x-slot name="custom_css">
        <script src="assets\ajax\student_ajax.js"></script>
    </x-slot>


    <x-slot name="custom_js">
  <!-- Demo Js -->
  

<script>
      var students_list = JSON.parse(currentActivedb.getItem('students_list'));
    console.log(students_list);
    getStudentOf(students_list.year, students_list.classID);
</script>
         <!-- Plugins Js -->
    <script src="assets/js/table.min.js"></script>
    <!-- Custom Js -->
    
  
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
                                <table 
                                id="students_table" 
                                    class="display student_ table table-bordered  table-hover table-checkable order-column m-t-20 width-per-100   dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last name</th>
                                            <th>Gender</th>
                                            <th>Email</th>
                                            <th>Birthdate</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="student_body"> 
                                        <tr>
                                            <td>

                                                <x-loading/>  
                                            </td> 
                                        </tr>                               
                                    </tbody>
                                 
                                 
                                </table>
                               
                                {{-- <table id="example" class="display student_ table table-bordered  table-hover table-checkable order-column m-t-20 width-per-100   dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last name</th>
                                            <th>Gender</th>
                                            <th>Email</th>
                                            <th>Birthdate</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table> --}}
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>

        {{-- form --}}

        <x-student-form />

    </section>

</x-app-layout>