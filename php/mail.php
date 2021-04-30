<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once '../env/env.php';
/**
 * 
 * PHP MAILER
 * 
 */

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

//Server settings
// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = SMTPSERVER;                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = MAILUSER;                     //SMTP username
$mail->Password   = MAILPASS;                               //SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //PHPMailer::ENCRYPTION_STARTTLS;     //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
$mail->Port       = 465; //587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

//Recipients
$mail->setFrom(MAILUSER);
$mail->addAddress(MAILTO);     //Add a recipient
//$mail->addReplyTo($USER);

// if ($preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $contact)) {
//     $mail->addCC($contact.trim());
// }
// $mail->addBCC('bcc@example.com');

//Attachments
// $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
$mail->addAttachment($folder . '/' . $filename);

$mail->CharSet = 'UTF-8';

//Content
$mail->isHTML(true);                                  //Set email format to HTML
$mail->Subject = 'Nouvelle demande de colis alimentaire - ' . $name;
$mail->Body    = $data;
$mail->AltBody = strip_tags($data);

$mail->send();
