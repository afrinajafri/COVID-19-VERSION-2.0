<?php 

//Include class  Death
require("../classFunction/ICUCompare.php");
 
$cases = new ICUCompare(); 
 
session_start();

if (isset($_SESSION['icu_state']))
{
    $icu_state = $_SESSION['icu_state'];
}
else{
    $icu_state = 'Johor';
}
 
$getData = $cases->weeklyData($icu_state);         
?>