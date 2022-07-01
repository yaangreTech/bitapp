<x-app-layout filtrage='true'>
    <x-slot name="custom_css">
        <script> var action='grade_transcript';</script>
    </x-slot>

    <x-slot name="custom_js">
        <script src="assets/js/table.min.js"></script>
        <!-- Custom Js -->
        <script src="assets/js/pages/tables/jquery-datatable.js"></script>
        <script src="assets/ajax/transcript_ajax.js"></script>

        <script>
            var grade_transcript = JSON.parse(currentActivedb.getItem('grade_transcript'));
            console.log(grade_transcript);
            getTranscriptOf(grade_transcript.year, grade_transcript.classID)

            function display_with_session(checked){
                if(checked == true){
                    getTranscript_with_session_Of(grade_transcript.year, grade_transcript.classID);
                }else{
                    getTranscriptOf(grade_transcript.year, grade_transcript.classID);  
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
                                <a href="#" onClick="return false;">Documents</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">grade transcripts</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong class="page-title"></strong> List
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
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="grade_transcript_table" class="table table-hover table-bordered  contact_list">
                                    <thead id="grade_transcript_head">   
                                        <tr>
                                            <td class="center">
                                                <x-loading /> 
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody id="grade_transcript">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
