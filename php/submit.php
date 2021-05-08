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
$_SESSION['name'] = $name = htmlspecialchars($_POST['name']);
$_SESSION['firstname'] = $firstname = htmlspecialchars($_POST['firstname']);
$_SESSION['mail'] = $mail = htmlspecialchars($_POST['mail']);
$_SESSION['tel'] = $tel = htmlspecialchars($_POST['tel']);
$_SESSION['message'] = $message = htmlspecialchars($_POST['message']);
$_SESSION['packageType'] = $packageType = htmlspecialchars($_POST['packageType']);
$_SESSION['city'] = $city = htmlspecialchars($_POST['city']);
$checkConsentement = isset(($_POST['checkConsentement'])) ? htmlspecialchars($_POST['checkConsentement']) : "";

$formValid = $name &&
    $firstname &&
    ($mail || $tel) &&
    $packageType &&
    $packageType != '--' &&
    $city &&
    $checkConsentement;

if ($formValid) {
    try {
        $message = str_replace(",", " ", $message);
        $arr = array($name, $firstname, $packageType, $mail, $tel, $city, $message);
        addEntryInCsv($arr);
        include_once 'mpdf.php';
        include_once 'mail.php';
    } catch (Exception $e) {
        logError($e);
        exit;
    }

    header('Location: ../thanks.php?name=' . $firstname);
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

    if (!$firstname) {
        $error_message = 'Le prénom est obligatoire';
        $prefix .= '7=' . $error_message . $and;
    }

    if (!$mail && !$tel) {
        $text = $tel ? 'Le numéro de téléphone' : 'L\'adresse email';
        $error_message = $text . ' est obligatoire';
        $errorId = $tel ? '4' : '2';
        $prefix .= $errorId . '=' . $error_message . $and;
    }

    if (!$packageType || $packageType == '--') {
        $error_message = 'Choisissez le type de colis dans la liste';
        $prefix .= '3=' . $error_message . $and;
    }

    if (!$city) {
        $error_message = 'Veuillez entrer une ville de retrait';
        $prefix .= '5=' . $error_message . $and;
    }

    if (!$checkConsentement) {
        $error_message = 'Vous devez accepter les conditions d\'utilisation';
        $prefix .= '6=' . $error_message . $and;
    }

    header('Location: ../' . $prefix);
    exit;
}
