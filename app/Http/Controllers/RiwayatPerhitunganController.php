<?php

namespace App\Http\Controllers;

use App\Models\GSCOR;
use App\Models\KPI;
use App\Models\NilaiAkhirSCM;
use App\Models\RiwayatPerhitungan;
use App\Models\SCOR;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class RiwayatPerhitunganController extends Controller
{

    private function normalizeString($string)
    {
        return strtolower(trim(preg_replace('/\s+/', ' ', str_replace(
            ['–', '’', '‘', '“', '”', '″', '′', '´', '‐', '‑'],
            ['-', "'", "'", '"', '"', '"', "'", "'", '-', '-'],
            $string
        ))));
    }

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

        return redirect()->route('riwayat.index')->with('success', 'Hasil Perhitungan Berhasil Disimpan Sebagai Riwayat Perhitungan.');
    }

    public function destroy($id)
    {
        RiwayatPerhitungan::destroy($id);
        return back()->with('success', 'Riwayat perhitungan berhasil dihapus.');
    }

    public function show($id)
    {
        $riwayats = RiwayatPerhitungan::latest()->get();

        $allScor = SCOR::all()->keyBy(function ($item) {
            return $this->normalizeString($item->indikator);
        });

        $allGscor = GSCOR::all()->keyBy(function ($item) {
            return $this->normalizeString($item->indikator);
        });

        foreach ($riwayats as $riwayat) {
            $rekomendasiIndikator = [];

            if ($riwayat->hasil_per_indikator) {
                $hasil = json_decode($riwayat->hasil_per_indikator, true);

                foreach ($hasil as $item) {
                    if (isset($item['snorm_de_boer']) && $item['snorm_de_boer'] < 70) {
                        $key = $this->normalizeString($item['indikator']);
                        $sumber = $allScor[$key] ?? $allGscor[$key] ?? null;

                        $rekomendasiIndikator[] = [
                            'indikator' => $item['indikator'],
                            'rekomendasi' => $sumber->rekomendasi_bawaan ?? '[Rekomendasi tidak ditemukan]',
                        ];
                    }
                }
            }

            $riwayat->rekomendasi_indikator = $rekomendasiIndikator;
        }

        return view('riwayat.index', compact('riwayats'));
    }

    public function cetakPDF($id)
    {
        $riwayat = RiwayatPerhitungan::findOrFail($id);

        // Decode hasil_per_indikator
        $hasilPerIndikator = is_string($riwayat->hasil_per_indikator)
            ? json_decode($riwayat->hasil_per_indikator, true)
            : $riwayat->hasil_per_indikator;

        // Urutan variabel
        $urutanVariabel = ['Plan', 'Make', 'Source', 'Deliver', 'Return'];

        // Sorting hasil_per_indikator
        usort($hasilPerIndikator, function ($a, $b) use ($urutanVariabel) {
            return array_search($a['variabel'], $urutanVariabel) <=> array_search($b['variabel'], $urutanVariabel);
        });

        // Ambil rekomendasi perbaikan berdasarkan nilai snorm < 70 dan urutkan juga
        $rekomendasiIndikator = collect($hasilPerIndikator)
            ->filter(fn($item) => $item['snorm_de_boer'] < 70)
            ->map(function ($item) {
                $kpi = KPI::with(['scor', 'gscor'])->where('indikator', $item['indikator'])->first();

                return [
                    'variabel' => $item['variabel'],
                    'indikator' => $item['indikator'],
                    'rekomendasi' => $kpi->scor->rekomendasi_bawaan ?? ($kpi->gscor->rekomendasi_bawaan ?? '-'),
                ];
            })
            ->sortBy(fn($item) => array_search($item['variabel'], $urutanVariabel))
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
