<?php

namespace App\Http\Controllers;

use App\Events\NoteCreatedEvent;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Models\Note;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class NotesController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $user->load('notes');

        $heading = 'Note of ' . $user->name;

        return view('notes.index', compact('heading', 'user'));
    }

    public function create()
    {
        $heading = 'Create a note';
        return view('notes.create', compact('heading'));
    }

    public function store(StoreNoteRequest $request): RedirectResponse
    {
        $note = Auth::user()->notes()->save(new Note($request->validated())); // https://laravel.com/docs/10.x/eloquent-relationships#inserting-and-updating-related-models

        $request->file('image_url')->store('img');

        NoteCreatedEvent::dispatch($note);

        return to_route('notes.index');
    }

    public function show(Note $note) // Route model binding de Laravel
    {
        if (!Gate::allows('handle-note', $note)) {
            abort(403);
        }

        $heading = 'One note';
        $note->load('user');

        return view('notes.show', compact('heading', 'note'));
    }

    public function edit(Note $note)
    {
        if (!Gate::allows('handle-note', $note)) {
            abort(403);
        }
        $heading = 'Edit your note';
        return view('notes.edit', compact('heading', 'note'));
    }

    public function update(UpdateNoteRequest $request, Note $note)
    {
        if (!Gate::allows('handle-note', $note)) {
            abort(403);
        }
        $note->update($request->validated());
        return redirect('/notes/' . $note->id);
    }

    public function destroy(Note $note)
    {
        if (!Gate::allows('handle-note', $note)) {
            abort(403);
        }
        $note->delete();
        return redirect('/notes');
    }
}
