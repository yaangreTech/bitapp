<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\excelExportController;

// pdf generation test
Route::get('/generateGrade', [excelExportController::class, 'genGrade'])->name('genGrade');
Route::get('/generateSemester/{yearID}/{semesterID}/{isWithSession}', [excelExportController::class, 'genSemester'])->name('genSemester');
Route::get('/generateStudentListe/{yearID}/{classID}', [excelExportController::class, 'studentList'])->name('studentList');
Route::get('/generateSubjects/{yearID}/{modulusID}/{isWithSession}', [excelExportController::class, 'subjectsGen'])->name('subjectsGen');