$(function() {

})

var s_semester_table = null
var s_semester_with_session_table = null
var deja = -1;

function getAverageOf(yearID, semesterID) {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: '/school/get_year/' + yearID,
        success: function(year) {
            console.log('minteneant');
            console.log(year);
            selectionner('/semester_averages/get_average_of/' + year.id + '/' + semesterID, averageData);
            // yearData = year;
        },
        error: function(error) {
            console.log(error);
            // $('#marks_modulus').html('<div class=" col-md-12 center"><h3>No School year<br/><span class="font-bold">Please Create a school year before !!!</span></h3></div>')
        }
    });

}

function getAverageWithSessionOf(yearID, semesterID) {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: '/school/get_year/' + yearID,
        success: function(year) {
            console.log('minteneant');
            console.log(year);
            selectionner('/semester_averages/get_average_with_session_of/' + year.id + '/' + semesterID, average_with_session_Data);
            // yearData = year;
        },
        error: function(error) {
            console.log(error);
            // $('#marks_modulus').html('<div class=" col-md-12 center"><h3>No School year<br/><span class="font-bold">Please Create a school year before !!!</span></h3></div>')
        }
    });

}

function averageData(data) {
    var body_elements = ''
    var head_elements = ''
    var theadModulus = data.theadModulus
    var theadTus = data.theadTus
    var inscriptions = data.inscriptions
    var failed = 0;
    var giveUp = 0;
    var totalOfCredit = 0
    console.log(data);
    classe_editparames = []
    head_elements += '<tr> <th colspan="3" rowspan="2"></th>'
    $.each(theadTus, function(tukey, tu) {
        head_elements += ' <th class="center" colspan="' + tu.modulus.length + '">' + tu.name + '</th>'
    })
    head_elements += '<th colspan="7" rowspan="2"></th> </tr>'

    head_elements += '<tr>'
    $.each(theadTus, function(tukey, tu) {
        head_elements += ' <th class="center" colspan="' + tu.modulus.length + '">' + tu.tu_credit + ' cred.</th>'
    })
    head_elements += '</tr>'

    head_elements += '<tr>'
    head_elements += '    <th colspan="3" class=""><div class=""><img width="300px" src="assets/images/head_icon.png" alt="logo" class="logo-default" /></div></th>'
    $.each(theadModulus, function(key, mod) {
        // console.log(mod);
        head_elements += '    <th class="rotated_cell center nb_cell"> <div class="rota_div">' + mod.name + '</div></th>'
    })
    head_elements += '    <th class="rotated_cell center nb_cell"> <div class="rota_div">Total</div></th>'
    head_elements += '    <th class="rotated_cell center nb_cell"><div class="rota_div">Final Average</div></th>'
    head_elements += '    <th class="rotated_cell center nb_cell"> <div class="rota_div">Inernational grate</div></th>'
    head_elements += '    <th class="rotated_cell center nb_cell"> <div class="rota_div">Convertion</div></th>'
    head_elements += '    <th class="rotated_cell center nb_cell"><div class="rota_div">Statut</div></th>'
    head_elements += '    <th class="rotated_cell center nb_cell"><div class="rota_div">Re-do</div></th>'
    head_elements += '    <th class="rotated_cell center nb_cell"><div class="rota_div">Remark</div></th>'
    head_elements += '</tr>'

    head_elements += '<tr height="10px">'
    head_elements += '    <th class=""><div class="">ID</div></th>'
    head_elements += '    <th class="rotate"> <div class="rot">Fist Name</div></th>'
    head_elements += '    <th class="rotate"><div class="rot">Last Name</div> </th>'
    $.each(theadModulus, function(key, mod) {
        // console.log(mod);
        totalOfCredit += mod.credict;
        head_elements += '    <th class=""> <div class="">' + mod.credict + ' cred.</div></th>'
    })
    head_elements += '    <th class=""> <div class="">' + totalOfCredit + '</div></th>'
    head_elements += '    <th class=""><div class=""></div></th>'
    head_elements += '    <th class=""><div class=""></div></th>'
    head_elements += '    <th class=""><div class=""></div></th>'
    head_elements += '    <th class=""><div class=""></div></th>'
    head_elements += '    <th class=""><div class=""></div></th>'
    head_elements += '    <th class=""><div class=""></div></th>'
    head_elements += '</tr>'

    $.each(inscriptions, function(key, insc) {
        console.log(insc);
        if (insc.t_n_status == 'Fail') {
            failed += 1;
        }

        if (insc.student.status != 'active') {
            giveUp += 1;
        }

        var status_color = insc.t_n_status == 'Fail' ? 'col-red' : 'col-green'
        body_elements += '<tr>'
        body_elements += '     <td class="">' + insc.student.matricule + '</td>'
        body_elements += '     <td class="">' + toUp(insc.student.first_name) + '</td>'
        body_elements += '     <td class="">' + toUp(insc.student.Last_name) + '</td>'
        $.each(insc.notes, function(key, mod) {
            body_elements += '     <td class="center">' + mod.note + '</td>'
        })
        body_elements += '     <td class="center">' + insc.t_n_ponderer + '</td>'
        body_elements += '     <td class="center">' + insc.t_n_average + '</td>'
        body_elements += '     <td class="center">' + (insc.conforme != null ? insc.conforme.international_Grade : '---') + '</td>'
        body_elements += '     <td class="center">' + (insc.conforme != null ? insc.conforme.mention : '---') + '</td>'
        body_elements += '     <td class=""><div class="badge ' + status_color + '">' + insc.t_n_status + '</div></td>'
        body_elements += '     <td class="center">' + insc.t_n_redo_mod.substring(1) + '</td>'
        body_elements += '     <td class="center">' + (insc.student.status != 'active' ? 'Give up' : '') + '</td>'
        body_elements += ' </tr>'
    })
    if (deja == -1) {
        setBreadcrumb(
            /* data.page_title.tu.semester.classe.name + '&' + data.page_title.tu.semester.semestre_name.name + ' --> ' +*/
            data.page_title.level.name + '&' + data.page_title.name,
            data.page_title.level.branche.departement.name + '&' + data.page_title.level.name + '&' + data.page_title.name
        );
        deja = 1;
    }

    $.fn.dataTable.isDataTable('#s_semester_table') && s_semester_table.destroy();

    $('#s_semester_thead').html(head_elements)

    $('#s_semester_tbody').html(body_elements)
    turnTableOn(false);

    if (theadModulus.length > 0) {
        // marksModulusTest_table = $('#s_semester_table').DataTable({
        //     // responsive: true,
        // });

        $('.hider').show();
        $('.loading').hide();
    } else {
        $('.body').html('<div class="center">No Data Available !!!</div>');
        $('.loading').hide();
    }

    $('.all').html(inscriptions.length);
    $('.passed').html(inscriptions.length - failed);
    $('.failed').html(failed);
    $('.give_up').html(giveUp);

}

function average_with_session_Data(data) {
    var body_elements = ''
    var head_elements = ''
    var theadModulus = data.theadModulus
    var theadTus = data.theadTus
    var inscriptions = data.inscriptions
    var totalOfCredit = 0
    var failed = 0;
    var giveUp = 0;

    console.log(data);
    classe_editparames = []

    head_elements += '<tr> <th colspan="3" rowspan="2"></th>'
    $.each(theadTus, function(tukey, tu) {
        head_elements += ' <th class="center" colspan="' + tu.modulus.length + '">' + tu.name + '</th>'
    })
    head_elements += '<th colspan="7" rowspan="2"></th> </tr>'

    head_elements += '<tr>'
    $.each(theadTus, function(tukey, tu) {
        head_elements += ' <th class="center" colspan="' + tu.modulus.length + '">' + tu.tu_credit + ' cred.</th>'
    })
    head_elements += '</tr>'

    head_elements += '<tr>'
    head_elements += '    <th colspan="3" class=""><div class=""><img width="300px" src="assets/images/head_icon.png" alt="logo" class="logo-default" /></div></th>'
    $.each(theadModulus, function(key, mod) {
        // console.log(mod);
        head_elements += '    <th class="rotated_cell center nb_cell"> <div class="rota_div">' + mod.name + '</div></th>'
    })
    head_elements += '    <th class="rotated_cell center nb_cell"> <div class="rota_div">Total</div></th>'
    head_elements += '    <th class="rotated_cell center nb_cell"><div class="rota_div">Final Average</div></th>'
    head_elements += '    <th class="rotated_cell center nb_cell"> <div class="rota_div">Inernational grate</div></th>'
    head_elements += '    <th class="rotated_cell center nb_cell"> <div class="rota_div">Convertion</div></th>'
    head_elements += '    <th class="rotated_cell center nb_cell"><div class="rota_div">Statut</div></th>'
    head_elements += '    <th class="rotated_cell center nb_cell"><div class="rota_div">Re-do</div></th>'
    head_elements += '    <th class="rotated_cell center nb_cell"><div class="rota_div">Remark</div></th>'
    head_elements += '</tr>'

    head_elements += '<tr height="10px">'
    head_elements += '    <th class=""><div class="">ID</div></th>'
    head_elements += '    <th class="rotate"> <div class="rot">Fist Name</div></th>'
    head_elements += '    <th class="rotate"><div class="rot">Last Name</div> </th>'
    $.each(theadModulus, function(key, mod) {
        // console.log(mod);
        totalOfCredit += mod.credict;
        head_elements += '    <th class=""> <div class="">' + mod.credict + ' cred.</div></th>'
    })
    head_elements += '    <th class=""> <div class="">' + totalOfCredit + '</div></th>'
    head_elements += '    <th class=""><div class=""></div></th>'
    head_elements += '    <th class=""><div class=""></div></th>'
    head_elements += '    <th class=""><div class=""></div></th>'
    head_elements += '    <th class=""><div class=""></div></th>'
    head_elements += '    <th class=""><div class=""></div></th>'
    head_elements += '    <th class=""><div class=""></div></th>'
    head_elements += '</tr>'
    $.each(inscriptions, function(key, insc) {
        console.log(insc);
        if (insc.t_n_status == 'Fail') {
            failed += 1;
        }
        if (insc.student.status != 'active') {
            giveUp += 1;
        }
        var status_color = insc.t_n_status == 'Fail' ? 'col-red' : 'col-green'
        body_elements += '<tr>'
        body_elements += '     <td class="">' + insc.student.matricule + '</td>'
        body_elements += '     <td class="">' + toUp(insc.student.first_name) + '</td>'
        body_elements += '     <td class="">' + toUp(insc.student.Last_name) + '</td>'
        $.each(insc.notes, function(key, mod) {
            body_elements += '     <td class="center">' + mod.note + '</td>'
        })
        body_elements += '     <td class="center">' + insc.t_n_ponderer + '</td>'
        body_elements += '     <td class="center">' + insc.t_n_average + '</td>'
        body_elements += '     <td class="center">' + (insc.conforme != null ? insc.conforme.international_Grade : '---') + '</td>'
        body_elements += '     <td class="center">' + (insc.conforme != null ? insc.conforme.mention : '---') + '</td>'
        body_elements += '     <td class=""><div class="badge ' + status_color + '">' + insc.t_n_status + '</div></td>'
        body_elements += '     <td class="center">' + insc.t_n_redo_mod.substring(1) + '</td>'
        body_elements += '     <td class="center">' + (insc.student.status != 'active' ? 'Give up' : '') + '</td>'
        body_elements += ' </tr>'
    })
    $.fn.dataTable.isDataTable('#s_semester_with_session_table') && s_semester_with_session_table.destroy();

    $('#s_semester_with_session_thead').html(head_elements)

    $('#s_semester_with_session_tbody').html(body_elements)
    turnTableOn(false);

    if (theadModulus.length > 0) {
        // marksModulusTest_table = $('#s_semester_table').DataTable({
        //     // responsive: true,
        // });

        $('.hider').show();
        $('.loading').hide();
    } else {
        $('.body').html('<div class="center">No Data Available !!!</div>');
        $('.loading').hide();
    }
    $('.all').html(inscriptions.length);
    $('.passed').html(inscriptions.length - failed);
    $('.failed').html(failed);
    $('.give_up').html(giveUp);


}