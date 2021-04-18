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
<strong>Contact:</strong> ' . $contact . '<br/>
<strong>Type de colis:</strong> '.$packageType.' - '.$packageName.'
<br/><br/>
<table border="1">
<tbody>
<tr><td>Produit</td><td>Quantité</td></tr>

</tbody>
</table>
';

if ($message) {
    $data .= '<br/><strong>Message:</strong> ' . $message . '<br/>';
}

$data .= '<br/><br/><i>L\'Association Avicenne de Rouffach</i>';

$mpdf->WriteHTML($data);
$mpdf->Output('recu.pdf', 'F');
$mpdf->Output('recu-demande-colis-alimentaire-association-avicenne.pdf', 'D');
?>