<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $primaryKey = 'matricula';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = 'estudiantes';

    protected $fillable = ['matricula', 'tarjeta', 'nombre', 'grado', 'grupo', 'tutor', 'estatus'];

    public function getTutor(){
        return $this->belongsTo('App\Tutor', 'tutor');
    }

    public function getGrado(){
        return $this->belongsTo('App\Grado', 'grado');
    }

    public function getGrupo(){
        return $this->belongsTo('App\Grupo', 'grupo');
    }

    public function getRegistro(){
        return $this->hasMany('App\Registro', 'matricula', 'matricula');
    }

}