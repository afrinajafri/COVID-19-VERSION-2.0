<?php 
 header('Content-Type: application/json');  
 
class StateVaccinationClass
{      
    public function callCSVFile(){
        $vaccineRepoUrl = "https://raw.githubusercontent.com/CITF-Malaysia/citf-public/main/";
        return $vaccineRepoUrl . "vaccination/vax_state.csv";
    }
    
    //two weeks ago
    public function vaccination($state){  
        $vaccineStateUrl = $this->callCSVFile(); 

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
                if($stateDataItem['state'] == $state){
                    array_push($stateMasterData, $stateDataItem);
                }
                // array_push($stateMasterData, $stateDataItem);
                if ($key % 16 === 0) {
                    // Add the date entry into the master data 
                    if($csv[0] == '2022-03-15'){
                    
                    $dateDataItem = array(
                        "date" => $csv[0], 
                        "data" => $stateMasterData,
                        
                    );
                    // Push the data item into the master data
                    array_push($masterData, $dateDataItem);
                    }
                }
            }
            $json = json_encode($masterData);
            fclose($handle);
            print_r($json);
        }
    }

    

}

?>