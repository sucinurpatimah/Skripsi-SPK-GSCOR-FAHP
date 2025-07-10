<?php

namespace App\Http\Controllers;

use App\Models\Distribusi;
use App\Models\GSCOR;
use App\Models\KPI;
use App\Models\NilaiAkhirSCM;
use App\Models\Pengadaan;
use App\Models\Pengembalian;
use App\Models\Perencanaan;
use App\Models\Produksi;
use App\Models\SCOR;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    function index()
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

        return view('manager/index', compact('hasil', 'labelsSingkat', 'total'));
    }

    function perencanaan()
    {
        $dataPerencanaan = Perencanaan::all();
        return view('manager/perencanaan', compact('dataPerencanaan'));
    }

    function pengadaan()
    {
        $dataPengadaan = Pengadaan::all();
        return view('manager/pengadaan', compact('dataPengadaan'));
    }

    function produksi()
    {
        $dataProduksi = Produksi::all();
        return view('manager/produksi', compact('dataProduksi'));
    }

    function distribusi()
    {
        $dataDistribusi = Distribusi::all();
        return view('manager/distribusi', compact('dataDistribusi'));
    }

    function pengembalian()
    {
        $dataPengembalian = Pengembalian::all();
        return view('manager/pengembalian', compact('dataPengembalian'));
    }

    function scor()
    {
        $dataScor = SCOR::orderByRaw("FIELD(variabel, 'Plan', 'Source', 'Make', 'Deliver', 'Return')")->get();
        return view('manager/scor', compact('dataScor'));
    }

    function gscor()
    {
        $dataGscor = GSCOR::orderByRaw("FIELD(variabel, 'Plan', 'Source', 'Make', 'Deliver', 'Return')")->get();
        return view('manager/gscor', compact('dataGscor'));
    }

    function kpi()
    {
        $dataKPI = KPI::orderByRaw("FIELD(variabel, 'Plan', 'Source', 'Make', 'Deliver', 'Return')")->get();
        return view('manager/kpi', compact('dataKPI'));
    }

    function laporan()
    {
        return view('manager/laporan');
    }
}
