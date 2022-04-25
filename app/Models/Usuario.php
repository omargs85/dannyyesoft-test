<?php

namespace App\Models;

use App\Helpers\CustomPassword;
use App\Structs\TWScopes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, CanResetPassword;

    protected $table = 'tw_usuarios';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'verification_token',
    ];

    /**
     * Sends the password reset notification.
     *
     * @param  string $token
     *
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomPassword($token, $this->S_Nombre));
    }

    /**
     * Get the expiration days depending on role
     *
     * @return int
     */
    public function getExpiration(): int {
        switch ($this->rol_usuario) {
            case 1:
                return 7;
            case 2:
                return 14;
            default:
                return 365;
        }
    }

    /**
     * Assigns the expiration depending on role
     *
     * @return array
     */
    public function getScopes(): array {
        switch ($this->rol_usuario) {
            case 1:
                return [
                    TWScopes::$CORPORATIVOS,
                    TWScopes::$EMPRESAS_CORPORATIVOS
                ];
            case 2:
                return [
                    TWScopes::$CONTRATOS_CORPORATIVOS,
                    TWScopes::$CONTACTOS_CORPORATIVOS
                ];
            case 3:
                return [
                    TWScopes::$DOCUMENTOS,
                    TWScopes::$DOCUMENTOS_CORPORATIVOS
                ];
        }
    }
}
