<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan;
use App\Models\Perencanaan;
use App\Models\Produksi;
use Illuminate\Http\Request;

class SCMController extends Controller
{
    //Kelola Data Perencanaan
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

    //Kelola Data Pengadaan
    function pengadaan()
    {
        $dataPengadaan = Pengadaan::all();
        return view('admin/pengadaan', compact('dataPengadaan'));
    }

    public function storePengadaan(Request $request)
    {
        $request->validate([
            'bahan_baku' => 'required|string|max:255',
            'pewarna' => 'nullable|string|max:255',
            'supplier_iso' => 'nullable|string|max:255',
        ]);

        Pengadaan::create([
            'bahan_baku' => $request->bahan_baku,
            'pewarna' => $request->pewarna,
            'supplier_iso' => $request->supplier_iso,
        ]);

        return redirect()->route('pengadaan')->with('success', 'Data berhasil ditambahkan.');
    }

    public function updatePengadaan(Request $request, $id)
    {
        $request->validate([
            'bahan_baku' => 'required|string|max:255',
            'pewarna' => 'nullable|string|max:255',
            'supplier_iso' => 'nullable|string|max:255',
        ]);

        $data = Pengadaan::findOrFail($id);
        $data->update([
            'bahan_baku' => $request->bahan_baku,
            'pewarna' => $request->pewarna,
            'supplier_iso' => $request->supplier_iso,
        ]);

        return redirect()->route('pengadaan')->with('success', 'Data berhasil diperbarui.');
    }

    public function deletePengadaan($id)
    {
        $data = Pengadaan::findOrFail($id);
        $data->delete();

        return redirect()->route('pengadaan')->with('success', 'Data berhasil dihapus.');
    }

    // Kelola Data Produksi
    function produksi()
    {
        $dataProduksi = Produksi::all();
        return view('admin/produksi', compact('dataProduksi'));
    }

    public function storeProduksi(Request $request)
    {
        $request->validate([
            'listrik' => 'required|numeric|min:0',
            'air' => 'nullable|numeric|min:0',
            'hasil_produksi' => 'nullable|numeric|min:0',
            'sampah' => 'nullable|numeric|min:0',
        ]);

        Produksi::create([
            'listrik' => $request->listrik,
            'air' => $request->air,
            'hasil_produksi' => $request->hasil_produksi,
            'sampah' => $request->sampah,
        ]);

        return redirect()->route('produksi')->with('success', 'Data berhasil ditambahkan.');
    }

    //Kelola Data Distribusi
    function distribusi()
    {
        return view('admin/distribusi');
    }

    function pengembalian()
    {
        return view('admin/pengembalian');
    }
}
