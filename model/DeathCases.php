<?php 

//Include class  DeathCases
require("../classFunction/DeathCasesClass.php");
 
$cases = new DeathCasesClass(); 
 
session_start();

if (isset($_SESSION['state']))
{
    $state = $_SESSION['state'];
}
else{
    $state = 'Johor';
}

if (isset($_SESSION['date']))
{
    $date = $_SESSION['date'];
}
else{
    $date = '2 Weeks Ago';
} 



if($date == '2 Weeks Ago'){
    $getData = $cases->weeklyData($state);   
}

else if($date == '2 Months Ago'){
    $getData = $cases->twoMonth($state);   
} 

else if($date == 'This Year'){
    $getData = $cases->yearlyData($state);   
} 
 
else if($date == 'All Time'){
    $getData = $cases->allTime($state);   
}  

?>