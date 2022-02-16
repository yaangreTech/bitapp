<div class="modal fade" id="add_TU" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Tu form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                @if ($departements->count() > 0)
                    <form id='TU_form'>
                        <label for="TU_name">Tu name</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="TU_name" name="TU_name" class="form-control"
                                    placeholder="Enter the TU Name">
                            </div>
                            <span class="TU_name  text-danger"></span>
                        </div>
                     
                        <div class="row">
                            <div class="col-md-6">
                                <label for="TU_classe">Class</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select onChange="bindSemestersOf(this.value)" id='TU_classe'
                                            name="TU_classe" class="browser-default bordered bordered-select">
                                            <option value="" disabled selected>Choose the class</option>
                                            @foreach ($departements as $departement)
                                                <optgroup label="{{ $departement->name }}">
                                                    @foreach ($departement->branches as $branche)
                                                    <option value="" disabled>{{ $branche->name }}</option>
                                                    {{-- <optgroup style="" label=""> --}}
                                                        @foreach ($branche->classes as $classe)
                                                        <option value="{{ $classe->id }}">{{ $classe->name }}</option>
                                                         @endforeach;
                                                    {{-- </optgroup> --}}
                                                    @endforeach
                                                 
                                            @endforeach;
                                        </select>
                                    </div>
                                    <span class="modulus_classe  text-danger"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="clasS">Semester</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select id='TU_semester' name="TU_semester"
                                            class="browser-default bordered bordered-select">
                                            <option value="" disabled selected>Choose the Semester</option>
                                        </select>
                                    </div>
                                    <span class="TU_semester  text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button onclick="add_tu('TU_form')" type="button"
                                class="btn btn-info waves-effect save">Save</button>
                            <button onclick="update_tu(this.id,'TU_form')" type="button"
                                class="btn btn-info waves-effect update">Update</button>
                            <button type="button" class="btn btn-danger waves-effect"
                                data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                @else
                    <div>You should Create at least one Class & reload the page.</div>
                @endif

            </div>

        </div>
    </div>
</div>
