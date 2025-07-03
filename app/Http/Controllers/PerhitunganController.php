<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    function perhitungan()
    {
        return view('admin/perhitungan');
    }

    function pairwise()
    {
        return view('admin/pairwise');
    }

    function konsistensi()
    {
        return view('admin/konsistensi');
    }

    function snorm()
    {
        return view('admin/pairwise');
    }

    function nilaiAkhir()
    {
        return view('admin/nilaiAkhir');
    }
}
