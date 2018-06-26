<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class LessonUpdated extends Notification
{
    use Queueable;
    protected $lesson;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($lesson)
    {
       $this->lesson = $lesson;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {

        return $this->lesson->toArray();
    }


    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)

    {
//        dd($this->lesson[0]->description);
        return (new MailMessage)

            ->success()

            ->subject($this->lesson[0]->name)

            ->line($this->lesson[0]->description)

            ->action('Baltic talents', 'http://127.0.0.1:8000');
    }

}
