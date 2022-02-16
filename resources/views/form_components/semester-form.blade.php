<div class="modal fade" id="add_semester" tabindex="-1" role="dialog" aria-labelledby="formModalw"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalw">Semester form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form id="semester_form">
                    @csrf
                    <label for="semester">Semester name</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="semester" name="semester" class="form-control"
                                placeholder="Enter the Semester">
                        </div>
                        <span class="text-danger semester  text-danger"> </span>
                    </div>
              
                </form>
            </div>
            <div class="modal-footer">
                <button onclick="add_semester('semester_form')" type="button" class="btn btn-info waves-effect save">Save</button>
                <button onclick="update_semester(this.id,'semester_form')" type="button" class="btn btn-info waves-effect update">Update</button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
            </div>

        </div>
    </div>
</div>
