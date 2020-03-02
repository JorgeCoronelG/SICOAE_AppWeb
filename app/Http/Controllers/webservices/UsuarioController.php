<?php

namespace App\Http\Controllers\webservices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Usuario;
use Illuminate\Support\Facades\Hash;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class UsuarioController extends Controller
{
    
    public function login(Request $request){
        $usuario = Usuario::find($request->correo);
        if($usuario != null){
            if($usuario->estatus == 1){
                if(Hash::check($request->clave, $usuario->clave)){
                    return response()->json([
                        'id' => $usuario->getTutor->id,
                        'code' => 1
                    ], 200);
                }else{
                    return response()->json([
                        'error' => 'Correo y/o contraseña incorrectas',
                        'code' => 404
                    ], 200);
                }
            }else{
                return response()->json([
                    'error' => 'Usuario dado de baja',
                    'code' => 404
                ], 200);
            }
        }else{
            return response()->json([
                'error' => 'Correo y/o contraseña incorrectas',
                'code' => 404
            ], 200);
        }
    }

    public function resetPassword($correo){
        $usuario = Usuario::find($correo);
        if($usuario != null){
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $clave = '';
            for ($i = 0; $i < 10; $i++) {
                $clave .= $characters[rand(0, strlen($characters) - 1)];
            }
            $usuario->clave = bcrypt($clave);
            $usuario->save();
            $subject = 'Restablecer contraseña';
            $html = 'La nueva contraseña es: <b>'.$clave.'</b>';
            if($this->sendEmail($correo, $subject, $html)){
                return response()->json(['code' => 3], 200);
            }else{
                return response()->json([
                    'code' => 404,
                    'error' => 'Error en el servidor. Intenta mas tarde'
                ], 200);
            }
        }else{
            return response()->json([
                'code' => 404,
                'error' => 'Usuario no registrado'
            ], 200);
        }
    }

    public function changePassword(Request $request){
        $usuario = Usuario::find($request->correo);
        if($usuario != null){
            if(Hash::check($request->oldClave, $usuario->clave)){
                $usuario->clave = bcrypt($request->newClave);
                $usuario->save();
                return response()->json(['code' => 6], 200);
            }else{
                return response()->json([
                    'error' => 'Contraseña incorrecta',
                    'code' => 404
                ], 200);
            }
        }else{
            return response()->json([
                'code' => 404,
                'error' => 'Usuario no registrado'
            ], 200);
        }
    }

    public function sendEmail($to, $subject, $html){
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'jorgecg2908@gmail.com';
        $mail->Password   = 'THEGAMEmen';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->setFrom('jorgecg2908@gmail.com', 'SICOAE');
        $mail->addAddress($to);
        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = '<html><body>'.$html.'</body></html>';
        return $mail->send();
    }

}