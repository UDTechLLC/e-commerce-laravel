<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactSent extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $massage;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $name, $email, $massage, $subject )
    {
        //
        $this->name = $name;
        $this->email = $email;
        $this->massage = $massage;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.contact');
    }
}
