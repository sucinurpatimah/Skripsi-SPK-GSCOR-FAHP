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
        // Ambil hasil dengan relasi kpi
        $hasil = NilaiAkhirSCM::with('kpi')
            ->whereHas('kpi') // pastikan relasi ada
            ->get()
            // sortBy pakai closure untuk urutan custom
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
            ->values(); // reset index collection

        // Label singkatan
        $labelsSingkat = $hasil->map(function ($item) {
            return strlen($item->kpi->indikator) > 15
                ? substr($item->kpi->indikator, 0, 12) . '...'
                : $item->kpi->indikator;
        });

        $total = $hasil->sum('nilai_akhir');

        return view('admin.index', compact('hasil', 'labelsSingkat', 'total'));
    }
}
