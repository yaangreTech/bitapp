<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


// for users page
Route::get('students/',[StudentController::class, 'index'])->middleware(['auth'])->name('all_students');
Route::get('/students/get_students_of/{yearID}/{classID}/',[StudentController::class, 'getStudentsOf'])->middleware(['auth']);
Route::get('/students_form', [StudentController::class, 'displayForm'])->middleware(['auth'])->name('students_form');
Route::post('/store_student', [StudentController::class,'storeStudent'])->middleware(['auth']);
Route::get('/update_student/{id}', [StudentController::class,'updateStudent'])->middleware(['auth']);
Route::get('/delete_student/{id}', [StudentController::class,'deleteStudent'])->middleware(['auth']);
Route::get('/destroy_student/{id}', [StudentController::class,'destroyStudent'])->middleware(['auth']);
