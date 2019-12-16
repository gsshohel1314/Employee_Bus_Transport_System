<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewAdminMessage extends Notification
{
    use Queueable;
    private $data;

    public function __construct($data)
    {
        $this->data=$data;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->subject('New Message!')
        ->greeting('Hello! Admin')
        ->line('A new message has arrived for you.')
        ->line('Employee Information:')
        ->line('Name :'.$this->data->name)
        ->line('Email :'.$this->data->email)
        ->line('Subject :'.$this->data->subject)
        ->line('Description :'.$this->data->description)
        ->line('Thank you for using our service!');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
