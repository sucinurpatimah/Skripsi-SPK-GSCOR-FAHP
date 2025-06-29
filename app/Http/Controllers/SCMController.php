<?php

namespace App\Http\Controllers;

use App\Models\Perencanaan;
use Illuminate\Http\Request;

class SCMController extends Controller
{
    function perencanaan()
    {
        $dataPerencanaan = Perencanaan::all();
        return view('admin/perencanaan', compact('dataPerencanaan'));
    }

    function storePerencanaan(Request $request)
    {
        $request->validate([
            'tahun' => 'required|integer|min:2000|max:2100',
            'bulan' => 'required|string',
            'permintaan' => 'required|numeric|min:0',
            'jumlah_pekerja' => 'required|integer|min:0',
        ]);

        Perencanaan::create([
            'tahun' => $request->tahun,
            'bulan' => $request->bulan,
            'permintaan' => $request->permintaan,
            'jumlah_pekerja' => $request->jumlah_pekerja,
        ]);

        return redirect()->route('perencanaan')->with('success', 'Data berhasil ditambahkan.');
    }

    public function updatePerencanaan(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required|integer|min:2000|max:2100',
            'bulan' => 'required|string',
            'permintaan' => 'required|numeric|min:0',
            'jumlah_pekerja' => 'required|integer|min:0',
        ]);

        $data = Perencanaan::findOrFail($id);
        $data->update([
            'tahun' => $request->tahun,
            'bulan' => $request->bulan,
            'permintaan' => $request->permintaan,
            'jumlah_pekerja' => $request->jumlah_pekerja,
        ]);

        return redirect()->route('perencanaan')->with('success', 'Data berhasil diperbarui.');
    }

    public function deletePerencanaan($id)
    {
        $data = Perencanaan::findOrFail($id);
        $data->delete();

        return redirect()->route('perencanaan')->with('success', 'Data berhasil dihapus.');
    }

    function pengadaan()
    {
        return view('admin/pengadaan');
    }

    function produksi()
    {
        return view('admin/produksi');
    }

    function distribusi()
    {
        return view('admin/distribusi');
    }

    function pengembalian()
    {
        return view('admin/pengembalian');
    }
}
