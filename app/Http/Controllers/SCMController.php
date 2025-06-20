<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SCMController extends Controller
{
    function perencanaan()
    {
        return view('admin/perencanaan');
    }
}
