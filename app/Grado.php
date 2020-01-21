<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    public $timestamps = false;

    protected $fillable = ['grado'];

    public function getEstudiante(){
        return $this->hasMany('App\Estudiante', 'grado', 'grado');
    }

}