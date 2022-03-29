<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YearController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// for school page
Route::get('school', [SchoolController::class, 'index'])
    ->middleware(['auth', 'isAdmin'])
    ->name('school');

// For school=> department
Route::post('/school/store_department', [
    SchoolController::class,
    'storeDepartment',
])->middleware(['auth', 'isAdmin']);

Route::get('/school/get_departments', [
    SchoolController::class,
    'getDepartments',
]);
Route::post('/school/update_department/{id}', [
    SchoolController::class,
    'updateDepartment',
])->middleware(['auth', 'isAdmin']);
Route::get('/school/delete_department/{id}', [
    SchoolController::class,
    'deleteDepartment',
])->middleware(['auth', 'isAdmin']);
Route::get('/school/destroy_department/{id}', [
    SchoolController::class,
    'destroyDepartment',
])->middleware(['auth', 'isAdmin']);

// For school=> Branches
Route::post('/school/store_branch', [
    SchoolController::class,
    'storeBranch',
])->middleware(['auth', 'isAdmin']);
Route::get('/school/get_branchs', [
    SchoolController::class,
    'getBranchs',
])->middleware(['auth', 'isAdmin']);
Route::post('/school/update_branch/{id}', [
    SchoolController::class,
    'updateBranch',
])->middleware(['auth', 'isAdmin']);
Route::get('/school/delete_branch/{id}', [
    SchoolController::class,
    'deleteBranch',
])->middleware(['auth', 'isAdmin']);
Route::get('/school/destroy_branch/{id}', [
    SchoolController::class,
    'destroyBranch',
])->middleware(['auth', 'isAdmin']);

Route::get('/school/bind_levels_of/{initalID}', [
    SchoolController::class,
    'bind_levels_of',
])->middleware(['auth', 'isAdmin']);


// For school=> Semester
Route::post('/school/store_semester', [
    SchoolController::class,
    'storeSemester',
])->middleware(['auth', 'isAdmin']);

Route::get('/school/get_semesters', [
    SchoolController::class,
    'getSemesters',
])->middleware(['auth', 'isAdmin']);

Route::post('/school/update_semester/{id}', [
    SchoolController::class,
    'updateSemester',
])->middleware(['auth', 'isAdmin']);

Route::get('/school/delete_semester/{id}', [
    SchoolController::class,
    'deleteSemester',
])->middleware(['auth', 'isAdmin']);

Route::get('/school/destroy_semester/{id}', [
    SchoolController::class,
    'destroySemester',
])->middleware(['auth', 'isAdmin']);

// For school=> Classe
Route::post('/school/store_classe', [
    SchoolController::class,
    'storeClasse',
])->middleware(['auth', 'isAdmin']);

Route::get('/school/get_classe_sof/{depID}', [
    SchoolController::class,
    'getClassesOf',
])->middleware(['auth', 'isAdmin']);

Route::post('/school/update_classe/{id}', [
    SchoolController::class,
    'updateClasse',
])->middleware(['auth', 'isAdmin']);

Route::get('/school/delete_classe/{id}', [
    SchoolController::class,
    'deleteClasse',
])->middleware(['auth', 'isAdmin']);

Route::get('/school/destroy_classe/{id}', [
    SchoolController::class,
    'destroyClasse',
])->middleware(['auth', 'isAdmin']);

// for tu
Route::get('/school/get_tu_of/{classID}', [
    SchoolController::class,
    'getTuOf',
])->middleware(['auth', 'isAdmin']);
Route::post('/school/store_tu', [
    SchoolController::class,
    'storeTu',
])->middleware(['auth', 'isAdmin']);
Route::post('/school/update_tu/{id}', [
    SchoolController::class,
    'updateTu',
])->middleware(['auth', 'isAdmin']);
Route::get('/school/delete_tu/{id}', [
    SchoolController::class,
    'deleteTu',
])->middleware(['auth', 'isAdmin']);
Route::get('/school/bind_semester_of/{classID}', [
    SchoolController::class,
    'bindSemestersOf',
])->middleware(['auth', 'isAdmin']);

// For school=>Modulus
Route::post('/school/store_modulus/{tuID}', [
    SchoolController::class,
    'storeModulus',
])->middleware(['auth', 'isAdmin']);
Route::get('/school/get_modulud_of/{classID}', [
    SchoolController::class,
    'getModulusOf',
])->middleware(['auth', 'isAdmin']);
Route::post('/school/update_modulus/{id}', [
    SchoolController::class,
    'updateModulus',
])->middleware(['auth', 'isAdmin']);
Route::get('/school/delete_modulus/{id}', [
    SchoolController::class,
    'deleteModulus',
])->middleware(['auth', 'isAdmin']);
Route::get('/school/destroy_modulus/{id}', [
    SchoolController::class,
    'destroyModulus',
]);
Route::get('/school/bind_tu_of/{classID}', [
    SchoolController::class,
    'bindTuOf',
])->middleware(['auth', 'isAdmin']);

// for users page
Route::get('users', [UtilisateurController::class, 'index'])
    ->middleware(['auth', 'isAdmin'])
    ->name('all_users');
Route::post('/school/store_user', [
    UtilisateurController::class,
    'storeUtilisateur',
])->middleware(['auth', 'isAdmin']);

Route::post('/school/update_user/{id}', [
    UtilisateurController::class,
    'updateUtilisateur',
])->middleware(['auth']);

Route::post('/school/complete_registration/', [
    UtilisateurController::class,
    'completeRegistration',
])->middleware(['auth']);

Route::get('/school/delete_user/{id}', [
    UtilisateurController::class,
    'deleteUtilisateur',
])->middleware(['auth', 'isAdmin']);

Route::get('/school/desable_user/{id}', [
    UtilisateurController::class,
    'desableUtilisateur',
])->middleware(['auth', 'isAdmin']);

Route::get('/school/enable_user/{id}', [
    UtilisateurController::class,
    'enableUtilisateur',
])->middleware(['auth', 'isAdmin']);

Route::get('/school/destroy_user/{id}', [
    UtilisateurController::class,
    'destroyUtilisateur',
])->middleware(['auth', 'isAdmin']);
Route::get('/school/verifier_email/{email}', [
    UtilisateurController::class,
    'verifier_email',
])->middleware(['auth', 'isAdmin']);

// for promotions page
Route::get('promotions', [YearController::class, 'index'])
    ->middleware(['auth', 'isAdmin'])
    ->name('all_promotions');
Route::post('/school/store_year', [
    YearController::class,
    'storeYear',
])->middleware(['auth', 'isAdmin']);
Route::get('/school/update_year/{id}', [
    YearController::class,
    'updateYear',
])->middleware(['auth', 'isAdmin']);
Route::get('/school/delete_year/{id}', [
    YearController::class,
    'deleteYear',
])->middleware(['auth', 'isAdmin']);
Route::get('/school/destroy_year/{id}', [
    YearController::class,
    'destroyYear',
])->middleware(['auth', 'isAdmin']);

// for all to get year
Route::get('/school/get_year/{id}', [
    YearController::class,
    'getYear',
])->middleware(['auth']);
