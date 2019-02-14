<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class GradeDeleted extends Notification
{
    use Queueable;

    private $grade = null;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($grade)
    {
        $this->grade = $grade;
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
      $employeer = $this->grade->employeer_id;
      $employeer = $employeer == 0? 'A instituição' : $this->grade->employeer->name;
      return (new MailMessage)
             ->greeting('Olá,')
             ->line("A nota do aluno {$this->grade->student_group->student->name} foi excluída.")
             ->line("O funcionário que realizou a exclusão foi {$employeer}.")
             //->action('View Invoice', $url)
             ->line('Att');
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
            //
        ];
    }
}
