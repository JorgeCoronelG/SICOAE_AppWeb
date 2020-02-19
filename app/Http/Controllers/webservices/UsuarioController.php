<?php

namespace App\Http\Controllers\webservices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    
    public function login(Request $request){
        $usuario = Usuario::find($request->correo);
        if($usuario != null){
            if($usuario->estatus == 1){
                if(Hash::check($request->clave, $usuario->clave)){
                    return response()->json([
                        'id' => $usuario->getTutor->id,
                        'code' => 2
                    ], 200);
                }else{
                    return response()->json([
                        'error' => 'Correo y/o contraseña incorrectas',
                        'code' => 404
                    ], 200);
                }
            }else{
                return response()->json([
                    'error' => 'Usuario dado de baja',
                    'code' => 404
                ], 200);
            }
        }else{
            return response()->json([
                'error' => 'Correo y/o contraseña incorrectas',
                'code' => 404
            ], 200);
        }
    }

}