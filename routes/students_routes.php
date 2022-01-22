<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


// for users page
Route::get('students', function () {
    return view('pages.students.students');
})->middleware(['auth'])->name('all_students');

Route::get('students_form', function () {
    return view('pages.students.students-form');
})->middleware(['auth'])->name('students_form');
