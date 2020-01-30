<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudiante;
use App\Tutor;

class EstudianteController extends Controller
{
    
    public function add(Request $request){
        $request->validate([
            'nombre' => 'required|string|max:150',
            'matricula' => 'required|max:10',
            'tarjeta' => 'required|max:20',
            'grado' => 'required',
            'grupo' => 'required',
            'tutor' => 'required',
        ]);
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

    public function edit(EstudianteRequest $request){
        $tutor = Tutor::find($request->tutor);
        if($tutor != null){
            $estudiante_old = Estudiante::find($request->oldmatricula);
            if($estudiante_old != null){
                $estudiante_new = Estudiante::find($request->matricula);
                if($estudiante_new == null){
                    $estudiante_old->matricula = $request->matricula;
                    $estudiante_old->tarjeta = $request->tarjeta;
                    $estudiante_old->nombre = $request->nombre;
                    $estudiante_old->grado = $request->grado;
                    $estudiante_old->grupo = $request->grupo;
                    $estudiante_old->tutor = $tutor->id;
                    $estudiante_old->save();
                    return response()->json('OK', 200);
                }else if($estudiante_old->matricula == $estudiante_new->matricula){
                    $estudiante_old->tarjeta = $request->tarjeta;
                    $estudiante_old->nombre = $request->nombre;
                    $estudiante_old->grado = $request->grado;
                    $estudiante_old->grupo = $request->grupo;
                    $estudiante_old->tutor = $tutor->id;
                    $estudiante_old->save();
                    return response()->json('OK', 200);
                }else{
                    return response()->json(['errors' => ['update' => ['Matrícula ya existente']]], 422);
                }
            }else{
                return response()->json(['errors' => ['update' => ['Estudiante no encontrado']]], 422);
            }
        }else{
            return response()->json(['errors' => ['update' => ['No hay registros del tutor']]], 422);
        }
    }

    public function changeStatus(Request $request){
        $estudiante = Estudiante::find($request->id);
        if($estudiante != null){
            ($estudiante->estatus == 1) ? $estudiante->estatus = 0 : $estudiante->estatus = 1;
            $estudiante->save();
            return response()->json('OK', 200);
        }else{
            return response()->json(['errors' => ['estatus' => ['Estudiante no encontrado']]], 422);
        }
    }

    public function findAll(){
        $estudiantes = Estudiante::join('tutores', 'estudiantes.tutor', '=', 'tutores.id')
        ->select('estudiantes.*', 'tutores.nombre as nombre_tutor')
        ->get();
        return response()->json($estudiantes);
    }

    public function count(){
        $estudiantes = Estudiante::where('estatus', 1)->count();
        return response()->json(['estudiantes' => $estudiantes]);
    }

}