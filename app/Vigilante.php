<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vigilante extends Model
{
    public $timestamps = false;

    protected $fillable = ['nombre', 'telefono', 'correo'];

    public function getUsuario(){
        return $this->belongsTo('App\Usuario', 'correo');
    }
}