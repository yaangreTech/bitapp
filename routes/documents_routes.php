<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


// for grades page
Route::get('grades', function () {
    return view('pages.documents.grades');
})->middleware(['auth'])->name('grades');


// for certificate page
Route::get('certificates', function () {
    return view('pages.documents.certificates');
})->middleware(['auth'])->name('certificates');
