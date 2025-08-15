<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']);

// Menampilkan form login
Route::get('/login', [LoginController::class, 'formLogin'])->name('login');

// Proses login
Route::post('/login', [LoginController::class, 'loginAction'])->name('login.action');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/admin/informasi', informasiController::class);
    Route::resource('/admin/project', projectController::class);
    Route::resource('/admin/skill', skillController::class);
});

// require __DIR__.'/auth.php'; // <--- matikan kalau tidak pakai breeze route default
