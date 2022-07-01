<?php

use App\Http\Controllers\Csv;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarksController;
use App\Http\Controllers\MarksInputController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


// for users page
// Route::get('marks_modulus', function () {
//     return view('pages.marks.marks_modulus');
// })->middleware(['auth'])->name('marks_modulus');

Route::get('marks_modulus/',[MarksController::class, 'index'])->middleware(['auth','isHdep'])->name('marks_modulus');
Route::get('/marks_modulus/get_marks_modulus_of/{yearID}/{semesterID}/',[MarksController::class, 'getMarksModulusOf'])->middleware(['auth','isHdep']);
Route::get('/marks_modulus/get_marks_modulus_tests_of/{yearID}/{modulusID}/',[MarksController::class, 'getMarksModulusTestsOf'])->middleware(['auth','isHdep']);
Route::post('/marks_modulus/store_test/{yearID}/{modulusID}/',[MarksController::class, 'storeTest'])->middleware(['auth','isHdep']);
Route::get('/marks_modulus/delete_test/{id}/',[MarksController::class, 'deleteTest'])->middleware(['auth','isHdep']);
Route::post('/marks_modulus/update_test/{id}/',[MarksController::class, 'updateTest'])->middleware(['auth','isHdep']);


// for add marks page
Route::get('add_marks/',[MarksInputController::class, 'index'])->middleware(['auth','isHdep'])->name('add_marks');
Route::get('view_marks/',[MarksInputController::class, 'view'])->middleware(['auth'])->name('view_marks');
Route::get('/marks_modulus/get_marks_modulus_marks_of/{yearID}/{modulusID}/',[MarksInputController::class, 'getMarksModulusMarksOf'])->middleware(['auth','isHdep']);
Route::get('/marks_modulus/get_marks_modulus_session_mark_of/{yearID}/{modulusID}/',[MarksInputController::class, 'getMarksModulusMarks_sessionOf'])->middleware(['auth','isHdep']);
Route::get('/marks_modulus/view_marks_modulus_marks_of/{yearID}/{modulusID}/',[MarksInputController::class, 'viewMarksModulusMarksOf'])->middleware(['auth','isHdep']);
Route::get('/marks_modulus/viewMarksModulusMarks_with_session_Of/{yearID}/{modulusID}/',[MarksInputController::class, 'viewMarksModulusMarks_with_session_Of'])->middleware(['auth','isHdep']);
Route::post('/marks_modulus/store_marks_modulus_marks_of/{inscID}/{testID}/',[MarksInputController::class, 'storeMarksModulusMarksOf'])->middleware(['auth','isHdep']);
Route::post('/marks_modulus/update_marks_modulus_marks_of/{markID}/',[MarksInputController::class, 'updateMarksModulusMarksOf'])->middleware(['auth','isHdep']);


Route::post('/download_marks_form_themplate/{modulusID}/{type}', [
    Csv::class,
    'download_marks_form_themplate',
])->name('download_marks_form_themplate')->middleware(['auth','isHdep']);

Route::post('save_marks/{modulusID}', [
    Csv::class,
    'save_marks',
])->name('save_marks')->middleware(['auth','isHdep']);


