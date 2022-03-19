<?php 
 header('Content-Type: application/json');  
 
class HospitalCompare
{      
    public function callCSVFile(){
        $healthRepoUrl = "https://raw.githubusercontent.com/MoH-Malaysia/covid19-public/main/";
        return $healthRepoUrl . "epidemic/hospital.csv";
    } 
    //two weeks ago
    public function weeklyData($state){  
        $epidemicTotalTestsUrl = $this->callCSVFile();  

         if($state == 'Negeri Sembilan'){
            $state = 'n9';
        }
        if($state == 'W.P. Kuala Lumpur'){
            $state = 'wpkl';
        }
        if($state == 'W.P. Labuan'){
            $state = 'wplabuan';
        }

        if($state == 'W.P. Putrajaya'){
            $state = 'wpputrajaya';
        }

        if($state == 'Pulau Pinang'){
            $state = 'penang';
        }

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
                        $hospitalized = array();
                        $hospitalized[$stateNames[$key % 16 - 1]] = $csv[6];
        
                        $discharged = array();
                        $discharged[$stateNames[$key % 16 - 1]] = $csv[9];
    
         
        
                    } else if ($key % 16 === 0) {
        
                        $week_end = $csv[0];
                        $timestamp = strtotime($week_end);
                        $day =  date("w", $timestamp);
        
                        $week_start = date('Y-m-d', strtotime('-'.(16-$day).' days')); 
                        
                        if($csv[0] >= $week_start && $csv[0] <= $week_end){
                            $hospitalized[$stateNames[15]] = $csv[6];
                            $discharged[$stateNames[15]] = $csv[9];
                            
                             $date = date("j M y", strtotime($csv[0]));
                            $masterDataItem = array(
                                "date" => $date,
                                "hospitalized" => $hospitalized[strtolower($state)],
                                "discharged" => $discharged[strtolower($state)],
                                
                            );
                            // Push the data item into the master data
                            array_push($masterData, $masterDataItem); 
                        }
                       
                    } else {
                        $hospitalized[$stateNames[$key % 16 - 1]] = $csv[6];
                        $discharged[$stateNames[$key % 16 - 1]] = $csv[9];
                        
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