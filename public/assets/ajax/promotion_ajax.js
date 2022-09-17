$(function() {

})

// ************************* for departments********************************//


function add_Year(formID) {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: '/school/get_year/0',
        success: function(year) {
            inserer("/school/store_year/" + year.id, formID, null, true);
        },
        error: function(error) {
            inserer("/school/store_year/0", formID, null, true);
        }
    })

}


function update_Year(id, formID) {
    modifier("/school/update_year/" + id, formID, getAllDepartments);
    // console.log(id);
}

function delete_Year(id) {
    // console.log(id);
    suprimer('/school/delete_year/' + id, null, true);
    // console.log(id);
}

// function getAllDepartments() {
//     var dispStatus = 0;
//     selectionner("/school/get_departments", departmentData);

// }