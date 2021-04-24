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
<strong>Date:</strong> ' . date('j/m/y') . '<br/>
<strong>Contact:</strong> ' . $contact . '<br/>
<strong>Type de colis:</strong> '.$packageType.' - '.$packageName.'
<br/><br/>
<table border="1">
<tbody>
<tr style="background-color: #d9d9d9"><td><strong>Produit</strong></td><td><strong>Quantité</strong></td></tr>
'.addCsvContent($packageType).'
</tbody>
</table>
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
$folder = '../resources/pdf/'.$date;
if (!is_dir($folder)) {
    // Create our directory if it does not exist
    mkdir($folder);
}

$filename = $date.'-'.formatName($name).'-recu-demande-colis-alimentaire.pdf';
$downloadLink = $folder.'/'.$filename;
$mpdf->Output($downloadLink, 'F');
$_SESSION['dl-link'] = str_replace('../', '', $downloadLink);
//$mpdf->Output($filename, 'D');
