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

    public $heading;
    public $attachement;

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
        $emaildata = Mail::latest()->first();

        return $this
            ->from('elitepaint96@gmail.com')
            ->subject($emaildata->heading)
            ->view('email.mail')
            ->attach(public_path("photo/"."$emaildata->attachement"))
            ->with([
                'message' => 'This is a test email from Laravel!',
            ]);
    }
}
