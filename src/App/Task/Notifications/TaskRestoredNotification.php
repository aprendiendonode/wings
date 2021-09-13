<?php

namespace App\Task\Notifications;

use Domain\Task\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class TaskRestoredNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        public Task $task
    ) {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->subject(__(
                ':Name task has been restored!',
                ['name' => $this->task->name]
            ))
            ->greeting(__('Hello!'))
            ->line(__(
                ':Name task has been restored!',
                ['name' => $this->task->name]
            ))
            ->action(__(
                'View on :Name',
                ['name' => config('app.name')]
            ), url('/'))
            ->salutation(__('Have a nice day!'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [

        ];
    }
}
