<?php

namespace App\Listeners;

use App\Events\NoteCreatedEvent;
use App\Jobs\SendNoteCreationMailJob;
use App\Mail\NoteCreatedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;

class NoteCreatedListener
{
    public function __construct()
    {
    }

    public function handle(NoteCreatedEvent $event): void
    {
//        logger($event->note->description);

        // Ajouter l'envoie de mail à la file d'attente == dispatch du job SendNoteCreationMailJob
        SendNoteCreationMailJob::dispatch($event->note, request()->user());

//        Mail::to(request()->user())->send(new NoteCreatedMail($event->note));
    }
}
