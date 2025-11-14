<?php

namespace App\Notifications;

use Illuminate\Support\HtmlString;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Send2faCode extends Notification
{
    use Queueable;

    private $code;

    public function __construct($code)
    {
        $this->code = $code;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
        public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Your Solara Login Code')
                    ->line('Here is your 6-digit login code:')
                    ->line(new HtmlString('<strong>' . $this->code . '</strong>'))
                    ->line('This code will expire in 10 minutes.')
                    ->line('If you did not request this, please ignore this email.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
