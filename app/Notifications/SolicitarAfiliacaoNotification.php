<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SolicitarAfiliacaoNotification extends Notification
{
    use Queueable;

  
    private $solicitante;
    private $recebedor;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($solicitante, $recebedor)
    {
        $this->solicitante = $solicitante;
        $this->recebedor = $recebedor;
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
        return (new MailMessage)->subject('SOLICITAÇÃO DE AFILIAÇÃO')->markdown('mail.instituicao.solicitar-afiliacao', ['recebedor' => $this->recebedor, 'solicitante' => $this->solicitante]);
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
