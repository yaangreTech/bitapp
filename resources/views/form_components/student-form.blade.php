<div class="modal fade" id="update_student" tabindex="-1" role="dialog" aria-labelledby="formModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Student form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form {{-- id="wizard_with_validation" --}} class="student_form" id="student_form" method="POST">
                    @csrf
                    <h3>Students references</h3>
                    {{-- <fieldset> --}}
                    <div class="demo-masked-input">
                        <div class="row clearfix">
                            {{-- students ID fied --}}
                            <div class="col-md-4">
                                <b>Matricule</b><span class="text-danger">*</span>
                                <div class="input-group ">
                                    <div class="form-group ">
                                        {{-- <div class="form-line"> --}}
                                        <input id="studentID"  name='studentID' type="text" class="form-control ID"
                                            placeholder="Ex: bs00001" required  readonly />
                                        {{-- </div> --}}
                                    </div>
                                    <span class="text-danger studentID"> </span>
                                </div>

                            </div>

                            {{-- First name field --}}
                            <div class="col-md-4">
                                <b>First name</b><span class="text-danger">*</span>
                                <div class="input-group">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="studentFirstName" name="studentFirstName" type="text"
                                                class="form-control name" placeholder="Ex: Sanou" required />
                                        </div>
                                    </div>
                                </div>

                            </div>

                            {{-- Last name fied --}}
                            <div class="col-md-4">
                                <b>Last mane</b><span class="text-danger">*</span>
                                <div class="input-group">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="studentLastName" name="studentLastName" type="text"
                                                class="form-control name" placeholder="Ex: lougoudoro" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Birthday field --}}
                            <div class="col-md-4">
                                <b>BirthDate</b><span class="text-danger">*</span>
                                <div class="input-group">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="studentBirthDate" name="studentBirthDate" type="text"
                                                class="form-control" placeholder="Ex: 1999-07-10" required />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Phone number field --}}
                            <div class="col-md-4">
                                <b>Mobile Phone Number</b><span class="text-danger">*</span>
                                <div class="input-group">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="studentPhone" name="studentPhone" type="text"
                                                class="form-control mobile-phone-number"
                                                placeholder="Ex: 00 (000) 00-00-00-00" required />
                                        </div>
                                    </div>
                                    <span class="text-danger studentPhone"> </span>
                                </div>
                            </div>

                            {{-- Email adress Field --}}
                            <div class="col-md-4">
                                <b>Email Address</b><span class="text-danger">*</span>
                                <div class="input-group">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="studentEmail" name="studentEmail" type="text"
                                                class="form-control email" placeholder="Ex: example@example.com"
                                                required />
                                        </div>
                                    </div>
                                    <span class="text-danger studentEmail"> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- </fieldset> --}}
                    <h3>Students parents</h3>
                    <div {{-- class="demo-masked-input" --}}>
                        <div class="row clearfix">
                            <div class="col-md-4">
                                <b>First name</b>
                                <div class="input-group">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="studentParentFirstName" name="studentParentFirstName"
                                                class="form-control" placeholder="Ex: Soro" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <b>Last mane</b>
                                <div class="input-group">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="studentParentLastName" id="studentParentLastName" type="text"
                                                class="form-control " placeholder="Ex: brahima" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <b>Mobile Phone Number</b>
                                <div class="input-group">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="studentParentPhone" name="studentParentPhone" type="text"
                                                class="form-control mobile-phone-number"
                                                placeholder="Ex: 00 (000) 000-00-00" required />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Profession</label>
                                <div class="form-group">
                                    <select id="studentParentProfession" name="studentParentProfession"
                                        class="browser-default" required>
                                        <option value="" disabled selected>Choose option</option>
                                        <option value="Farmer">Farmer</option>
                                        <option value="House">House</option>
                                        <option value="Worker">Worker</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Type</label>
                                <div class="form-group">
                                    <select required id="studentParentType" name="studentParentType"
                                        class="browser-default">
                                        <option value="" disabled selected>Choose option</option>
                                        <option value="Father">Father</option>
                                        <option value="Mother">Mother</option>
                                        <option value="Oncle">Oncle</option>
                                        <option value="Brother">Brother</option>
                                        <option value="tutor">tutor</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="update_student(this.id, 'student_form')"
                    class="btn btn-info waves-effect update">Update</button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
