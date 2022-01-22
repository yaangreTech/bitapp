<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


// for users page
Route::get('marks_modulus', function () {
    return view('pages.marks.marks_modulus');
})->middleware(['auth'])->name('marks_modulus');

// for add marks page
Route::get('add_marks', function () {
    return view('pages.marks.add_marks');
})->middleware(['auth'])->name('add_marks');
