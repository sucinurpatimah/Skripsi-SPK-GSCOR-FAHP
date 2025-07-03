<?php

namespace App\Http\Controllers;

use App\Models\GSCOR;
use App\Models\KPI;
use App\Models\SCOR;
use Illuminate\Http\Request;

class KPIController extends Controller
{
    function index()
    {
        $dataKPI = KPI::all();
        return view('admin/kpi', compact('dataKPI'));
    }

    public function storeSelected(Request $request)
    {
        $selected = $request->input('selected', []);
        $kategori = $request->input('kategori', []);

        foreach ($selected as $id) {
            $data = null;
            $source = $kategori[$id] ?? 'SCOR';

            if ($source === 'Green SCOR') {
                $data = GSCOR::find($id);
            } elseif ($source === 'SCOR') {
                $data = SCOR::find($id);
            }

            if ($data) {
                KPI::create([
                    'variabel' => $data->variabel,
                    'atribut' => $data->atribut,
                    'indikator' => $data->indikator,
                    'keterangan' => $data->keterangan,
                    'kategori' => $source,
                ]);
            }
        }

        return redirect()->route('kpi')->with('success', 'Data KPI Berhasil Ditambahkan.');
    }

    public function updateSkor(Request $request, $id)
    {
        $skor = array_filter($request->input('skor'), function ($value) {
            return $value !== null && $value !== ''; // hanya ambil yang diisi
        });

        if (count($skor) < 1) {
            return back()->with('error', 'Minimal satu skor harus diisi.');
        }

        foreach ($skor as $s) {
            if (!is_numeric($s) || $s < 1 || $s > 5) {
                return back()->with('error', 'Skor harus bernilai antara 1 sampai 5.');
            }
        }

        $rataRata = collect($skor)->avg();

        $kpi = KPI::findOrFail($id);
        $kpi->skor = $rataRata;
        $kpi->save();

        return redirect()->route('kpi')->with('success', 'Skor rata-rata berhasil disimpan.');
    }

    public function deleteKpi($id)
    {
        $data = KPI::findOrFail($id);
        $data->delete();

        return redirect()->route('kpi')->with('success', 'Data berhasil dihapus.');
    }
}
