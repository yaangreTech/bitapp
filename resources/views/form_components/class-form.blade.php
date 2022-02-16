<div class="modal fade" id="add_class" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Classe form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                @if ($departements->count()>0)
                    @if ($semestre_names->count()>1)
                    <form id="classe_form">
                        @csrf
                        <label for="classe_name">class name</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="classe_name" name="classe_name" class="form-control"
                                    placeholder="Enter the class">
                            </div>
                            <span class="classe_name text-danger"></span>
                        </div>
    


                        <div class="row">
                            <div class="col-md-6">
                                <label for="classe_branch">Branch</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select id='classe_branch' name="classe_branch"
                                            class="browser-default bordered bordered-select">
                                            <option value="" disabled selected>Choose the branch</option>
                                            @foreach ($departements as $departement)
                                                <optgroup label="{{ $departement->name }}">
                                                    @foreach ($departement->branches as $branch)
                                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach;
                                        </select>
                                    </div>
                                    <span class="classe_branch  text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="classe_level">Level</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select id='classe_level' name="classe_level"
                                            class="browser-default bordered bordered-select">
                                            <option value="" disabled selected>Choose the level</option>
                                       
                                                <option value="1">Level 1</option>
                                                <option value="2">Level 2</option>
                                                <option value="3">Level 3</option>
                                            
                                        </select>
                                    </div>
                                    <span class="classe_level  text-danger"></span>
                                </div>
                            </div>
    
    
                        </div>
                       
    
                        <div class="row">
                            <div class="col-md-6">
                                <label for="classe_semester_1">1rst Semester</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select id='classe_semester_1' name='classe_semester_1'
                                            class="browser-default bordered bordered-select">
                                            <option value=""  >Choose the Semester</option>
                                            @foreach ($semestre_names as $semestre_name)
                                                <option value="{{ $semestre_name->id }}">{{ $semestre_name->name }}
                                                </option>
                                            @endforeach;
                                        </select>
                                    </div>
                                    <span class="classe_semester_1  text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="classe_semester_2">2nd Semester</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select id='classe_semester_2' name="classe_semester_2"
                                            class="browser-default bordered bordered-select">
                                            <option value="" disabled selected>Choose the Semester</option>
                                            @foreach ($semestre_names as $semestre_name)
                                                <option value="{{ $semestre_name->id }}">{{ $semestre_name->name }}
                                                </option>
                                            @endforeach;
                                        </select>
                                    </div>
                                    <span class="classe_semester_2  text-danger"></span>
                                </div>
                            </div>
    
    
                        </div>
                        <div class="modal-footer">
                            <button onclick="add_classe('classe_form')" type="button" class="btn btn-info waves-effect save">Save</button>
                            <button onclick="update_classe(this.id,'classe_form')" type="button" class="btn btn-info waves-effect update">Update</button>
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                    @else
                    <div>You should Create at least 2 Semester & reload the page.</div>
                    @endif

               
                @else
                    <div>You should Create at least one department & reload the page.</div>
                @endif
               
            </div>

        </div>
    </div>
</div>
