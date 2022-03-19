<?php 

//Include class  Death
require("../classFunction/VentilatedCompare.php");
 
$cases = new VentilatedCompare(); 
 
session_start();

if (isset($_SESSION['vent_state']))
{
    $vent_state = $_SESSION['vent_state'];
}
else{
    $vent_state = 'Johor';
}
 
$getData = $cases->weeklyData($vent_state);         
?>