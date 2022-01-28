<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="test_list" tabindex="-1" role="dialog"
    aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Tests list</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body card">
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
                                    <a href="#" data-toggle="modal" data-target="#add_test" onClick="return false;">add
                                        new test</a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover js-basic-example contact_list">
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
                            <tbody>
                                <td class="tbl-checkbox">
                                    <label>
                                        <input type="checkbox" />
                                        <span></span>
                                    </label>
                                </td>
                                <td class="">
                                    Test1
                                </td>
                                <td class="center">Normal</td>
                                <td class="center">
                                    30%
                                </td>
                                <td class="center">
                                    <div class="badge col-red">In Prossess</div>
                                </td>
                                <td class="center">
                                    <button class="btn tblActnBtn">
                                        <i class="material-icons">mode_edit</i>
                                    </button>
                                    <button class="btn tblActnBtn">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </td>
                                </tr>
                                <tr>
                                    <td class="tbl-checkbox">
                                        <label>
                                            <input type="checkbox" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td class="">
                                        Test2
                                    </td>
                                    <td class="center">Session</td>
                                    <td class="center">
                                        50%
                                    </td>
                                    <td class="center">
                                        <div class="badge col-red">Ended</div>
                                    </td>
                                    <td class="center">
                                        <button class="btn tblActnBtn">
                                            <i class="material-icons">mode_edit</i>
                                        </button>
                                        <button class="btn tblActnBtn">
                                            <i class="material-icons">delete</i>
                                        </button>
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
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Test form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body card">
                <form>
                    <label for="test_label">Test Label</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="test_label" class="form-control" placeholder="Enter the Label">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="test_ration">Test Ratio</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="test_ration" class="form-control"
                                        placeholder="Enter the ratio">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="test_label">Test Type</label>
                         
                            <div class="form-group">
                                <div class="form-line">
                                    <select id='test_label' class="browser-default bordered bordered-select">
                                        <option value="" disabled selected>Choose the Type</option>
                                        <option value="1">Normal</option>
                                        <option value="2">Session</option>
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
