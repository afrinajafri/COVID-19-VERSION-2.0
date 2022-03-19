
<?php 
 header('Content-Type: application/json');  
 
class VaccinationClass
{      
    public function callCSVFile(){
        $healthRepoUrl = "https://raw.githubusercontent.com/MoH-Malaysia/covid19-public/main/";
        return $healthRepoUrl . "vaccination/vax_state.csv";
    } 
    
    //two weeks ago
    public function weeklyData($state){  
        $vaccineStateUrl = $this->callCSVFile();   
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

        if (($handle = fopen($vaccineStateUrl, "r")) !== FALSE) {
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
                        $onedose = array();
                        $onedose[$stateNames[$key % 16 - 1]] = $csv[2];
        
                        $twodose = array();
                        $twodose[$stateNames[$key % 16 - 1]] = $csv[3];
        
                        $booster = array();
                        $booster[$stateNames[$key % 16 - 1]] =$csv[4];
         
        
                    } else if ($key % 16 === 0) {
        
                        $week_end = $csv[0];
                        $timestamp = strtotime($week_end);
                        $day =  date("w", $timestamp);
        
                        $week_start = date('Y-m-d', strtotime('-'.(16-$day).' days')); 
                        
                        if($csv[0] >= $week_start && $csv[0] <= $week_end){
                            $onedose[$stateNames[15]] = $csv[2];
                            $twodose[$stateNames[15]] = $csv[3];
                            $booster[$stateNames[15]] = $csv[4];
                             $date = date("j M y", strtotime($csv[0]));
                            $masterDataItem = array(
                                "date" => $date,
                                "onedose" => $onedose[strtolower($state)],
                                "twodose" => $twodose[strtolower($state)],
                                "booster" => $booster[strtolower($state)]
                            );
                            // Push the data item into the master data
                            array_push($masterData, $masterDataItem); 
                        }
                       
                    } else {
                        $onedose[$stateNames[$key % 16 - 1]] = $csv[2];
                        $twodose[$stateNames[$key % 16 - 1]] = $csv[3];
                        $booster[$stateNames[$key % 16 - 1]] =  $csv[4];
                    }
                }
            }
            $json = json_encode($masterData);
            fclose($handle);
            print_r($json);
        }
    }


    //two weeks ago
    public function twoMonth($state){  
        $vaccineStateUrl = $this->callCSVFile();   
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

        if (($handle = fopen($vaccineStateUrl, "r")) !== FALSE) {
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
                        $onedose = array();
                        $onedose[$stateNames[$key % 16 - 1]] = $csv[2];
        
                        $twodose = array();
                        $twodose[$stateNames[$key % 16 - 1]] = $csv[3];
        
                        $booster = array();
                        $booster[$stateNames[$key % 16 - 1]] =$csv[4];
         
        
                    } else if ($key % 16 === 0) {
        
                        $week_end = $csv[0];
                        $timestamp = strtotime($week_end);
                        $day =  date("w", $timestamp);
        
                        $week_start = date('Y-m-d', strtotime('-'.(61-$day).' days'));
                        
                        if($csv[0] >= $week_start && $csv[0] <= $week_end){
                            $onedose[$stateNames[15]] = $csv[2];
                            $twodose[$stateNames[15]] = $csv[3];
                            $booster[$stateNames[15]] = $csv[4];
                             $date = date("j M y", strtotime($csv[0]));
                            $masterDataItem = array(
                                "date" => $date,
                                "onedose" => $onedose[strtolower($state)],
                                "twodose" => $twodose[strtolower($state)],
                                "booster" => $booster[strtolower($state)]
                            );
                            // Push the data item into the master data
                            array_push($masterData, $masterDataItem); 
                        }
                       
                    } else {
                        $onedose[$stateNames[$key % 16 - 1]] = $csv[2];
                        $twodose[$stateNames[$key % 16 - 1]] = $csv[3];
                        $booster[$stateNames[$key % 16 - 1]] =  $csv[4];
                    }
                }
            }
            $json = json_encode($masterData);
            fclose($handle);
            print_r($json);
        }
    }

     //two weeks ago
     public function yearlyData($state){  
        $vaccineStateUrl = $this->callCSVFile();   
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

        if (($handle = fopen($vaccineStateUrl, "r")) !== FALSE) {
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
                        $onedose = array();
                        $onedose[$stateNames[$key % 16 - 1]] = $csv[2];
        
                        $twodose = array();
                        $twodose[$stateNames[$key % 16 - 1]] = $csv[3];
        
                        $booster = array();
                        $booster[$stateNames[$key % 16 - 1]] =$csv[4];
         
        
                    } else if ($key % 16 === 0) {
        
                        $week_end = $csv[0];
                        $timestamp = strtotime($week_end);
                        $day =  date("w", $timestamp);
        
                        $week_start = date('Y-m-d', strtotime('-'.(365-$day).' days'));
                        
                        if($csv[0] >= $week_start && $csv[0] <= $week_end){
                            $onedose[$stateNames[15]] = $csv[2];
                            $twodose[$stateNames[15]] = $csv[3];
                            $booster[$stateNames[15]] = $csv[4];
                             $date = date("j M y", strtotime($csv[0]));
                            $masterDataItem = array(
                                "date" => $date,
                                "onedose" => $onedose[strtolower($state)],
                                "twodose" => $twodose[strtolower($state)],
                                "booster" => $booster[strtolower($state)]
                            );
                            // Push the data item into the master data
                            array_push($masterData, $masterDataItem); 
                        }
                       
                    } else {
                        $onedose[$stateNames[$key % 16 - 1]] = $csv[2];
                        $twodose[$stateNames[$key % 16 - 1]] = $csv[3];
                        $booster[$stateNames[$key % 16 - 1]] =  $csv[4];
                    }
                }
            }
            $json = json_encode($masterData);
            fclose($handle);
            print_r($json);
        }
    }

     //two weeks ago
     public function allTime($state){  
        $vaccineStateUrl = $this->callCSVFile();   
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

        if (($handle = fopen($vaccineStateUrl, "r")) !== FALSE) {
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
                        $onedose = array();
                        $onedose[$stateNames[$key % 16 - 1]] = $csv[2];
        
                        $twodose = array();
                        $twodose[$stateNames[$key % 16 - 1]] = $csv[3];
        
                        $booster = array();
                        $booster[$stateNames[$key % 16 - 1]] =$csv[4];
         
        
                    } else if ($key % 16 === 0) {
        
                        $week_end = $csv[0];
                        $timestamp = strtotime($week_end);
                        $day =  date("w", $timestamp);
        
                        $week_start =  date("Y",strtotime("-1 year"));
                        
                        if($csv[0] >= $week_start && $csv[0] <= $week_end){
                            $onedose[$stateNames[15]] = $csv[2];
                            $twodose[$stateNames[15]] = $csv[3];
                            $booster[$stateNames[15]] = $csv[4];
                             $date = date("j M y", strtotime($csv[0]));
                            $masterDataItem = array(
                                "date" => $date,
                                "onedose" => $onedose[strtolower($state)],
                                "twodose" => $twodose[strtolower($state)],
                                "booster" => $booster[strtolower($state)]
                            );
                            // Push the data item into the master data
                            array_push($masterData, $masterDataItem); 
                        }
                       
                    } else {
                        $onedose[$stateNames[$key % 16 - 1]] = $csv[2];
                        $twodose[$stateNames[$key % 16 - 1]] = $csv[3];
                        $booster[$stateNames[$key % 16 - 1]] =  $csv[4];
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