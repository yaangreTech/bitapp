$(function() {
    // var grade_transcript = JSON.parse(currentActivedb.getItem('grade_transcript'));
    // console.log(grade_transcript);
    // getTranscriptOf(grade_transcript.year, grade_transcript.classID)
    $('.secon_hide').show();
    $('.first_hide').hide();
})
var yearData = {};
var grade_transcript_table = null;




function saveinscID(inscID) {
    currentActivedb.setItem('inscID', inscID)
}

function getTranscriptOf(yearID, classID) {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: '/school/get_year/' + yearID,
        success: function(year) {
            console.log('minteneant');
            console.log(year);
            selectionner('/grades/get_grades_of/' + year.id + '/' + classID, getTranscriptData);
            // yearData = year;
        },
        error: function(error) {
            console.log(error);
            // $('#marks_modulus').html('<div class=" col-md-12 center"><h3>No School year<br/><span class="font-bold">Please Create a school year before !!!</span></h3></div>')
        }
    });

}

function getTranscript_with_session_Of(yearID, classID) {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: '/school/get_year/' + yearID,
        success: function(year) {
            console.log('minteneant');
            console.log(year);
            selectionner('/grades/getGrades_with_session_Of/' + year.id + '/' + classID, getTranscript_with_session_Data);
            // yearData = year;
        },
        error: function(error) {
            console.log(error);
            // $('#marks_modulus').html('<div class=" col-md-12 center"><h3>No School year<br/><span class="font-bold">Please Create a school year before !!!</span></h3></div>')
        }
    });

}



function getTranscript_with_session_Data(data) {
    console.log(data);
    var body_elements = ''
    var head_elements = '<tr><th class="center">Matricule</th><th class="center"> First name </th><th class="center"> Last Name </th>'
    $.each(data.head_element, function(i, semester) {
        head_elements += '<th class="center">' + semester.name + ' </th>'
    })
    head_elements += '<th class="center"> Average </th><th class="center"> Notation </th><th class="center"> Statut </th><th class="center"> Action </th></tr>'
    console.log('getTranscriptData');
    console.log(data);
    $.each(data.inscriptions, function(key, insc) {
        body_elements += '<tr>'
        body_elements += '    <td class="center">' + insc.student.matricule + '</td>'
        body_elements += '    <td class="">' + insc.student.first_name + '</td>'
        body_elements += '    <td class="">' + insc.student.Last_name + '</td>'
        $.each(insc.year_semesters, function(key, semester) {
            body_elements += '    <td class="center">' + semester.s_n_average + '</td>'
        })
        body_elements += '    <td class="center">' + insc.t_n_average + '</td>'
        body_elements += '    <td class="center">' + (insc.conforme != null ? insc.conforme.international_Grade : '---') + '</td>'
        body_elements += '    <td class="center">' + insc.t_n_status + '</td>'
        body_elements += '    <td class="center">'
        body_elements += '        <a class="invoice" href="grades_view" onClick="saveinscID(' + insc.id + ')">'
        body_elements += '            <i class="far fa-file-pdf"></i>'
        body_elements += '        </a>'
        body_elements += '    </td>'
        body_elements += '</tr>'
    })


    // $('#grade_transcript').html(body_elements);

    $.fn.dataTable.isDataTable('#grade_transcript_table') && grade_transcript_table.destroy();
    $('#grade_transcript_head').html(head_elements);
    body_elements.length > 0 ? $('#grade_transcript').html(body_elements) : $('#grade_transcript').html('<tr><td colspan="7" class="center">No data available<td></tr>')

    if (body_elements.length > 0) {
        grade_transcript_table = $('#grade_transcript_table').DataTable({
            responsive: true,
        });
    }
}


function getTranscriptData(data) {
    console.log(data);
    var body_elements = ''
    var head_elements = '<tr><th class="center">Matricule</th><th class="center"> First name </th><th class="center"> Last Name </th>'
    $.each(data.head_element, function(i, semester) {
        head_elements += '<th class="center">' + semester.name + ' </th>'
    })
    head_elements += '<th class="center"> Average </th><th class="center"> Notation </th><th class="center"> Statut </th><th class="center"> Action </th></tr>'
    console.log('getTranscriptData');
    console.log(data);
    $.each(data.inscriptions, function(key, insc) {
        body_elements += '<tr>'
        body_elements += '    <td class="center">' + insc.student.matricule + '</td>'
        body_elements += '    <td class="">' + insc.student.first_name + '</td>'
        body_elements += '    <td class="">' + insc.student.Last_name + '</td>'
        $.each(insc.year_semesters, function(key, semester) {
            body_elements += '    <td class="center">' + semester.s_n_average + '</td>'
        })
        body_elements += '    <td class="center">' + insc.t_n_average + '</td>'
        body_elements += '    <td class="center">' + (insc.conforme != null ? insc.conforme.international_Grade : '---') + '</td>'
        body_elements += '    <td class="center">' + insc.t_n_status + '</td>'
        body_elements += '    <td class="center">'
        body_elements += '        <a class="invoice" href="grades_view" onClick="saveinscID(' + insc.id + ')">'
        body_elements += '            <i class="far fa-file-pdf"></i>'
        body_elements += '        </a>'
        body_elements += '    </td>'
        body_elements += '</tr>'
    })


    // $('#grade_transcript').html(body_elements);

    setBreadcrumb(
        /* data.page_title.tu.semester.level.name + '&' + data.page_title.tu.semester.semestre_name.name + ' --> ' +*/
        data.page_title.name + '&' + 'Grade transcripts',
        data.page_title.branche.departement.name + '&' + data.page_title.name
    );


    $.fn.dataTable.isDataTable('#grade_transcript_table') && grade_transcript_table.destroy();
    $('#grade_transcript_head').html(head_elements);
    body_elements.length > 0 ? $('#grade_transcript').html(body_elements) : $('#grade_transcript').html('<tr><td colspan="7" class="center">No data available<td></tr>')

    if (body_elements.length > 0) {
        grade_transcript_table = $('#grade_transcript_table').DataTable({
            responsive: true,
        });
    }
}


function viewTranscriptOf(inscID) {
    console.log('kkkk', inscID);
    selectionner('/grades_view/view_grades_of/' + inscID, viewTranscriptData);
}


function viewTranscript_with_session_Of(inscID) {
    console.log('kkkk', inscID);
    selectionner('/grades_view/view_grades_with_session_of/' + inscID, viewTranscriptData);
}

function viewTranscriptData(data) {
    console.log('viewTranscriptData');
    console.log(data);
    body_elements = ''
    var new_semester = 1
        // semesters = data.semesters;
    $.each(data.level.semesters, function(semester_index, semester) {
        new_semester = 1;
        $.each(semester.tus, function(tu_index, tu) {

            $.each(tu.modulus, function(modul_index, modul) {

                if (modul_index == 0) {
                    if (new_semester == 1) {
                        new_semester = -1
                        var semestre_rowspan = semester.s_n_modulus + 1;
                        body_elements += '<tr>'
                        body_elements += '    <td class="center mini" rowspan="' + semestre_rowspan + '">' + semester.label + '</td>'
                        body_elements += '    <td class=" mini" rowspan="' + tu.t_n_modulus + '">' + tu.name + '</td>'
                        body_elements += '    <td class=" mini">' + modul.name + '</td>'
                        body_elements += '    <td class="center mini">' + modul.credict + '</td>'
                        body_elements += '    <td class="center mini">' + modul.note + '</td>'
                        body_elements += '    <td class="center mini" rowspan="' + tu.t_n_modulus + '">' + tu.tu_average + '</td>'
                        body_elements += '    <td class="center mini" rowspan="' + tu.t_n_modulus + '">' + tu.tu_credit + '</td>'
                        body_elements += '    <td class="center mini" rowspan="' + tu.t_n_modulus + '">' + tu.tu_validation + '</td>'
                        body_elements += '    <td class="center mini" rowspan="' + tu.t_n_modulus + '">' + (tu.conforme != null ? tu.conforme.international_Grade : '---') + '</td>'
                        body_elements += '</tr>'
                    } else {
                        body_elements += '<tr>'
                        body_elements += '    <td class=" mini" rowspan="' + tu.t_n_modulus + '">' + tu.name + '</td>'
                        body_elements += '    <td class=" mini">' + modul.name + '</td>'
                        body_elements += '    <td class="center mini">' + modul.credict + '</td>'
                        body_elements += '    <td class="center mini">' + modul.note + '</td>'
                        body_elements += '    <td class="center mini" rowspan="' + tu.t_n_modulus + '">' + tu.tu_average + '</td>'
                        body_elements += '    <td class="center mini" rowspan="' + tu.t_n_modulus + '">' + tu.tu_v_credit + '</td>'
                        body_elements += '    <td class="center mini" rowspan="' + tu.t_n_modulus + '">' + tu.tu_validation + '</td>'
                        body_elements += '    <td class="center mini" rowspan="' + tu.t_n_modulus + '">' + (tu.conforme != null ? tu.conforme.international_Grade : '---') + '</td>'
                        body_elements += '</tr> '
                    }
                } else {
                    body_elements += '<tr>'
                    body_elements += '    <td class=" mini">' + modul.name + '</td>'
                    body_elements += '    <td class="center mini">' + modul.credict + '</td>'
                    body_elements += '    <td class="center mini">' + modul.note + '</td>'
                    body_elements += '</tr>'
                }

            })
        })

        if (new_semester == -1) {
            body_elements += '<tr class="btn-default">'
            body_elements += '    <td colspan="2" class="center font-bold">Summary ' + semester.name + '</td>'
            body_elements += '    <td class="center font-bold">' + semester.s_credit + '</td>'
            body_elements += '    <td class="center bg-white"></td>'
            body_elements += '    <td class="center font-bold">' + semester.s_n_average + '</td>'
            body_elements += '    <td class="center font-bold">' + semester.s_v_credit + '</td>'
            body_elements += '    <td class="center font-bold">' + semester.s_validation + '</td>'
            body_elements += '    <td class="center font-bold">' + (semester.conforme != null ? semester.conforme.international_Grade : '---') + '</td>'
            body_elements += '</tr>'
        }

    })

    $('.student_ref').html(
        '<p class="">: ' + data.student.first_name + '</p>' +
        '<p class="">: ' + data.student.Last_name + '</p>' +
        '<p class="">: ' + data.student.matricule + '</p>'
    );

    var level = 'First';
    data.level.name == 'L2' ? level = 'Second' : data.level == 'L3' ? level = 'Third' : level = 'First';

    $('.promotion_ref').html(
        '<p class=" ">Accademic Year<span class=""> : ' + level + ' year</span></p>' +
        '<p class="">Graduation Year <span class=""> : ' + data.promotion.name.split('-')[1] + '</span></p>' +
        '<p class="">Subject <span class=""> : ' + data.level.branche.departement.name + '</span></p>'
    );

    $('#grades_view_body').html(body_elements);

    $('.secon_hide').hide();
    $('.first_hide').show();

    $('.mini').css('padding', 0);

}