<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function devoluciones()
    {
        return view('pages.devoluciones');
    }

    public function envios()
    {
        return view('pages.envios');
    }

    public function tallas()
    {
        return view('pages.tallas');
    }

    public function contacto()
    {
        return view('pages.contacto');
    }

    public function nosotros()
    {
        return view('pages.nosotros');
    }

    public function editorial()
    {
        return view('pages.editorial');
    }

    public function favoritos()
    {
        return view('pages.favoritos');
    }
}
