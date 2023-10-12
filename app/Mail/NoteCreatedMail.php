<?php

namespace App\Mail;

use App\Models\Note;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NoteCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Note $note)
    {

    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Note Created',
        );

        /*
        Cette méthode retourne un objet Envelope, qui est utilisé pour spécifier
        les informations de base de l'e-mail, telles que le sujet.
        */
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.note-created',
        );

        /*
        Cette méthode retourne un objet Content, qui est utilisé pour spécifier
        le contenu de l'e-mail. Ici, le contenu de l'e-mail est généré à
        partir d'une vue nommée 'emails.note-created'
        */
    }

    public function attachments(): array
    {
        return [];

        // Cette méthode retourne un tableau attachments (pièces jointes) à inclure dans l'e-mail.
    }
}
