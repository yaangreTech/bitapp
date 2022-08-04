<div class="modal fade" id="exportAveage" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">export excel files menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
              
                    <div class="col-lg-12 col-md-12 font-20">
                       <table class="table">
                        <tr>
                            <th colspan="2">Normal Session</th>

                        </tr>
                        <tr>
                            <td>  <button> <a href="#" id='nbr'>Before reclaiming</a></button></td>
                            <td><button> <a href="#" id='nar'>After reclaiming</a></button></td>
                        </tr>
                       </table>
                       
                       
                    </div>



                    <div class="col-lg-12 col-md-12 font-20" style="margin-top:50px; margin-bottom: 15px">

                        <table class="table">
                         <tr>
                             <th colspan="2">catch up Session</th>
 
                         </tr>
                         <tr>
                             <td>  <button > <a href="#" id='cbr'>Before reclaiming</a></button></td>
                             <td><button> <a href="#" id='car'>After reclaiming</a></button></td>
                         </tr>
                        </table>
                    </div>

                    <div class="col-lg-12 col-md-12 font-20" style="margin-top:50px; margin-bottom: 15px">

                        <table class="table">
                         <tr>
                             <th colspan="2">All Combined deliberation</th>
 
                         </tr>
                         <tr>
                             <td>  <button > <a href="#" id='fdf'>Download files</a></button></td>
                         </tr>
                        </table>
                    </div>
                    
               


                {{-- <div class="pull-right">
                    <button onclick="import_marks('import_form')"
                        class="btn btn-primary waves-effect">Execute</button>
                </div> --}}
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
