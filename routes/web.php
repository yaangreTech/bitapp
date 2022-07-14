<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/', [AuthenticatedSessionController::class, 'create'])->middleware('guest');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/dashboard/get-chart-details', [DashboardController::class, 'getChartDetails'])->middleware(['auth']);



// Auth routes
require __DIR__ . '/auth.php';

// configures routes
require __DIR__ . '/configures_routes.php';

// configures routes
require __DIR__ . '/students_routes.php';

// Marks management routes
require __DIR__ . '/marks_routes.php';

// generated average routes
require __DIR__ . '/generated_averages_routes.php';

// generated documents routes
require __DIR__ . '/documents_routes.php';

// generated documents routes
require __DIR__ . '/others_routes.php';

// pdf test
require __DIR__ . '/pdf_routes.php';

// Excel
require __DIR__ . '/excel_export.php';