<?php

function addCsvContent($packageType) {

    $result = '';

    if ($packageType) {

        $filepath = '../resources/';

        switch ($packageType) {
            case '1':
                $filepath .= 'studentPackage.csv';
                break;
            case '2':
                $filepath .= 'familyPackage.csv';
                break;
            case '3':
                $filepath .= 'otherPackage.csv';
                break;
            default;
                $filepath = '';                
                
        }

        if (($handle = fopen($filepath, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                $result .= '<tr>';
                for ($c=0; $c < $num; $c++) {
                    $result .='<td>'.$data[$c].'</td>';
                }
                $result .= '</tr>';
            }
            fclose($handle);
        }
    }

    return $result;
}

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
$mpdf->Output('recu.pdf', 'F');
$mpdf->Output('recu-demande-colis-alimentaire-association-avicenne.pdf', 'D');
?>