<?php

namespace App\Mail;

use App\Models\Mail;
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

    public $subject;
    public $with;

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

        $emails = Mail::all();
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
