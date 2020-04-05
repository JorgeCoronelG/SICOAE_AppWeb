<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Referencia;

class ReferenciaController extends Controller
{

    const OPEN_DOOR = 180;
    const EXIT_DOOR = 0;
    const ERROR_DOOR = 404;
    
    public function inputDay(){
        $referencias = Referencia::join('estudiantes', 'estudiantes.matricula', '=', 'referencias.matricula')
        ->where('referencias.estatus', 0)
        ->where('referencias.fecha', date('Y-m-d'))
        ->select('referencias.*', 'estudiantes.nombre')
        ->get();
        return response()->json($referencias);
    }

    public function outputDay(){
        $referencias = Referencia::join('estudiantes', 'estudiantes.matricula', '=', 'referencias.matricula')
        ->join('tutores', 'tutores.id', '=', 'estudiantes.tutor')
        ->where('referencias.estatus', 1)
        ->where('referencias.fecha', date('Y-m-d'))
        ->select('referencias.*', 'estudiantes.nombre', 'tutores.telefono')
        ->get();
        return response()->json($referencias);
    }

    public function inputReference($id){
        $referencia = Referencia::find($id);
        if($referencia != null){
            $referencia->estatus = 1;
            $referencia->save();
            $this->openDoor(self::OPEN_DOOR);
            return response()->json('OK', 200);
        }else{
            $this->openDoor(self::ERROR_DOOR);
            return response()->json(['errors' => ['entrada' => ['No se ha encontrado la referencia']]], 422);
        }
    }

    public function outputReference($id){
        $referencia = Referencia::find($id);
        if($referencia != null){
            $referencia->estatus = 2;
            $referencia->save();
            $this->openDoor(self::EXIT_DOOR);
            return response()->json('OK', 200);
        }else{
            $this->openDoor(self::ERROR_DOOR);
            return response()->json(['errors' => ['salida' => ['No se ha encontrado la referencia']]], 422);
        }
    }

    public function openDoor($value){
        $opciones = array('http' =>
            array(
                'method'  => 'GET',
                'header'  => 'Content-type: application/x-www-form-urlencoded'
            )
        );
        $contexto = stream_context_create($opciones);
        $resultado = file_get_contents('http://192.168.16.114/?value='.$value, false, $contexto);
    }

}