<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GSCORController;
use App\Http\Controllers\KPIController;
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
    //Admin
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/admin', [AdminController::class, 'admin'])->name('dashboard.admin');
    Route::get('perencanaan', [SCMController::class, 'perencanaan'])->name('perencanaan');
    Route::get('pengadaan', [SCMController::class, 'pengadaan'])->name('pengadaan');
    Route::get('produksi', [SCMController::class, 'produksi'])->name('produksi');
    Route::get('distribusi', [SCMController::class, 'distribusi'])->name('distribusi');
    Route::get('pengembalian', [SCMController::class, 'pengembalian'])->name('pengembalian');
    Route::get('gscor', [GSCORController::class, 'index'])->name('gscor');
    Route::get('kpi', [KPIController::class, 'index'])->name('kpi');
    Route::get('perhitungan', [KPIController::class, 'perhitungan'])->name('perhitungan');

    //Manager
    Route::get('/admin/manager', [AdminController::class, 'manager']);
});

Route::post('/logout', [SesiController::class, 'logout'])->name('logout');
