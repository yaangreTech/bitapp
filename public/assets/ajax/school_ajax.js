 var rangeInput = null;
 $(function() {
     getAllDepartments();
     // getAllSemesters();
     dispStatus = -1;
     $('#TU_semester').attr('disabled', true);
     $('#modulus_TU').attr('disabled', true);
     // console.log(rangeInput);


 })
 var departement_table = null;
 var semester_table = null;
 var classe_table = null;
 var modulus_table = null;
 var addedecu = [];

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
     // console.log($('#' + formID).serialize());
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

 function bindfinalLevles(intialID) {
     selectionner("/school/bind_levels_of/" + intialID, bindfinalLevlesData);
 }

 function bindfinalLevlesData(data) {
     // console.log(data);
     var element = ' <option value="" disabled selected>Choose the final level</option>'
     $.each(data, function(key, value) {
         element += '<option value="' + value.id + '">' + value.label + '</option>'
     })
     $('#branch_f_level').html(element);

     $('#branch_f_level').attr('disabled', false);
 }

 // ================================== For Semesters =======================================

 // // the function to get all semester from the database
 // function getAllSemesters() {
 //     selectionner("/school/get_semesters", semesterData);

 // }

 // // the function to add new semester to the database
 // function add_semester(formID) {
 //     inserer("/school/store_semester", formID, getAllSemesters);
 // }

 // // the function to update a given  semester
 // function update_semester(id, formID) {
 //     console.log(id, formID);
 //     modifier("/school/update_semester/" + id, formID, getAllSemesters);
 //     // console.log(id);
 // }

 // // the function to delete a given semester
 // function delete_semester(id) {
 //     suprimer('/school/delete_semester/' + id, getAllSemesters);
 //     // console.log(id);
 // }


 // ************************* for levels********************************//

 // // the to add new classe to the database
 // function add_classe(formID) {
 //     inserer("/school/store_classe/", formID, getAllDepartments);
 // }

 // // The function update a given classe
 // function update_classe(id, formID) {
 //     modifier("/school/update_classe/" + id, formID, getAllDepartments);
 //     // console.log(id);
 // }

 // // the function to delete a given classe
 // function delete_classe(id) {
 //     suprimer("/school/delete_classe/" + id, getAllDepartments);
 //     // console.log(id);
 // }

 // // the function to get levels of a department]
 // function getClassesOf(depID) {
 //     selectionner("/school/get_classe_sof/" + depID, classeData);

 // }

 // // the function to display levels of the given department
 // function display_Classes_of(ElementID) {
 //     $('.classe_menu').removeClass('active');
 //     // $('.classe_menu').addClass('active');
 //     depID = ElementID.split('cm')[1];
 //     getClassesOf(depID);
 //     $('#' + ElementID).parent('li').addClass('active');
 // }

 // ============================ For TU =============================================

 // function to get Tus of a given classe
 function getTuOf(semesterID) {

     selectionner("/school/get_tu_of/" + semesterID, tuData);

 }

 // function to add a tu to the database
 function add_tu(formID) {
     inserer("/school/store_tu/", formID, () => {
         getAllDepartments();
         addedecu = [];
         bindEcu('action');
     });
 }

 // function to update a given tu
 function update_tu(id, formID) {
     // console.log(id, formID);
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
     semesterID = ElementID.split('tu')[1];
     getTuOf(semesterID);
     $('#' + ElementID).parent('li').addClass('active');
 }

 function bindSemestersOf(classeID) {
     selectionner("/school/bind_semester_of/" + classeID, bindSemesterData);
 }

 function bindSemesterData(data) {
     // console.log(data);
     var element = ' <option value="" disabled selected>Choose the Semester</option>'
     $.each(data, function(key, value) {
         element += '<option value="' + value.id + '">' + value.name + '</option>'
     })
     $('#TU_semester').html(element);

     $('#TU_semester').attr('disabled', false);
 }
 // =========================================================================

 // ============================ For Modulus =============================================
 //  function getModulusOf(classeID) {

 //      selectionner("/school/get_modulud_of/" + classeID, modulusData);

 //  }

 function add_modulus(tuID, formID) {
     // console.log(tuID);
     inserer("/school/store_modulus/" + tuID, formID, getAllDepartments);
 }

 function update_modulus(id, formID) {
     // console.log(id, formID);
     modifier("/school/update_modulus/" + id, formID, getAllDepartments);
     // console.log(id);
 }

 function delete_modulus(id) {
     suprimer('/school/delete_modulus/' + id, getAllDepartments);
     // console.log(id);
 }

 //  function display_modulus_of(ElementID) {
 //      $('.modulus_menu').removeClass('active');
 //      // $('.classe_menu').addClass('active');
 //      classeID = ElementID.split('mm')[1];
 //      getModulusOf(classeID);
 //      $('#' + ElementID).parent('li').addClass('active');
 //  }

 //  function bindTuOf(classeID) {
 //      selectionner("/school/bind_tu_of/" + classeID, bindTuData);
 //  }
 // // =========================================================================
 // function bindTuData(data) {
 //     $('#modulus_TU').attr('disabled', false);
 //     console.log(data);
 //     var element = ' <option value="" disabled selected>Choose the Tu</option>'
 //     $.each(data, function(key, semester) {
 //         element += '<optgroup label="' + semester.semestre_name.name + '">'
 //         semester.tus.length > 0 ?
 //             $.each(semester.tus, function(key, tu) {
 //                 element += '<option value="' + tu.id + '">' + tu.name + '</option>'
 //             }) :
 //             element += '<option value="" disabled>No Tu in this semester</option>'
 //         element += '</optgroup>'

 //     })
 //     $('#modulus_TU').html(element);


 // }
 // =======================================================================


 function branchData(data) {
     var elements = '';
     branche_editparames = []
     TU_classe_content = '<option value="" disabled selected>Choose the level</option>'
     var bindex = 0
     $.each(data, function(key, department) {
         elements += '<tr class="unread group"><td colspan="6">' + department.name + '</td></tr>'
         department.branches.length > 0 ?
             $.each(department.branches, function(branchkey, branche) {
                 branche_editparames.push('branch_name=' + branche.name + '&&&^branch_departement=' + branche.departement_id + '&&&^branch_i_level=' + branche.departement_id + '&&&^branch_f_level=' + branche.departement_id);
                 elements += '<tr class="unread">'
                 elements += '    <td class="tbl-checkbox">'
                 elements += '        <label class="form-check-label">'
                 elements += '            <input type="checkbox"/>'
                 elements += '            <span class="form-check-sign"></span>'
                 elements += '        </label>'
                 elements += '    </td>'
                     // elements += '    <td class="" rowspan="3">' + 'branche.name' + '</td>'
                 elements += '    <td class="hidden-xs">' + branche.name + '</td>'

                 elements += '    <td class="max-texts">'
                 elements += '        <a href="#">'
                 elements += '            <span class="label l-bg-orange shadow-style m-r-10">' + branche.levels.length + '</span> levels</a>'
                 elements += '    </td>'

                 elements += '    <td class="max-texts">'
                 elements += '        <a href="#">'
                 elements += '            From: <span class="font-bold m-r-10">' + branche.levels[0].label + '</span></a>'
                 elements += '    </td>'

                 elements += '    <td class="max-texts">'
                 elements += '        <a href="#">'
                 elements += '          To:  <span class="font-bold m-r-10"> ' + branche.levels[branche.levels.length - 1].label + '</span></a>'
                 elements += '    </td>'

                 elements += '    <td class="text-right">'
                 elements += '        <button data-target="#add_branch" data-toggle="modal" onclick="editer( branche_editparames[' + bindex + '],' + branche.id + ')"  class="btn tblActnBtn">'
                 elements += '            <i class="material-icons">mode_edit</i>'
                 elements += '        </button>'
                 elements += '        <button onclick="delete_branch(' + branche.id + ')" class="btn tblActnBtn">'
                 elements += '            <i class="material-icons">delete</i>'
                 elements += '        </button>'
                 elements += '    </td>'
                 elements += '</tr>'
                 bindex++;

                 TU_classe_content += '<optgroup label="' + department.name + '  ' + branche.name + '">'

                 $.each(branche.levels, function(levelkey, level) {
                     TU_classe_content += '   <option value="' + level.id + '"> ' + branche.name + ', ' + level.name + ' </option>'
                 })


                 TU_classe_content += '</optgroup>'

             }) :
             elements += '<tr class="unread"><td colspan="6" class="center"> No Branch for the Department: <strong class="font-bold">' + department.name + '</strong></td></tr>'
     })
     $('#branches_body').html(elements);
     //  console.log(TU_classe_content);
     $('#TU_classe').html(TU_classe_content);
 }

 function tuData(data) {
     //  console.log(data);
     var elements = ''

     tu_names = []
     tu_ECU_editparames = []
     tu_with_ecu_editparames = []


     $.each(data.tus, function(key, tu) {


             elements += '<tr class="unread group"><td colspan="3"> TU:  <strong class="font-bold font-20">' + tu.name + '</strong></td>'
             elements += '<td > code:  <span class="badge bg-white p-10"><strong class="font-bold font-20 text-danger">' + tu.code + '</strong></span></td>'
                 //  elements += '     <td class="text-right"><button data-toggle="modal" data-target="#add_modulus" type="button" class="btn  btn-outline-info initier" onclick="initier(' + tu.id + ');bindTUname(' + tu.id + ', tu_names[' + key + '] )">'
                 //  elements += '     <i class="material-icons">add_circle_outline</i>'
                 //  elements += '      <span>new ECU</span></button>'
                 //  elements += '      </td>'
             elements += '<td class="right">'
             elements += ' <a href="#" data-target="#add_TU" data-toggle="modal" onclick="$(\'#wizard_with_validation\').addClass(\'TU_form_update\');$(\'#wizard_with_validation\').removeClass(\'TU_form\');$(\'#tu_id\').val(\'' + tu.id + '\');editer(tu_with_ecu_editparames[' + key + '],\'update_tus\', \'' + tu.name + '\');" class="btn btn-tbl-edit">'
             elements += '<i class="material-icons">create</i>'
             elements += '</a>'
             elements += '<a href="#" class="btn btn-tbl-delete"  onclick="delete_tu(' + tu.id + ')">'
             elements += '<i class="material-icons">delete_forever</i>'
             elements += '</a>'
             elements += ' </td>'
             elements += '  </tr>'
             tu_names.push(tu.name);
             tu_with_ecu_model = []
             $.each(tu.modulus, function(ecukey, ecu) {
                 tu_with_ecu_model.push({
                     module_name: ecu.name,
                     modulus_hours: ecu.heure,
                     modulus_credict: ecu.credict,
                     id: ecu.id
                 });
                 tu_ECU_editparames.push('module_name=' + ecu.name + '&&&modulus_credict=' + ecu.credict + '&&&modulus_hours=' + ecu.heure + '&&&ECU_TU_name=' + tu.name);
                 elements += '<tr class="unread">'
                 elements += '    <td class=""></td>'
                 elements += '    <td class="tbl-checkbox left">'
                 elements += '        <label class="form-check-label">'
                 elements += '            <input type="checkbox"/>'
                 elements += '            <span class="form-check-sign">' + ecu.name + '</span>'
                 elements += '        </label>'
                 elements += '    </td>'
                 elements += '    <td class=""> <span class="label l-bg-orange shadow-style m-r-10">' + ecu.credict + '</span> Credicts</td>'
                 elements += '    <td class=""> <span class="label l-bg-orange shadow-style m-r-10">' + ecu.heure + '</span> hours</td>'
                 elements += '    <td class="text-right">'
                 elements += '        <button data-target="#add_modulus" data-toggle="modal" onclick="editer(tu_ECU_editparames[' + ecukey + '],' + ecu.id + ');bindTUname(' + tu.id + ', tu_names[' + key + '])"  class="btn tblActnBtn">'
                 elements += '            <i class="material-icons">mode_edit</i>'
                 elements += '        </button>'
                 elements += '        <button onclick="delete_modulus(' + ecu.id + ')" class="btn tblActnBtn">'
                 elements += '            <i class="material-icons">delete</i>'
                 elements += '        </button>'
                 elements += '    </td>'
                 elements += '</tr>'
             })
             tu_with_ecu_editparames.push('^TU_classe=' + data.level.id + '&&&?addedecu=' + JSON.stringify(tu_with_ecu_model) + '&&&*TU_semester=' + tu.semester.label + '&&&TU_code=' + tu.code);

         })
         // $.fn.dataTable.isDataTable('#modulus_table') && modulus_table.destroy();
     $('#tu_head').html('<tr><th colspan="4" class=""> <strong class="font-bold font-20">  ' + data.level.branche.name + ', ' + data.level.label + ', ' + data.label + '</strong>  Tus and ECUs<th></tr>')
     elements.length != 0 ? $('#tu_body').html(elements) : $('#tu_body').html('<div class="center" style="height:100px;">No TU for:  <strong class="font-bold">' + data.level.branche.name + ', ' + data.level.label + ', ' + data.label + '</strong><div>');

     // modulus_table = $('#modulus_table').DataTable({
     //     responsive: true,
     // });



 }

 function bindTUname(id, name) {
     $('#ECU_TU_name').val(name);
     $('.save').attr('id', id);
 }


 // function modulusData(data) {
 //     console.log(data);
 //     var elements = ''

 //     modulus_editparames = []
 //     $.each(data, function(key, tu) {
 //         elements += '<tr class="unread group"><td colspan="6">' + tu.name + '</td></tr>'
 //         tu.modulus.length > 0 ?
 //             $.each(tu.modulus, function(key, modul) {
 //                 modulus_editparames.push('module_name=' + modul.name + '&modulus_credict=' + modul.credict + '&modulus_hours=' + modul.heure + '&^modulus_classe=' + tu.semester.classe_id + '&^modulus_TU=' + tu.id);
 //                 elements += '<tr class="unread">'
 //                 elements += '    <td class="tbl-checkbox">'
 //                 elements += '        <label class="form-check-label">'
 //                 elements += '            <input type="checkbox"/>'
 //                 elements += '            <span class="form-check-sign"></span>'
 //                 elements += '        </label>'
 //                 elements += '    </td>'
 //                 elements += '    <td class="hidden-xs">' + modul.name + '</td>'
 //                 elements += '    <td class="hidden-xs">'
 //                 elements += '        <div class="badge col-gray">' + tu.semester.semestre_name.name + '</div>'
 //                 elements += '    </td>'
 //                 elements += '    <td class="max-texts">'
 //                 elements += '        <a href="#">'
 //                 elements += '            <span class="label l-bg-orange shadow-style m-r-10">' + modul.credict + '</span> Credits</a>'
 //                 elements += '    </td>'
 //                 elements += '    <td class=""> <span class="badge bg-pink">' + modul.heure + ' Hours</span>'
 //                 elements += '    </td>'
 //                 elements += '    <td class="text-right">'
 //                 elements += '        <button data-target="#add_modulus" data-toggle="modal" onclick="editer( modulus_editparames[' + key + '],' + modul.id + ')"  class="btn tblActnBtn">'
 //                 elements += '            <i class="material-icons">mode_edit</i>'
 //                 elements += '        </button>'
 //                 elements += '        <button onclick="delete_modulus(' + modul.id + ')" class="btn tblActnBtn">'
 //                 elements += '            <i class="material-icons">delete</i>'
 //                 elements += '        </button>'
 //                 elements += '    </td>'
 //                 elements += '</tr>'
 //             }) :
 //             elements += '<tr class="unread"><td colspan="6" class="center"> No modulus for the TU: <strong class="font-bold">' + tu.name + '</strong></td></tr>'
 //     })

 //     // $.fn.dataTable.isDataTable('#modulus_table') && modulus_table.destroy();

 //     elements.length != 0 ? $('#modulus_body').html(elements) : $('#modulus_body').html('<tr><td colspan="4" class="center">No data available in table<td></tr>');

 //     // modulus_table = $('#modulus_table').DataTable({
 //     //     responsive: true,
 //     // });



 // }

 // function classeData(data) {
 //     var elements = ''
 //     console.log(data);
 //     classe_editparames = []
 //     $.each(data, function(key, branch) {
 //         elements += '<tr class="unread group"><td colspan="6">' + branch.name + '</td></tr>'
 //         branch.levels.length > 0 ?
 //             $.each(branch.levels, function(key, val) {
 //                 // console.log(val.semesters);
 //                 classe_editparames.push('classe_name=' + val.name + '&^classe_branch=' + val.branche_id + '&^classe_level=' + val.level + '&^classe_semester_2=' + val.semesters[1].semestre_name_id + '&^classe_semester_1=' + val.semesters[0].semestre_name_id);
 //                 elements += '<tr class="unread">'
 //                 elements += '    <td class="hidden-xs">' + val.name + '</td>'
 //                 elements += '    <td class="max-texts">'
 //                 elements += '        <a href="#">'
 //                 elements += '           <span class="label l-bg-purple shadow-style m-r-10">' + val.inscriptions.length + '</span> Students</a>'
 //                 elements += '    </td>'
 //                 elements += '    <td class="hidden-xs">'
 //                 elements += '         <div class="badge col-gray">' + val.semesters[0].semestre_name.name + ' && ' + val.semesters[1].semestre_name.name + '</div>'
 //                 elements += '     </td>'
 //                 elements += '    <td class="hidden-xs">'
 //                 elements += '        <div class="badge col-green">Active</div>'
 //                 elements += '    </td>'
 //                 elements += '    <td ><span class="badge bg-teal">' + val.tus.length + ' Tus</span> </td>'
 //                 elements += '    <td class="text-right">'
 //                 elements += '        <button data-target="#add_class" data-toggle="modal" onclick="editer( classe_editparames[' + key + '],' + val.id + ')"  class="btn tblActnBtn">'
 //                 elements += '            <i class="material-icons">mode_edit</i>'
 //                 elements += '        </button>'
 //                 elements += '        <button onclick="delete_classe(' + val.id + ')" class="btn tblActnBtn">'
 //                 elements += '            <i class="material-icons">delete</i>'
 //                 elements += '        </button>'
 //                 elements += '    </td>'
 //                 elements += '</tr>'
 //             }) :
 //             elements += '<tr class="unread"><td colspan="6" class="center"> No Classe for the Branch: <strong class="font-bold">' + branch.name + '</strong></td></tr>'
 //     })

 //     // $.fn.dataTable.isDataTable('#classe_table') && classe_table.destroy();
 //     elements.length != 0 ? $('#classe_body').html(elements) : $('#classe_body').html('<tr><td colspan="4" class="center">No data available in table<td></tr>');
 //     // classe_table = $('#classe_table').DataTable({
 //     //     responsive: true,
 //     // });

 // }


 function departmentData(data) {
     var elements = ''
     levels_departments_elements = '';
     modulus_departments_elements = '';
     tu_departments_elements = '';
     branch_departement_content = '<option value="" selected disabled>Choose the department</option>';
     var active = '';
     var intialDepID = -1;
     department_editparames = []
     $.each(data, function(key, val) {
         active = '';
         if (key == 0) {
             active = 'active';
             intialDepID = val.id;
         }
         department_editparames.push('dep_label=' + val.label + '&&&department=' + val.name);

         // class concate
         $.each(val.branches, function(key1, option) {
                 // console.log('option');
                 // levels_departments_elements += ' <li class="classe_menu ' + active + '"><a href="#" id="cm' + option.id + '"  onclick="display_Classes_of(this.id);" title="' + option.name + '">' + option.name + '<span class="pull-right badge bg-orange">' + option.levels.length + '</span></a></li> ';

                 // tu concat
                 tu_departments_elements += '<li class="active">'
                 tu_departments_elements += '    <div class="collapsible-header">' + option.name
                 tu_departments_elements += '        <div style="position: absolute; right: 10px;"><i class="material-icons">keyboard_arrow_down</i></div>'
                 tu_departments_elements += '    </div>'
                 tu_departments_elements += '    <div class="collapsible-body">'
                 tu_departments_elements += '        <ul class="" id="mail-folders">'
                 if (val.levels.length > 0) {
                     $.each(option.levels, function(key2, vale) {
                         $.each(vale.semesters, function(key3, sem) {
                             tu_departments_elements += '            <li class="tu_menu ' + (key == 0 && key1 == 0 && key2 == 0 && key3 == 0 ? 'active' : '') + '">'
                             tu_departments_elements += '                <a href="#" id="tu' + sem.id + '" onclick="display_tu_of(this.id);" title="' + sem.name + '">' + vale.label + '  <span class="fas fa-hand-point-right"></span>  ' + sem.name + '<span class="pull-right badge bg-orange"></span></a>'
                             tu_departments_elements += '            </li>'

                             if (key == 0 && key1 == 0 && key2 == 0 && key3 == 0) {
                                 display_tu_of('tu' + sem.id);
                             }
                         })
                     })
                 } else {
                     tu_departments_elements += '<div>No Classes</div>'
                 }
                 tu_departments_elements += '        </ul>'
                 tu_departments_elements += '    </div>'
                 tu_departments_elements += '</li>'
             })
             //  departement concat
         elements += '<tr class="odd gradeX">'
         elements += '<td class="">' + val.label + '</td>'
         elements += '<td class="">' + val.name + '</td>'
         elements += ' <td class=""><span class="badge bg-white">' + val.branches.length +
             ' Options</span></td>'
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

         branch_departement_content += '<option value="' + val.id + '">' + val.label + '</option>'
     })

     $.fn.dataTable.isDataTable('#departement_table') && departement_table.destroy();


     elements.length != 0 ? $('#department_body').html(elements) : $('#department_body').html('<tr><td colspan="5" class="center">No Department, please add one !!!<td></tr>');


     levels_departments_elements.length != 0 ? $('.levels_departments').html(levels_departments_elements) : $('.levels_departments').html('<tr><td colspan="6" class="center">No Departments<td></tr>');
     tu_departments_elements.length != 0 ? $('.tu_departments').html(tu_departments_elements) : $('.tu_departments').html('<tr><td colspan="6" class="center">No Departments<td></tr>');
     modulus_departments_elements.length != 0 ? $('.modulus_departments').html(modulus_departments_elements) : $('.modulus_departments').html('<tr><td colspan="6" class="center">No Departments<td></tr>');
     $('#modulus_body').html('<div>Please select the class to view his modulus</div>');
     $('#tu_body').html('<div>Please select the class to view his TU !!!</div>');
     // intialDepID != -1 && getClassesOf(intialDepID);
     $('#branch_departement').html(branch_departement_content);
     if (elements.length != 0) {
         departement_table = $('#departement_table').DataTable({
             responsive: true,
         });
     }

     $('.collapsible').collapsible();

 }





 // function semesterData(data) {
 //     var elements = ''
 //     semester_editparames = []
 //     $.each(data, function(key, val) {
 //         semester_editparames.push('semester=' + val.name);
 //         elements += '<tr class="odd gradeX">'
 //         elements += '<td class="">' + val.name + '</td>'
 //         elements += '<td class=""><span class="badge bg-teal">' + val.affectations.length + ' Classes</span></td>'
 //         elements += '<td class="">'
 //         elements += '    <div class="badge col-green">Active</div>'
 //         elements += '</td>'
 //             // elements += '<td class="">'
 //             // elements += '    <div class="progress-xs not-rounded progress">'
 //             // elements += '        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">'
 //             // elements += '            <span class="sr-only">25%</span>'
 //             // elements += '        </div>'
 //             // elements += '    </div>'
 //             // elements += '</td>'
 //         elements += '<td class="center">'
 //         elements += '    <a href="#" data-target="#add_semester" data-toggle="modal" class="btn btn-tbl-edit" onclick="editer( semester_editparames[' + key + '],' + val.id + ')" >'
 //         elements += '        <i class="material-icons">create</i>'
 //         elements += '    </a>'
 //         elements += '    <a href="#" class="btn btn-tbl-delete" onclick="delete_semester(' + val.id + ')">'
 //         elements += '        <i class="material-icons">delete_forever</i>'
 //         elements += '    </a>'
 //         elements += '</td>'
 //         elements += '</tr>'
 //     })

 //     $.fn.dataTable.isDataTable('#semester_table') && semester_table.destroy();

 //     elements.length != 0 ? $('#semester_body').html(elements) : $('#semester_body').html('<tr><td colspan="3" class="center">No Semester !!!<td></tr>');
 //     if (elements.length != 0) {
 //         semester_table = $('#semester_table').DataTable({
 //             responsive: true,
 //         });
 //     }

 // }

 var names = [];

 function bindEcu(action = 'null') {
     var elements = '';
     if (action == 'adding' && $('#ECU_name').val().length != 0 &&
         $('#ECU_hours').val().length != 0 &&
         $('#ECU_credict').val().length != 0 && names.indexOf($('#ECU_name').val()) == -1) {

         addedecu.push({
             module_name: $('#ECU_name').val(),
             modulus_hours: $('#ECU_hours').val(),
             modulus_credict: $('#ECU_credict').val(),
             id: 0,
         });
         names.push($('#ECU_name').val());
     }
     // console.log(addedecu);
     $.each(addedecu.reverse(), function(key, value) {
         elements += '  <li class="clearfix m-t-10 m-b-10" style="inline">'
         elements += ' <div class="form-check m-l-10 " >'
         elements += '  <label class="form-check-label"> <input class="form-check-input"'
         elements += '       type="checkbox" value="">' + value.module_name + ' <span class="form-check-sign"> <span'
         elements += '         class="check"></span>'
         elements += ' </span>'
         elements += ' </label>'
         elements += ' </div>'
             // elements += ' {{-- <div class=" " style="display: inline-block; position: absolute"> --}}'

         elements += '    <span class="m-l-20 p-l-20">' + value.modulus_hours + ' hours</span>'
         elements += '     <span class="m-l-20">' + value.modulus_credict + ' credits</span>'
             // elements += ' {{-- </div> --}}'

         elements += ' <div class="todo-actionlist pull-right clearfix m-b-10">'

         elements += '   <a href="#"> <i title="' + value.module_name + '" onclick="removeECU(this.title)" class="material-icons">clear</i>'
         elements += '    </a>'
         elements += ' </div>'
         elements += '  </li> <hr>'
     })

     // console.log(addedecu);
     $('#modList').html(elements);
     $('#ECU_name').val('');
     $('#ECU_hours').val('');
     $('#ECU_credict').val('');

     $('#TU_checker').val(JSON.stringify(addedecu));
 }

 function removeECU(ecu_name) {

     addedecu = addedecu.filter(function(ecu) { return ecu.module_name != ecu_name })
     names = names.filter(function(name) { return name != ecu_name })


     bindEcu();
 }

 function initialECU() {

     addedecu = [];


     bindEcu();
 }