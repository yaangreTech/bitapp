<div class="modal fade" id="add_modulus" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Modulus form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body card">
                <form>
                    <label for="Module_name">Module name</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="Module_name" class="form-control" placeholder="Enter the Modulus">
                        </div>
                    </div>
                    <label for="Credict">Module name</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" id="Credict" class="form-control" placeholder="Enter the Credict">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="clas">Class</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select id='clas' class="browser-default bordered bordered-select">
                                        <option value="" disabled selected>Choose the class</option>
                                        <option value="1">CS 1</option>
                                        <option value="2">CS 2</option>
                                        <option value="3">CS 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="clasS">Semester</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select id='clasS' class="browser-default bordered bordered-select">
                                        <option value="" disabled selected>Choose the Semester</option>
                                        <option value="1">Semester 1</option>
                                        <option value="2">Semester 2</option>
                                        <option value="3">Semester 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info waves-effect">Save</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
