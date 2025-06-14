<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        echo "Selamat Datang";
        echo "<br></br>";
        echo "<a href='/logout'> Logout </a>";
    }

    function admin()
    {
        return view('admin/index');
    }

    function manager()
    {
        echo "Selamat Datang di Halaman Manager";
        echo "<br></br>";
        echo "<a href='/logout'> Logout </a>";
    }
}
