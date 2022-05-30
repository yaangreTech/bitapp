<?php

use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;

Route::get('generate-pdf', [PdfController::class, 'generatePDF']);