<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Password;

class TenantCreated extends Notification
{
    private $hostname;

    public function __construct($hostname)
    {
        $this->hostname = $hostname;
    }

    public function via()
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $token = Password::broker()->createToken($notifiable);
        $resetUrl = "https://{$this->hostname->fqdn}/password/reset/{$token}";

        $app = env('APP_NAME');

        return (new MailMessage())
            ->subject("{$app} Invitation")
            ->greeting("Hello {$notifiable->name},")
            ->line("You have been invited to use {$app}!")
            ->line("Your custom / access URL is https://{$this->hostname->fqdn}")
            ->line("Do remember to share this url with all users.")
            ->line("Also do not forget to setup access rights for all parties.")
            ->line('Kindly click here to reset your Password if you need to.')
            ->action('Reset password', $resetUrl);
    }
}
