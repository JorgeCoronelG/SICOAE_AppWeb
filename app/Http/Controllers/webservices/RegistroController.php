<?php

namespace App\Http\Controllers\webservices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tutor;
use App\Registro;
use App\Estudiante;

class RegistroController extends Controller
{
    
    public function findAll($id, $fecha){
        $tutor = Tutor::find($id);
        if($tutor != null){
            $data = array();
            foreach($tutor->getEstudiante as $estudiante){
                $arr = array();
                $arr['matricula'] = $estudiante->matricula;
                $arr['nombre'] = $estudiante->nombre;
                $registro = Registro::where('matricula', $estudiante->matricula)
                ->where('fecha', date('Y-m-d', strtotime($fecha)))->first();
                if($registro != null){
                    $arr['registro'] = $registro->id;
                    $arr['fecha'] = $registro->fecha;
                    $arr['hora_entrada'] = date('g:i a', strtotime($registro->hora_entrada));
                    $arr['hora_salida'] = date('g:i a', strtotime($registro->hora_salida));
                }else{
                    $arr['registro'] = 0;
                    $arr['fecha'] = '';
                    $arr['hora_entrada'] = '';
                    $arr['hora_salida'] = '';
                }

                $data['registros'][] = $arr;
            }
            $data['code'] = 7;
            return response()->json($data, 200);
        }else{
            return response()->json([
                'error' => 'Tutor no encontrado',
                'code' => 404
            ], 200);
        }
    }

}