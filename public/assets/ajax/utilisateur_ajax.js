$(function() {

})

// ************************* for departments********************************//


function add_User(formID) {
    inserer("/school/store_user", formID, null, true);
}


function update_User(id, formID) {
    modifier("/school/update_user/" + id, formID, null);
    // console.log(id);
}

function delete_User(id) {
    // console.log(id);
    suprimer('/school/delete_user/' + id, null, true);
    // console.log(id);
}

function desable_User(id) {
    // console.log(id);
    desactiver('/school/desable_user/' + id, null, true);
    // console.log(id);
}

function enable_User(id) {
    // console.log(id);
    activer('/school/enable_user/' + id, null, true);
    // console.log(id);
}

function verifier_email(email) {
    selectionner('/school/verifier_email/' + email, verifier_logic);
}

function verifier_logic(data) {
    // console.log(data);
    jQuery.isEmptyObject(data) ? $('.email').html('') : $('.email').html('this email esit');

}