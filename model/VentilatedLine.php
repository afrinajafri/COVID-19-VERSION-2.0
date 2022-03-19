<?php 

//Include class  Ventilated
require("../classFunction/VentilatedClass.php");
 
$cases = new VentilatedClass(); 
 
session_start();

if (isset($_SESSION['ventilation_state']))
{
    $ventilation_state = $_SESSION['ventilation_state'];
}
else{
    $ventilation_state = 'Johor';
}

if (isset($_SESSION['ventilation_date']))
{
    $ventilation_date = $_SESSION['ventilation_date'];
}
else{
    $ventilation_date = '2 Weeks Ago';
} 



if($ventilation_date == '2 Weeks Ago'){
    $getData = $cases->weeklyData($ventilation_state);   
}

else if($ventilation_date == '2 Months Ago'){
    $getData = $cases->twoMonth($ventilation_state);   
} 

else if($ventilation_date == 'This Year'){
    $getData = $cases->yearlyData($ventilation_state);   
} 
 
else if($ventilation_date == 'All Time'){
    $getData = $cases->allTime($ventilation_state);   
}  

?>