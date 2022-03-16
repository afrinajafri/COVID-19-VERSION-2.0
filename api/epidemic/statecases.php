<?php 
 header('Content-Type: application/json');  
class StateCases
{     

    public function callCSVFile(){
        $healthRepoUrl = "https://raw.githubusercontent.com/MoH-Malaysia/covid19-public/main/";
        return $healthRepoUrl . "epidemic/cases_state.csv";
    }
    
    //two weeks ago
    public function weeklyData($state){ 
        $epidemicStateNewCasesUrl = $this->callCSVFile();
         
        if (($handle = fopen($epidemicStateNewCasesUrl, "r")) !== FALSE) {
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
                    } else if ($key % 16 === 0) {
                        // Add the last data, and then push it into the master data
                        $currentDateData[$stateNames[15]] = $csv[2]; 
    
                        if($csv[0] == '2022-03-14' || $csv[0] == '2022-03-15'){
                            $masterDataItem = array(
                                "date" => $csv[0],
                                "cases" => $currentDateData['kelantan']
                            );
                            // Push the data item into the master data
                            array_push($masterData, $masterDataItem);
    
                        }
                    
                    } else {
                        $currentDateData[$stateNames[$key % 16 - 1]] = $csv[2];
                    }
                }
            }
            $arr = array();
            
            $json = json_encode($masterData);
            fclose($handle);
            print_r($json);
        }
    }

    

}

?>