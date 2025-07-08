<?php

namespace App\Http\Controllers;

use App\Models\KPI;
use App\Models\UjiKonsistensi;
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

        return view('admin/pairwise', compact('kpis', 'labels', 'values', 'totals'));
    }

    public function normalisasiPairwise()
    {
        $kpis = KPI::orderByRaw("FIELD(variabel, 'Plan', 'Source', 'Make', 'Deliver', 'Return')")
            ->orderBy('id')
            ->get();

        if ($kpis->count() < 3) {
            return redirect()->route('kpi')->with('error', 'Minimal harus ada 3 indikator KPI.');
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

        // Kosongkan tabel normalisasi
        DB::table('normalisasi_matriks')->truncate();
        DB::table('bobot_prioritas')->truncate();

        // Simpan normalisasi matriks
        foreach ($normalized as $i => $baris) {
            foreach ($baris as $j => $nilai) {
                DB::table('normalisasi_matriks')->insert([
                    'indikator1_id' => $kpis[$i]->id,
                    'indikator2_id' => $kpis[$j]->id,
                    'nilai' => $nilai,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // Simpan bobot prioritas
        foreach ($kpis as $i => $kpi) {
            DB::table('bobot_prioritas')->insert([
                'indikator_id' => $kpi->id,
                'bobot_prioritas' => $weights[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('pairwise.show')->with('success', 'Normalisasi Matriks dan Bobot Prioritas berhasil disimpan.');
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
            $values[$row->id] = $baris;
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

        // Ambil matriks normalisasi
        $normalized = [];
        if (DB::table('normalisasi_matriks')->count() > 0) {
            foreach ($kpis as $row) {
                $baris = [];
                foreach ($kpis as $col) {
                    $nilai = DB::table('normalisasi_matriks')
                        ->where('indikator1_id', $row->id)
                        ->where('indikator2_id', $col->id)
                        ->value('nilai');
                    $baris[] = $nilai;
                }
                $normalized[$row->id] = $baris;
            }
        }

        // Ambil bobot prioritas dari tabel bobot_prioritas
        $weights = DB::table('bobot_prioritas')
            ->pluck('bobot_prioritas', 'indikator_id')
            ->toArray();

        return view('admin.pairwise', [
            'labels' => $labels,
            'values' => $values,
            'totals' => $totals,
            'normalized' => $normalized,
            'weights' => $weights
        ]);
    }

    public function konsistensi()
    {
        // Cek apakah sudah pernah dihitung
        $hasil = UjiKonsistensi::latest()->first();

        return view('admin/konsistensi', [
            'hasil' => $hasil
        ]);
    }

    public function ujiKonsistensi()
    {
        $kpis = KPI::orderByRaw("FIELD(variabel, 'Plan', 'Source', 'Make', 'Deliver', 'Return')")
            ->orderBy('id')
            ->get();

        $weights = DB::table('bobot_prioritas')
            ->pluck('bobot_prioritas', 'indikator_id')
            ->toArray();

        foreach ($kpis as $kpi) {
            if (!isset($weights[$kpi->id]) || $weights[$kpi->id] === null) {
                return redirect()->back()->with('error', "Bobot prioritas indikator ID {$kpi->id} tidak ditemukan.");
            }
        }

        $lambdas = [];

        foreach ($kpis as $kpi) {
            $indikator_i = $kpi->id;
            $sum_row = 0;

            foreach ($kpis as $kpi2) {
                $indikator_j = $kpi2->id;

                $value = DB::table('pairwise_matrix')
                    ->where('indikator1_id', $indikator_i)
                    ->where('indikator2_id', $indikator_j)
                    ->value('nilai') ?? 0;

                $sum_row += $value * $weights[$indikator_j];
            }

            if ($weights[$indikator_i] == 0) {
                return redirect()->back()->with('error', "Bobot prioritas indikator ID {$indikator_i} bernilai 0.");
            }

            $lambda_i = $sum_row / $weights[$indikator_i];
            $lambdas[] = $lambda_i;
        }

        $lambda_max = array_sum($lambdas) / count($lambdas);

        $n = count($kpis);
        $ci = ($lambda_max - $n) / ($n - 1);

        $ri_array = [
            1 => 0.00,
            2 => 0.00,
            3 => 0.58,
            4 => 0.90,
            5 => 1.12,
            6 => 1.24,
            7 => 1.32,
            8 => 1.41,
            9 => 1.45,
            10 => 1.49,
            11 => 1.51,
            12 => 1.48,
            13 => 1.56,
            14 => 1.57,
            15 => 1.59,
            16 => 1.60,
            17 => 1.61,
            18 => 1.62,
            19 => 1.63,
            20 => 1.64,
            21 => 1.65,
            22 => 1.66,
            23 => 1.67,
            24 => 1.68,
            25 => 1.69,
            26 => 1.70,
            27 => 1.71,
            28 => 1.72,
            29 => 1.73,
            30 => 1.74,
        ];
        $ri = $ri_array[$n] ?? 1.12;

        $cr = $ri != 0 ? $ci / $ri : 0;
        $status = $cr <= 0.1 ? 'Konsisten' : 'Tidak Konsisten';

        UjiKonsistensi::truncate();
        UjiKonsistensi::create([
            'lambda_max' => $lambda_max,
            'ci' => $ci,
            'ri' => $ri,
            'cr' => $cr,
            'status' => $status,
        ]);

        return redirect()->route('uji-konsistensi.show')->with('success', 'Uji Konsistensi berhasil dihitung.');
    }

    public function showUjiKonsistensi()
    {
        $hasil = UjiKonsistensi::latest()->first();

        return view('admin/konsistensi', [
            'hasil' => $hasil
        ]);
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
