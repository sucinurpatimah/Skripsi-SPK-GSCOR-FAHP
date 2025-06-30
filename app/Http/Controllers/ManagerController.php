<?php

namespace App\Http\Controllers;

use App\Models\Distribusi;
use App\Models\Pengadaan;
use App\Models\Perencanaan;
use App\Models\Produksi;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    function index()
    {
        return view('manager/index');
    }

    function perencanaan()
    {
        $dataPerencanaan = Perencanaan::all();
        return view('manager/perencanaan', compact('dataPerencanaan'));
    }

    function pengadaan()
    {
        $dataPengadaan = Pengadaan::all();
        return view('manager/pengadaan', compact('dataPengadaan'));
    }

    function produksi()
    {
        $dataProduksi = Produksi::all();
        return view('manager/produksi', compact('dataProduksi'));
    }

    function distribusi()
    {
        $dataDistribusi = Distribusi::all();
        return view('manager/distribusi', compact('dataDistribusi'));
    }

    function pengembalian()
    {
        return view('manager/pengembalian');
    }

    function scor()
    {
        return view('manager/scor');
    }

    function gscor()
    {
        return view('manager/gscor');
    }

    function kpi()
    {
        return view('manager/kpi');
    }

    function laporan()
    {
        return view('manager/laporan');
    }
}
