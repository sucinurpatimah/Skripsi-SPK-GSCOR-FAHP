<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GSCORController extends Controller
{
    function index()
    {
        return view('admin/gscor');
    }
}
