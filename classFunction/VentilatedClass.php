<?php 
 header('Content-Type: application/json');  
 
class VentilatedClass
{      
    public function callCSVFile(){
        $healthRepoUrl = "https://raw.githubusercontent.com/MoH-Malaysia/covid19-public/main/";
        return $healthRepoUrl . "epidemic/icu.csv";
    }

    public function callAPI($method, $url, $data){
        $curl = curl_init();
        switch ($method){
           case "POST":
              curl_setopt($curl, CURLOPT_POST, 1);
              if ($data)
                 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
              break;
           case "PUT":
              curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
              if ($data)
                 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
              break;
           default:
              if ($data)
                 $url = sprintf("%s?%s", $url, http_build_query($data));
        }
        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
           'APIKEY: 111111111111111111111',
           'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // EXECUTE:
        $result = curl_exec($curl);
        if(!$result){die("Connection Failure");}
        curl_close($curl);
        return $result;
     }
    
    //two weeks ago
    public function weeklyData($state){  
        $epidemicStateNewCasesUrl = $this->callCSVFile();  

        $get_data = $this->callAPI('GET', 'https://covid-19.samsam123.name.my/api/cases?date=latest', false);
        $response = json_decode($get_data, true);
        $week_end = $response['date'];
        // $errors = $response['response']['errors'];
        // $data = $response['response']['data'][0];

        // if($state == 'Negeri Sembilan'){
        //     $state = 'n9';
        // }
        // if($state == 'W.P. Kuala Lumpur'){
        //     $state = 'wpkl';
        // }
        // if($state == 'W.P. Labuan'){
        //     $state = 'wplabuan';
        // }

        // if($state == 'W.P. Putrajaya'){
        //     $state = 'wpputrajaya';
        // }

        if (($handle = fopen($epidemicStateNewCasesUrl, "r")) !== FALSE) {
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
                        $currentDateData[$stateNames[15]] = $csv[11]; 

                        // $day = date('w');
                        $timestamp = strtotime($week_end);
                        $day =  date("w", $timestamp);

                        $week_start = date('Y-m-d', strtotime('-'.(16-$day).' days'));
                        // $week_end = $csv[0];
 
    
                        if($csv[0] >= $week_start && $csv[0] <= $week_end){
                            $datee2 = date("j M y", strtotime($csv[0]));
                            $datee = date("F d, Y", strtotime($csv[0]));
                            $masterDataItem = array(
                                // "week_start" => $week_start,
                                // "week_end" => $week_end,
                                "date" => $datee2,
                                "labeldate" => $datee,
                                "cases" => $currentDateData[ $state ]
                            );
                            // Push the data item into the master data
                            array_push($masterData, $masterDataItem);
    
                        }
                    
                    } else {
                        $currentDateData[$stateNames[$key % 16 - 1]] = $csv[11];
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

        $get_data = $this->callAPI('GET', 'https://covid-19.samsam123.name.my/api/cases?date=latest', false);
        $response = json_decode($get_data, true);
        $week_end = $response['date'];
        // $errors = $response['response']['errors'];
        // $data = $response['response']['data'][0];

       

        if (($handle = fopen($epidemicStateNewCasesUrl, "r")) !== FALSE) {
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
                        $currentDateData[$stateNames[15]] = $csv[11]; 

                        // $day = date('w');
                        $timestamp = strtotime($week_end);
                        $day =  date("w", $timestamp);

                        $week_start = date('Y-m-d', strtotime('-'.(61-$day).' days'));
                        // $week_end = $csv[0];
 
    
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
                        $currentDateData[$stateNames[$key % 16 - 1]] = $csv[11];
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

        $get_data = $this->callAPI('GET', 'https://covid-19.samsam123.name.my/api/cases?date=latest', false);
        $response = json_decode($get_data, true);
        $week_end = $response['date'];
        // $errors = $response['response']['errors'];
        // $data = $response['response']['data'][0];

       

        if (($handle = fopen($epidemicStateNewCasesUrl, "r")) !== FALSE) {
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
                        $currentDateData[$stateNames[15]] = $csv[11]; 

                        // $day = date('w');
                        $timestamp = strtotime($week_end);
                        $day =  date("w", $timestamp);

                        $week_start = date('Y-m-d', strtotime('-'.(365-$day).' days'));
                        // $week_end = $csv[0];
 
    
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
                        $currentDateData[$stateNames[$key % 16 - 1]] = $csv[11];
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

        $get_data = $this->callAPI('GET', 'https://covid-19.samsam123.name.my/api/cases?date=latest', false);
        $response = json_decode($get_data, true);
        $week_end = $response['date'];
        // $errors = $response['response']['errors'];
        // $data = $response['response']['data'][0];

       

        if (($handle = fopen($epidemicStateNewCasesUrl, "r")) !== FALSE) {
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
                        $currentDateData[$stateNames[15]] = $csv[11]; 

                        // $day = date('w');
                        $timestamp = strtotime($week_end);
                        $day =  date("w", $timestamp);

                        $week_start =  date("Y",strtotime("-1 year"));
                       
                        // $week_end = $csv[0];
 
    
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
                        $currentDateData[$stateNames[$key % 16 - 1]] = $csv[11];
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