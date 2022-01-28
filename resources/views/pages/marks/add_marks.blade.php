<x-app-layout filtrage='false'>
    <x-slot name="custom_css">
        {{-- <link rel="stylesheet" href="assets/added/css/select2.css" /> --}}
        <link rel="stylesheet" href="assets/added/css/select2-bootstrap.min.css" />
        <link rel="stylesheet" href="assets/added/css/dataTables.bootstrap5.css" />
    </x-slot>

    <x-slot name="custom_js">
        {{-- <script src="assets/js/bundles/editable-table/mindmup-editabletable.js"></script>
        <!-- Custom Js -->
        <script src="assets/js/pages/tables/editable-table.js"></script> --}}

        {{-- addded --}}

        {{-- <script src="assets/added/js/select2.js"></script> --}}

        

        <script src="assets/added/js/jquery.dataTables.min.js"></script>
        
        <script src="assets/added/js/examples.datatables.editable.js"></script>
        
        <script src="assets/added/js/dataTables.bootstrap5.min.js"></script>
    </x-slot>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Cs1=>ENGLISH 1</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="{{route('dashboard')}}"  onClick="setActiveId('Dashboard')">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Marks Management</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">CS</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">CS1</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Semester1</a>
                            </li>
                            <li class="breadcrumb-item active">ENGLISH</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Cs1=>ENGLISH</strong> Marks
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
                            {{-- <table id="mainTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Cost</th>
                                        <th>Profit</th>
                                        <th>Fun</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Car</td>
                                        <td>100</td>
                                        <td>200</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>Bike</td>
                                        <td>330</td>
                                        <td>240</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td>Plane</td>
                                        <td>430</td>
                                        <td>540</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>Yacht</td>
                                        <td>100</td>
                                        <td>200</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>Segway</td>
                                        <td>330</td>
                                        <td>240</td>
                                        <td>1</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>
                                            <strong>TOTAL</strong>
                                        </th>
                                        <th>1290</th>
                                        <th>1420</th>
                                        <th>5</th>
                                    </tr>
                                </tfoot>
                            </table> --}}

                            <table class="table table-bordered table-striped mb-0" id="datatable-editable">
                                <thead>
                                    <tr>
                                        <th>Matricule</th>
                                        <th>Full name</th>
                                        <th>Test 1</th>
                                        <th>Test 2</th>
                                        <th>Test 3</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-item-id="1">
                                        <td class="actions">bs0001</td>
                                        <td class="actions">Sanou Lougoudoro
                                        </td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td class="actions   text-center">
                                            <span class="cacher item1s">
                                                <a href="#" class="hidden on-editing save-row "
                                                    onClick="sauver('.item1s','.item1e')"><i
                                                        class="fas fa-save"></i></a>
                                                <a href="#" class="hidden on-editing cancel-row "><i
                                                        class="fas fa-times"></i></a>
                                            </span>
                                            <a href="#" class="on-default edit-row item1e"
                                                onClick="editer('.item1e','.item1s')"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                        </td>
                                    </tr>
                                    <tr data-item-id="36">
                                        <td class="actions">bs0002</td>
                                        <td class="actions">Soro Mariam
                                        </td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                       <td class="actions   text-center">
                                            <span class="cacher item2s">
                                                <a href="#" class="hidden on-editing save-row "
                                                    onClick="sauver('.item2s','.item2e')"><i
                                                        class="fas fa-save"></i></a>
                                                <a href="#" class="hidden on-editing cancel-row "><i
                                                        class="fas fa-times"></i></a>
                                            </span>
                                            <a href="#" class="on-default edit-row item2e"
                                                onClick="editer('.item2e','.item2s')"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                        </td>
                                    </tr>
                                    <tr data-item-id="37">
                                        <td class="actions">bs0003</td>
                                        <td class="actions">Da Ali
                                        </td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                       <td class="actions   text-center">
                                            <span class="cacher item3s">
                                                <a href="#" class="hidden on-editing save-row "
                                                    onClick="sauver('.item3s','.item3e')"><i
                                                        class="fas fa-save"></i></a>
                                                <a href="#" class="hidden on-editing cancel-row "><i
                                                        class="fas fa-times"></i></a>
                                            </span>
                                            <a href="#" class="on-default edit-row item3e"
                                                onClick="editer('.item3e','.item3s')"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                        </td>
                                    </tr>
                                    <tr data-item-id="38">
                                        <td class="actions">bs0005</td>
                                        <td class="actions">Kabore Dao
                                        </td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                       <td class="actions   text-center">
                                            <span class="cacher item4s">
                                                <a href="#" class="hidden on-editing save-row "
                                                    onClick="sauver('.item4s','.item4e')"><i
                                                        class="fas fa-save"></i></a>
                                                <a href="#" class="hidden on-editing cancel-row "><i
                                                        class="fas fa-times"></i></a>
                                            </span>
                                            <a href="#" class="on-default edit-row item4e"
                                                onClick="editer('.item4e','.item4s')"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                        </td>
                                    </tr>
                                    <tr data-item-id="39">
                                        <td class="actions">bs0007</td>
                                        <td class="actions">Yanogo Patric
                                        </td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                       <td class="actions   text-center">
                                            <span class="cacher item5s">
                                                <a href="#" class="hidden on-editing save-row "
                                                    onClick="sauver('.item5s','.item5e')"><i
                                                        class="fas fa-save"></i></a>
                                                <a href="#" class="hidden on-editing cancel-row "><i
                                                        class="fas fa-times"></i></a>
                                            </span>
                                            <a href="#" class="on-default edit-row item5e"
                                                onClick="editer('.item5e','.item5s')"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                        </td>
                                    </tr>
                                    <tr data-item-id="40">
                                        <td>bs0008</td>
                                        <td>Sanou Dramane
                                        </td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                       <td class="actions   text-center">
                                            <span class="cacher item6s">
                                                <a href="#" class="hidden on-editing save-row "
                                                    onClick="sauver('.item6s','.item6e')"><i
                                                        class="fas fa-save"></i></a>
                                                <a href="#" class="hidden on-editing cancel-row "><i
                                                        class="fas fa-times"></i></a>
                                            </span>
                                            <a href="#" class="on-default edit-row item6e"
                                                onClick="editer('.item6e','.item6s')"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                        </td>
                                    </tr>
                                    <tr data-item-id="41">
                                        <td class="actions">bs0009</td>
                                        <td class="actions">Nana Jeremi
                                        </td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                       <td class="actions   text-center">
                                            <span class="cacher item7s">
                                                <a href="#" class="hidden on-editing save-row "
                                                    onClick="sauver('.item7s','.item7e')"><i
                                                        class="fas fa-save"></i></a>
                                                <a href="#" class="hidden on-editing cancel-row "><i
                                                        class="fas fa-times"></i></a>
                                            </span>
                                            <a href="#" class="on-default edit-row item7e"
                                                onClick="editer('.item7e','.item7s')"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                        </td>
                                    </tr>

                                    <tr class="gradeU" data-item-id="57">
                                        <td class="actions">bs0010</td>
                                        <td class="actions">Si Oumou
                                        </td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td class="actions   text-center">
                                            <span class="cacher item8s">
                                                <a href="#" class="hidden on-editing save-row "
                                                    onClick="sauver('.item8s','.item8e')"><i
                                                        class="fas fa-save"></i></a>
                                                <a href="#" class="hidden on-editing cancel-row "><i
                                                        class="fas fa-times"></i></a>
                                            </span>
                                            <a href="#" class="on-default edit-row item8e"
                                                onClick="editer('.item8e','.item8s')"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            {{-- <table class="table table-bordered table-striped mb-0" id="datatable-editable">
                                <thead>
                                    <tr>
                                        <th>Matricule</th>
                                        <th>Name</th>
                                        <th>Test 1</th>
                                        <th>Test 2</th>
                                        <th>Test 3</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-item-id="1">
                                        <td>bs0001</td>
                                        <td>Sanou Lougoudoro</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td class="actions   text-center">
                                            <span class="cacher item1s">
                                                <a href="#" class="hidden on-editing save-row "
                                                    onClick="sauver('.item1s','.item1e')"><i
                                                        class="fas fa-save"></i></a>
                                                <a href="#" class="hidden on-editing cancel-row "><i
                                                        class="fas fa-times"></i></a>
                                            </span>
                                            <a href="#" class="on-default edit-row item1e"
                                                onClick="editer('.item1e','.item1s')"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                        </td>
                                    </tr>
                                    <tr data-item-id="36">
                                        <td>bs0003</td>
                                        <td>Nana Jeremi
                                        </td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td class="actions   text-center">
                                            <span class="cacher item2s">
                                                <a href="#" class="hidden on-editing save-row "
                                                    onClick="sauver('.item2s','.item2e')"><i
                                                        class="fas fa-save"></i></a>
                                                <a href="#" class="hidden on-editing cancel-row "><i
                                                        class="fas fa-times"></i></a>
                                            </span>
                                            <a href="#" class="on-default edit-row item2e"
                                                onClick="editer('.item2e','.item2s')"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                        </td>
                                    </tr>
                                    <tr data-item-id="37">
                                        <td>bs0004</td>
                                        <td>Yanogo Patric
                                        </td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td class="actions   text-center">
                                            <span class="cacher item3s">
                                                <a href="#" class="hidden on-editing save-row "
                                                    onClick="sauver('.item3s','.item3e')"><i
                                                        class="fas fa-save"></i></a>
                                                <a href="#" class="hidden on-editing cancel-row "><i
                                                        class="fas fa-times"></i></a>
                                            </span>
                                            <a href="#" class="on-default edit-row item3e"
                                                onClick="editer('.item3e','.item3s')"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                        </td>
                                    </tr>
                                    <tr data-item-id="38">
                                        <td>bs0007</td>
                                        <td>Sanogo Marian
                                        </td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td class="actions   text-center">
                                            <span class="cacher item4s">
                                                <a href="#" class="hidden on-editing save-row "
                                                    onClick="sauver('.item4s','.item4e')"><i
                                                        class="fas fa-save"></i></a>
                                                <a href="#" class="hidden on-editing cancel-row "><i
                                                        class="fas fa-times"></i></a>
                                            </span>
                                            <a href="#" class="on-default edit-row item4e"
                                                onClick="editer('.item4e','.item4s')"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                        </td>
                                    </tr>
                                    <tr data-item-id="39">
                                        <td>bs0006</td>
                                        <td>Kere Madi
                                        </td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td class="actions   text-center">
                                            <span class="cacher item5s">
                                                <a href="#" class="hidden on-editing save-row "
                                                    onClick="sauver('.item5s','.item5e')"><i
                                                        class="fas fa-save"></i></a>
                                                <a href="#" class="hidden on-editing cancel-row "><i
                                                        class="fas fa-times"></i></a>
                                            </span>
                                            <a href="#" class="on-default edit-row item5e"
                                                onClick="editer('.item5e','.item5s')"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                        </td>
                                    </tr>
                                    <tr data-item-id="40">
                                        <td>bs0009</td>
                                        <td>Yaro Emma
                                        </td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td class="actions   text-center">
                                            <span class="cacher item6s">
                                                <a href="#" class="hidden on-editing save-row "
                                                    onClick="sauver('.item6s','.item6e')"><i
                                                        class="fas fa-save"></i></a>
                                                <a href="#" class="hidden on-editing cancel-row "><i
                                                        class="fas fa-times"></i></a>
                                            </span>
                                            <a href="#" class="on-default edit-row item6e"
                                                onClick="editer('.item6e','.item6s')"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                        </td>
                                    </tr>
                                    <tr data-item-id="41">
                                        <td>bs0005</td>
                                        <td>Si Ahmed
                                        </td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td class="actions   text-center">
                                            <span class="cacher item7s">
                                                <a href="#" class="hidden on-editing save-row "
                                                    onClick="sauver('.item7s','.item7e')"><i
                                                        class="fas fa-save"></i></a>
                                                <a href="#" class="hidden on-editing cancel-row "><i
                                                        class="fas fa-times"></i></a>
                                            </span>
                                            <a href="#" class="on-default edit-row item7e"
                                                onClick="editer('.item7e','.item7s')"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                        </td>
                                    </tr>

                                    <tr class="gradeU" data-item-id="57">
                                        <td>bs0010</td>
                                        <td>Da Solange
                                        </td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td class="actions   text-center">
                                            <span class="cacher item8s">
                                                <a href="#" class="hidden on-editing save-row "
                                                    onClick="sauver('.item8s','.item8e')"><i
                                                        class="fas fa-save"></i></a>
                                                <a href="#" class="hidden on-editing cancel-row "><i
                                                        class="fas fa-times"></i></a>
                                            </span>
                                            <a href="#" class="on-default edit-row item8e"
                                                onClick="editer('.item8e','.item8s')"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
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

        function editer(edit, sauve) {
            $(edit).hide();
            $(sauve).show();

        }

        function sauver(sauve, edit) {
            // console.log(element);
            $(edit).show();
            $(sauve).hide();
        }
    </script>
</x-app-layout>
