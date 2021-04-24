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
$contact = htmlspecialchars($_POST['contact']);
$message = htmlspecialchars($_POST['message']);
$packageType = htmlspecialchars($_POST['packageType']);

if ($name && $contact && $packageType && $packageType != '--') {
    try {
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

    if (!$contact) {
        $error_message = 'Le contact par mail ou téléphone est obligatoire';
        $prefix .= '2=' . $error_message . $and;
    }

    if (!$packageType || $packageType == '--') {
        $error_message = 'Choisissez un élément de la liste';
        $prefix .= '3=' . $error_message . $and;
    }
    header('Location: ../' . $prefix);
    exit;
}
