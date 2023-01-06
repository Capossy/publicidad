<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        return view('pag.index');
    }
    public function aboutus()
    {
        return view('pag.about');
    }
    public function contactenos()
    {
        return view('pag.contact');
    }
    public function canales()
    {
        return view('pag.canales');
    }
}