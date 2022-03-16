<?php 

//Include class  StateCases
require("../classFunction/StateCasesClass.php");
 
$cases = new StateCasesClass(); 
 
session_start();
if (isset($_SESSION['state']))
{
    if (isset($_SESSION['date']))
    {
        $state = $_SESSION['state'];
        $date = $_SESSION['date'];

        if($date == '2 Weeks Ago'){
            $getData = $cases->weeklyData($state);   
        }
        
        else if($date == '2 Months Ago'){
            $getData = $cases->twoMonth($state);   
        } 

        // else if($date == 'This Year'){
        //     $getData = $cases->yearlyData($state);   
        // } 
 
        // else if($date == 'All Time'){
        //     $getData = $cases->allTime($state);   
        // } 
    }
}  

?>