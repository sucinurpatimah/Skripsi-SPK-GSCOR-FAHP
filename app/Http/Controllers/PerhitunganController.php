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
    public function pairwise()
    {
        $kpis = KPI::orderByRaw("FIELD(variabel, 'Plan', 'Source', 'Make', 'Deliver', 'Return')")
            ->orderBy('id')
            ->get();

        if ($kpis->count() < 5) {
            return redirect()->route('kpi')->with('error', 'Minimal harus ada 5 indikator KPI.');
        }

        // Label
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

        // Ambil matriks pairwise
        $values = [];
        foreach ($kpis as $row) {
            $baris = [];
            foreach ($kpis as $col) {
                $nilai = DB::table('pairwise_matrix')
                    ->where('indikator1_id', $row->id)
                    ->where('indikator2_id', $col->id)
                    ->value('nilai');
                $baris[] = $nilai ?: 0;
            }
            $values[] = $baris;
        }

        // Hitung total kolom
        $totals = [];
        foreach (range(0, count($kpis) - 1) as $c) {
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
                $nRow[] = $totals[$j] != 0 ? $v / $totals[$j] : 0;
            }
            $normalized[] = $nRow;
        }

        // Hitung Bobot
        $weights = [];
        foreach ($normalized as $baris) {
            $weights[] = array_sum($baris) / count($baris);
        }

        // Kosongkan tabel dulu supaya tidak duplikat
        DB::table('normalisasi_matriks')->truncate();

        // Simpan ke DB
        foreach ($normalized as $i => $baris) {
            foreach ($baris as $j => $nilai) {
                DB::table('normalisasi_matriks')->insert([
                    'indikator1_id' => $kpis[$i]->id,
                    'indikator2_id' => $kpis[$j]->id,
                    'nilai' => $nilai,
                    'bobot_prioritas' => $i === $j ? $weights[$i] : null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        return redirect()->route('pairwise.show')->with('success', 'Normalisasi Matriks Berhasil Disimpan.');
    }

    public function showNormalized()
    {
        $kpis = KPI::orderByRaw("FIELD(variabel, 'Plan', 'Source', 'Make', 'Deliver', 'Return')")
            ->orderBy('id')
            ->get();

        // Label indikator
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

        // Ambil matriks pairwise
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

        // Ambil matriks normalisasi (jika ada)
        $normalized = [];
        $weights = [];
        $adaDataNormalisasi = DB::table('normalisasi_matriks')->count() > 0;
        if ($adaDataNormalisasi) {
            foreach ($kpis as $row) {
                $baris = [];
                foreach ($kpis as $col) {
                    $nilai = DB::table('normalisasi_matriks')
                        ->where('indikator1_id', $row->id)
                        ->where('indikator2_id', $col->id)
                        ->value('nilai');
                    $baris[] = $nilai;
                }
                $normalized[] = $baris;
            }
            foreach ($kpis as $kpi) {
                $bobot = DB::table('normalisasi_matriks')
                    ->where('indikator1_id', $kpi->id)
                    ->where('indikator2_id', $kpi->id)
                    ->value('bobot_prioritas');
                $weights[] = $bobot;
            }
        }

        return view('admin.pairwise', [
            'labels' => $labels,
            'values' => $values,
            'totals' => $totals,
            'normalized' => $normalized,
            'weights' => $weights
        ]);
    }

    function konsistensi()
    {
        return view('admin/konsistensi');
    }

    function snorm()
    {
        return view('admin/snorm');
    }

    function nilaiAkhir()
    {
        return view('admin/nilaiAkhir');
    }
}
