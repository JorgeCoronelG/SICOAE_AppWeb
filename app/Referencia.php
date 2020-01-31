<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referencia extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['id','fecha', 'persona', 'estatus', 'matricula'];

    public function getEstudiante(){
        return $this->belongsTo('App\Estudiante', 'matricula');
    }
}