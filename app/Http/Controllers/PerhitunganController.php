<?php

namespace App\Http\Controllers;

use App\Models\KinerjaIndikator;
use App\Models\KPI;
use App\Models\NilaiAkhirSCM;
use App\Models\UjiKonsistensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerhitunganController extends Controller
{
    // function perhitungan()
    // {
    //     return view('admin/perhitungan');
    // }

    public function pairwise()
    {
        $kpis = KPI::orderByRaw("FIELD(variabel, 'Plan', 'Source', 'Make', 'Deliver', 'Return')")
            ->orderBy('id')
            ->get();

        if ($kpis->count() < 5) {
            return redirect()->route('kpi')->with('error', 'Minimal harus ada 5 indikator KPI.');
        }

        // Buat label
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

        // Hitung & simpan nilai ke pairwise_matrix
        foreach ($kpis as $row) {
            foreach ($kpis as $col) {
                $nilai = ($col->skor != 0) ? $row->skor / $col->skor : 0;

                // Simpan ke database
                DB::table('pairwise_matrix')->updateOrInsert(
                    [
                        'indikator1_id' => $row->id,
                        'indikator2_id' => $col->id
                    ],
                    [
                        'nilai' => round($nilai, 4),
                        'updated_at' => now(),
                        'created_at' => now()
                    ]
                );
            }
        }

        // Ambil ulang nilai dari DB untuk ditampilkan
        $values = [];
        foreach ($kpis as $row) {
            $baris = [];
            foreach ($kpis as $col) {
                $nilai = DB::table('pairwise_matrix')
                    ->where('indikator1_id', $row->id)
                    ->where('indikator2_id', $col->id)
                    ->value('nilai');
                $baris[$col->id] = $nilai ?? '-';
            }
            $values[$row->id] = $baris;
        }

        // Hitung total kolom
        $totals = [];
        foreach ($kpis as $col) {
            $sum = 0;
            foreach ($kpis as $row) {
                $sum += is_numeric($values[$row->id][$col->id]) ? $values[$row->id][$col->id] : 0;
            }
            $totals[$col->id] = round($sum, 4);
        }

        return view('admin.pairwise', compact('kpis', 'labels', 'values', 'totals'));
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

    //Proses Hitung Uji Konsistensi
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
            'lambda_max' => round($lambda_max, 10),
            'ci' => round($ci, 10),
            'ri' => $ri,
            'cr' => round($cr, 10),
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

    //Poses Hitung Normalisasi Snorm De Boer
    function snorm()
    {
        // Cek apakah sudah pernah dihitung
        $hasil = KinerjaIndikator::latest()->first();

        return view('admin/snorm', [
            'hasil' => $hasil
        ]);
    }

    public function Snormgenerate()
    {
        //Ambil Semua KPI
        $kpis = KPI::orderByRaw("FIELD(variabel, 'Plan', 'Source', 'Make', 'Deliver', 'Return')")
            ->orderBy('id')
            ->get();

        if ($kpis->isEmpty()) {
            return redirect()->back()->with('error', 'Data KPI belum tersedia.');
        }

        //Ambil Bobot Prioritas
        $bobot = DB::table('bobot_prioritas')->pluck('bobot_prioritas', 'indikator_id')->toArray();

        if (empty($bobot)) {
            return redirect()->back()->with('error', 'Bobot prioritas belum dihitung.');
        }

        //Inisialisasi Array untuk Nilai Kinerja
        $nilaiKinerjaArray = [];

        foreach ($kpis as $kpi) {
            // Ambil rata-rata skor kuesioner
            $skorRataRata = DB::table('kpi')
                ->where('id', $kpi->id)
                ->value('skor');

            if ($skorRataRata === null) {
                return redirect()->back()->with('error', "Skor rata-rata untuk indikator {$kpi->id} belum tersedia.");
            }

            // Ambil bobot prioritas
            $bobotPrioritas = $bobot[$kpi->id] ?? 0;

            if ($bobotPrioritas == 0) {
                return redirect()->back()->with('error', "Bobot prioritas untuk indikator {$kpi->id} belum tersedia atau bernilai nol.");
            }

            // Hitung nilai kinerja
            $nilaiKinerja = $skorRataRata * $bobotPrioritas;

            // Simpan sementara
            $nilaiKinerjaArray[] = [
                'kpi_id' => $kpi->id,
                'nilai_kinerja' => $nilaiKinerja,
            ];
        }

        // Hitung min dan max nilai kinerja
        $nilaiKinerjaValues = array_column($nilaiKinerjaArray, 'nilai_kinerja');
        $minNilai = min($nilaiKinerjaValues);
        $maxNilai = max($nilaiKinerjaValues);

        if ($maxNilai == $minNilai) {
            return redirect()->back()->with('error', 'Nilai maksimum dan minimum sama, Snorm De Boer tidak bisa dihitung.');
        }

        // Bersihkan tabel lama
        KinerjaIndikator::truncate();

        // Simpan ke database
        foreach ($nilaiKinerjaArray as $item) {
            // Rumus Snorm De Boer
            $epsilon = 0.0001;
            $snorm = (($item['nilai_kinerja'] - $minNilai + $epsilon) / ($maxNilai - $minNilai + $epsilon)) * 100;

            KinerjaIndikator::create([
                'kpi_id' => $item['kpi_id'],
                'nilai_kinerja' => $item['nilai_kinerja'],
                'snorm_de_boer' => $snorm,
            ]);
        }

        return redirect()->route('snorm.show')->with('success', 'Perhitungan Nilai Kinerja dan Normalisasi Snorm De Boer Berhasil.');
    }

    public function showSnorm()
    {
        $hasil = KinerjaIndikator::query()
            ->select('kinerja_indikator.*')
            ->join('kpi', 'kpi.id', '=', 'kinerja_indikator.kpi_id')
            ->orderByRaw("FIELD(kpi.variabel, 'Plan', 'Source', 'Make', 'Deliver', 'Return')")
            ->orderBy('kpi.id')
            ->with('kpi')
            ->get();

        return view('admin/snorm', compact('hasil'));
    }

    //Proses Perhitunngan Nilai Akhir SCM
    function nilaiAkhir()
    {
        $hasil = NilaiAkhirSCM::with('kpi.scor', 'kpi.gscor')
            ->join('kpi', 'nilai_akhir_scm.indikator_id', '=', 'kpi.id')
            ->orderByRaw("FIELD(kpi.variabel, 'Plan', 'Source', 'Make', 'Deliver', 'Return')")
            ->select('nilai_akhir_scm.*')
            ->get();
        $total = $hasil->sum('nilai_akhir');

        return view('admin/nilaiAkhir', compact('hasil', 'total'));
    }

    public function generateNilaiAkhir()
    {
        $indikator = KPI::with(['bobotPrioritas', 'kinerjaIndikator', 'scor', 'gscor'])->get();

        foreach ($indikator as $item) {
            if (!$item->bobotPrioritas || !$item->kinerjaIndikator) {
                return redirect()->back()->with('error', "Data tidak lengkap pada indikator ID {$item->id}");
            }
        }

        NilaiAkhirSCM::truncate();

        foreach ($indikator as $item) {
            $nilai = $item->bobotPrioritas->bobot_prioritas * $item->kinerjaIndikator->snorm_de_boer;

            NilaiAkhirSCM::create([
                'indikator_id' => $item->id,
                'bobot_prioritas' => $item->bobotPrioritas->bobot_prioritas,
                'snorm' => $item->kinerjaIndikator->snorm_de_boer,
                'nilai_akhir' => $nilai
            ]);
        }

        return redirect()->route('perhitungan.nilai-akhir')->with('success', 'Nilai Akhir SCM berhasil dihitung.');
    }

    // public function updateRekomendasi(Request $request, $id)
    // {
    //     $request->validate([
    //         'rekomendasi' => 'nullable|string'
    //     ]);

    //     $item = NilaiAkhirSCM::findOrFail($id);
    //     $item->rekomendasi = $request->rekomendasi;
    //     $item->save();

    //     return redirect()->route('perhitungan.nilai-akhir')->with('success', 'Rekomendasi berhasil diperbarui.');
    // }

    //Hitung Ulang
    public function resetPerhitungan()
    {
        // Hapus dari tabel anak dulu
        DB::table('pairwise_matrix')->delete();
        DB::table('normalisasi_matriks')->delete();
        DB::table('bobot_prioritas')->delete();
        DB::table('uji_konsistensi')->delete();
        DB::table('kinerja_indikator')->delete();
        DB::table('nilai_akhir_scm')->delete();

        // Lalu tabel kpi
        DB::table('kpi')->delete();

        // Kalau mau hapus histori juga:
        // DB::table('riwayat_perhitungan')->delete();

        return redirect()->route('kpi')->with('success', 'Perhitungan berhasil direset. Silakan mulai perhitungan baru.');
    }
}
