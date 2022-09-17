<?php

use Illuminate\Support\Facades\Route;

Route::get('new-company', function () {
    return view('pages.alumni.new-company');
})->name('newCompany');

Route::get('company', function () {
    return view('pages.alumni.company');
})->name('companies');

Route::get('alumni', function () {
    return view('pages.alumni.alumnies');
})->name('alumnies');