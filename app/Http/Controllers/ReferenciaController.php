<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Referencia;
use App\Estudiante;
use App\Registro;

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
            $estudiante = Estudiante::find($referencia->matricula);
            $estudiante->getRegistro()->create([
                'fecha' => date('Y/m/d'),
                'hora_entrada' => date('G:i:s'),
                'hora_salida' => null
            ]);
            if($estudiante->getTutor->getToken->token != ''){
                $to = $estudiante->getTutor->getToken->token;
                $data = array(
                    'title' => $estudiante->nombre,
                    'body' => 'Entró a la institución'
                );
                $notification = new Notification();
                $notification->sendPush($to, $data);
                //$this->openDoor(self::OPEN_DOOR);
                return response()->json('OK', 200);
            }else{
                //$this->openDoor(self::OPEN_DOOR);
                return response()->json('OK', 200);
            }
        }else{
            //$this->openDoor(self::ERROR_DOOR);
            return response()->json(['errors' => ['entrada' => ['No se ha encontrado la referencia']]], 422);
        }
    }

    public function outputReference($id){
        $referencia = Referencia::find($id);
        if($referencia != null){
            $referencia->estatus = 2;
            $referencia->save();
            $estudiante = Estudiante::find($referencia->matricula);
            $registro = Registro::where([
                'matricula' => $estudiante->matricula,
                'fecha' => date('Y/m/d')
            ])->first();
            $registro->hora_salida = date('G:i:s');
            $registro->save();
            if($estudiante->getTutor->getToken->token != ''){
                $to = $estudiante->getTutor->getToken->token;
                $data = array(
                    'title' => $estudiante->nombre,
                    'body' => 'Salió de la institución'
                );
                $notification = new Notification();
                $notification->sendPush($to, $data);
                //$this->openDoor(self::EXIT_DOOR);
                return response()->json('OK', 200);
            }else{
                //$this->openDoor(self::EXIT_DOOR);
                return response()->json('OK', 200);
            }
        }else{
            //$this->openDoor(self::ERROR_DOOR);
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

class Notification{

    private $apiKey = "AAAAHB9PccM:APA91bFQXQLgjCW1Bvyjc2_W4rNBp_Z9dzaNlBeStds4AojNS7yVO5nKC_-Ep0IfsFUlwaBfNKRDEKQBcZJubbvbX5IhITSRYi_v9tOd-X1FGt7Aq4T51DfWzfNNG_fCmZFXfbLgo20M";

    function sendPush($to = '', $data = array()){
        $fields = array(
            'to' => $to,
            'data' => $data
        );
        $headers = array(
            'Authorization: key='.$this->apiKey,
            'Content-Type:application/json'
        );
        $url = 'https://fcm.googleapis.com/fcm/send';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        //echo json_encode($fields);
        //echo "<br><br>RESPUESTA FCM: ";

        $result = curl_exec($ch);
        curl_close($ch);

        //return json_decode($result, true);
    }

}