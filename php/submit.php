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

// Get form variables
$name = htmlspecialchars($_POST['name']);
$contact = htmlspecialchars($_POST['contact']);
$message = htmlspecialchars($_POST['message']);
$packageType = htmlspecialchars($_POST['packageType']);

if ($name && $contact && $message && $packageType && $packageType != '--') {
    try {
        include_once './php/mpdf.php';
        include_once './php/mail.php';
    } catch (Exception $e) {
        logError($e);
    }
}
?>