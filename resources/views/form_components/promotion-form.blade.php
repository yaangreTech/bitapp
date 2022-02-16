<div class="modal fade" id="add_promotion" tabindex="-1" role="dialog" aria-labelledby="formModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Promotion form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="body">
                                <form id="wizard_with_validation" class="promotion_form" method="POST">
                                    <h3>End curent year</h3>
                                    <fieldset>
                                        <div class="m-b-20 m-t-20">
                                            Important!!!<br/>
                                            In order to create new promotion, if there is new year in prossess,<br/>
                                            it will be ended!<br/>
                                        </div>
                                        <div class="form-check m-l-10">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" id="acceptTerms-2"
                                                    name="acceptTerms" required> I agree to end if there is current year.
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </fieldset>
                                    <h3>new year infos</h3>
                                    <fieldset>
                                        {{-- <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="First Name*">
                                            </div>
                                        </div> --}}

                                        <div class="form-group form-floa">
                                            <label for="year_date">Start date</label>
                                            <div class="form-line">
                                                <input type="date"  name='start_date'  id="start_date" value='{{date('Y-m-d')}}' class="datepicker form-control"
                                                    placeholder="Please choose a date..." required readonly>
                                            </div>
                                        </div>
                                      
                                        <div class="row">
                                            <div class="col-md-6 form-group form-float">
                                                <label for="Year_label">Year label</label>
                                                <div class="form-line">
                                                    <input id="year_name" name="year_name" type="text" value="{{date('Y').'-'.(date('Y')+1)}}" name="Year_label" class="form-control"
                                                        placeholder="Year label" required readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form-group form-float">
                                                <label for="promotion_name">Promotion name</label>
                                                <div class="form-line">
                                                    <input id="promotion_name" name='promotion_name' value="{{'Promotion-'.(date('Y')+3)}}"  type="text" name="promotion_name" class="form-control"
                                                        placeholder="Promotion name*" required>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <h3>Validation</h3>
                                    <fieldset>
                                        <div class="form-check m-l-10">
                                            {{-- <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" id="acceptTerms-2"
                                                    name="acceptTerms" required> I agree To make change.
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label> --}}
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

