<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    public function index()
    {
        $heading = 'Listes des utilisateurs';

        $users = User::all();

        return view('pages.users.index', compact('heading', 'users'));
    }

    public function create()
    {
        // pas nécessaire
    }

    public function store()
    {
        // pas nécessaire
    }

    public function show(User $user) // Route model binding de Laravel
    {
        $heading = 'See you admin account/profile';

        if (!Gate::allows('manage-users')) {
            abort(403);
        }

        return view('pages.users.show', compact('heading', 'user'));
    }

    public function edit()
    {

    }


    public function update()
    {

    }

    public function destroy()
    {

    }
}
