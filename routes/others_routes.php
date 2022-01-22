<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


// for users page
Route::get('profile', function () {
    return view('pages.others.profile');
})->middleware(['auth'])->name('profile');

Route::get('faqs', function () {
    return view('pages.others.faqs');
})->middleware(['auth'])->name('faqs');

Route::get('locked', function () {
    return view('pages.others.locked');
})->middleware(['auth'])->name('locked');
