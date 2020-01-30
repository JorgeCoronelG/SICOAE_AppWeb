<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    public $timestamps = false;

    protected $fillable = ['fecha', 'hora_entrada', 'hora_salida', 'matricula'];

    public function getEstudiante(){
        return $this->belongsTo('App\Estudiante', 'matricula');
    }
}