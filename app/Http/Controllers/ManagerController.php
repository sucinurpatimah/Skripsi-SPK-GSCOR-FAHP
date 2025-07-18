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
use App\Models\RiwayatPerhitungan;
use App\Models\SCOR;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    function index()
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
        return view('manager/index', compact('hasil', 'labelsSingkat', 'total', 'rekomendasi'));
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
        $riwayats = RiwayatPerhitungan::latest()->get();

        // Urutan variabel yang diinginkan
        $urutanVariabel = ['Plan', 'Source', 'Make', 'Deliver', 'Return'];

        foreach ($riwayats as $riwayat) {
            if (is_string($riwayat->hasil_per_indikator)) {
                $decoded = json_decode($riwayat->hasil_per_indikator, true);

                // Urutkan berdasarkan urutan variabel
                usort($decoded, function ($a, $b) use ($urutanVariabel) {
                    $posA = array_search($a['variabel'], $urutanVariabel);
                    $posB = array_search($b['variabel'], $urutanVariabel);
                    return $posA <=> $posB;
                });

                $riwayat->hasil_per_indikator = $decoded;

                // Ambil rekomendasi perbaikan berdasarkan nilai snorm < 70
                $rekomendasiIndikator = collect($decoded)
                    ->filter(function ($item) {
                        return $item['snorm_de_boer'] < 70;
                    })
                    ->map(function ($item) {
                        $kpi = KPI::with(['scor', 'gscor'])->where('indikator', $item['indikator'])->first();

                        return [
                            'indikator' => $item['indikator'],
                            'rekomendasi' => $kpi->scor->rekomendasi_bawaan ?? ($kpi->gscor->rekomendasi_bawaan ?? '-'),
                        ];
                    })
                    ->values();

                // Tambahkan ke objek
                $riwayat->rekomendasi_indikator = $rekomendasiIndikator;
            }
        }

        return view('manager/laporan', compact('riwayats'));
    }
}
