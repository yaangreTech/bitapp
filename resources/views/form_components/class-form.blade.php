<div class="modal fade" id="add_class" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Departmemt form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body card">
                <form>
                    <label for="dep_name">class name</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="dep_name" class="form-control" placeholder="Enter the class">
                        </div>
                    </div>
                    <label for="clas">Department</label>
                    <div class="form-group">
                        <div class="form-line">
                            <select id='clas' class="browser-default bordered bordered-select">
                                <option value="" disabled selected>Choose the department</option>
                                <option value="1">department 1</option>
                                <option value="2">department 1</option>
                                <option value="3">department 1</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="clSemesteras">1rst Semester</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select id='clSemesteras' class="browser-default bordered bordered-select">
                                        <option value="" disabled selected>Choose the Semester</option>
                                        <option value="1">Semester 1</option>
                                        <option value="2">Semester 1</option>
                                        <option value="3">Semester 1</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="clSemesteras">2nd Semester</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select id='clSemesteras' class="browser-default bordered bordered-select">
                                        <option value="" disabled selected>Choose the Semester</option>
                                        <option value="1">Semester 1</option>
                                        <option value="2">Semester 1</option>
                                        <option value="3">Semester 1</option>
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
