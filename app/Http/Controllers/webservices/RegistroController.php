<?php

namespace App\Http\Controllers\webservices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tutor;
use App\Registro;
use App\Estudiante;

class RegistroController extends Controller
{

    const SATURDAY = "Saturday";
    const SUNDAY = "Sunday";
    const TIME_INPUT = "08:00:00";
    const TIME_OUTPUT = "14:00:00";
    const OPEN_DOOR = 180;
    const EXIT_DOOR = 0;
    const ERROR_DOOR = 404;

    public function register(Request $request){
        if(date('l') != self::SATURDAY && date('l') != self::SUNDAY){
            $time = date('H:i:s');
            if($time >= date('H:i:s', strtotime(self::TIME_INPUT.'-15 minute')) && 
                $time <= date('H:i:s', strtotime(self::TIME_INPUT.'+15 minute'))){
                //Cumple con el horario de entrada
                $estudiante = Estudiante::where([
                    'tarjeta' => $request->tarjeta, 
                    'estatus' => 1
                    ])->first();
                if($estudiante != null){
                    //El estudiante existe y está activo
                    $registro = Registro::where([
                        'matricula' => $estudiante->matricula,
                        'fecha' => date('Y/m/d')
                    ])->first();
                    if($registro == null){
                        //No hay registro de entrada, por lo cual, se añade a la bd
                        $registro = $estudiante->getRegistro()->create([
                            'fecha' => date('Y/m/d'),
                            'hora_entrada' => date('G:i:s'),
                            'hora_salida' => null
                        ]);
                        if($registro != null){
                            //Se ha ingreado con éxito a la bd
                            if($estudiante->getTutor->getToken->token != ''){
                                $to = $estudiante->getTutor->getToken->token;
                                $data = array(
                                    'title' => $estudiante->nombre,
                                    'body' => 'Entró a la institución'
                                );
                                $notification = new Notification();
                                $notification->sendPush($to, $data);
                                //print_r($notification->sendPush($to, $data));
                                $this->openDoor(self::OPEN_DOOR);
                            }else{
                                $this->openDoor(self::OPEN_DOOR);
                            }
                        }else{
                            $this->openDoor(self::ERROR_DOOR);
                        }
                    }else{
                        $this->openDoor(self::ERROR_DOOR);
                    }
                }else{
                    $this->openDoor(self::ERROR_DOOR);
                }
            }else if($time >= date('H:i:s', strtotime(self::TIME_OUTPUT.'-15 minute')) && 
                $time <= date('H:i:s', strtotime(self::TIME_OUTPUT.'+15 minute'))){
                //Cumple con el horario de salida
                $estudiante = Estudiante::where([
                    'tarjeta' => $request->tarjeta, 
                    'estatus' => 1
                    ])->first();
                if($estudiante != null){
                    //El estudiante existe y está activo
                    $registro = Registro::where([
                        'matricula' => $estudiante->matricula,
                        'fecha' => date('Y/m/d')
                    ])->first();
                    if($registro != null){
                        //Ya hay registro, sigifica que el alumno desea salir
                        if($registro->hora_salida == null){
                            //No hay registro de salida, sería su primer intento de salida
                            $registro->hora_salida = date('G:i:s');
                            if($registro->save()){
                                //Se ha actualizado con éxito a la bd
                                if($estudiante->getTutor->getToken->token != ''){
                                    $to = $estudiante->getTutor->getToken->token;
                                    $data = array(
                                        'title' => $estudiante->nombre,
                                        'body' => 'Salió de la institución'
                                    );
                                    $notification = new Notification();
                                    $notification->sendPush($to, $data);
                                    //print_r($notification->sendPush($to, $data));
                                    $this->openDoor(self::EXIT_DOOR);
                                }else{
                                    $this->openDoor(self::EXIT_DOOR);
                                }
                            }else{
                                $this->openDoor(self::ERROR_DOOR);
                            }
                        }else{
                            $this->openDoor(self::ERROR_DOOR);
                        }
                    }else{
                        $this->openDoor(self::ERROR_DOOR);
                    }
                }else{
                    $this->openDoor(self::ERROR_DOOR);
                }
            }else{
                $this->openDoor(self::ERROR_DOOR);
            }
        }else{
            $this->openDoor(self::ERROR_DOOR);
        }
    }

    /*public function input(Request $request){
        $estudiante = Estudiante::where([
            'tarjeta' => $request->tarjeta, 
            'estatus' => 1
            ])->first();
        if($estudiante != null){
            //El estudiante existe y está activo
            $registro = Registro::where([
                'matricula' => $estudiante->matricula,
                'fecha' => date('Y/m/d')
            ])->first();
            if($registro == null){
                //No hay registro de entrada, por lo cual, se añade a la bd
                $registro = $estudiante->getRegistro()->create([
                    'fecha' => date('Y/m/d'),
                    'hora_entrada' => date('G:i:s'),
                    'hora_salida' => null
                ]);
                if($registro != null){
                    //Se ha ingreado con éxito a la bd
                    if($estudiante->getTutor->getToken->token != ''){
                        $to = $estudiante->getTutor->getToken->token;
                        $data = array(
                            'title' => $estudiante->nombre,
                            'body' => 'Entró a la institución'
                        );
                        $notification = new Notification();
                        print_r($notification->sendPush($to, $data));
                    }else{
                        return response()->json(['code' => 'OK'], 200);
                    }
                }else{
                    return response()->json(['error' => 'Error en el servidor'], 200);
                }
            }else{
                return response()->json(['error' => 'El alumno ya había ingresado'], 200);
            }
        }else{
            return response()->json(['error' => 'No se encuentra el estudiante'], 200);
        }
    }*/

    /*public function output(Request $request){
        $estudiante = Estudiante::where([
            'tarjeta' => $request->tarjeta, 
            'estatus' => 1
            ])->first();
        if($estudiante != null){
            //El estudiante existe y está activo
            $registro = Registro::where([
                'matricula' => $estudiante->matricula,
                'fecha' => date('Y/m/d')
            ])->first();
            if($registro != null){
                //Ya hay registro, sigifica que el alumno desea salir
                if($registro->hora_salida == null){
                    //No hay registro de salida, sería su primer intento de salida
                    $registro->hora_salida = date('G:i:s');
                    if($registro->save()){
                        //Se ha actualizado con éxito a la bd
                        if($estudiante->getTutor->getToken->token != ''){
                            $to = $estudiante->getTutor->getToken->token;
                            $data = array(
                                'title' => $estudiante->nombre,
                                'body' => 'Salió de la institución'
                            );
                            $notification = new Notification();
                            print_r($notification->sendPush($to, $data));
                        }else{
                            return response()->json(['code' => 'OK'], 200);
                        }
                    }else{
                        return response()->json(['error' => 'Error en el servidor'], 200);
                    }
                }else{
                    return response()->json(['error' => 'El alumno ya había salido'], 200);
                }
            }else{
                return response()->json(['error' => 'El alumno no ha entrado'], 200);
            }
        }else{
            return response()->json(['error' => 'No se encuentra el estudiante'], 200);
        }
    }*/
    
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
                    ($registro->hora_salida != null) ? $arr['hora_salida'] = date('g:i a', strtotime($registro->hora_salida)) : $arr['hora_salida'] = '';
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