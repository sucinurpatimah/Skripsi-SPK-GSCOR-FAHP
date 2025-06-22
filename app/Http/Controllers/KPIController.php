<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KPIController extends Controller
{
    function index()
    {
        return view('admin/kpi');
    }

    function perhitungan()
    {
        return view('admin/perhitungan');
    }
}
