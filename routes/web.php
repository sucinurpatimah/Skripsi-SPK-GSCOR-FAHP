<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SCMController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});

Route::get('/home', function () {
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/admin', [AdminController::class, 'admin'])->name('dashboard.admin');
    Route::get('/admin/manager', [AdminController::class, 'manager']);
    Route::get('perencanaan', [SCMController::class, 'perencanaan'])->name('perencanaan');
});

Route::post('/logout', [SesiController::class, 'logout'])->name('logout');
