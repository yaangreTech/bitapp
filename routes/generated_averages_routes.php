<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


// for users page
Route::get('semester_averages', function () {
    return view('pages.averages.semester_averages');
})->middleware(['auth'])->name('semester_averages');
