<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Referencia;

class ReferenciaController extends Controller
{
    
    public function inputDay(){
        $referencias = Referencia::join('estudiantes', 'estudiantes.matricula', '=', 'referencias.matricula')
        ->where('referencias.estatus', 0)
        ->select('referencias.*', 'estudiantes.nombre')
        ->get();
        return response()->json($referencias);
    }

    public function inputReference($id){
        $referencia = Referencia::find($id);
        if($referencia != null){
            $referencia->estatus = 1;
            $referencia->save();
            return response()->json('OK', 200);
        }else{
            return response()->json(['errors' => ['input' => ['No se ha encontrado la referencia']]], 422);
        }
    }

}