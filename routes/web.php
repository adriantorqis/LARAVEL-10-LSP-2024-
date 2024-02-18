<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Models\Laporan;
use App\Http\Middleware\Authenticate;
use App\Models\Feedback;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [LaporanController::class, 'showAdminDashboard'])->name('admin.dashboard');
Route::put('/update-status/{id}', [AdminController::class, 'updateStatus'])->name('admin.updateStatus');
Route::delete('/delete-laporan/{id}', [AdminController::class, 'deleteLaporan'])->name('admin.deleteLaporan');
Route::post('/mark-as-selesai/{id}', [AdminController::class, 'finishStatus'])->name('admin.markAsSelesai');

Route::get('/get-laporan-by-category', [LaporanController::class, 'getByCategory'])->name('get-laporan-by-category');
Route::get('/dashboard/{id}', [LaporanController::class, 'show'])->name('admin.show');

Route::get('/', [LaporanController::class, 'showDashboard'])->name('dashboard');
Route::post('/', [LaporanController::class, 'store'])->name('laporan.store'); // This is for storing laporan
Route::post('/feedback', [LaporanController::class, 'handleFeedback'])->name('feedback.handle'); // This is for handling feedback

// This route fetches data for the dashboard view
Route::get('/', function () {
    $laporans = Laporan::all();
    return view('dashboard', compact('laporans'));
})->name('dashboard.home');