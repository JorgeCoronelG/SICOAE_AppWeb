<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupo;
use App\Grado;

class GrupoController extends Controller
{
    
    public function findAll(){
        $grupos = Grupo::all();
        return response()->json($grupos);
    }

    public function count(){
        $grados = Grado::count();
        $grupos = Grupo::count();
        $total = $grados * $grupos;
        return response()->json(['grupos' => $total]);
    }

}