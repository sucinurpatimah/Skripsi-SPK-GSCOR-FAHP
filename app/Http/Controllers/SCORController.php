<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SCORController extends Controller
{
    function index()
    {
        return view('admin/scor');
    }
}
