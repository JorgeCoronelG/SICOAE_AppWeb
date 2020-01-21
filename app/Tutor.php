<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    public $timestamps = false;
    protected $table = 'tutores';

    protected $fillable = ['nombre', 'telefono', 'correo'];

    public function usuario(){
        return $this->belongsTo('App\Usuario', 'correo');
    }

    public function getEstudiante(){
        return $this->hasMany('App\Estudiante', 'tutor', 'id');
    }
}