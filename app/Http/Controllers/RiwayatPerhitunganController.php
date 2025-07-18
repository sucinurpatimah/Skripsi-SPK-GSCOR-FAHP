<?php

namespace App\Http\Controllers;

use App\Models\KPI;
use App\Models\NilaiAkhirSCM;
use App\Models\RiwayatPerhitungan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class RiwayatPerhitunganController extends Controller
{
    public function index()
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

        return view('admin.riwayat', compact('riwayats'));
    }


    public function store()
    {
        $indikatorList = NilaiAkhirSCM::with('kpi')->get();

        $hasil = [];
        $totalNilaiAkhir = 0;

        foreach ($indikatorList as $indikator) {
            $hasil[] = [
                'variabel' => $indikator->kpi->variabel ?? '-',
                'atribut' => $indikator->kpi->atribut ?? '-',
                'indikator' => $indikator->kpi->indikator ?? '-',
                'bobot_prioritas' => round($indikator->bobot_prioritas, 2),
                'snorm_de_boer' => round($indikator->snorm, 2),
                'nilai_akhir' => round($indikator->nilai_akhir, 2),
            ];

            $totalNilaiAkhir += $indikator->nilai_akhir;
        }

        $rekomendasi = 'Perbaiki indikator dengan nilai SCM terendah.';

        RiwayatPerhitungan::create([
            'judul' => 'Perhitungan Kinerja Rantai Pasok pada ' . now()->format('d-m-Y H:i'),
            'hasil_per_indikator' => json_encode($hasil),
            'total_nilai_akhir' => round($totalNilaiAkhir, 2),
            'rekomendasi' => $rekomendasi,
        ]);

        return redirect()->route('riwayat.index')->with('success', 'Perhitungan disimpan.');
    }

    public function destroy($id)
    {
        RiwayatPerhitungan::destroy($id);
        return back()->with('success', 'Riwayat perhitungan berhasil dihapus.');
    }

    public function show($id)
    {
        $riwayat = RiwayatPerhitungan::findOrFail($id);
        return response()->json($riwayat);
    }

    public function cetakPDF($id)
    {
        $riwayat = RiwayatPerhitungan::findOrFail($id);

        // Pastikan hasil_per_indikator adalah array
        $hasilPerIndikator = is_string($riwayat->hasil_per_indikator)
            ? json_decode($riwayat->hasil_per_indikator, true)
            : $riwayat->hasil_per_indikator;

        // Ambil rekomendasi perbaikan berdasarkan nilai snorm < 70
        $rekomendasiIndikator = collect($hasilPerIndikator)
            ->filter(fn($item) => $item['snorm_de_boer'] < 70)
            ->map(function ($item) {
                $kpi = KPI::with(['scor', 'gscor'])->where('indikator', $item['indikator'])->first();

                return [
                    'indikator' => $item['indikator'],
                    'rekomendasi' => $kpi->scor->rekomendasi_bawaan ?? ($kpi->gscor->rekomendasi_bawaan ?? '-'),
                ];
            })
            ->values();

        return Pdf::loadView('cetak_pdf', [
            'riwayat' => $riwayat,
            'hasilPerIndikator' => $hasilPerIndikator,
            'rekomendasiIndikator' => $rekomendasiIndikator,
        ])
            ->setPaper('a4', 'portrait')
            ->stream("Laporan_Riwayat_{$riwayat->id}.pdf");
    }
}
