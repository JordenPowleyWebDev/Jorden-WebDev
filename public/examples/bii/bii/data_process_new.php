<?php

// Get CSV from file and parse as arrays
$csv = array_map('str_getcsv', file('new_guests.csv'));

$people =  [];

// Foreach array in CSV as per row
foreach($csv as $key => $row){
    // Skip first row
    if($key != 0){  
        // If set to true skip row
        $skipRow = false;

        // Current Row Data
        $currCompany = $row[0];
        $currTableNumber = $row[1];
        $currFirstname = $row[2];
        $currSurname = $row[3];

        if(!empty($currCompany) && isset($currCompany)){
            // Company name set
            // If first name is NOT set
            if(empty($currFirstname) || !isset($currFirstname)){
                // First name is NOT set
                $currFirstname = 'undeclared';

            }

            // If surname is NOT set
            if(empty($currSurname) || !isset($currSurname)){
                // Surname is NOT set
                $currSurname = 'undeclared';
            }

        } else{
            // Company name NOT set
            // If First name OR Surname IS set
            if((!empty($currFirstname) && isset($currFirstname)) || (!empty($currSurname) && isset($currSurname))){
                // First name OR Surname IS set
                $currCompany = 'undeclared';
            } else{
                // No person name is set.
                // IGNORE ROW
                $skipRow = true;
            }
        }

        // If row is to be saved
        if($skipRow === false){
            // Create person object
            $person = "{\"COMPANY\" : \"{$currCompany}\", \"TABLE_NUMBER\" : {$currTableNumber}, \"FIRSTNAME\" : \"{$currFirstname}\", \"SURNAME\" : \"{$currSurname}\"}";
            $person = json_decode($person);

            // Push into array for sorting
            array_push($people, $person);
        }
    }
}

$exportPeople = '{"PEOPLE":[';
$count = 0;

foreach($people as $person){
    if($count !== 0){
        $exportPeople .= ',';
    }

    $exportPeople .= json_encode($person);
    $count++;
}

$exportPeople .= ']}';

$json = json_decode($exportPeople);

var_dump($json);

$outputFile = fopen('guests.json', "w");
fwrite($outputFile, $exportPeople);
fclose($outputFile);

echo 'Done';
?>