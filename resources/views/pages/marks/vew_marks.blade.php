<x-app-layout filtrage='true'>
    <x-slot name="custom_css">
        <script> var action='marksRef';</script>
    </x-slot>

    <x-slot name="custom_js">

        <script src="assets/js/table.min.js"></script>
        <!-- Custom Js -->
        <script src="assets/js/pages/tables/jquery-datatable.js"></script>

       
        <script src="assets/ajax/marks_inputs_ajax.js"></script>
<script>
    $('#marksModulusMarks_with_session_table').hide();
    var marksRef = JSON.parse(currentActivedb.getItem('marksRef'));
    console.log(marksRef);
            viewMarksOf(marksRef.year, marksRef.modulusID)
            

          function  display_with_session(checked){
           

              if(checked == true){
                viewMarks_with_session_Of(marksRef.year, marksRef.modulusID);
              }else{
                viewMarksOf(marksRef.year, marksRef.modulusID)
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
                        <div class="header">
                            <h2>
                                <strong class="page-title"></strong> Marks
                            </h2>
                            <div class="form-check m-l-10 " style="position: absolute; right: 50px;bottom:5px;">
                                
                                <label class="form-check-label">
                                    <input onChange="display_with_session(this.checked)" class="form-check-input" type="checkbox"
                                        name="acceptTerms" required> With session
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
                                            <a href="{{route('add_marks')}}" onClick="return true;">Edit marks</a>
                                        </li>
                                        <li>
                                            {{-- <a href="#" onClick="imprimer('list_corps')">Print</a> --}}
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body" id="list_corps">

                            <table  id="marksModulusMarks_table" class="table table-bordered  mb-0">
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
            </div>
        </div>
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
