<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GSCORController;
use App\Http\Controllers\KPIController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\SCMController;
use App\Http\Controllers\SCORController;
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
    Route::get('Kelola-Data-Perencanaan', [SCMController::class, 'perencanaan'])->name('perencanaan');
    Route::get('Kelola-Data-Pengadaan', [SCMController::class, 'pengadaan'])->name('pengadaan');
    Route::get('Kelola-Data-Produksi', [SCMController::class, 'produksi'])->name('produksi');
    Route::get('Kelola-Data-Distribusi', [SCMController::class, 'distribusi'])->name('distribusi');
    Route::get('Kelola-Data-Pengembalian', [SCMController::class, 'pengembalian'])->name('pengembalian');
    Route::get('Kelola-Data-SCOR', [SCORController::class, 'index'])->name('scor');
    Route::get('Kelola-Data-GreenSCOR', [GSCORController::class, 'index'])->name('gscor');
    Route::get('Kelola-Data-KPI', [KPIController::class, 'index'])->name('kpi');
    Route::get('Kelola-Perhitungan', [KPIController::class, 'perhitungan'])->name('perhitungan');

    //Manager
    Route::get('/manager', [ManagerController::class, 'index'])->name('dashboard.manager');
    Route::get('Data-Perencanaan', [ManagerController::class, 'perencanaan'])->name('manager.perencanaan');
    Route::get('Data-Pengadaan', [ManagerController::class, 'pengadaan'])->name('manager.pengadaan');
    Route::get('Data-Produksi', [ManagerController::class, 'produksi'])->name('manager.produksi');
    Route::get('Data-Distribusi', [ManagerController::class, 'distribusi'])->name('manager.distribusi');
    Route::get('Data-Pengembalian', [ManagerController::class, 'pengembalian'])->name('manager.pengembalian');
    Route::get('Data-SCOR', [ManagerController::class, 'scor'])->name('manager.scor');
    Route::get('Data-GreenSCOR', [ManagerController::class, 'gscor'])->name('manager.gscor');
    Route::get('Data-KPI', [ManagerController::class, 'kpi'])->name('manager.kpi');
    Route::get('Laporan', [ManagerController::class, 'laporan'])->name('manager.laporan');
});

Route::post('/logout', [SesiController::class, 'logout'])->name('logout');
