<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="test_list" tabindex="-1" role="dialog"
    aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Tests list</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div class="header">
                    <div class="col-xs-12 col-sm-6">
                        <h2>
                            <strong>Tests</strong> List
                        </h2>
                    </div>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown"
                                role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="#" data-toggle="modal" class="initier" data-target="#add_test" onClick="return false;">add
                                        new test</a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table id="marksModulusTest_table" class="table table-hover contact_list">
                            <thead>
                                <tr>
                                    <th class="center"></th>
                                    <th class="center">Name</th>
                                    <th class="center">Type</th>
                                    <th class="center">ratio</th>
                                    <th class="center">Statut</th>
                                    <th class="center">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="marksModulusTest_body">

                                <tr>
                                    <td>
                                        <x-loading />
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="add_test" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Test form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form id="mark_modulus_test_from">
                    <label for="test_type">Test Type</label>
                    <div class="form-group">
                        <div class="form-line">
                            <select onChange="validerl(this.value)" id='test_type' name="test_type"
                                class="browser-default bordered bordered-select">
                                <option value="" disabled selected>Choose the Type</option>
                                <option value="normal">Normal</option>
                                <option value="session">Session</option>
                            </select>
                        </div>
                    </div>
                    <div class="row cacher">
                        <div class="col-md-6">
                            <label for="test_label">Test Label</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select id='test_label' name="test_label"
                                        class=" cacherel browser-default bordered bordered-select">
                                        <option value="" disabled selected>Choose the Type</option>
                                        {{-- <option value="Attendance">Attendance</option> --}}
                                        {{-- <option value="Participation">Participation</option> --}}
                                        <option value="Test#1">Test1</option>
                                        <option value="Test#2">Test2</option>
                                        <option value="Test#3">Test3</option>
                                        <option value="Test#4">Test4</option>
                                        <option value="Test#5">Test5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="test_ration">Test Ratio</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="test_ration" name="test_ration"
                                        class="form-control cacherel" placeholder="Enter the ratio">
                                </div>
                            </div>
                        </div>
                    </div>
                 
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="addTest(this.id)"
                    class="btn btn-info waves-effect saveText save">Save</button>
                    <button onclick="updateTest(this.id,'mark_modulus_test_from')" type="button"
                class="btn btn-info waves-effect update">Update</button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
            </div>

        </div>
    </div>
</div>

<script>
    $('.cacher').show();
    $('.cacherel').attr('disabled', false);

    function validerl(value) {
        $('.cacher').show();
        $('.cacherel').attr('disabled', false);

        if (value == 'session') {
            $('.cacher').hide();
            $('.cacherel').attr('disabled', true);
        }

    }
</script>
