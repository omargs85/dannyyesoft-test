<?php


namespace App\Helpers;


use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class CustomPassword extends ResetPassword {
    /**
     * The password reset token.
     *
     * @var string
     */
    public $name;

    public function __construct($token, $name)
    {
        $this->token = $token;
        $this->name = $name;
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Reiniciar contraseña')
            ->greeting("Hola $this->name,")
            ->line('Estamos enviandote este correo porque recibimos una solicitud de reincio de contraseña.')
            ->line('Token: '.$this->token)
            ->action('Reiniciar Contraseña', url(config('app.url') . '/reiniciar-contrasena?token='.$this->token))
            ->line('Si tu no solicitaste reinicar la contraseña, no realices ninguna acción.');
    }
}
