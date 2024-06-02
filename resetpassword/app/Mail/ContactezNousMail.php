<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactezNousMail extends Mailable
{
    use Queueable, SerializesModels;

    private string $prenom;
    private string $nom;
    private string $telephone;
    private string $email;
    private string $emailMessage;

    /**
     * Create a new message instance.
     */
    public function __construct(string $prenom, string $nom, string $telephone, string $email, string $emailMessage)
    {
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->telephone = $telephone;
        $this->email = $email;
        $this->emailMessage= $emailMessage;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Message de '. strtoupper($this->nom) . ' ' . strtoupper($this->prenom),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'contactezNous.contactezNous',
            with:[
                "prenom" => $this->prenom,
                "nom" => $this->nom,
                "telephone" => $this->telephone,
                "email" => $this->email,
                "emailMessage" => $this->emailMessage
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}