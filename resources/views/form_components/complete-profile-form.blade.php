<div class="modal fade" id="compete_profile" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="formModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Complete your registration</h5>
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
            </div>

            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="body">
                                <form id="wizard_with_validation" class="complete_profile_form">
                                    @csrf
                                    <h3>Notification</h3>
                                    <fieldset>
                                        <div class="m-b-20 m-t-20">
                                            Important!!!<br/>
                                            Please follow these step to complete your registration,<br/>
                                            it will be ended!<br/>
                                        </div>
                                    </fieldset>
                                    <h3>First name</h3>
                                    <fieldset>
                                        <div class="form-group form-floa">
                                            <label for="firstname">First name</label>
                                            <div class="form-line">
                                                <input type="text"  name='firstname'  id="firstname" class="form-control"
                                                    placeholder="Please type your first name..." required >
                                            </div>
                                        </div>
                                    </fieldset>
                                    <h3>Last Name</h3>
                                    <fieldset>
                                        <div class="form-group form-floa">
                                            <label for="lastname">Last Name</label>
                                            <div class="form-line">
                                                <input type="text"  name='lastname'  id="lastname" class="form-control"
                                                    placeholder="Please type your last name..." required>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <h3>Phone number</h3>
                                    <fieldset>
                                        <div class="form-group form-floa">
                                            <label for="phone">Phone number</label>
                                            <div class="form-line">
                                                <input type="phone"  name='phone'  id="phone" class="form-control"
                                                    placeholder="Please type your phone number..." required>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-info waves-effect">Save</button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
            </div> --}}
        </div>
    </div>
</div>
