<?php

// Get CSV from file and parse as arrays
$csv = array_map('str_getcsv', file('attendees.csv'));

// Data from Previous rows
$prevCompany;
$prevTableNumber;

$tableCount = 0;

$people =  [];

// Foreach array in CSV as per row
foreach($csv as $key => $row){
    // Skip first row
    if($key != 0){
        var_dump($row); die();
        // Current row data
        $currCompany = $row[0];
        $currTableNumber = $row[1];
        $currFirstname = $row[2];
        $currSurname = $row[3];

        // If 1st item set previous
        if(!isset($prevCompany)){$prevCompany = $currCompany;}
        // if(!isset($prevTableNumber)){$prevTableNumber = $currTableNumber;}

        // If no values for table or company
        if(empty($currCompany)){$currCompany = $prevCompany;}
        // if(empty($currTableNumber)){$currTableNumber = $prevTableNumber;}

        // If current values do not match previous values
        if($currCompany !== $prevCompany){$prevCompany = $currCompany;}

        if(!empty($currFirstname) && !empty($currSurname)){
            // Create object string and parse as object
            $person = "{\"COMPANY\" : \"{$currCompany}\", \"TABLE_NUMBER\" : {$currTableNumber}, \"FIRSTNAME\" : \"{$currFirstname}\", \"SURNAME\" : \"{$currSurname}\"}";
            $person = json_decode($person);
            
            // Push into array for sorting
            array_push($people, $person);

            if(intval($currTableNumber) > $tableCount){
                $tableCount = $currTableNumber;
            }

        }
    }
}

// Function for sorting an array of objects
// ACCEPTS array of objects(stdClass)
// RETURNS people as JSON string
function peopleSort($people){
    global $tableCount;

    $tables = [];

    // FOREACH table
    for($tableNumber = 1; $tableNumber <= $tableCount; $tableNumber++){

        $table = [];

        foreach($people as $person){
            if(intval($person->TABLE_NUMBER) == $tableNumber){
                array_push($table, $person);
            }
        }

        array_push($tables, $table);
    }

    $people = '{"PEOPLE":[';
    $count = 0;
    foreach($tables as $delegates){
        foreach($delegates as $delegate){
            if($count !== 0){
                $people .= ',';
            }

            $people .= json_encode($delegate);
            $count++;
        }
    }
    $people .= ']}';
    return $people;
}

$people = peopleSort($people);



// $json .=  "]}";

$json = json_decode($people);

var_dump($json);

// $outputFile = fopen('guests.json', "w");
// fwrite($outputFile, $people);
// fclose($outputFile);

echo 'Done';

?>