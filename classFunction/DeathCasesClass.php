<?php 
 header('Content-Type: application/json');  
 
class DeathCasesClass
{      
    public function callCSVFile(){
        $healthRepoUrl = "https://raw.githubusercontent.com/MoH-Malaysia/covid19-public/main/";
        return $healthRepoUrl . "epidemic/deaths_state.csv";
    } 
    //two weeks ago
    public function weeklyData($state){  
        $epidemicStateNewCasesUrl = $this->callCSVFile();  

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

        if (($handle = fopen($epidemicStateNewCasesUrl, "r")) !== FALSE) {
            $csvs = [];
            while(! feof($handle)) {
            $csvs[] = fgetcsv($handle);
            }
            $masterData = array();
            $stateNames = ['wpkl', 'wplabuan', 'wpputrajaya','johor', 'kedah', 'kelantan', 'melaka', 'n9', 'pahang', 'perak', 'perlis', 'penang', 'sabah', 'sarawak', 'selangor', 'terengganu'];
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

                        $week_end = $csv[0];
                        $timestamp = strtotime($week_end);
                        $day =  date("w", $timestamp);

                        $week_start = date('Y-m-d', strtotime('-'.(16-$day).' days')); 
    
                        if($csv[0] >= $week_start && $csv[0] <= $week_end){
                            $datee2 = date("j M y", strtotime($csv[0]));
                            $datee = date("F d, Y", strtotime($csv[0]));
                            $masterDataItem = array(
                                // "week_start" => $week_start,
                                // "week_end" => $week_end,
                                "date" => $datee2,
                                "labeldate" => $datee,
                                "cases" => $currentDateData[strtolower($state)]
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


    //two weeks ago
    public function twoMonth($state){  
        $epidemicStateNewCasesUrl = $this->callCSVFile();  

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

        if (($handle = fopen($epidemicStateNewCasesUrl, "r")) !== FALSE) {
            $csvs = [];
            while(! feof($handle)) {
            $csvs[] = fgetcsv($handle);
            }
            $masterData = array();
            $stateNames = ['wpkl', 'wplabuan', 'wpputrajaya','johor', 'kedah', 'kelantan', 'melaka', 'n9', 'pahang', 'perak', 'perlis', 'penang', 'sabah', 'sarawak', 'selangor', 'terengganu'];
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

                        $week_end = $csv[0];
                        $timestamp = strtotime($week_end);
                        $day =  date("w", $timestamp);

                        $week_start = date('Y-m-d', strtotime('-'.(61-$day).' days')); 
    
                        if($csv[0] >= $week_start && $csv[0] <= $week_end){
                            $datee2 = date("j M y", strtotime($csv[0]));
                            $masterDataItem = array( 
                                "date" => $datee2 ,
                                "cases" => $currentDateData[strtolower($state)]
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

     //two weeks ago
     public function yearlyData($state){  
        $epidemicStateNewCasesUrl = $this->callCSVFile();  

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

        if (($handle = fopen($epidemicStateNewCasesUrl, "r")) !== FALSE) {
            $csvs = [];
            while(! feof($handle)) {
            $csvs[] = fgetcsv($handle);
            }
            $masterData = array();
            $stateNames = ['wpkl', 'wplabuan', 'wpputrajaya','johor', 'kedah', 'kelantan', 'melaka', 'n9', 'pahang', 'perak', 'perlis', 'penang', 'sabah', 'sarawak', 'selangor', 'terengganu'];
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

                        $week_end = $csv[0];
                        $timestamp = strtotime($week_end);
                        $day =  date("w", $timestamp);

                        $week_start = date('Y-m-d', strtotime('-'.(365-$day).' days')); 
    
                        if($csv[0] >= $week_start && $csv[0] <= $week_end){
                            $datee2 = date("j M y", strtotime($csv[0]));
                            $masterDataItem = array( 
                                "date" => $datee2,
                                "cases" => $currentDateData[strtolower($state)]
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

     //two weeks ago
     public function allTime($state){  
        $epidemicStateNewCasesUrl = $this->callCSVFile();  

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

        if (($handle = fopen($epidemicStateNewCasesUrl, "r")) !== FALSE) {
            $csvs = [];
            while(! feof($handle)) {
            $csvs[] = fgetcsv($handle);
            }
            $masterData = array();
            $stateNames = ['wpkl', 'wplabuan', 'wpputrajaya','johor', 'kedah', 'kelantan', 'melaka', 'n9', 'pahang', 'perak', 'perlis', 'penang', 'sabah', 'sarawak', 'selangor', 'terengganu'];
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

                        $week_end = $csv[0];
                        $timestamp = strtotime($week_end);
                        $day =  date("w", $timestamp);

                        $week_start =  date("Y",strtotime("-1 year")); 
                        if($csv[0] >= $week_start && $csv[0] <= $week_end){
                            $datee2 = date("j M y", strtotime($csv[0]));
                            $masterDataItem = array( 
                                "date" => $datee2,
                                "cases" => $currentDateData[strtolower($state)]
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