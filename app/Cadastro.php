<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    const ENABLED = 1;
    const DISABLED = 0;

    protected $fillable = [
        'nome_completo', 'login', 'password','ativo'
    ];
}
