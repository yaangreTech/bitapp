<x-app-layout filtrage='false'>
    <x-slot name="custom_css">
        <style>


        </style>
    </x-slot>

    <x-slot name="custom_js">
        <script src="assets/js/table.min.js"></script>
        <script src="assets/ajax/transcript_ajax.js"></script>
        <script>
            var inscID = currentActivedb.getItem('inscID');
            console.log(inscID);
            console.log('inscID');
            viewTranscriptOf(inscID);
           $('#imprimegrate').attr('href','grade-transcript-file/'+inscID+'/false/en');
           function display_with_session(checked){
            $('#imprimegrate').attr('href','grade-transcript-file/'+inscID+'/'+checked+'/en');
            if(checked == true){
                
                viewTranscript_with_session_Of(inscID);
               
            }else{
                viewTranscriptOf(inscID);  
                imprimegrate=function(){
                    alert('oki')
                }
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
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="secon_hide">
                                        <x-loading/>
                                    </div>
                                    <div class="white-box first_hide">
                                        <h3>
                                            <b>Grade Transcripts</b>
                                           
                                            <a href="" id="imprimegrate" target="_blank">
                                                <button id="imprimegrate" type="button"
                                                class="btn pull-right btn-border-radius btn-outline-info">
                                                <i class="material-icons">print</i>
                                                <span>Export to pdf</span>
                                            </button>
                                            </a>
                                           
                                        </h3>
                                        <div class="form-check m-l-10 " style="position: absolute; right: 170px;top:5px;">
                                
                                            <label class="form-check-label">
                                                <input  onChange="display_with_session(this.checked)" class="form-check-input" type="checkbox"
                                                    name="acceptTerms" required> With session
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <hr>

                                        <div id='notes' class="row">
                                            <div class="col-md-12 align-center">
                                                <div class="align-center">
                                                    <p>
                                                        Autorisation de création: N°
                                                        2018-00/01347/MESRSI/SG/DGESup/DIPES du 13 Septembre 2018<br />
                                                        Autorisation d’ouverture: N°
                                                        2018-00001511/MESRSI/SG/DGESup/DIPES du 25 Septembre 2018
                                                    </p>
                                                </div>

                                            </div>
                                            <div class="col-md-12">
                                                <div class="pull-left">
                                                    <address>
                                                        <img width="250" src="assets/images/head_icon.png" alt="logo"
                                                            class="logo-default" />
                                                    </address>
                                                </div>
                                                <div class="pull-right text-right">
                                                    <address>
                                                        <p class="addr-font-h3"><strong>B</strong>URKINA
                                                            <strong>F</strong>ASO
                                                        </p>
                                                        <p class="font-bold addr-font-h4">
                                                            Ministry of Higher Education,<br /> Scientific Research and
                                                            Innovation
                                                        </p>

                                                    </address>
                                                </div>
                                            </div>
                                            <div class="col-md-12 align-center">
                                                <div class="align-center">
                                                    <h3 class="align-center"><span
                                                            style="width:300px; border-bottom: 1px solid;">Grade
                                                            Transcript</span></h3>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="pull-left">
                                                    {{-- <div class=" row"> --}}
                                                        <address class="pull-left">
                                                            <p class="">Surname</p>
                                                            <p class="">Name</p>
                                                            <p class="">ID</p>
                                                        </address>
                                                        <address class="pull-left student_ref">
                                                        </address>

                                                    {{-- </div> --}}
                                                </div>
                                                <div class="pull-right ">
                                                    <address class="promotion_ref">
                                                    </address>
                                                </div>
                                             
                                            </div>

                                            <div class="col-md-12">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>TU</th>
                                                            <th>TUE</th>
                                                            <th>TUE Credits</th>
                                                            <th>Grade/20</th>
                                                            <th>TU Average</th>
                                                            <th>Acquired Credits</th>
                                                            <th>TU Validation</th>
                                                            <th>Rating</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="grades_view_body">

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="pull-right">
                                                    {{-- Koudougou, Monday September 27th, 2021 --}}
                                                   Koudougou, {{$today}}
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="pull-right align-center">
                                                    <div style="width:300px;">
                                                        <span class="font-bold font-underline" style="color:black;">
                                                            Accademic
                                                            Director</span><br />
                                                    </div>
                                                    <div class="m-t-20" style="width:300px;margin-top: 100px">
                                                        <span class="font-underline" style="color:black;"> Dr.
                                                            Bawindsom Marcel KEBRE</span>
                                                        <p>Maître de Conférences (Lecturer)</p>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </section>


</x-app-layout>
