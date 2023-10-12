<?php

namespace App\Listeners;

use App\Events\NoteCreatedEvent;
use App\Jobs\SendNoteCreationMailJob;

class NoteCreatedListener
{
    public function __construct()
    {
        /*
        Le constructeur est vide, ce qui signifie qu'il n'effectue aucune
        action particulière à la création de l'objet NoteCreatedListener.
        */
    }

    public function handle(NoteCreatedEvent $event): void
    {
        /* Ajouter l'envoi de mail à la file d'attente (travail asynchrone)

        2 arguments :
        - l'objet Note contenu dans l'événement $event
        - l'utilisateur actuel request()->user()
        */
        SendNoteCreationMailJob::dispatch($event->note, request()->user());

//        logger($event->note->description);
//        Mail::to(request()->user())->send(new NoteCreatedMail($event->note));
    }
}
