<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


// for school page
Route::get('school', function () {
    return view('pages.configures.school');
})->middleware(['auth'])->name('school');

// for users page
Route::get('users', function () {
    return view('pages.configures.users');
})->middleware(['auth'])->name('all_users');

// for classes page
Route::get('classes', function () {
    return view('pages.configures.classes');
})->middleware(['auth'])->name('all_classes');

// for modulus page
Route::get('modulus', function () {
    return view('pages.configures.modulus');
})->middleware(['auth'])->name('all_modulus');

// for departments page
Route::get('departments', function () {
    return view('pages.configures.departments');
})->middleware(['auth'])->name('all_departments');

// for promotions page
Route::get('promotions', function () {
    return view('pages.configures.promotions');
})->middleware(['auth'])->name('all_promotions');