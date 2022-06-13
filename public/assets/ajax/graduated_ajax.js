var graduated_table = null;

function getbachelorstudents(yearID) {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: '/school/get_year/' + yearID,
        success: function(year) {
            console.log('minteneant');
            console.log(year);
            selectionner('/bachelor-students/' + year.id, graduatedData);
            // yearData = year;
        },
        error: function(error) {
            console.log(error);
            // $('#marks_modulus').html('<div class=" col-md-12 center"><h3>No School year<br/><span class="font-bold">Please Create a school year before !!!</span></h3></div>')
        }
    });

}

function getmasterstudents(yearID) {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: '/school/get_year/' + yearID,
        success: function(year) {
            console.log('minteneant');
            console.log(year);
            selectionner('/master-students/' + year.id, graduatedData);
            // yearData = year;
        },
        error: function(error) {
            console.log(error);
            // $('#marks_modulus').html('<div class=" col-md-12 center"><h3>No School year<br/><span class="font-bold">Please Create a school year before !!!</span></h3></div>')
        }
    });

}

function graduatedData(data) {

    var elements = ''
    console.log(data);
    // level_editparames = []
    $.each(data, function(key, insc) {
        elements += '<tr>'
        elements += '<td>' + insc.student.matricule + '</td>'
        elements += '<td>' + insc.student.first_name + '</td>'
        elements += '<td>' + insc.student.Last_name + '</td>'
        elements += '<td>' + insc.student.birth_date + '</td>'
        elements += '<td>' + insc.student.gender + '</td>'
        elements += '<td>' + insc.level.branche.name + '</td>'
        elements += '<td class="center">'
        elements += '    <ul class="header-dropdown m-r--5">'
        elements += '        <li class="dropdown">'
        elements += '            <a href="#" onClick="return false;" class="dropdown-toggle"'
        elements += '                data-toggle="dropdown" role="button" aria-haspopup="true"'
        elements += '                aria-expanded="false">'
        elements += '                <i class="material-icons">more_vert</i>'
        elements += '            </a>'
        elements += '            <ul class="dropdown-menu pull-right">'
        elements += '                <li>'
        elements += '                    <a target="_blank" href="pdfAtestation/' + insc.id + '/fr" onClick="">Attestation [FR]</a>'
        elements += '                </li>'
        elements += '                <li>'
        elements += '                    <a target="_blank" href="pdfAtestation/' + insc.id + '/en" onClick="">Attestation [EN]</a>'
        elements += '                </li>'
        elements += '                <li>'
        elements += '                    <a target="_blank" href="pdfDiploma/' + insc.id + '/fr" onClick="">Diploma [FR]</a>'
        elements += '                </li>'
        elements += '                <li>'
        elements += '                    <a target="_blank" href="pdfDiploma/' + insc.id + '/en" onClick="">Diploma [EN]</a>'
        elements += '                </li>'
        elements += '                '
        elements += '            </ul>'
        elements += '        </li>'
        elements += '    </ul>'
        elements += '</td>'
        elements += '</tr>'
    });


    // console.log(student_editparames);
    $.fn.dataTable.isDataTable('#graduated_table') && graduated_table.destroy();

    elements.length > 0 ? $('#graduated_body').html(elements) : $('#graduated_body').html('<tr><td colspan="6" class="center">No Students with this graduation<td></tr>')

    if (elements.length > 0) {
        graduated_table = $('#graduated_table').DataTable({
            responsive: true,
        });
    }
}