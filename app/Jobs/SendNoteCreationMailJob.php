<?php

namespace App\Jobs;

use App\Mail\NoteCreatedMail;
use App\Models\Note;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNoteCreationMailJob implements ShouldQueue
{
    // Ces traits permettent de fournir des fonctionnalités à la file d'attente
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public Note $note, public User $user)
    {
        /*
        Les objets Note et User sont nécessaires pour envoyer
        un e-mail de notification de création de note.

        Si votre tâche en file d'attente accepte un modèle Eloquent
        dans son constructeur, seul l'identifiant du modèle sera
        sérialisé dans la file d'attente.
        */
    }

    public function handle(): void
    {
        Mail::to($this->user)->send(new NoteCreatedMail($this->note));

        /*
        Cette méthode est appelée lorsqu'un job en file d'attente est exécuté.
        Dans ce cas, la méthode handle envoie un e-mail à l'utilisateur spécifié
        ($this->user) pour informer de la création de la note. Ensuite, on
        utilise la classe NoteCreatedMail pour composer l'e-mail.

        La méthode to de Mail permet de spécifier le destinataire
        de l'e-mail, qui est l'utilisateur associé à la note.
        */
    }
}
