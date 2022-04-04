<?php

use App\Http\Controllers\Csv;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


// for users page
Route::get('students/',[StudentController::class, 'index'])->middleware(['auth'])->name('all_students');
Route::get('/students/get_students_of/{yearID}/{classID}/',[StudentController::class, 'getStudentsOf'])->middleware(['auth']);
Route::get('/students/view_student_infos/{inscID}/',[StudentController::class, 'viewStudentsInfo'])->middleware(['auth']);
Route::get('/students_form', [StudentController::class, 'displayForm'])->middleware(['auth'])->name('students_form');
Route::post('/store_student', [StudentController::class,'storeStudent'])->middleware(['auth']);
Route::post('/students/update_student/{id}', [StudentController::class,'updateStudent'])->middleware(['auth']);
Route::get('/students/delete_student/{id}', [StudentController::class,'deleteStudent'])->middleware(['auth']);
Route::get('/students/disable_student/{id}', [StudentController::class,'disable_tudent'])->middleware(['auth']);
Route::get('/students/enable_student/{id}', [StudentController::class,'enable_Student'])->middleware(['auth']);
Route::get('/students/destroy_student/{id}', [StudentController::class,'destroyStudent'])->middleware(['auth']);
Route::get('/students/verify_matricule/{matricule}', [StudentController::class,'verifyMatricule'])->middleware(['auth']);

Route::get('reinscription/',[StudentController::class,'reinscription_index'])->middleware(['auth'])->name('reinscription_form');
Route::get('reinscription/get_destination/{lastYearID}/{initialClassID}',[StudentController::class,'getDestination'])->middleware(['auth']);
Route::post('reinscription/reinscriptStudent/',[StudentController::class,'reinscriptStudent'])->middleware(['auth']);



Route::get('end_cycle_form/',[StudentController::class,'end_cyle_index'])->middleware(['auth'])->name('end_cycle_form');
Route::get('end_cycle_form/get_Promotions/{currentYearID}/{l3classID}',[StudentController::class,'getPromotions'])->middleware(['auth']);
Route::get('end_cycle_form/get_Students/{yearID}/{classID}',[StudentController::class,'getStudentsToEnd'])->middleware(['auth']);
Route::post('end_cycle_form/end_Students_cycle/',[StudentController::class,'end_Students_cycle'])->middleware(['auth']);



//import year
//import year
Route::get('/import_form', [
    Csv::class,
    'import_student_form',
])->name('import_form')->middleware(['auth']);




Route::post('import_form', [
    Csv::class,
    'saveStudents',
])->name('saveStudents')->middleware(['auth']);



Route::post('downloadStudentList_themplate', [
    Csv::class,
    'downloadStudentList_themplate',
])->name('downloadStudentList_themplate')->middleware(['auth']);


