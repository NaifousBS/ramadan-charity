<?php

/**
 * 
 * PHP PDF GENERATOR - MPDF
 * 
 */

// Create pdf
$mpdf = new \Mpdf\Mpdf();

$packageName = '';
if ($packageType == '1') {
    $packageName = 'Etudiant';
}
if ($packageType == '2') {
    $packageName = 'Famille';
}
if ($packageType == '3') {
    $packageName = 'Autre';
}

$data = '
<h1>Reçu - bon de commande de colis alimentaire</h1>
<strong>Nom:</strong> ' . $name . '<br/>
<strong>Prénom:</strong> ' . $firstname . '<br/>
<strong>Date:</strong> ' . date('j/m/Y') . '<br/>
<strong>Mail:</strong> ' . $mail . '<br/>
<strong>Tél:</strong> ' . $tel . '<br/>
<strong>Type de colis:</strong> ' . $packageType . ' - ' . $packageName . '<br/>
<strong>Lieu de retrait:</strong> ' . $city . '
';

if ($message) {
    $data .= '<br/><strong>Message:</strong> ' . $message . '<br/>';
}

$data .= '<br/><br/><i>L\'Association Avicenne de Rouffach</i>';

$mpdf->WriteHTML($data);


// Output 
// F 'file'
// D 'download' 
$date = date('Y-m-j');
$formattedName = $name;
$folder = '../resources/pdf/' . $date;
if (!is_dir($folder)) {
    // Create our directory if it does not exist
    mkdir($folder);
}

$filename = $date . '-' . formatName($name) . '-' . formatName($firstname) . '-recu-demande-colis-alimentaire.pdf';
$downloadLink = $folder . '/' . $filename;
$mpdf->Output($downloadLink, 'F');
$_SESSION['dl-link'] = str_replace('../', '', $downloadLink);
//$mpdf->Output($filename, 'D');
