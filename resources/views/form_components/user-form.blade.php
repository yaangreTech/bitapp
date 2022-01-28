<div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">User form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body card">

                <form id="wizard_with_validation" method="POST">
                    <h3>new user email</h3>
                    <fieldset>
                        <label for="user_email">user email</label>
                        <div class="form-line">
                            <input id="user_email" type="text" name="user_email" class="form-control"
                                placeholder="user email">
                        </div>
                    </fieldset>
                    <h3>new user role</h3>
                    <fieldset>

                        <label for="rights">user rights</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select id='rights' class="browser-default bordered bordered-select">
                                    <option value="" disabled selected>Choose the rights</option>
                                    <option value="1">admin</option>
                                    <option value="2">head of department</option>
                                </select>
                            </div>
                        </div>
                    </fieldset>
                    <h3>Validation</h3>
                    <fieldset>
                        <div class="form-check m-l-10">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="acceptTerms-2" name="acceptTerms"
                                    required> I agree with the Terms and Conditions.
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                    </fieldset>
                </form>
            </div>

        </div>
    </div>
</div>
