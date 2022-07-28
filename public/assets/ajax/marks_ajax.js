var marks_management_modulus = JSON.parse(currentActivedb.getItem('marks_management'));
// console.log(marks_management_modulus);

var bruch = 1;
$(function() {

    getModulusOf(marks_management_modulus.year, marks_management_modulus.semesterID)
})
var yearData = {};
var marksModulusTest_table = null;


function saveMarkRef(yearID, modulusID) {
    currentActivedb.setItem('marksRef', JSON.stringify({
        'year': yearID,
        'modulusID': modulusID,
    }))
}

function saveTestRef(yearID, modulusID) {
    currentActivedb.setItem('marksRef', JSON.stringify({
        'year': yearID,
        'modulusID': modulusID,
    }))
}

function getModulusOf(yearID, semesterID) {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: '/school/get_year/' + yearID,
        success: function(year) {
            // console.log('minteneant');
            // console.log(year);
            selectionner('/marks_modulus/get_marks_modulus_of/' + year.id + '/' + semesterID, marksModulusData);
            // yearData = year;
        },
        error: function(error) {
            console.log(error);
            $('#marks_modulus').html('<div class=" col-md-12 center"><h3>No School year<br/><span class="font-bold">Please Create a school year before !!!</span></h3></div>')
        }
    });

}

function marksModulusData(data) {
    var elements = ''
        // console.log(data);
    level_editparames = []
    $.each(data.tus, function(key, tu) {
            elements += '<li class="">'
            elements += '    <div class="timeline-badge primary m-l-10">'
            elements += '        <img class="" src="assets/images/details_open.png" alt="...">'
            elements += '    </div>'
            elements += '    <div class="timeline-panel">'
            elements += '        <div class="timeline-heading m-b-20">'
            elements += '            <h2 class="" >' + tu.name + '</h2>'
            elements += '        </div>'
            elements += '        <div class="timeline-body">'
            elements += '            <div class="demo">'
            elements += '                <div class="container">'
            elements += '                    <div class="row">'
            tu.modulus.length > 0 ?
                $.each(tu.modulus, function(key, module) {
                    elements += '<div class="col-md-3 col-sm-6">'
                    elements += '    <div class="pricingTable" style="height:300px">'
                    elements += '        <h3 class="heading"></h3>'
                    elements += '        <h4 class="heading">' + simplify(module.name, 26) + '</h4>'
                    elements += '            <div class="heading"> ' + module.credict + ' Credits</div>'
                    elements += '            <span class="heading">' + module.heure + ' Hours</span>'
                    elements += '        <div class="" style="position: absolute; bottom:20px; left:25%; right:25%;">'
                    elements += '            <ul class="center">'
                    elements += '                <li>'
                    elements += '                  <span class="badge ">  <b>' + (module.tests.length > 2 ? module.tests.length - 2 : 0) + ' tests</b> added</span>'
                    elements += '                </li>'
                    elements += '            </ul>'
                    elements += '        </div>'
                    elements += '        <div style="position: absolute; top:10px; right:5px; ">'
                    elements += '            <ul>'
                    elements += '                <li class="dropdown">'
                    elements += '                    <a href="#" onClick="return false;" class="dropdown-toggle"'
                    elements += '                        data-toggle="dropdown" role="button" aria-haspopup="true"'
                    elements += '                        aria-expanded="false">'
                    elements += '                        <i class="material-icons">more_vert</i>'
                    elements += '                    </a>'
                    elements += '                    <ul class="dropdown-menu pull-right">'
                    elements += '                        <li>'
                    elements += '                            <a href="#" data-toggle="modal" data-target="#test_list"'
                    elements += '                                onClick="getTestOf(0,' + module.id + ',\'' + module.name + '\')">Tests</a>'
                    elements += '                        </li>'
                    elements += '                        <li>'
                    elements += '                            <a href="add_marks"'
                    elements += '                                onClick="saveMarkRef(0,' + module.id + ')">Fill marks</a>'
                    elements += '                        </li>'
                    elements += '                        <li>'
                    elements += '                            <a href="view_marks"'
                    elements += '                                onClick="saveMarkRef(0,' + module.id + ')">view marks</a>'
                    elements += '                        </li>'
                    elements += '                    </ul>'
                    elements += '                </li>'
                    elements += '            </ul>'
                    elements += '        </div>'
                    elements += '    </div>'
                    elements += '</div>'
                }) :
                elements += '<p>No Modulus for this Tu</p> '

            elements += '                    </div>'
            elements += '                </div>'
            elements += '            </div>'
            elements += '        </div>'
            elements += '    </div>'
            elements += '</li>'
        })
        // $('.page-title').html(data.level.name + ' > ' + data.semestre_name.name)
        // var breadcrumb = data.level.branche.departement.name.
    if (bruch == 1) {
        setBreadcrumb(data.level.name + '&&&' + data.name, data.level.branche.departement.name + '&&&' + data.level.name + '&&&' + data.name);
        bruch = -1;
    }
    elements.length > 0 ? $('#marks_modulus').html(elements) : $('#marks_modulus').html('<div class=" col-md-12 center"><h3>No Modulus for this level Semester</h3></div>');

}

function addTest(value) {
    // console.log(value);
    var year_id = value.split('_')[0];
    var modulus_id = value.split('_')[1];
    inserer('/marks_modulus/store_test/' + year_id + '/' + modulus_id, 'mark_modulus_test_from', () => {
        getTestOf(year_id, modulus_id);
    });
    // yearData = year;
    // selectionner('/marks_modulus/get_marks_modulus_tests_of/' + year_id + '/' + modulus_id, marksModulusTestData, )
}

function delete_test(id) {
    var value = $('.saveText').attr('id');
    // console.log(value);
    var year_id = value.split('_')[0];
    var modulus_id = value.split('_')[1];

    suprimer('/marks_modulus/delete_test/' + id, () => {
        getTestOf(year_id, modulus_id);
    });
    // console.log(id);

}

function updateTest(id, formID) {
    var value = $('.saveText').attr('id');
    // console.log(value);
    var year_id = value.split('_')[0];
    var modulus_id = value.split('_')[1];


    modifier('/marks_modulus/update_test/' + id, formID, () => {
        getTestOf(year_id, modulus_id);
    })
}

function getTestOf(yearID, modulusID, modulusName = '') {
    // console.log(yearID, modulusID);
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: '/school/get_year/' + yearID,
        success: function(year) {
            // console.log(year);
            selectionner('/marks_modulus/get_marks_modulus_tests_of/' + year.id + '/' + modulusID, (data) => {
                marksModulusTestData(data, modulusName);
                getModulusOf(marks_management_modulus.year, marks_management_modulus.semesterID);
            })
            $('.saveText').attr('id', year.id + '_' + modulusID);
            // yearData = year;
        },
        error: function(error) {
            console.log(error);

        }
    });

}

function marksModulusTestData(data, modulusName = '') {
    var elements = ''
        // console.log(data);
    test_editparames = []
    var to_ratio = 0;

    $('#testTile').html(modulusName);

    set_max = () => {
        $('#test_ration').attr('max', 100 - to_ratio);
        $('.test_ration').html('max to add => ' + (100 - to_ratio));
    }

    max_with_update = (self) => {
        $('#test_ration').attr('max', 100 - to_ratio + self);
        $('.test_ration').html('max to add => ' + (100 - to_ratio + self));
    }
    $.each(data, function(key, test) {
        if (test.type == 'normal') {
            to_ratio += test.ratio;
        }
        test_editparames.push('^test_type=' + test.type + '&&&^test_label=' + test.title + '&&&test_ration=' + test.ratio);
        elements += '<tr>'
        elements += '    <td class="tbl-checkbox">'
        elements += '        <label>'
        elements += '            <input type="checkbox" />'
        elements += '            <span></span>'
        elements += '        </label>'
        elements += '    </td>'
        elements += '    <td class="">' + test.title + '</td>'
        elements += '    <td class="center">' + test.type + '</td>'
        elements += '    <td class="center">' + test.ratio + ' %</td>'
        elements += '    <td class="center">'
        elements += '        <div class="badge col-green">active</div>'
        elements += '    </td>'
        elements += '    <td class="center">'
        if (test.title != 'Attendance' && test.title != 'Participation') {
            if (test.type != 'session') {
                elements += '        <button onClick="editer(test_editparames[' + key + '],' + test.id + ');max_with_update(' + test.ratio + ');" data-toggle="modal" data-target="#add_test" class="btn tblActnBtn">'
                elements += '            <i class="material-icons">mode_edit</i>'
                elements += '        </button>'
            }
            elements += '        <button id="' + test.id + '" onClick="delete_test(this.id)" class="btn tblActnBtn">'
            elements += '            <i class="material-icons">delete</i>'
            elements += '        </button>'
        }
        elements += '    </td>'
        elements += '</tr>'
    })
    set_max();

    $('.initier').on('click', function(e) {
        set_max();
    })

    $.fn.dataTable.isDataTable('#marksModulusTest_table') && marksModulusTest_table.destroy();

    elements.length > 0 ? $('#marksModulusTest_body').html(elements) : $('#marksModulusTest_body').html('<div class="">No tests</div>');

    marksModulusTest_table = $('#marksModulusTest_table').DataTable({
        responsive: true,
    });
}