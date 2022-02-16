<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


// for users page
Route::get('profile/', [ProfileController::class,'index'])->middleware(['auth'])->name('profile');
Route::post('/profile/{id}', [ProfileController::class,'updateProfile'])->middleware(['auth']);

Route::get('faqs', function () {
    return view('pages.others.faqs');
})->middleware(['auth'])->name('faqs');

Route::get('locked', function () {
    return view('pages.others.locked');
})->middleware(['auth'])->name('locked');
