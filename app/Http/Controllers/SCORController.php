<?php

namespace App\Http\Controllers;

use App\Models\SCOR;
use Illuminate\Http\Request;

class SCORController extends Controller
{
    function index()
    {
        $dataScor = SCOR::orderByRaw("FIELD(variabel, 'Plan', 'Source', 'Make', 'Deliver', 'Return')")->get();
        return view('admin/scor', compact('dataScor'));
    }

    public function storeScor(Request $request)
    {
        $request->validate([
            'variabel' => 'required|string|in:Plan,Source,Make,Deliver,Return',
            'atribut' => 'required|string|in:Reliability,Responsiveness,Agility,Sustainability,Cost,Asset Management',
            'indikator' => 'required|string|min:3',
            'keterangan' => 'nullable|string',
            'rekomendasi_bawaan' => 'nullable|string',
        ]);

        SCOR::create([
            'variabel' => $request->variabel,
            'atribut' => $request->atribut,
            'indikator' => $request->indikator,
            'keterangan' => $request->keterangan,
            'rekomendasi_bawaan' => $request->rekomendasi_bawaan,
        ]);

        return redirect()->route('scor')->with('success', 'Data berhasil ditambahkan.');
    }

    public function updateScor(Request $request, $id)
    {
        $request->validate([
            'variabel' => 'required|string|in:Plan,Source,Make,Deliver,Return',
            'atribut' => 'required|string|in:Reliability,Responsiveness,Sustainability,Flexibility,Cost,Asset Management',
            'indikator' => 'required|string|min:3',
            'keterangan' => 'nullable|string',
            'rekomendasi_bawaan' => 'nullable|string',
        ]);

        $data = SCOR::findOrFail($id);
        $data->update([
            'variabel' => $request->variabel,
            'atribut' => $request->atribut,
            'indikator' => $request->indikator,
            'keterangan' => $request->keterangan,
            'rekomendasi_bawaan' => $request->rekomendasi_bawaan,
        ]);

        return redirect()->route('scor')->with('success', 'Data berhasil diperbarui.');
    }

    public function deleteScor($id)
    {
        $data = SCOR::findOrFail($id);
        $data->delete();

        return redirect()->route('scor')->with('success', 'Data berhasil dihapus.');
    }
}
