$(function() {
    var marksRef = JSON.parse(currentActivedb.getItem('marksRef'));
    console.log(marksRef);
})

// function updateMarkRef(action) {
//     var marksRef = JSON.parse(currentActivedb.getItem('marksRef'));
//     marksRef.action = action;
//     currentActivedb.setItem('marksRef', JSON.stringify(marksRef))
// }

var marksModulusMarks_table = null;
// marks
function getMarksOf(yearID, modulusID) {
    console.log(yearID, modulusID);
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: '/school/get_year/' + yearID,
        success: function(year) {
            console.log(year);
            selectionner('/marks_modulus/get_marks_modulus_marks_of/' + year.id + '/' + modulusID, marksModulusMarksData, )
                // $('.saveText').attr('id', year.id + '_' + modulusID);
                // yearData = year;
        },
        error: function(error) { console.log(error); }
    });

}

function viewMarksOf(yearID, modulusID) {
    console.log(yearID, modulusID);
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: '/school/get_year/' + yearID,
        success: function(year) {
            console.log(year);
            selectionner('/marks_modulus/view_marks_modulus_marks_of/' + year.id + '/' + modulusID, marksModulusMarksData_view, )
                // $('.saveText').attr('id', year.id + '_' + modulusID);
                // yearData = year;
        },
        error: function(error) { console.log(error); }
    });

}

function marksModulusMarksData_view(data) {
    console.log(data);
    var tbody_elements = ''
    console.log(data);
    test_editparames = []
    var t_pourcentage = 0;
    var thead_elements = ' <tr><th colspan="2"></th>'
    $.each(data.testList, function(key, test) {
        thead_elements += ' <th class="center">' + test.ratio + ' %</th>'
        t_pourcentage += test.ratio;
    })
    thead_elements += '<th class="center">' + t_pourcentage + ' %</th><th colspan="2"></th> </tr>'

    thead_elements += ' <tr><th>Matricule</th><th>Full name</th>'
    $.each(data.testList, function(key, test) {
        thead_elements += ' <th class="center">' + test.title + '</th>'
    })
    thead_elements += '<th>Average</th><th>Grade</th><th>Pass or Fail</th> </tr>'

    // console.log(thead_elements);
    $.each(data.inscriptions, function(key, insc) {
            tbody_elements += '<tr>'
            tbody_elements += '    <td class="actions">' + insc.student.matricule + '</td>'
            tbody_elements += '    <td class="actions">' + insc.student.first_name + ' ' + insc.student.Last_name + '</td>'
            $.each(insc.tests, function(key, studTest) {
                // console.log(studTest.mark);
                var valeur = jQuery.isEmptyObject(studTest.mark) ? '---' : studTest.mark.value;
                var dataPk = jQuery.isEmptyObject(studTest.mark) ? insc.id + '_' + studTest.id : studTest.mark.id;
                tbody_elements += '    <td class="center">'
                tbody_elements += '        <span>' + valeur + '</span>'
                tbody_elements += '    </td>'
            })
            tbody_elements += '    <td class="actions">' + (insc.average == null ? '---' : insc.average) + '</td>'
            tbody_elements += '    <td class="actions center">' + (insc.conforme == null ? '---' : insc.conforme.international_Grade) + '</td>'
            tbody_elements += '    <td class="actions">' + insc.status + '</td>'
            tbody_elements += '</tr>'
        })
        // console.log(tbody_elements);


    $.fn.dataTable.isDataTable('#marksModulusMarks_table') && marksModulusMarks_table.destroy();

    if (data.testList.length > 0 && thead_elements.length > 0) {
        $('#marksModulusMarks_head').html(thead_elements)
        tbody_elements.length > 0 ? $('#marksModulusMarks_body').html(tbody_elements) : $('#list_corps').html('<div><h3 class="align-center">No Students in this classe</h3></div>');
        console.log('fini');
    } else {
        $('#list_corps').html('<div><h3 class="align-center">No Test for this modulus</h3></div>');
    }

    $(document).ready(function() {
        $('.editable_el').simpleedit({
            error: function(response) {
                console.log(response.msg)
            }
        })
        $('.editable_el').css('cursor', 'pointer')
        $('.editable_el').css('text-decoration', 'underline dashed')
    })

    marksModulusMarks_table = $('#marksModulusMarks_table').DataTable({
        responsive: true,
    });
}

function marksModulusMarksData(data) {
    var thead_elements = ' <tr><th>Matricule</th><th>Full name</th>'
    var tbody_elements = ''
    console.log(data);
    test_editparames = []
    $.each(data.testList, function(key, test) {
        thead_elements += ' <th class="center">' + test.title + ' <span class="badge">' + test.ratio + ' %</span></th>'
    })
    thead_elements += ' </tr>'

    // console.log(thead_elements);
    $.each(data.inscriptions, function(key, insc) {
            tbody_elements += '<tr>'
            tbody_elements += '    <td class="actions">' + insc.student.matricule + '</td>'
            tbody_elements += '    <td class="actions">' + insc.student.first_name + ' ' + insc.student.Last_name + '</td>'
            $.each(insc.tests, function(key, studTest) {
                // console.log(studTest.mark);
                var valeur = jQuery.isEmptyObject(studTest.mark) ? '---' : studTest.mark.value;
                var dataPk = jQuery.isEmptyObject(studTest.mark) ? insc.id + '_' + studTest.id : studTest.mark.id;
                tbody_elements += '    <td class="center">'
                tbody_elements += '        <span  class="editable_el font-underline col-cyan" data-name="mark_value" data-pk="' + dataPk + '" data-url="">' + valeur + '</span>'
                tbody_elements += '    </td>'
            })
            tbody_elements += '</tr>'
        })
        // console.log(tbody_elements);


    $.fn.dataTable.isDataTable('#marksModulusMarks_table') && marksModulusMarks_table.destroy();

    if (data.testList.length > 0 && thead_elements.length > 0) {
        $('#marksModulusMarks_head').html(thead_elements)
        tbody_elements.length > 0 ? $('#marksModulusMarks_body').html(tbody_elements) : $('#list_corps').html('<div><h3 class="align-center">No Students in this classe</h3></div>');
        console.log('fini');
    } else {
        $('#list_corps').html('<div><h3 class="align-center">No Test for this modulus</h3></div>');
    }

    $(document).ready(function() {
        $('.editable_el').simpleedit({
            error: function(response) {
                console.log(response.msg)
            }
        })
        $('.editable_el').css('cursor', 'pointer')
        $('.editable_el').css('text-decoration', 'underline dashed')
    })

    marksModulusMarks_table = $('#marksModulusMarks_table').DataTable({
        responsive: true,
    });
}