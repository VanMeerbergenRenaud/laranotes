<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        $heading = 'About';

        return view('pages.about', compact('heading'));
    }
}
