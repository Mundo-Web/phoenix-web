<?php

namespace App\Helpers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use App\Models\General;

class EmailConfig
{
    static function config($name, $mensaje): PHPMailer
    {   
        $general = General::find(1);
        $mail = new PHPMailer(true);
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        // PHPMailer::ENCRYPTION_STARTTLS;
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'servicioalcliente@phoenix-fitness.fit'; // es mi usuario
        $mail->Password = 'pmrqwzkdxzyjjnzm'; // es mi contraseña
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->Subject = $name . ', '.$mensaje;
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('servicioalcliente@phoenix-fitness.fit', 'Phoenix Fitness Center');
        return $mail;
    }
}
