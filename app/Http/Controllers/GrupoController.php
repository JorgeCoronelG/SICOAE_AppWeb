<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupo;

class GrupoController extends Controller
{
    
    public function findAll(){
        $grupos = Grupo::all();
        return response()->json($grupos);
    }

}