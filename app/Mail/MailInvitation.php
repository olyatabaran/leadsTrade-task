<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailInvitation extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $email)
    {
        $this->user = $user;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('invitation', ['user' => $this->user, 'email' => $this->email]);
    }
}
