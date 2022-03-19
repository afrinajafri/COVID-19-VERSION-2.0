<?php 

//Include class  Death
require("../classFunction/HospitalCompare.php");
 
$cases = new HospitalCompare(); 
 
session_start();

if (isset($_SESSION['hospital_state']))
{
    $hospital_state = $_SESSION['hospital_state'];
}
else{
    $hospital_state = 'Johor';
}
 
$getData = $cases->weeklyData($hospital_state);         
?>