<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VeryEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $url;

    public function __construct($name, $url)
    {
        $this->name = $name;
        $this->url = route('auth.very', $url); // Link xác nhận email
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Xác Nhận Email',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.verify',
            with: [
                'nameVery' => $this->name,
                'url' => $this->url,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
