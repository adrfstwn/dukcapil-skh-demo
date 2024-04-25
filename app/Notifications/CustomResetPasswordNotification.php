<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CustomResetPasswordNotification extends Notification
{
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $actionUrl = 'http://127.0.0.1:8000' . route('password.reset', ['token' => $this->token, 'email' => $notifiable->email], false);

        return (new MailMessage)
            ->subject('Reset Password Notification')
            ->view('auth.email', [
                'actionUrl' => $actionUrl,
            ]);
    }
}
