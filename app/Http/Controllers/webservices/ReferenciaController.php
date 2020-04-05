<?php

namespace App\Http\Controllers\webservices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Referencia;
use App\Estudiante;
use App\Tutor;

class ReferenciaController extends Controller
{

    const SATURDAY = "Saturday";
    const SUNDAY = "Sunday";
    
    public function create(Request $request){
        if(date('l') != self::SATURDAY && date('l') != self::SUNDAY){
            $estudiante = Estudiante::find($request->matricula);
            if($estudiante != null){
                if(Referencia::where('matricula', $estudiante->matricula)->where('fecha', date('Y-m-d'))->first() == null){
                    do{
                        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $referencia = date('Ymd');
                        for ($i = 0; $i < 7; $i++) {
                            $referencia .= $characters[rand(0, strlen($characters) - 1)];
                        }
                    }while(Referencia::find($referencia) != null);
                    $estudiante->getReferencia()->create([
                        'id' => $referencia,
                        'fecha' => date('Y-m-d'),
                        'persona' => $request->persona,
                        'estatus' => 0,
                    ]);
                    return response()->json(['referencia' => $referencia, 'code' => 8], 200);
                }else{
                    return response()->json([
                        'error' => 'Solo se puede generar una referencia del estudiante por día',
                        'code' => 404
                    ], 200);
                }
            }else{
                return response()->json([
                    'error' => 'Estudiante no encontrado',
                    'code' => 404
                ], 200);
            }
        }else{
            return response()->json([
                'error' => 'La referencia no puede ser generada en fines de semana',
                'code' => 404
            ], 200);
        }
    }

    public function findAll($id){
        $tutor = Tutor::find($id);
        if($tutor != null){
            $data = array();
            foreach($tutor->getEstudiante as $estudiante){
                $referencia = Referencia::where('matricula', $estudiante->matricula)->where('fecha', date('Y-m-d'))->first();
                if($referencia != null){
                    if($referencia->estatus != 2){
                        $ref = array();
                        $ref['matricula'] = $estudiante->matricula;
                        $ref['nombre'] = $estudiante->nombre;
                        $ref['referencia'] = $referencia->id;
                        $ref['fecha'] = $referencia->fecha;
                        $ref['persona'] = $referencia->persona;

                        $data['referencias'][] = $ref;
                    }
                }
            }
            if(!isset($data['referencias'])){
                $data['referencias'] = [null];
            }
            $data['code'] = 9;
            return response()->json($data, 200);
        }else{
            return response()->json([
                'error' => 'Tutor no encontrado',
                'code' => 404
            ], 200);
        }
    }

    public function update(Request $request){
        $referencia = Referencia::find($request->id);
        if($referencia != null){
            $referencia->persona = $request->persona;
            $referencia->save();
            return response()->json(['code' => 10], 200);
        }else{
            return response()->json([
                'error' => 'Referencia no encontrada',
                'code' => 404
            ], 200);
        }
    }

}