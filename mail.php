<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require $_SERVER['DOCUMENT_ROOT'] . '/MyClassWork/PHPMailer-master/src/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/MyClassWork/PHPMailer-master/src/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/MyClassWork/PHPMailer-master/src/SMTP.php';



function sendMail($to = 'tkparts.cv@gmail.com', $nameTo = 'Eugene', $subject = 'Here is the subject', $body = 'Here is the body')
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'Jevgewa8520@gmail.com';
        $mail->Password = 'efzx tccy qcow kpfd';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        //Recipients
        $mail->setFrom('Jevgewa8520@gmail.com', 'Mailer');
        $mail->addAddress($to, $nameTo);

        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

