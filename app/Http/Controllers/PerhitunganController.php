<?php

namespace App\Http\Controllers;

use App\Models\KPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerhitunganController extends Controller
{
    // function perhitungan()
    // {
    //     return view('admin/perhitungan');
    // }

    //Tahap Perhitungan Matriks Perbandingan Berpasangan
    public function generatePairwise()
    {
        $kpis = KPI::all();
        $count = $kpis->count();

        if ($count < 5) {
            return redirect()->route('kpi')->with('error', 'Minimal harus ada 5 indikator KPI.');
        }

        // Kosongkan tabel sebelumnya
        DB::table('pairwise_matrix')->truncate();

        // Masukkan nilai default matriks perbandingan
        foreach ($kpis as $i => $row) {
            foreach ($kpis as $j => $col) {
                $nilai = null;

                if ($i === $j) {
                    $nilai = 1;
                } else {
                    if ($col->skor && $col->skor != 0) {
                        $nilai = $row->skor / $col->skor;
                    }
                }

                DB::table('pairwise_matrix')->insert([
                    'indikator1_id' => $row->id,
                    'indikator2_id' => $col->id,
                    'nilai' => $nilai,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        return redirect()->route('perhitungan.pairwise')->with('success', 'Matriks Pairwise berhasil dibuat.');
    }

    public function pairwise()
    {
        $kpis = KPI::orderByRaw("FIELD(variabel, 'Plan', 'Source', 'Make', 'Deliver', 'Return')")->orderBy('id')->get();

        if ($kpis->count() < 5) {
            return redirect()->route('kpi')->with('error', 'Minimal harus ada 5 indikator KPI.');
        }

        // Label singkatan otomatis
        $singkatanMap = [
            'Plan' => 'P',
            'Source' => 'S',
            'Make' => 'M',
            'Deliver' => 'D',
            'Return' => 'R',
        ];
        $labelCount = [];
        $labels = [];
        foreach ($kpis as $kpi) {
            $s = $singkatanMap[$kpi->variabel] ?? substr($kpi->variabel, 0, 1);
            $labelCount[$s] = ($labelCount[$s] ?? 0) + 1;
            $labels[$kpi->id] = $s . $labelCount[$s];
        }

        // Ambil matriks nilai
        $values = [];
        foreach ($kpis as $row) {
            $baris = [];
            foreach ($kpis as $col) {
                $nilai = DB::table('pairwise_matrix')
                    ->where('indikator1_id', $row->id)
                    ->where('indikator2_id', $col->id)
                    ->value('nilai');
                $baris[] = $nilai !== null ? $nilai : '-';
            }
            $values[] = $baris;
        }

        // Hitung total kolom
        $totals = [];
        for ($c = 0; $c < count($kpis); $c++) {
            $sum = 0;
            foreach ($values as $r) {
                $sum += is_numeric($r[$c]) ? $r[$c] : 0;
            }
            $totals[] = $sum;
        }

        return view('admin.pairwise', compact('kpis', 'labels', 'values', 'totals'));
    }

    public function normalisasiPairwise()
    {
        $kpis = KPI::orderByRaw("FIELD(variabel, 'Plan', 'Source', 'Make', 'Deliver', 'Return')")
            ->orderBy('id')
            ->get();

        if ($kpis->count() < 5) {
            return redirect()->route('kpi')->with('error', 'Minimal harus ada 5 indikator KPI.');
        }

        // Label singkatan indikator
        $singkatanMap = [
            'Plan' => 'P',
            'Source' => 'S',
            'Make' => 'M',
            'Deliver' => 'D',
            'Return' => 'R',
        ];
        $labelCount = [];
        $labels = [];
        foreach ($kpis as $kpi) {
            $s = $singkatanMap[$kpi->variabel] ?? substr($kpi->variabel, 0, 1);
            $labelCount[$s] = ($labelCount[$s] ?? 0) + 1;
            $labels[$kpi->id] = $s . $labelCount[$s];
        }

        // Ambil Matriks dari tabel diatasnya
        $values = [];
        foreach ($kpis as $row) {
            $baris = [];
            foreach ($kpis as $col) {
                $nilai = DB::table('pairwise_matrix')
                    ->where('indikator1_id', $row->id)
                    ->where('indikator2_id', $col->id)
                    ->value('nilai');
                $baris[] = $nilai !== null ? $nilai : 0;
            }
            $values[] = $baris;
        }

        // Hitung total kolom
        $totals = [];
        for ($c = 0; $c < count($kpis); $c++) {
            $sum = 0;
            foreach ($values as $r) {
                $sum += $r[$c];
            }
            $totals[] = $sum;
        }

        // Normalisasi Matriks
        $normalized = [];
        foreach ($values as $baris) {
            $nRow = [];
            foreach ($baris as $j => $v) {
                $norm = $totals[$j] != 0 ? $v / $totals[$j] : 0;
                $nRow[] = $norm;
            }
            $normalized[] = $nRow;
        }

        // Hitung Bobot Prioritas (rata-rata tiap baris)
        $weights = [];
        foreach ($normalized as $baris) {
            $avg = count($baris) > 0 ? array_sum($baris) / count($baris) : 0;
            $weights[] = $avg;
        }

        //Simpan hasil normalisasi permanen (biar ada di db),
        // jadi ga hilang kalo pindah halaman atau logout
        // DB::table('normalized_matrixes')->truncate();
        // foreach ($kpis as $i => $row) {
        //     foreach ($kpis as $j => $col) {
        //         DB::table('normalized_matrixes')->insert([
        //             'indikator1_id' => $row->id,
        //             'indikator2_id' => $col->id,
        //             'nilai' => $normalized[$i][$j],
        //             'bobot_prioritas' => $i === $j ? $weights[$i] : null,
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ]);
        //     }
        // }
        return view('admin/pairwise', [
            'kpis' => $kpis,
            'labels' => $labels,
            'values' => $values,
            'totals' => $totals,
            'normalized' => $normalized,
            'weights' => $weights,
        ]);
    }

    function konsistensi()
    {
        return view('admin/konsistensi');
    }

    function snorm()
    {
        return view('admin/pairwise');
    }

    function nilaiAkhir()
    {
        return view('admin/nilaiAkhir');
    }
}
