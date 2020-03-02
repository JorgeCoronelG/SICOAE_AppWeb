<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    public $timestamps = false;

    protected $fillable = ['tutor', 'token'];

    public function getTutor(){
        return $this->belongsTo('App\Tutor', 'id');
    }
}