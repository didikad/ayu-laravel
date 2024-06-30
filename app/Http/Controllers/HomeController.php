<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galery;
use App\Models\Reservasi;

class HomeController extends Controller
{
    public function index()
    {
        $galery = Galery::where('type', 'post')->get();

        $galery->each(function ($item) {
            $agenda = Reservasi::find($item->agenda_id);
        
            if ($agenda) {
                $item->topik = $agenda->topik;
            }
        });
        return view('home', compact('galery'));
    }

    public function jadwal()
    {
        return view('jadwal');
    }

    public function galeri()
    {
        $galery = Galery::where('type', 'post')->get();

        $galery->each(function ($item) {
            $agenda = Reservasi::find($item->agenda_id);
        
            if ($agenda) {
                $item->topik = $agenda->topik;
            }
        });
        return view('galeri', compact('galery'));
    }

    public function peta()
    {
        return view('peta');
    }
}
