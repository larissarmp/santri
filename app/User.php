<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    const ENABLED = 1;
    const DISABLED = 0;

    protected $fillable = [
        'nome_completo', 'login', 'password','ativo'
    ];

    
}
