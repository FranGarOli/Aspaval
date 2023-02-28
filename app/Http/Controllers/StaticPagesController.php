<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    //terminos y condiciones
    public function politicas()
    {
        return view('politicas');
    }

    //contacto
    public function contacto()
    {
        return view('contacto');
    }

    //donde estamos
    public function localizacion()
    {
        return view('localizacion');
    }
}
