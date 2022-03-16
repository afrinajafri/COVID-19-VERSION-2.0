<?php

include_once '../source.php';

if (($handle = fopen($epidemicVentilated, "r")) !== FALSE) {
    $csvs = [];
    while(! feof($handle)) {
       $csvs[] = fgetcsv($handle);
    }
    $masterData = array();
    $stateNames = ['Sabah', 'Sarawak', 'Selangor', 'Terengganu', 'W.P. Kuala Lumpur', 'W.P. Labuan', 'W.P. Putrajaya', 'Johor', 'Kedah', 'Kelantan', 'Melaka', 'Negeri Sembilan', 'Pahang', 'Perak', 'Perlis', 'Pulau Pinang'];
    foreach ($csvs as $key => $csv) {
        if ($key === 0) continue;
        else {
            if ($key % 16 === 1) {
                // Create a new set of data array when we are going to add first
                $currentDateData = array();
                $currentDateData[$stateNames[$key % 16 - 1]] = $csv[11];
            } else if ($key % 16 === 0) {
                // Add the last data, and then push it into the master data
                if($csv[0] == '2022-03-15'){
                    $currentDateData[$stateNames[1]] = $csv[11];
                    $masterDataItem = array(
                        "date" => $csv[0],
                        "deaths" => $currentDateData
                    );
                    // Push the data item into the master data
                    array_push($masterData, $masterDataItem);
                }
               
            } else {
                $currentDateData[$stateNames[$key % 16 - 1]] = $csv[11];
            }
        }
    }
    $json = json_encode($masterData);
    fclose($handle);
    print_r($json);
}

?>