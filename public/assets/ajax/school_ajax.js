// var dispStatus = 0;
$(function() {
    getAllDepartments();
    getAllSemesters();
    dispStatus = -1;
    $('#TU_semester').attr('disabled', true);
    $('#modulus_TU').attr('disabled', true);


})
var departement_table = null;
var semester_table = null;
var classe_table = null;
var modulus_table = null;

// ************************* for departments********************************//

// function to add department
function add_department(formID) {
    inserer("/school/store_department", formID, getAllDepartments);
}

// function to update department
function update_department(id, formID) {
    modifier("/school/update_department/" + id, formID, getAllDepartments);
    // console.log(id);
}

// function to delete a departement
function delete_department(id) {
    suprimer('/school/delete_department/' + id, getAllDepartments);
    // console.log(id);
}

// Function to get all active department from the database
function getAllDepartments() {
    var dispStatus = 0;
    selectionner("/school/get_departments", departmentData);
    getAllBrances();

}


// ************************* for Branch********************************//

// function to add new branch
function add_branch(formID) {
    inserer("/school/store_branch", formID, getAllDepartments);
}

// Function to update a branch
function update_branch(id, formID) {
    modifier("/school/update_branch/" + id, formID, getAllDepartments);
    // console.log(id);
}

// function to delete a branch
function delete_branch(id) {
    suprimer('/school/delete_branch/' + id, getAllDepartments);
    // console.log(id);
}

// Function to get all branches from the database
function getAllBrances() {
    var dispStatus = 0;
    selectionner("/school/get_branchs", branchData);

}


// ================================== For Semesters =======================================

// the function to get all semester from the database
function getAllSemesters() {
    selectionner("/school/get_semesters", semesterData);

}

// the function to add new semester to the database
function add_semester(formID) {
    inserer("/school/store_semester", formID, getAllSemesters);
}

// the function to update a given  semester
function update_semester(id, formID) {
    console.log(id, formID);
    modifier("/school/update_semester/" + id, formID, getAllSemesters);
    // console.log(id);
}

// the function to delete a given semester
function delete_semester(id) {
    suprimer('/school/delete_semester/' + id, getAllSemesters);
    // console.log(id);
}


// ************************* for classes********************************//

// the to add new classe to the database
function add_classe(formID) {
    inserer("/school/store_classe/", formID, getAllDepartments);
}

// The function update a given classe
function update_classe(id, formID) {
    modifier("/school/update_classe/" + id, formID, getAllDepartments);
    // console.log(id);
}

// the function to delete a given classe
function delete_classe(id) {
    suprimer("/school/delete_classe/" + id, getAllDepartments);
    // console.log(id);
}

// the function to get classes of a department]
function getClassesOf(depID) {
    selectionner("/school/get_classe_sof/" + depID, classeData);

}

// the function to display classes of the given department
function display_Classes_of(ElementID) {
    $('.classe_menu').removeClass('active');
    // $('.classe_menu').addClass('active');
    depID = ElementID.split('cm')[1];
    getClassesOf(depID);
    $('#' + ElementID).parent('li').addClass('active');
}

// ============================ For TU =============================================

// function to get Tus of a given classe
function getTuOf(classeID) {

    selectionner("/school/get_tu_of/" + classeID, tuData);

}

// function to add a tu to the database
function add_tu(formID) {
    inserer("/school/store_tu", formID, getAllDepartments);
}

// function to update a given tu
function update_tu(id, formID) {
    console.log(id, formID);
    modifier("/school/update_tu/" + id, formID, getAllDepartments);
    // console.log(id);
}

// function to delete a tu
function delete_tu(id) {
    suprimer('/school/delete_tu/' + id, getAllDepartments);
    // console.log(id);
}

// function to display a tu in en html element
function display_tu_of(ElementID) {
    $('.tu_menu').removeClass('active');
    // $('.classe_menu').addClass('active');
    classeID = ElementID.split('tu')[1];
    getTuOf(classeID);
    $('#' + ElementID).parent('li').addClass('active');
}

function bindSemestersOf(classeID) {
    selectionner("/school/bind_semester_of/" + classeID, bindSemesterData);
}

function bindSemesterData(data) {
    console.log(data);
    var element = ' <option value="" disabled selected>Choose the Semester</option>'
    $.each(data, function(key, value) {
        element += '<option value="' + value.id + '">' + value.semestre_name.name + '</option>'
    })
    $('#TU_semester').html(element);

    $('#TU_semester').attr('disabled', false);
}
// =========================================================================

// ============================ For Modulus =============================================
function getModulusOf(classeID) {

    selectionner("/school/get_modulud_of/" + classeID, modulusData);

}

function add_modulus(formID) {
    inserer("/school/store_modulus", formID, getAllDepartments);
}

function update_modulus(id, formID) {
    console.log(id, formID);
    modifier("/school/update_modulus/" + id, formID, getAllDepartments);
    // console.log(id);
}

function delete_modulus(id) {
    suprimer('/school/delete_modulus/' + id, getAllDepartments);
    // console.log(id);
}

function display_modulus_of(ElementID) {
    $('.modulus_menu').removeClass('active');
    // $('.classe_menu').addClass('active');
    classeID = ElementID.split('mm')[1];
    getModulusOf(classeID);
    $('#' + ElementID).parent('li').addClass('active');
}

function bindTuOf(classeID) {
    selectionner("/school/bind_tu_of/" + classeID, bindTuData);
}
// =========================================================================
function bindTuData(data) {
    $('#modulus_TU').attr('disabled', false);
    console.log(data);
    var element = ' <option value="" disabled selected>Choose the Tu</option>'
    $.each(data, function(key, semester) {
        element += '<optgroup label="' + semester.semestre_name.name + '">'
        semester.tus.length > 0 ?
            $.each(semester.tus, function(key, tu) {
                element += '<option value="' + tu.id + '">' + tu.name + '</option>'
            }) :
            element += '<option value="" disabled>No Tu in this semester</option>'
        element += '</optgroup>'

    })
    $('#modulus_TU').html(element);


}
// =======================================================================


function branchData(data) {
    console.log(data);
    var elements = '';
    branche_editparames = []
    $.each(data, function(key, department) {
        elements += '<tr class="unread group"><td colspan="6">' + department.name + '</td></tr>'
        department.branches.length > 0 ?
            $.each(department.branches, function(key, branche) {
                branche_editparames.push('branch_name=' + branche.name + '&branch_departement=' + branche.departement_id);
                elements += '<tr class="unread">'
                elements += '    <td class="tbl-checkbox">'
                elements += '        <label class="form-check-label">'
                elements += '            <input type="checkbox"/>'
                elements += '            <span class="form-check-sign"></span>'
                elements += '        </label>'
                elements += '    </td>'
                elements += '    <td class="hidden-xs">' + branche.name + '</td>'

                elements += '    <td class="max-texts">'
                elements += '        <a href="#">'
                elements += '            <span class="label l-bg-orange shadow-style m-r-10">' + branche.classes.length + '</span> classes</a>'
                elements += '    </td>'

                elements += '    <td class="text-right">'
                elements += '        <button data-target="#add_branch" data-toggle="modal" onclick="editer( branche_editparames[' + key + '],' + branche.id + ')"  class="btn tblActnBtn">'
                elements += '            <i class="material-icons">mode_edit</i>'
                elements += '        </button>'
                elements += '        <button onclick="delete_branch(' + branche.id + ')" class="btn tblActnBtn">'
                elements += '            <i class="material-icons">delete</i>'
                elements += '        </button>'
                elements += '    </td>'
                elements += '</tr>'
            }) :
            elements += '<tr class="unread"><td colspan="4" class="center"> No Branch for the Department: <strong class="font-bold">' + department.name + '</strong></td></tr>'
    })

    $('#branches_body').html(elements);
}

function tuData(data) {
    console.log(data);
    var elements = ''

    tu_editparames = []
    $.each(data, function(key, val) {
            tu_editparames.push('TU_name=' + val.name + '&^TU_classe=' + val.semester.classe_id + '&^TU_semester=' + val.semester.id);
            elements += '<tr class="unread">'
            elements += '    <td class="tbl-checkbox">'
            elements += '        <label class="form-check-label">'
            elements += '            <input type="checkbox"/>'
            elements += '            <span class="form-check-sign"></span>'
            elements += '        </label>'
            elements += '    </td>'
            elements += '    <td class="hidden-xs">' + val.name + '</td>'
            elements += '    <td class="hidden-xs">'
            elements += '        <div class="badge col-gray">' + val.semester.semestre_name.name + '</div>'
            elements += '    </td>'
            elements += '    <td class="max-texts">'
            elements += '        <a href="#">'
            elements += '            <span class="label l-bg-orange shadow-style m-r-10">' + val.modulus.length + '</span> modulus</a>'
            elements += '    </td>'

            elements += '    <td class="text-right">'
            elements += '        <button data-target="#add_TU" data-toggle="modal" onclick="editer( tu_editparames[' + key + '],' + val.id + ')"  class="btn tblActnBtn">'
            elements += '            <i class="material-icons">mode_edit</i>'
            elements += '        </button>'
            elements += '        <button onclick="delete_tu(' + val.id + ')" class="btn tblActnBtn">'
            elements += '            <i class="material-icons">delete</i>'
            elements += '        </button>'
            elements += '    </td>'
            elements += '</tr>'
        })
        // $.fn.dataTable.isDataTable('#modulus_table') && modulus_table.destroy();

    elements.length != 0 ? $('#tu_body').html(elements) : $('#tu_body').html('<tr><td colspan="4" class="center">No TU for this class<td></tr>');

    // modulus_table = $('#modulus_table').DataTable({
    //     responsive: true,
    // });



}


function modulusData(data) {
    console.log(data);
    var elements = ''

    modulus_editparames = []
    $.each(data, function(key, tu) {
        elements += '<tr class="unread group"><td colspan="6">' + tu.name + '</td></tr>'
        tu.modulus.length > 0 ?
            $.each(tu.modulus, function(key, modul) {
                modulus_editparames.push('module_name=' + modul.name + '&modulus_credict=' + modul.credict + '&modulus_hours=' + modul.heure + '&^modulus_classe=' + tu.semester.classe_id + '&^modulus_TU=' + tu.id);
                elements += '<tr class="unread">'
                elements += '    <td class="tbl-checkbox">'
                elements += '        <label class="form-check-label">'
                elements += '            <input type="checkbox"/>'
                elements += '            <span class="form-check-sign"></span>'
                elements += '        </label>'
                elements += '    </td>'
                elements += '    <td class="hidden-xs">' + modul.name + '</td>'
                elements += '    <td class="hidden-xs">'
                elements += '        <div class="badge col-gray">' + tu.semester.semestre_name.name + '</div>'
                elements += '    </td>'
                elements += '    <td class="max-texts">'
                elements += '        <a href="#">'
                elements += '            <span class="label l-bg-orange shadow-style m-r-10">' + modul.credict + '</span> Credits</a>'
                elements += '    </td>'
                elements += '    <td class=""> <span class="badge bg-pink">' + modul.heure + ' Hours</span>'
                elements += '    </td>'
                elements += '    <td class="text-right">'
                elements += '        <button data-target="#add_modulus" data-toggle="modal" onclick="editer( modulus_editparames[' + key + '],' + modul.id + ')"  class="btn tblActnBtn">'
                elements += '            <i class="material-icons">mode_edit</i>'
                elements += '        </button>'
                elements += '        <button onclick="delete_modulus(' + modul.id + ')" class="btn tblActnBtn">'
                elements += '            <i class="material-icons">delete</i>'
                elements += '        </button>'
                elements += '    </td>'
                elements += '</tr>'
            }) :
            elements += '<tr class="unread"><td colspan="6" class="center"> No modulus for the TU: <strong class="font-bold">' + tu.name + '</strong></td></tr>'
    })

    // $.fn.dataTable.isDataTable('#modulus_table') && modulus_table.destroy();

    elements.length != 0 ? $('#modulus_body').html(elements) : $('#modulus_body').html('<tr><td colspan="4" class="center">No data available in table<td></tr>');

    // modulus_table = $('#modulus_table').DataTable({
    //     responsive: true,
    // });



}

function classeData(data) {
    var elements = ''
    console.log(data);
    classe_editparames = []
    $.each(data, function(key, branch) {
        elements += '<tr class="unread group"><td colspan="6">' + branch.name + '</td></tr>'
        branch.classes.length > 0 ?
            $.each(branch.classes, function(key, val) {
                // console.log(val.semesters);
                classe_editparames.push('classe_name=' + val.name + '&^classe_branch=' + val.branche_id + '&^classe_level=' + val.level + '&^classe_semester_2=' + val.semesters[1].semestre_name_id + '&^classe_semester_1=' + val.semesters[0].semestre_name_id);
                elements += '<tr class="unread">'
                elements += '    <td class="hidden-xs">' + val.name + '</td>'
                elements += '    <td class="max-texts">'
                elements += '        <a href="#">'
                elements += '           <span class="label l-bg-purple shadow-style m-r-10">' + val.inscriptions.length + '</span> Students</a>'
                elements += '    </td>'
                elements += '    <td class="hidden-xs">'
                elements += '         <div class="badge col-gray">' + val.semesters[0].semestre_name.name + ' && ' + val.semesters[1].semestre_name.name + '</div>'
                elements += '     </td>'
                elements += '    <td class="hidden-xs">'
                elements += '        <div class="badge col-green">Active</div>'
                elements += '    </td>'
                elements += '    <td ><span class="badge bg-teal">' + val.tus.length + ' Tus</span> </td>'
                elements += '    <td class="text-right">'
                elements += '        <button data-target="#add_class" data-toggle="modal" onclick="editer( classe_editparames[' + key + '],' + val.id + ')"  class="btn tblActnBtn">'
                elements += '            <i class="material-icons">mode_edit</i>'
                elements += '        </button>'
                elements += '        <button onclick="delete_classe(' + val.id + ')" class="btn tblActnBtn">'
                elements += '            <i class="material-icons">delete</i>'
                elements += '        </button>'
                elements += '    </td>'
                elements += '</tr>'
            }) :
            elements += '<tr class="unread"><td colspan="6" class="center"> No Classe for the Branch: <strong class="font-bold">' + branch.name + '</strong></td></tr>'
    })

    // $.fn.dataTable.isDataTable('#classe_table') && classe_table.destroy();
    elements.length != 0 ? $('#classe_body').html(elements) : $('#classe_body').html('<tr><td colspan="4" class="center">No data available in table<td></tr>');
    // classe_table = $('#classe_table').DataTable({
    //     responsive: true,
    // });

}


function departmentData(data) {
    var elements = ''
    classes_departments_elements = '';
    modulus_departments_elements = '';
    tu_departments_elements = '';
    console.log(data);
    var active = '';
    var intialDepID = -1;
    department_editparames = []
    $.each(data, function(key, val) {
        active = '';
        if (key == 0) {
            active = 'active';
            intialDepID = val.id;
        }
        department_editparames.push('department=' + val.name);
        // class concate
        classes_departments_elements += ' <li class="classe_menu ' + active + '"><a href="#" id="cm' + val.id + '"  onclick="display_Classes_of(this.id);" title="' + val.name + '">' + val.name + '<span class="pull-right badge bg-orange">' + val.classes.length + '</span></a></li> ';

        // tu concat
        tu_departments_elements += '<li>'
        tu_departments_elements += '    <div class="collapsible-header">' + val.name
        tu_departments_elements += '        <div style="position: absolute; right: 10px;"><i class="material-icons">keyboard_arrow_down</i></div>'
        tu_departments_elements += '    </div>'
        tu_departments_elements += '    <div class="collapsible-body">'
        tu_departments_elements += '        <ul class="" id="mail-folders">'
        if (val.classes.length > 0) {
            $.each(val.classes, function(key2, vale) {
                tu_departments_elements += '            <li class="tu_menu ">'
                tu_departments_elements += '                <a href="#" id="tu' + vale.id + '" onclick="display_tu_of(this.id);" title="' + vale.name + '">' + vale.name + '<span class="pull-right badge bg-orange">4</span></a>'
                tu_departments_elements += '            </li>'
            })
        } else {
            tu_departments_elements += '<div>No Classes</div>'
        }
        tu_departments_elements += '        </ul>'
        tu_departments_elements += '    </div>'
        tu_departments_elements += '</li>'


        // Modulus concat
        modulus_departments_elements += '<li>'
        modulus_departments_elements += '    <div class="collapsible-header">' + val.name
        modulus_departments_elements += '        <div style="position: absolute; right: 10px;"><i class="material-icons">keyboard_arrow_down</i></div>'
        modulus_departments_elements += '    </div>'
        modulus_departments_elements += '    <div class="collapsible-body">'
        modulus_departments_elements += '        <ul class="" id="mail-folders">'
        if (val.classes.length > 0) {
            $.each(val.classes, function(key3, vale) {
                modulus_departments_elements += '            <li class="modulus_menu">'
                modulus_departments_elements += '                <a href="#" id="mm' + vale.id + '" onclick="display_modulus_of(this.id);" title="' + vale.name + '">' + vale.name + '<span class="pull-right badge bg-orange">4</span></a>'
                modulus_departments_elements += '            </li>'
            })
        } else {
            modulus_departments_elements += '<div>No Classes</div>'
        }
        modulus_departments_elements += '        </ul>'
        modulus_departments_elements += '    </div>'
        modulus_departments_elements += '</li>'


        //  departement concat
        elements += '<tr class="odd gradeX">'
        elements += '<td class="">' + val.name + '</td>'
        elements += ' <td class=""><span class="badge bg-white">' + val.branches.length +
            ' Branches</span></td>'
        elements += '  <td class="">' + new Date(val.created_at).toISOString().split('T')[0] + '</td>'
        elements += ' <td class="text-truncate center">'
        if (val.heads.length === 0) {
            elements += '---'
        } else {
            $.each(val.heads, function(index, head) {
                head.firstname != null && head.lastname != null ?
                    elements += head.firstname + ' ' + head.lastname :
                    elements += head.email;
                index < val.heads.length - 1 && (elements += ', ');
            })
        }
        elements += '</td>'
        elements += '<td class="">'
        elements += '<div class="badge col-green">Active</div>'
        elements += '</td>'
        elements += '<td class="center">'
        elements += ' <a href="#" data-target="#add_department" data-toggle="modal" onclick="editer( department_editparames[' + key + '],' + val.id + ')" class="btn btn-tbl-edit">'
        elements += '<i class="material-icons">create</i>'
        elements += '</a>'
        elements += '<a href="#" class="btn btn-tbl-delete"  onclick="delete_department(' + val.id + ')">'
        elements += '<i class="material-icons">delete_forever</i>'
        elements += '</a>'
        elements += ' </td>'
        elements += '</tr>'
    })

    $.fn.dataTable.isDataTable('#departement_table') && departement_table.destroy();


    elements.length != 0 ? $('#department_body').html(elements) : $('#department_body').html('<tr><td colspan="5" class="center">No data available in table<td></tr>');


    classes_departments_elements.length != 0 ? $('.classes_departments').html(classes_departments_elements) : $('.classes_departments').html('<tr><td colspan="6" class="center">No Departments<td></tr>');
    tu_departments_elements.length != 0 ? $('.tu_departments').html(tu_departments_elements) : $('.tu_departments').html('<tr><td colspan="6" class="center">No Departments<td></tr>');
    modulus_departments_elements.length != 0 ? $('.modulus_departments').html(modulus_departments_elements) : $('.modulus_departments').html('<tr><td colspan="6" class="center">No Departments<td></tr>');
    $('#modulus_body').html('<div>Please select the class to view his modulus</div>');
    $('#tu_body').html('<div>Please select the class to view his TU !!!</div>');
    intialDepID != -1 && getClassesOf(intialDepID);

    if (elements.length != 0) {
        departement_table = $('#departement_table').DataTable({
            responsive: true,
        });
    }
}


function semesterData(data) {
    var elements = ''
    semester_editparames = []
    $.each(data, function(key, val) {
        semester_editparames.push('semester=' + val.name);
        elements += '<tr class="odd gradeX">'
        elements += '<td class="">' + val.name + '</td>'
        elements += '<td class=""><span class="badge bg-teal">' + val.affectations.length + ' Classes</span></td>'
        elements += '<td class="">'
        elements += '    <div class="badge col-green">Active</div>'
        elements += '</td>'
            // elements += '<td class="">'
            // elements += '    <div class="progress-xs not-rounded progress">'
            // elements += '        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">'
            // elements += '            <span class="sr-only">25%</span>'
            // elements += '        </div>'
            // elements += '    </div>'
            // elements += '</td>'
        elements += '<td class="center">'
        elements += '    <a href="#" data-target="#add_semester" data-toggle="modal" class="btn btn-tbl-edit" onclick="editer( semester_editparames[' + key + '],' + val.id + ')" >'
        elements += '        <i class="material-icons">create</i>'
        elements += '    </a>'
        elements += '    <a href="#" class="btn btn-tbl-delete" onclick="delete_semester(' + val.id + ')">'
        elements += '        <i class="material-icons">delete_forever</i>'
        elements += '    </a>'
        elements += '</td>'
        elements += '</tr>'
    })

    $.fn.dataTable.isDataTable('#semester_table') && semester_table.destroy();

    elements.length != 0 ? $('#semester_body').html(elements) : $('#semester_body').html('<tr><td colspan="3" class="center">No Semester !!!<td></tr>');
    if (elements.length != 0) {
        semester_table = $('#semester_table').DataTable({
            responsive: true,
        });
    }

}