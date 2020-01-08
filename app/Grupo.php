<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $primaryKey = 'grupo';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
