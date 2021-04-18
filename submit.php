<?php
function logError($message) {
    $log_file2 = "./errors.log";
    ini_set("log_errors", TRUE);
    ini_set('error_log', $log_file2);
    error_log($message);
}

/**
 * 
 * Imports
 * 
 */
// phpmailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// mpdf
require_once __DIR__ . '/vendor/autoload.php';
require 'vendor/autoload.php';

require_once './env/env.php';

/**
 * 
 * PHP PDF GENERATOR - MPDF
 * 
 */

// Get form variables
$name = htmlspecialchars($_POST['name']);
$contact = htmlspecialchars($_POST['contact']);
$message = htmlspecialchars($_POST['message']);

if ($name && $contact && $message) {

    try {
    // Create pdf
    $mpdf = new \Mpdf\Mpdf();

    $data = '';

    $data .= '<h1>Reçu - bon de commande de colis alimentaire</h1>';

    $data .= '<strong>Nom:</strong> ' . $name . '<br/>';
    $data .= '<strong>Contact:</strong> ' . $contact . '<br/>';
    $data .= '<strong>Type de colis:</strong> 1 - Etudiant' . '<br/>';

    if ($message) {
        $data .= '<strong>Message:</strong> ' . $message . '<br/>';
    }

    $mpdf->WriteHTML($data);
    $mpdf->Output('recu.pdf', 'F');
    $mpdf->Output('recu-demande-colis-alimentaire-association-avicenne.pdf', 'D');

    /**
     * 
     * PHP MAILER
     * 
     */

    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $SMTP_SERVER;                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $USER;                     //SMTP username
        $mail->Password   = $PASS;                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465; //587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom($USER);
        $mail->addAddress($TO);     //Add a recipient
        //$mail->addReplyTo('info@example.com', 'Information');
 
        // if ($preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $contact)) {
        //     $mail->addCC($contact.trim());
        // }
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        $mail->addAttachment('recu.pdf');

        $mail->CharSet = 'UTF-8';

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Nouvelle demande de colis alimentaire - ' . $_POST['name'];
        $mail->Body    = $data;
        $mail->AltBody = strip_tags($data);

        $mail->send();
        unlink('recu.pdf');
    } catch (Exception $e) {
        logError($e);
    }
}
?>