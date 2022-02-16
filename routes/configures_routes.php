<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YearController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


// for school page
Route::get('school', [SchoolController::class,'index'])->middleware(['auth'])->name('school');

// For school=> department
Route::post('/school/store_department',[SchoolController::class,'storeDepartment']);
Route::get('/school/get_departments',[SchoolController::class,'getDepartments']);
Route::post('/school/update_department/{id}',[SchoolController::class,'updateDepartment']);
Route::get('/school/delete_department/{id}',[SchoolController::class,'deleteDepartment']);
Route::get('/school/destroy_department/{id}',[SchoolController::class,'destroyDepartment']);

// For school=> Branches
Route::post('/school/store_branch',[SchoolController::class,'storeBranch']);
Route::get('/school/get_branchs',[SchoolController::class,'getBranchs']);
Route::post('/school/update_branch/{id}',[SchoolController::class,'updateBranch']);
Route::get('/school/delete_branch/{id}',[SchoolController::class,'deleteBranch']);
Route::get('/school/destroy_branch/{id}',[SchoolController::class,'destroyBranch']);

// For school=> Semester
Route::post('/school/store_semester',[SchoolController::class,'storeSemester']);
Route::get('/school/get_semesters',[SchoolController::class,'getSemesters']);
Route::post('/school/update_semester/{id}',[SchoolController::class,'updateSemester']);
Route::get('/school/delete_semester/{id}',[SchoolController::class,'deleteSemester']);
Route::get('/school/destroy_semester/{id}',[SchoolController::class,'destroySemester']);

// For school=> Classe
Route::post("/school/store_classe",[SchoolController::class,'storeClasse']);
Route::get("/school/get_classe_sof/{depID}",[SchoolController::class,'getClassesOf']);
Route::post("/school/update_classe/{id}",[SchoolController::class,'updateClasse']);
Route::get("/school/delete_classe/{id}",[SchoolController::class,'deleteClasse']);
Route::get('/school/destroy_classe/{id}',[SchoolController::class,'destroyClasse']);

// for tu
Route::get("/school/get_tu_of/{classID}",[SchoolController::class,'getTuOf']);
Route::post("/school/store_tu",[SchoolController::class,'storeTu']);
Route::post("/school/update_tu/{id}" ,[SchoolController::class,'updateTu']);
Route::get('/school/delete_tu/{id}',[SchoolController::class,'deleteTu']);
Route::get("/school/bind_semester_of/{classID}",[SchoolController::class,'bindSemestersOf']);

// For school=>Modulus
Route::post("/school/store_modulus",[SchoolController::class,'storeModulus']);
Route::get("/school/get_modulud_of/{classID}",[SchoolController::class,'getModulusOf']);
Route::post("/school/update_modulus/{id}",[SchoolController::class,'updateModulus']);
Route::get("/school/delete_modulus/{id}",[SchoolController::class,'deleteModulus']);
Route::get('/school/destroy_modulus/{id}',[SchoolController::class,'destroyModulus']);
Route::get("/school/bind_tu_of/{classID}",[SchoolController::class,'bindTuOf']);











// for users page
Route::get('users', [UtilisateurController::class,'index'])->middleware(['auth'])->name('all_users');
Route::post('/school/store_user', [UtilisateurController::class,'storeUtilisateur'])->middleware(['auth']);
Route::post('/school/update_user/{id}', [UtilisateurController::class,'updateUtilisateur'])->middleware(['auth']);
Route::post('/school/complete_registration/', [UtilisateurController::class,'completeRegistration'])->middleware(['auth']);
Route::get('/school/delete_user/{id}', [UtilisateurController::class,'deleteUtilisateur'])->middleware(['auth']);
Route::get('/school/destroy_user/{id}', [UtilisateurController::class,'destroyUtilisateur'])->middleware(['auth']);
Route::get('/school/verifier_email/{email}', [UtilisateurController::class,'verifier_email'])->middleware(['auth']);



// for promotions page
Route::get('promotions', [YearController::class,'index'])->middleware(['auth'])->name('all_promotions');
Route::post('/school/store_year', [YearController::class,'storeYear'])->middleware(['auth']);
Route::get('/school/update_year/{id}', [YearController::class,'updateYear'])->middleware(['auth']);
Route::get('/school/delete_year/{id}', [YearController::class,'deleteYear'])->middleware(['auth']);
Route::get('/school/destroy_year/{id}', [YearController::class,'destroyYear'])->middleware(['auth']);

// for all to get year
Route::get('/school/get_year/{id}', [YearController::class,'getYear'])->middleware(['auth']);

