<?php 

//Include class  Death
require("../classFunction/HospitalCompare.php");
 
$cases = new HospitalCompare(); 
 
session_start();

if (isset($_SESSION['hosp_state']))
{
    $hosp_state = $_SESSION['hosp_state'];
}
else{
    $hosp_state = 'Johor';
}
 
$getData = $cases->weeklyData($hosp_state);         
?>