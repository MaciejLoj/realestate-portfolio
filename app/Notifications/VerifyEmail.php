<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Lang;
// Nadpisuje domyslne powiadomienie VerifyEmail
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;

//Tworze personalizownego maila do aktywacji konta
class VerifyEmail extends VerifyEmailBase
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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

    // Mail wysylany w celu aktywacji konta, spersonalizowany.
    // funkcja toMail konwertuje ponizszy kod na mail
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable);
        }
        // zmienic, wstawic konkretny template z view return (new MailMessage)->view(
        return (new MailMessage)
            ->greeting('Witamy na stronie Wynajem Wawa!')
            ->subject(Lang::getFromJson('Aktywacja konta'))
            ->line(Lang::getFromJson('Kliknij ponizszy przycisk aby potwierdzic swoje konto.'))
            ->action(
                Lang::getFromJson('Potwierdz email'),
                $this->verificationUrl($notifiable)
            )
            ->line(Lang::getFromJson('Jesli to nie Ty stworzyles konto na stronie, ignoruj wiadomosc.'));
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
