<?php

include_once '../source.php';
if (($handle = fopen($deathage, "r")) !== FALSE) {
    $csvs = [];
    while(! feof($handle)) {
       $csvs[] = fgetcsv($handle);
    }
    $masterData = array();
    $stateNames = ['w1', 'w2', 'w3', 'w4', 'w5', 'w6', 'w7', 'w8', 'w9', 'w10', 'w11', 'w12', 'w13', 'w14', 'w15', 'w16', 'w17', 'w18', 'w19', 'w20', 'w21', 'w22', 'w23', 'w24'];
    foreach ($csvs as $key => $csv) {
        if ($key === 0) continue;
        else {
            if ($key % 16 === 1) {
                // Create a new set of data array when we are going to add first
                $abs_0_4 = array();
                $abs_0_4[$stateNames[$key % 16 - 1]] = $csv[2];

                $abs_5_11 = array();
                $abs_5_11[$stateNames[$key % 16 - 1]] = $csv[3];

                $abs_12_17 = array();
                $abs_12_17[$stateNames[$key % 16 - 1]] = $csv[4];

                $abs_18_29 = array();
                $abs_18_29[$stateNames[$key % 16 - 1]] = $csv[5];

                $abs_30_39 = array();
                $abs_30_39[$stateNames[$key % 16 - 1]] = $csv[6];

                $abs_40_49 = array();
                $abs_40_49[$stateNames[$key % 16 - 1]] = $csv[7];

                $abs_50_59 = array();
                $abs_50_59[$stateNames[$key % 16 - 1]] = $csv[8];

                $abs_60_69 = array();
                $abs_60_69[$stateNames[$key % 16 - 1]] = $csv[9];

                $abs_70_79 = array();
                $abs_70_79[$stateNames[$key % 16 - 1]] = $csv[10];

                $abs_80 = array();
                $abs_80[$stateNames[$key % 16 - 1]] = $csv[11]; 
 

            } else if ($key % 16 === 0) {  
                if($csv[1]== 'Johor'){
                    $abs_0_4[$stateNames[15]] = $csv[2];
                    $abs_5_11[$stateNames[15]] = $csv[3];
                    $abs_12_17[$stateNames[15]] = $csv[4];
                    $abs_18_29[$stateNames[15]] = $csv[5];
                    $abs_30_39[$stateNames[15]] = $csv[6];
                    $abs_40_49[$stateNames[15]] = $csv[7];
                    $abs_50_59[$stateNames[15]] = $csv[8];
                    $abs_60_69[$stateNames[15]] = $csv[9];
                    $abs_70_79[$stateNames[15]] = $csv[10];
                    $abs_80[$stateNames[15]] = $csv[11]; 
 
                    $masterDataItem = array( 
                        "state" => $csv[1],
                        "abs_0_4" => $abs_0_4,
                        "abs_5_11" => $abs_5_11,
                        "abs_12_17" => $abs_12_17,
                        "abs_18_29" => $abs_18_29,
                        "abs_30_39" => $abs_30_39,
                        "abs_40_49" => $abs_40_49,
                        "abs_50_59" => $abs_50_59,
                        "abs_60_69" => $abs_60_69,
                        "abs_70_79" => $abs_70_79,
                        "abs_80" => $abs_80, 
                        
                    );
                    // Push the data item into the master data
                    array_push($masterData, $masterDataItem);   

                }
                   
               
            } else { 
                $abs_0_4[$stateNames[$key % 16 - 1]] = $csv[2];  
                $abs_5_11[$stateNames[$key % 16 - 1]] = $csv[3]; 
                $abs_12_17[$stateNames[$key % 16 - 1]] = $csv[4]; 
                $abs_18_29[$stateNames[$key % 16 - 1]] = $csv[5]; 
                $abs_30_39[$stateNames[$key % 16 - 1]] = $csv[6]; 
                $abs_40_49[$stateNames[$key % 16 - 1]] = $csv[7]; 
                $abs_50_59[$stateNames[$key % 16 - 1]] = $csv[8]; 
                $abs_60_69[$stateNames[$key % 16 - 1]] = $csv[9]; 
                $abs_70_79[$stateNames[$key % 16 - 1]] = $csv[10]; 
                $abs_80[$stateNames[$key % 16 - 1]] = $csv[11]; 
            }
        }
    }
    $json = json_encode($masterData);
    fclose($handle);
    print_r($json);
}

?>