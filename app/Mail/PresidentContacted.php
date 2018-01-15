<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PresidentContacted extends Mailable
{
    use Queueable, SerializesModels;

    private $informations;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($informations)
    {
        $this->informations = $informations;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('chartmann.35@gmail.com')
                    ->view('mails.contact')
                    ->subject('SAS Judo website '.$this->informations['subject'])
                    ->with([
                        'name'      => $this->informations['name'],
                        'email'     => $this->informations['email'],
                        'subject'   => $this->informations['subject'],
                        'text'      => $this->informations['text']
                    ]);
    }
}
