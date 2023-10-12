<?php

namespace App\Events;

use App\Models\Note;
use Illuminate\Foundation\Events\Dispatchable;

class NoteCreatedEvent
{
    use Dispatchable;

    public function __construct(public Note $note)
    {
        /*
        L'objectif principal de ce code est de créer une classe d'événement qui peut être utilisée
        pour signaler la création d'une note au sein de notre application de note.

        On peut ensuite déclencher cet événement à partir d'une action spécifique,
        comme la création d'une note, et écouter cet événement dans l'application
        (App\Listeners\NoteCreatedListener) pour répondre à cette création.

        Cela permet de découpler les différentes parties de l'application et d'ajouter
        des fonctionnalités réactives en réponse à des événements spécifiques.
         */
    }
}
