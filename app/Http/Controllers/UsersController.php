<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
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

        if (!Gate::allows('manage-users', $user)) {
            abort(403);
        }

        return view('pages.users.show', compact('heading', 'user'));
    }

    public function edit(User $user)
    {
        if (!Gate::allows('manage-users', $user)) {
            abort(403);
        }

        $heading = 'Edit your profil';

        return view('pages.users.edit', compact('heading', 'user'));
    }


    public function update(UpdateUserRequest $request, User $user)
    {
        if (!Gate::allows('manage-users', $user)) {
            abort(403);
        }

        $user->update($request->validated());

        return redirect('/users/' . $user->id);
    }

    public function destroy(User $user)
    {
        if (!Gate::allows('manage-users', $user)) {
            abort(403);
        }

        $user->update(['suspended' => true]); // Compte suspendu

        return redirect('/users');
    }

    public function unsuspend(User $user)
    {
        if (!Gate::allows('manage-users', $user)) {
            abort(403);
        }

        $user->update(['suspended' => false]); // Réactivation du compte

        return redirect('/users');
    }
}
