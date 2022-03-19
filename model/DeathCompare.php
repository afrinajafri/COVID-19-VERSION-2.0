<?php 

//Include class  Death
require("../classFunction/DeathClass.php");
 
$cases = new DeathClass(); 
 
session_start();

if (isset($_SESSION['death_state']))
{
    $death_state = $_SESSION['death_state'];
}
else{
    $death_state = 'Johor';
}
 
$getData = $cases->weeklyData($death_state);         
?>