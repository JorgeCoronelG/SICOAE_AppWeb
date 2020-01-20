<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudiante;
use App\Tutor;
use App\Http\Requests\EstudianteRequest;

class EstudianteController extends Controller
{
    
    public function add(EstudianteRequest $request){
        $tutor = Tutor::find($request->tutor);
        if($tutor != null){
            $estudiante = Estudiante::find($request->matricula);
            if($estudiante == null){
                Estudiante::create([
                    'matricula' => $request->matricula,
                    'tarjeta' => $request->tarjeta,
                    'nombre' => $request->nombre,
                    'estatus' => 1,
                    'grado' => $request->grado,
                    'grupo' => $request->grupo,
                    'tutor' => $tutor->id
                ]);
                return response()->json('OK', 200);
            }else{
                return response()->json(['errors' => ['add' => ['Matrícula ya existente']]], 422);
            }
        }else{
            return response()->json(['errors' => ['add' => ['No hay registros del tutor']]], 422);
        }
    }

}