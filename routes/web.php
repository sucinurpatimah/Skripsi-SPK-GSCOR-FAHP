<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GSCORController;
use App\Http\Controllers\KPIController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\PerhitunganController;
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

    //Kelola Data Perencanaan
    Route::get('Kelola-Data-Perencanaan', [SCMController::class, 'perencanaan'])->name('perencanaan');
    Route::post('Tambah-Data-Perencanaan', [SCMController::class, 'storePerencanaan'])->name('perencanaan.store');
    Route::post('Edit-Data-Perencanaan/{id}/update', [SCMController::class, 'updatePerencanaan'])->name('perencanaan.update');
    Route::delete('Delete-Data-Perencanaan/{id}', [SCMController::class, 'deletePerencanaan'])->name('perencanaan.delete');

    //Kelola Data Pengadaan
    Route::get('Kelola-Data-Pengadaan', [SCMController::class, 'pengadaan'])->name('pengadaan');
    Route::post('Tambah-Data-Pengadaan', [SCMController::class, 'storePengadaan'])->name('pengadaan.store');
    Route::post('Edit-Data-Pengadaan/{id}/update', [SCMController::class, 'updatePengadaan'])->name('pengadaan.update');
    Route::delete('Delete-Data-Pengadaan/{id}', [SCMController::class, 'deletePengadaan'])->name('pengadaan.delete');

    //Kelola Data Produksi
    Route::get('Kelola-Data-Produksi', [SCMController::class, 'produksi'])->name('produksi');
    Route::post('Tambah-Data-Produksi', [SCMController::class, 'storeProduksi'])->name('produksi.store');
    Route::post('Edit-Data-Produksi/{id}/update', [SCMController::class, 'updateProduksi'])->name('produksi.update');
    Route::delete('Delete-Data-Produksi/{id}', [SCMController::class, 'deleteProduksi'])->name('produksi.delete');

    //Kelola Data Distribusi
    Route::get('Kelola-Data-Distribusi', [SCMController::class, 'distribusi'])->name('distribusi');
    Route::post('Tambah-Data-Distribusi', [SCMController::class, 'storeDistribusi'])->name('distribusi.store');
    Route::post('Edit-Data-Distribusi/{id}/update', [SCMController::class, 'updateDistribusi'])->name('distribusi.update');
    Route::delete('Delete-Data-Distribusi/{id}', [SCMController::class, 'deleteDistribusi'])->name('distribusi.delete');

    //Kelola Data Pengembalian
    Route::get('Kelola-Data-Pengembalian', [SCMController::class, 'pengembalian'])->name('pengembalian');
    Route::post('Tambah-Data-Pengembalian', [SCMController::class, 'storePengembalian'])->name('pengembalian.store');
    Route::post('Edit-Data-Pengembalian/{id}/update', [SCMController::class, 'updatePengembalian'])->name('pengembalian.update');
    Route::delete('Delete-Data-Pengembalian/{id}', [SCMController::class, 'deletePengembalian'])->name('pengembalian.delete');

    //Kelola Data SCOR
    Route::get('Kelola-Data-SCOR', [SCORController::class, 'index'])->name('scor');
    Route::post('Tambah-Data-SCOR', [SCORController::class, 'storeScor'])->name('scor.store');
    Route::put('Edit-Data-SCOR/{id}/update', [SCORController::class, 'updateScor'])->name('scor.update');
    Route::delete('Delete-Data-SCOR/{id}', [SCORController::class, 'deleteScor'])->name('scor.delete');

    //Kelola Data GSCOR
    Route::get('Kelola-Data-GreenSCOR', [GSCORController::class, 'index'])->name('gscor');
    Route::post('Tambah-Data-GreenSCOR', [GSCORController::class, 'storeGscor'])->name('gscor.store');
    Route::post('Edit-Data-GreenSCOR/{id}/update', [GSCORController::class, 'updateGscor'])->name('gscor.update');
    Route::delete('Delete-Data-GreenSCOR/{id}', [GSCORController::class, 'deleteGscor'])->name('gscor.delete');

    //Kelola Data KPI
    Route::get('Kelola-Data-KPI', [KPIController::class, 'index'])->name('kpi');
    Route::post('Tambah-Data-KPI', [KPIController::class, 'storeSelected'])->name('kpi.storeSelected');
    // Input skor kuesioner dan otomatis menampilkan skor rata-rata
    Route::post('/kpi/update-skor/{id}', [KPIController::class, 'updateKpi'])->name('kpi.updateKpi');
    Route::delete('Delete-Data-KPI/{id}', [KPIController::class, 'deleteKpi'])->name('kpi.delete');

    //Kelola Perhitungan
    Route::get('Kelola-Perhitungan', [PerhitunganController::class, 'perhitungan'])->name('perhitungan');
    // Proses pembuatan matriks perbandingan berpasangan dan normalisasi matriks
    Route::post('Pairwise-Comparison-Matrix/generate', [PerhitunganController::class, 'generatePairwise'])->name('perhitungan.pairwise.generate');
    Route::get('Pairwise-Comparison-Matrix', [PerhitunganController::class, 'showNormalized'])->name('perhitungan.pairwise');
    Route::post('Pairwise-Comparison-Matrix/normalize', [PerhitunganController::class, 'normalisasiPairwise'])
        ->name('perhitungan.pairwise.normalisasi');
    Route::get('Pairwise-Comparison-Matrix/show', [PerhitunganController::class, 'showNormalized'])->name('pairwise.show');
    //Proses perhitungan uji konsistensi
    Route::get('Uji-Konsistensi', [PerhitunganController::class, 'konsistensi'])->name('perhitungan.konsistensi');
    Route::get('/uji-konsistensi', [PerhitunganController::class, 'showUjiKonsistensi'])->name('uji-konsistensi.show');
    Route::post('/uji-konsistensi/generate', [PerhitunganController::class, 'ujiKonsistensi'])->name('uji-konsistensi.generate');
    //Proses perhitugan normalisasi snorm de boer
    Route::get('Snorm-De-Boer', [PerhitunganController::class, 'showSnorm'])->name('perhitungan.snorm');
    Route::post('Snorm-De-Boer/generate', [PerhitunganController::class, 'Snormgenerate'])->name('snorm.generate');
    Route::get('Snorm-De-Boer/show', [PerhitunganController::class, 'showSnorm'])->name('snorm.show');
    //Proses perhitungan nilai akhir scm
    Route::get('Nilai-Akhir-SCM', [PerhitunganController::class, 'nilaiAkhir'])->name('perhitungan.nilai-akhir');
    Route::post('Nilai-Akhir-SCM/generate', [PerhitunganController::class, 'generateNilaiAkhir'])->name('nilai-akhir-scm.generate');
    // Route::put('nilai-akhir-scm/{id}/rekomendasi', [PerhitunganController::class, 'updateRekomendasi'])->name('nilai-akhir-scm.rekomendasi');

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
