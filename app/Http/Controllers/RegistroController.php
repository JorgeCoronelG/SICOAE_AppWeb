<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registro;
use App\Estudiante;
use DateTime;

class RegistroController extends Controller
{
    
    public function dayAssistance(){
        $estudiantes = Estudiante::where('estatus', 1)->count();
        $registros = Registro::where('fecha', date('Y/m/d'))->count();
        $asistencia = ($registros * 100) / $estudiantes;
        return response()->json(['asistencia' => $asistencia]);
    }

    public function findAllByStudent($matricula){
        //Código para quitar los fines de semana en un rango de fechas
        /*$starDate = new DateTime('2020-02-03');
        $endDate = new DateTime('2020-02-07');
        while( $starDate <= $endDate){
            if($starDate->format('l')== 'Saturday' || $starDate->format('l')== 'Sunday'){
                echo $starDate->format('y-m-d (D)')."<br/>";
            }
            $starDate->modify("+1 days");
        }*/
        $estudiante = Estudiante::find($matricula);
        if($estudiante != null){
            $totalDias = 5;
            $arrRegistros = array();
            $registros = Registro::where('registros.matricula', $matricula)->get();
            foreach($registros as $registro){
                $registro->fecha = date('d/m/Y', strtotime($registro->fecha));
                $registro->hora_entrada = date('h:i a', strtotime($registro->hora_entrada));
                if($registro->hora_salida != null)
                    $registro->hora_salida = date('h:i a', strtotime($registro->hora_salida));
                $arrRegistros[] = $registro;
            }
            return response()->json([
                'totalDias' => $totalDias,
                'totalRegistros' => count($registros),
                'estudiante' => $estudiante,
                'registros' => $arrRegistros
            ]);
        }else{
            return response()->json(['errors' => ['estudiante' => ['Estudiante no encontrado']]]);
        }
    }

}