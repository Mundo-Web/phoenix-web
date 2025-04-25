<?php

namespace App\Helpers;

use PHPMailer\PHPMailer\PHPMailer;
use App\Models\General;

class EmailConfig
{
    static  function config($name, $mensaje): PHPMailer
    {   
        $general = General::find(1);
        $mail = new PHPMailer(true);
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com';
        $mail->SMTPAuth = true;
        $mail->Username = $general->city;
        $mail->Password = $general->country;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 587;
        $mail->Subject = '' . $name . ', '.$mensaje. '';
        $mail->CharSet = 'UTF-8';
        $mail->setFrom($general->city, 'Phoenix Fitness Center');
        return $mail;
    }
}
