<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MyCustomEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('elitepaint96@gmail.com')
            ->subject('Welcome to New Elite Software')
            ->view('email.mail')
            ->with([
                'message' => 'This is a test email from Laravel!',
            ]);
        //return $this->view('view.name');
    }
}
