<?php

namespace App\Http\Controllers;

use App\Models\Distribusi;
use App\Models\GSCOR;
use App\Models\Pengadaan;
use App\Models\Pengembalian;
use App\Models\Perencanaan;
use App\Models\Produksi;
use App\Models\SCOR;
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
        $dataPengembalian = Pengembalian::all();
        return view('manager/pengembalian', compact('dataPengembalian'));
    }

    function scor()
    {
        $dataScor = SCOR::all();
        return view('manager/scor', compact('dataScor'));
    }

    function gscor()
    {
        $dataGscor = GSCOR::all();
        return view('manager/gscor', compact('dataGscor'));
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
