<?php 
//Include class  StateCases
require("../classFunction/StateCasesClass.php");
 
$cases = new StateCasesClass(); 
 
session_start();

$state = 'johor';
$getData = $cases->weeklyData($state);   

// if (isset($_SESSION['state']))
// {
//     if (isset($_SESSION['date']))
//     {
//         $state = $_SESSION['state'];
//         $date = $_SESSION['date'];
//         $getData = $cases->weeklyData($state);   

//         if($date == '2 Weeks Ago'){
//             $getData = $cases->weeklyData($state);   
//         } 
//     }
// }  

?>