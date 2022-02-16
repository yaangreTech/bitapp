$(function() {
    // getAllDepartments();
    // getAllSemesters();
    // dispStatus = -1;
    // $('#modulus_semester').attr('disabled', true);

})
var yearData = {};
var students_table = null;

function add_student(formID) {
    inserer('store_student', formID, null, true);
}

function getStudentOf(yearID, classID) {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: '/school/get_year/' + yearID,
        success: function(year) {
            console.log('minteneant');
            console.log(year);
            selectionner('/students/get_students_of/' + year.id + '/' + classID, studentData);
            yearData = year;
        },
        error: function(error) {
            console.log(error);
            $('#students_table').html('<tr><td  class="center">No School year<br/><span class="font-bold">Please Create a school year before !!!</span><td></tr>')
        }
    });

}

function studentData(data) {
    var elements = ''
    console.log(data);
    classe_editparames = []
    $.each(data, function(key, insc) {
        elements += '<tr>'
        elements += '    <td>' + insc.student.matricule + '</td>'
        elements += '    <td>' + insc.student.first_name + '</td>'
        elements += '    <td>' + insc.student.Last_name + '</td>'
        elements += '    <td>' + insc.student.gender + '</td>'
        elements += '    <td>' + insc.student.email + '</td>'
        elements += '    <td>' + insc.student.birth_date + '</td>'
        elements += '    <td>' + insc.student.phone + '</td>'
        elements += '    <td class="text-right">'
        elements += '     <ul>'
        elements += '        <li class="dropdown">'
        elements += '            <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown"'
        elements += '                role="button" aria-haspopup="true" aria-expanded="false">'
        elements += '                <i class="material-icons">more_vert</i>'
        elements += '            </a>'
        elements += '            <ul class="dropdown-menu pull-right">'
        elements += '                <li>'
        elements += '                    <a href="#" onClick="return false;">action 1</a>'
        elements += '                </li>'
        elements += '                <li>'
        elements += '                    <a href="#" onClick="return false;">action 1</a>'
        elements += '                </li>'
        elements += '                <li>'
        elements += '                    <a href="#" onClick="return false;">action 1</a>'
        elements += '                </li>'
        elements += '            </ul>'
        elements += '        </li>'
        elements += '     </ul>'
        elements += '    </td>'
        elements += '</tr>'
    });

    $.fn.dataTable.isDataTable('#students_table') && students_table.destroy();

    elements.length > 0 ? $('#student_body').html(elements) : $('#student_body').html('<tr><td colspan="7" class="center">No Students for this class<td></tr>')

    if (elements.length > 0) {
        students_table = $('#students_table').DataTable({
            responsive: true,
        });
    }
}