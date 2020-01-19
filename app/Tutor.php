<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    public $timestamps = false;
    protected $table = 'tutores';

    protected $fillable = ['nombre', 'telefono', 'correo'];

    public function user(){
        return $this->belongsTo('App\Usuario');
    }
}