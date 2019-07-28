<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $titles = [
            'Creunite',
            'Who we are',
            'Get in touch'
        ];
        return view('welcome', [
            'titles' => $titles
        ]);
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
