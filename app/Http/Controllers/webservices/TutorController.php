<?php

namespace App\Http\Controllers\webservices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tutor;

class TutorController extends Controller
{
    
    public function get($id){
        $tutor = Tutor::find($id);
        if($tutor != null){
            $data = array();
            $data['id'] = $tutor->id;
            $data['nombre'] = $tutor->nombre;
            $data['telefono'] = $tutor->telefono;
            $data['correo'] = $tutor->correo;
            $data['code'] = 5;
            foreach($tutor->getEstudiante as $estudiante){
                $est = array();
                $est['matricula'] = $estudiante->matricula;
                $est['tarjeta'] = $estudiante->tarjeta;
                $est['nombre'] = $estudiante->nombre;
                $est['grado'] = $estudiante->grado;
                $est['grupo'] = $estudiante->grupo;
                $data['estudiantes'][] = $est;
            }
            return response()->json($data, 200);
        }else{
            return response()->json([
                'error' => 'Tutor no encontrado',
                'code' => 404
            ], 200);
        }
    }

}