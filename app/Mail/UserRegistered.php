<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserRegistered extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $password;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $password, $subject)
    {
        $this->user = $user;
        $this->password = $password;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->user->email)
            ->subject($this->subject)
            ->markdown('email.confirm',[
                $this->user,
                $this->password
            ]);
    }
}
