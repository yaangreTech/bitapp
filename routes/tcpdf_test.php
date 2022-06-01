<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TranscriptController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\tcpfController;

// pdf generation test
Route::get('pdf', [tcpfController::class, 'pdf'])->name('pdf');
Route::get('pdfAtestation', [tcpfController::class, 'pdfAtestation'])->name('pdfAtestation');
Route::get('certificate', [tcpfController::class, 'certificate'])->name('certificate');