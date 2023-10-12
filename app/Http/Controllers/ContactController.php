<?php

namespace App\Http\Controllers;

class ContactController extends Controller
{
    public function index()
    {
        $heading = 'Contact';

        return view('pages.contact', compact('heading'));
    }
}
