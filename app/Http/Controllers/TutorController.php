<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tutor;
use App\Usuario;
use App\Http\Requests\TutorRequest;

class TutorController extends Controller
{

    public function add(TutorRequest $request)
    {
        $usuario = Usuario::create([
            'correo' => $request->correo,
            'clave' => bcrypt($request->telefono),
            'tipo_usuario' => 3,
            'estatus' => 1
        ]);
        $tutor = $usuario->tutor()->create([
            'nombre' => $request->nombre,
            'telefono' => $request->telefono
            //'correo' => $usuario->correo
        ]);
        return response()->json('OK', 200);
        /*return response()->json([
            'errors' => ['
                tutor' => [
                    'Error al agregar tutor. Vuelva a intentarlo más tarde'
                ]
            ]
        ], 422);*/
    }

    public function edit(Request $request){
        $usuario = Usuario::find($request->correo);
        if($usuario == null){
            $usuario = Usuario::find($request->oldemail);
            if($usuario != null){
                $usuario->correo = $request->correo;
                $usuario->save();
    
                $tutor = Tutor::find($request->idupdate);
                if($tutor != null){
                    $tutor->nombre = $request->nombre;
                    $tutor->telefono = $request->telefono;
                    $tutor->save();
    
                    return response()->json('OK', 200);
                }else{
                    return response()->json(['errors' => ['update' => ['Vuelva a intentarlo más tarde']]], 422);
                }
            }else{
                return response()->json(['errors' => ['update' => ['Vuelva a intentarlo más tarde']]], 422);
            }
        }else{
            return response()->json(['errors' => ['update' => ['Correo ya registrado']]], 422);
        }
    }

    public function changeStatus(Request $request){
        $usuario = Usuario::find($request->id);
        ($usuario->estatus == 1) ? $usuario->estatus = 0 : $usuario->estatus = 1;
        if($usuario->save()){
            return response()->json('OK', 200);
        }else{
            return response()->json(['errors' => ['estatus' => ['Vuelva a intentarlo más tarde']]], 422);
        }
    }

    public function findAll(){
        $tutores = Tutor::join('usuarios', 'usuarios.correo', '=', 'tutores.correo')->get();
        return response()->json($tutores, 200);
    }

}