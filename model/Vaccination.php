<?php  
$vaccineRepoUrl = "https://raw.githubusercontent.com/CITF-Malaysia/citf-public/main/";
$vaccineStateUrl= $vaccineRepoUrl . "vaccination/vax_state.csv";


if (isset($_GET['vac_state']))
{ 
    $vac_state = $_GET['vac_state']; 
} 
else
{ 
    $vac_state = 'Johor'; 
} 

    if (($handle = fopen($vaccineStateUrl, "r")) !== FALSE) {
        $csvs = [];
        while(! feof($handle)) {
           $csvs[] = fgetcsv($handle);
        } 
        
        foreach ($csvs[0] as $single_csv) {
            $column_names[] = $single_csv;
        }
        $masterData = array();
        foreach ($csvs as $key => $csv) {
            if ($key === 0) continue;
            if ($key % 16 === 1) {
                // Create a new array for stateData on a new date
                $stateMasterData = array();
            }
            foreach ($column_names as $column_key => $column_name) {
                if ($column_key === 0) continue;
                $stateDataItem[$column_name] = $csv[$column_key];
            }
            if($stateDataItem['state'] == $vac_state){
                $date = date("j M Y", strtotime($csv[0]));
                $stateDataItem['date'] = $date ;
                $json = json_encode($stateDataItem);
            }   
        } 
        
        fclose($handle);
        // print_r($json);
    } 


?>