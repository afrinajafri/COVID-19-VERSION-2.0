<?php 

//Include class  VaccinationClass
require("../classFunction/VaccinationClass.php");
 
$cases = new VaccinationClass(); 
 
session_start();

if (isset($_SESSION['vac_state']))
{
    $vac_state = $_SESSION['vac_state'];
}
else{
    $vac_state = 'Johor';
}

if (isset($_SESSION['vac_date']))
{
    $vac_date = $_SESSION['vac_date'];
}
else{
    $vac_date = '2 Weeks Ago';
} 



if($vac_date == '2 Weeks Ago'){
    $getData = $cases->weeklyData($vac_state);   
}

else if($vac_date == '2 Months Ago'){
    $getData = $cases->twoMonth($vac_state);   
} 

else if($vac_date == 'This Year'){
    $getData = $cases->yearlyData($vac_state);   
} 
 
else if($vac_date == 'All Time'){
    $getData = $cases->allTime($vac_state);   
}  

?>