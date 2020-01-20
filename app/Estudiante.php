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
}