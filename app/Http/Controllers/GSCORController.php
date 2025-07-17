<?php

namespace App\Http\Controllers;

use App\Models\GSCOR;
use Illuminate\Http\Request;

class GSCORController extends Controller
{
    function index()
    {
        $dataGscor = GSCOR::orderByRaw("FIELD(variabel, 'Plan', 'Source', 'Make', 'Deliver', 'Return')")->get();
        return view('admin/gscor', compact('dataGscor'));
    }

    public function storeGscor(Request $request)
    {
        $request->validate([
            'variabel' => 'required|string|in:Plan,Source,Make,Deliver,Return',
            'atribut' => 'required|string|in:Reliability,Responsiveness,Sustainability,Flexibility,Cost,Asset Management',
            'indikator' => 'required|string|min:3',
            'keterangan' => 'nullable|string',
            'rekomendasi_bawaan' => 'nullable|string',
        ]);

        GSCOR::create([
            'variabel' => $request->variabel,
            'atribut' => $request->atribut,
            'indikator' => $request->indikator,
            'keterangan' => $request->keterangan,
            'rekomendasi_bawaan' => $request->rekomendasi_bawaan,
        ]);

        return redirect()->route('gscor')->with('success', 'Data berhasil ditambahkan.');
    }

    public function updateGscor(Request $request, $id)
    {
        $request->validate([
            'variabel' => 'required|string|in:Plan,Source,Make,Deliver,Return',
            'atribut' => 'required|string|in:Reliability,Responsiveness,Sustainability,Flexibility,Cost,Asset Management',
            'indikator' => 'required|string|min:3',
            'keterangan' => 'nullable|string',
            'rekomendasi_bawaan' => 'nullable|string',
        ]);

        $data = GSCOR::findOrFail($id);
        $data->update([
            'variabel' => $request->variabel,
            'atribut' => $request->atribut,
            'indikator' => $request->indikator,
            'keterangan' => $request->keterangan,
            'rekomendasi_bawaan' => $request->rekomendasi_bawaan,
        ]);

        return redirect()->route('gscor')->with('success', 'Data berhasil diperbarui.');
    }

    public function deleteGscor($id)
    {
        $data = GSCOR::findOrFail($id);
        $data->delete();

        return redirect()->route('gscor')->with('success', 'Data berhasil dihapus.');
    }
}
