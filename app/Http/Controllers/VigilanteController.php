<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vigilante;
use App\Usuario;

class VigilanteController extends Controller
{

    public function add(Request $request){
        $request->validate([
            'nombre' => 'required|string|max:150',
            'telefono' => 'required|string|max:10',
            'correo' => 'email|required|string'
        ]);
        $usuario = Usuario::find($request->correo);
        if($usuario == null){
            $usuario = Usuario::create([
                'correo' => $request->correo,
                'clave' => bcrypt($request->telefono),
                'tipo_usuario' => 2,
                'estatus' => 1
            ]);
            $vigilante = $usuario->getVigilante()->create([
                'nombre' => $request->nombre,
                'telefono' => $request->telefono
                //'correo' => $usuario->correo
            ]);
            return response()->json('OK', 200);
        }else{
            return response()->json(['errors' => ['duplicate-correo' => ['Correo ya registrado']]], 422);
        }
    }

    public function edit(Request $request){
        if($request->oldemail != $request->correo){
            $usuario = Usuario::find($request->correo);
            if($usuario == null){
                $usuario = Usuario::find($request->oldemail);
                if($usuario != null){
                    $usuario->correo = $request->correo;
                    $usuario->save();
        
                    $vigilante = Vigilante::find($request->idupdate);
                    if($vigilante != null){
                        $vigilante->nombre = $request->nombre;
                        $vigilante->telefono = $request->telefono;
                        $vigilante->save();
        
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
        }else{
            $vigilante = Vigilante::find($request->idupdate);
            if($vigilante != null){
                $vigilante->nombre = $request->nombre;
                $vigilante->telefono = $request->telefono;
                $vigilante->save();

                return response()->json('OK', 200);
            }else{
                return response()->json(['errors' => ['update' => ['Vuelva a intentarlo más tarde']]], 422);
            }
        }
    }

    public function delete(Request $request){
        $usuario = Usuario::find($request->correo);
        if($usuario != null){
            $usuario->delete();
            return response()->json('OK', 200);
        }else{
            return response()->json(['errors' => ['delete' => ['Vigilante no encontrado']]], 422);
        }
    }

    public function findAll(){
        $vigilantes = Vigilante::join('usuarios', 'usuarios.correo', '=', 'Vigilantes.correo')
        ->select('vigilantes.*')
        ->get();
        return response()->json($vigilantes, 200);
    }

    public function count(){
        $vigilantes = Vigilante::count();
        return response()->json(['vigilantes' => $vigilantes]);
    }
    
}