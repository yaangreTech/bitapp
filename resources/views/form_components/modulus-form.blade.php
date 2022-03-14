<div class="modal fade" id="add_modulus" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Modulus form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                @if ($departements->count() > 0)
                    <form id='modulus_form'>
                        <label for="module_name">Module name</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="module_name" name="module_name" class="form-control"
                                    placeholder="Enter the Modulus">
                            </div>
                            <span class="module_name  text-danger"></span>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="modulus_credict">Module Credict</label>
                                <div class="form-group">
                                   <div class='input-group'>
                                    <div class="form-line">
                                        <input type="number" id="modulus_credict" name="modulus_credict"
                                            class="form-control" placeholder="Enter the Credict">
                                    </div>
                                    <span class="input-group-addon">Credits</span>
                                   </div>
                                  
                                    <span class="modulus_credict  text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="modulus_hours">Module Hours</label>
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="form-line">
                                        <input type="number" id="modulus_hours" name="modulus_hours"
                                            class="form-control" placeholder="Enter the Hours">
                                    </div>
                                    <span class="input-group-addon">Hours</span>
                                  </div>
                                    <span class="modulus_hours"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="modulus_classe">Class</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select onChange="bindTuOf(this.value)" id='modulus_classe'
                                            name="modulus_classe" class="browser-default">
                                            <option value="" disabled selected>Choose the class</option>
                                            @foreach ($departements as $departement)
                                                <optgroup label="{{ $departement->name }}">
                                                    @forelse ($departement->branches as $branche)
                                                        <option value="" disabled>{{ $branche->name }}</option>
                                                        @foreach ($departement->classes as $classe)
                                                            <option value="{{ $classe->id }}">
                                                                {{ $classe->name }}
                                                            </option>
                                                        @endforeach;
                                                    @empty
                                                        <option disabled> No Classe in this branch</option>
                                                    @endforelse
                                            @endforeach;
                                        </select>
                                    </div>
                                   
                                    <span class="modulus_classe  text-danger"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="modulus_TU">TU</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select id='modulus_TU' name="modulus_TU"
                                            class="browser-default bordered bordered-select">
                                            <option value="" disabled selected>Choose the TU</option>
                                        </select>
                                    </div>
                                    <span class="modulus_TU  text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button onclick="add_modulus('modulus_form')" type="button"
                                class="btn btn-info waves-effect save">Save</button>
                            <button onclick="update_modulus(this.id,'modulus_form')" type="button"
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
