<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $heading = 'Listes des utilisateurs';

        $users = User::all();

        return view('pages.users', compact('heading', 'users'));
    }
}
