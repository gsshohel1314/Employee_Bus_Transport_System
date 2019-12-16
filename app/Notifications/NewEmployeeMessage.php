<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewEmployeeMessage extends Notification
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
        ->greeting('Hello! '.$this->data->name)
        ->line('A new message has arrived for you.')
        ->line('Your Message is:')
        ->line('Subject :'.$this->data->subject)
        ->line('Description :'.$this->data->description)
        ->line('Do you want to reply then click view button')
        ->action('View', url('admin/employeeMessage/create'))
        ->line('Thank you for using our service!');
    }

    
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
