<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\UserFormSetting;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct(array $data)
    {
        $this->data = new UserFormSetting($data);
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Form Mail',
        );
    }

    public function build()
    {
        return $this->content()
            ->view('emails.contact_form')
            ->with('data', $this->data);
    }
    
    public function content(): Content
    {
        return (new Content)
            ->view('emails.contact_form')
            ->with([
                'name' => $this->data['name'],
                'phone_number' => $this->data['phone_number'],
                'date_of_birth' => $this->data['date_of_birth'],
                'gender' => $this->data['gender'],
            ]);
    }

    public function attachments(): array
    {
        return [];
    }
}
