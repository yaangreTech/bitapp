<x-app-layout filtrage='true'>
    <x-slot name="custom_css">
        <script> var action='marksRef';</script>
    </x-slot>

    <x-slot name="custom_js">

        <script src="assets/js/table.min.js"></script>
        <!-- Custom Js -->
        <script src="assets/js/pages/tables/jquery-datatable.js"></script>

        {{-- <script src="assets/js/bundles/editable-table/mindmup-editabletable.js"></script>
        <!-- Custom Js -->
        <script src="assets/js/pages/tables/editable-table.js"></script> --}}

        {{-- addded --}}

        {{-- <script src="assets/added/js/select2.js"></script> --}}



        {{-- <script src="assets/added/js/jquery.dataTables.min.js"></script> --}}

        {{-- <script src="assets/added/js/examples.datatables.editable.js"></script> --}}

        {{-- <script src="assets/added/js/dataTables.bootstrap5.min.js"></script> --}}
        <script src="assets/ajax/marks_inputs_ajax.js"></script>

        <script>
             var marksRef = JSON.parse(currentActivedb.getItem('marksRef'));
    console.log(marksRef);
            getMarksOf(marksRef.year, marksRef.modulusID)
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
                                <a href="{{ route('dashboard') }}" onClick="setActiveId('Dashboard')">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Marks Management</a>
                            </li>
                            {{-- <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">CS</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">CS1</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Semester1</a>
                            </li>
                            <li class="breadcrumb-item active">ENGLISH</li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                
                        <div class="card">
                            <div class="profile-tab-box">
                                <div class="p-l-20">
                                    <ul class="nav ">
                                        <li class="nav-item tab-all">
                                            <a class="nav-link active show" href="#Normal_Session"
                                                data-toggle="tab">Normal Session</a>
                                        </li>
                                        <li class="nav-item tab-all">
                                            <a class="nav-link" href="#Redo_Session" onclick="getSessionMarksOf(marksRef.year, marksRef.modulusID)"
                                                data-toggle="tab">Redo Session</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">
                            {{-- Normal session inputs --}}
                            <div role="tabpanel" class="tab-pane active" id="Normal_Session" aria-expanded="true">
                                <div class="card">
                                    <div class="header">
                                        <h2>
                                            {{-- <strong>Cs1=>ENGLISH</strong> Marks --}}
                                        </h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown"
                                                    role="button" aria-haspopup="true" aria-expanded="false">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li>
                                                        
                                                        <a href="#" data-toggle="modal" data-target="#markImporter" onClick="return true;">Import Form</a>
                                                        <a href="{{route('view_marks')}}" onClick="return true;">View Marks</a>
                                                    </li>
                                                   
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="body" id="list_corps">
                                        <div class="alert bg-pink alert-dismissible align-center font-bold notif" hidden role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                           <span id="notif"></span>
                                        </div>
            
                                        <table  id="marksModulusMarks_table" class="table table-hover  table-bordered  mb-0">
                                            
                                            <thead id="marksModulusMarks_head">
                                                <tr>
                                                   <th> <x-loading/></th>
                                                </tr>
                                            </thead>
                                            <tbody id="marksModulusMarks_body">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            {{-- Redo session inputs --}}
                            <div role="tabpanel" class="tab-pane" id="Redo_Session" aria-expanded="true">
                                <div class="card">
                                    <div class="header">
                                        <h2>
                                            {{-- <strong>Cs1=>ENGLISH</strong> Marks --}}
                                        </h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown"
                                                    role="button" aria-haspopup="true" aria-expanded="false">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li>
                                                        <a href="{{route('view_marks')}}" onClick="return true;">View Marks</a>
                                                    </li>
                                                   
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="body" id="session_corps">
            
                                        <table  id="marksModulusSession_table" class="table table-bordered table-hover  mb-0">
                                            <thead id="marksModulusSession_head">
                                                {{-- <tr>
                                                   <th> <x-loading/></th>
                                                </tr> --}}
                                            </thead>
                                            <tbody id="marksModulusSession_body">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                   




                    {{--  --}}
                   
                </div>
            </div>
        </div>

        <x-import-marks-form/>
    </section>

    {{-- <script type="text/javascript">
        // $('.hidden').css('display','none');
        console.log('loadedd');
        $(window).on('load', function() {
            // document.querySelector('.cacher').display='none';
            // $(".cacher").each(function(){
            //     console.log('ok');
            // var element=$(this);
            // element.hide();
            // })
            $(".cacher").hide();
            // console.log($('.cacher'));
        });

        function editer_celule(edit, sauve) {
            $(edit).hide();
            $(sauve).show();

        }

        function sauver(sauve, edit) {
            // console.log(element);
            $(edit).show();
            $(sauve).hide();
        }
    </script> --}}
</x-app-layout>
