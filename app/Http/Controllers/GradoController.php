<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grado;

class GradoController extends Controller{
    
    public function findAll(){
        $grados = Grado::all();
        return response()->json($grados);
    }

    public function count(){
        $grados = Grado::count();
        return response()->json(['grados' => $grados]);
    }

}