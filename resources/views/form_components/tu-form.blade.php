<div class="modal fade" id="add_TU" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Tu and ECU Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form id="wizard_with_validation" class="" method="POST">
                    <h3>Tu references and its references</h3>
                    <fieldset>
                        <div class="row">
                        <div class="col-md-6" style="margin-bottom: 0px;important">
                            <label for="TU_classe">Tu name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="TU_name" name="TU_name" class="form-control"
                                        placeholder="Enter the TU Name" required>
                                </div>
                                <span class="TU_name  text-danger"></span>
                            </div>
                        </div>
                        
                        <div class="col-md-6" style="margin-bottom: 0px;important">
                            <label for="TU_classe">Tu Code</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="TU_code" name="TU_code" class="form-control"
                                        placeholder="Enter the TU code" required>
                                </div>
                                <span class="TU_code  text-danger"></span>
                            </div>
                        </div>

                        </div>
                     

                        <div class="row">
                            <div class="col-md-6" style="margin-bottom: 0px;important">
                                <label for="TU_classe">Level</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select onChange="bindSemestersOf(this.value)" id='TU_classe'
                                            class="browser-default bordered bordered-select" required>
                                            <option value="" disabled selected>Choose the level</option>
                                            @foreach ($departements as $departement)
                                                {{-- <i class="material-icons">keyboard_arrow_down</i> --}}
                                                @foreach ($departement->branches as $branche)
                                                    <optgroup
                                                        label="{{ $departement->name . '  ' . $branche->name }}">
                                                        {{-- <optgroup style="" label=""> --}}
                                                        @foreach ($branche->levels as $level)
                                                            <option value="{{ $level->id }}">
                                                                {{ $branche->name . ', ' . $level->name }}
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="modulus_classe  text-danger"></span>
                                </div>
                            </div>

                            <div class="col-md-6" style="margin-bottom: 0px;important">
                                <label for="clasS">Semester</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select id='TU_semester' name="TU_semester"
                                            class="browser-default bordered bordered-select" required>
                                            <option value="" disabled selected>Choose the Semester</option>
                                        </select>
                                    </div>
                                    <span class="TU_semester  text-danger"></span>
                                </div>
                            </div>
                        </div>
            
                        {{-- liaison --}}
                            <input type="text" class="form-control" style="position: absolute; width:0px; height:0px"
                            name="TU_checker" id="TU_checker" required>
                            <input type="text" class="form-control" style="position: absolute; width:0px; height:0px"
                            id="tu_id">

                        <div class="body">
                            <div class="row">
                                <div class="col-md-4" style="margin-bottom: 0px;important">
                                    <label for="ECU_name">Ecu name</label>
                                    <input type="text" id='ECU_name' class="tdl-new form-control"
                                        placeholder="Ex: English 1">
                                </div>
                                <div class="col-md-3" style="margin-bottom: 0px;important">
                                    <label for="ECU_credict">Ecu credit</label>
                                    <input type="number" id='ECU_credict' class="tdl-new form-control center"
                                        placeholder="Ex: 6">
                                </div>
                                <div class="col-md-3" style="margin-bottom: 0px;important">
                                    <label for="ECU_hours">Ecu hours</label>
                                    <input type="number" id='ECU_hours' class="tdl-new form-control center"
                                        placeholder="Ex: 120">
                                </div>
                                <div class="col-md-2" style="margin-bottom: 0px;important">
                                    <button onclick="bindEcu('adding')" type="button"
                                        class="btn btn-outline-info waves-effect pull-right">add</button>
                                </div>
                            </div>
                            <div class="tdl-content" style="max-height: 175px !important; overflow-y: scroll;">
                                <ul id="modList" class="to-do-list ui-sortable" style="">
                                </ul>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
