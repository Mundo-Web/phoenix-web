<?php

namespace App\Helpers;

use PHPMailer\PHPMailer\PHPMailer;

class EmailConfig
{
    static  function config($name, $mensaje): PHPMailer
    {
        $mail = new PHPMailer(true);
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'server295.web-hosting.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'info@mrcremosobasedehelados.com.pe';
        $mail->Password = 'cremoso2024#';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
        $mail->Subject = '' . $name . ', '.$mensaje. '';
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('info@mrcremosobasedehelados.com.pe', 'MrCremoso');
        return $mail;
    }
}
