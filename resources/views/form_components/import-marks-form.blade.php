<div class="modal fade" id="markImporter" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Import marks form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form id="templateTypefom" method='post'>
                    @csrf
                    <input type="text" name="xxx" hidden/>
                </form>
                    <div class="col-lg-12 col-md-12 font-20">
                        In order do import students list from a csv file. there is a themplate that shoold
                        be respect
                        in order to succes the importation of data. download the <button
                             onclick="submitwithType('simple')" > simple template</button>  or the <button
                             onclick="submitwithType('withList')"> template with students list</button>
                        csv themplate.
                    </div>
                    
                <form id='import_form' method='post'>
                <div class="row">
                    
                        @csrf
                        <div class="col-md-6">
                        </div>

                        <div class="col-md-6">
                        </div>

                        <div class="col-md-12">
                            {{-- <form action="#"> --}}
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>File</span>
                                    <input name="ficher1" accept=".csv" type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input name="ficher2" class="file-path validate" type="text">
                                </div>
                            </div>
                            {{-- </form> --}}
                        </div>

                   
                </div>
             </form>


                <div class="pull-right">
                    <button onclick="import_marks('import_form')"
                        class="btn btn-primary waves-effect">Execute</button>
                </div>
            </div>

            <div class="moal-footer">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="importLogs">
    
                    </div>
                </div>
            </div>
            </div>

            {{-- <div class="modal-footer">
                <button onclick="add_branch('branch_form')" type="button"
                    class="btn btn-info waves-effect save">Save</button>
                <button onclick="update_branch(this.id,'branch_form')" type="button"
                    class="btn btn-info waves-effect update">Update</button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
            </div> --}}

        </div>
    </div>
</div>
