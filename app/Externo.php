<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Externo extends Model
{
    public $timestamps = false;

    protected $fillable = ['nombre', 'telefono', 'fecha', 'motivo', 'personas', 'hora_entrada', 'hora_salida'];

}