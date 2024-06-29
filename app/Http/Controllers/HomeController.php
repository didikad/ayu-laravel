<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function jadwal()
    {
        return view('jadwal');
    }

    public function galeri()
    {
        return view('galeri');
    }

    public function peta()
    {
        return view('peta');
    }
}
