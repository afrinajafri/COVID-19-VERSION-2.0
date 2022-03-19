<?php

include_once '../source.php';

if (($handle = fopen($epidemicTotalTestsUrl, "r")) !== FALSE) {
    $csvs = [];
    while(! feof($handle)) {
       $csvs[] = fgetcsv($handle);
    }
    $masterData = array();
    $stateNames = ['johor', 'kedah', 'kelantan', 'melaka', 'n9', 'pahang', 'perak', 'perlis', 'penang', 'sabah', 'sarawak', 'selangor', 'terengganu', 'wpkl', 'wplabuan', 'wpputrajaya'];
    foreach ($csvs as $key => $csv) {
        if ($key === 0) continue;
        else {
            if ($key % 16 === 1) {
                // Create a new set of data array when we are going to add first
                $currentDateData = array();
                $currentDateData[$stateNames[$key % 16 - 1]] = $csv[2];

                $cpr = array();
                $cpr[$stateNames[$key % 16 - 1]] = $csv[3];

                $total = array();
                $total[$stateNames[$key % 16 - 1]] =$csv[2]+ $csv[3];
 

            } else if ($key % 16 === 0) {

                $week_end = $csv[0];
                $timestamp = strtotime($week_end);
                $day =  date("w", $timestamp);

                $week_start = date('Y-m-d', strtotime('-'.(16-$day).' days')); 
                
                if($csv[0] >= $week_start && $csv[0] <= $week_end){
                    $currentDateData[$stateNames[15]] = $csv[2];
                    $cpr[$stateNames[15]] = $csv[3];
                    $total[$stateNames[15]] = $csv[2]+ $csv[3];

                    $masterDataItem = array(
                        "date" => $csv[0],
                        "rtk" => $currentDateData['johor'],
                        "cpr" => $cpr['johor'],
                        "total" => $total['johor']
                    );
                    // Push the data item into the master data
                    array_push($masterData, $masterDataItem); 
                }
               
            } else {
                $currentDateData[$stateNames[$key % 16 - 1]] = $csv[2];
                $cpr[$stateNames[$key % 16 - 1]] = $csv[3];
                $total[$stateNames[$key % 16 - 1]] =  $csv[2]+ $csv[3];
            }
        }
    }
    $json = json_encode($masterData);
    fclose($handle);
    print_r($json);
}

?>