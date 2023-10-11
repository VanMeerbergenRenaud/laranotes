<?php

namespace App\Events;

use App\Models\Note;
use Illuminate\Foundation\Events\Dispatchable;

class NoteCreatedEvent
{
    use Dispatchable;

    public function __construct(public Note $note)
    {

    }
}
