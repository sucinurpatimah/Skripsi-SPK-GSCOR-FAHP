<?php

namespace App\Http\Controllers;

use App\Models\NilaiAkhirSCM;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        echo "Selamat Datang";
        echo "<br></br>";
        echo "<a href='/logout'> Logout </a>";
    }

    public function admin()
    {
        // Ambil semua data dengan relasi kpi, scor, dan gscor
        $hasil = NilaiAkhirSCM::with(['kpi.scor', 'kpi.gscor'])
            ->whereHas('kpi') // pastikan ada relasi kpi
            ->get()
            ->sortBy(function ($item) {
                $urutanVariabel = [
                    'Plan' => 1,
                    'Source' => 2,
                    'Make' => 3,
                    'Deliver' => 4,
                    'Return' => 5,
                ];
                return $urutanVariabel[$item->kpi->variabel] ?? 999;
            })
            ->values();

        // Siapkan label indikator singkat (untuk grafik atau ringkasan)
        $labelsSingkat = $hasil->map(function ($item) {
            return strlen($item->kpi->indikator) > 15
                ? substr($item->kpi->indikator, 0, 12) . '...'
                : $item->kpi->indikator;
        });

        // Hitung total nilai akhir SCM
        $total = $hasil->sum('nilai_akhir');

        // Filter rekomendasi perbaikan: hanya ambil yang nilai akhir < 80
        $rekomendasi = NilaiAkhirSCM::with('kpi.scor', 'kpi.gscor')
            ->get()
            ->filter(function ($item) {
                return $item->snorm < 70;
            })
            ->map(function ($item) {
                return [
                    'indikator' => $item->kpi->indikator ?? '-',
                    'rekomendasi' => $item->kpi->scor->rekomendasi_bawaan ?? ($item->kpi->gscor->rekomendasi_bawaan ?? '-'),
                    'snorm' => $item->snorm,
                ];
            });

        // Kirim semua ke view
        return view('admin.index', compact('hasil', 'labelsSingkat', 'total', 'rekomendasi'));
    }
}
