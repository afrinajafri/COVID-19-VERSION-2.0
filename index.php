<?php  
require ("charts/confirmedcases.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <title>COVID-19 Tracker</title>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script> 

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

 
</head>


<div class="col-xl-4">
<div class="card mb-4"> 
    <div class="card-body">
    <p class="text-muted">Cases   <span style="font-size: 12px;padding-top:4px" class="float-end">Data as of 10 Mar 2022, 11:59 pm</span></p>
    <h5 class="card-title">Confirmed COVID-19 Cases</h5> 
        <p class="card-text">
        <canvas id="mycanvas" width="100%" height="400"> </canvas>
        </p> 
    </div>
</div>
</div>


<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>  