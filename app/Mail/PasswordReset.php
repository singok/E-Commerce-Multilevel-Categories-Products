<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordReset extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $emailID;
    public $tokenCode;

    public function __construct($email, $token)
    {
        $this->emailID = $email;
        $this->tokenCode = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('ResetPassword',[
            'email' => $this->emailID,
            'token' => $this->tokenCode
        ]);
    }
}
