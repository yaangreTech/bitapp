<div class="modal fade" id="add_department" tabindex="-1" role="dialog" aria-labelledby="formModal"
    aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Departmemt form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form id='department_form'>
                    @csrf
                    <label for="department">Departmemt name</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="department" name="department" class="form-control" placeholder="Enter the department">
                        </div>
                        <span class="text-danger department"> </span>
                    </div>
                   

                </form>

            </div>
            <div class="modal-footer">
                <button onclick="add_department('department_form')" type="button" class="btn btn-info waves-effect save">Save</button>
                <button onclick="update_department(this.id,'department_form')" type="button" class="btn btn-info waves-effect update">Update</button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
            </div>

        </div>
    </div>
</div>

