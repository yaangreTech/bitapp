<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AverageController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


// for users page
Route::get('semester_averages', [AverageController::class,'index'])->middleware(['auth'])->name('semester_averages');
Route::get('semester_averages/get_average_of/{yearID}/{semesterID}', [AverageController::class,'getAverageOf'])->middleware(['auth'])->name('getAverageOf');
