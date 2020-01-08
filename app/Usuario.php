<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $primaryKey = 'correo';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
