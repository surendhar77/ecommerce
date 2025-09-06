<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserActionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $action;

    public function __construct(User $user, string $action)
    {
        $this->user = $user;
        $this->action = $action;
    }

    public function build()
    {
        return $this->subject("User {$this->action}")
            ->view('emails.user_action')
            ->with([
                'username' => $this->user->name,
                'email' => $this->user->email,
                'action' => $this->action,
            ]);
    }
}
