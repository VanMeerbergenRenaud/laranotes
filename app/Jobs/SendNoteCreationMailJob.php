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
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public Note $note, public User $user
    )
    {

    }

    public function handle(): void
    {
        Mail::to($this->user)->send(new NoteCreatedMail($this->note));
    }
}
