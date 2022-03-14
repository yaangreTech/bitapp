<div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">User form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">

                <form id="wizard_with_validation" class="user_form" method="POST">
                    <h3>Important</h3>
                    <fieldset>
                        <div class="m-b-20 m-t-20 center">
                            <h4>Important!!!</h4><br/>
                          <h5>  If your add new user, he will be able to actions in the system,<br/>
                            according to his rights!!!<br/></h5>
                        </div>
                        <div class="form-check m-l-10 center">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="acceptTerms-2" name="acceptTerms"
                                    required> I understood.
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                    </fieldset>
                    <h3>User role</h3>
                    <fieldset>
                        <div class="form-group demo-masked-input">
                            <label for="email">new user email</label>
                        <div class="form-line">
                            <input onblur="verifier_email(this.value)"  id="email" name="email" type="text" class="form-control email"
                                placeholder="user email " required>
                        </div>
                        <span class="email text-danger"></span>
                        </div>
                    
                        <label for="right_id">new user right</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select onChange="switch_N_U_D(this.value)" id='right_id' name="right_id" required class="browser-default bordered bordered-select">
                                    <option value="" disabled selected>Choose the rights</option>
                                    @foreach($rights as $right)
                                    <option value="{{$right->id}}">{{$right->label}}</option>
                                    @endforeach;
                                </select>
                            </div>
                        </div>

                       <div id="display_user_department">
                        <label for="user_departement"> new user departement</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select  required id="user_departement" name='user_departement' class="browser-default bordered bordered-select">
                                    <option value="" disabled selected>Choose the departement</option>
                                   @forelse ($departements as $departement)
                                   <option value="{{$departement->id}}">{{$departement->name}}</option>
                                   @empty
                                   <option disabled value=""><h3 class="text-red">Add a departement before</h3></option> 
                                   @endforelse
                                </select>
                            </div>
                        </div>
                       </div>

                    </fieldset>
                    <h3>Validation</h3>
                    <fieldset>
                        <div class="form-check m-l-10 center">
                            <h3>Click  to the save button below to finalize the new user creation process !!!</h3>
                        </div>
                    </fieldset>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
     $('#display_user_department').hide(); 
     $('#user_departement').attr('disabled',true); 
   function switch_N_U_D(value) {
       console.log('ok');
    if(value=='2'){
        $('#display_user_department').show();
     $('#user_departement').attr('disabled',false); 

    }else{
        $('#display_user_department').hide(); 
     $('#user_departement').attr('disabled',true); 

    }
   }
</script>