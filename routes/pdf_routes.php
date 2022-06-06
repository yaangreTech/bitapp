<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tcpfController;
use App\Http\Controllers\TranscriptController;
use App\Http\Controllers\excelExportController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// pdf generation test
Route::get('pdfDiploma/{inscription_id}/{lang}', [tcpfController::class, 'pdfDiplom'])->middleware(['auth']);
Route::get('pdfAtestation/{inscription_id}/{lang}', [tcpfController::class, 'pdfAtestation'])->middleware(['auth']);
Route::get('certificate', [tcpfController::class, 'certificate'])->name('certificate');