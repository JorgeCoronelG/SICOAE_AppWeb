<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registro;
use App\Estudiante;

class RegistroController extends Controller
{
    
    public function dayAssistance(){
        $estudiantes = Estudiante::where('estatus', 1)->count();
        $registros = Registro::where('fecha', date('Y/m/d'))->count();
        $asistencia = ($registros * 100) / $estudiantes;
        return response()->json(['asistencia' => $asistencia]);
    }

}