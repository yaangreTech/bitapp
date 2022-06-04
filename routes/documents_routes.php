<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GraduatedController;
use App\Http\Controllers\TranscriptController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


// for grades page
Route::get('grades', [TranscriptController::class, 'index'])->middleware(['auth'])->name('grades');

Route::get('/grades/get_grades_of/{yearID}/{classID}/', [TranscriptController::class, 'getGradesOf'])->middleware(['auth']);
Route::get('/grades/getGrades_with_session_Of/{yearID}/{classID}/', [TranscriptController::class, 'getGrades_with_session_Of'])->middleware(['auth']);
Route::get('grades_view', [TranscriptController::class, 'view'])->middleware(['auth'])->name('grades_view');
Route::get('/grades_view/view_grades_of/{inscID}/', [TranscriptController::class, 'viewGradesOf'])->middleware(['auth']);
Route::get('/grades_view/view_grades_with_session_of/{inscID}/', [TranscriptController::class, 'viewGrades_with_session_Of'])->middleware(['auth']);



// for certificate page
Route::get('certificates', function () {
    return view('pages.documents.certificates');
})->middleware(['auth'])->name('certificates');


Route::get('graduated-students',[GraduatedController::class, 'graduated_index'])->middleware(['auth'])->name('graduated');

Route::get('bachelor-students/{year_id}', [GraduatedController::class,'getBachelorStudentsOf'])->middleware(['auth']);
Route::get('master-students/{year_id}',[GraduatedController::class,'getMasterStudentsOf'])->middleware(['auth']);
// Route::view('/master/{year_id}/',[GraduatedController::class,'master'])->middleware(['auth']);



