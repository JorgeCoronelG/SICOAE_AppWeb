<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Database\Eloquent\Model;

class Usuario extends Authenticatable
{
    protected $primaryKey = 'correo';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    use Notifiable;

    protected $fillable = [
        'correo', 'clave', 'tipo_usuario', 'estatus'
    ];

    protected $hidden = [
        'clave', 'remember_token',
    ];
}