<?php
session_start();
/**
 * 
 * Imports
 * 
 */
// phpmailer

require '../vendor/autoload.php';

require_once 'functions.php';

// Get form variables
$name = htmlspecialchars($_POST['name']);
$mail = htmlspecialchars($_POST['mail']);
$tel = htmlspecialchars($_POST['tel']);
$message = htmlspecialchars($_POST['message']);
$packageType = htmlspecialchars($_POST['packageType']);

if ($name && ($mail || $tel) && $packageType && $packageType != '--') {
    try {
        addEntryInCsv($name, $packageType, $mail, $tel);
        include_once 'mpdf.php';
        include_once 'mail.php';
    } catch (Exception $e) {
        logError($e);
        exit;
    }
    
    header('Location: ../thanks.php?name='.$name);
    $mpdf->Output($filename, 'D');
    exit;
} else {

    $prefix = '?';
    $and = '&';
    $_SESSION['dl-link'] = '';

    if (!$name) {
        $error_message = 'Le nom est obligatoire';
        $prefix .= '1=' . $error_message . $and;
    }

    if (!$mail && !$tel) {
        $text = $tel ? 'Le numéro de téléphone' : 'L\'adresse email'; 
        $error_message = $text.' est obligatoire';
        $errorId = $tel ? '4' : '2';
        $prefix .= $errorId.'=' . $error_message . $and;
    }

    if (!$packageType || $packageType == '--') {
        $error_message = 'Choisissez un élément de la liste';
        $prefix .= '3=' . $error_message . $and;
    }

    header('Location: ../' . $prefix);
    exit;
}
