<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    function index()
    {
        return view('manager/index');
    }

    function perencanaan()
    {
        return view('manager/perencanaan');
    }

    function pengadaan()
    {
        return view('manager/pengadaan');
    }

    function produksi()
    {
        return view('manager/produksi');
    }

    function distribusi()
    {
        return view('manager/distribusi');
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
