<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EventoContatoNotification extends Notification
{
    use Queueable;

  
    private $form_data;
    private $model;
    private $solicitante;
    private $recebedor;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($solicitante, $recebedor, $model, $form_data)
    {
        $this->form_data = $form_data;
        $this->model = $model;
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
        return (new MailMessage)->subject('CONTATO VIA EVENTO')->markdown('mail.eventos.contato', ['recebedor' => $this->recebedor, 'form_data' => $this->form_data, 'model' => $this->model]);
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
