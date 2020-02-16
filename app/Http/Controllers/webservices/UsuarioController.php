<?php

namespace App\Http\Controllers\webservices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    public function test(){
        return 'OK';
    }
    
    public function login(Request $request){
        $correo = $request->correo;
        $clave = $request->clave;
        return response()->json(['correo' => $correo, 'clave' => bcrypt($clave)]);
    }

}