$(function() {

})

s_semester_table = null

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

function averageData(data) {
    var body_elements = ''
    var head_elements = ''
    var theadModulus = data.theadModulus
    var inscriptions = data.inscriptions
    var totalOfCredit = 0
    console.log(data);
    classe_editparames = []
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
    head_elements += '    <th class="rotated_cell center nb_cell"><div class="rota_div">Re-do Module</div></th>'
    head_elements += '    <th class="rotated_cell center nb_cell"><div class="rota_div">Remark</div></th>'
    head_elements += '</tr>'

    head_elements += '<tr height="10px">'
    head_elements += '    <th class=""><div class="">ID</div></th>'
    head_elements += '    <th class="rotate"> <div class="rot">Fist Name</div></th>'
    head_elements += '    <th class="rotate"><div class="rot">Last Name</div> </th>'
    $.each(theadModulus, function(key, mod) {
        // console.log(mod);
        totalOfCredit += mod.credict;
        head_elements += '    <th class=""> <div class="">' + mod.credict + '</div></th>'
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



}