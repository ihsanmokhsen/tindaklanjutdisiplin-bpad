<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// ─── Public Form ────────────────────────────────────────────────────────────
Route::get('/', [FormController::class, 'index'])->name('form.index');
Route::post('/submit', [FormController::class, 'submit'])->name('form.submit');

// ─── Admin Auth ──────────────────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {

    // Guest-only routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminController::class, 'showLogin'])->name('login');
        Route::post('/login', [AdminController::class, 'login'])->name('login.post');
    });

    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    // Protected admin routes (must be logged in)
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // Submissions
        Route::get('/submissions/{submission}', [AdminController::class, 'show'])->name('submissions.show');
        Route::get('/submissions/{submission}/download/{type}', [AdminController::class, 'download'])->name('submissions.download');
        Route::delete('/submissions/{submission}', [AdminController::class, 'destroy'])->name('submissions.destroy');

        // Admin user management
        Route::get('/users', [AdminController::class, 'users'])->name('users');
        Route::get('/users/create', [AdminController::class, 'showRegister'])->name('users.create');
        Route::post('/users', [AdminController::class, 'register'])->name('users.store');
        Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('users.destroy');

        // Rekap berkas (folder browser)
        Route::get('/rekap-berkas', [AdminController::class, 'rekapBerkas'])->name('rekap');
        Route::get('/rekap-berkas/download', [AdminController::class, 'downloadBerkas'])->name('rekap.download');
    });
});
