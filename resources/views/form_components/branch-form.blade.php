<div class="modal fade" id="add_branch" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Option form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form id='branch_form' method='post'>
                    @csrf
                    <div class='row clearfix'>
                        <div class='col-lg-6'>
                            <label for="branch_name">Option name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="branch_name" name="branch_name"
                                        class="form-control" placeholder="Enter the branch name" required>
                                </div>
                                <span class="text-danger branch_name"> </span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label for="branch_departement">Option Departmemt</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select id='branch_departement' name='branch_departement'
                                        class="browser-default bordered bordered-select" required>
                                        <option value="">Choose the department</option>
                                        @foreach ($departements as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}
                                            </option>
                                        @endforeach;
                                    </select>
                                </div>
                                <span class="branch_departement  text-danger"></span>
                            </div>
                        </div>

                    </div>

                    {{-- <div class="irs-demo">
                        <b>Option levels</b>
                        <input name="levels_range" type="text" id="levels_range" value="" />
                    </div> --}}
                    <div class='row clearfix'>
                        <div class='col-lg-6'>
                            <label for="branch_i_level">Initial level</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select onchange="bindfinalLevles(this.value)" id='branch_i_level' name='branch_i_level'
                                    class="browser-default bordered bordered-select" required>
                                    <option value="">Choose the Initial level</option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}">{{ $level->label }}
                                        </option>
                                    @endforeach;
                                </select>
                                </div>
                                <span class="text-danger branch_i_level"> </span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label for="branch_f_level">Final level</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select disabled id='branch_f_level' name='branch_f_level'
                                        class="browser-default bordered bordered-select" required>
                                        <option value="">Choose the final level</option>
                                       
                                    </select>
                                </div>
                                <span class="branch_f_level  text-danger"></span>
                            </div>
                        </div>

                    </div>
                </form>



            </div>
            <div class="modal-footer">
                <button onclick="add_branch('branch_form')" type="button"
                    class="btn btn-info waves-effect save">Save</button>
                <button onclick="update_branch(this.id,'branch_form')" type="button"
                    class="btn btn-info waves-effect update">Update</button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
            </div>

        </div>
    </div>
</div>
