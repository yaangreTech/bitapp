$(function() {
    // getAllDepartments();
    // getAllSemesters();
    // dispStatus = -1;
    // $('#modulus_semester').attr('disabled', true);

})
var yearData = {};
var students_table = null;
var consernedStudents_table = null;

var students_list = JSON.parse(currentActivedb.getItem('students_list'));

function import_students(formID) {
    importer('import_form', formID, (data) => {
        // console.log(data);
        $.each(data, function(key, value) {

            $('#importLogs').append(
                $('<div class="card" style="border: 1px solid"><div class="header ' + value.type + '" style="padding:8px; border-top-left-radius:5px; border-top-right-radius:5px"><h2>' + value.line + '</h2></div><div class="body">' + value.message + '</div></div>')
            )
        })

    });
}

function downloadStudentList_themplate(formID) {
    importer('downloadStudentList_themplate', formID, (data) => {
        // console.log(data);
    });
}







function add_student(formID) {
    inserer('store_student', formID, null, true);
}

function update_student(id, formID) {
    modifier("/students/update_student/" + id, formID, () => {
        getStudentOf(students_list.year, students_list.classID);
    });
    // console.log(id);
}

function delete_student(id) {
    // console.log(id);
    suprimer('/students/delete_student/' + id, null, true);
    // console.log(id);
}

function desable_student(id) {
    // console.log(id);
    desactiver('/students/disable_student/' + id, null, true);
    // console.log(id);
}

function enable_student(id) {
    // console.log(id);
    activer('/students/enable_student/' + id, null, true);
    // console.log(id);
}




function getStudentOf(yearID, classID) {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: '/school/get_year/' + yearID,
        success: function(year) {
            // console.log('minteneant');
            // console.log(year);
            selectionner('/students/get_students_of/' + year.id + '/' + classID, studentData);
            yearData = year;

            $('#print_list').attr('href', 'generateStudentListe/' + year.id + '/' + classID);

        },
        error: function(error) {
            // console.log(error);
            $('#students_table').html('<tr><td  class="center">No School year<br/><span class="font-bold">Please Create a school year before !!!</span><td></tr>')
        }
    });

}

function viewStudentInfos(inscID) {
    selectionner('/students/view_student_infos/' + inscID, vew_studentData);
}

function studentData(data) {
    var elements = ''
        // console.log(data);
    student_editparames = []
    inscriptions = data.inscriptions;
    clef = -1
    $.each(inscriptions, function(index, insc) {
        clef++;
        // alert(index)
        student_editparames.push(
            'studentID=' + insc.student.matricule +
            '&&&studentFirstName=' + insc.student.first_name +
            '&&&studentLastName=' + insc.student.Last_name +
            '&&&studentBirthDate=' + insc.student.birth_date +
            '&&&studentPhone=' + insc.student.phone +
            '&&&studentEmail=' + insc.student.email +
            '&&&studentParentFirstName=' + insc.student.parent.first_name +
            '&&&studentParentLastName=' + insc.student.parent.Last_name +
            '&&&studentParentPhone=' + insc.student.parent.phone +
            '&&&^studentParentProfession=' + insc.student.parent.profession +
            '&&&^studentParentType=' + insc.student.parent.type
        );

        var defStatus = 'active';
        elements += '<tr>'
        elements += '    <td>' + insc.student.matricule + '</td>'
        elements += '    <td>' + insc.student.first_name + '</td>'
        elements += '    <td>' + insc.student.Last_name + '</td>'
        elements += '    <td>' + insc.student.gender + '</td>'
        elements += '    <td>' + insc.student.email + '</td>'
        elements += '    <td>' + insc.student.birth_date + '</td>'
        elements += '    <td>' + insc.student.phone + '</td>'
        elements += '    <td><span class="badge ' + (insc.status == defStatus ? 'col-green' : 'col-red') + '">' + insc.status + '</span></td>'

        elements += '    <td class="text-right">'
        elements += '     <ul>'
        elements += '        <li class="dropdown">'
        elements += '            <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown"'
        elements += '                role="button" aria-haspopup="true" aria-expanded="false">'
        elements += '                <i class="material-icons">more_vert</i>'
        elements += '            </a>'
        elements += '            <ul class="dropdown-menu pull-right">'
        elements += '                <li>'
        elements += '                    <a href="#" data-toggle="modal" data-target="#student_info" onClick="viewStudentInfos(' + insc.id + ')">View infos</a>'
        elements += '                </li>'
        elements += '                <li>'
        elements += '                    <a href="school-certificate/' + insc.id + '" target="_blank" >school cert...</a>'
        elements += '                </li>'
        elements += '                <li>'
        elements += '                    <a href="#" data-toggle="modal" data-target="#update_student" onclick="editer(student_editparames[' + clef + '],' + insc.id + ')">Editer</a>'
        elements += '                </li>'
        if (insc.status == 'active') {
            elements += '                <li>'
            elements += '                    <a href="#" onClick="desable_student(' + insc.id + ')">Disable</a>'
            elements += '                </li>'
        } else {

            elements += '                <li>'
            elements += '                    <a href="#" onClick="enable_student(' + insc.id + ')">Enable</a>'
            elements += '                </li>'
        }
        elements += '                <li>'
        elements += '                    <a href="#" onClick="delete_student(' + insc.id + ')">Delete</a>'
        elements += '                </li>'

        elements += '            </ul>'
        elements += '        </li>'
        elements += '     </ul>'
        elements += '    </td>'
        elements += '</tr>'
    });


    setBreadcrumb(
        data.page_title.branche.name + '&&&' + data.page_title.label,
        data.page_title.branche.departement.name + '&&&' + data.page_title.branche.name + '&&&' + data.page_title.name
    );
    // console.log(student_editparames[0]);
    $.fn.dataTable.isDataTable('#students_table') && students_table.destroy();

    elements.length > 0 ? $('#student_body').html(elements) : $('#student_body').html('<tr><td colspan="8" class="center">No Students for this class<td></tr>')

    if (elements.length > 0) {
        students_table = $('#students_table').DataTable({
            responsive: true,
        });
    }
}

function vew_studentData(inscription) {
    // console.log(inscription);
    $('.s_matricule').html(inscription.student.matricule)
    $('.s_promotion').html(inscription.promotion.name)
    $('.s_classe').html(inscription.level.label)
    $('.s_firstName').html(inscription.student.first_name)
    $('.s_lastName').html(inscription.student.Last_name)
    $('.s_phone').html(inscription.student.phone)
    $('.s_email').html(inscription.student.email)
    $('.s_birthdate').html(inscription.student.birth_date)
    $('.s_gender').html(inscription.student.gender)
    $('.p_firstName').html(inscription.student.parent.first_name)
    $('.p_lastName').html(inscription.student.parent.Last_name)
    $('.p_phone').html(inscription.student.parent.phone)
    $('.p_profession').html(inscription.student.parent.profession)
    $('.p_type').html(inscription.student.parent.type)
    $('.modal-title').html(inscription.student.matricule + ' infos')
}

// check the student matricule
function verfierMatricule(value, compare = '') {
    // console.log(value);
    // var value = $(this).val()
    // console.log(value);
    if (value.length >= 7) {
        // console.log(value);
        selectionner('/students/verify_matricule/' + value, (data) => {
            data != false && $('.studentID').html('this id already exists')
        });
    } else {
        $('.studentID').html('')
    }
}


function getDestinationClass(initialClassID) {
    // console.log(initialClassID);
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: '/school/get_year/-1',
        success: function(lastYear) {
            // console.log(lastYear);
            selectionner('/reinscription/get_destination/' + lastYear.id + '/' + initialClassID, (data) => {

                // console.log('\n');
                // console.log(data);
                getConsernedStudentsData(data.consernedStudents);
                bindDestination_class(data.destination_classes);
            });
        },
        error: function(error) {
            console.log(error);
        }
    });

}


function bindDestination_class(dest_classes) {
    elements = '<option value="" disabled selected>Choose the destination class</option>'
    $.each(dest_classes, function(key, classe) {
        elements += '<option value="' + classe.id + '">' + classe.name + '</option>'
    });
    $('#destination_class').html(elements);
}

function bind_action_to_important() {
    $('#initial_class').val() == $('#destination_class').val() ?
        $('.ele_3').html('redoublement') : $('.ele_3').html('Passing to the higher class');
}

function getConsernedStudentsData(consernedStudents) {
    students_ids = []
        // console.log(consernedStudents);
        // console.log(data);
    var body_elements = '';
    var head_elements = '<tr style="height:50px"><td colspan="3" class="" >  <span id="conteur"></span> Students selected</td> <td colspan="6" ><div class="pull-right demo-switch"> '

    head_elements += '<div class="switch">'
    head_elements += '   <label>Select all<input type="checkbox" class="group_action" id="student_choice" ><span class="lever"></span></label>'
    head_elements += '</div>'

    head_elements += '<div class="switch">'
    head_elements += '   <label>Only passed<input type="checkbox" class="group_action" id="Pass"><span class="lever"></span></label>'
    head_elements += '</div>'

    head_elements += '<div class="switch">'
    head_elements += '   <label>Only Failed<input type="checkbox" class="group_action" id="Fail"><span class="lever"></span></label>'
    head_elements += '</div>'

    head_elements += '</div></td></tr>'
    head_elements += '<tr><th class="center">#</th><th class="center">Matricule</th><th class="center"> First name </th><th class="center"> Last Name </th>'
    $.each(consernedStudents.head_element, function(i, semester) {
        head_elements += '<th class="center">' + semester.name + ' </th>'
    })
    head_elements += '<th class="center"> Average </th><th class="center"> Notation </th><th class="center"> Statut </th></tr>'
        // console.log('getConsernedStudentsData');
        // console.log(data);
    $.each(consernedStudents.inscriptions, function(key, insc) {
        body_elements += '<tr>'
        body_elements += '<td class="tbl-checkbox">'
        body_elements += '    <label>'
        body_elements += '        <input type="checkbox" class="student_choice ' + insc.t_n_status + '" id=' + insc.student.id + ' />'
        body_elements += '        <span></span>'
        body_elements += '    </label>'
        body_elements += '</td>'
        body_elements += '    <td class="center">' + insc.student.matricule + '</td>'
        body_elements += '    <td class="center">' + insc.student.first_name + '</td>'
        body_elements += '    <td class="center">' + insc.student.Last_name + '</td>'
        $.each(insc.year_semesters, function(key, semester) {
            body_elements += '    <td class="center">' + semester.s_n_average + '</td>'
        })
        body_elements += '    <td class="center">' + insc.t_n_average + '</td>'
        body_elements += '    <td class="center">' + (insc.conforme != null ? insc.conforme.international_Grade : '---') + '</td>'
        body_elements += '    <td class="center">' + insc.t_n_status + '</td>'

        body_elements += '</tr>'
    })


    // $('#grade_transcript').html(body_elements);

    $.fn.dataTable.isDataTable('#consernedStudents_table') && consernedStudents_table.destroy();
    $('#consernedStudents_head').html(head_elements);
    body_elements.length > 0 ? $('#consernedStudents_body').html(body_elements) : $('#consernedStudents_body').html('<tr><td colspan="8" class="center">No Students for the selected elements<td></tr>')

    if (body_elements.length > 0) {
        consernedStudents_table = $('#consernedStudents_table').DataTable({
            responsive: true,
        });
    }

    $('#conteur').html(students_ids.length);

    $('.student_choice').on('change', function(e) {
        var checked = $(this).is(':checked');
        var id = $(this).attr('id');
        if (checked) {
            students_ids.push(id);
        } else {
            students_ids = students_ids.filter(function(students_id) { return students_id != id })
        }

        // console.log(checked, id);
        $('#conteur').html(students_ids.length);

        students_ids.length > 0 ? $('#students_ids').val(students_ids.join('_')) : $('#students_ids').val('');
    });

    $('.group_action').on('change', function(e) {
        var elements_ref = $(this).attr('id');
        $(this).removeClass('group_action');
        $('.group_action').prop('checked', false);
        $(this).addClass('group_action');
        $('.student_choice').prop('checked', false).change();

        $(this).is(':checked') ? $('.' + elements_ref).prop('checked', true).change() : $('.' + elements_ref).prop('checked', false).change();

        // console.log(elements_ref);
    });
}


function reinscriptStudents(formID) {
    inserer('reinscription/reinscriptStudent/', formID, null, true);
}


function getPromotions(l3classID) {
    // console.log(initialClassID);
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: '/school/get_year/0',
        success: function(currentYear) {
            // console.log(lastYear);
            selectionner('end_cycle_form/get_Promotions/' + currentYear.id + '/' + l3classID, (data) => {
                // console.log(data);
                // getConsernedStudentsData(data.consernedStudents);
                bindPromotions(data);
            });
        },
        error: function(error) {
            console.log(error);
        }
    });

}

function bindPromotions(years_promotions) {
    elements = '<option value="" disabled selected>Choose the promotion</option>'
    $.each(years_promotions, function(key, years_promotion) {
        elements += '<option value="' + years_promotion.id + '">' + years_promotion.name + ' ' + years_promotion.promotion.name + '</option>'
    });
    $('#conserned_promotion').html(elements);
}

function getStudentsToEnd(yearID) {
    // console.log(yearID);
    var classID = $('#concerned_class').val();

    selectionner('end_cycle_form/get_Students/' + yearID + '/' + classID, (data) => {
        // console.log(data);
        getConsernedStudentsData(data);
    });
}


function endStudents_Cycle(formID) {
    inserer('end_cycle_form/end_Students_cycle/', formID, null, true);
}