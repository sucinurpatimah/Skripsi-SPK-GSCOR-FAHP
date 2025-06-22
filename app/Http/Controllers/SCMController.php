<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SCMController extends Controller
{
    function perencanaan()
    {
        return view('admin/perencanaan');
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
