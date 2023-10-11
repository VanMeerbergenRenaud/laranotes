<?php

namespace App\Http\Controllers;

use App\Events\NoteCreatedEvent;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Mail\NoteCreatedMail;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Mockery\Matcher\Not;

class NotesController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        /*$user = auth()->user(); idem */
//        $notes = $user->notes; // CMD + clic sur note
        $user->load('notes'); // Charge toutes les données de la requête et ça permet d'avoir le user et ses notes

        $heading = 'Note of ' . $user->name;

        // return Note::all(); // retourne toutes les notes de la db
        // return $user->notes()->first(); // reprend le 1er élément de la requête du user
        // return $user->first();  // reprend le 1er élément du tableau entier Notes du user

        return view('notes.index', compact('heading', 'user'));
    }

    public function create()
    {
        $heading = 'Create a note';
        return view('notes.create', compact('heading'));
    }

    public function store(StoreNoteRequest $request): RedirectResponse
    {
        /*
        $validated = $request->validate([
            'description' => 'required',
            'image_url' => 'required',
            'user_id' => 'exists:users,id',
        ]);
        */

        /*$description = $validated('description');*/

        /*
        $description = $request->input('description');
        $note = new Note();
        $note->description = $description;
        $note->image_url = '';
        $note->user_id = User::whereEmail('renaud.vmb@gmail.com')->first()->id;
        $note->save();
        */

        /*
        $image_url = '';
        $user_id = 21;
        Note::create(compact('description', 'user_id', 'image_url'));
        */

        // $validated['user_id'] = Auth::id();
        // Note::create($validated);

        $note = Auth::user()->notes()->save(new Note($request->validated())); // https://laravel.com/docs/10.x/eloquent-relationships#inserting-and-updating-related-models

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
