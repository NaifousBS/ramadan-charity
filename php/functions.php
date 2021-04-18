<?php
function logError($message) {
    $log_file2 = "../log/errors.log";
    ini_set("log_errors", TRUE);
    ini_set('error_log', $log_file2);
    error_log($message);
}

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

function formatName($name) {
    $formattedName = str_replace(' ', '-', $name);
    $formattedName = preg_replace('/[^A-Za-z0-9\-]/', '', $formattedName);
    $formattedName = preg_replace('/-+/', '-', $formattedName);
    $formattedName = strtolower($formattedName);
    return $formattedName;
}
?>